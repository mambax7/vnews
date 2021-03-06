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
// Include content template
$xoopsOption ['template_main'] = 'vnews_article.tpl';
// include Xoops header
include XOOPS_ROOT_PATH . '/header.php';
// Add Stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/style.css');

// get story id
if (isset($_REQUEST['storyid'])) {
    $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'storyid', 0, 'int');
} else {
    $story_alias = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story', 0, 'string');
    if ($story_alias) {
        $_GET['storyid'] = $story_id = $storyHandler->News_StoryGetId($story_alias);
    }
}

if (empty($story_id)) {
    redirect_header('index.php', 3, _VNEWS_MD_ERROR_EXIST);
}

$story = [];
$obj   = $storyHandler->get($story_id);

if (!$obj) {
    redirect_header('index.php', 3, _VNEWS_MD_ERROR_EXIST);
}

$story_topic = $obj->getVar('story_topic');

if (!$obj->getVar('story_status')) {
    redirect_header('index.php', 3, _VNEWS_MD_ERROR_STATUS);
}

$story = $obj->toArray();

// Update content hits
$storyHandler->News_StoryUpdateHits($story_id);

// set arrey
$view_topic              = $topicHandler->get($story_topic);
$story ['topic']         = $view_topic->getVar('topic_title');
$story ['topic_alias']   = $view_topic->getVar('topic_alias');
$story ['topic_id']      = $view_topic->getVar('topic_id');
$story ['story_publish'] = formatTimestamp($story ['story_publish'], _MEDIUMDATESTRING);
$story ['story_update']  = formatTimestamp($story ['story_update'], _MEDIUMDATESTRING);
$story ['imageurl']      = XOOPS_URL . '/uploads/vnews/image/medium/' . $story ['story_img'];
$story ['thumburl']      = XOOPS_URL . '/uploads/vnews/image/thumb/' . $story ['story_img'];

if (isset($story_topic) && $story_topic > 0) {
    if (!isset($view_topic)) {
        redirect_header('index.php', 3, _VNEWS_MD_TOPIC_ERROR);
    }

    if ('0' == $view_topic->getVar('topic_online')) {
        redirect_header('index.php', 3, _VNEWS_MD_TOPIC_ERROR);
    }

    // Check the access permission
    if (!$permHandler->News_PermissionIsAllowed($xoopsUser, 'vnews_view', $view_topic->getVar('topic_id'))) {
        redirect_header('index.php', 3, _NOPERM);
    }
}

$link = [];

