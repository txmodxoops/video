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
 * @version        $Id: 1.0 single.php 14050 Sat 2016-05-07 14:44:02Z Timgno $
 */
include __DIR__ . '/header.php';
$videoId = XoopsRequest::getInt('id');
// Information
$viewVideo = $videosHandler->get($videoId);
$GLOBALS['xoopsOption']['template_main'] = 'video_single.tpl';
include_once XOOPS_ROOT_PATH .'/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet( $style, null );
// Verify if restaurants exist
if (count($viewVideo) == 0){
    redirect_header('index.php', 3, _MA_VIDEO_VIDEOS_NONEXISTENT);
    exit();
}
$keywords = array();
if(isset($videoId)) {
	// Breadcrumbs
	$xoBreadcrumbs[] = array('title' => $viewVideo->getVar('video_title'));
	$GLOBALS['xoopsTpl']->assign('title', $viewVideo->getVar('video_title'));
	$GLOBALS['xoopsTpl']->assign('description', $viewVideo->getVar('video_description'));
	$videoFile = $viewVideo->getVar('video_file');
	$videoUrl = $viewVideo->getVar('video_url');
	if($videoFile != '') {
		$GLOBALS['xoopsTpl']->assign('file', $videoFile);
	} elseif($videoUrl != '') {
		$GLOBALS['xoopsTpl']->assign('url', $videoUrl);
	} else {
		$GLOBALS['xoopsTpl']->assign('image', _MA_VIDEO_VIDEOS_NONEXISTENT);
	}	
	$GLOBALS['xoopsTpl']->assign('published', formatTimeStamp($viewVideo->getVar('video_published'), 's'));
	$GLOBALS['xoopsTpl']->assign('video_width', $video->getConfig('width'));
	$GLOBALS['xoopsTpl']->assign('video_height', $video->getConfig('height'));
	$GLOBALS['xoopsTpl']->assign('count', count($viewVideo));
}
// Keywords
videoMetaKeywords($video->getConfig('keywords').', '. implode(',', $keywords));
unset($keywords);
// Description
videoMetaDescription(_MA_VIDEO_VIDEOS_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', VIDEO_URL.'/index.php');
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
include __DIR__ . '/footer.php';