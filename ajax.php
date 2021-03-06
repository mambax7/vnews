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

error_reporting(0);
$GLOBALS['xoopsLogger']->activated = false;

// Set option
$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', '', 'string');

if (!empty($op)) {
    switch ($op) {
        // Get last story as json
        case 'story':
        case 'liststory':
            $story_infos                = [];
            $story_infos['story_id']    = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'storyid', 0, 'int');
            $story_infos['story_topic'] = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'storytopic', 0, 'int');
            $story_infos['story_limit'] = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'limit', 50, 'int');
            $return                     = $storyHandler->News_StoryJson($story_infos);
            break;
        // Get single story as json
        case 'singlestory':
            $ret                   = [];
            $story_id              = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'storyid', 0, 'int');
            $obj                   = $storyHandler->get($story_id);
            $story                 = $obj->toArray();
            $json['story_id']      = $story['story_id'];
            $json['story_title']   = $story['story_title'];
            $json['story_alias']   = $story['story_alias'];
            $json['story_publish'] = $story['story_publish'];
            $json['story_topic']   = $story['story_topic'];
            $json['story_img']     = $story['story_img'];
            $json['story_body']    = strip_tags($story['story_short'] . ' ' . $story['story_text'], '<br>');
            $json['story_body']    = preg_replace('#<br\s*/?>#i', "\n", $json['story_body']);
            $ret[]                 = $json;
            $return                = json_encode($ret);
            unset($story);
            break;
        // vote to story
        case 'rate':
            if ($GLOBALS['xoopsModuleConfig']['vote_active']) {
                $info          = [];
                $info['story'] = VnewsUtils::News_UtilityCleanVars($_POST, 'story', 0, 'int');
                $info['rate']  = VnewsUtils::News_UtilityCleanVars($_POST, 'rate', 0, 'int');
                if ($info['story'] && $info['rate']) {
                    $return = $rateHandler->News_RateDo($info);
                }
            }
            break;
    }
    echo $return;
}
