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
 * News action script file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Andricq Nicolas (AKA MusS)
 * @author      Hossein Azizabadi (AKA Voltan)
 * @param $module
 * @return bool
 */

function xoops_module_uninstall_news($module)
{
    $db = $GLOBALS['xoopsDB'];

    $created_tables = [0 => 'vnews_story', 1 => 'vnews_topic', 2 => 'vnews_file'];

    foreach ($created_tables as $ct) {
        $db->query('DROP TABLE ' . $db->prefix($ct));
    }

    return true;
}
