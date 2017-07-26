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
 * @param $items
 * @return bool
 */

function vnews_tag_iteminfo(&$items)
{
    if (empty($items) || !is_array($items)) {
        return false;
    }

    $items_id = array();
    foreach (array_keys($items) as $cat_id) {
        foreach (array_keys($items[$cat_id]) as $item_id) {
            $items_id[] = (int)$item_id;
        }
    }

    $itemHandler = xoops_getModuleHandler('story', 'vnews');
    $items_obj   = $itemHandler->getObjects(new Criteria('story_id', '(' . implode(', ', $items_id) . ')', 'IN'), true);

    foreach (array_keys($items) as $cat_id) {
        foreach (array_keys($items[$cat_id]) as $item_id) {
            if (isset($items_obj[$item_id])) {
                $item_obj                 =& $items_obj[$item_id];
                $items[$cat_id][$item_id] = array(
                    'title'   => $item_obj->getVar('story_title'),
                    'uid'     => $item_obj->getVar('story_author'),
                    'link'    => "article.php?id={$item_obj->getVar('story_id')}",
                    'time'    => $item_obj->getVar('story_create'),
                    'tags'    => '',
                    'content' => '',
                );
            }
        }
    }
    unset($items_obj);
}

/**
 * @param $mid
 */
function vnews_tag_synchronization($mid)
{
    $itemHandler = xoops_getModuleHandler('story', 'vnews');
    $linkHandler = xoops_getModuleHandler('link', 'tag');

    /* clear tag-item links */
    if (version_compare(mysqli_get_server_info(), '4.1.0', 'ge')):
        $sql = "    DELETE FROM {$linkHandler->table}"
               . '    WHERE '
               . "        tag_modid = {$mid}"
               . '        AND '
               . '        ( tag_itemid NOT IN '
               . "            ( SELECT DISTINCT {$itemHandler->keyName} "
               . "                FROM {$itemHandler->table} "
               . "                WHERE {$itemHandler->table}.status > 0"
               . '            ) '
               . '        )'; else:
        $sql = "    DELETE {$linkHandler->table} FROM {$linkHandler->table}"
               . "    LEFT JOIN {$itemHandler->table} AS aa ON {$linkHandler->table}.tag_itemid = aa.{$itemHandler->keyName} "
               . '    WHERE '
               . "        tag_modid = {$mid}"
               . '        AND '
               . "        ( aa.{$itemHandler->keyName} IS NULL"
               . '            OR aa.status < 1'
               . '        )';
    endif;
    if (!$result = $linkHandler->db->queryF($sql)) {
        //xoops_error($linkHandler->db->error());
    }
}
