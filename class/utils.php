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
 * News Utils class
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

use WideImage\WideImage;

class VnewsUtils
{
    /**
     * Uploadimg public function
     *
     * For manage all upload parts for images
     * Add topic , Edit topic , Add article , Edit article
     * @param $type
     * @param $obj
     * @param $image
     */
    public static function News_UtilityUploadImg($type, $obj, $image)
    {
        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $pach_original = XOOPS_ROOT_PATH . $GLOBALS['xoopsModuleConfig']['img_dir'] . '/original/';
        $pach_medium   = XOOPS_ROOT_PATH . $GLOBALS['xoopsModuleConfig']['img_dir'] . '/medium/';
        $pach_thumb    = XOOPS_ROOT_PATH . $GLOBALS['xoopsModuleConfig']['img_dir'] . '/thumb/';

        $uploader_img = new XoopsMediaUploader($pach_original, xoops_getModuleOption('img_mime', 'vnews'), xoops_getModuleOption('img_size', 'vnews'), xoops_getModuleOption('img_maxwidth', 'vnews'), xoops_getModuleOption('img_maxheight', 'vnews'));
        if ($uploader_img->fetchMedia($type)) {
            $uploader_img->setPrefix($type . '_');
            $uploader_img->fetchMedia($type);
            if (!$uploader_img->upload()) {
                $errors = $uploader_img->getErrors();
                self::News_UtilityRedirect('javascript:history.go(-1)', 3, $errors);
                xoops_cp_footer();
                exit();
            } else {
                $obj->setVar($type, $uploader_img->getSavedFileName());
                self::News_UtilityResizePicture($pach_original . $uploader_img->getSavedFileName(), $pach_medium . $uploader_img->getSavedFileName(), xoops_getModuleOption('img_mediumwidth', 'vnews'), xoops_getModuleOption('img_mediumheight', 'vnews'));
                self::News_UtilityResizePicture($pach_original . $uploader_img->getSavedFileName(), $pach_thumb . $uploader_img->getSavedFileName(), xoops_getModuleOption('img_thumbwidth', 'vnews'), xoops_getModuleOption('img_thumbheight', 'vnews'));
            }
        } else {
            if (isset($image)) {
                $obj->setVar($type, $image);
            }
        }
    }

    /**
     * Deleteimg public function
     *
     * For Deleteing uploaded images
     * Edit topic ,Edit article
     * @param $type
     * @param $obj
     */
    public static function News_UtilityDeleteImg($type, $obj)
    {
        if ($obj->getVar($type)) {

            // delete original image
            $currentPicture = XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/original/' . $obj->getVar($type);
            if (is_file($currentPicture) && file_exists($currentPicture)) {
                if (!unlink($currentPicture)) {
                    trigger_error('Error, impossible to delete the picture attached to this article');
                }
            }

            // delete original medium
            $currentPicture = XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/medium/' . $obj->getVar($type);
            if (is_file($currentPicture) && file_exists($currentPicture)) {
                if (!unlink($currentPicture)) {
                    trigger_error('Error, impossible to delete the picture attached to this article');
                }
            }

            // delete original thumb
            $currentPicture = XOOPS_ROOT_PATH . xoops_getModuleOption('img_dir', 'vnews') . '/thumb/' . $obj->getVar($type);
            if (is_file($currentPicture) && file_exists($currentPicture)) {
                if (!unlink($currentPicture)) {
                    trigger_error('Error, impossible to delete the picture attached to this article');
                }
            }
        }
        $obj->setVar($type, '');
    }

    /**
     * Uploadfile public function
     *
     * For manage all upload parts for files
     * @param $type
     * @param $obj
     * @param $file
     */
    public static function News_UtilityUploadFile($type, $obj, $file)
    {
        require_once XOOPS_ROOT_PATH . '/class/uploader.php';
        $uploader = new XoopsMediaUploader(XOOPS_ROOT_PATH . xoops_getModuleOption('file_dir', 'vnews'), explode('|', xoops_getModuleOption('file_mime', 'vnews')), xoops_getModuleOption('file_size', 'vnews'));
        if ($uploader->fetchMedia($type)) {
            $uploader->setPrefix($type . '_');
            $uploader->fetchMedia($type);
            if ($uploader->upload()) {
                $obj->setVar($type, $uploader->getSavedFileName());
                $obj->setVar('file_type', preg_replace('/^.*\./', '', $uploader->getSavedFileName()));
            } else {
                echo _AM_UPLOAD_ERROR . ' ' . $uploader->getErrors();
            }
        } else {
            $errors = $uploader->getErrors();
            self::News_UtilityRedirect('javascript:history.go(-1)', 3, $errors);
            xoops_cp_footer();
            exit();
        }
    }

