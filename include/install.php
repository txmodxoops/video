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
 * @version        $Id: 1.0 install.php 14050 Sat 2016-05-07 14:43:59Z Timgno $
 */
// Copy base file
$indexFile = XOOPS_UPLOAD_PATH.'/index.html';
$blankFile = XOOPS_UPLOAD_PATH.'/blank.gif';
// Making of uploads/video folder
$video = XOOPS_UPLOAD_PATH.'/video';
if(!is_dir($video)) {
	mkdir($video, 0777);
	chmod($video, 0777);
}
copy($indexFile, $video.'/index.html');
// Making of categories uploads folder
$categories = $video.'/categories';
if(!is_dir($categories)) {
	mkdir($categories, 0777);
	chmod($categories, 0777);
}
copy($indexFile, $categories.'/index.html');
// Making of videos uploads folder
$videos = $video.'/videos';
if(!is_dir($videos)) {
	mkdir($videos, 0777);
	chmod($videos, 0777);
}
copy($indexFile, $videos.'/index.html');
// Making of files folder
$files = $video.'/files';
if(!is_dir($files)) {
	mkdir($files, 0777);
	chmod($files, 0777);
}
copy($indexFile, $files.'/index.html');
// Making of videos files folder
$videos = $files.'/videos';
if(!is_dir($videos)) {
	mkdir($videos, 0777);
	chmod($videos, 0777);
}
copy($indexFile, $videos.'/index.html');
// ------------------- Install Footer ------------------- //
