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
 * Video module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        video
 * @since          1.0
 * @min_xoops      2.5.7
 * @author         Txmod Xoops - Email:<info@txmodxoops.org> - Website:<http://txmodxoops.org>
 * @version        $Id: 1.0 common.php 14050 Sat 2016-05-07 14:44:04Z Timgno $
 */
if (!defined('XOOPS_ICONS32_PATH')) define('XOOPS_ICONS32_PATH', XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
if (!defined('XOOPS_ICONS32_URL')) define('XOOPS_ICONS32_URL', XOOPS_URL . '/Frameworks/moduleclasses/icons/32');define('VIDEO_DIRNAME', 'video');
define('VIDEO_PATH', XOOPS_ROOT_PATH.'/modules/'.VIDEO_DIRNAME);
define('VIDEO_URL', XOOPS_URL.'/modules/'.VIDEO_DIRNAME);
define('VIDEO_ICONS_PATH', VIDEO_PATH.'/assets/icons');
define('VIDEO_ICONS_URL', VIDEO_URL.'/assets/icons');
define('VIDEO_IMAGE_PATH', VIDEO_PATH.'/assets/images');
define('VIDEO_IMAGE_URL', VIDEO_URL.'/assets/images');
define('VIDEO_UPLOAD_PATH', XOOPS_UPLOAD_PATH.'/'.VIDEO_DIRNAME);
define('VIDEO_UPLOAD_URL', XOOPS_UPLOAD_URL.'/'.VIDEO_DIRNAME);
define('VIDEO_UPLOAD_FILES_PATH', VIDEO_UPLOAD_PATH.'/files');
define('VIDEO_UPLOAD_FILES_URL', VIDEO_UPLOAD_URL.'/files');
define('VIDEO_UPLOAD_IMAGE_PATH', VIDEO_UPLOAD_PATH.'/images');
define('VIDEO_UPLOAD_IMAGE_URL', VIDEO_UPLOAD_URL.'/images');
define('VIDEO_UPLOAD_SHOTS_PATH', VIDEO_UPLOAD_PATH.'/images/shots');
define('VIDEO_UPLOAD_SHOTS_URL', VIDEO_UPLOAD_URL.'/images/shots');
define('VIDEO_ADMIN', VIDEO_URL . '/admin/index.php');
$localLogo = VIDEO_IMAGE_URL . '/txmodxoops_logo.png';
// Module Information
$copyright = "<a href='http://txmodxoops.org' title='Txmod Xoops' target='_blank'><img src='".$localLogo."' alt='Txmod Xoops' /></a>";
include_once XOOPS_ROOT_PATH .'/class/xoopsrequest.php';
include_once VIDEO_PATH .'/class/helper.php';
include_once VIDEO_PATH .'/include/functions.php';