if (isset($story_topic) && $story_topic > 0
    && '0' != $view_topic->getVar('topic_showtype')) { // The option for select setting from topic or module options must be added

    // get topic confing from topic
    if ($view_topic->getVar('topic_showtopic')) {
        $link ['topic']     = $view_topic->getVar('topic_title');
        $link ['topicid']   = $story_topic;
        $link ['topicshow'] = '1';
    }
    if ($view_topic->getVar('topic_showauthor')) {
        $story ['author'] = XoopsUser::getUnameFromId($obj->getVar('story_uid'));
    }
    if ($view_topic->getVar('topic_showdate')) {
        $link ['date'] = '1';
    }
    if ($view_topic->getVar('topic_showpdf')) {
        $link ['pdf'] = VnewsUtils::News_UtilityStoryUrl($story, 'pdf');
    }
    if ($view_topic->getVar('topic_showprint')) {
        $link ['print'] = VnewsUtils::News_UtilityStoryUrl($story, 'print');
    }
    if ($view_topic->getVar('topic_showhits')) {
        $link ['hits'] = '1';
    }
    if ('1' == $view_topic->getVar('topic_showcoms')) {
        $link ['coms'] = '1';
    }
    if ($view_topic->getVar('topic_showmail')) {
        // Mail link & label
        $link ['mail_subject'] = $story ['story_title'] . ' - ' . $xoopsConfig ['sitename'];
        $link ['mail_linkto']  = VnewsUtils::News_UtilityStoryUrl($story);
        if (xoops_getModuleOption('tellafriend')) {
            $link ['mail'] = 'mailto:|xoops_tellafriend:' . $link ['mail_subject'];
        } else {
            $link ['mail'] = 'mailto:?subject=' . $link ['mail_subject'] . '&amp;body=' . $link ['mail_linkto'];
        }
    }
    if ($view_topic->getVar('topic_shownav')) {
        if (0 != $obj->getVar('story_next')) {
            $next_obj            = $storyHandler->get($obj->getVar('story_next'));
            $next_link           = $next_obj->toArray();
            $next_link ['topic'] = $story ['topic'];
            $link ['next']       = VnewsUtils::News_UtilityStoryUrl($next_link);
            $link ['next_title'] = $next_link ['story_title'];
        }
        if (0 != $obj->getVar('story_prev')) {
            $prev_obj            = $storyHandler->get($obj->getVar('story_prev'));
            $prev_link           = $prev_obj->toArray();
            $prev_link ['topic'] = $story ['topic'];
            $link ['prev']       = VnewsUtils::News_UtilityStoryUrl($prev_link);
            $link ['prev_title'] = $prev_link ['story_title'];
        }
    }
} else {

    // get topic config from module option
    if (xoops_getModuleOption('disp_topic')) {
        $link ['topic']   = $view_topic->getVar('topic_title');
        $link ['topicid'] = $story_topic;
        if ($story_topic) {
            $link ['topicshow'] = '1';
        } else {
            $link ['topicshow'] = '0';
        }
    }
    if (xoops_getModuleOption('disp_date', 'vnews')) {
        $link ['date'] = XoopsUser::getUnameFromId($obj->getVar('story_publish'));
    }
    if (xoops_getModuleOption('disp_author', 'vnews')) {
        $story ['author'] = XoopsUser::getUnameFromId($obj->getVar('story_uid'));
    }
    if (xoops_getModuleOption('disp_pdflink', 'vnews')) {
        $link ['pdf'] = VnewsUtils::News_UtilityStoryUrl($story, 'pdf');
    }
    if (xoops_getModuleOption('disp_printlink', 'vnews')) {
        $link ['print'] = VnewsUtils::News_UtilityStoryUrl($story, 'print');
    }
    if (xoops_getModuleOption('disp_hits', 'vnews')) {
        $link ['hits'] = '1';
    }
    if (xoops_getModuleOption('disp_coms', 'vnews')) {
        $link ['coms'] = '1';
    }
    if (xoops_getModuleOption('disp_maillink', 'vnews')) {
        // Mail link & label
        $link ['mail_subject'] = $story ['story_title'] . ' - ' . $xoopsConfig ['sitename'];
        $link ['mail_linkto']  = VnewsUtils::News_UtilityStoryUrl($story);
        if (xoops_getModuleOption('tellafriend', 'vnews')) {
            $link ['mail'] = 'mailto:|xoops_tellafriend:' . $link ['mail_subject'];
        } else {
            $link ['mail'] = 'mailto:?subject=' . $link ['mail_subject'] . '&amp;body=' . $link ['mail_linkto'];
        }
    }
    if (xoops_getModuleOption('disp_navlink', 'vnews')) {
        if (0 != $obj->getVar('story_next')) {
            $next_obj            = $storyHandler->get($obj->getVar('story_next'));
            $next_link           = $next_obj->toArray();
            $next_link ['topic'] = $story ['topic'];
            $link ['next']       = VnewsUtils::News_UtilityStoryUrl($next_link);
            $link ['next_title'] = $next_link ['story_title'];
        }
        if (0 != $obj->getVar('story_prev')) {
            $prev_obj            = $storyHandler->get($obj->getVar('story_prev'));
            $prev_link           = $prev_obj->toArray();
            $prev_link ['topic'] = $story ['topic'];
            $link ['prev']       = VnewsUtils::News_UtilityStoryUrl($prev_link);
            $link ['prev_title'] = $prev_link ['story_title'];
        }
    }
}

if (xoops_getModuleOption('img_lightbox', 'vnews')) {
    // Add scripts
    $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
    $xoTheme->addScript('browse.php?Frameworks/jquery/plugins/jquery.lightbox.js');
    // Add Stylesheet
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/lightbox.css');
    $xoopsTpl->assign('img_lightbox', true);
}

if (file_exists(XOOPS_ROOT_PATH . '/modules/vnews/language/' . $GLOBALS ['xoopsConfig'] ['language'] . '/main.php')) {
    $xoopsTpl->assign('xoops_language', $GLOBALS ['xoopsConfig'] ['language']);
} else {
    $xoopsTpl->assign('xoops_language', 'english');
}

