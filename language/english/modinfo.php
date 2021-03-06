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
 * News language file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// Module info
define('_MI_VNEWS_NAME', 'VNews');
define('_MI_VNEWS_DESC', 'Manage articles');
// Menu
define('_VNEWS_MI_HOME', 'Home');
define('_VNEWS_MI_TOPIC', 'Topics');
define('_VNEWS_MI_ARTICLE', 'Articles');
define('_VNEWS_MI_PERM', 'Permissions');
define('_VNEWS_MI_TOOLS', 'Tools');
define('_VNEWS_MI_ABOUT', 'About');
define('_VNEWS_MI_HELP', 'Help');
define('_VNEWS_MI_SUBMIT', 'Submit');
define('_VNEWS_MI_FILE', 'File');
define('_VNEWS_MI_ARCHIVE', 'Archive');
// Block
define('_VNEWS_MI_BLOCK_PAGE', 'Article page');
define('_VNEWS_MI_BLOCK_LIST', 'Article list');
define('_VNEWS_MI_BLOCK_TOPIC', 'Topic list');
define('_VNEWS_MI_BLOCK_SLIDE', 'Slide');
define('_VNEWS_MI_BLOCK_MARQUEE', 'Marquee');
// Editor
define('_VNEWS_MI_FORM_EDITOR', 'Form Option');
define('_VNEWS_MI_FORM_EDITOR_DESC', 'Select the editor to use for editing your article.');
// Admin groups
define('_VNEWS_MI_ADMINGROUPS', 'Admin Group Permissions');
define('_VNEWS_MI_ADMINGROUPS_DESC', 'Which groups have access to tools and permissions page');
// Group Access
define('_VNEWS_MI_GROUPS', 'Groups access');
define('_VNEWS_MI_GROUPS_DESC', 'Select general access permission for groups.');
// Urls
define('_VNEWS_MI_FRIENDLYURL', 'URL rewrite method');
define('_VNEWS_MI_FRIENDLYURL_DESC', 'Select the URL rewrite mode you want to use.');
define('_VNEWS_MI_URL_STANDARD', 'Standard Mode');
define('_VNEWS_MI_URL_REWRITE', 'Rewrite Mode');
define('_VNEWS_MI_URL_SHORT', 'Short Rewrite');
define('_VNEWS_MI_URL_ID', 'ID Mode');
define('_VNEWS_MI_URL_TOPIC', 'ID - Topic Mode');
// Rewrite Mode
define('_VNEWS_MI_REWRITEBASE', 'Rewrite Mode: .htaccess file position');
define('_VNEWS_MI_REWRITEBASE_DESC', '"Module": .htaccess file must be in the module directory.<br>"Root": .htaccess file must be in your ROOT directory.');
define('_VNEWS_MI_REWRITEBASE_MODS', 'Module');
define('_VNEWS_MI_REWRITEBASE_ROOT', 'Root');
// Rewrite Name
define('_VNEWS_MI_REWRITENAME', 'Rewrite mode: module name');
define('_VNEWS_MI_REWRITENAME_DESC', 'Define the module name used in rewritten urls.<br>If you change this value, you must edit the .htaccess file');
// Rewrite Extension
define('_VNEWS_MI_REWRITEEXT', 'Rewrite mode: Url extension');
define('_VNEWS_MI_REWRITEEXT_DESC', 'Define extension of rewritten url (typically .html)<br>If you change/remove this value, you must edit the .htaccess file ');
// static name
define('_VNEWS_MI_STATICNAME', 'Rewrite mode: static pages topic');
define('_VNEWS_MI_STATICNAME_DESC', 'Topic name of static page in rewritten URL');
// Lenght Id
define('_VNEWS_MI_LENGHTID', 'Rewrite mode:: length for page ID');
define('_VNEWS_MI_LENGHTID_DESC', 'Number of digit used in url for page ID');
//Advertisement
define('_VNEWS_MI_ADVERTISEMENT', 'Advertisement');
define('_VNEWS_MI_ADVERTISEMENT_DESC', 'Enter text or html/Javascript code for your articles');
// Tell a friend
define('_VNEWS_MI_TELLAFRIEND', 'Use module Tell a friend?');
define('_VNEWS_MI_TELLAFRIEND_DESC', '');
// Tell a friend
define('_VNEWS_MI_USETAG', 'Use TAG module to generate tags');
define('_VNEWS_MI_USETAG_DESC', 'You have to install TAG module for this option to work');
// Show options
define('_VNEWS_MI_DISP_OPTION', 'General display method');
define('_VNEWS_MI_DISP_OPTION_DESC', 'Select which display options will be used in articles<br>"Topic based" will use display options defined in topic preferences');
define('_VNEWS_MI_DISP_OPTION_MODULE', 'Module based');
define('_VNEWS_MI_DISP_OPTION_TOPIC', 'Topic based');
// Title
define('_VNEWS_MI_DISPTITLE', 'Display Title');
define('_VNEWS_MI_DISPTITLE_DESC', '');
// Topic
define('_VNEWS_MI_DISPTOPIC', 'Display Topic title');
define('_VNEWS_MI_DISPTOPIC_DESC', '');
// SubTopic
define('_VNEWS_MI_DISPSUB', 'Display SubTopic list');
define('_VNEWS_MI_DISPSUB_DESC', '');
// Date
define('_VNEWS_MI_DISPDATE', 'Display Date');
define('_VNEWS_MI_DISPDATE_DESC', '');
// Author
define('_VNEWS_MI_DISPAUTHOR', 'Display Author');
define('_VNEWS_MI_DISPAUTHOR_DESC', '');
// Navigation Link
define('_VNEWS_MI_DISPNAV', 'Display Prev/Next navigation');
define('_VNEWS_MI_DISPNAV_DESC', '');
// PDF Link
define('_VNEWS_MI_DISPPDF', 'Display PDF Icon');
define('_VNEWS_MI_DISPPDF_DESC', '');
// Print Link
define('_VNEWS_MI_DISPPRINT', 'Display Print Icon');
define('_VNEWS_MI_DISPPRINT_DESC', '');
// Hits Link
define('_VNEWS_MI_DISHITS', 'Display Hits');
define('_VNEWS_MI_DISHITS_DESC', '');
// Mail Link
define('_VNEWS_MI_DISPMAIL', 'Display Mail Icon');
define('_VNEWS_MI_DISPMAIL_DESC', '');
// Comments
define('_VNEWS_MI_DISPCOMS', 'Display Comments count');
define('_VNEWS_MI_DISPCOMS_DESC', '');
// Per page
define('_VNEWS_MI_PERPAGE', 'Per page articles');
define('_VNEWS_MI_PERPAGE_DESC', 'Number of articles listed in topic/index page');
// Columns
define('_VNEWS_MI_COLUMNS', 'Columns');
define('_VNEWS_MI_COLUMNS_DESC', 'Number of Columns in each page');
// Show type
define('_VNEWS_MI_SHOWTYPE', 'Display mode');
define('_VNEWS_MI_SHOWTYPE_DESC', 'Display template for articles listed in topic/index page');
define('_VNEWS_MI_SHOWTYPE_0', 'Module based');
define('_VNEWS_MI_SHOWTYPE_1', 'News type');
define('_VNEWS_MI_SHOWTYPE_2', 'Table type');
define('_VNEWS_MI_SHOWTYPE_3', 'Photo type');
define('_VNEWS_MI_SHOWTYPE_4', 'List type');
define('_VNEWS_MI_SHOWTYPE_5', 'Spotlight');
// Show order
define('_VNEWS_MI_SHOWORDER', 'Display order');
define('_VNEWS_MI_SHOWORDER_DESC', 'Select Descendant/Ascendant order');
define('_VNEWS_MI_DESC', 'DESC');
define('_VNEWS_MI_ASC', 'ASC');
// Show sort
define('_VNEWS_MI_SHOWSORT', 'Sort by');
define('_VNEWS_MI_SHOWSORT_DESC', 'Ordering method for articles displayed in the module');
define('_VNEWS_MI_SHOWSORT_1', 'Id');
define('_VNEWS_MI_SHOWSORT_2', 'Create');
define('_VNEWS_MI_SHOWSORT_3', 'Update');
define('_VNEWS_MI_SHOWSORT_4', 'Title');
define('_VNEWS_MI_SHOWSORT_5', 'Order');
define('_VNEWS_MI_SHOWSORT_6', 'Random');
define('_VNEWS_MI_SHOWSORT_7', 'Hits');
// Admin page
define('_VNEWS_MI_ADMIN_PERPAGE', 'Admin article page items number');
define('_VNEWS_MI_ADMIN_PERPAGE_DESC', 'Number of items listed in admin article page');
// Admin Show order
define('_VNEWS_MI_ADMIN_SHOWORDER', 'Admin article page display order');
define('_VNEWS_MI_ADMIN_SHOWORDER_DESC', 'Select Descendant/Ascendant order for admin article page');
// Admin sort
define('_VNEWS_MI_ADMIN_SHOWSORT', 'Admin article page sort');
define('_VNEWS_MI_ADMIN_SHOWSORT_DESC', 'Ordering method for items listed in admin article page<br>Any option except "Admin article order" will modify all manual sort of article page at each reload.');
// Admin topic page
define('_VNEWS_MI_ADMIN_PERPAGE_TOPIC', 'Admin Topic page items number');
define('_VNEWS_MI_ADMIN_PERPAGE_TOPIC_DESC', 'Number of items listed in admin Topic page');
// Admin topic Show order
define('_VNEWS_MI_ADMIN_SHOWORDER_TOPIC', 'Admin Topic page display order');
define('_VNEWS_MI_ADMIN_SHOWORDER_TOPIC_DESC', 'Select Descendant/Ascendant order for admin Topic page');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_1', 'Id');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_2', 'Order');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_3', 'Created');
// Admin topic sort
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC', 'Admin Topic page sort');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_DESC', 'Ordering method for items listed in admin Topic page');
// Admin index limit
define('_VNEWS_MI_ADMIN_INDEX_LIMIT', 'Items in Admin index');
define('_VNEWS_MI_ADMIN_INDEX_LIMIT_DESC', 'Number of items in admin index page');
//rss
define('_VNEWS_MI_RSS_SHOW', 'Show RSS icon');
define('_VNEWS_MI_RSS_SHOW_DESC', 'Display/hide RSS icon in module');
define('_VNEWS_MI_RSS_TIMECACHE', 'RSS cache time');
define('_VNEWS_MI_RSS_TIMECACHE_DESC', 'Cache time for RSS pages in minutes');
define('_VNEWS_MI_RSS_PERPAGE', 'RSS number');
define('_VNEWS_MI_RSS_PERPAGE_DESC', 'Select number of items in RSS page');
define('_VNEWS_MI_RSS_LOGO', 'RSS logo URL');
define('_VNEWS_MI_RSS_LOGO_DESC', 'Path for site logo displayed in RSS pages (relative to ROOT directory)');
// Print
define('_VNEWS_MI_PRINT_LOGO', 'Display site title');
define('_VNEWS_MI_PRINT_LOGO_DESC', 'Show/hide site title in print page');
define('_VNEWS_MI_PRINT_LOGOFLOAT', 'Print logo align');
define('_VNEWS_MI_PRINT_LOGOFLOAT_DESC', 'Select left or right or center position for print logo');
define('_VNEWS_MI_PRINT_LEFT', 'Left');
define('_VNEWS_MI_PRINT_RIGHT', 'Right');
define('_VNEWS_MI_PRINT_CENTER', 'Center');
define('_VNEWS_MI_PRINT_LOGOURL', 'Print logo URL');
define('_VNEWS_MI_PRINT_LOGOURL_DESC', 'Path for site logo displayed in print page (relative to ROOT directory)');
define('_VNEWS_MI_PRINT_TITLE', 'Display Title');
define('_VNEWS_MI_PRINT_TITLE_DESC', '');
define('_VNEWS_MI_PRINT_IMG', 'Display Image');
define('_VNEWS_MI_PRINT_IMG_DESC', '');
define('_VNEWS_MI_PRINT_SHORT', 'Display short text');
define('_VNEWS_MI_PRINT_SHORT_DESC', '');
define('_VNEWS_MI_PRINT_TEXT', 'Display main text');
define('_VNEWS_MI_PRINT_TEXT_DESC', '');
define('_VNEWS_MI_PRINT_DATE', 'Display date');
define('_VNEWS_MI_PRINT_DATE_DESC', '');
define('_VNEWS_MI_PRINT_AUTHOR', 'Display author');
define('_VNEWS_MI_PRINT_AUTHOR_DESC', '');
define('_VNEWS_MI_PRINT_LINK', 'Display page URL');
define('_VNEWS_MI_PRINT_LINK_DESC', '');
//img
define('_VNEWS_MI_IMAGE_DIR', 'Image upload path');
define('_VNEWS_MI_IMAGE_DIR_DESC', 'Upload path for images attached to article');
define('_VNEWS_MI_IMAGE_SIZE', 'Image file size (in bytes)');
define('_VNEWS_MI_IMAGE_SIZE_DESC', 'Max allowed size for image file (1048576 bytes = 1 MegaByte)');
define('_VNEWS_MI_IMAGE_MAXWIDTH', 'Image max width (pixel)');
define('_VNEWS_MI_IMAGE_MAXWIDTH_DESC', 'Max allowed width for image upload');
define('_VNEWS_MI_IMAGE_MAXHEIGHT', 'Image max height (pixel)');
define('_VNEWS_MI_IMAGE_MAXHEIGHT_DESC', 'Max allowed height for image upload');
define('_VNEWS_MI_IMAGE_MEDIUMWIDTH', 'Image medium width (pixel)');
define('_VNEWS_MI_IMAGE_MEDIUMWIDTH_DESC', 'Medium allowed width for image resize');
define('_VNEWS_MI_IMAGE_MEDIUMHEIGHT', 'Image medium height (pixel)');
define('_VNEWS_MI_IMAGE_MEDIUMHEIGHT_DESC', 'Medium allowed height for image resize');
define('_VNEWS_MI_IMAGE_THUMBWIDTH', 'Image thumb width (pixel)');
define('_VNEWS_MI_IMAGE_THUMBWIDTH_DESC', 'Thumb allowed width for image resize');
define('_VNEWS_MI_IMAGE_THUMBHEIGHT', 'Image thumb height (pixel)');
define('_VNEWS_MI_IMAGE_THUMBHEIGHT_DESC', 'Thumb allowed height for image resize');
define('_VNEWS_MI_IMAGE_MIME', 'Image mime types');
define('_VNEWS_MI_IMAGE_MIME_DESC', 'Allowed myme-types for image upload');
define('_VNEWS_MI_IMAGE_WIDTH', 'article list max image width (pixel)');
define('_VNEWS_MI_IMAGE_WIDTH_DESC', 'Max allowed width for images in article listed in index/topic pages<br> A max width/height for images in article pages is set in /css/style.css');
define('_VNEWS_MI_IMAGE_FLOAT', 'Image align');
define('_VNEWS_MI_IMAGE_FLOAT_DESC', 'Select left or right position for images attached to article');
define('_VNEWS_MI_IMAGE_LEFT', 'Left');
define('_VNEWS_MI_IMAGE_RIGHT', 'Right');
define('_VNEWS_MI_IMAGE_LIGHTBOX', 'Use lightbox');
define('_VNEWS_MI_IMAGE_LIGHTBOX_DESC', 'Use lightbox effect to display images at original size');
//social
define('_VNEWS_MI_SOCIAL', 'Display Bookmark/Social links');
define('_VNEWS_MI_SOCIAL_DESC', 'You can display Social network and bookmark icons in each article');
define('_VNEWS_MI_BOOKMARK', 'Bookmark');
define('_VNEWS_MI_SOCIALNETWORM', 'Social Networks');
define('_VNEWS_MI_NONE', 'None');
define('_VNEWS_MI_BOTH', 'Both');
//Multiple Columns
define('_VNEWS_MI_MULTIPLE_COLUMNS', 'Multiple Columns');
define('_VNEWS_MI_MULTIPLE_COLUMNS_DESC', 'Select number of columns used for displaying articles<br>This option works only in article page and for article in <b>Text</b> field');
define('_VNEWS_MI_MULTIPLE_COLUMNS_1', 'One Column');
define('_VNEWS_MI_MULTIPLE_COLUMNS_2', 'Two Columns');
define('_VNEWS_MI_MULTIPLE_COLUMNS_3', 'Three Columns');
define('_VNEWS_MI_MULTIPLE_COLUMNS_4', 'Four Columns');
// All user posts
define('_VNEWS_MI_ALLUSERPOST', 'Display "All user posts" link');
define('_VNEWS_MI_ALLUSERPOST_DESC', 'Show/Hide all user posts link in each article');
// regular expression
define('_VNEWS_MI_REGULAR_EXPRESSION', 'Auto Alias URL pattern');
define('_VNEWS_MI_REGULAR_EXPRESSION_DESC', 'Regular Expression for generating auto Alias URL pattern. <br>If you your language is not supported in Alias URL you can add appopriate regular expression here. Default setting is : <b>`[^a-z0-9]`i</b>');
define('_VNEWS_MI_REGULAR_EXPRESSION_CONFIG', '`[^a-z0-9]`i');
// Breadcrumb
define('_VNEWS_MI_BREADCRUMB_SHOW', 'Display Breadcrumb');
define('_VNEWS_MI_BREADCRUMB_MODNAME', 'Display Module name');
define('_VNEWS_MI_BREADCRUMB_TOHOME', 'Display Homepage link');
// Files
define('_VNEWS_MI_FILE_DIR', 'File upload path');
define('_VNEWS_MI_FILE_DIR_DESC', 'Upload path for files attached to article');
define('_VNEWS_MI_FILE_SIZE', 'file size (in bytes)');
define('_VNEWS_MI_FILE_SIZE_DESC', 'Max allowed size for file (1048576 bytes = 1 MegaByte)');
define('_VNEWS_MI_FILE_MIME', 'File mime types');
define('_VNEWS_MI_FILE_MIME_DESC', 'Allowed myme-types for file upload');
// break
define('_VNEWS_MI_BREAK_GENERAL', 'General');
define('_VNEWS_MI_BREAK_SEO', 'SEO / URL Rewrite');
define('_VNEWS_MI_BREAK_DISPLAY', 'Display');
define('_VNEWS_MI_BREAK_RSS', 'RSS');
define('_VNEWS_MI_BREAK_IMAGE', 'Image');
define('_VNEWS_MI_BREAK_ADMIN', 'Admin');
define('_VNEWS_MI_BREAK_PRINT', 'Print');
define('_VNEWS_MI_BREAK_BREADCRUMB', 'Breadcrumb');
define('_VNEWS_MI_BREAK_COMNOTI', 'Comments and notifications');
define('_VNEWS_MI_BREAK_FILE', 'File');
define('_VNEWS_MI_BREAK_VOTE', 'Vote');
//install/action
define('_VNEWS_MI_SQL_FOUND', 'SQL Database found');
define('_VNEWS_MI_CREATE_TABLES', 'Create Tables');
define('_VNEWS_MI_TABLE_CREATED', 'Table Created');
define('_VNEWS_MI_TABLE_RESERVED', 'Table reserved');
define('_VNEWS_MI_SQL_NOT_FOUND', 'SQL Database not found');
define('_VNEWS_MI_SQL_NOT_VALID', 'SQL Database not valid');
define('_VNEWS_MI_INSERT_DATA', 'Inserting data');
// homepage
define('_VNEWS_MI_HOMEPAGE', 'Homepage seting');
define('_VNEWS_MI_HOMEPAGE_DESC', 'Seting article show type in module index page');
define('_VNEWS_MI_HOMEPAGE_1', 'List all articles from all topics');
define('_VNEWS_MI_HOMEPAGE_2', 'List all topics');
define('_VNEWS_MI_HOMEPAGE_3', 'List all static pages');
define('_VNEWS_MI_HOMEPAGE_4', 'Show selected static article');
// topic name
define('_VNEWS_MI_TOPICNAME', 'Topic name');
define('_VNEWS_MI_TOPICNAME_DESC', 'Set topic name for URL');
// related news
define('_VNEWS_MI_RELATED', 'Related table');
define('_VNEWS_MI_RELATED_DESC', 'When you use this option, a summary containing links to all the recent published articles is visible at the bottom of each article');
define('_VNEWS_MI_RELATED_LIMIT', 'Related limit');
define('_VNEWS_MI_RELATED_LIMIT_DESC', 'Number of articles for show in Related table');
// Vote
define('_VNEWS_MI_VOTE_ACTIVE', 'Active vote system');

//1.84
//Help
define('_MI_VNEWS_DIRNAME', basename(dirname(dirname(__DIR__))));
define('_MI_VNEWS_HELP_HEADER', __DIR__.'/help/helpheader.tpl');
define('_MI_VNEWS_BACK_2_ADMIN', 'Back to Administration of ');
define('_MI_VNEWS_OVERVIEW', 'Overview');

//define('_MI_VNEWS_HELP_DIR', __DIR__);

//help multi-page
define('_MI_VNEWS_DISCLAIMER', 'Disclaimer');
define('_MI_VNEWS_LICENSE', 'License');
define('_MI_VNEWS_SUPPORT', 'Support');
