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
 * News header file
 * Manage content page
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/../../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/include/cp_header.php';
require_once XOOPS_ROOT_PATH . '/class/tree.php';
require_once XOOPS_ROOT_PATH . '/modules/vnews/include/functions.php';
require_once XOOPS_ROOT_PATH . '/modules/vnews/class/perm.php';
require_once XOOPS_ROOT_PATH . '/modules/vnews/class/utils.php';

//require_once $GLOBALS['xoops']->path('Frameworks/moduleclasses/moduleadmin/moduleadmin.php');
require_once XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/moduleadmin/moduleadmin.php';

xoops_load('xoopsformloader');

$moduleDirName = basename(dirname(__DIR__));
// Initialize content handler

/** @var Xmf\Module\Admin $adminObject */
$adminObject = \Xmf\Module\Admin::getInstance();

$storyHandler = xoops_getModuleHandler('story', $moduleDirName);
$topicHandler = xoops_getModuleHandler('topic', $moduleDirName);
$fileHandler  = xoops_getModuleHandler('file', $moduleDirName);
$permHandler  = VnewsPermission::getHandler();