    /**
     *
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Gregory Mage (Aka Mage)
     * @param        $lasturl
     * @param        $breadcrumbtitle
     * @param        $topic_id
     * @param string $prefix
     * @param string $title
     * @return string
     */
    public static function News_UtilityBreadcrumb(
        $lasturl,
        $breadcrumbtitle,
        $topic_id,
        $prefix = ' &raquo; ',
        $title = 'topic_title'
    ) {
        $breadcrumb = '';
        require_once XOOPS_ROOT_PATH . '/modules/vnews/class/topic.php';
        require_once $GLOBALS ['xoops']->path('/class/tree.php');
        $topicHandler = xoops_getModuleHandler('topic', 'vnews');

        $criteria   = new CriteriaCompo();
        $topics_arr = $topicHandler->getall($criteria);
        $mytree     = new XoopsObjectTree($topics_arr, 'topic_id', 'topic_pid');

        if (xoops_getModuleOption('bc_tohome', 'vnews')) {
            $breadcrumb = '<a title="' . _VNEWS_MD_HOME . '" href="' . XOOPS_URL . '">' . _VNEWS_MD_HOME . '</a>' . $prefix;
        }
        $breadcrumb = $breadcrumb . self::News_UtilityPathTreeUrl($mytree, $topic_id, $topics_arr, $title, $prefix, true, 'ASC', $lasturl, xoops_getModuleOption('bc_modname', 'vnews'));
        if ($lasturl) {
            $breadcrumb = $breadcrumb . $prefix . $breadcrumbtitle;
        }

        return $breadcrumb;
    }

    /**
     *
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Gregory Mage (Aka Mage)
     * @param        $mytree
     * @param        $key
     * @param        $topic_array
     * @param        $title
     * @param string $prefix
     * @param bool   $link
     * @param string $order
     * @param bool   $lasturl
     * @param        $modname
     * @return string
     */
    public static function News_UtilityPathTreeUrl(
        $mytree,
        $key,
        $topic_array,
        $title,
        $prefix = ' &raquo; ',
        $link = false,
        $order = 'ASC',
        $lasturl = false,
        $modname
    ) {
        global $xoopsModule;
        $topic_parent = $mytree->getAllParent($key);
        if ($order == 'ASC') {
            $topic_parent = array_reverse($topic_parent);
            if ($link === true && $modname) {
                if ($key) {
                    $Path = '<a title="' . $xoopsModule->name() . '" href="' . XOOPS_URL . '/modules/vnews/index.php">' . $xoopsModule->name() . '</a>' . $prefix;
                } else {
                    $Path = '<a title="' . $xoopsModule->name() . '" href="' . XOOPS_URL . '/modules/vnews/index.php">' . $xoopsModule->name() . '</a>';
                }
            } elseif ($modname) {
                $Path = $xoopsModule->name() . $prefix;
            } else {
                $Path = '';
            }
        } else {
            if (array_key_exists($key, $topic_array)) {
                $first_category = $topic_array [$key]->getVar($title);
            } else {
                $first_category = '';
            }
            $Path = $first_category . $prefix;
        }
        foreach (array_keys($topic_parent) as $j) {
            if ($link === true) {
                $topic_info = array(
                    'topic_id'    => $topic_parent [$j]->getVar('topic_id'),
                    'topic_title' => $topic_parent [$j]->getVar('topic_title'),
                    'topic_alias' => $topic_parent [$j]->getVar('topic_alias'),
                );
                $Path       .= '<a title="' . $topic_parent [$j]->getVar($title) . '" href="' . self::News_UtilityTopicUrl($topic_info) . '">' . $topic_parent [$j]->getVar($title) . '</a>' . $prefix;
            } else {
                $Path .= $topic_parent [$j]->getVar($title) . $prefix;
            }
        }
        if ($order == 'ASC') {
            if (array_key_exists($key, $topic_array)) {
                if ($lasturl === true) {
                    $first_category = '<a title="' . $topic_array [$key]->getVar($title) . '" href="' . self::News_UtilityTopicUrl(array(
                                                                                                                                       'topic_id'    => $topic_array [$key]->getVar('topic_id'),
                                                                                                                                       'topic_alias' => $topic_array [$key]->getVar('topic_alias')
                                                                                                                                   )) . '">' . $topic_array [$key]->getVar($title) . '</a>';
                } else {
                    $first_category = $topic_array [$key]->getVar($title);
                }
            } else {
                $first_category = '';
            }
            $Path .= $first_category;
        } else {
            if ($link === true) {
                $Path .= '<a title="' . $xoopsModule->name() . '" href="' . XOOPS_URL . '/modules/vnews/index.php">' . $xoopsModule->name() . '</a>';
            } else {
                $Path .= $xoopsModule->name();
            }
        }

        return $Path;
    }

