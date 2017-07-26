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
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

// Include module header
require dirname(__FILE__) . '/header.php';
// Include content template
$xoopsOption ['template_main'] = 'vnews_index.tpl';
// include Xoops header
include XOOPS_ROOT_PATH . '/header.php';
// Add Stylesheet
$xoTheme->addStylesheet ( XOOPS_URL . '/modules/vnews/assets/css/style.css' );

global $xoopsUser;
if (isset ( $_REQUEST ["user"] )) {
    $story_user = VnewsUtils::News_UtilityCleanVars ( $_REQUEST, 'user', 0, 'int' );
} else {
    $story_user = null;
}

if (isset ( $_REQUEST ["storytopic"] )) {
    $story_topic = VnewsUtils::News_UtilityCleanVars ( $_REQUEST, 'storytopic', 0, 'int' );
} elseif (isset ($_REQUEST ["topic"])) {
    $topic_alias = VnewsUtils::News_UtilityCleanVars ( $_REQUEST, 'topic', 0, 'string' );
    $story_topic = $topic_handler->News_TopicGetId($topic_alias);
} else {
    $story_topic = null;
}

if (isset ( $story_topic )) {
    $topics = $topic_handler->getall ( $story_topic );
    $view_topic = $topics[$story_topic];
    if (! isset ( $view_topic )) {
        redirect_header ( 'index.php', 3, _VNEWS_MD_ERROR_TOPIC );
        exit ();
    }

    if ($view_topic->getVar ( 'topic_online' ) == '0') {
        redirect_header ( 'index.php', 3, _VNEWS_MD_ERROR_TOPIC );
        exit ();
    }

    // Check the access permission
    if (! $perm_handler->News_PermissionIsAllowed ( $xoopsUser, 'vnews_view', $view_topic->getVar ( 'topic_id' ))) {
        redirect_header ( "index.php", 3, _NOPERM );
        exit ();
    }

    // get topic information
    $topic_title = $default_title = $view_topic->getVar ( 'topic_title' );
    $topic_alias = $default_alias = $view_topic->getVar ( 'topic_alias' );
    $topic_id = $default_id = $view_topic->getVar ( 'topic_id' );
    $topic_img = $view_topic->getVar ( 'topic_img' );
    $topic_thumb = XOOPS_URL . xoops_getModuleOption ( 'img_dir', 'vnews' ) .'/thumb/'. $view_topic->getVar ( 'topic_img' );
    $topic_medium = XOOPS_URL . xoops_getModuleOption ( 'img_dir', 'vnews' ) .'/medium/'. $view_topic->getVar ( 'topic_img' );
    $topic_desc = $view_topic->getVar ( 'topic_desc' );

    $xoopsTpl->assign ( 'topic_desc', $topic_desc );
   $xoopsTpl->assign ( 'topic_img', $topic_img );
   $xoopsTpl->assign ( 'topic_thumb', $topic_thumb );
   $xoopsTpl->assign ( 'topic_medium', $topic_medium );
    $xoopsTpl->assign ( 'topic_title', $topic_title );
    $xoopsTpl->assign ( 'xoops_pagetitle', $topic_title );

    if ($view_topic->getVar ( 'topic_showtype' ) > '0') {
        $showtype = $view_topic->getVar ( 'topic_showtype' );
    } else {
        $showtype = xoops_getModuleOption ( 'showtype', 'vnews' );
    }

    if ($view_topic->getVar ( 'topic_columns' ) > '0') {
        $columns = $view_topic->getVar ( 'topic_columns' );
    } else {
        $columns = xoops_getModuleOption ( 'columns', 'vnews' );
    }

    if ($view_topic->getVar ( 'topic_perpage' ) > '0') {
        $story_perpage = $view_topic->getVar ( 'topic_perpage' );
    } else {
        $story_perpage = xoops_getModuleOption ( 'perpage', 'vnews' );
    }
    $type = 'type'.$view_topic->getVar ( 'topic_homepage' );

    $story_subtopic = $topic_handler->News_TopicSubId($story_topic , $topics);

    // Add topic style if set
    if (file_exists(XOOPS_ROOT_PATH .'/modules/vnews/assets/css/' . $view_topic->getVar ( 'topic_style' ) . '.css')) {
        $xoTheme->addStylesheet ( XOOPS_URL . '/modules/vnews/assets/css/' . $view_topic->getVar ( 'topic_style' ) . '.css');
    }

} else {

    // get all topic informations
    $topics = $topic_handler->getall ();
    $default_title = xoops_getModuleOption ( 'static_name', 'vnews' );
    $default_alias = VnewsUtils::News_UtilityAliasFilter($default_title);
    $topic_id = $default_id = '0';
    // get module configs
    $showtype = xoops_getModuleOption ( 'showtype', 'vnews' );
    $columns = xoops_getModuleOption ( 'columns', 'vnews' );
    $story_perpage = xoops_getModuleOption ( 'perpage', 'vnews' );
    $type = xoops_getModuleOption ( 'homepage', 'vnews' );
    $story_subtopic = null;
}

// get module configs
$story_order = xoops_getModuleOption ( 'showorder', 'vnews' );
$story_sort = xoops_getModuleOption ( 'showsort', 'vnews' );

// get limited information
if (isset ( $_REQUEST ['limit'] )) {
    $story_limit = VnewsUtils::News_UtilityCleanVars ( $_REQUEST, 'limit', 0, 'int' );
} else {
    $story_limit = $story_perpage;
}

