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

require_once XOOPS_ROOT_PATH . '/class/pagenav.php';
// Display Admin header
xoops_cp_header();
$moduleDirName = basename(dirname(__DIR__));

// Define default value
$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', '', 'string');
// Define scripts
$xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.ui.js');
$xoTheme->addScript(XOOPS_URL . "/modules/$moduleDirName/assets/js/order.js");
$xoTheme->addScript(XOOPS_URL . "modules/$moduleDirName/assets/js/admin.js");
// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . "/modules/$moduleDirName/assets/css/admin.css");
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . $GLOBALS['xoopsModuleConfig']['jquery_theme'] . '/ui.all.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

switch ($op) {
    case 'new_file':
        $obj = $fileHandler->create();
        $obj->getForm();
        break;

    case 'edit_file':
        $file_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'file_id', 0, 'int');
        if ($file_id > 0) {
            $obj = $fileHandler->get($file_id);
            $obj->getForm();
        } else {
            VnewsUtils::News_UtilityRedirect('file.php', 1, _VNEWS_AM_MSG_EDIT_ERROR);
        }
        break;

    case 'delete_file':
        $file_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'file_id', 0, 'int');
        if ($file_id > 0) {
            $file = $fileHandler->get($file_id);
            // Prompt message
            VnewsUtils::News_UtilityMessage('backend.php', sprintf(_VNEWS_AM_MSG_DELETE, '"' . $file->getVar('file_title') . '"'), $file_id, 'file');
            // Display Admin footer
            xoops_cp_footer();
        }
        break;

    default:
        $file = array();
        // get module configs
        $moduleDirName   = basename(dirname(__DIR__));
        $file['perpage'] = '10';
        $file['order']   = 'DESC';
        $file['sort']    = 'file_id';

        // get limited information
        if (isset($_REQUEST['limit'])) {
            $file['limit'] = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'limit', 0, 'int');
        } else {
            $file['limit'] = $file['perpage'];
        }

        // get start information
        if (isset($_REQUEST['start'])) {
            $file['start'] = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start', 0, 'int');
        } else {
            $file['start'] = 0;
        }

        // get content
        if (isset($_REQUEST['content'])) {
            $file['content'] = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'content', 0, 'int');
            $story           = $storyHandler->get($file['content']);
        } else {
            $story = $storyHandler->getall();
        }

        $files = $fileHandler->News_FileAdminList($file, $story);

        $file_numrows = $fileHandler->News_FileCount();

        if ($file_numrows > $file['limit']) {
            $file_pagenav = new XoopsPageNav($file_numrows, $file['limit'], $file['start'], 'start', 'limit=' . $file['limit']);
            $file_pagenav = $file_pagenav->renderNav(4);
        } else {
            $file_pagenav = '';
        }

        $xoopsTpl->assign('navigation', 'file');
        $xoopsTpl->assign('navtitle', _VNEWS_MI_FILE);
        $xoopsTpl->assign('files', $files);
        $xoopsTpl->assign('file_pagenav', $file_pagenav);
        $xoopsTpl->assign('xoops_dirname', $moduleDirName);

        // Call template file
        //        $xoopsTpl->display(XOOPS_ROOT_PATH . "/modules/$moduleDirName/templates/admin/vnews_file.tpl");

        break;
}

$xoopsTpl->assign('navigation', 'file');
$xoopsTpl->assign('navtitle', _VNEWS_MI_FILE);

$xoopsTpl->display(XOOPS_ROOT_PATH . "/modules/$moduleDirName/templates/admin/vnews_file.tpl");
// Display Xoops footer
include __DIR__ . '/footer.php';
xoops_cp_footer();
