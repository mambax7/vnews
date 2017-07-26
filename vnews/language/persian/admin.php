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
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

// Global page
define('_VNEWS_AM_GLOBAL_ADD_CONTENT','ساخت صفحه');
define('_VNEWS_AM_GLOBAL_ADD_TOPIC','ساخت شاخه');
define('_VNEWS_AM_GLOBAL_ADD_FILE','ساخت فایل');
define('_VNEWS_AM_GLOBAL_IMG','تصویر');
define('_VNEWS_AM_GLOBAL_FORMUPLOAD','انتخاب تصویر');
// Index page
define("_VNEWS_AM_INDEX_ADMENU1","شاخه ها");
define("_VNEWS_AM_INDEX_ADMENU2","صفحه ها");
define("_VNEWS_AM_INDEX_TOPICS","<span class='green'>%s</span> شاخه در پایکاه داده ها قرار دارد");
define("_VNEWS_AM_INDEX_CONTENTS","<span class='green'>%s</span> خبر در پایگاه داده ها قرار دارد");
define("_VNEWS_AM_INDEX_CONTENTS_OFFLINE","<span class='red'>%s</span> خبر منتظر برای تایید در پایگاه داده ها قرار دارد");
define("_VNEWS_AM_INDEX_CONTENTS_EXPIRE","<span class='red'>%s</span> خبر منقضی شده در پایگاه داده ها قرار دارد");
// Topic page
define('_VNEWS_AM_TOPIC_FORM','مدیریت شاخه ها');
define('_VNEWS_AM_TOPIC_ID','شماره');
define('_VNEWS_AM_TOPIC_NUM','وزن');
define('_VNEWS_AM_TOPIC_NAME','عنوان');
define('_VNEWS_AM_TOPIC_PARENT','شاخه والد');
define('_VNEWS_AM_TOPIC_DESC','توضیحات');
define('_VNEWS_AM_TOPIC_IMG','تصویر');
define('_VNEWS_AM_TOPIC_WEIGHT','عرض');
define('_VNEWS_AM_TOPIC_SHOWTYPE','حالت نمایش');
define('_VNEWS_AM_TOPIC_SHOWTYPE_DESC','اگر میخواهید از تنظیمات زیر استفاده کنید.<br /> باید گزینه <b>حالت نمایش</b> را از پایه ماژول <br />به یکی دیگر از گزینه ها تغییر دهید.');
define('_VNEWS_AM_TOPIC_PERPAGE','هر صفحه');
define('_VNEWS_AM_TOPIC_COLUMNS','ستون');
define('_VNEWS_AM_TOPIC_ONLINE','فعال');
define('_VNEWS_AM_TOPIC_MENU','منو');
define('_VNEWS_AM_TOPIC_SHOW','نمایش');
define('_VNEWS_AM_TOPIC_ACTION','فعال');
define('_VNEWS_AM_TOPIC_PID','والد');
define('_VNEWS_AM_TOPIC_DATE_CREATED','زمان ساخت');
define('_VNEWS_AM_TOPIC_DATE_UPDATE','زمان به روز رسانی');
define('_VNEWS_AM_TOPIC_SHOWTOPIC','نمایش شاخه');
define('_VNEWS_AM_TOPIC_SHOWSUB','نمایش فهرست زیر شاخه');
define('_VNEWS_AM_TOPIC_SHOWAUTHOR','نمایش نویسنده');
define('_VNEWS_AM_TOPIC_SHOWDATE','نمایش تاریخ');
define('_VNEWS_AM_TOPIC_SHOWDPF','نمایش پی دی اف');
define('_VNEWS_AM_TOPIC_SHOWPRINT','نمایش چاپ');
define('_VNEWS_AM_TOPIC_SHOWMAIL','نمایش معرفی به دوستان');
define('_VNEWS_AM_TOPIC_SHOWNAV','نمایش ناوبری');
define('_VNEWS_AM_TOPIC_SHOWHITS','نمایش بازدید ها');
define('_VNEWS_AM_TOPIC_SHOWCOMS','نمایش نظرهای ارسال');
define('_VNEWS_AM_TOPIC_HOMEPAGE','تنظیمات صفحه اول شاخه');
define('_VNEWS_AM_TOPIC_HOMEPAGE_DESC','انتخاب نوع نمایش مطالب در صفحه اول شاخه');
define('_VNEWS_AM_TOPIC_HOMEPAGE_1','فهرست تمام اخبار و از شاخه و زیر شاخه ها');
define('_VNEWS_AM_TOPIC_HOMEPAGE_2','فهرست همه زیر شاخه ها');
define('_VNEWS_AM_TOPIC_HOMEPAGE_3','فهرست اخبار فقط همین شاخه');
define('_VNEWS_AM_TOPIC_HOMEPAGE_4','یه خبر انتخابی از شاخه');
define('_VNEWS_AM_TOPIC_OPTIONS','انتخاب حالت نمایش شاخه ها');
define('_VNEWS_AM_TOPIC_OPTIONS_DESC','انتخاب حالت نمایش شاخه ها');
define('_VNEWS_AM_TOPIC_ALIAS','نام مستعار');
define('_VNEWS_AM_TOPIC_SHOWTYPE_0','برپایه ماژول');
define('_VNEWS_AM_TOPIC_SHOWTYPE_1','حالت خبری');
define('_VNEWS_AM_TOPIC_SHOWTYPE_2','حالت جدولی');
define('_VNEWS_AM_TOPIC_SHOWTYPE_3','حالت تصویر');
define('_VNEWS_AM_TOPIC_SHOWTYPE_4','حالت لیستی');
define('_VNEWS_AM_TOPIC_SHOWTYPE_5','اسپایت لایت');
define('_VNEWS_AM_TOPIC_STYLE','استایل تاپیک');
// Content page
define('_VNEWS_AM_STORY_FORM','مدیریت اخبار');
define('_VNEWS_AM_STORY_FORMTITLE','عنوان');
define('_VNEWS_AM_STORY_FORMTITLE_DISP','نمایش عنوان صفحه؟');
define('_VNEWS_AM_STORY_FORMAUTHOR','سازنده ( نام)');
define('_VNEWS_AM_STORY_FORMSOURCE','منبع ( لینک)');
define('_VNEWS_AM_STORY_FORMTEXT','متن');
define('_VNEWS_AM_STORY_FORMTEXT_DESC','ساخت یا ویرایش صفحه');
define('_VNEWS_AM_STORY_FORMGROUP','گروه ها');
define('_VNEWS_AM_STORY_FORMALIAS','نام مستعار');
define('_VNEWS_AM_STORY_FORMACTIF','فعال');
define('_VNEWS_AM_STORY_IMPORTANT','مهم');
define('_VNEWS_AM_STORY_FORMDEFAULT','پیشفرض');
define('_VNEWS_AM_STORY_FORMPREV','صفحه قبلی');
define('_VNEWS_AM_STORY_FORMNEXT','صقحه بعدی');
define('_VNEWS_AM_STORY_DOHTML','نمایش به صورت Html');
define('_VNEWS_AM_STORY_BREAKS','تبدیل خط شکسته فعال');
define('_VNEWS_AM_STORY_DOIMAGE','نمایش تصاویر');
define('_VNEWS_AM_STORY_DOXCODE','نمایش کدها');
define('_VNEWS_AM_STORY_DOSMILEY','نمایش لبخند ها');
define('_VNEWS_AM_STORY_SHORT','متن خلاصه');
define('_VNEWS_AM_STORY_TITLE','عنوان');
define('_VNEWS_AM_STORY_MANAGER','مدیریت اخبار');
define('_VNEWS_AM_STORY_FILE','فایل');
define('_VNEWS_AM_STORY_ID','شماره');
define('_VNEWS_AM_STORY_NUM','وزن');
define('_VNEWS_AM_STORY_PAGE','صفحه');
define('_VNEWS_AM_STORY_TYPE','نوع');
define('_VNEWS_AM_STORY_OWNER','سازنده');
define('_VNEWS_AM_STORY_ACTIF','فعال');
define('_VNEWS_AM_STORY_DEFAULT','پیشفرض');
define('_VNEWS_AM_STORY_ORDER','چیدمان');
define('_VNEWS_AM_STORY_ACTION','عملگرها');
define('_VNEWS_AM_STORY_VIEW','نمایش');
define('_VNEWS_AM_STORY_EDIT','ویرایش');
define('_VNEWS_AM_STORY_DELETE','حذف');
define('_VNEWS_AM_STORY_SHORTDESC','توضیح خلاصه');
define('_VNEWS_AM_STORY_TOPIC','شاخه');
define('_VNEWS_AM_STORY_TOPIC_DESC','اگر شاخه ای انتخاب نکنید <br />صفحه شما یک صفحه استاتیک خواهد بود');
define('_VNEWS_AM_STORY_STATIC','صفحه استاتیک');
define('_VNEWS_AM_STORY_STATICS','صفحات استاتیک');
define('_VNEWS_AM_STORY_ALL_ITEMS','تمام صفحه ها و منو ها از تمام شاخه ها');
define('_VNEWS_AM_STORY_ALL_ITEMS_FROM','تمام صفحه ها و منو ها از شاخه :');
define('_VNEWS_AM_STORY_FILE_DESC','برای اضافه کردن فایل های بیشتر به بخش مدیریت فایل ها مراجعه نمایید');
define('_VNEWS_AM_STORY_SUBTITLE','عنوان دوم');
define('_VNEWS_AM_STORY_ALL','همه اخبار');
define('_VNEWS_AM_STORY_OFFLINE','اخبار منتظر برای تایید');
define('_VNEWS_AM_STORY_EXPIRE','اخبار باطل شده');
define('_VNEWS_AM_STORY_PEDATE','تنظیم زمان نمایش و باطل شدن');
define('_VNEWS_AM_STORY_SETDATETIME','تعیین زمان/تاریخ قرار گرفتن خبر در سایت');
define('_VNEWS_AM_STORY_SETEXPDATETIME','تعیین زمان/تاریخ منقضی شدن خبر در سایت');
define('_VNEWS_AM_STORY_SLIDE','استفاده در اسلایدشو');
define('_VNEWS_AM_STORY_MARQUE','استفاده در مارکیو');
define('_VNEWS_AM_STORY_OPTIONS','گزینه ها');
// Tools page
define('_VNEWS_AM_TOOLS_FORMFOLDER_TITLE','تکثیر ماژول');
define('_VNEWS_AM_TOOLS_FORMFOLDER_NAME','نام پوشه');
define('_VNEWS_AM_TOOLS_LOG_TITLE','گزارش تکثیر ماژول');
define('_VNEWS_AM_TOOLS_FORMPURGE_TITLE','حذف اخباری که ماژول تکثیر شدیشان حذف شده است');
define('_VNEWS_AM_TOOLS_ALIAS_TITLE','دوباره سازی نام مستعار');
define('_VNEWS_AM_TOOLS_ALIAS_CONTENT','دوباره سازی نام مستعار صفحه');
define('_VNEWS_AM_TOOLS_ALIAS_TOPIC','دوباره سازی نام مستعار شاخه');
define('_VNEWS_AM_TOOLS_META_TITLE','دوباره سازی متا ها');
define('_VNEWS_AM_TOOLS_META_KEYWORD','دوباره سازی کلمات کلیدی متا');
define('_VNEWS_AM_TOOLS_META_DESCRIPTION','دوباره سازی توضیحات متا');
define('_VNEWS_AM_TOOLS_PRUNE','هرس کردن خبرها');
define('_VNEWS_AM_TOOLS_PRUNE_BEFORE','هرس کردن خبرهایی که قبل از این تاریخ در سایت قرار گرفته‌اند');
define('_VNEWS_AM_TOOLS_PRUNE_EXPIREDONLY','فقط خبرهایی را حذف کن که منقضی شده‌اند ');
define('_VNEWS_AM_TOOLS_PRUNE_TOPICS','محدود به سرفصل‌های زیر');
define('_VNEWS_AM_TOOLS_PRUNE_EXPORT_DSC','اگر هیچکدام را انتخاب نکنید همه سرفصل‌ها در نظر گرفته می‌شوند وگرنه فقط سرفصل‌های انتخاب شده در نظر گرفته می‌شوند');
// Permissions
define('_VNEWS_AM_PERMISSIONS_ACCESS','دسترسی نمایش');
define('_VNEWS_AM_PERMISSIONS_SUBMIT','دسترسی ارسال');
define('_VNEWS_AM_PERMISSIONS_GLOBAL','دسترسی سراسری');
define('_VNEWS_AM_PERMISSIONS_GLOBAL_4','رای');
define('_VNEWS_AM_PERMISSIONS_GLOBAL_8','ارسال در بخش کاربر');
define('_VNEWS_AM_PERMISSIONS_GLOBAL_16','تایید خودکار');
// Attach files
define('_VNEWS_AM_FILE','فایل');
define('_VNEWS_AM_FILE_ID','شماره');
define('_VNEWS_AM_FILE_ONLINE','آنلاین');
define('_VNEWS_AM_FILE_ACTION','فعال');
define('_VNEWS_AM_FILE_FORM','اضافه کردن فایل');
define('_VNEWS_AM_FILE_TITLE','عنوان');
define('_VNEWS_AM_FILE_CONTENT','صفحه');
define('_VNEWS_AM_FILE_STATUS','فعال');
define('_VNEWS_AM_FILE_SELECT','انتخاب فایل');
define('_VNEWS_AM_FILE_TYPE','نوع');
// Admin message
define('_VNEWS_AM_MSG_DBUPDATE','پایگاه داده ها با موفقیت به روز شد!');
define('_VNEWS_AM_MSG_ERRORDELETE','شما نمیتوایند این سند را حذف کنید <br />لطفا ابتدا تمام زیر سند ها را حذف یا منتقل کنید');
define('_VNEWS_AM_MSG_WAIT','لطفا چند لحظه صبر کنید !');
define('_VNEWS_AM_MSG_DELETE','آیا اطمینان دارید که میخواهید %s را حذف کنید؟');
define('_VNEWS_AM_MSG_EDIT_ERROR','این صفحه پیدا نشد یا آی دی صفحه اشتباه است!');
define('_VNEWS_AM_MSG_UPDATE_ERROR','ناتوان در به روز رسانی پایگاه داده ها! خطا در به روز رسانی صفحه');
define('_VNEWS_AM_MSG_INSERT_ERROR','ناتوان در به روز رسانی پایگاه داده ها! خطا در مورد اخبار');
define('_VNEWS_AM_MSG_CLONE_ERROR','این شاخه هماکنون موجود است!');
define("_VNEWS_AM_MSG_NOPERMSSET","هیچ دسترسی قابل تنظیم نیست : هنوز هیچ شاخه ای ساخته نشده است! لطفا ابتدا یک شاخه بسازید.");
define('_VNEWS_AM_MSG_ALIASERROR','نام مستعار مورد انتخاب شما گرفته شده است. لطفا یک نام دیگر انتخاب کنید.');
define('_VNEWS_AM_MSG_INPROC','دوباره سازی ...');
define('_VNEWS_AM_MSG_PRUNE_DELETED','%s خبر حذف شده.');
// about
define('_VNEWS_AM_ABOUT_ADMIN','درباره');
define('_VNEWS_AM_ABOUT_DESCRIPTION','توضیحات:');
define('_VNEWS_AM_ABOUT_AUTHOR','سازنده:');
define('_VNEWS_AM_ABOUT_CREDITS','معارفه:');
define('_VNEWS_AM_ABOUT_LICENSE','مجوز:');
define('_VNEWS_AM_ABOUT_MODULE_INFO','اطلاعات ماژول:');
define('_VNEWS_AM_ABOUT_RELEASEDATE','زمان انتشار:');
define("_VNEWS_AM_ABOUT_UPDATEDATE","زمان به روز رسانی: ");
define('_VNEWS_AM_ABOUT_MODULE_STATUS','وضعیت:');
define('_VNEWS_AM_ABOUT_WEBSITE','وب سایت:');
define('_VNEWS_AM_ABOUT_AUTHOR_INFO','اطلاعات سازنده');
define('_VNEWS_AM_ABOUT_AUTHOR_NAME','نام:');
define('_VNEWS_AM_ABOUT_CHANGELOG','فهرست تغییرات');
