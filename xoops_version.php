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
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/header.php';

$moduleDirName = basename(__DIR__);
$modversion    = [
    // Main setting
    'version'       => 1.84,
    'module_status' => 'Alpha 1',
    'release_date'  => '2014/04/26',
    'name'          => _MI_VNEWS_NAME,
    'description'   => _MI_VNEWS_DESC,
    'author'        => '',
    'credits'       => '',
    'license'       => 'GNU GPL 2.0',
    'license_url'   => 'www.gnu.org/licenses/gpl-2.0.html/',
    'image'         => 'assets/images/logo.png',
    'dirname'       => $moduleDirName,

    'module_website_url'  => '',
    'module_website_name' => '',
    'help'                => 'page=help',
    // Admin things
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    // Modules scripts
    'onInstall'           => 'include/functions_install.php',
    'onUpdate'            => 'include/functions_update.php',
    // Main menu
    'hasMain'             => 1,
    // Recherche
    'hasSearch'           => 1,
    // Commentaires
    'hasComments'         => 1,
    // for module admin class
    //    'dirmoduleadmin'      => 'Frameworks/moduleclasses',
    //    'icons16'             => 'Frameworks/moduleclasses/icons/16',
    //    'icons32'             => 'Frameworks/moduleclasses/icons/32',
    // Local path icons
    'modicons16'          => 'assets/images/icons/16',
    'modicons32'          => 'assets/images/icons/32',
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.9',
    'min_db'              => ['mysql' => '5.5'],
    'min_admin'           => '1.2'
];

// SQL
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'][1]        = 'vnews_story';
$modversion['tables'][2]        = 'vnews_topic';
$modversion['tables'][3]        = 'vnews_file';
$modversion['tables'][4]        = 'vnews_rate';

//Recherche
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'vnews_search';

// Comments
$modversion['comments']['pageName'] = 'article.php';
$modversion['comments']['itemName'] = 'storyid';
// Comment callback functions
$modversion['comments']['callbackFile']        = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'vnews_com_approve';
$modversion['comments']['callback']['update']  = 'vnews_com_update';

// ------------------- Help files ------------------- //
$modversion['helpsection'] = [
    ['name' => _MI_VNEWS_OVERVIEW, 'link' => 'page=help'],
    ['name' => _MI_VNEWS_DISCLAIMER, 'link' => 'page=disclaimer'],
    ['name' => _MI_VNEWS_LICENSE, 'link' => 'page=license'],
    ['name' => _MI_VNEWS_SUPPORT, 'link' => 'page=support'],
];

// Templates
$modversion['templates'][] = ['file' => 'vnews_index.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_default.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_vnews.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_list.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_table.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_photo.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_index_topic.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_article.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_rss.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_bookmarkme.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_header.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_topic.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_topic_list.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_archive.tpl', 'description' => ''];
$modversion['templates'][] = ['file' => 'vnews_submit.tpl', 'description' => ''];

// Menu
$modversion['sub'][] = [
    'name' => _VNEWS_MI_SUBMIT,
    'url'  => 'submit.php'
];
$modversion['sub'][] = [
    'name' => _VNEWS_MI_TOPIC,
    'url'  => 'topic.php'
];
$modversion['sub'][] = [
    'name' => _VNEWS_MI_ARCHIVE,
    'url'  => 'archive.php'
];