    /**
     * Homepage public function
     * For management module index page
     * Types:
     * list all contents from all topics whit out topic list
     * List all topics
     * List all static pages
     * Show selected content
     * @param $story_infos
     * @param $type
     * @return array
     */
    public static function News_UtilityHomePage($story_infos, $type)
    {
        $storyHandler = xoops_getModuleHandler('story', 'vnews');
        $topicHandler = xoops_getModuleHandler('topic', 'vnews');
        if (!$type) {
            $type = 'type1';
        }
        $stores = array();

        switch ($type) {

            // list all contents from all topics whit out topic list
            case 'type1':
                $stores ['content'] = $storyHandler->News_StoryList($story_infos);
                $stores ['numrows'] = $storyHandler->News_StoryCount($story_infos);
                if ($stores ['numrows'] > $story_infos ['story_limit']) {
                    if ($story_infos ['story_topic']) {
                        $story_pagenav = new XoopsPageNav($stores ['numrows'], $story_infos ['story_limit'], $story_infos ['story_start'], 'start', 'limit=' . $story_infos ['story_limit'] . '&storytopic=' . $story_infos ['story_topic']);
                    } else {
                        $story_pagenav = new XoopsPageNav($stores ['numrows'], $story_infos ['story_limit'], $story_infos ['story_start'], 'start', 'limit=' . $story_infos ['story_limit']);
                    }
                    $stores ['pagenav'] = $story_pagenav->renderNav(4);
                } else {
                    $stores ['pagenav'] = '';
                }
                break;

            // List all topics
            case 'type2':
                $topic_order        = $GLOBALS['xoopsModuleConfig']['admin_showorder_topic'];
                $topic_sort         = $GLOBALS['xoopsModuleConfig']['admin_showsort_topic'];
                $topic_parent       = $story_infos ['story_topic'];
                $stores ['content'] = $topicHandler->News_TopicList(null, 0, $topic_order, $topic_sort, null, 1, $topic_parent);
                $stores ['pagenav'] = null;
                break;

            // List all static pages
            case 'type3':
                if (!$story_infos ['story_topic']) {
                    $story_infos ['story_topic'] = 0;
                }
                $story_infos ['story_subtopic'] = null;
                $story_infos ['story_static']   = 0;
                $story_infos ['admin_side']     = 1;

                $stores ['content'] = $storyHandler->News_StoryList($story_infos);
                $stores ['numrows'] = $storyHandler->News_StoryCount($story_infos);
                if ($stores ['numrows'] > $story_infos ['story_limit']) {
                    if ($story_topic) {
                        $story_pagenav = new XoopsPageNav($stores ['numrows'], $story_infos ['story_limit'], $story_infos ['story_start'], 'start', 'limit=' . $story_infos ['story_limit'] . '&storytopic=' . $story_infos ['story_topic']);
                    } else {
                        $story_pagenav = new XoopsPageNav($stores ['numrows'], $story_infos ['story_limit'], $story_infos ['story_start'], 'start', 'limit=' . $story_infos ['story_limit']);
                    }
                    $stores ['pagenav'] = $story_pagenav->renderNav(4);
                } else {
                    $stores ['pagenav'] = '';
                }
                break;

            // Show selected static content
            case 'type4':
                if ($story_infos['id'] && $story_infos['title'] && $story_infos['alias']) {
                    $id    = $story_infos['id'];
                    $title = $story_infos['title'];
                    $alias = $story_infos['alias'];
                } else {
                    $id    = 0;
                    $title = $GLOBALS['xoopsModuleConfig']['static_name'];
                    $alias = self::News_UtilityAliasFilter($GLOBALS['xoopsModuleConfig']['static_name']);
                }
                $default_info       = array('id' => $id, 'title' => $title, 'alias' => $alias);
                $stores ['content'] = $storyHandler->News_StoryDefault($default_info);
                break;
        }

        return $stores;
    }

