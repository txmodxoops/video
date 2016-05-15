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
 * @version        $Id: 1.0 categories.php 14050 Sat 2016-05-07 14:43:56Z Timgno $
 */
include __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'video_categories.tpl';
include_once XOOPS_ROOT_PATH .'/header.php';
$start = XoopsRequest::getInt('start', 0);
$limit = XoopsRequest::getInt('limit', $video->getConfig('userpager'));
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet( $style, null );
// 
$GLOBALS['xoopsTpl']->assign('xoops_icons32_url', XOOPS_ICONS32_URL);
$GLOBALS['xoopsTpl']->assign('video_url', VIDEO_URL);
// 
$categoriesCount = $categoriesHandler->getCountCategories();
$categoriesAll = $categoriesHandler->getAllCategories($start, $limit);
$keywords = array();
if($categoriesCount > 0) {
	$categories = array();
	// Get All Categories
	foreach(array_keys($categoriesAll) as $i) {
		$categories[] = $categoriesAll[$i]->getValuesCategories();
		$keywords[] = $categoriesAll[$i]->getVar('cat_title');
	}
	$GLOBALS['xoopsTpl']->assign('categories', $categories);
	unset($categories);
	// Display Navigation
	if($categoriesCount > $limit) {
		include_once XOOPS_ROOT_PATH .'/class/pagenav.php';
		$pagenav = new XoopsPageNav($categoriesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
		$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
	}
	$GLOBALS['xoopsTpl']->assign('type', $video->getConfig('table_type'));
	$GLOBALS['xoopsTpl']->assign('divideby', $video->getConfig('divideby'));
	$GLOBALS['xoopsTpl']->assign('numb_col', $video->getConfig('numb_col'));
}
// Breadcrumbs
$xoBreadcrumbs[] = array('title' => _MA_VIDEO_CATEGORIES);
// Keywords
videoMetaKeywords($video->getConfig('keywords').', '. implode(',', $keywords));
unset($keywords);
// Description
videoMetaDescription(_MA_VIDEO_CATEGORY_DESC);
$GLOBALS['xoopsTpl']->assign('xoops_mpageurl', VIDEO_URL.'/categories.php');
$GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
include __DIR__ . '/footer.php';
