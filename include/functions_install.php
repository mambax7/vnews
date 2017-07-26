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
 * @param $module
 * @return bool
 */

function xoops_module_pre_install_vnews($module)
{
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

    return true;
}
