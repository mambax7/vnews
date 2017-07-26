<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * News submit file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// Include module header
require_once __DIR__ . '/header.php';
// Include content template
$xoopsOption ['template_main'] = 'vnews_submit.tpl';
// include Xoops header
include XOOPS_ROOT_PATH . '/header.php';
// Add Stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/style.css');

// Include language file
xoops_loadLanguage('admin', 'vnews');

require_once XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';

$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', '', 'string');

// Check the access permission
global $xoopsUser;
if (!$permHandler->News_PermissionIsAllowed($xoopsUser, 'vnews_ac', '8')) {
    redirect_header('index.php', 3, _NOPERM);
    exit();
}

switch ($op) {
    case 'add':

        if (!isset($_POST ['post'])) {
            redirect_header('index.php', 3, _NOPERM);
            exit();
        }

        $groups = xoops_getModuleOption('groups', 'vnews');
        $groups = isset($groups) ? $groups : '';
        $groups = is_array($groups) ? implode(' ', $groups) : '';

        $obj = $storyHandler->create();
        $obj->setVars($_REQUEST);

        $obj->setVar('story_alias', VnewsUtils::News_UtilityAliasFilter($_REQUEST ['story_title']));
        $obj->setVar('story_words', VnewsUtils::News_UtilityMetaFilter($_REQUEST ['story_title']));
        $obj->setVar('story_desc', VnewsUtils::News_UtilityAjaxFilter($_REQUEST ['story_title']));
        $obj->setVar('story_create', time());
        $obj->setVar('story_update', time());
        $obj->setVar('story_publish', time());

        //Form topic_img
        VnewsUtils::News_UtilityUploadImg('story_img', $obj, $_REQUEST ['story_img']);

        if ($permHandler->News_PermissionIsAllowed($xoopsUser, 'vnews_ac', '16')) {
            $obj->setVar('story_status', '1');
            $storyHandler->News_StoryUpdatePost($_REQUEST ['story_uid'], '1', $story_action = 'add');
        }

        if (!$storyHandler->insert($obj)) {
            VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_MD_MSG_ERROR);
            include XOOPS_ROOT_PATH . '/footer.php';
            exit();
        }

        // Reset next content for previous content
        $storyHandler->News_ResetNext($_REQUEST ['story_topic'], $obj->getVar('story_id'));
        $storyHandler->News_ResetPrevious($_REQUEST ['story_topic'], $obj->getVar('story_id'));

        if (xoops_getModuleOption('usetag', 'vnews') and is_dir(XOOPS_ROOT_PATH . '/modules/tag')) {
            $tagHandler = xoops_getModuleHandler('tag', 'tag');
            $tagHandler->updateByItem($_POST ['item_tag'], $obj->getVar('story_id'), 'vnews', 0);
        }

        // file
        if (isset($_FILES['file_name']['name']) && !empty($_FILES['file_name']['name'])) {
            $fileobj = $fileHandler->create();
            $fileobj->setVar('file_date', time());
            $fileobj->setVar('file_title', $_REQUEST ['story_title']);
            $fileobj->setVar('file_story', $obj->getVar('story_id'));
            $fileobj->setVar('file_status', 1);

            VnewsUtils::News_UtilityUploadFile('file_name', $fileobj, $_REQUEST ['file_name']);
            $storyHandler->News_StoryFile('add', $obj->getVar('story_id'));
            if (!$fileHandler->insert($fileobj)) {
                VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_MD_MSG_ERROR);
                xoops_cp_footer();
                exit();
            }
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect('index.php', 1, _VNEWS_MD_MSG_WAIT);
        include XOOPS_ROOT_PATH . '/footer.php';
        exit();
        break;

    default:
        // Form
        $story_type = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story_type', 'vnews', 'string');
        $obj        = $storyHandler->create();
        $form       = $obj->News_StorySimpleForm($story_type);
        $xoopsTpl->assign('form', $form->render());
        // breadcrumb
        if (xoops_getModuleOption('bc_show', 'vnews')) {
            $breadcrumb = VnewsUtils::News_UtilityBreadcrumb('submit.php', _VNEWS_MD_SUBMIT, 0, ' &raquo; ');
            $xoopsTpl->assign('breadcrumb', $breadcrumb);
        }
        break;

}

// include Xoops footer
include XOOPS_ROOT_PATH . '/footer.php';
