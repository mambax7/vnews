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
 * News Admin page
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

require_once __DIR__ . '/header.php';

// Define default value
$op = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'op', 'new', 'string');
// Admin header
xoops_cp_header();
// Redirect to content page
if (!isset($op)) {
    VnewsUtils::News_UtilityRedirect('index.php', 0, _VNEWS_AM_MSG_WAIT);
    // Include footer
    xoops_cp_footer();
    exit();
}

switch ($op) {

    case 'add_topic':
        $obj = $topicHandler->create();
        $obj->setVars($_REQUEST);

        if ($topicHandler->News_TopicExistAlias($_REQUEST)) {
            VnewsUtils::News_UtilityRedirect('javascript:history.go(-1)', 3, _VNEWS_AM_MSG_ALIASERROR);
            xoops_cp_footer();
            exit();
        }

        $obj->setVar('topic_date_created', time());
        $obj->setVar('topic_date_update', time());
        $obj->setVar('topic_weight', $topicHandler->News_TopicOrder());

        //image
        VnewsUtils::News_UtilityUploadImg('topic_img', $obj, $_REQUEST ['topic_img']);

        if (!$topicHandler->insert($obj)) {
            VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
            xoops_cp_footer();
            exit();
        }

        $topic_id = $obj->db->getInsertId();

        //permission
        VnewsPermission::News_PermissionSet('vnews_view', $_POST ['groups_view'], $topic_id, true);
        VnewsPermission::News_PermissionSet('vnews_submit', $_POST ['groups_submit'], $topic_id, true);

        // Redirect page
        VnewsUtils::News_UtilityRedirect('topic.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'edit_topic':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $obj = $topicHandler->get($topic_id);
            $obj->setVars($_POST);
            $obj->setVar('topic_date_update', time());

            if ($topicHandler->News_TopicExistAlias($_REQUEST)) {
                VnewsUtils::News_UtilityRedirect('javascript:history.go(-1)', 3, _VNEWS_AM_MSG_ALIASERROR);
                xoops_cp_footer();
                exit();
            }

            //image
            VnewsUtils::News_UtilityUploadImg('topic_img', $obj, $_REQUEST ['topic_img']);
            if (isset($_POST ['deleteimage']) && 1 == (int)$_POST ['deleteimage']) {
                VnewsUtils::News_UtilityDeleteImg('topic_img', $obj);
            }
            //permission
            VnewsPermission::News_PermissionSet('vnews_view', $_POST ['groups_view'], $topic_id, false);
            VnewsPermission::News_PermissionSet('vnews_submit', $_POST ['groups_submit'], $topic_id, false);

            if (!$topicHandler->insert($obj)) {
                VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
                xoops_cp_footer();
                exit();
            }
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect('topic.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'add':
        $obj = $storyHandler->create();
        $obj->setVars($_REQUEST);

        if ($storyHandler->News_StoryExistAlias($_REQUEST)) {
            VnewsUtils::News_UtilityRedirect('javascript:history.go(-1)', 3, _VNEWS_AM_MSG_ALIASERROR);
            xoops_cp_footer();
            exit();
        }

        if (!$_REQUEST ['story_default'] && 0 == $_REQUEST ['story_topic']) {
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('story_topic', 0));
            $criteria->add(new Criteria('story_default', 1));
            if (!$storyHandler->getCount($criteria)) {
                $obj->setVar('story_default', '1');
            }
        }
        $obj->setVar('story_create', time());
        $obj->setVar('story_update', time());

        // Set publish and expire
        if ($_REQUEST ['autopublish'] && $_REQUEST ['story_publish']) {
            $obj->setVar('story_publish', strtotime($_REQUEST ['story_publish']['date']) + $_REQUEST ['story_publish']['time']);
        } else {
            $obj->setVar('story_publish', time());
        }

        if ($_REQUEST ['autoexpire'] && $_REQUEST ['story_expire']) {
            $obj->setVar('story_expire', strtotime($_REQUEST ['story_expire']['date']) + $_REQUEST ['story_expire']['time']);
        } else {
            $obj->setVar('story_expire', 0);
        }

        //image
        VnewsUtils::News_UtilityUploadImg('story_img', $obj, $_REQUEST ['story_img']);

        $storyHandler->News_StoryUpdatePost($_REQUEST ['story_uid'], $_REQUEST ['story_status'], $story_action = 'add');

        if (!$storyHandler->insert($obj)) {
            VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
            xoops_cp_footer();
            exit();
        }

        // Reset next and previous content
        $storyHandler->News_ResetNext($_REQUEST ['story_topic'], $obj->getVar('story_id'));
        $storyHandler->News_ResetPrevious($_REQUEST ['story_topic'], $obj->getVar('story_id'));

        // tag
        if (xoops_getModuleOption('usetag', 'vnews') && is_dir(XOOPS_ROOT_PATH . '/modules/tag')) {
            $tagHandler = xoops_getModuleHandler('tag', 'tag');
            $tagHandler->updateByItem($_POST ['item_tag'], $obj->getVar('story_id'), 0);
        }

        // file
        if (isset($_FILES['file_name']['name']) && !empty($_FILES['file_name']['name'])) {
            $fileobj = $fileHandler->create();
            $fileobj->setVar('file_date', time());
            $fileobj->setVar('file_title', $_REQUEST ['story_title']);
            $fileobj->setVar('file_story', $obj->getVar('story_id'));
            $fileobj->setVar('file_status', 1);

            VnewsUtils::News_UtilityUploadFile('file_name', $fileobj, $_REQUEST ['file_name']);
            $storyHandler->News_StoryFile('add', $obj->getVar('story_id'));
            if (!$fileHandler->insert($fileobj)) {
                VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
                xoops_cp_footer();
                exit();
            }
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect('article.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'edit':
        $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story_id', 0, 'int');
        if ($story_id > 0) {
            $obj = $storyHandler->get($story_id);
            $obj->setVars($_REQUEST);
            $obj->setVar('story_update', time());

            // Set publish and expire
            if ($_REQUEST ['autopublish'] && $_REQUEST ['story_publish']) {
                $obj->setVar('story_publish', strtotime($_REQUEST ['story_publish']['date']) + $_REQUEST ['story_publish']['time']);
            } else {
                $obj->setVar('story_publish', $obj->getVar('story_create'));
            }

            if ($_REQUEST ['autoexpire'] && $_REQUEST ['story_expire']) {
                $obj->setVar('story_expire', strtotime($_REQUEST ['story_expire']['date']) + $_REQUEST ['story_expire']['time']);
            } else {
                $obj->setVar('story_expire', 0);
            }

            if ($storyHandler->News_StoryExistAlias($_REQUEST)) {
                VnewsUtils::News_UtilityRedirect('javascript:history.go(-1)', 3, _VNEWS_AM_MSG_ALIASERROR);
                xoops_cp_footer();
                exit();
            }

            if (!isset($_REQUEST ['dohtml'])) {
                $obj->setVar('dohtml', 0);
            }

            if (!isset($_REQUEST ['dobr'])) {
                $obj->setVar('dobr', 0);
            }

            if (!isset($_REQUEST ['doimage'])) {
                $obj->setVar('doimage', 0);
            }

            if (!isset($_REQUEST ['dosmiley'])) {
                $obj->setVar('dosmiley', 0);
            }

            if (!isset($_REQUEST ['doxcode'])) {
                $obj->setVar('doxcode', 0);
            }

            //image
            VnewsUtils::News_UtilityUploadImg('story_img', $obj, $_REQUEST ['story_img']);
            if (isset($_POST ['deleteimage']) && 1 == (int)$_POST ['deleteimage']) {
                VnewsUtils::News_UtilityDeleteImg('story_img', $obj);
            }

            if (!$storyHandler->insert($obj)) {
                VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
                xoops_cp_footer();
                exit();
            }

            //tag
            if (xoops_getModuleOption('usetag', 'vnews') && is_dir(XOOPS_ROOT_PATH . '/modules/tag')) {
                $tagHandler = xoops_getModuleHandler('tag', 'tag');
                $tagHandler->updateByItem($_POST ['item_tag'], $story_id, $catid = 0);
            }

            // file
            if (isset($_FILES['file_name']['name']) && !empty($_FILES['file_name']['name'])) {
                $fileobj = $fileHandler->create();
                $fileobj->setVar('file_date', time());
                $fileobj->setVar('file_title', $_REQUEST ['story_title']);
                $fileobj->setVar('file_story', $obj->getVar('story_id'));
                $fileobj->setVar('file_status', 1);

                VnewsUtils::News_UtilityUploadFile('file_name', $fileobj, $_REQUEST ['file_name']);
                $storyHandler->News_StoryFile('add', $obj->getVar('story_id'));
                if (!$fileHandler->insert($fileobj)) {
                    VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
                    xoops_cp_footer();
                    exit();
                }
            }
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect('article.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'add_file':

        $obj = $fileHandler->create();
        $obj->setVars($_REQUEST);
        $obj->setVar('file_date', time());

        VnewsUtils::News_UtilityUploadFile('file_name', $obj, $_REQUEST ['file_name']);
        $storyHandler->News_StoryFile('add', $_REQUEST['file_story']);
        if (!$fileHandler->insert($obj)) {
            VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
            xoops_cp_footer();
            exit();
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect('file.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'edit_file':
        $file_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'file_id', 0, 'int');
        if ($file_id > 0) {
            $obj = $fileHandler->get($file_id);
            $obj->setVars($_REQUEST);

            if ($_REQUEST['file_story'] != $_REQUEST['file_previous']) {
                $storyHandler->News_StoryFile('add', $_REQUEST['file_story']);
                $storyHandler->News_StoryFile('delete', $_REQUEST['file_previous']);
            }

            if (!$fileHandler->insert($obj)) {
                VnewsUtils::News_UtilityRedirect('onclick="javascript:history.go(-1);"', 1, _VNEWS_AM_MSG_ERROR);
                xoops_cp_footer();
                exit();
            }
        }
        // Redirect page
        VnewsUtils::News_UtilityRedirect('file.php', 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;

    case 'status':
        $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story_id', 0, 'int');
        if ($story_id > 0) {
            $obj =& $storyHandler->get($story_id);
            $old = $obj->getVar('story_status');
            $storyHandler->News_StoryUpdatePost($obj->getVar('story_uid'), $obj->getVar('story_status'), $story_action = 'status');
            $obj->setVar('story_status', !$old);
            if ($storyHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'default':
        $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story_id', 0, 'int');
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($story_id > 0) {
            $criteria = new CriteriaCompo();
            $criteria->add(new Criteria('story_topic', $topic_id));
            $storyHandler->updateAll('story_default', 0, $criteria);
            $obj =& $storyHandler->get($story_id);
            $obj->setVar('story_default', 1);
            if ($storyHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'important':
        $story_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'story_id', 0, 'int');
        if ($story_id > 0) {
            $obj =& $storyHandler->get($story_id);
            $old = $obj->getVar('story_important');
            $obj->setVar('story_important', !$old);
            if ($storyHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'topic_asmenu':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $obj =& $topicHandler->get($topic_id);
            $old = $obj->getVar('topic_asmenu');
            $obj->setVar('topic_asmenu', !$old);
            if ($topicHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'topic_online':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $obj =& $topicHandler->get($topic_id);
            $old = $obj->getVar('topic_online');
            $obj->setVar('topic_online', !$old);
            if ($topicHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'topic_show':
        $topic_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'topic_id', 0, 'int');
        if ($topic_id > 0) {
            $obj =& $topicHandler->get($topic_id);
            $old = $obj->getVar('topic_show');
            $obj->setVar('topic_show', !$old);
            if ($topicHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'file_status':
        $file_id = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'file_id', 0, 'int');
        if ($file_id > 0) {
            $obj =& $fileHandler->get($file_id);
            $old = $obj->getVar('file_status');
            $obj->setVar('file_status', !$old);
            if ($fileHandler->insert($obj)) {
                exit();
            }
            echo $obj->getHtmlErrors();
        }
        break;

    case 'delete':
        //print_r($_POST);
        $id      = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'id', 0, 'int');
        $handler = VnewsUtils::News_UtilityCleanVars($_REQUEST, 'handler', 0, 'string');
        if ($id > 0 && $handler) {
            switch ($handler) {
                case 'content':
                    $obj = $storyHandler->get($id);
                    $url = 'article.php';
                    $storyHandler->News_StoryUpdatePost($obj->getVar('story_uid'), $obj->getVar('story_status'), $story_action = 'delete');
                    if (!$storyHandler->delete($obj)) {
                        echo $obj->getHtmlErrors();
                    }
                    break;
                case 'topic':
                    $obj = $topicHandler->get($id);
                    $url = 'topic.php';
                    if (!$topicHandler->delete($obj)) {
                        echo $obj->getHtmlErrors();
                    }
                    break;
                case 'file':
                    $obj = $fileHandler->get($id);
                    $url = 'file.php';
                    $storyHandler->News_StoryFile('delete', $obj->getVar('file_story'));
                    if (!$fileHandler->delete($obj)) {
                        echo $obj->getHtmlErrors();
                    }
                    break;
            }
        }

        // Redirect page
        VnewsUtils::News_UtilityRedirect($url, 1, _VNEWS_AM_MSG_WAIT);
        xoops_cp_footer();
        exit();
        break;
}

// Redirect page
VnewsUtils::News_UtilityRedirect('index.php', 1, _VNEWS_AM_MSG_WAIT);
// Include footer
xoops_cp_footer();
