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
 * @version        $Id: 1.0 index.php 14050 Sat 2016-05-07 14:44:03Z Timgno $
 */
include __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'video_index.tpl';
include_once XOOPS_ROOT_PATH .'/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet( $style, null );
		$keywords = array();
$categoriesCount = $categoriesHandler->getCountCategories();
// If there are  categories
$count = 1;
if($categoriesCount > 0) {
	$categoriesAll = $categoriesHandler->getAllCategories(0);
	include_once XOOPS_ROOT_PATH .'/class/tree.php';
		$categories = array();
	foreach(array_keys($categoriesAll) as $cat) {
		$category = $categoriesAll[$cat]->getValuesCategories();
		$acount = array('count', $count);
		$categories[] = array_merge($category, $acount);
		++$count;
	}
	$GLOBALS['xoopsTpl']->assign('categories', $categories);
	unset($categories);
	$GLOBALS['xoopsTpl']->assign('numb_col', $video->getConfig('numb_col'));
}
unset($count);
// 
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('video_url', VIDEO_URL);
// 
$videosCount = $videosHandler->getCountVideos();
$count = 1;
if($videosCount > 0) {
	$start = XoopsRequest::getInt('start', 0);
	$limit = XoopsRequest::getInt('limit', $video->getConfig('userpager'));
	$videosAll = $videosHandler->getAllVideos($start, $limit);
	// Get All Videos
	$videos = array();
	foreach(array_keys($videosAll) as $i) {
		$videoAll = $videosAll[$i]->getValuesVideos();
		$acount = array('count', $count);
		$videos[] = array_merge($videoAll, $acount);
		$keywords[] = $videosAll[$i]->getVar('video_title');
		++$count;
	}	
	$GLOBALS['xoopsTpl']->assign('count', $count);
	$GLOBALS['xoopsTpl']->assign('videos', $videos);
	unset($videos);
	// Display Navigation
	if($videosCount < $limit) {
		$GLOBALS['xoopsTpl']->assign('pagination', sprintf(_MA_VIDEO_PAGINATION, $start + 1, $start + 1));
	} else {
		include_once XOOPS_ROOT_PATH .'/class/pagenav.php';
		$pagenav = new XoopsPageNav($videosCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
		$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));	
		$GLOBALS['xoopsTpl']->assign('pagination', sprintf(_MA_VIDEO_PAGINATION, $start + 1, $limit));
	}
	$GLOBALS['xoopsTpl']->assign('lang_thereare', sprintf(_MA_VIDEO_INDEX_THEREARE, $videosCount));
	$GLOBALS['xoopsTpl']->assign('divideby', $video->getConfig('divideby'));
}
unset($count);
$GLOBALS['xoopsTpl']->assign('table_type', $video->getConfig('table_type'));
// Breadcrumbs
$xoBreadcrumbs[] = array('title' => _MA_VIDEO_INDEX);
// Keywords
videoMetaKeywords($video->getConfig('keywords').', '. implode(',', $keywords));
unset($keywords);
// Description
videoMetaDescription(_MA_VIDEO_INDEX_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', VIDEO_URL.'/index.php');
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
include __DIR__ . '/footer.php';
