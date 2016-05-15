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
 * @version        $Id: 1.0 broken.php 14050 Sat 2016-05-07 14:44:01Z Timgno $
 */
include __DIR__ . '/header.php';
$op = XoopsRequest::getString('op', 'list');
$videoId = XoopsRequest::getInt('video_id');
// Template
$GLOBALS['xoopsOption']['template_main'] = 'video_broken.tpl';
include_once XOOPS_ROOT_PATH .'/header.php';
$GLOBALS['xoTheme']->addStylesheet( $style, null );
// Redirection if not permissions
if($permSubmit == false) {
redirect_header('index.php', 2, _NOPERM);
exit();
}
switch($op) {
case 'form':
default:
// Mavigation
$navigation = _MA_VIDEO_SUBMIT_PROPOSER;
$GLOBALS['xoopsTpl']->assign('navigation', $navigation);
// Title of page
$title = _MA_VIDEO_SUBMIT_PROPOSER . '&nbsp;-&nbsp;';
$title. = $GLOBALS['xoopsModule']->name();
$GLOBALS['xoopsTpl']->assign('xoops_pagetitle', $title);
// Description
$GLOBALS['xoTheme']->addMeta( 'meta', 'description', strip_tags(_MA_VIDEO_SUBMIT_PROPOSER));
// Form Create
$videosObj = $videosHandler->create();
$form = $videosObj->getFormVideos();
$GLOBALS['xoopsTpl']->assign('form', $form->render());

break;
case 'save':
// Security Check
	if($GLOBALS['xoopsSecurity']->check()) {
redirect_header('videos.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
	}
$videosObj = $videosHandler->create();
$error = false;
$errorMessage = '';
// Test first the validation
xoops_load('captcha');
$xoopsCaptcha = XoopsCaptcha::getInstance();
	if(!$xoopsCaptcha->verify()) {
$errorMessage .= $xoopsCaptcha->getMessage().'<br>';
$error = true;
	}
$videosObj->setVar('video_cid', $_POST['video_cid']);
$videosObj->setVar('video_title', $_POST['video_title']);
// Set Var video_file
include_once XOOPS_ROOT_PATH .'/class/uploader.php';
$uploader = new XoopsMediaUploader(VIDEO_UPLOAD_FILES_PATH.'/videos/files', 
													$video->getConfig('mimetypes'), 
													$video->getConfig('maxsize'), null, null);
if($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
	$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
} else {
	//$uploader->setPrefix('video_file_');
	//$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
	if(!$uploader->upload()) {
		$errors = $uploader->getErrors();
		redirect_header('javascript:history.go(-1).php', 3, $errors);
	} else {
		$videosObj->setVar('video_file', $uploader->getSavedFileName());
	}
}
$videosObj->setVar('video_description', $_POST['video_description']);
$videosObj->setVar('video_url', $_POST['video_url']);
$videosObj->setVar('video_created', strtotime($_POST['video_created']));
$videosObj->setVar('video_published', strtotime($_POST['video_published']));
$videosObj->setVar('video_weight', $_POST['video_weight']);
$videosObj->setVar('video_display', ((1 == $_REQUEST['video_display']) ? '1' : '0'));
	if($error == true) {
$GLOBALS['xoopsTpl']->assign('error_message', $errorMessage);
	} else {
// Insert Data
		if($videos1->insert($videosObj)) {
redirect_header('index.php', 2, _MA_VIDEO_FORM_OK);
		}
	}
// Get Form Error
$GLOBALS['xoopsTpl']->assign('error', $videosObj->getHtmlErrors());
$form = $videosObj->getFormVideos();
$GLOBALS['xoopsTpl']->assign('form', $form->display());

break;
}
include __DIR__ . '/footer.php';