if (isset($xoTheme) && is_object($xoTheme)) {
    if ('' != $story ['story_words']) {
        $xoTheme->addMeta('meta', 'keywords', $story ['story_words']);
    }
    if ('' != $story ['story_desc']) {
        $xoTheme->addMeta('meta', 'description', $story ['story_desc']);
    }
} elseif (isset($xoopsTpl) && is_object($xoopsTpl)) { // Compatibility for old Xoops versions
    if ('' != $story ['story_words']) {
        $xoopsTpl->assign('xoops_meta_keywords', $story ['story_words']);
    }
    if ('' != $story ['story_desc']) {
        $xoopsTpl->assign('xoops_meta_description', $story ['story_desc']);
    }
}

// For social networks scripts
if ('1' == xoops_getModuleOption('show_social_book', 'vnews')
    || '3' == xoops_getModuleOption('show_social_book', 'vnews')) {
    $xoTheme->addScript('http://platform.twitter.com/widgets.js');
    $xoTheme->addScript('http://connect.facebook.net/en_US/all.js#xfbml=1');
    $xoTheme->addScript('https://apis.google.com/assets/js/plusone.js');
}

// For xoops tag
if (xoops_getModuleOption('usetag', 'vnews') && is_dir(XOOPS_ROOT_PATH . '/modules/tag')) {
    require_once XOOPS_ROOT_PATH . '/modules/tag/include/tagbar.php';
    $xoopsTpl->assign('tagbar', tagBar($story ['story_id'], $catid = 0));
    $xoopsTpl->assign('tags', true);
} else {
    $xoopsTpl->assign('tags', false);
}

// Get URLs
$link ['url']      = VnewsUtils::News_UtilityStoryUrl($story);
$link ['topicurl'] = VnewsUtils::News_UtilityTopicUrl($story);

// breadcrumb
if (xoops_getModuleOption('bc_show', 'vnews')) {
    $breadcrumb = VnewsUtils::News_UtilityBreadcrumb(true, $story ['story_title'], $story ['story_topic'], ' &raquo; ', 'topic_title');
}

// Get Attached files information
if ($story ['story_file'] > 0) {
    $file            = [];
    $file['order']   = 'DESC';
    $file['sort']    = 'file_id';
    $file['start']   = 0;
    $file['content'] = $story_id;
    $view_file       = $fileHandler->News_FileList($file);
    $xoopsTpl->assign('files', $view_file);
    $xoopsTpl->assign('jwwidth', '470');
    $xoopsTpl->assign('jwheight', '320');
}

// Get related contents
if (xoops_getModuleOption('related', 'vnews')) {
    $related_infos ['story_id']    = $obj->getVar('story_id');
    $related_infos ['story_topic'] = $obj->getVar('story_topic');
    $related_infos ['story_limit'] = xoops_getModuleOption('related_limit', 'vnews');
    $related_infos ['topic_alias'] = $view_topic->getVar('topic_alias');
    $related                       = $storyHandler->News_StoryRelated($related_infos);
    $xoopsTpl->assign('related', $related);
}

// Add topic style if set
if (file_exists(XOOPS_ROOT_PATH . '/modules/vnews/assets/css/' . $view_topic->getVar('topic_style') . '.css')) {
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/' . $view_topic->getVar('topic_style') . '.css');
}

// Vote system
if ($GLOBALS['xoopsModuleConfig']['vote_active']) {
    // Add scripts
    $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
    $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/rateit.js');
    // Add Stylesheet
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/rateit.css');
    $xoopsTpl->assign('vote', true);
}

$xoopsTpl->assign('content', $story);
$xoopsTpl->assign('link', $link);
$xoopsTpl->assign('xoops_pagetitle', $story ['story_title']);
$xoopsTpl->assign('rss', xoops_getModuleOption('rss_show', 'vnews'));
$xoopsTpl->assign('multiple_columns', xoops_getModuleOption('multiple_columns', 'vnews'));
$xoopsTpl->assign('show_social_book', xoops_getModuleOption('show_social_book', 'vnews'));
$xoopsTpl->assign('advertisement', xoops_getModuleOption('advertisement', 'vnews'));
$xoopsTpl->assign('imgwidth', xoops_getModuleOption('imgwidth', 'vnews'));
$xoopsTpl->assign('imgfloat', xoops_getModuleOption('imgfloat', 'vnews'));
$xoopsTpl->assign('alluserpost', xoops_getModuleOption('alluserpost', 'vnews'));
$xoopsTpl->assign('breadcrumb', $breadcrumb);

// include Xoops footer
include XOOPS_ROOT_PATH . '/include/comment_view.php';
include XOOPS_ROOT_PATH . '/footer.php';
