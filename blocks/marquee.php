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
 * Module block marquee file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 * @param $options
 * @return array
 */

function vnews_marquee_show($options)
{
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    require_once XOOPS_ROOT_PATH . '/modules/vnews/include/functions.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/perm.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/utils.php';

    global $xoTheme;

    $block                       = [];
    $story_infos                 = [];
    $story_infos['story_limit']  = $options[1];
    $story_infos['title_lenght'] = $options[2];
    $block['show_date']          = $options[3];

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    $story_infos['topics'] = $topicHandler->getall();
    $block['marquee']      = $storyHandler->News_StoryMarquee($story_infos, $options);

    $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
    $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/marquee/marquee.js');
    $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/marquee/setting.js');
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/marquee.css');

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function vnews_marquee_edit($options)
{

    //appel de la class
    $storyHandler = xoops_getModuleHandler('story', 'vnews');
    $topicHandler = xoops_getModuleHandler('topic', 'vnews');

    $criteria = new CriteriaCompo();
    $criteria->setSort('topic_weight ASC, topic_title');
    $criteria->setOrder('ASC');
    $topic_arr = $topicHandler->getall($criteria);

    $form = "<input type=\"hidden\" name=\"options[]\" value=\"" . $options[0] . "\">";
    $form .= _VNEWS_MB_NUMBER . " : <input type=\"text\" name=\"options[1]\" size=\"5\" maxlength=\"10\" value=\"" . $options[1] . "\" type=\"text\"><br>\n";
    $form .= _VNEWS_MB_CHARS . ":<input type=\"text\" name=\"options[2]\" size=\"5\" maxlength=\"10\" value=\"" . $options[2] . "\"><br>";

    if (false === $options[3]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_DATE . " : <input name=\"options[3]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[3]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    $form .= _VNEWS_MB_TOPICDISPLAY . "<br><select name=\"options[]\" multiple=\"multiple\" size=\"5\">\n";
    $form .= "<option value=\"0\" " . (false === array_search(0, $options) ? '' : 'selected') . '>' . _VNEWS_MB_ALLMENUS . "</option>\n";
    foreach (array_keys($topic_arr) as $i) {
        $form .= "<option value=\"" . $topic_arr[$i]->getVar('topic_id') . "\" " . (false === array_search($topic_arr[$i]->getVar('topic_id'), $options) ? '' : 'selected') . '>' . $topic_arr[$i]->getVar('topic_title') . "</option>\n";
    }
    $form .= "</select>\n";

    return $form;
}
