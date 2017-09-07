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
 * News search
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

// defined('XOOPS_ROOT_PATH') || exit('Restricted access.');

/**
 * @param $queryarray
 * @param $andor
 * @param $limit
 * @param $offset
 * @param $userid
 *
 * @return mixed
 */
function vnews_search($queryarray, $andor, $limit, $offset, $userid)
{
    $storyHandler = xoops_getModuleHandler('story', 'vnews');

    return $storyHandler->News_StorySearch($queryarray, $andor, $limit, $offset, $userid);
}
