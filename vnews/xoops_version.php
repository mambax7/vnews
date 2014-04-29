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
 * vnews configuration file
 * Manage content page
 *
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

require dirname(__FILE__) . '/header.php';

$modversion = array(
    // Main setting
    'name' => _MI_VNEWS_NAME,
    'description' => _MI_VNEWS_DESC,
    'version' => 1.84,
    'author' => '',
    'credits' => '',
    'license' => 'GNU GPL 2.0',
    'license_url' => 'www.gnu.org/licenses/gpl-2.0.html/',
    'image' => 'assets/images/logo.png',
    'dirname' => 'vnews',
    'module_status' => "Alpha 1",
    'release_date' => '2014/04/26',
    'module_website_url' => "",
    'module_website_name' => "",
    'help' => 'page=help',
    // Admin things
    'system_menu' => 1,
    'hasAdmin' => 1,
    'adminindex' => 'admin/index.php',
    'adminmenu' => 'admin/menu.php',
    // Modules scripts
    'onInstall' => 'include/functions_install.php',
    'onUpdate' => 'include/functions_update.php',
    // Main menu
    'hasMain' => 1,
    // Recherche
    'hasSearch' => 1,
    // Commentaires
    'hasComments' => 1,
    // for module admin class
    'min_php' => '5.3.7',
    'min_xoops' => '2.5.7',
    'dirmoduleadmin' => 'Frameworks/moduleclasses',
     'icons16' => 'Frameworks/moduleclasses/icons/16',
     'icons32' => 'Frameworks/moduleclasses/icons/32',
     'min_db' => array('mysql'=>'5.0.7', 'mysqli'=>'5.0.7'),
     'min_admin' => '1.1'
);

// SQL
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "vnews_story";
$modversion['tables'][2] = "vnews_topic";
$modversion['tables'][3] = "vnews_file";
$modversion['tables'][4] = "vnews_rate";

//Recherche
$modversion["search"]["file"] = "include/search.inc.php";
$modversion["search"]["func"] = "vnews_search";

// Comments
$modversion['comments']['pageName'] = 'article.php';
$modversion['comments']['itemName'] = 'storyid';
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'vnews_com_approve';
$modversion['comments']['callback']['update'] = 'vnews_com_update';

// Templates
$modversion['templates'][] = array('file' => 'vnews_index.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_default.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_vnews.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_list.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_table.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_photo.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_index_topic.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_article.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_rss.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_bookmarkme.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_header.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_topic.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_topic_list.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_archive.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'vnews_submit.tpl', 'description' => '');

// Menu
$modversion['sub'][] = array(
    'name' => _VNEWS_MI_SUBMIT,
    'url' => 'submit.php');
$modversion['sub'][] = array(
    'name' => _VNEWS_MI_TOPIC,
    'url' => 'topic.php');
$modversion['sub'][] = array(
    'name' => _VNEWS_MI_ARCHIVE,
    'url' => 'archive.php');

// Blocks
$modversion['blocks'][] = array(
    'file' => 'page.php',
    'name' => _VNEWS_MI_BLOCK_PAGE,
    'description' => '',
    'show_func' => 'vnews_page_show',
    'edit_func' => 'vnews_page_edit',
    'options' => '0|vnews',
    'template' => 'vnews_block_page.tpl');

$modversion['blocks'][] = array(
    'file' => 'list.php',
    'name' => _VNEWS_MI_BLOCK_LIST,
    'description' => '',
    'show_func' => 'vnews_list_show',
    'edit_func' => 'vnews_list_edit',
    'options' => 'vnews|vnews|10|100|1|1|1|story_publish|180|left|DESC|0|'. XOOPS_URL.'|0|0',
    'template' => 'vnews_block_list.tpl');

$modversion['blocks'][] = array(
    'file' => 'topic.php',
    'name' => _VNEWS_MI_BLOCK_TOPIC,
    'description' => '',
    'show_func' => 'vnews_topic_show',
    'edit_func' => 'vnews_topic_edit',
    'options' => 'vnews|list|0|0|0|left|DESC|topic_id',
    'template' => 'vnews_block_topic.tpl');

$modversion['blocks'][] = array(
    'file' => 'slide.php',
    'name' => _VNEWS_MI_BLOCK_SLIDE,
    'description' => '',
    'show_func' => 'vnews_slide_show',
    'edit_func' => 'vnews_slide_edit',
    'options' => 'vnews|5|scrollable|50|200|400|200|180|180|0',
    'template' => 'vnews_block_slide.tpl');

$modversion['blocks'][] = array(
    'file' => 'marquee.php',
    'name' => _VNEWS_MI_BLOCK_MARQUEE,
    'description' => '',
    'show_func' => 'vnews_marquee_show',
    'edit_func' => 'vnews_marquee_edit',
    'options' => 'vnews|5|50|1|0',
    'template' => 'vnews_block_marquee.tpl');

// Settings
// Load class
xoops_load('xoopslists');

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_GENERAL',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'form_editor',
    'title' => '_VNEWS_MI_FORM_EDITOR',
    'description' => '_VNEWS_MI_FORM_EDITOR_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . '/class/xoopseditor'),
    'default' => 'dhtmltextarea');

