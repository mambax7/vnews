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
 * News action script file
 *
 * @copyright   {@link https://xoops.org/ XOOPS Project}
 * @license     {@link http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @author      Hossein Azizabadi (AKA Voltan)
 */

/**
 * This function work just for update version 1.68 ( or 1.66 ) to version 1.8 and upper.
 * If your version is under 1.68 ( or 1.66 ) please first update your old version to 1.68.
 * @param $module
 * @param $version
 * @return bool
 */
function xoops_module_update_news($module, $version)
{
    $db    = $GLOBALS['xoopsDB'];
    $error = false;

    require_once XOOPS_ROOT_PATH . '/modules/vnews/include/functions.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/perm.php';
    require_once XOOPS_ROOT_PATH . '/modules/vnews/class/utils.php';
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    require_once XOOPS_ROOT_PATH . '/class/xoopstree.php';

    // start update to version 1.83
    if ($version < 183) {
        // story_link
        if (VnewsUtils::News_UtilityFieldExists('story_link', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_link', $db->prefix('vnews_story'));
        }
        // story_order
        if (VnewsUtils::News_UtilityFieldExists('story_order', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_order', $db->prefix('vnews_story'));
        }
        // story_groups
        if (VnewsUtils::News_UtilityFieldExists('story_groups', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_groups', $db->prefix('vnews_story'));
        }
        // story_next
        if (VnewsUtils::News_UtilityFieldExists('story_next', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_next', $db->prefix('vnews_story'));
        }
        // story_prev
        if (VnewsUtils::News_UtilityFieldExists('story_prev', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_prev', $db->prefix('vnews_story'));
        }
        // story_titleview
        if (VnewsUtils::News_UtilityFieldExists('story_titleview', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_titleview', $db->prefix('vnews_story'));
        }
        // story_modid
        if (VnewsUtils::News_UtilityFieldExists('story_modid', $db->prefix('vnews_story'))) {
            VnewsUtils::News_UtilityDropField('story_modid', $db->prefix('vnews_story'));
        }
        // topic sub
        if (!VnewsUtils::News_UtilityFieldExists('topic_showsub', $db->prefix('vnews_topic'))) {
            VnewsUtils::News_UtilityAddField('topic_showsub', $db->prefix('vnews_topic'));
        }
        // Update topic index
        // remove old index topic_alias
        $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP INDEX `topic_alias`';
        $db->query($sql);
        // add new index topic_alias
        $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD UNIQUE `topic_alias` (`topic_alias`)';
        $db->query($sql);
    }
    // end update to version 1.83

    // start update to version 1.80
    if ($version < 180) {
        $indexFile = XOOPS_ROOT_PATH . '/uploads/index.html';
        $blankFile = XOOPS_ROOT_PATH . '/uploads/blank.gif';

        //Creation du fichier creator dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/index.html');
        }

        //Creation du fichier price dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews/image';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/index.html');
            copy($blankFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/blank.gif');
        }

        //Creation du fichier price dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews/image/original';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/original/index.html');
            copy($blankFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/original/blank.gif');
        }

        //Creation du fichier price dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews/image/medium';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/medium/index.html');
            copy($blankFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/medium/blank.gif');
        }

        //Creation du fichier price dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews/image/thumb';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/thumb/index.html');
            copy($blankFile, XOOPS_ROOT_PATH . '/uploads/vnews/image/thumb/blank.gif');
        }

        //Creation du fichier price dans uploads
        $module_uploads = XOOPS_ROOT_PATH . '/uploads/vnews/file';
        if (!is_dir($module_uploads)) {
            mkdir($module_uploads, 0777);
            chmod($module_uploads, 0777);
            copy($indexFile, XOOPS_ROOT_PATH . '/uploads/vnews/file/index.html');
            copy($blankFile, XOOPS_ROOT_PATH . '/uploads/vnews/file/blank.gif');
        }

        // Add vnews_story table
        if (!VnewsUtils::News_UtilityTableExists($db->prefix('vnews_story'))) {
            $sql = 'RENAME TABLE `' . $db->prefix('stories') . '` TO `' . $db->prefix('vnews_story') . '`';
            if ($db->query($sql)) {
                /*
                  * Rename fields
                  */
                // story_id
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `storyid` `story_id` INT( 8 ) UNSIGNED NOT NULL AUTO_INCREMENT';
                $db->query($sql);
                // story_uid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `uid` `story_uid` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `title` `story_title` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_create
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `created` `story_create` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_publish
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `published` `story_publish` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_expire
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `expired` `story_expire` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_short
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `hometext` `story_short` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_text
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `bodytext` `story_text` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_words
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `keywords` `story_words` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_desc
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `description` `story_desc` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_hits
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `counter` `story_hits` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_topic
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `topicid` `story_topic` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_img
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `picture` `story_img` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL';
                $db->query($sql);
                // story_comments
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `comments` `story_comments` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                // story_rating
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `rating` `story_rating` DOUBLE(6,4) NOT NULL';
                $db->query($sql);
                // story_votes
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` CHANGE `votes` `story_votes` INT( 10 ) UNSIGNED NOT NULL';
                $db->query($sql);
                /*
                 * Add new fields
                 */
                // story_subtitle
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD `story_subtitle` VARCHAR(255) NOT NULL';
                $db->query($sql);
                // story_type
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_type` VARCHAR(25) NOT NULL';
                $db->query($sql);
                // story_alias
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_alias` VARCHAR(255) NOT NULL';
                $db->query($sql);
                // story_important
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_important` TINYINT(1) NOT NULL';
                $db->query($sql);
                // story_default
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_default` TINYINT(1) NOT NULL';
                $db->query($sql);
                // story_status
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_status` TINYINT(1) NOT NULL';
                $db->query($sql);
                // story_slide
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_slide` TINYINT(1) NOT NULL';
                $db->query($sql);
                // story_marquee
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_marquee` TINYINT(1) NOT NULL';
                $db->query($sql);
                // story_update
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_update` INT (10) NOT NULL';
                $db->query($sql);
                // story_author
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_author` VARCHAR(255) NOT NULL';
                $db->query($sql);
                // story_source
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_source` VARCHAR(255) NOT NULL';
                $db->query($sql);
                // story_file
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `story_file` TINYINT(3) NOT NULL';
                $db->query($sql);
                // dohtml
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `dohtml` TINYINT(1) NOT NULL';
                $db->query($sql);
                // dobr
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `dobr` TINYINT(1) NOT NULL';
                $db->query($sql);
                // doimage
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `doimage` TINYINT(1) NOT NULL';
                $db->query($sql);
                // dosmiley
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `dosmiley` TINYINT(1) NOT NULL';
                $db->query($sql);
                // doxcode
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD  `doxcode` TINYINT(1) NOT NULL';
                $db->query($sql);
                /*
                 * Remove old fields
                 */
                // hostname
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP `hostname`';
                $db->query($sql);
                // ihome
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP `ihome`';
                $db->query($sql);
                // notifypub
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP `notifypub`';
                $db->query($sql);
                // topicdisplay
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP `topicdisplay`';
                $db->query($sql);
                // topicalign
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP `topicalign`';
                $db->query($sql);
                /*
                 * Remove index
                 */
                // idxstoriestopic
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `idxstoriestopic`';
                $db->query($sql);
                // ihome
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `ihome`';
                $db->query($sql);
                // uid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `uid`';
                $db->query($sql);
                // published
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `published`';
                $db->query($sql);
                // title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `title`';
                $db->query($sql);
                // created
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `created`';
                $db->query($sql);
                // search
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` DROP INDEX `search`';
                $db->query($sql);
                /*
                 * Add index
                 */
                // story_alias
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD UNIQUE `story_alias` ( `story_alias` )';
                $db->query($sql);
                // story_topic
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_topic` ( `story_topic` )';
                $db->query($sql);
                // story_title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_title` ( `story_title` )';
                $db->query($sql);
                // story_create
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_create` ( `story_create` )';
                $db->query($sql);
                // story_publish
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_publish` ( `story_publish` )';
                $db->query($sql);
                // story_expire
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_expire` ( `story_expire` )';
                $db->query($sql);
                // story_uid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_uid` ( `story_uid` )';
                $db->query($sql);
                // story_type
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `story_type` ( `story_type` )';
                $db->query($sql);
                // select
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD INDEX `select` (`story_topic`, `story_status`, `story_publish`, `story_expire`)';
                $db->query($sql);
                // search
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_story') . '` ADD FULLTEXT `search` (`story_title` ,`story_short` ,`story_text` ,`story_subtitle`)';
                $db->query($sql);
            } else {
                return false;
            }
        }

        // Add vnews_topic table
        if (!VnewsUtils::News_UtilityTableExists($db->prefix('vnews_topic'))) {
            $sql = 'RENAME TABLE `' . $db->prefix('topics') . '` TO `' . $db->prefix('vnews_topic') . '`';
            if ($db->query($sql)) {
                /*
                   * Rename fields
                   */
                // topic_id
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_id` `topic_id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT';
                $db->query($sql);
                // topic_pid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_pid` `topic_pid` INT (5) UNSIGNED NOT NULL';
                $db->query($sql);
                // topic_title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_title` `topic_title` VARCHAR (255) NOT NULL ';
                $db->query($sql);
                // topic_desc
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_description` `topic_desc` TEXT';
                $db->query($sql);
                // topic_imgurl
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_imgurl` `topic_img` VARCHAR (255) NOT NULL';
                $db->query($sql);
                // topic_asmenu
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `menu` `topic_asmenu` TINYINT (1) NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_show
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` CHANGE `topic_frontpage` `topic_show` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                /*
                 * Add new fields
                 */
                // topic_weight
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_weight` INT (5)   NOT NULL';
                $db->query($sql);
                // topic_showtype
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showtype` TINYINT (4)   NOT NULL';
                $db->query($sql);
                // topic_perpage
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_perpage` TINYINT (4)   NOT NULL';
                $db->query($sql);
                // topic_columns
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_columns` TINYINT (4)   NOT NULL';
                $db->query($sql);
                // topic_submitter
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_submitter` INT (10)   NOT NULL';
                $db->query($sql);
                // topic_date_created
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_date_created` INT (10)   NOT NULL';
                $db->query($sql);
                // topic_date_update
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_date_update` INT (10)   NOT NULL';
                $db->query($sql);
                // topic_online
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_online` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showtopic
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showtopic` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showsub
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showsub` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showauthor
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showauthor` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showdate
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showdate` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showpdf
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showpdf` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showprint
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showprint` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showmail
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showmail` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_shownav
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_shownav` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showhits
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showhits` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_showcoms
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_showcoms` TINYINT (1)   NOT NULL DEFAULT "1"';
                $db->query($sql);
                // topic_alias
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_alias` VARCHAR(255) NOT NULL';
                $db->query($sql);
                // topic_homepage
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_homepage` TINYINT (4)   NOT NULL ';
                $db->query($sql);
                // topic_style
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD `topic_style` VARCHAR(64)   NOT NULL';
                $db->query($sql);
                /*
                 * Remove old fields
                 */
                // topic_rssurl
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP `topic_rssurl`';
                $db->query($sql);
                // topic_color
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP `topic_color`';
                $db->query($sql);
                /*
                 * Remove index
                 */
                // pid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP INDEX `pid`';
                $db->query($sql);
                // topic_title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP INDEX `topic_title`';
                $db->query($sql);
                // menu
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` DROP INDEX `menu`';
                $db->query($sql);
                /*
                 * Add index
                 */
                // topic_alias
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD UNIQUE `topic_alias` (`topic_alias`)';
                $db->query($sql);
                // topic_pid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD INDEX `topic_pid` (`topic_pid`)';
                $db->query($sql);
                // topic_online
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD INDEX `topic_online` (`topic_online`)';
                $db->query($sql);
                // topic_homepage
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_topic') . '` ADD INDEX `topic_homepage` (`topic_homepage`)';
                $db->query($sql);
            } else {
                return false;
            }
        }

        // Add vnews_file table
        if (!VnewsUtils::News_UtilityTableExists($db->prefix('vnews_file'))) {
            $sql = 'RENAME TABLE `' . $db->prefix('stories_files') . '` TO `' . $db->prefix('vnews_file') . '`';
            if ($db->query($sql)) {
                /*
                   * Rename fields
                   */
                // file_id
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `fileid` `file_id` INT (10) UNSIGNED NOT NULL  AUTO_INCREMENT';
                $db->query($sql);
                // file_title
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `filerealname` `file_title` VARCHAR (255) NOT NULL';
                $db->query($sql);
                // file_name
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `downloadname` `file_name` VARCHAR (255) NOT NULL';
                $db->query($sql);
                // file_story
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `storyid` `file_story` INT(10) NOT NULL';
                $db->query($sql);
                // file_date
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `date` `file_date` INT(10) NOT NULL';
                $db->query($sql);
                // file_hits
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `counter` `file_hits` INT(10) NOT NULL';
                $db->query($sql);
                // file_mimetype
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` CHANGE `mimetype` `file_mimetype` VARCHAR(64) NOT NULL DEFAULT ""';
                $db->query($sql);
                /*
                 * Add new fields
                 */
                // file_type
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` ADD `file_type` VARCHAR(64) NOT NULL DEFAULT ""';
                $db->query($sql);
                /*
                 * Add index
                 */
                // file_story
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` ADD INDEX `file_story` (`file_story`)';
                $db->query($sql);
                // file_story
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` ADD INDEX `file_status` (`file_status`)';
                $db->query($sql);
                // file_story
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_file') . '` ADD INDEX `file_date` (`file_date`)';
                $db->query($sql);
            } else {
                return false;
            }
        }

        // Add vvnews_rate table
        if (!VnewsUtils::News_UtilityTableExists($db->prefix('vnews_rate'))) {
            $sql = 'RENAME TABLE `' . $db->prefix('stories_votedata') . '` TO `' . $db->prefix('vnews_rate') . '`';
            if ($db->query($sql)) {
                /*
                   * Rename fields
                   */
                // rate_id
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` CHANGE `ratingid` `rate_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT';
                $db->query($sql);
                // rate_story
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` CHANGE `storyid` `rate_story` INT(8) UNSIGNED NOT NULL';
                $db->query($sql);
                // rate_user
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` CHANGE `ratinguser` `rate_user` INT(10) NOT NULL';
                $db->query($sql);
                // rate_rating
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` CHANGE `rating` `rate_rating` TINYINT(3) UNSIGNED NOT NULL';
                $db->query($sql);
                // rate_hostname
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` CHANGE `ratinghostname` `rate_hostname` VARCHAR(60) NOT NULL DEFAULT ""';
                $db->query($sql);
                // rate_created
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` CHANGE `ratingtimestamp` `rate_created` INT(10) NOT NULL';
                $db->query($sql);
                /*
                 * Remove index
                 */
                // ratinguser
                $sql = 'ALTER TABLE `' . $db->prefix('vvnews_rate') . '` DROP INDEX `ratinguser`';
                $db->query($sql);
                // ratinghostname
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` DROP INDEX `ratinghostname`';
                $db->query($sql);
                // storyid
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` DROP INDEX `storyid`';
                $db->query($sql);
                /*
                 * Add index
                 */
                // rate_user
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` ADD INDEX `rate_user` ( `rate_user` )';
                $db->query($sql);
                // rate_user
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` ADD INDEX `rate_hostname` ( `rate_hostname` )';
                $db->query($sql);
                // rate_user
                $sql = 'ALTER TABLE `' . $db->prefix('vnews_rate') . '` ADD INDEX `rate_story` ( `rate_story` )';
                $db->query($sql);
            } else {
                return false;
            }
        }
    }
    // end update to version 1.80
}