// Blocks
$modversion['blocks'][] = [
    'file'        => 'page.php',
    'name'        => _VNEWS_MI_BLOCK_PAGE,
    'description' => '',
    'show_func'   => 'vnews_page_show',
    'edit_func'   => 'vnews_page_edit',
    'options'     => '0|vnews',
    'template'    => 'vnews_block_page.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'list.php',
    'name'        => _VNEWS_MI_BLOCK_LIST,
    'description' => '',
    'show_func'   => 'vnews_list_show',
    'edit_func'   => 'vnews_list_edit',
    'options'     => 'vnews|vnews|10|100|1|1|1|story_publish|180|left|DESC|0|' . XOOPS_URL . '|0|0',
    'template'    => 'vnews_block_list.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'topic.php',
    'name'        => _VNEWS_MI_BLOCK_TOPIC,
    'description' => '',
    'show_func'   => 'vnews_topic_show',
    'edit_func'   => 'vnews_topic_edit',
    'options'     => 'vnews|list|0|0|0|left|DESC|topic_id',
    'template'    => 'vnews_block_topic.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'slide.php',
    'name'        => _VNEWS_MI_BLOCK_SLIDE,
    'description' => '',
    'show_func'   => 'vnews_slide_show',
    'edit_func'   => 'vnews_slide_edit',
    'options'     => 'vnews|5|scrollable|50|200|400|200|180|180|0',
    'template'    => 'vnews_block_slide.tpl'
];

$modversion['blocks'][] = [
    'file'        => 'marquee.php',
    'name'        => _VNEWS_MI_BLOCK_MARQUEE,
    'description' => '',
    'show_func'   => 'vnews_marquee_show',
    'edit_func'   => 'vnews_marquee_edit',
    'options'     => 'vnews|5|50|1|0',
    'template'    => 'vnews_block_marquee.tpl'
];

// Settings
// Load class
xoops_load('xoopslists');

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_GENERAL',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'form_editor',
    'title'       => '_VNEWS_MI_FORM_EDITOR',
    'description' => '_VNEWS_MI_FORM_EDITOR_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => XoopsLists::getDirListAsArray(XOOPS_ROOT_PATH . '/class/xoopseditor'),
    'default'     => 'dhtmltextarea'
];

// Get groups
$memberHandler = xoops_getHandler('member');
$xoopsgroups   = $memberHandler->getGroupList();
foreach ($xoopsgroups as $key => $group) {
    $groups[$group] = $key;
}
$modversion['config'][] = [
    'name'        => 'groups',
    'title'       => '_VNEWS_MI_GROUPS',
    'description' => '_VNEWS_MI_GROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $groups,
    'default'     => $groups
];

// Get Admin groups
$criteria = new CriteriaCompo();
$criteria->add(new Criteria('group_type', 'Admin'));
$memberHandler     = xoops_getHandler('member');
$admin_xoopsgroups = $memberHandler->getGroupList($criteria);
foreach ($admin_xoopsgroups as $key => $admin_group) {
    $admin_groups[$admin_group] = $key;
}
$modversion['config'][] = [
    'name'        => 'admin_groups',
    'title'       => '_VNEWS_MI_ADMINGROUPS',
    'description' => '_VNEWS_MI_ADMINGROUPS_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'options'     => $admin_groups,
    'default'     => $admin_groups
];

$modversion['config'][] = [
    'name'        => 'advertisement',
    'title'       => '_VNEWS_MI_ADVERTISEMENT',
    'description' => '_VNEWS_MI_ADVERTISEMENT_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => ''
];

$modversion['config'][] = [
    'name'        => 'tellafriend',
    'title'       => '_VNEWS_MI_TELLAFRIEND',
    'description' => '_VNEWS_MI_TELLAFRIEND_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => '0'
];

$modversion['config'][] = [
    'name'        => 'usetag',
    'title'       => '_VNEWS_MI_USETAG',
    'description' => '_VNEWS_MI_USETAG_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_SEO',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'friendly_url',
    'title'       => '_VNEWS_MI_FRIENDLYURL',
    'description' => '_VNEWS_MI_FRIENDLYURL_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_URL_STANDARD => 'none',
        _VNEWS_MI_URL_REWRITE  => 'rewrite',
        _VNEWS_MI_URL_SHORT    => 'short',
        _VNEWS_MI_URL_ID       => 'id',
        _VNEWS_MI_URL_TOPIC    => 'topic'
    ],
    'default'     => 'id'
];

$modversion['config'][] = [
    'name'        => 'rewrite_mode',
    'title'       => '_VNEWS_MI_REWRITEBASE',
    'description' => '_VNEWS_MI_REWRITEBASE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [_VNEWS_MI_REWRITEBASE_MODS => '/modules/', _VNEWS_MI_REWRITEBASE_ROOT => '/'],
    'default'     => '/modules/'
];