// get start information
if (isset ( $_REQUEST ['start'] )) {
    $story_start = VnewsUtils::News_UtilityCleanVars ( $_REQUEST, 'start', 0, 'int' );
} else {
    $story_start = 0;
}

$story_infos = array ('topics' => $topics, 'story_limit' => $story_limit, 'story_topic' => $story_topic, 'story_user' => $story_user, 'story_start' => $story_start, 'story_order' => $story_order, 'story_sort' => $story_sort, 'story_status' => '1', 'story_subtopic' => $story_subtopic , 'id' => $default_id, 'title' => $default_title , 'alias' => $default_alias);

// Get Information for Show in indexpage or topic pages
$stores = VnewsUtils::News_UtilityHomePage ($story_infos, $type );

if (isset($stores ['pagenav'])) {
    $pagenav = $stores ['pagenav'];
} else {
    $pagenav = null;
}

$info = array();
if (isset ( $story_topic ) && $story_topic > 0 && $view_topic->getVar ( 'topic_showtype' ) != '0') { // The option for select setting from topic or module options must be added
    if ($view_topic->getVar ( 'topic_showauthor' )) {
        $info ['author'] = '1';
    }
    if ($view_topic->getVar ( 'topic_showdate' )) {
        $info ['date'] = '1';
    }
    if ($view_topic->getVar ( 'topic_showhits' )) {
        $info ['hits'] = '1';
    }
    if ($view_topic->getVar ( 'topic_showcoms' )) {
        $info ['coms'] = '1';
    }
    if ($view_topic->getVar ( 'topic_showtopic' )) {
        $info ['showtopic'] = '1';
    }
    if ($view_topic->getVar ( 'topic_showsub' )) {
        $info ['subtopic'] = '1';
    }
} else {
    if (xoops_getModuleOption ( 'disp_date', 'vnews' )) {
        $info ['date'] = '1';
    }
    if (xoops_getModuleOption ( 'disp_author', 'vnews' )) {
        $info ['author'] = '1';
    }
    if (xoops_getModuleOption ( 'disp_hits', 'vnews' )) {
        $info ['hits'] = '1';
    }
    if (xoops_getModuleOption ( 'disp_coms', 'vnews' )) {
        $info ['coms'] = '1';
    }
    if (xoops_getModuleOption ( 'disp_topic', 'vnews' )) {
        $info ['showtopic'] = '1';
    }
    if (xoops_getModuleOption ( 'disp_sub', 'vnews' )) {
        $info ['subtopic'] = '1';
    }
}

if (xoops_getModuleOption ( 'img_lightbox', 'vnews' )) {
    // Add scripts
    $xoTheme->addScript ( 'browse.php?Frameworks/jquery/jquery.js' );
    $xoTheme->addScript ( 'browse.php?Frameworks/jquery/plugins/jquery.lightbox.js' );
    // Add Stylesheet
    $xoTheme->addStylesheet ( XOOPS_URL . '/modules/system/css/lightbox.css' );
    $xoopsTpl->assign ( 'img_lightbox', true );
}

// set language
if (file_exists ( XOOPS_ROOT_PATH . '/modules/vnews/language/' . $GLOBALS ['xoopsConfig'] ['language'] . '/main.php' )) {
    $xoopsTpl->assign ( 'xoops_language', $GLOBALS ['xoopsConfig'] ['language'] );
} else {
    $xoopsTpl->assign ( 'xoops_language', 'english' );
}

// breadcrumb
if (xoops_getModuleOption ( 'bc_show', 'vnews' )) {
    $breadcrumb = VnewsUtils::News_UtilityBreadcrumb (false, '', $topic_id, ' &raquo; ', 'topic_title' );
}

// sub topic
if (isset($info['subtopic']) && $info['subtopic'] == '1') {
    $sub_topic = $topic_handler->News_TopicSubIdList($story_topic);
   $xoopsTpl->assign ('sub_topic', $sub_topic);
}

// Get default content
$default_info = array ('id' => $default_id, 'title' => $default_title , 'alias' => $default_alias);
$stores ['default'] = $story_handler->News_StoryDefault ($default_info );

// Set view
$xoopsTpl->assign ( 'story_topic', $story_topic );
$xoopsTpl->assign ( 'story_limit', $story_limit );
$xoopsTpl->assign ( 'showtype', $showtype );
$xoopsTpl->assign ( 'columns', $columns );
$xoopsTpl->assign ( 'story_pagenav', $pagenav );
$xoopsTpl->assign ( 'info', $info );
$xoopsTpl->assign ( 'contents', $stores ['content'] );
$xoopsTpl->assign ( 'rss', xoops_getModuleOption ( 'rss_show', 'vnews' ) );
$xoopsTpl->assign ( 'imgwidth', xoops_getModuleOption ( 'imgwidth', 'vnews' ) );
$xoopsTpl->assign ( 'imgfloat', xoops_getModuleOption ( 'imgfloat', 'vnews' ) );
$xoopsTpl->assign ( 'alluserpost', xoops_getModuleOption ( 'alluserpost', 'vnews' ) );
$xoopsTpl->assign ( 'breadcrumb', $breadcrumb );
$xoopsTpl->assign ( 'type', $type );
$xoopsTpl->assign ( 'default', $stores ['default'] );
$xoopsTpl->assign ( 'advertisement', xoops_getModuleOption ( 'advertisement', 'vnews' ) );

// include Xoops footer
include XOOPS_ROOT_PATH . '/footer.php';
