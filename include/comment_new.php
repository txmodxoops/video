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
 * @version        $Id: 1.0 comment_new.php 14050 Sat 2016-05-07 14:44:00Z Timgno $
 */
include '../../mainfile.php';
include_once XOOPS_ROOT_PATH.'/modules/video/class/videos.php';
$com_itemid = isset($_REQUEST['com_itemid']) ? (int) ($_REQUEST['com_itemid']) : 0;
if ($com_itemid > 0) {
    $videosHandler = xoops_getModuleHandler('videos', 'video');
    $videos = $videoshandler->get($com_itemid);
    $com_replytitle = $videos->getVar('video_title');
    include XOOPS_ROOT_PATH.'/include/comment_new.php';
}