$modversion['config'][] = [
    'name'        => 'lenght_id',
    'title'       => '_VNEWS_MI_LENGHTID',
    'description' => '_VNEWS_MI_LENGHTID_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'options'     => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
    'default'     => '1'
];

$modversion['config'][] = [
    'name'        => 'rewrite_name',
    'title'       => '_VNEWS_MI_REWRITENAME',
    'description' => '_VNEWS_MI_REWRITENAME_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'vnews'
];

$modversion['config'][] = [
    'name'        => 'rewrite_ext',
    'title'       => '_VNEWS_MI_REWRITEEXT',
    'description' => '_VNEWS_MI_REWRITEEXT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '.html'
];

$modversion['config'][] = [
    'name'        => 'static_name',
    'title'       => '_VNEWS_MI_STATICNAME',
    'description' => '_VNEWS_MI_STATICNAME_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'static'
];

$modversion['config'][] = [
    'name'        => 'topic_name',
    'title'       => '_VNEWS_MI_TOPICNAME',
    'description' => '_VNEWS_MI_TOPICNAME_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'topic'
];

$modversion['config'][] = [
    'name'        => 'regular_expression',
    'title'       => '_VNEWS_MI_REGULAR_EXPRESSION',
    'description' => '_VNEWS_MI_REGULAR_EXPRESSION_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => _VNEWS_MI_REGULAR_EXPRESSION_CONFIG
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_DISPLAY',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'homepage',
    'title'       => '_VNEWS_MI_HOMEPAGE',
    'description' => '_VNEWS_MI_HOMEPAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_HOMEPAGE_1 => 'type1',
        _VNEWS_MI_HOMEPAGE_2 => 'type2',
        _VNEWS_MI_HOMEPAGE_3 => 'type3',
        _VNEWS_MI_HOMEPAGE_4 => 'type4'
    ],
    'default'     => 'type1'
];

$modversion['config'][] = [
    'name'        => 'showtype',
    'title'       => '_VNEWS_MI_SHOWTYPE',
    'description' => '_VNEWS_MI_SHOWTYPE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'options'     => [
        _VNEWS_MI_SHOWTYPE_1 => '1',
        _VNEWS_MI_SHOWTYPE_2 => '2',
        _VNEWS_MI_SHOWTYPE_3 => '3',
        _VNEWS_MI_SHOWTYPE_4 => '4'
    ],
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_date',
    'title'       => '_VNEWS_MI_DISPDATE',
    'description' => '_VNEWS_MI_DISPDATE_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_topic',
    'title'       => '_VNEWS_MI_DISPTOPIC',
    'description' => '_VNEWS_MI_DISPTOPIC_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_sub',
    'title'       => '_VNEWS_MI_DISPSUB',
    'description' => '_VNEWS_MI_DISPSUB_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_author',
    'title'       => '_VNEWS_MI_DISPAUTHOR',
    'description' => '_VNEWS_MI_DISPAUTHOR_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_navlink',
    'title'       => '_VNEWS_MI_DISPNAV',
    'description' => '_VNEWS_MI_DISPNAV_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_pdflink',
    'title'       => '_VNEWS_MI_DISPPDF',
    'description' => '_VNEWS_MI_DISPPDF_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_printlink',
    'title'       => '_VNEWS_MI_DISPPRINT',
    'description' => '_VNEWS_MI_DISPPRINT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_hits',
    'title'       => '_VNEWS_MI_DISHITS',
    'description' => '_VNEWS_MI_DISHITS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_maillink',
    'title'       => '_VNEWS_MI_DISPMAIL',
    'description' => '_VNEWS_MI_DISPMAIL_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'disp_coms',
    'title'       => '_VNEWS_MI_DISPCOMS',
    'description' => '_VNEWS_MI_DISPCOMS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'perpage',
    'title'       => '_VNEWS_MI_PERPAGE',
    'description' => '_VNEWS_MI_PERPAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'columns',
    'title'       => '_VNEWS_MI_COLUMNS',
    'description' => '_VNEWS_MI_COLUMNS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'showsort',
    'title'       => '_VNEWS_MI_SHOWSORT',
    'description' => '_VNEWS_MI_SHOWSORT_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_SHOWSORT_1 => 'story_id',
        _VNEWS_MI_SHOWSORT_2 => 'story_publish',
        _VNEWS_MI_SHOWSORT_3 => 'story_update',
        _VNEWS_MI_SHOWSORT_4 => 'story_title',
        _VNEWS_MI_SHOWSORT_5 => 'story_order',
        _VNEWS_MI_SHOWSORT_6 => 'RAND()',
        _VNEWS_MI_SHOWSORT_7 => 'story_hits'
    ],
    'default'     => 'story_id'
];

