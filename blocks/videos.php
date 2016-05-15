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
 * @version        $Id: 1.0 videos.php 14050 Sat 2016-05-07 14:43:57Z Timgno $
 */
include_once XOOPS_ROOT_PATH.'/modules/video/include/common.php';
// Function show block
function b_video_videos_show($options)
{
    include_once XOOPS_ROOT_PATH.'/modules/video/class/videos.php';
    $myts = MyTextSanitizer::getInstance();
    $GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
    $block       = array();
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $video = VideoHelper::getInstance();
    $videosHandler = $video->getHandler('videos');
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
	switch($typeBlock)
	{
		// For the block: videos last
		case 'last':
			$criteria->add(new Criteria('video_display', 1));
			$criteria->setSort('video_created');
			$criteria->setOrder('DESC');
		break;
		// For the block: videos new
		case 'new':
			$criteria->add(new Criteria('video_display', 1));
			$criteria->add(new Criteria('video_created', strtotime(date(_SHORTDATESTRING)), '>='));
			$criteria->add(new Criteria('video_created', strtotime(date(_SHORTDATESTRING))+86400, '<='));
			$criteria->setSort('video_created');
			$criteria->setOrder('ASC');
		break;
		// For the block: videos hits
		case 'hits':
            $criteria->setSort('video_hits');
            $criteria->setOrder('DESC');
        break;
		// For the block: videos top
		case 'top':
            $criteria->setSort('video_top');
            $criteria->setOrder('ASC');
        break;
		// For the block: videos random
		case 'random':
			$criteria->add(new Criteria('video_display', 1));
			$criteria->setSort('RAND()');
		break;
	}
    $criteria->setLimit($limit);
    $videosAll = $videosHandler->getAll($criteria);
	unset($criteria);
    foreach(array_keys($videosAll) as $i)
    {
        $block[$i]['cid'] = $videosAll[$i]->getVar('video_cid');
        $block[$i]['title'] = $myts->htmlSpecialChars($videosAll[$i]->getVar('video_title'));
        $block[$i]['file'] = $videosAll[$i]->getVar('video_file');
		$block[$i]['description'] = strip_tags($videosAll[$i]->getVar('video_description'));
        $block[$i]['url'] = $myts->htmlSpecialChars($videosAll[$i]->getVar('video_url'));
		$block[$i]['created'] = formatTimeStamp($videosAll[$i]->getVar('video_created'));
		$block[$i]['published'] = formatTimeStamp($videosAll[$i]->getVar('video_published'));
        $block[$i]['weight'] = $myts->htmlSpecialChars($videosAll[$i]->getVar('video_weight'));
    }
    return $block;
}

// Function edit block
function b_video_videos_edit($options)
{
    include_once XOOPS_ROOT_PATH.'/modules/video/class/videos.php';
    $video = VideoHelper::getInstance();
    $videosHandler = $video->getHandler('videos');
    $GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
    $form  = _MB_VIDEO_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='".$options[1]."' />&nbsp;<br />";
    $form .= _MB_VIDEO_TITLE_LENGTH." : <input type='text' name='options[2]' size='5' maxlength='255' value='".$options[2]."' /><br /><br />";
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('video_id', 0, '!='));
    $criteria->setSort('video_id');
    $criteria->setOrder('ASC');
    $videosAll = $videosHandler->getAll($criteria);
    unset($criteria);
    $form .= _MB_VIDEO_VIDEOS_TO_DISPLAY."<br /><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (array_search(0, $options) === false ? "" : "selected='selected'") . ">" ._MB_VIDEO_ALL_VIDEOS . "</option>";
    foreach (array_keys($videosAll) as $i) {
        $video_id = $videosAll[$i]->getVar('video_id');
        $form .= "<option value='" . $video_id . "' " . (array_search($video_id, $options) === false ? "" : "selected='selected'") . ">".$videosAll[$i]->getVar('video_title')."</option>";
    }
    $form .= "</select>";
    return $form;
}