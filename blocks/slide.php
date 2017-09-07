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
 * Module block slide file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 * @param $options
 * @return array
 */

function vnews_slide_show($options)
{
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    require_once XOOPS_ROOT_PATH . '/modules/vnews/include/functions.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/perm.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/utils.php';

    global $xoTheme;

    $block       = [];
    $story_infos = [];

    $story_infos['story_limit']  = $options[1];
    $block['slidetype']          = $options[2];
    $story_infos['title_lenght'] = $options[3];
    $story_infos['desc_lenght']  = $options[4];
    $block['slidewidth']         = $options[5];
    $block['slideheight']        = $options[6];
    $block['imagewidth']         = $options[7];
    $block['imageheight']        = $options[8];

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    $story_infos['topics'] = $topicHandler->getall();
    $block['slide']        = $storyHandler->News_StorySlide($story_infos, $options);

    switch ($block['slidetype']) {

        case 'scrollable':
            $style = '
             .slider {
                    width: ' . $block['slidewidth'] . 'px;
                    height: ' . $block['slideheight'] * 1.06 . 'px;
                }
                .slider .main {
                    height: ' . $block['slideheight'] * 1.06 . 'px;
                }
                .slider .page {
                    width: ' . $block['slidewidth'] . 'px;
                    height: ' . $block['slideheight'] . 'px;
                }
                .slider .scrollable {
                    width: ' . $block['slidewidth'] . 'px;
                    height: ' . $block['slideheight'] . 'px;
                }
                .slider .item {
                    width: ' . $block['slidewidth'] . 'px;
                    height: ' . $block['slideheight'] . 'px;
                }
                .slider .item .itemleft img {
                    width: ' . $block['slidewidth'] / 2 . 'px;
                }';
            $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
            $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/scrollable/scrollable.js');
            $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/scrollable/setting.js');
            $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/scrollable.css');
            $xoTheme->addStylesheet(null, ['rel' => 'stylesheet'], $style);
            break;

        case 'sliderkit':
            $xoTheme->addScript('browse.php?Frameworks/jquery/jquery.js');
            $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/sliderkit/sliderkit.min.js');
            $xoTheme->addScript(XOOPS_URL . '/modules/vnews/assets/js/sliderkit/sliderkitsetting.js');
            $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/sliderkit-core.css');
            $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/sliderkit-demos.css');
            break;
    }

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function vnews_slide_edit($options)
{

    //appel de la class
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    $criteria = new CriteriaCompo();
    $criteria->setSort('topic_weight ASC, topic_title');
    $criteria->setOrder('ASC');
    $topic_arr = $topicHandler->getall($criteria);

    $form  = "<input type=\"hidden\" name=\"options[]\" value=\"" . $options[0] . "\">";
    $form  .= _VNEWS_MB_NUMBER . " : <input type=\"text\" name=\"options[1]\" size=\"5\" maxlength=\"10\" value=\"" . $options[1] . "\" type=\"text\"><br>\n";
    $slide = new XoopsFormSelect(_VNEWS_MB_SLIDETYPE, 'options[]', $options[2]);
    $slide->addOption('scrollable', _VNEWS_MB_SLIDETYPE_1);
    $slide->addOption('sliderkit', _VNEWS_MB_SLIDETYPE_2);
    $form .= _VNEWS_MB_SLIDETYPE . ' : ' . $slide->render() . '<br>';
    $form .= _VNEWS_MB_CHARS . ":<input type=\"text\" name=\"options[3]\" size=\"5\" maxlength=\"10\" value=\"" . $options[3] . "\"><br>";
    $form .= _VNEWS_MB_CHARS_DESC . ":<input type=\"text\" name=\"options[4]\" size=\"5\" maxlength=\"10\" value=\"" . $options[4] . "\"><br>";

    $form .= _VNEWS_MB_SLIDEW . ":<input type=\"text\" name=\"options[5]\" size=\"5\" maxlength=\"10\" value=\"" . $options[5] . "\"><br>";
    $form .= _VNEWS_MB_SLIDEh . ":<input type=\"text\" name=\"options[6]\" size=\"5\" maxlength=\"10\" value=\"" . $options[6] . "\"><br>";
    $form .= _VNEWS_MB_IMAGEW . ":<input type=\"text\" name=\"options[7]\" size=\"5\" maxlength=\"10\" value=\"" . $options[7] . "\"><br>";
    $form .= _VNEWS_MB_IMAGEH . ":<input type=\"text\" name=\"options[8]\" size=\"5\" maxlength=\"10\" value=\"" . $options[8] . "\"><br>";

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    $form .= _VNEWS_MB_TOPICDISPLAY . "<br><select name=\"options[]\" multiple=\"multiple\" size=\"5\">\n";
    $form .= "<option value=\"0\" " . (array_search(0, $options) === false ? '' : 'selected') . '>' . _VNEWS_MB_ALLMENUS . "</option>\n";
    foreach (array_keys($topic_arr) as $i) {
        $form .= "<option value=\"" . $topic_arr[$i]->getVar('topic_id') . "\" " . (array_search($topic_arr[$i]->getVar('topic_id'), $options) === false ? '' : 'selected') . '>' . $topic_arr[$i]->getVar('topic_title') . "</option>\n";
    }
    $form .= "</select>\n";

    return $form;
}