    /**
     * Verify that a field exists inside a mysql table
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Hervé Thouzard (ttp://www.instant-zero.com)
     * @param $fieldname
     * @param $table
     * @return bool
     */
    public static function News_UtilityFieldExists($fieldname, $table)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF("SHOW COLUMNS FROM $table LIKE '$fieldname'");

        return ($xoopsDB->getRowsNum($result) > 0);
    }

    /**
     * Add a field to a mysql table
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Hervé Thouzard (ttp://www.instant-zero.com)
     * @param $field
     * @param $table
     * @return
     */
    public static function News_UtilityAddField($field, $table)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF('ALTER TABLE ' . $table . ' ADD ' . $field);

        return $result;
    }

    /**
     * DROP a field from a mysql table
     * @param $field
     * @param $table
     * @return
     */
    public static function News_UtilityDropField($field, $table)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF('ALTER TABLE ' . $table . ' DROP ' . $field);

        return $result;
    }

    /**
     * Verify that a mysql table exists
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Hervé Thouzard (ttp://www.instant-zero.com)
     * @param $tablename
     * @return bool
     */
    public static function News_UtilityTableExists($tablename)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF("SHOW TABLES LIKE '$tablename'");

        return ($xoopsDB->getRowsNum($result) > 0);
    }

    /**
     * Add a table
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Hervé Thouzard (ttp://www.instant-zero.com)
     * @param $query
     * @return
     */
    public function News_UtilityAddTable($query)
    {
        global $xoopsDB;
        $result = $xoopsDB->queryF($query);

        return $result;
    }

    /**
     * Resize a Picture to some given dimensions (using the wideImage library)
     *
     * @copyright   {@link https://xoops.org/ XOOPS Project}
     * @license     GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
     * @author      Hervé Thouzard (ttp://www.instant-zero.com)
     *
     * @param string  $src_path      Picture's source
     * @param string  $dst_path      Picture's destination
     * @param integer $param_width   Maximum picture's width
     * @param integer $param_height  Maximum picture's height
     * @param boolean $keep_original Do we have to keep the original picture ?
     * @param string  $fit           Resize mode (see the wideImage library for more information)
     *
     * @return bool
     */
    public function News_UtilityResizePicture(
        $src_path,
        $dst_path,
        $param_width,
        $param_height,
        $keep_original = true,
        $fit = 'inside'
    ) {
        //        require XOOPS_ROOT_PATH . '/modules/vnews/class/wideimage/WideImage.inc.php';
        $resize = true;
        echo $src_path;
        $pictureDimensions = getimagesize($src_path);
        if (is_array($pictureDimensions)) {
            $pictureWidth  = $pictureDimensions[0];
            $pictureHeight = $pictureDimensions[1];
            if ($pictureWidth < $param_width && $pictureHeight < $param_height) {
                $resize = false;
            }
        }

        $img = WideImage::load($src_path);
        if ($resize) {
            $result = $img->resize($param_width, $param_height, $fit);
            $result->saveToFile($dst_path);
        } else {
            copy($src_path, $dst_path);
        }
        if (!$keep_original) {
            unlink($src_path);
        }

        return true;
    }

    /**
     *  Rebuild
     * @param $handler
     * @param $item_id
     * @param $op
     * @param $set
     * @param $get
     * @param $start_id
     * @param $end_id
     */
    public static function News_UtilityRebuild($handler, $item_id, $op, $set, $get, $start_id, $end_id)
    {
        // check last_id
        $criteria = new CriteriaCompo();
        $criteria->setSort($item_id);
        $criteria->setOrder('DESC');
        $criteria->setLimit(1);
        $last = $handler->getObjects($criteria);
        foreach ($last as $item) {
            $last_id = $item->getVar($item_id);
        }

        // set end_id
        $end_id = $end_id + 250;

        // do rebuild
        while ($start_id <= $end_id) {
            $obj = $handler->get($start_id);
            if ($obj) {
                $new = self::News_UtilityDoRebuild($op, $obj->getVar($get, 'e'));
                $obj->setVar($set, $new);
                $handler->insert($obj);
            }
            $start_id = $start_id + 1;
        }

        // Redirect
        if ($start_id <= $last_id) {
            self::News_UtilityRedirect('tools.php?op=' . $op . '&start_id=' . $start_id . '&end_id=' . $end_id, 3, _VNEWS_AM_MSG_INPROC);
            xoops_cp_footer();
            exit();
        }
    }

    /**
     *  Make text for Rebuild
     * @param $op
     * @param $get
     * @return mixed|string
     */
    public function News_UtilityDoRebuild($op, $get)
    {
        switch ($op) {
            case 'alias':
                $item = self::News_UtilityAliasFilter($get);
                break;

            case 'topicalias':
                $item = self::News_UtilityAliasFilter($get);
                break;

            case 'keyword':
                $item = self::News_UtilityMetaFilter($get);
                break;

            case 'description':
                $item = self::News_UtilityAjaxFilter($get);
                break;
        }

        return $item;
    }

    /**
     * Get variables passed by GET or POST method
     * @param        $global
     * @param        $key
     * @param string $default
     * @param string $type
     * @return false|int|mixed|string
     */
    public static function News_UtilityCleanVars(&$global, $key, $default = '', $type = 'int')
    {
        switch ($type) {
            case 'array':
                $ret = (isset($global[$key]) && is_array($global[$key])) ? $global[$key] : $default;
                break;
            case 'date':
                $ret = isset($global[$key]) ? strtotime($global[$key]) : $default;
                break;
            case 'string':
                $ret = isset($global[$key]) ? filter_var($global[$key], FILTER_SANITIZE_MAGIC_QUOTES) : $default;
                break;
            case 'int':
            default:
                $ret = isset($global[$key]) ? filter_var($global[$key], FILTER_SANITIZE_NUMBER_INT) : $default;
                break;
        }
        if ($ret === false) {
            return $default;
        }

        return $ret;
    }

    /**
     * Check html editors
     *
     */
    public static function News_UtilityEditorHTML()
    {
        $editor = $GLOBALS['xoopsModuleConfig']['form_editor'];
        if (isset($editor)
            && in_array($editor, array('tinymce', 'fckeditor', 'koivi', 'inbetween', 'spaw', 'ckeditor'))) {
            return true;
        }

        return false;
    }

    /**
     * Replace all escape, character, ... for display a correct url
     *
     * @String  $url    string to transform
     * @String  $type   string replacement for any blank case
     * @param        $url
     * @param string $type
     * @param string $module
     *
     * @return mixed|string $url
     */
    public static function News_UtilityAliasFilter($url, $type = '', $module = 'vnews')
    {

        // Get regular expression from module setting. default setting is : `[^a-z0-9]`i
        $regular_expression = $GLOBALS['xoopsModuleConfig']['regular_expression'];

        $url = strip_tags($url);
        $url = preg_replace("`\[.*\]`U", '', $url);
        $url = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $url);
        $url = htmlentities($url, ENT_COMPAT, 'utf-8');
        $url = preg_replace('`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', "\\1", $url);
        $url = preg_replace(array($regular_expression, '`[-]+`'), '-', $url);
        $url = ($url == '') ? $type : strtolower(trim($url, '-'));

        return $url;
    }

    /**
     * Replace all escape, character, ... for display a correct Meta
     *
     * @String  $meta    string to transform
     * @String  $type   string replacement for any blank case
     * @param               $meta
     * @param  string       $type
     * @param  string       $module
     * @return mixed|string $meta
     */
    public static function News_UtilityMetaFilter($meta, $type = '', $module = 'vnews')
    {

        // Get regular expression from module setting. default setting is : `[^a-z0-9]`i
        $regular_expression = $GLOBALS['xoopsModuleConfig']['regular_expression'];

        $meta = strip_tags($meta);
        $meta = preg_replace("`\[.*\]`U", '', $meta);
        $meta = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', ',', $meta);
        $meta = htmlentities($meta, ENT_COMPAT, 'utf-8');
        $meta = preg_replace('`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', "\\1", $meta);
        $meta = preg_replace(array($regular_expression, '`[,]+`'), ',', $meta);
        $meta = ($meta == '') ? $type : strtolower(trim($meta, ','));

        return $meta;
    }

    /**
     * Replace all escape, character, ... for display a correct text
     *
     * @String  $text    string to transform
     * @String  $type   string replacement for any blank case
     * @param               $text
     * @param  string       $type
     * @return mixed|string $text
     */
    public static function News_UtilityAjaxFilter($text, $type = '')
    {
        $text = strip_tags($text);
        $text = preg_replace("`\[.*\]`U", '', $text);
        $text = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $text);
        $text = htmlentities($text, ENT_COMPAT, 'utf-8');
        $text = preg_replace('`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', "\\1", $text);
        $text = stripslashes($text);

        return $text;
    }

    /**
     * Build Redirect page
     * @param        $url
     * @param int    $time
     * @param string $message
     */
    public static function News_UtilityRedirect($url, $time = 3, $message = '')
    {
        redirect_header($url, $time, $message);
    }

    /**
     * Build Message
     * @param        $page
     * @param string $message
     * @param        $id
     * @param        $handler
     */
    public static function News_UtilityMessage($page, $message = '', $id, $handler)
    {
        global $xoopsModule;
        $tpl = new XoopsTpl();
        //ob_start();
        $tpl->assign('message', $message);
        $tpl->assign('id', $id);
        $tpl->assign('url', $page);
        $tpl->assign('handler', $handler);
        $tpl->assign('ifnotreload', sprintf(_IFNOTRELOAD, $page));
        echo $tpl->fetch(XOOPS_ROOT_PATH . '/modules/' . $xoopsModule->getVar('dirname') . '/templates/admin/vnews_confirm.tpl');
        //ob_flush();
    }

    /**
     * Build topic URL
     * @param $array
     * @return string
     */
    public static function News_UtilityTopicUrl($array)
    {
        $lenght_id    = $GLOBALS['xoopsModuleConfig']['lenght_id'];
        $friendly_url = $GLOBALS['xoopsModuleConfig']['friendly_url'];
        if ($lenght_id != 0) {
            $id = $array['topic_id'];
            while (strlen($id) < $lenght_id) {
                $id = '0' . $id;
            }
        } else {
            $id = $array['topic_id'];
        }

        switch ($friendly_url) {

            case 'none':
                $rewrite_base = '/modules/';
                $page         = 'page=' . $array['topic_alias'];

                return XOOPS_URL . $rewrite_base . '/vnews/index.php?storytopic=' . $id . '&amp;' . $page;
                break;

            case 'rewrite':
                $rewrite_base = $GLOBALS['xoopsModuleConfig']['rewrite_mode'];
                $rewrite_ext  = $GLOBALS['xoopsModuleConfig']['rewrite_ext'];
                $module_name  = '';
                if ($GLOBALS['xoopsModuleConfig']['rewrite_name']) {
                    $module_name = $GLOBALS['xoopsModuleConfig']['rewrite_name'] . '/';
                }
                $page = $array['topic_alias'];
                $type = $GLOBALS['xoopsModuleConfig']['topic_name'] . '/';
                $id   = $id . '/';

                return XOOPS_URL . $rewrite_base . $module_name . $type . $id . $page . $rewrite_ext;
                break;

            case 'short':
                $rewrite_base = $GLOBALS['xoopsModuleConfig']['rewrite_mode'];
                $rewrite_ext  = $GLOBALS['xoopsModuleConfig']['rewrite_ext'];
                $module_name  = '';
                if ($GLOBALS['xoopsModuleConfig']['rewrite_name']) {
                    $module_name = $GLOBALS['xoopsModuleConfig']['rewrite_name'] . '/';
                }
                $page = $array['topic_alias'];
                $type = $GLOBALS['xoopsModuleConfig']['topic_name'] . '/';

                return XOOPS_URL . $rewrite_base . $module_name . $type . $page . $rewrite_ext;
                break;

            case 'id':
                return XOOPS_URL . '/modules/vnews/index.php?storytopic=' . $id;
                break;

            case 'topic':
                return XOOPS_URL . '/modules/vnews/index.php?storytopic=' . $id;
                break;
        }
    }

    /**
     * Build Item URL
     * @param        $array
     * @param string $type
     * @return string
     */
    public static function News_UtilityStoryUrl($array, $type = 'article')
    {
        $comment      = '';
        $lenght_id    = $GLOBALS['xoopsModuleConfig']['lenght_id'];
        $friendly_url = $GLOBALS['xoopsModuleConfig']['friendly_url'];

        if ($lenght_id != 0) {
            $id = $array['story_id'];
            while (strlen($id) < $lenght_id) {
                $id = '0' . $id;
            }
        } else {
            $id = $array['story_id'];
        }

        if (isset($array['topic_alias']) && $array['topic_alias']) {
            $topic_name = $array['topic_alias'];
        } else {
            $topic_name = self::News_UtilityAliasFilter($GLOBALS['xoopsModuleConfig']['static_name']);
        }

        switch ($friendly_url) {

            case 'none':
                if ($topic_name) {
                    $topic_name = 'topic=' . $topic_name . '&amp;';
                }
                $rewrite_base = '/modules/';
                $page         = 'page=' . $array['story_alias'];

                return XOOPS_URL . $rewrite_base . 'vnews' . '/' . $type . '.php?' . $topic_name . 'storyid=' . $id . '&amp;' . $page . $comment;
                break;

            case 'rewrite':
                if ($topic_name) {
                    $topic_name = $topic_name . '/';
                }
                $rewrite_base = $GLOBALS['xoopsModuleConfig']['rewrite_mode'];
                $rewrite_ext  = $GLOBALS['xoopsModuleConfig']['rewrite_ext'];
                $module_name  = '';
                if ($GLOBALS['xoopsModuleConfig']['rewrite_name']) {
                    $module_name = $GLOBALS['xoopsModuleConfig']['rewrite_name'] . '/';
                }
                $page = $array['story_alias'];
                $type = $type . '/';
                $id   = $id . '/';
                if ($type == 'article/') {
                    $type = '';
                }

                if ($type == 'comment-edit/' || $type == 'comment-reply/' || $type == 'comment-delete/') {
                    return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
                }

                return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $id . $page . $rewrite_ext;
                break;

            case 'short':
                if ($topic_name) {
                    $topic_name = $topic_name . '/';
                }
                $rewrite_base = $GLOBALS['xoopsModuleConfig']['rewrite_mode'];
                $rewrite_ext  = $GLOBALS['xoopsModuleConfig']['rewrite_ext'];
                $module_name  = '';
                if ($GLOBALS['xoopsModuleConfig']['rewrite_name']) {
                    $module_name = $GLOBALS['xoopsModuleConfig']['rewrite_name'] . '/';
                }
                $page = $array['story_alias'];
                $type = $type . '/';
                if ($type == 'article/') {
                    $type = '';
                }

                if ($type == 'comment-edit/' || $type == 'comment-reply/' || $type == 'comment-delete/') {
                    return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
                }

                return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $page . $rewrite_ext;
                break;

            case 'id':
                return XOOPS_URL . '/modules/vnews/' . $type . '.php?storyid=' . $id;
                break;

            case 'topic':
                return XOOPS_URL . '/modules/vnews/' . $type . '.php?storytopic=' . $array['story_topic'] . '&amp;storyid=' . $id;
                break;
        }
    }

    /**
     * @param     $elements
     * @param int $parentId
     *
     * @return array
     */
    public static function News_UtilityGetTree($elements, $parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['topic_pid'] == $parentId) {
                $children = self::News_UtilityGetTree($elements, $element['topic_id']);
                if ($children) {
                    $element['topic_children'] = $children;
                }
                $branch[$element['topic_id']] = $element;
                unset($elements[$element['topic_id']]);
            }
        }

        return $branch;
    }

    /**
     * @return int
     */
    public static function News_UtilityCurrentUserID()
    {
        global $xoopsUser;
        $uid = is_object($xoopsUser) ? $xoopsUser->getVar('uid') : 0;

        return $uid;
    }
}
