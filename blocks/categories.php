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
include_once XOOPS_ROOT_PATH.'/modules/video/include/common.php';
// Function show block
function b_video_categories_show($options)
{
    include_once XOOPS_ROOT_PATH.'/modules/video/class/categories.php';
    $myts = MyTextSanitizer::getInstance();
    $GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
    $block       = array();
    $typeBlock   = $options[0];
    $limit       = $options[1];
    $lenghtTitle = $options[2];
    $video = VideoHelper::getInstance();
    $categoriesHandler = $video->getHandler('categories');
    $criteria = new CriteriaCompo();
    array_shift($options);
    array_shift($options);
    array_shift($options);
	switch($typeBlock)
	{
		// For the block: categories last
		case 'last':
			$criteria->add(new Criteria('cat_display', 1));
			$criteria->setSort('cat_created');
			$criteria->setOrder('DESC');
		break;
		// For the block: categories new
		case 'new':
			$criteria->add(new Criteria('cat_display', 1));
			$criteria->add(new Criteria('cat_created', strtotime(date(_SHORTDATESTRING)), '>='));
			$criteria->add(new Criteria('cat_created', strtotime(date(_SHORTDATESTRING))+86400, '<='));
			$criteria->setSort('cat_created');
			$criteria->setOrder('ASC');
		break;
		// For the block: categories hits
		case 'hits':
            $criteria->setSort('cat_hits');
            $criteria->setOrder('DESC');
        break;
		// For the block: categories top
		case 'top':
            $criteria->setSort('cat_top');
            $criteria->setOrder('ASC');
        break;
		// For the block: categories random
		case 'random':
			$criteria->add(new Criteria('cat_display', 1));
			$criteria->setSort('RAND()');
		break;
	}
    $criteria->setLimit($limit);
    $categoriesAll = $categoriesHandler->getAll($criteria);
	unset($criteria);
    foreach(array_keys($categoriesAll) as $i)
    {
        $block[$i]['pid'] = $categoriesAll[$i]->getVar('cat_pid');
        $block[$i]['title'] = $myts->htmlSpecialChars($categoriesAll[$i]->getVar('cat_title'));
		$block[$i]['description'] = strip_tags($categoriesAll[$i]->getVar('cat_description'));
        $block[$i]['image'] = $categoriesAll[$i]->getVar('cat_image');
        $block[$i]['weight'] = $myts->htmlSpecialChars($categoriesAll[$i]->getVar('cat_weight'));
    }
    return $block;
}

// Function edit block
function b_video_categories_edit($options)
{
    include_once XOOPS_ROOT_PATH.'/modules/video/class/categories.php';
    $video = VideoHelper::getInstance();
    $categoriesHandler = $video->getHandler('categories');
    $GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
    $form  = _MB_VIDEO_DISPLAY;
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' />";
    $form .= "<input type='text' name='options[1]' size='5' maxlength='255' value='".$options[1]."' />&nbsp;<br />";
    $form .= _MB_VIDEO_TITLE_LENGTH." : <input type='text' name='options[2]' size='5' maxlength='255' value='".$options[2]."' /><br /><br />";
    array_shift($options);
    array_shift($options);
    array_shift($options);
    $criteria = new CriteriaCompo();
    $criteria->add(new Criteria('cat_id', 0, '!='));
    $criteria->setSort('cat_id');
    $criteria->setOrder('ASC');
    $categoriesAll = $categoriesHandler->getAll($criteria);
    unset($criteria);
    $form .= _MB_VIDEO_CATEGORIES_TO_DISPLAY."<br /><select name='options[]' multiple='multiple' size='5'>";
    $form .= "<option value='0' " . (array_search(0, $options) === false ? "" : "selected='selected'") . ">" ._MB_VIDEO_ALL_CATEGORIES . "</option>";
    foreach (array_keys($categoriesAll) as $i) {
        $cat_id = $categoriesAll[$i]->getVar('cat_id');
        $form .= "<option value='" . $cat_id . "' " . (array_search($cat_id, $options) === false ? "" : "selected='selected'") . ">".$categoriesAll[$i]->getVar('cat_title')."</option>";
    }
    $form .= "</select>";
    return $form;
}