$modversion['config'][] = [
    'name'        => 'showorder',
    'title'       => '_VNEWS_MI_SHOWORDER',
    'description' => '_VNEWS_MI_SHOWORDER_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [_VNEWS_MI_DESC => 'DESC', _VNEWS_MI_ASC => 'ASC'],
    'default'     => 'DESC'
];

$modversion['config'][] = [
    'name'        => 'show_social_book',
    'title'       => '_VNEWS_MI_SOCIAL',
    'description' => '_VNEWS_MI_SOCIAL_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'options'     => [
        _VNEWS_MI_NONE          => 0,
        _VNEWS_MI_SOCIALNETWORM => 1,
        _VNEWS_MI_BOOKMARK      => 2,
        _VNEWS_MI_BOTH          => 3
    ],
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'multiple_columns',
    'title'       => '_VNEWS_MI_MULTIPLE_COLUMNS',
    'description' => '_VNEWS_MI_MULTIPLE_COLUMNS_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_MULTIPLE_COLUMNS_1 => 'onecolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_2 => 'twocolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_3 => 'threecolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_4 => 'forcolumn'
    ],
    'default'     => 'onecolumn'
];

$modversion['config'][] = [
    'name'        => 'alluserpost',
    'title'       => '_VNEWS_MI_ALLUSERPOST',
    'description' => '_VNEWS_MI_ALLUSERPOST_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'related',
    'title'       => '_VNEWS_MI_RELATED',
    'description' => '_VNEWS_MI_RELATED_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 0
];

$modversion['config'][] = [
    'name'        => 'related_limit',
    'title'       => '_VNEWS_MI_RELATED_LIMIT',
    'description' => '_VNEWS_MI_RELATED_LIMIT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_RSS',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'rss_show',
    'title'       => '_VNEWS_MI_RSS_SHOW',
    'description' => '_VNEWS_MI_RSS_SHOW_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'rss_timecache',
    'title'       => '_VNEWS_MI_RSS_TIMECACHE',
    'description' => '_VNEWS_MI_RSS_TIMECACHE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 60
];

$modversion['config'][] = [
    'name'        => 'rss_perpage',
    'title'       => '_VNEWS_MI_RSS_PERPAGE',
    'description' => '_VNEWS_MI_RSS_PERPAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10
];

$modversion['config'][] = [
    'name'        => 'rss_logo',
    'title'       => '_VNEWS_MI_RSS_LOGO',
    'description' => '_VNEWS_MI_RSS_LOGO_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/assets/images/logo.png'
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_FILE',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'file_dir',
    'title'       => '_VNEWS_MI_FILE_DIR',
    'description' => '_VNEWS_MI_FILE_DIR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/uploads/vnews/file'
];

$modversion['config'][] = [
    'name'        => 'file_size',
    'title'       => '_VNEWS_MI_FILE_SIZE',
    'description' => '_VNEWS_MI_FILE_SIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '10485760'
];

