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
 * News topic file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// Include module header
require_once __DIR__ . '/header.php';
// Include content template
$xoopsOption ['template_main'] = 'vnews_topic.tpl';
// include Xoops header
include XOOPS_ROOT_PATH . '/header.php';
// Add Stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/style.css');

// get limited information
if (isset($_REQUEST['limit'])) {
    $topic_limit = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'limit', 0, 'int');
} else {
    $topic_limit = $GLOBALS['xoopsModuleConfig']['admin_perpage_topic'];
}

// get start information
if (isset($_REQUEST['start'])) {
    $topic_start = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'start', 0, 'int');
} else {
    $topic_start = 0;
}

$newscountbytopic = $storyHandler->News_StoryCountByTopic();
$topics           = $topicHandler->News_TopicList($topic_limit, $topic_start, $newscountbytopic);
$topic_numrows    = $topicHandler->News_TopicCount();

if ($topic_numrows > $topic_limit) {
    $topic_pagenav = new XoopsPageNav($topic_numrows, $topic_limit, $topic_start, 'start', 'limit=' . $topic_limit);
    $topic_pagenav = $topic_pagenav->renderNav(4);
} else {
    $topic_pagenav = '';
}

if (xoops_getModuleOption('img_lightbox', 'vnews')) {
    // Add scripts
    $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
    $xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.lightbox.js');
    // Add Stylesheet
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/lightbox.css');
    $xoopsTpl->assign('img_lightbox', true);
}

// breadcrumb
if (xoops_getModuleOption('bc_show', 'vnews')) {
    $breadcrumb = VnewsUtils::News_UtilityBreadcrumb('topic.php', _VNEWS_MD_TOPICS, 0, ' &raquo; ');
    $xoopsTpl->assign('breadcrumb', $breadcrumb);
}

$xoopsTpl->assign('topics', $topics);
$xoopsTpl->assign('topic_pagenav', $topic_pagenav);
$xoopsTpl->assign('advertisement', xoops_getModuleOption('advertisement', 'vnews'));
$xoopsTpl->assign('imgwidth', xoops_getModuleOption('imgwidth', 'vnews'));
$xoopsTpl->assign('imgfloat', xoops_getModuleOption('imgfloat', 'vnews'));

// include Xoops footer
include XOOPS_ROOT_PATH . '/footer.php';
