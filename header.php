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

//defined('XOOPS_ROOT_PATH') || exit('Restricted access.');
include __DIR__ . '/../../mainfile.php';

$moduleDirName = basename(__DIR__);

require_once XOOPS_ROOT_PATH . "/modules/$moduleDirName/include/functions.php";
require_once XOOPS_ROOT_PATH . "/modules/$moduleDirName/class/perm.php";
require_once XOOPS_ROOT_PATH . "/modules/$moduleDirName/class/utils.php";
require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

// Initialize content handler
$storyHandler = xoops_getModuleHandler('story', $moduleDirName);
$topicHandler = xoops_getModuleHandler('topic', $moduleDirName);
$fileHandler  = xoops_getModuleHandler('file', $moduleDirName);
$rateHandler  = xoops_getModuleHandler('rate', $moduleDirName);
$permHandler  = VnewsPermission::getHandler();