$modversion['config'][] = [
    'name'        => 'file_mime',
    'title'       => '_VNEWS_MI_FILE_MIME',
    'description' => '_VNEWS_MI_FILE_MIME_DESC',
    'formtype'    => 'textarea',
    'valuetype'   => 'text',
    'default'     => 'image/gif|image/jpeg|image/pjpeg|image/x-png|image/png|application/x-zip-compressed|application/zip|application/rar|application/pdf|application/x-gtar|application/x-tar|application/x-gzip|application/msword|application/vnd.ms-excel|application/vnd.ms-powerpoint|application/vnd.oasis.opendocument.text|application/vnd.oasis.opendocument.spreadsheet|application/vnd.oasis.opendocument.presentation|application/vnd.oasis.opendocument.graphics|application/vnd.oasis.opendocument.chart|application/vnd.oasis.opendocument.formula|application/vnd.oasis.opendocument.database|application/vnd.oasis.opendocument.image|application/vnd.oasis.opendocument.text-master|video/mpeg|video/quicktime|video/x-msvideo|video/x-flv|video/mp4|video/x-ms-wmv|video/quicktime|audio/mpeg'
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_IMAGE',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'img_dir',
    'title'       => '_VNEWS_MI_IMAGE_DIR',
    'description' => '_VNEWS_MI_IMAGE_DIR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/uploads/vnews/image'
];

$modversion['config'][] = [
    'name'        => 'img_size',
    'title'       => '_VNEWS_MI_IMAGE_SIZE',
    'description' => '_VNEWS_MI_IMAGE_SIZE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '5242880'
];

$modversion['config'][] = [
    'name'        => 'img_maxwidth',
    'title'       => '_VNEWS_MI_IMAGE_MAXWIDTH',
    'description' => '_VNEWS_MI_IMAGE_MAXWIDTH_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '1600'
];

$modversion['config'][] = [
    'name'        => 'img_maxheight',
    'title'       => '_VNEWS_MI_IMAGE_MAXHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_MAXHEIGHT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '1600'
];
$modversion['config'][] = [
    'name'        => 'img_mediumwidth',
    'title'       => '_VNEWS_MI_IMAGE_MEDIUMWIDTH',
    'description' => '_VNEWS_MI_IMAGE_MEDIUMWIDTH_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '600'
];

$modversion['config'][] = [
    'name'        => 'img_mediumheight',
    'title'       => '_VNEWS_MI_IMAGE_MEDIUMHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_MEDIUMHEIGHT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '600'
];

$modversion['config'][] = [
    'name'        => 'img_thumbwidth',
    'title'       => '_VNEWS_MI_IMAGE_THUMBWIDTH',
    'description' => '_VNEWS_MI_IMAGE_THUMBWIDTH_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '200'
];

$modversion['config'][] = [
    'name'        => 'img_thumbheight',
    'title'       => '_VNEWS_MI_IMAGE_THUMBHEIGHT',
    'description' => '_VNEWS_MI_IMAGE_THUMBHEIGHT_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '200'
];
$modversion['config'][] = [
    'name'        => 'img_mime',
    'title'       => '_VNEWS_MI_IMAGE_MIME',
    'description' => '_VNEWS_MI_IMAGE_MIME_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => [
        'bmp'  => 'image/bmp',
        'gif'  => 'image/gif',
        'jpeg' => 'image/pjpeg',
        'jpeg' => 'image/jpeg',
        'jpg'  => 'image/jpeg',
        'jpe'  => 'image/jpeg',
        'png'  => 'image/png'
    ]
];

$modversion['config'][] = [
    'name'        => 'imgwidth',
    'title'       => '_VNEWS_MI_IMAGE_WIDTH',
    'description' => '_VNEWS_MI_IMAGE_WIDTH_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 180
];

$modversion['config'][] = [
    'name'        => 'imgfloat',
    'title'       => '_VNEWS_MI_IMAGE_FLOAT',
    'description' => '_VNEWS_MI_IMAGE_FLOAT_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [_VNEWS_MI_IMAGE_LEFT => 'left', _VNEWS_MI_IMAGE_RIGHT => 'right'],
    'default'     => 'left'
];

