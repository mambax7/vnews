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
 * News
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 * @param $story_id
 * @param $story_comments
 */
// comment callback functions

function vnews_com_update($story_id, $story_comments)
{
    $db  = XoopsDatabaseFactory::getDatabaseConnection();
    $sql = 'UPDATE ' . $db->prefix('vnews_story') . ' SET story_comments = ' . $story_comments . ' WHERE story_id = ' . $story_id;
    $db->query($sql);
}

function vnews_com_approve()
{
    // not yet
}
