<?php
/**
 * Menu configuration file
 *
 * LICENSE
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * @copyright   XOOPS Project (https://xoops.org)
 * @license     http://www.fsf.org/copyleft/gpl.html GNU public license
 * @author      Hossein Azizabadi (AKA Voltan)
 * @version     $Id$
 */

$i = 1;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_HOME,
    'link' => 'admin/index.php',
     'icon' => 'assets/images/admin/home.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_TOPIC,
    'link' => 'admin/topic.php',
     'icon' => 'assets/images/admin/category.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_ARTICLE,
    'link' => 'admin/article.php',
     'icon' => 'assets/images/admin/content.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_FILE,
    'link' => 'admin/file.php',
     'icon' => 'assets/images/admin/file.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_TOOLS,
    'link' => 'admin/tools.php',
     'icon' => 'assets/images/admin/administration.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_PERM,
    'link' => 'admin/permissions.php',
     'icon' => 'assets/images/admin/permissions.png');
$i++;
$adminmenu[$i] = array(
    'title' => _VNEWS_MI_ABOUT,
    'link' => 'admin/about.php',
     'icon' => 'assets/images/admin/about.png');
