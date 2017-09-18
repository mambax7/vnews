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
 * News Admin page
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/header.php';

// Display Admin header
xoops_cp_header();

//$adminObject = \Xmf\Module\Admin::getInstance();
$xoopsTpl->assign('navigation', 'index' );
$xoopsTpl->assign('navtitle', _VNEWS_MI_HOME);

// Add module stylesheet
$xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/system/css/admin.css');

$folder = [
    XOOPS_ROOT_PATH . '/uploads/vnews/',
    XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews'),
    XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/thumb/',
    XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/medium/',
    XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/original/',
    XOOPS_ROOT_PATH . xoops_getModuleOption('file_dir', 'vnews')
];

$story_infos = [
    'story_topic' => null,
];

//$adminObject = \Xmf\Module\Admin::getInstance();
$adminObject->addInfoBox(_VNEWS_AM_INDEX_ADMENU1);
$adminObject->addInfoBoxLine(sprintf( _VNEWS_AM_INDEX_TOPICS, $topicHandler->News_TopicCount()),'');

$adminObject->addInfoBox(_VNEWS_AM_INDEX_ADMENU2);
$adminObject->addInfoBoxLine(sprintf( _VNEWS_AM_INDEX_CONTENTS, $storyHandler->News_StoryAllCount()), '');
$adminObject->addInfoBoxLine(sprintf( _VNEWS_AM_INDEX_CONTENTS_OFFLINE, $storyHandler->News_StoryOfflineCount($story_infos)), '');
$adminObject->addInfoBoxLine(sprintf( _VNEWS_AM_INDEX_CONTENTS_EXPIRE, $storyHandler->News_StoryExpireCount($story_infos)), '');

foreach (array_keys($folder) as $i) {
    $adminObject->addConfigBoxLine($folder[$i], 'folder');
    $adminObject->addConfigBoxLine([$folder[$i], '777'], 'chmod');
}


//$adminObject->displayNavigation(basename(__FILE__));
//$adminObject->displayNavigation(basename(__FILE__));
$xoopsTpl->assign('renderindex', $adminObject->displayIndex());

// Call template file
$xoopsTpl->display(XOOPS_ROOT_PATH . '/modules/vnews/templates/admin/vnews_index.tpl');

// Display Xoops footer
include __DIR__ . '/footer.php';
xoops_cp_footer();
