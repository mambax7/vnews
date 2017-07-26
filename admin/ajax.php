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
 * News edit in place file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/header.php';

error_reporting(0);
$GLOBALS['xoopsLogger']->activated = false;

$ajax_type = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'type', '', 'string');

switch ($ajax_type) {
    case 'filter':
        $value = $func = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'value', '', 'string');
        echo VnewsUtils::News_UtilityAliasFilter($value);
        break;

    case 'words':
        $value = $func = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'value', '', 'string');
        echo VnewsUtils::News_UtilityMetaFilter($value);
        break;

    case 'desc':
        $value = $func = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'value', '', 'string');
        echo VnewsUtils::News_UtilityAjaxFilter($value);
        break;
}
