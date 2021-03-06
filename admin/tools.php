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
 * News Admin page
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/header.php';

// Display Admin header
xoops_cp_header();
$moduleDirName = basename(dirname(__DIR__));
// Check admin have access to this page
$group  = $xoopsUser->getGroups();
$groups = xoops_getModuleOption('admin_groups', $moduleDirName);
if (count(array_intersect($group, $groups)) <= 0) {
    redirect_header('index.php', 3, _NOPERM);
}

// Define default value
$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', 'display', 'string');
// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . "/modules/$moduleDirName/assets/css/admin.css");
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');
// Initialize content handler
$topicHandler = xoops_getModuleHandler('topic', $moduleDirName);
$storyHandler = xoops_getModuleHandler('story', $moduleDirName);

switch ($op) {

    case 'display':
    default:

        // rebuild alias
        $form = new XoopsThemeForm(_VNEWS_AM_TOOLS_ALIAS_CONTENT, 'tools', 'tools.php', 'post', true);
        $form->addElement(new XoopsFormRadioYN(_VNEWS_AM_TOOLS_ALIAS_CONTENT, 'content', '1'));
        $form->addElement(new XoopsFormHidden('op', 'alias'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('alias', $form->render());

        // rebuild topic alias
        $form = new XoopsThemeForm(_VNEWS_AM_TOOLS_ALIAS_TOPIC, 'tools', 'tools.php', 'post', true);
        $form->addElement(new XoopsFormRadioYN(_VNEWS_AM_TOOLS_ALIAS_TOPIC, 'topic', '1'));
        $form->addElement(new XoopsFormHidden('op', 'topicalias'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('topicalias', $form->render());

        // rebuild description
        $form = new XoopsThemeForm(_VNEWS_AM_TOOLS_META_DESCRIPTION, 'tools', 'tools.php', 'post', true);
        $form->addElement(new XoopsFormRadioYN(_VNEWS_AM_TOOLS_META_DESCRIPTION, 'description', '1'));
        $form->addElement(new XoopsFormHidden('op', 'description'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('description', $form->render());

        // rebuild keyword
        $form = new XoopsThemeForm(_VNEWS_AM_TOOLS_META_KEYWORD, 'tools', 'tools.php', 'post', true);
        $form->addElement(new XoopsFormRadioYN(_VNEWS_AM_TOOLS_META_KEYWORD, 'keyword', '1'));
        $form->addElement(new XoopsFormHidden('op', 'keyword'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('keyword', $form->render());

        // prune manager
        $form = new XoopsThemeForm(_VNEWS_AM_TOOLS_PRUNE, 'tools', 'tools.php', 'post', true);
        $form->addElement(new XoopsFormTextDateSelect(_VNEWS_AM_TOOLS_PRUNE_BEFORE, 'prune_date', 15, time()));
        $onlyexpired = new xoopsFormCheckBox('', 'onlyexpired');
        $onlyexpired->addOption(1, _VNEWS_AM_TOOLS_PRUNE_EXPIREDONLY);
        $form->addElement($onlyexpired, false);
        $form->addElement(new XoopsFormHidden('op', 'confirmbeforetoprune'), false);
        $form->addElement(new XoopsFormHidden('op', 'confirmbeforetoprune'), false);
        $topiclist = new XoopsFormSelect(_VNEWS_AM_TOOLS_PRUNE_TOPICS, 'pruned_topics', '', 5, true);
        $criteria  = new CriteriaCompo();
        $criteria->setSort('topic_id');
        $criteria->setOrder('DESC');
        $allTopics  = $topicHandler->getObjects($criteria);
        $topic_tree = new XoopsObjectTree($allTopics, 'topic_id', 'topic_pid');
        $topics_arr = $topic_tree->getAllChild(0);
        foreach ($topics_arr as $onetopic) {
            $topiclist->addOption($onetopic->getVar('topic_id'), $onetopic->getVar('topic_title', 'e'));
        }
        $topiclist->setDescription(_VNEWS_AM_TOOLS_PRUNE_EXPORT_DSC);
        $form->addElement($topiclist, false);
        $form->addElement(new XoopsFormHidden('op', 'prune'));
        $form->addElement(new XoopsFormButton('', 'post', _SUBMIT, 'submit'));
        $xoopsTpl->assign('prune', $form->render());

        // other options
        $xoopsTpl->assign('header', true);
        break;

    case 'alias':
        $start_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id   = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'end_id', '1', 'int');
        VnewsUtils::News_UtilityRebuild($storyHandler, 'story_id', 'alias', 'story_alias', 'story_title', $start_id, $end_id);
        VnewsUtils::News_UtilityRedirect('tools.php', 1, _VNEWS_AM_MSG_WAIT);
        break;

    case 'topicalias':
        $start_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id   = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'end_id', '1', 'int');
        VnewsUtils::News_UtilityRebuild($topicHandler, 'topic_id', 'topicalias', 'topic_alias', 'topic_title', $start_id, $end_id);
        VnewsUtils::News_UtilityRedirect('tools.php', 1, _VNEWS_AM_MSG_WAIT);
        break;

    case 'keyword':
        $start_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id   = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'end_id', '1', 'int');
        VnewsUtils::News_UtilityRebuild($storyHandler, 'story_id', 'keyword', 'story_words', 'story_title', $start_id, $end_id);
        VnewsUtils::News_UtilityRedirect('tools.php', 1, _VNEWS_AM_MSG_WAIT);
        break;

    case 'description':
        $start_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start_id', '1', 'int');
        $end_id   = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'end_id', '1', 'int');
        VnewsUtils::News_UtilityRebuild($storyHandler, 'story_id', 'description', 'story_desc', 'story_title', $start_id, $end_id);
        VnewsUtils::News_UtilityRedirect('tools.php', 1, _VNEWS_AM_MSG_WAIT);
        break;

    case 'prune':
        $timestamp = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'prune_date', '', 'int');
        $expired   = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'onlyexpired', 0, 'int');
        $timestamp = strtotime($_REQUEST ['prune_date']);
        $topiclist = '';
        if (isset($_REQUEST['pruned_topics'])) {
            $topiclist = implode(',', $_REQUEST['pruned_topics']);
        }
        $count = $storyHandler->News_StoryPruneCount($timestamp, $expired, $topiclist);
        $storyHandler->News_StoryDeleteBeforeDate($timestamp, $expired, $topiclist);
        VnewsUtils::News_UtilityRedirect('tools.php', 100, sprintf(_VNEWS_AM_MSG_PRUNE_DELETED, $count));
        break;
}

$xoopsTpl->assign('navigation', 'tools');
$xoopsTpl->assign('navtitle', _VNEWS_MI_TOOLS);

// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . "/modules/$moduleDirName/templates/admin/vnews_tools.tpl");

// Display Xoops footer
include __DIR__ . '/footer.php';
xoops_cp_footer();
