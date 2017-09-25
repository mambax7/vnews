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
require_once XOOPS_ROOT_PATH . '/class/xoopstopic.php';
require_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
require_once XOOPS_ROOT_PATH . '/class/xoopsform/grouppermform.php';

// Display Admin header
xoops_cp_header();
$moduleDirName = basename(dirname(__DIR__));

// Check admin have access to this page
$group  = $xoopsUser->getGroups();
$groups = xoops_getModuleOption('admin_groups', $moduleDirName);
if (count(array_intersect($group, $groups)) <= 0) {
    redirect_header('index.php', 3, _NOPERM);
}

// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

$permtoset                = isset($_POST['permtoset']) ? (int)$_POST['permtoset'] : 1;
$selected                 = ['', '', ''];
$selected[$permtoset - 1] = ' selected';

$xoopsTpl->assign('selected0', $selected[0]);
$xoopsTpl->assign('selected1', $selected[1]);
$xoopsTpl->assign('selected2', $selected[2]);

$module_id = $xoopsModule->getVar('mid');

switch ($permtoset) {
    case 1:
        $title_of_form      = _VNEWS_AM_PERMISSIONS_GLOBAL;
        $perm_name          = 'vnews_ac';
        $perm_desc          = '';
        $global_perms_array = [
            //'4' => _VNEWS_AM_PERMISSIONS_GLOBAL_4, //we add Rate system for next version
            '8'  => _VNEWS_AM_PERMISSIONS_GLOBAL_8,
            '16' => _VNEWS_AM_PERMISSIONS_GLOBAL_16
        ];
        break;
    case 2:
        $title_of_form = _VNEWS_AM_PERMISSIONS_ACCESS;
        $perm_name     = 'vnews_view';
        $perm_desc     = '';
        break;

    case 3:
        $title_of_form = _VNEWS_AM_PERMISSIONS_SUBMIT;
        $perm_name     = 'vnews_submit';
        $perm_desc     = '';
        break;

    case 4:
        $title_of_form = _VNEWS_AM_PERMISSIONS_APPROVE;
        $perm_name     = 'vnews_approve';
        $perm_desc     = '';
        break;
}

$permform = new XoopsGroupPermForm($title_of_form, $module_id, $perm_name, $perm_desc, 'admin/permissions.php');

if (1 == $permtoset) {
    foreach ($global_perms_array as $perm_id => $perm_name) {
        $permform->addItem($perm_id, $perm_name);
    }
    $xoopsTpl->assign('permform', $permform->render());
} else {
    $xt        = new XoopsTopic($xoopsDB->prefix('vnews_topic'));
    $alltopics =& $xt->getTopicsList();

    foreach ($alltopics as $topic_id => $topic) {
        $permform->addItem($topic_id, $topic['title'], $topic['pid']);
    }

    //check if topics exist before rendering the form and redirect, if there are no topics
    if ($topicHandler->News_TopicCount()) {
        $xoopsTpl->assign('permform', $permform->render());
    } else {
        VnewsUtils::News_UtilityRedirect('topic.php?op=new_topic', 02, _VNEWS_AM_MSG_NOPERMSSET);
        // Include footer
        xoops_cp_footer();
        exit();
    }
}

$xoopsTpl->assign('navigation', 'permission');
$xoopsTpl->assign('navtitle', _VNEWS_MI_PERM);

// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/vnews/templates/admin/vnews_permissions.tpl');
unset($permform);

include __DIR__ . '/footer.php';
xoops_cp_footer();
