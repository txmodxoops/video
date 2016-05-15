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
 * @version        $Id: 1.0 header.php 14050 Sat 2016-05-07 14:44:01Z Timgno $
 */
include dirname(dirname(__DIR__)) .'/mainfile.php';
include __DIR__ .'/include/common.php';
$dirname  = basename(__DIR__);
// Breadcrumbs
$xoBreadcrumbs = array();
$xoBreadcrumbs[] = array('title' => $GLOBALS['xoopsModule']->getVar('name'), 'link' => VIDEO_URL . '/');
// Get instance of module
$video = VideoHelper::getInstance();
$categoriesHandler = $video->getHandler('categories');
$videosHandler = $video->getHandler('videos');
// Permission
include_once XOOPS_ROOT_PATH .'/class/xoopsform/grouppermform.php';
$gpermHandler = xoops_gethandler('groupperm');
if(is_object($xoopsUser)) {
	$groups  = $xoopsUser->getGroups();
} else {
	$groups  = XOOPS_GROUP_ANONYMOUS;
}
// 
$myts = MyTextSanitizer::getInstance();
// Default Css Style
$style = VIDEO_URL . '/assets/css/style.css';
if(!file_exists($style)) {
	return false;
}
// Smarty Default
$sysPathIcon16 = $GLOBALS['xoopsModule']->getInfo('sysicons16');
$sysPathIcon32 = $GLOBALS['xoopsModule']->getInfo('sysicons32');
$pathModuleAdmin = $GLOBALS['xoopsModule']->getInfo('dirmoduleadmin');
$modPathIcon16 = $GLOBALS['xoopsModule']->getInfo('modicons16');
$modPathIcon32 = $GLOBALS['xoopsModule']->getInfo('modicons16');
// Load Languages
xoops_loadLanguage('main');
xoops_loadLanguage('modinfo');
