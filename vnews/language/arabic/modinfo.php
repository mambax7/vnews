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
 * @copyright   The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

// Module info
define('_MI_VNEWS_NAME','أخبار');
define('_MI_VNEWS_DESC','لإدارة الصفحات الثابتة و الدینامیة');
// Menu
define("_VNEWS_MI_HOME","الرئیسیة");
define("_VNEWS_MI_TOPIC","فئة");
define("_VNEWS_MI_ARTICLE","محتوی");
define("_VNEWS_MI_PERM","الإتاحات");
define("_VNEWS_MI_TOOLS","أداة");
define("_VNEWS_MI_ABOUT","درباره");
define("_VNEWS_MI_HELP","دلیل");
define("_VNEWS_MI_SUBMIT","ارسال");
define('_VNEWS_MI_FILE','ملف');
define('_VNEWS_MI_ARCHIVE','Archive');
// Block
define("_VNEWS_MI_BLOCK_PAGE","الصفحة");
define("_VNEWS_MI_BLOCK_LIST","الفهرسة");
define('_VNEWS_MI_BLOCK_TOPIC','Topic list');
define('_VNEWS_MI_BLOCK_SLIDE','Slide');
define('_VNEWS_MI_BLOCK_MARQUEE','Marquee');
// Editor
define("_VNEWS_MI_FORM_EDITOR","اختیار شکل");
define("_VNEWS_MI_FORM_EDITOR_DESC","تحدید محرر للاستخدام في صفحة إرسال المواضیع.");
// Admin groups
define("_VNEWS_MI_ADMINGROUPS","Admin Group Permissions");
define("_VNEWS_MI_ADMINGROUPS_DESC","Which groups have access to tools and permissions page");
// Group Access
define('_VNEWS_MI_GROUPS','اتاحة المجموعات');
define('_VNEWS_MI_GROUPS_DESC','عین الإتاحة الکلیة للمجموعات.');
// Urls
define('_VNEWS_MI_FRIENDLYURL','تحدید عنوان مفضل للمستخدمین');
define('_VNEWS_MI_FRIENDLYURL_DESC','Select the URL rewrite mode you want to use.');
define('_VNEWS_MI_URL_STANDARD','Standard Mode');
define('_VNEWS_MI_URL_REWRITE','Rewrite Mode');
define('_VNEWS_MI_URL_SHORT','Short Rewrite');
define('_VNEWS_MI_URL_ID','ID Mode');
define('_VNEWS_MI_URL_TOPIC','ID - Topic Mode');
// Rewrite Mode
define('_VNEWS_MI_REWRITEBASE','اختر عنوانا یمکن کتابته');
define('_VNEWS_MI_REWRITEBASE_DESC','"Module base": یجب علیک .htacces جعله في فئة الوحدة.<br />"Root base": یجب علیک .htacces في فئةROOT_PATH جعل.');
define('_VNEWS_MI_REWRITEBASE_MODS','Module base');
define('_VNEWS_MI_REWRITEBASE_ROOT','Root base');
// Rewrite Name
define('_VNEWS_MI_REWRITENAME','اسم الوحدة بعد التحدیث');
define('_VNEWS_MI_REWRITENAME_DESC','حدد اسم الوحدة في النوان المنتج rewrite mode). إذا تم تعدیل الإسم، یجب تعدیل ملف.htaccess ');
// Rewrite Extension
define('_VNEWS_MI_REWRITEEXT','الملحق الختامي للعنوان');
define('_VNEWS_MI_REWRITEEXT_DESC','اختر الملحق الختامي للعنوان (.html) ');
// static name
define('_VNEWS_MI_STATICNAME','الاسم الثابت');
define('_VNEWS_MI_STATICNAME_DESC','إسم فئة للصفحات الثابتة عند انتاج العنوان ');
// Lenght Id
define('_VNEWS_MI_LENGHTID','طول رقم الصفحة');
define('_VNEWS_MI_LENGHTID_DESC','عدد ارقام المنتجة للصفحة');
//Advertisement
define('_VNEWS_MI_ADVERTISEMENT','الإعلانات');
define('_VNEWS_MI_ADVERTISEMENT_DESC','اجعل نصا أو کود جاوا للعرض في جمیع الصفحات');
// Tell a friend
define('_VNEWS_MI_TELLAFRIEND','استخدام وحدة إخبار الأصدقاء');
define('_VNEWS_MI_TELLAFRIEND_DESC','');
// Tell a friend
define('_VNEWS_MI_USETAG',' استخدام الوحدة TAG لإنتاج ');
define('_VNEWS_MI_USETAG_DESC','لاستخدام هذا الأیقون یجب تثبیت وحدة TAG');
// Show options
define('_VNEWS_MI_DISP_OPTION','کیفیة العرض');
define('_VNEWS_MI_DISP_OPTION_DESC','اختر حالة عرض الخیارات. إما علی اساس خیارات الوحدة أم خیار الفئات');
define('_VNEWS_MI_DISP_OPTION_MODULE',' خیارات الوحدات');
define('_VNEWS_MI_DISP_OPTION_TOPIC',' خیارات الفئات');
// Title
define('_VNEWS_MI_DISPTITLE','عرض العنوان؟');
define('_VNEWS_MI_DISPTITLE_DESC','');
// Topic
define('_VNEWS_MI_DISPTOPIC','عرض الفئة؟');
define('_VNEWS_MI_DISPTOPIC_DESC','');
// SubTopic
define('_VNEWS_MI_DISPSUB','Display SubTopic list');
define('_VNEWS_MI_DISPSUB_DESC','');
// Date
define('_VNEWS_MI_DISPDATE','عرض التاریخ؟');
define('_VNEWS_MI_DISPDATE_DESC','');
// Author
define('_VNEWS_MI_DISPAUTHOR','عرذض المحرر؟');
define('_VNEWS_MI_DISPAUTHOR_DESC','');
// Navigation Link
define('_VNEWS_MI_DISPNAV','عرض روابط ناوبری؟');
define('_VNEWS_MI_DISPNAV_DESC','');
// PDF Link
define('_VNEWS_MI_DISPPDF','عرض رابط PDF؟');
define('_VNEWS_MI_DISPPDF_DESC','');
// Print Link
define('_VNEWS_MI_DISPPRINT','عرض رابط الطباعة؟');
define('_VNEWS_MI_DISPPRINT_DESC','');
// Hits Link
define('_VNEWS_MI_DISHITS','عرض الزیارات؟');
define('_VNEWS_MI_DISHITS_DESC','');
// Mail Link
define('_VNEWS_MI_DISPMAIL','عرض رابط إخبار الأصدقاء؟');
define('_VNEWS_MI_DISPMAIL_DESC','');
// Mail Link
define('_VNEWS_MI_DISPCOMS','عرض عدد الآراء ؟');
define('_VNEWS_MI_DISPCOMS_DESC','');
// Per page
define('_VNEWS_MI_PERPAGE','في کل صفحة');
define('_VNEWS_MI_PERPAGE_DESC','عدد المواضیع في کل صفحة');
// Columns
define('_VNEWS_MI_COLUMNS','عمود');
define('_VNEWS_MI_COLUMNS_DESC','عدد الأعمدة في کل صفحة');
// Show type
define('_VNEWS_MI_SHOWTYPE','حالة العرض');
define('_VNEWS_MI_SHOWTYPE_DESC','حالة عرض نموذج الفئات');
define('_VNEWS_MI_SHOWTYPE_0','علی اساس الوحدات');
define('_VNEWS_MI_SHOWTYPE_1','الوضع الخبری');
define('_VNEWS_MI_SHOWTYPE_2','حالت جدولی');
define('_VNEWS_MI_SHOWTYPE_3','وضع الصورة');
define('_VNEWS_MI_SHOWTYPE_4','جالت لیست');
define('_VNEWS_MI_SHOWTYPE_5','Spotlight');
// Show order
define('_VNEWS_MI_SHOWORDER','اولویة العرض');
define('_VNEWS_MI_SHOWORDER_DESC','اختر اولویة العرض متصاعدا ام متنازلا');
define("_VNEWS_MI_DESC","متنازلا");
define("_VNEWS_MI_ASC","متصاعدا");
// Show sort
define('_VNEWS_MI_SHOWSORT','تنظیم علی اساس العرض');
define('_VNEWS_MI_SHOWSORT_DESC','تنظیم علی اساس اختیار العرض');
define('_VNEWS_MI_SHOWSORT_1','Id');
define('_VNEWS_MI_SHOWSORT_2','Create');
define('_VNEWS_MI_SHOWSORT_3','Update');
define('_VNEWS_MI_SHOWSORT_4','Title');
define('_VNEWS_MI_SHOWSORT_5','Order');
define('_VNEWS_MI_SHOWSORT_6','Random');
define('_VNEWS_MI_SHOWSORT_7','Hits');
// Admin page
define('_VNEWS_MI_ADMIN_PERPAGE','الوثیقة في کل صفحة');
define('_VNEWS_MI_ADMIN_PERPAGE_DESC','إدارة عدد الوثائق في کل صفحة');
// Admin Show order
define('_VNEWS_MI_ADMIN_SHOWORDER','اولویة عرض المواضیع');
define('_VNEWS_MI_ADMIN_SHOWORDER_DESC','اختر اولویة العرض متصاعدا ام متنازلا');
// Admin sort
define('_VNEWS_MI_ADMIN_SHOWSORT','التنظیم علی اساس عرض الصفحات صفحات');
define('_VNEWS_MI_ADMIN_SHOWSORT_DESC','العرض علی اساس اختیار العرض');
// Admin topic page
define('_VNEWS_MI_ADMIN_PERPAGE_TOPIC','الفئة في کل صفحة');
define('_VNEWS_MI_ADMIN_PERPAGE_TOPIC_DESC','عدد الفئات في کل صفحة في قسم الإدارة');
// Admin topic Show order
define('_VNEWS_MI_ADMIN_SHOWORDER_TOPIC','التنظیم علی اساس عرض الفئات');
define('_VNEWS_MI_ADMIN_SHOWORDER_TOPIC_DESC','اختر اولویة العرض متصاعدا ام متنازلا ');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_1','Id');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_2','Order');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_3','Created');
// Admin topic sort
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC','اولویة عرض الفئات');
define('_VNEWS_MI_ADMIN_SHOWSORT_TOPIC_DESC','التنظیم علی اساس اختیار العرض');
// Admin index limit
define('_VNEWS_MI_ADMIN_INDEX_LIMIT','عدد المواضیع في الصفحة الاولی للإدارة');
define('_VNEWS_MI_ADMIN_INDEX_LIMIT_DESC','عدد الموضایع في الصفحة الاولی للإدارة');
//rss
define('_VNEWS_MI_RSS_SHOW','عرض آیقون ال خوراک');
define('_VNEWS_MI_RSS_SHOW_DESC','عرض أو عدم عرض آیقون خوراک في الوحدة');
define('_VNEWS_MI_RSS_TIMECACHE','زمان کش خوراک');
define('_VNEWS_MI_RSS_TIMECACHE_DESC','زمان کش برای صفحه خوراک بر حسب دقیقه');
define('_VNEWS_MI_RSS_PERPAGE','عدد موارد خوراک');
define('_VNEWS_MI_RSS_PERPAGE_DESC','اختر عدد منتجات خوراک في الصفحة');
define('_VNEWS_MI_RSS_LOGO','شعار صفحة خوراک');
define('_VNEWS_MI_RSS_LOGO_DESC','شعار الموقع في صفحة خوراک');
// Print
define('_VNEWS_MI_PRINT_LOGO','عرض الشعار في الموقع');
define('_VNEWS_MI_PRINT_LOGO_DESC','عرض أو عدم عرض شعار الموقع في صفحة الطباعة');
define('_VNEWS_MI_PRINT_LOGOFLOAT','محل شعار الموقع');
define('_VNEWS_MI_PRINT_LOGOFLOAT_DESC','محل شعار الموقع في الصفحة ممکن ان تکون الطباعة یمینا أو شمالا أو وسطا');
define('_VNEWS_MI_PRINT_LEFT','شمال');
define('_VNEWS_MI_PRINT_RIGHT','یمین');
define('_VNEWS_MI_PRINT_CENTER','وسط');
define('_VNEWS_MI_PRINT_LOGOURL','شعار الموقع');
define('_VNEWS_MI_PRINT_LOGOURL_DESC','شعار الموقع في صفحة الطباعة');
define('_VNEWS_MI_PRINT_TITLE','عرض العنوان؟');
define('_VNEWS_MI_PRINT_TITLE_DESC','');
define('_VNEWS_MI_PRINT_IMG','عرض الصورة');
define('_VNEWS_MI_PRINT_IMG_DESC','');
define('_VNEWS_MI_PRINT_SHORT','عرض النص الإبتدائي؟');
define('_VNEWS_MI_PRINT_SHORT_DESC','');
define('_VNEWS_MI_PRINT_TEXT','عرض النص النهائي؟');
define('_VNEWS_MI_PRINT_TEXT_DESC','');
define('_VNEWS_MI_PRINT_DATE','عرض التاریخ؟');
define('_VNEWS_MI_PRINT_DATE_DESC','');
define('_VNEWS_MI_PRINT_AUTHOR','عرض المحرر؟');
define('_VNEWS_MI_PRINT_AUTHOR_DESC','');
define('_VNEWS_MI_PRINT_LINK','عرض رابط الصفحة؟');
define('_VNEWS_MI_PRINT_LINK_DESC','');
//img
define('_VNEWS_MI_IMAGE_DIR','الطریق الی هذه الصفحة');
define('_VNEWS_MI_IMAGE_DIR_DESC','طریق تحمیل الصور للمواضیع . اذا تم تغییر هذا العنوان ، یجب ان تنقل الصور القدیمة الی هذا العنوان للعرض');
define('_VNEWS_MI_IMAGE_SIZE','Image file size (in bytes)');
define('_VNEWS_MI_IMAGE_SIZE_DESC','Max allowed size for image file (1048576 bytes = 1 MegaByte)');
define('_VNEWS_MI_IMAGE_MAXWIDTH','اکثر عرض الصورة');
define('_VNEWS_MI_IMAGE_MAXWIDTH_DESC','اکثر عرض للصورة عند التحمیل ');
define('_VNEWS_MI_IMAGE_MAXHEIGHT','اکثر طول التصویر عند تحمیله');
define('_VNEWS_MI_IMAGE_MAXHEIGHT_DESC','اکثر طول الصورة عند التحمیل');
define('_VNEWS_MI_IMAGE_MEDIUMWIDTH','Image medium width (pixel)');
define('_VNEWS_MI_IMAGE_MEDIUMWIDTH_DESC','Medium allowed width for image resize');
define('_VNEWS_MI_IMAGE_MEDIUMHEIGHT','Image medium height (pixel)');
define('_VNEWS_MI_IMAGE_MEDIUMHEIGHT_DESC','Medium allowed height for image resize');
define('_VNEWS_MI_IMAGE_THUMBWIDTH','Image thumb width (pixel)');
define('_VNEWS_MI_IMAGE_THUMBWIDTH_DESC','Thumb allowed width for image resize');
define('_VNEWS_MI_IMAGE_THUMBHEIGHT','Image thumb height (pixel)');
define('_VNEWS_MI_IMAGE_THUMBHEIGHT_DESC','Thumb allowed height for image resize');
define('_VNEWS_MI_IMAGE_MIME','الملحق الختامي المتاح للتحمیل');
define('_VNEWS_MI_IMAGE_MIME_DESC','اختر الملحق الختامي المتاح');
define('_VNEWS_MI_IMAGE_WIDTH','عرض الصورة');
define('_VNEWS_MI_IMAGE_WIDTH_DESC','اختیار عرض الصوري للعرض في الصفحة');
define('_VNEWS_MI_IMAGE_FLOAT','محل الصورة');
define('_VNEWS_MI_IMAGE_FLOAT_DESC','اختیار محل الصورة یمینا او شمالا للصور المحملة من الوحدات');
define('_VNEWS_MI_IMAGE_LEFT','شمال');
define('_VNEWS_MI_IMAGE_RIGHT','یمین');
define('_VNEWS_MI_IMAGE_LIGHTBOX','استخدامlightbox');
define('_VNEWS_MI_IMAGE_LIGHTBOX_DESC','استخدامlightbox ل نمایش الصور');
//social
define('_VNEWS_MI_SOCIAL','استخدام خیاران الشبکات الإجتماعیة');
define('_VNEWS_MI_SOCIAL_DESC','یمکنک استخدامروابط الشبکات الإجتماعیة و بوکمارک في کل صفحة');
define('_VNEWS_MI_BOOKMARK','بوکمارک');
define('_VNEWS_MI_SOCIALNETWORM','الشبکات الإجتماعیة');
define('_VNEWS_MI_NONE','لاشیء');
define('_VNEWS_MI_BOTH','کلاهما');
//Multiple Columns
define('_VNEWS_MI_MULTIPLE_COLUMNS','النص في عدة أعمدة');
define('_VNEWS_MI_MULTIPLE_COLUMNS_DESC','اختیار عدد الأعمدة لعرض نص کل وثیقة. هذا الخیار سیستخدم فی النص الأصلي فقط');
define('_VNEWS_MI_MULTIPLE_COLUMNS_1','عمود واحد');
define('_VNEWS_MI_MULTIPLE_COLUMNS_2','عمودین');
define('_VNEWS_MI_MULTIPLE_COLUMNS_3','ثلاثة أعمدة');
define('_VNEWS_MI_MULTIPLE_COLUMNS_4','أربعة أعمدة');
// All user posts
define('_VNEWS_MI_ALLUSERPOST','جمیع مشارکات هذا المستخدم');
define('_VNEWS_MI_ALLUSERPOST_DESC','عرض / إخفاء رابط جمیع مشارکات المستخدم في الصفحة');
// regular expression
define('_VNEWS_MI_REGULAR_EXPRESSION','اسم المستعار تلقائیا نموذج العنوان');
define('_VNEWS_MI_REGULAR_EXPRESSION_DESC','.استخدام عبارة با قاعده لإنشاء الإسم المستعار التلقائي نموذج العنوان. اذا لم یتم دعم لغتک المستخدم عند انشاء التلقائي للعنوان ، أضف لغتک الی هذا القسم. المفترض دعم اللغات الانجلیزیة و العربیة و الفارسیة : <b>`[^۰-۹a-z0-9إأآضصثقفغعهخحجدطكمنتالبيسشئءؤرﻻىةوزظذ]`u</b>');
define('_VNEWS_MI_REGULAR_EXPRESSION_CONFIG','`[^۰-۹a-z0-9إأآضصثقفغعهخحجدطكمنتالبيسشئءؤرﻻىةوزظذ]`u');
// Breadcrumb
define('_VNEWS_MI_BREADCRUMB_SHOW','عرض ناوبری');
define('_VNEWS_MI_BREADCRUMB_MODNAME','عرض اسم الوحدة');
define('_VNEWS_MI_BREADCRUMB_TOHOME','عرض رابط الصفحة الرئیسیة');
// Files
define('_VNEWS_MI_FILE_DIR','طریق تحمیل الملف');
define('_VNEWS_MI_FILE_DIR_DESC','طریق تحمیل الملف للمواضیع. اذذا تم تغییر هذا الطریق، یجب ان تنقل اللفات السابقي الی عذا العنوان للعرض');
define('_VNEWS_MI_FILE_SIZE','اندازه فایل');
define('_VNEWS_MI_FILE_SIZE_DESC','اختیار اکثر حجم للملف (1048576 bytes = 1 MegaByte)');
define('_VNEWS_MI_FILE_MIME','الملحقات الختامیة المتاحة');
define('_VNEWS_MI_FILE_MIME_DESC','افصل بین الملحقات الختامیة المتاحة للتحمیل ');
// break
define('_VNEWS_MI_BREAK_GENERAL','کلي');
define('_VNEWS_MI_BREAK_SEO','SEO');
define('_VNEWS_MI_BREAK_DISPLAY','عرض');
define('_VNEWS_MI_BREAK_RSS','خوراک');
define('_VNEWS_MI_BREAK_IMAGE','صورة');
define('_VNEWS_MI_BREAK_ADMIN','إدارة');
define('_VNEWS_MI_BREAK_PRINT','طباعة');
define('_VNEWS_MI_BREAK_BREADCRUMB','ناوبری');
define('_VNEWS_MI_BREAK_COMNOTI','آراء و إخبار');
define('_VNEWS_MI_BREAK_FILE','File');
define('_VNEWS_MI_BREAK_VOTE','Vote');
//install/action
define('_VNEWS_MI_SQL_FOUND','دیتابیس SQL وجد');
define('_VNEWS_MI_CREATE_TABLES','إنشاء جدول');
define('_VNEWS_MI_TABLE_CREATED','أنشئ جدول ');
define('_VNEWS_MI_TABLE_RESERVED','Table reserved');
define('_VNEWS_MI_SQL_NOT_FOUND','موقع معلومات SQL لم یوجد');
define('_VNEWS_MI_SQL_NOT_VALID','معوماتSQL لیسا صحیحا');
define('_VNEWS_MI_INSERT_DATA',',وارد کردن اطلاعات');
// homepage
define('_VNEWS_MI_HOMEPAGE','Homepage seting');
define('_VNEWS_MI_HOMEPAGE_DESC','Seting content show type in module index page');
define('_VNEWS_MI_HOMEPAGE_1','List all contents from all topics');
define('_VNEWS_MI_HOMEPAGE_2','List all topics');
define('_VNEWS_MI_HOMEPAGE_3','List all static pages');
define('_VNEWS_MI_HOMEPAGE_4','Show selected static content');
// topic name
define('_VNEWS_MI_TOPICNAME','اسم الفئة');
define('_VNEWS_MI_TOPICNAME_DESC','اختیار اسم الفئة للعنوان');
// related vnews
define('_VNEWS_MI_RELATED','Related table');
define('_VNEWS_MI_RELATED_DESC','When you use this option, a summary containing links to all the recent published articles is visible at the bottom of each article');
define('_VNEWS_MI_RELATED_LIMIT','Related limit');
define('_VNEWS_MI_RELATED_LIMIT_DESC','Number of contents for show in Related table');
// Vote
define('_VNEWS_MI_VOTE_ACTIVE','Active vote system');
