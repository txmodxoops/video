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
 * @version        $Id: 1.0 print.php 14050 Sat 2016-05-07 14:44:02Z Timgno $
 */
include __DIR__ . '/header.php';
$videoId = XoopsRequest::getInt('video_id');
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet( $style, null );
if(empty($videoId)) {
	redirect_header(VIDEO_URL . '/index.php', 2, _MA_VIDEO_NOVIDEOID);
}
// Verify that the article is published
$videos = $1->get($videoId);
// Verify permissions
if(!$gpermHandler->checkRight('video_view', $videoId->getVat('video_id'), $groups, $GLOBALS['xoopsModule']->getVar('mid'))) {
	redirect_header(VIDEO_URL . '/index.php', 3, _NOPERM);
	exit();
}
$video = $videos->getValuesVideos();
foreach($video as $k => $v) {
	$GLOBALS['xoopsTpl']->append('"{$k}"', $v);
}
$GLOBALS['xoopsTpl']->assign('xoops_sitename', $GLOBALS['xoopsConfig']['sitename']);
$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', strip_tags($video->getVar('video_title') - _MA_VIDEO_PRINT - $GLOBALS['xoopsModule']->name()));
$GLOBALS['xoopsTpl']->display("db:videos_print.tpl");