$modversion['config'][] = [
    'name'        => 'img_lightbox',
    'title'       => '_VNEWS_MI_IMAGE_LIGHTBOX',
    'description' => '_VNEWS_MI_IMAGE_LIGHTBOX_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_PRINT',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'print_logo',
    'title'       => '_VNEWS_MI_PRINT_LOGO',
    'description' => '_VNEWS_MI_PRINT_LOGO_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_logofloat',
    'title'       => '_VNEWS_MI_PRINT_LOGOFLOAT',
    'description' => '_VNEWS_MI_PRINT_LOGOFLOAT_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_PRINT_LEFT   => 'txtleft',
        _VNEWS_MI_PRINT_RIGHT  => 'txtright',
        _VNEWS_MI_PRINT_CENTER => 'txtcenter'
    ],
    'default'     => 'txtcenter'
];

$modversion['config'][] = [
    'name'        => 'print_logourl',
    'title'       => '_VNEWS_MI_PRINT_LOGOURL',
    'description' => '_VNEWS_MI_PRINT_LOGOURL_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => '/assets/images/logo.png'
];

$modversion['config'][] = [
    'name'        => 'print_title',
    'title'       => '_VNEWS_MI_PRINT_TITLE',
    'description' => '_VNEWS_MI_PRINT_TITLE_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_img',
    'title'       => '_VNEWS_MI_PRINT_IMG',
    'description' => '_VNEWS_MI_PRINT_IMG_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_short',
    'title'       => '_VNEWS_MI_PRINT_SHORT',
    'description' => '_VNEWS_MI_PRINT_SHORT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_text',
    'title'       => '_VNEWS_MI_PRINT_TEXT',
    'description' => '_VNEWS_MI_PRINT_TEXT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_date',
    'title'       => '_VNEWS_MI_PRINT_DATE',
    'description' => '_VNEWS_MI_PRINT_DATE_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_author',
    'title'       => '_VNEWS_MI_PRINT_AUTHOR',
    'description' => '_VNEWS_MI_PRINT_AUTHOR_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_link',
    'title'       => '_VNEWS_MI_PRINT_LINK',
    'description' => '_VNEWS_MI_PRINT_LINK_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'print_columns',
    'title'       => '_VNEWS_MI_MULTIPLE_COLUMNS',
    'description' => '_VNEWS_MI_MULTIPLE_COLUMNS_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'options'     => [
        _VNEWS_MI_MULTIPLE_COLUMNS_1 => 'onecolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_2 => 'twocolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_3 => 'threecolumn',
        _VNEWS_MI_MULTIPLE_COLUMNS_4 => 'forcolumn'
    ],
    'default'     => 'onecolumn'
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_BREADCRUMB',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'bc_show',
    'title'       => '_VNEWS_MI_BREADCRUMB_SHOW',
    'description' => '_VNEWS_MI_BREADCRUMB_SHOW_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'bc_modname',
    'title'       => '_VNEWS_MI_BREADCRUMB_MODNAME',
    'description' => '_VNEWS_MI_BREADCRUMB_MODNAME_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'bc_tohome',
    'title'       => '_VNEWS_MI_BREADCRUMB_TOHOME',
    'description' => '_VNEWS_MI_BREADCRUMB_TOHOME_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_ADMIN',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'admin_perpage',
    'title'       => '_VNEWS_MI_ADMIN_PERPAGE',
    'description' => '_VNEWS_MI_ADMIN_PERPAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 50
];

$modversion['config'][] = [
    'name'        => 'admin_perpage_topic',
    'title'       => '_VNEWS_MI_ADMIN_PERPAGE_TOPIC',
    'description' => '_VNEWS_MI_ADMIN_PERPAGE_TOPIC_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 20
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_VOTE',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];

$modversion['config'][] = [
    'name'        => 'vote_active',
    'title'       => '_VNEWS_MI_VOTE_ACTIVE',
    'description' => '_VNEWS_MI_VOTE_ACTIVE_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1
];

$modversion['config'][] = [
    'name'        => 'break',
    'title'       => '_VNEWS_MI_BREAK_COMNOTI',
    'description' => '',
    'formtype'    => 'line_break',
    'valuetype'   => 'textbox',
    'default'     => 'head'
];
