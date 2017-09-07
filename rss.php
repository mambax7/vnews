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
 * News index file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// Include module header
require_once __DIR__ . '/header.php';

error_reporting(0);
$GLOBALS['xoopsLogger']->activated = false;

if (function_exists('mb_http_output')) {
    mb_http_output('pass');
}
header('Content-Type:text/xml; charset=utf-8');
$xoopsTpl = new XoopsTpl();
$xoopsTpl->xoops_setCaching(2);
$xoopsTpl->xoops_setCacheTime($GLOBALS['xoopsModuleConfig']['rss_timecache'] * 1);
$myts = MyTextSanitizer::getInstance();
if (!$xoopsTpl->is_cached('db:vnews_rss.tpl')) {
    if ($story_topic != 0) {
        $channel_category .= ' > ' . $topic_obj->getVar('topic_title');
    } else {
        $channel_category = 'vnews';
    }
    // Check if ML Hack is installed, and if yes, parse the $story in formatForML
    if (method_exists($myts, 'formatForML')) {
        $xoopsConfig['sitename'] = $myts->formatForML($xoopsConfig['sitename']);
        $xoopsConfig['slogan']   = $myts->formatForML($xoopsConfig['slogan']);
        $channel_category        = $myts->formatForML($channel_category);
    }
    $xoopsTpl->assign('channel_charset', _CHARSET);
    $xoopsTpl->assign('docs', 'http://cyber.law.harvard.edu/rss/rss.html');
    $xoopsTpl->assign('channel_title', htmlspecialchars($xoopsConfig['sitename'], ENT_QUOTES));
    $xoopsTpl->assign('channel_link', XOOPS_URL . '/');
    $xoopsTpl->assign('channel_desc', htmlspecialchars($xoopsConfig['slogan'], ENT_QUOTES));
    $xoopsTpl->assign('channel_lastbuild', formatTimestamp(time(), 'rss'));
    $xoopsTpl->assign('channel_webmaster', $xoopsConfig['adminmail']);
    $xoopsTpl->assign('channel_editor', $xoopsConfig['adminmail']);
    $xoopsTpl->assign('channel_category', htmlspecialchars($channel_category));
    $xoopsTpl->assign('channel_generator', 'vnews');
    $xoopsTpl->assign('channel_language', _LANGCODE);
    //$xoopsTpl->assign('pubDate', formatTimestamp($story_create, 'rss'));
    $xoopsTpl->assign('image_url', XOOPS_URL . $GLOBALS['xoopsModuleConfig']['rss_logo']);
    $dimention = getimagesize(XOOPS_ROOT_PATH . $GLOBALS['xoopsModuleConfig']['rss_logo']);

    if (empty($dimention[0])) {
        $width  = 140;
        $height = 140;
    } else {
        $width        = ($dimention[0] > 140) ? 140 : $dimention[0];
        $dimention[1] = $dimention[1] * $width / $dimention[0];
        $height       = ($dimention[1] > 140) ? $dimention[1] * $dimention[0] / 140 : $dimention[1];
    }

    $xoopsTpl->assign('image_width', $width);
    $xoopsTpl->assign('image_height', $height);

    if (isset($_REQUEST['user'])) {
        $story_user = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'user', 0, 'int');
    } else {
        $story_user = null;
    }

    if (isset($_REQUEST['topic'])) {
        $story_topic = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic', 0, 'int');
    } else {
        $story_topic = null;
    }

    if ($story_topic != 0) {
        $permHandler = VnewsPermission::getHandler();
        if ($permHandler->News_PermissionIsAllowed($xoopsUser, 'vnews_view', $story_topic)) {
            $topic_obj = $topicHandler->get($story_topic);
        }
    }

    $story_infos = [
        'topics'       => $topicHandler->getall($story_topic), // get all topic informations
        'story_limit'  => $GLOBALS['xoopsModuleConfig']['rss_perpage'],
        'story_topic'  => $story_topic,
        'story_user'   => $story_user,
        'story_start'  => 0,
        'story_order'  => 'DESC',
        'story_sort'   => 'story_publish',
        'story_status' => '1',
        'story_static' => true,
        'admin_side'   => false
    ];

    $stores = $storyHandler->News_StoryList($story_infos);

    $xoopsTpl->assign('contents', $stores);
}
$xoopsTpl->display('db:vnews_rss.tpl');
