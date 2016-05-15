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
 * @version        $Id: 1.0 index.php 14050 Sat 2016-05-07 14:43:58Z Timgno $
 */
include __DIR__ . '/header.php';
// Count elements
$countCategories = $categoriesHandler->getCount();
$countVideos = $videosHandler->getCount();
// Template Index
$templateMain = 'video_admin_index.tpl';
// InfoBox Statistics
$adminMenu->addInfoBox(_AM_VIDEO_STATISTICS);
// Info elements
$adminMenu->addInfoBoxLine(_AM_VIDEO_STATISTICS, '<label>'._AM_VIDEO_THEREARE_CATEGORIES.'</label>', $countCategories);
$adminMenu->addInfoBoxLine(_AM_VIDEO_STATISTICS, '<label>'._AM_VIDEO_THEREARE_VIDEOS.'</label>', $countVideos);
// Upload Folders
$folder = array(
	VIDEO_UPLOAD_PATH,
	VIDEO_UPLOAD_PATH . '/categories/',
	VIDEO_UPLOAD_PATH . '/videos/',
);
// Uploads Folders Created
foreach(array_keys($folder) as $i) {
	$adminMenu->addConfigBoxLine($folder[$i], 'folder');
	$adminMenu->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
}

// Render Index
$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('index.php'));
$GLOBALS['xoopsTpl']->assign('index', $adminMenu->renderIndex());
include __DIR__ . '/footer.php';
