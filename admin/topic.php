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
// Define default value
$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', '', 'string');
// Initialize content handler
$topicHandler = xoops_getModuleHandler('topic', 'vnews');
$storyHandler = xoops_getModuleHandler('story', 'vnews');
// Define scripts
$xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
$xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.ui.js');
$xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/order.js');
$xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/admin.js');
// Add module stylesheet

$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/ui/' . xoops_getModuleOption('jquery_theme', 'system') . '/ui.all.css');

$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

switch ($op) {
    case 'new_topic':
        $obj = $topicHandler->create();
        $obj->getForm();
        break;

    case 'edit_topic':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $obj = $topicHandler->get($topic_id);
            $obj->getForm();
        } else {
            VnewsUtils::News_UtilityRedirect('topic.php', 1, _VNEWS_AM_MSG_EDIT_ERROR);
        }
        break;

    case 'delete_topic':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $topic = $topicHandler->get($topic_id);
            // Prompt message
            VnewsUtils::News_UtilityMessage('backend.php', sprintf(_VNEWS_AM_MSG_DELETE, '"' . $topic->getVar('topic_title') . '"'), $topic_id, 'topic');
            // Display Admin footer
            xoops_cp_footer();
        }
        break;
    case 'order':
        if (isset($_POST['mod'])) {
            $i = 1;
            foreach ($_POST['mod'] as $order) {
                if ($order > 0) {
                    $storyorder = $topicHandler->get($order);
                    $storyorder->setVar('topic_weight', $i);
                    if (!$topicHandler->insert($storyorder)) {
                        $error = true;
                    }
                    ++$i;
                }
            }
        }
        exit;
        break;

    default:

        // get module configs
        $topic_perpage = $GLOBALS['xoopsModuleConfig']['admin_perpage_topic'];

        // get limited information
        if (isset($_REQUEST['limit'])) {
            $topic_limit = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'limit', 0, 'int');
        } else {
            $topic_limit = $topic_perpage;
        }

        // get start information
        if (isset($_REQUEST['start'])) {
            $topic_start = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start', 0, 'int');
        } else {
            $topic_start = 0;
        }

        $topics        = $topicHandler->News_TopicAdminList($topic_limit, $topic_start);
        $topic_numrows = $topicHandler->News_TopicCount();

        if ($topic_numrows > $topic_limit) {
            $topic_pagenav = new XoopsPageNav($topic_numrows, $topic_limit, $topic_start, 'start', 'limit=' . $topic_limit);
            $topic_pagenav = $topic_pagenav->renderNav(4);
        } else {
            $topic_pagenav = '';
        }

        $xoopsTpl->assign('navigation', 'topic');
        $xoopsTpl->assign('navtitle', _VNEWS_MI_TOPIC);
        $xoopsTpl->assign('topics', $topics);
        $xoopsTpl->assign('topic_pagenav', $topic_pagenav);
        $xoopsTpl->assign('xoops_dirname', 'vnews');

        // Call template file
        $xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/vnews/templates/admin/vnews_topic.tpl');

        break;
}

// Admin Footer
include __DIR__ . '/footer.php';
xoops_cp_footer();
