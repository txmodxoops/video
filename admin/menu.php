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
 * @version        $Id: 1.0 menu.php 14050 Sat 2016-05-07 14:43:58Z Timgno $
 */
$dirname = basename(dirname(__DIR__));
$moduleHandler = xoops_gethandler('module');
$xoopsModule = XoopsModule::getByDirname($dirname);
$moduleInfo = $moduleHandler->get($xoopsModule->getVar('mid'));
$sysPathIcon32 = $moduleInfo->getInfo('sysicons32');
$i = 1;
$adminmenu[$i]['title'] = _MI_VIDEO_ADMENU1;
$adminmenu[$i]['link'] = 'admin/index.php';
$adminmenu[$i]['icon'] = $sysPathIcon32.'/dashboard.png';
++$i;
$adminmenu[$i]['title'] = _MI_VIDEO_ADMENU2;
$adminmenu[$i]['link'] = 'admin/categories.php';
$adminmenu[$i]['icon'] = 'assets/icons/32/movies_category.png';
++$i;
$adminmenu[$i]['title'] = _MI_VIDEO_ADMENU3;
$adminmenu[$i]['link'] = 'admin/videos.php';
$adminmenu[$i]['icon'] = 'assets/icons/32/movie_play.png';
++$i;
$adminmenu[$i]['title'] = _MI_VIDEO_ADMENU4;
$adminmenu[$i]['link'] = 'admin/permissions.php';
$adminmenu[$i]['icon'] = $sysPathIcon32.'/permissions.png';
++$i;
$adminmenu[$i]['title'] = _MI_VIDEO_ABOUT;
$adminmenu[$i]['link'] = 'admin/about.php';
$adminmenu[$i]['icon'] = $sysPathIcon32.'/about.png';
unset($i);