// Get groups
$member_handler =& xoops_gethandler('member');
$xoopsgroups = $member_handler->getGroupList();
foreach ($xoopsgroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = array(
    'name' => 'groups',
    'title' => '_VNEWS_MI_GROUPS',
    'description' => '_VNEWS_MI_GROUPS_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'options' => $groups,
    'default' => $groups);

// Get Admin groups
$criteria = new CriteriaCompo ();
$criteria->add ( new Criteria ( 'group_type', 'Admin' ) );
$member_handler =& xoops_gethandler('member');
$admin_xoopsgroups = $member_handler->getGroupList($criteria);
foreach ($admin_xoopsgroups as $key => $admin_group) {
    $admin_groups[$admin_group] = $key;
}
$modversion['config'][] = array(
    'name' => 'admin_groups',
    'title' => '_VNEWS_MI_ADMINGROUPS',
    'description' => '_VNEWS_MI_ADMINGROUPS_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'options' => $admin_groups,
    'default' => $admin_groups);

$modversion['config'][] = array(
    'name' => 'advertisement',
    'title' => '_VNEWS_MI_ADVERTISEMENT',
    'description' => '_VNEWS_MI_ADVERTISEMENT_DESC',
    'formtype' => 'textarea',
    'valuetype' => 'text',
    'default' => '');

$modversion['config'][] = array(
    'name' => 'tellafriend',
    'title' => '_VNEWS_MI_TELLAFRIEND',
    'description' => '_VNEWS_MI_TELLAFRIEND_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => '0');

$modversion['config'][] = array(
    'name' => 'usetag',
    'title' => '_VNEWS_MI_USETAG',
    'description' => '_VNEWS_MI_USETAG_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_SEO',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'friendly_url',
    'title' => '_VNEWS_MI_FRIENDLYURL',
    'description' => '_VNEWS_MI_FRIENDLYURL_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_URL_STANDARD => 'none', _VNEWS_MI_URL_REWRITE => 'rewrite' , _VNEWS_MI_URL_SHORT => 'short' , _VNEWS_MI_URL_ID => 'id' , _VNEWS_MI_URL_TOPIC => 'topic'),
    'default' => 'id');

$modversion['config'][] = array(
    'name' => 'rewrite_mode',
    'title' => '_VNEWS_MI_REWRITEBASE',
    'description' => '_VNEWS_MI_REWRITEBASE_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_REWRITEBASE_MODS => '/modules/', _VNEWS_MI_REWRITEBASE_ROOT => '/'),
    'default' => '/modules/');

$modversion['config'][] = array(
    'name' => 'lenght_id',
    'title' => '_VNEWS_MI_LENGHTID',
    'description' => '_VNEWS_MI_LENGHTID_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9),
    'default' => '1');

$modversion['config'][] = array(
    'name' => 'rewrite_name',
    'title' => '_VNEWS_MI_REWRITENAME',
    'description' => '_VNEWS_MI_REWRITENAME_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'vnews');

$modversion['config'][] = array(
    'name' => 'rewrite_ext',
    'title' => '_VNEWS_MI_REWRITEEXT',
    'description' => '_VNEWS_MI_REWRITEEXT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '.html');

$modversion['config'][] = array(
    'name' => 'static_name',
    'title' => '_VNEWS_MI_STATICNAME',
    'description' => '_VNEWS_MI_STATICNAME_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'static');

$modversion['config'][] = array(
    'name' => 'topic_name',
    'title' => '_VNEWS_MI_TOPICNAME',
    'description' => '_VNEWS_MI_TOPICNAME_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'topic');

$modversion['config'][] = array(
    'name' => 'regular_expression',
    'title' => '_VNEWS_MI_REGULAR_EXPRESSION',
    'description' => '_VNEWS_MI_REGULAR_EXPRESSION_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => _VNEWS_MI_REGULAR_EXPRESSION_CONFIG);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_DISPLAY',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'homepage',
    'title' => '_VNEWS_MI_HOMEPAGE',
    'description' => '_VNEWS_MI_HOMEPAGE_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_HOMEPAGE_1 => 'type1', _VNEWS_MI_HOMEPAGE_2 => 'type2', _VNEWS_MI_HOMEPAGE_3 => 'type3', _VNEWS_MI_HOMEPAGE_4 => 'type4'),
    'default' => 'type1');

$modversion['config'][] = array(
    'name' => 'showtype',
    'title' => '_VNEWS_MI_SHOWTYPE',
    'description' => '_VNEWS_MI_SHOWTYPE_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'options' => array(_VNEWS_MI_SHOWTYPE_1 => '1', _VNEWS_MI_SHOWTYPE_2 => '2', _VNEWS_MI_SHOWTYPE_3 => '3', _VNEWS_MI_SHOWTYPE_4 => '4'),
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_date',
    'title' => '_VNEWS_MI_DISPDATE',
    'description' => '_VNEWS_MI_DISPDATE_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_topic',
    'title' => '_VNEWS_MI_DISPTOPIC',
    'description' => '_VNEWS_MI_DISPTOPIC_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_sub',
    'title' => '_VNEWS_MI_DISPSUB',
    'description' => '_VNEWS_MI_DISPSUB_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_author',
    'title' => '_VNEWS_MI_DISPAUTHOR',
    'description' => '_VNEWS_MI_DISPAUTHOR_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_navlink',
    'title' => '_VNEWS_MI_DISPNAV',
    'description' => '_VNEWS_MI_DISPNAV_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_pdflink',
    'title' => '_VNEWS_MI_DISPPDF',
    'description' => '_VNEWS_MI_DISPPDF_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_printlink',
    'title' => '_VNEWS_MI_DISPPRINT',
    'description' => '_VNEWS_MI_DISPPRINT_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_hits',
    'title' => '_VNEWS_MI_DISHITS',
    'description' => '_VNEWS_MI_DISHITS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_maillink',
    'title' => '_VNEWS_MI_DISPMAIL',
    'description' => '_VNEWS_MI_DISPMAIL_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'disp_coms',
    'title' => '_VNEWS_MI_DISPCOMS',
    'description' => '_VNEWS_MI_DISPCOMS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'perpage',
    'title' => '_VNEWS_MI_PERPAGE',
    'description' => '_VNEWS_MI_PERPAGE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 10);

$modversion['config'][] = array(
    'name' => 'columns',
    'title' => '_VNEWS_MI_COLUMNS',
    'description' => '_VNEWS_MI_COLUMNS_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'showsort',
    'title' => '_VNEWS_MI_SHOWSORT',
    'description' => '_VNEWS_MI_SHOWSORT_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_SHOWSORT_1 => 'story_id', _VNEWS_MI_SHOWSORT_2 => 'story_publish', _VNEWS_MI_SHOWSORT_3 => 'story_update', _VNEWS_MI_SHOWSORT_4 => 'story_title', _VNEWS_MI_SHOWSORT_5 => 'story_order', _VNEWS_MI_SHOWSORT_6 => 'RAND()' , _VNEWS_MI_SHOWSORT_7 => 'story_hits'),
    'default' => 'story_id');

$modversion['config'][] = array(
    'name' => 'showorder',
    'title' => '_VNEWS_MI_SHOWORDER',
    'description' => '_VNEWS_MI_SHOWORDER_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_DESC => 'DESC', _VNEWS_MI_ASC => 'ASC'),
    'default' => 'DESC');

$modversion['config'][] = array(
    'name' => 'show_social_book',
    'title' => '_VNEWS_MI_SOCIAL',
    'description' => '_VNEWS_MI_SOCIAL_DESC',
    'formtype' => 'select',
    'valuetype' => 'int',
    'options' => array(_VNEWS_MI_NONE => 0, _VNEWS_MI_SOCIALNETWORM => 1, _VNEWS_MI_BOOKMARK => 2, _VNEWS_MI_BOTH => 3),
    'default' => 0);

$modversion['config'][] = array(
    'name' => 'multiple_columns',
    'title' => '_VNEWS_MI_MULTIPLE_COLUMNS',
    'description' => '_VNEWS_MI_MULTIPLE_COLUMNS_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_MULTIPLE_COLUMNS_1 => 'onecolumn', _VNEWS_MI_MULTIPLE_COLUMNS_2 => 'twocolumn', _VNEWS_MI_MULTIPLE_COLUMNS_3 => 'threecolumn', _VNEWS_MI_MULTIPLE_COLUMNS_4 => 'forcolumn'),
    'default' => 'onecolumn');

$modversion['config'][] = array(
    'name' => 'alluserpost',
    'title' => '_VNEWS_MI_ALLUSERPOST',
    'description' => '_VNEWS_MI_ALLUSERPOST_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0);

$modversion['config'][] = array(
    'name' => 'related',
    'title' => '_VNEWS_MI_RELATED',
    'description' => '_VNEWS_MI_RELATED_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 0);

$modversion['config'][] = array(
    'name' => 'related_limit',
    'title' => '_VNEWS_MI_RELATED_LIMIT',
    'description' => '_VNEWS_MI_RELATED_LIMIT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 10);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_RSS',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'rss_show',
    'title' => '_VNEWS_MI_RSS_SHOW',
    'description' => '_VNEWS_MI_RSS_SHOW_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'rss_timecache',
    'title' => '_VNEWS_MI_RSS_TIMECACHE',
    'description' => '_VNEWS_MI_RSS_TIMECACHE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 60);

$modversion['config'][] = array(
    'name' => 'rss_perpage',
    'title' => '_VNEWS_MI_RSS_PERPAGE',
    'description' => '_VNEWS_MI_RSS_PERPAGE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 10);

$modversion['config'][] = array(
    'name' => 'rss_logo',
    'title' => '_VNEWS_MI_RSS_LOGO',
    'description' => '_VNEWS_MI_RSS_LOGO_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '/assets/images/logo.png');

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_FILE',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'file_dir',
    'title' => '_VNEWS_MI_FILE_DIR',
    'description' => '_VNEWS_MI_FILE_DIR_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => "/uploads/vnews/file");

$modversion['config'][] = array(
    'name' => 'file_size',
    'title' => '_VNEWS_MI_FILE_SIZE',
    'description' => '_VNEWS_MI_FILE_SIZE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '10485760');

$modversion['config'][] = array(
    'name' => 'file_mime',
    'title' => '_VNEWS_MI_FILE_MIME',
    'description' => '_VNEWS_MI_FILE_MIME_DESC',
    'formtype' => 'textarea',
    'valuetype' => 'text',
    'default' => 'image/gif|image/jpeg|image/pjpeg|image/x-png|image/png|application/x-zip-compressed|application/zip|application/rar|application/pdf|application/x-gtar|application/x-tar|application/x-gzip|application/msword|application/vnd.ms-excel|application/vnd.ms-powerpoint|application/vnd.oasis.opendocument.text|application/vnd.oasis.opendocument.spreadsheet|application/vnd.oasis.opendocument.presentation|application/vnd.oasis.opendocument.graphics|application/vnd.oasis.opendocument.chart|application/vnd.oasis.opendocument.formula|application/vnd.oasis.opendocument.database|application/vnd.oasis.opendocument.image|application/vnd.oasis.opendocument.text-master|video/mpeg|video/quicktime|video/x-msvideo|video/x-flv|video/mp4|video/x-ms-wmv|video/quicktime|audio/mpeg');

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_IMAGE',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'img_dir',
    'title' => '_VNEWS_MI_IMAGE_DIR',
    'description' => '_VNEWS_MI_IMAGE_DIR_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => "/uploads/vnews/image");

$modversion['config'][] = array(
    'name' => 'img_size',
    'title' => '_VNEWS_MI_IMAGE_SIZE',
    'description' => '_VNEWS_MI_IMAGE_SIZE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '5242880');

$modversion['config'][] = array(
    'name' => 'img_maxwidth',
    'title' => '_VNEWS_MI_IMAGE_MAXWIDTH',
    'description' => '_VNEWS_MI_IMAGE_MAXWIDTH_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '1600');

$modversion['config'][] = array(
    'name' => 'img_maxheight',
    'title' => '_VNEWS_MI_IMAGE_MAXHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_MAXHEIGHT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '1600');
$modversion['config'][] = array(
    'name' => 'img_mediumwidth',
    'title' => '_VNEWS_MI_IMAGE_MEDIUMWIDTH',
    'description' => '_VNEWS_MI_IMAGE_MEDIUMWIDTH_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '600');

$modversion['config'][] = array(
    'name' => 'img_mediumheight',
    'title' => '_VNEWS_MI_IMAGE_MEDIUMHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_MEDIUMHEIGHT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '600');

$modversion['config'][] = array(
    'name' => 'img_thumbwidth',
    'title' => '_VNEWS_MI_IMAGE_THUMBWIDTH',
    'description' => '_VNEWS_MI_IMAGE_THUMBWIDTH_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '200');

$modversion['config'][] = array(
    'name' => 'img_thumbheight',
    'title' => '_VNEWS_MI_IMAGE_THUMBHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_THUMBHEIGHT_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '200');
$modversion['config'][] = array(
    'name' => 'img_mime',
    'title' => '_VNEWS_MI_IMAGE_MIME',
    'description' => '_VNEWS_MI_IMAGE_MIME_DESC',
    'formtype' => 'select_multi',
    'valuetype' => 'array',
    'default' => array("image/gif", "image/jpeg", "image/png"),
    'options' => array(
        "bmp" => "image/bmp",
        "gif" => "image/gif",
        "jpeg" => "image/pjpeg",
        "jpeg" => "image/jpeg",
        "jpg" => "image/jpeg",
        "jpe" => "image/jpeg",
        "png" => "image/png"));

$modversion['config'][] = array(
    'name' => 'imgwidth',
    'title' => '_VNEWS_MI_IMAGE_WIDTH',
    'description' => '_VNEWS_MI_IMAGE_WIDTH_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 180);

$modversion['config'][] = array(
    'name' => 'imgfloat',
    'title' => '_VNEWS_MI_IMAGE_FLOAT',
    'description' => '_VNEWS_MI_IMAGE_FLOAT_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_IMAGE_LEFT => 'left', _VNEWS_MI_IMAGE_RIGHT => 'right'),
    'default' => 'left');

$modversion['config'][] = array(
    'name' => 'img_lightbox',
    'title' => '_VNEWS_MI_IMAGE_LIGHTBOX',
    'description' => '_VNEWS_MI_IMAGE_LIGHTBOX_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_PRINT',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'print_logo',
    'title' => '_VNEWS_MI_PRINT_LOGO',
    'description' => '_VNEWS_MI_PRINT_LOGO_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_logofloat',
    'title' => '_VNEWS_MI_PRINT_LOGOFLOAT',
    'description' => '_VNEWS_MI_PRINT_LOGOFLOAT_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_PRINT_LEFT => 'txtleft', _VNEWS_MI_PRINT_RIGHT => 'txtright', _VNEWS_MI_PRINT_CENTER => 'txtcenter'),
    'default' => 'txtcenter');

$modversion['config'][] = array(
    'name' => 'print_logourl',
    'title' => '_VNEWS_MI_PRINT_LOGOURL',
    'description' => '_VNEWS_MI_PRINT_LOGOURL_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => '/assets/images/logo.png');

$modversion['config'][] = array(
    'name' => 'print_title',
    'title' => '_VNEWS_MI_PRINT_TITLE',
    'description' => '_VNEWS_MI_PRINT_TITLE_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_img',
    'title' => '_VNEWS_MI_PRINT_IMG',
    'description' => '_VNEWS_MI_PRINT_IMG_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_short',
    'title' => '_VNEWS_MI_PRINT_SHORT',
    'description' => '_VNEWS_MI_PRINT_SHORT_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_text',
    'title' => '_VNEWS_MI_PRINT_TEXT',
    'description' => '_VNEWS_MI_PRINT_TEXT_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_date',
    'title' => '_VNEWS_MI_PRINT_DATE',
    'description' => '_VNEWS_MI_PRINT_DATE_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_author',
    'title' => '_VNEWS_MI_PRINT_AUTHOR',
    'description' => '_VNEWS_MI_PRINT_AUTHOR_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_link',
    'title' => '_VNEWS_MI_PRINT_LINK',
    'description' => '_VNEWS_MI_PRINT_LINK_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'print_columns',
    'title' => '_VNEWS_MI_MULTIPLE_COLUMNS',
    'description' => '_VNEWS_MI_MULTIPLE_COLUMNS_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'options' => array(_VNEWS_MI_MULTIPLE_COLUMNS_1 => 'onecolumn', _VNEWS_MI_MULTIPLE_COLUMNS_2 => 'twocolumn', _VNEWS_MI_MULTIPLE_COLUMNS_3 => 'threecolumn', _VNEWS_MI_MULTIPLE_COLUMNS_4 => 'forcolumn'),
    'default' => 'onecolumn');

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_BREADCRUMB',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'bc_show',
    'title' => '_VNEWS_MI_BREADCRUMB_SHOW',
    'description' => '_VNEWS_MI_BREADCRUMB_SHOW_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'bc_modname',
    'title' => '_VNEWS_MI_BREADCRUMB_MODNAME',
    'description' => '_VNEWS_MI_BREADCRUMB_MODNAME_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'bc_tohome',
    'title' => '_VNEWS_MI_BREADCRUMB_TOHOME',
    'description' => '_VNEWS_MI_BREADCRUMB_TOHOME_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_ADMIN',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'admin_perpage',
    'title' => '_VNEWS_MI_ADMIN_PERPAGE',
    'description' => '_VNEWS_MI_ADMIN_PERPAGE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 50);

$modversion['config'][] = array(
    'name' => 'admin_perpage_topic',
    'title' => '_VNEWS_MI_ADMIN_PERPAGE_TOPIC',
    'description' => '_VNEWS_MI_ADMIN_PERPAGE_TOPIC_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 20);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_VOTE',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');

$modversion['config'][] = array(
    'name' => 'vote_active',
    'title' => '_VNEWS_MI_VOTE_ACTIVE',
    'description' => '_VNEWS_MI_VOTE_ACTIVE_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1);

$modversion['config'][] = array(
    'name' => 'break',
    'title' => '_VNEWS_MI_BREAK_COMNOTI',
    'description' => '',
    'formtype' => 'line_break',
    'valuetype' => 'textbox',
    'default' => 'head');
