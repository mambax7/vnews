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
 * News print file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// Include module header
require_once __DIR__ . '/header.php';

if (isset($_REQUEST['storyid'])) {
    $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'storyid', 0, 'int');
} else {
    $story_alias = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story', 0, 'string');
    if ($story_alias) {
        $story_id = $storyHandler->News_StoryGetId($story_alias);
    }
}

// Initialize template
$xoopsTpl = new XoopsTpl();

$obj = $storyHandler->get($story_id);

$page        = [];
$page        = $obj->toArray();
$story_topic = $obj->getVar('story_topic');

if (isset($story_topic) && $story_topic > 0) {
    $view_topic = $topicHandler->get($story_topic);

    if (!isset($view_topic)) {
        redirect_header('index.php', 3, _VNEWS_MD_TOPIC_ERROR);
    }

    if ($view_topic->getVar('topic_online') == '0') {
        redirect_header('index.php', 3, _VNEWS_MD_TOPIC_ERROR);
    }

    // Check the access permission
    if (!$permHandler->News_PermissionIsAllowed($xoopsUser, 'vnews_view', $view_topic->getVar('topic_id'))) {
        redirect_header('index.php', 3, _NOPERM);
    }

    if ($GLOBALS['xoopsModuleConfig']['disp_option'] && $view_topic->getVar('topic_showprint') == '0') {
        redirect_header('index.php', 3, _NOPERM);
    } elseif ($GLOBALS['xoopsModuleConfig']['disp_printlink'] == '0') {
        redirect_header('index.php', 3, _NOPERM);
    }
}

$page['title']    = $obj->getVar('story_title');
$page['alias']    = $obj->getVar('story_alias');
$page['short']    = $obj->getVar('story_short');
$page['text']     = $obj->getVar('story_text');
$page['img']      = $obj->getVar('story_img');
$page['thumburl'] = XOOPS_URL . '/uploads/vnews/image/thumb/' . $obj->getVar('story_img');
$page['author']   = XoopsUser::getUnameFromId($obj->getVar('story_uid'));
$page['date']     = formatTimestamp($obj->getVar('story_create'), _MEDIUMDATESTRING);
$page['link']     = VnewsUtils::News_UtilityStoryUrl($page);

$xoopsTpl->assign('content', $page);
$xoopsTpl->assign('module', 'vnews');
$xoopsTpl->assign('imgwidth', $GLOBALS['xoopsModuleConfig']['imgwidth']);
$xoopsTpl->assign('imgfloat', $GLOBALS['xoopsModuleConfig']['imgfloat']);

// Index Variable
$xoopsTpl->assign('xoops_sitename', $xoopsConfig['sitename']);
$xoopsTpl->assign('xoops_pagetitle', $page['title']);
$xoopsTpl->assign('meta_author', XoopsUser::getUnameFromId($obj->getVar('story_uid')));
$xoopsTpl->assign('meta_copyright', $xoopsConfig['sitename']);
$xoopsTpl->assign('meta_keywords', $obj->getVar('story_words'));
$xoopsTpl->assign('meta_description', $obj->getVar('story_desc'));

// Set xoops page title
$xoopsTpl->assign('xoops_pagetitle', $page['title']);

// Set local style
if (file_exists(XOOPS_ROOT_PATH . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/style.css')) {
    $xoopsTpl->assign('localstyle', XOOPS_URL . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/style.css');
} else {
    $xoopsTpl->assign('localstyle', XOOPS_URL . '/language/english/style.css');
}

// Print page config
$xoopsTpl->assign('print_logo', $GLOBALS['xoopsModuleConfig']['print_logo']);
$xoopsTpl->assign('print_logofloat', $GLOBALS['xoopsModuleConfig']['print_logofloat']);
$xoopsTpl->assign('print_logourl', XOOPS_URL . $GLOBALS['xoopsModuleConfig']['print_logourl']);
$xoopsTpl->assign('print_img', $GLOBALS['xoopsModuleConfig']['print_img']);
$xoopsTpl->assign('print_short', $GLOBALS['xoopsModuleConfig']['print_short']);
$xoopsTpl->assign('print_text', $GLOBALS['xoopsModuleConfig']['print_text']);
$xoopsTpl->assign('print_date', $GLOBALS['xoopsModuleConfig']['print_date']);
$xoopsTpl->assign('print_author', $GLOBALS['xoopsModuleConfig']['print_author']);
$xoopsTpl->assign('print_link', $GLOBALS['xoopsModuleConfig']['print_link']);
$xoopsTpl->assign('print_title', $GLOBALS['xoopsModuleConfig']['print_title']);
$xoopsTpl->assign('print_columns', $GLOBALS['xoopsModuleConfig']['print_columns']);

// Display print page
echo $xoopsTpl->fetch(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getInfo('dirname') . '/templates/vnews_print.tpl');
