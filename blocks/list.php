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
 * Module block page file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 * @param $options
 * @return array
 */

function vnews_list_show($options)
{
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    require_once XOOPS_ROOT_PATH . '/modules/vnews/include/functions.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/perm.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/utils.php';

    global $xoTheme;

    $block                       = [];
    $show                        = $options[1];
    $story_infos['story_limit']  = $options[2];
    $story_infos['lenght_title'] = $options[3];
    $showimg                     = $options[4];
    $showdescription             = $options[5];
    $showdate                    = $options[6];
    $story_infos['story_sort']   = $options[7];
    $width                       = $options[8];
    $float                       = $options[9];
    $story_infos['story_order']  = $options[10];
    $block['showmore']           = $options[11];
    $block['morelink']           = $options[12];
    $day                         = $options[13];
    $topiclimit                  = $options[14];

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    // Set story publish
    if ('story_hits' == $story_infos['story_sort']) {
        if ($day) {
            $day                          = 86400 * $day;
            $story_infos['story_publish'] = time() - $day;
        } else {
            $story_infos['story_publish'] = 0;
        }
    } else {
        $story_infos['story_publish'] = 0;
    }

    // Set topic limit
    if ($topiclimit) {
        $topics   = [];
        $topics[] = VnewsUtils::News_UtilityCleanVars($_GET, 'storytopic', 0, 'int');
    } else {
        $topics = $options;
    }

    $story_infos ['topics'] = $topicHandler->getall();
    $stores                 = $storyHandler->News_StoryBlockList($story_infos, $topics);

    if ('spotlight' == $show) {
        $id                       = $storyHandler->News_StorySpotlightId($stores);
        $block['spotlightid']     = $id['spotlightid'];
        $block['subspotlightid1'] = $id['subspotlightid1'];
        $block['subspotlightid2'] = $id['subspotlightid2'];
    }

    // Add block data
    $block['show']        = $show;
    $block['img']         = $showimg;
    $block['imageurl']    = XOOPS_URL . xoops_getModuleOption('img_dir', 'vnews') . '/medium/';
    $block['thumburl']    = XOOPS_URL . xoops_getModuleOption('img_dir', 'vnews') . '/thumb/';
    $block['description'] = $showdescription;
    $block['date']        = $showdate;
    $block['contents']    = $stores;
    $block['width']       = $width;
    $block['float']       = $float;

    // Add styles
    $xoTheme->addStylesheet(XOOPS_URL . '/modules/vnews/assets/css/blocks.css', null);

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function vnews_list_edit($options)
{

    //appel de la class
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    $criteria = new CriteriaCompo();
    $criteria->setSort('topic_weight ASC, topic_title');
    $criteria->setOrder('ASC');
    $topic_arr = $topicHandler->getall($criteria);

    //$form = _VNEWS_MB_DISP . "&nbsp;\n";
    $form = "<input type=\"hidden\" name=\"options[]\" value=\"" . $options[0] . "\">";

    $show_select = new XoopsFormSelect(_VNEWS_MI_SHOWTYPE, 'options[]', $options[1]);
    $show_select->addOption('vnews', _VNEWS_MI_SHOWTYPE_1);
    //$show_select->addOption("table", _VNEWS_MI_SHOWTYPE_2);
    //$show_select->addOption("photo", _VNEWS_MI_SHOWTYPE_3);
    $show_select->addOption('list', _VNEWS_MI_SHOWTYPE_4);
    $show_select->addOption('spotlight', _VNEWS_MI_SHOWTYPE_5);
    $form .= _VNEWS_MI_SHOWTYPE . ' : ' . $show_select->render() . '<br>';

    $form .= _VNEWS_MB_NUMBER . " : <input name=\"options[2]\" size=\"5\" maxlength=\"255\" value=\"" . $options[2] . "\" type=\"text\"><br>\n";
    $form .= _VNEWS_MB_CHARS . " : <input name=\"options[3]\" size=\"5\" maxlength=\"255\" value=\"" . $options[3] . "\" type=\"text\"><br>\n";

    if (false === $options[4]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_IMG . " : <input name=\"options[4]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[4]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    if (false === $options[5]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_DESCRIPTION . " : <input name=\"options[5]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[5]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    if (false === $options[6]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_DATE . " : <input name=\"options[6]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[6]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    $story_sort = new XoopsFormSelect(_VNEWS_MI_SHOWSORT, 'options[]', $options[7]);
    $story_sort->addOption('story_id', _VNEWS_MI_SHOWSORT_1);
    $story_sort->addOption('story_publish', _VNEWS_MI_SHOWSORT_2);
    $story_sort->addOption('story_update', _VNEWS_MI_SHOWSORT_3);
    $story_sort->addOption('story_title', _VNEWS_MI_SHOWSORT_4);
    $story_sort->addOption('story_hits', _VNEWS_MI_SHOWSORT_7);
    $story_sort->addOption('RAND()', _VNEWS_MI_SHOWSORT_6);
    $form .= _VNEWS_MI_SHOWSORT . ' : ' . $story_sort->render() . '<br>';

    $form .= _VNEWS_MB_WIDTH . " : <input name=\"options[8]\" size=\"5\" maxlength=\"255\" value=\"" . $options[8] . "\" type=\"text\"><br>\n";

    $float_select = new XoopsFormSelect(_VNEWS_MI_IMAGE_FLOAT, 'options[]', $options[9]);
    $float_select->addOption('left', _VNEWS_MI_IMAGE_LEFT);
    $float_select->addOption('right', _VNEWS_MI_IMAGE_RIGHT);
    $form .= _VNEWS_MI_IMAGE_FLOAT . ' : ' . $float_select->render() . '<br>';

    $order_select = new XoopsFormSelect(_VNEWS_MI_SHOWORDER, 'options[]', $options[10]);
    $order_select->addOption('DESC', _VNEWS_MI_DESC);
    $order_select->addOption('ASC', _VNEWS_MI_ASC);
    $form .= _VNEWS_MI_SHOWORDER . ' : ' . $order_select->render() . '<br>';

    if (false === $options[11]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_SHOE_MORELINK . " : <input name=\"options[11]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[11]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    $form .= _VNEWS_MB_MORELINK . " : <input name=\"options[12]\" size=\"50\" maxlength=\"255\" value=\"" . $options[12] . "\" type=\"text\"><br>\n";
    $form .= _VNEWS_MB_HITINDAY1 . " <input name=\"options[13]\" size=\"5\" maxlength=\"255\" value=\"" . $options[13] . "\" type=\"text\">" . _VNEWS_MB_HITINDAY2 . "<br>\n";

    if (false === $options[14]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_TOPICLIMIT . " : <input name=\"options[14]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[14]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    $form .= '<br>' . _VNEWS_MB_TOPICDISPLAY . "<br><select name=\"options[]\" multiple=\"multiple\" size=\"5\">\n";
    $form .= "<option value=\"0\" " . (false === array_search(0, $options) ? '' : 'selected') . '>' . _VNEWS_MB_ALLMENUS . "</option>\n";
    foreach (array_keys($topic_arr) as $i) {
        $form .= "<option value=\"" . $topic_arr[$i]->getVar('topic_id') . "\" " . (false === array_search($topic_arr[$i]->getVar('topic_id'), $options) ? '' : 'selected') . '>' . $topic_arr[$i]->getVar('topic_title') . "</option>\n";
    }
    $form .= "</select>\n";

    return $form;
}
