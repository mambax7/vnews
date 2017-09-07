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
$xoopsOption ['template_main'] = 'vnews_archive.tpl';
// include Xoops header
include XOOPS_ROOT_PATH . '/header.php';
// Add Stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/style.css');

require_once XOOPS_ROOT_PATH . '/language/' . $xoopsConfig['language'] . '/calendar.php';

$lastyear  = 0;
$lastmonth = 0;

$months_arr = [
    1  => _CAL_JANUARY,
    2  => _CAL_FEBRUARY,
    3  => _CAL_MARCH,
    4  => _CAL_APRIL,
    5  => _CAL_MAY,
    6  => _CAL_JUNE,
    7  => _CAL_JULY,
    8  => _CAL_AUGUST,
    9  => _CAL_SEPTEMBER,
    10 => _CAL_OCTOBER,
    11 => _CAL_NOVEMBER,
    12 => _CAL_DECEMBER
];

$fromyear  = VnewsUtils::News_UtilityCleanVars($_GET, 'year', 0, 'int');
$frommonth = VnewsUtils::News_UtilityCleanVars($_GET, 'month', 0, 'int');
$start     = VnewsUtils::News_UtilityCleanVars($_GET, 'start', 0, 'int');
$limit     = VnewsUtils::News_UtilityCleanVars($_GET, 'limit', 50, 'int');

$pgtitle = '';
if ($fromyear && $frommonth) {
    $pgtitle = sprintf(' - %d - %d', $fromyear, $frommonth);
}

$dateformat = 'm';

$xoopsTpl->assign('xoops_pagetitle', _VNEWS_MD_ARCHIVE . $pgtitle . ' - ' . $xoopsModule->name('s'));

$useroffset = '';
if (is_object($xoopsUser)) {
    $timezone = $xoopsUser->timezone();
    if (isset($timezone)) {
        $useroffset = $xoopsUser->timezone();
    } else {
        $useroffset = $xoopsConfig['default_TZ'];
    }
}

$result = $storyHandler->News_StoryArchiveMonth();
$years  = [];
$months = [];
$i      = 0;

while (list($time) = $xoopsDB->fetchRow($result)) {
    $time = formatTimestamp($time, 'mysql', $useroffset);
    if (preg_match('/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/', $time, $datetime)) {
        $this_year  = (int)$datetime[1];
        $this_month = (int)$datetime[2];
        if (empty($lastyear)) {
            $lastyear = $this_year;
        }
        if ($lastmonth == 0) {
            $lastmonth                    = $this_month;
            $months[$lastmonth]['string'] = $months_arr[$lastmonth];
            $months[$lastmonth]['number'] = $lastmonth;
        }
        if ($lastyear != $this_year) {
            $years[$i]['number'] = $lastyear;
            $years[$i]['months'] = $months;
            $months              = [];
            $lastmonth           = 0;
            $lastyear            = $this_year;
            ++$i;
        }
        if ($lastmonth != $this_month) {
            $lastmonth                    = $this_month;
            $months[$lastmonth]['string'] = $months_arr[$lastmonth];
            $months[$lastmonth]['number'] = $lastmonth;
        }
    }
}

$years[$i]['number'] = $this_year;
$years[$i]['months'] = $months;
$xoopsTpl->assign('years', $years);
$xoopsTpl->assign('module', 'vnews');

if ($fromyear != 0 && $frommonth != 0) {
    // must adjust the selected time to server timestamp
    $timeoffset = $useroffset - $xoopsConfig['server_TZ'];
    $monthstart = mktime(0 - $timeoffset, 0, 0, $frommonth, 1, $fromyear);
    $monthend   = mktime(23 - $timeoffset, 59, 59, $frommonth + 1, 0, $fromyear);
    $monthend   = ($monthend > time()) ? time() : $monthend;

    $topics  = $topicHandler->getall();
    $archive = $storyHandler->News_StoryArchive($monthstart, $monthend, $topics, $limit, $start);
    $numrows = $storyHandler->News_StoryArchiveCount($monthstart, $monthend, $topics);

    if ($numrows > $limit) {
        $pagenav = new XoopsPageNav($numrows, $limit, $start, 'start', 'limit=' . $limit . '&year=' . $fromyear . '&month=' . $frommonth);
        $pagenav = $pagenav->renderNav(4);
    } else {
        $pagenav = '';
    }

    $xoopsTpl->assign('archive', $archive);
    $xoopsTpl->assign('pagenav', $pagenav);
    $xoopsTpl->assign('show_articles', true);
} else {
    $xoopsTpl->assign('show_articles', false);
}

// include Xoops footer
include XOOPS_ROOT_PATH . '/footer.php';
