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
 * @version        $Id: 1.0 notifications.inc.php 14050 Sat 2016-05-07 14:44:00Z Timgno $
 */

// comment callback functions
function video_notify_iteminfo($category, $item_id)
{
    global $xoopsModule, $xoopsModuleConfig, $xoopsDB;
    //
    if (empty($xoopsModule) || $xoopsModule->getVar('dirname') != 'video')
    {
        $module_handler =& xoops_getHandler('module');
        $module =& $module_handler->getByDirname('video');
        $config_handler =& xoops_getHandler('config');
        $config =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
    } else {
        $module =& $xoopsModule;
        $config =& $xoopsModuleConfig;
    }
    //
    switch($category) {
        case 'global':
            $item['name'] = '';
            $item['url'] = '';
            return $item;
        break;
        case 'category':
            // Assume we have a valid category id
            $sql = 'SELECT video_title FROM ' . $xoopsDB->prefix('video_videos') . ' WHERE video_id = '. $item_id;
            $result = $xoopsDB->query($sql); // TODO: error check
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['video_title'];
            $item['url'] = VIDEO_URL . '/videos.php?video_id=' . $item_id;
            return $item;
        break;
        case 'video':
            // Assume we have a valid link id
            $sql = 'SELECT video_id, video_title FROM '.$xoopsDB->prefix('video_videos') . ' WHERE video_id = ' . $item_id;
            $result = $xoopsDB->query($sql); // TODO: error check
            $result_array = $xoopsDB->fetchArray($result);
            $item['name'] = $result_array['video_title'];
			$item['url'] = VIDEO_URL . '/single.php?cid=' . $result_array['cid'] . '&amp;video_id=' . $item_id;
			return $item;
        break;
    }
}