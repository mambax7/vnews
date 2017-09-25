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

function vnews_topic_show($options)
{
    $storyHandler  = xoops_getModuleHandler('story', 'vnews');
    $topicHandler  = xoops_getModuleHandler('topic', 'vnews');
    $moduleHandler = xoops_getHandler('module');

    $block                = [];
    $block['showtype']    = $options[1];
    $block['img']         = $options[2];
    $block['description'] = $options[3];
    $count                = $options[4];
    $float                = $options[5];
    $info['topic_order']  = $options[6];
    $info['topic_sort']   = $options[7];

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    if ($count) {
        $info['newscountbytopic'] = $storyHandler->News_StoryCountByTopic();
    }
    $topics          = $topicHandler->News_TopicBlockList($info);
    $block['topics'] = $topics;
    $block['float']  = $float;
    $block['count']  = $count;

    return $block;
}

/**
 * @param $options
 *
 * @return string
 */
function vnews_topic_edit($options)
{
    $form = "<input type=\"hidden\" name=\"options[]\" value=\"" . $options[0] . "\">";

    $show_select = new XoopsFormSelect(_VNEWS_MI_SHOWTYPE, 'options[]', $options[1]);
    $show_select->addOption('list', _VNEWS_MI_SHOWTYPE_4);
    $show_select->addOption('table', _VNEWS_MI_SHOWTYPE_2);
    $form .= _VNEWS_MI_SHOWTYPE . ' : ' . $show_select->render() . '<br>';

    if (false === $options[2]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_IMG . " : <input name=\"options[2]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[2]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    if (false === $options[3]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_DESCRIPTION . " : <input name=\"options[3]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[3]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    if (false === $options[4]) {
        $checked_yes = '';
        $checked_no  = 'checked';
    } else {
        $checked_yes = 'checked';
        $checked_no  = '';
    }
    $form .= _VNEWS_MB_COUNT . " : <input name=\"options[4]\" value=\"1\" type=\"radio\" " . $checked_yes . '>' . _YES . "&nbsp;\n";
    $form .= "<input name=\"options[4]\" value=\"0\" type=\"radio\" " . $checked_no . '>' . _NO . "<br>\n";

    $float_select = new XoopsFormSelect(_VNEWS_MI_IMAGE_FLOAT, 'options[]', $options[5]);
    $float_select->addOption('left', _VNEWS_MI_IMAGE_LEFT);
    $float_select->addOption('right', _VNEWS_MI_IMAGE_RIGHT);
    $form .= _VNEWS_MI_IMAGE_FLOAT . ' : ' . $float_select->render() . '<br>';

    $order_select = new XoopsFormSelect(_VNEWS_MI_SHOWORDER, 'options[]', $options[6]);
    $order_select->addOption('DESC', _VNEWS_MI_DESC);
    $order_select->addOption('ASC', _VNEWS_MI_ASC);
    $form .= _VNEWS_MI_SHOWORDER . ' : ' . $order_select->render() . '<br>';

    $sort_select = new XoopsFormSelect(_VNEWS_MI_SHOWSORT, 'options[]', $options[7]);
    $sort_select->addOption('topic_id', _VNEWS_MI_SHOWSORT_1);
    $sort_select->addOption('topic_publish', _VNEWS_MI_SHOWSORT_2);
    $sort_select->addOption('topic_update', _VNEWS_MI_SHOWSORT_3);
    $sort_select->addOption('topic_title', _VNEWS_MI_SHOWSORT_4);
    $sort_select->addOption('topic_order', _VNEWS_MI_SHOWSORT_5);
    $sort_select->addOption('RAND()', _VNEWS_MI_SHOWSORT_6);
    $form .= _VNEWS_MI_SHOWSORT . ' : ' . $sort_select->render() . '<br>';

    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);
    array_shift($options);

    return $form;
}
