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
include __DIR__ . '/header.php';
// It recovered the value of argument op in URL$
$op = XoopsRequest::getString('op', 'list');
// Request video_id
$videoId = XoopsRequest::getInt('video_id');
switch($op) {
	case 'list':
	default:
		// Define Stylesheet
		$GLOBALS['xoTheme']->addStylesheet( $style, null );
		$start = XoopsRequest::getInt('start', 0);
		$limit = XoopsRequest::getInt('limit', $video->getConfig('adminpager'));
		$templateMain = 'video_admin_videos.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('videos.php'));
		$adminMenu->addItemButton(_AM_VIDEO_ADD_VIDEO, 'videos.php?op=new', 'add');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		$videosCount = $videosHandler->getCountVideos();
		$videosAll = $videosHandler->getAllVideos($start, $limit);
		$GLOBALS['xoopsTpl']->assign('videos_count', $videosCount);
		$GLOBALS['xoopsTpl']->assign('video_url', VIDEO_URL);
		$GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
		// Table view videos
		if($videosCount > 0) {
			$vid = 1;
			foreach(array_keys($videosAll) as $i) {
				$videoAll = $videosAll[$i]->getValuesVideos();
				$avid = array('vid' => $vid);
                $videoAll = array_merge($videoAll, $avid);
				$GLOBALS['xoopsTpl']->append('videos_list', $videoAll);
				unset($videoAll);
				++$vid;
			}
			unset($vid);
			// Display Navigation
			if($videosCount > $limit) {
				include_once XOOPS_ROOT_PATH .'/class/pagenav.php';
				$pagenav = new XoopsPageNav($videosCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
				$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
			}
		} else {
			$GLOBALS['xoopsTpl']->assign('error', _AM_VIDEO_THEREARENT_VIDEOS);
		}

	break;
	case 'new':
		$templateMain = 'video_admin_videos.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('videos.php'));
		$adminMenu->addItemButton(_AM_VIDEO_VIDEOS_LIST, 'videos.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		// Get Form
		$videosObj = $videosHandler->create();
		$form = $videosObj->getFormVideos();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'save':
		// Security Check
		if(!$GLOBALS['xoopsSecurity']->check()) {
			redirect_header('videos.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
		}
		if(isset($videoId)) {
			$videosObj = $videosHandler->get($videoId);
		} else {
			$videosObj = $videosHandler->create();
		}
		// Set Vars
		$videosObj->setVar('video_cid', $_POST['video_cid']);
		$videosObj->setVar('video_title', $_POST['video_title']);
		// Set Var video_file		
		if ($videosObj->isNew()) {
			if (isset($_POST['video_file']) && $_POST['video_url'] == '') {
				if (isset($_POST['xoops_upload_file'][0])) {
					include_once XOOPS_ROOT_PATH .'/class/uploader.php';
					$uploader = new XoopsMediaUploader(XOOPS_UPLOAD_URL.'/video/files/videos',
																$video->getConfig('mimetypes'), 
																$video->getConfig('maxsize'), null, null);
					if($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
						$extension = preg_replace('/^.+\.([^.]+)$/sU', '', $_FILES['attachedfile']['name']);
						$videoName = str_replace(' ', '', strtolower($_POST['video_title'])).'_'.$extension;
						$uploader->setPrefix($videoName);
						$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
						if(!$uploader->upload()) {
							$errors = $uploader->getErrors();
							redirect_header('javascript:history.go(-1).php', 3, $errors);
						} else {
							$videosObj->setVar('video_file', $uploader->getSavedFileName());
						}
					} else {
						$videosObj->setVar('video_file', $_POST['video_file']);
					}
				}
			} elseif (isset($_POST['video_url']) && $_POST['video_url'] != '') {
				$videosObj->setVar('video_url', $_POST['video_url']);
			} else {
				redirect_header('videos.php?op=new', 3, _AM_VIDEO_FORM_NOVIDEOS);
				exit();
			}
		} else {
			$videosObj->setVar('video_file', $_POST['video_file']);
		}
		$videosObj->setVar('video_description', $_POST['video_description']);
		$videosObj->setVar('video_created', strtotime($_POST['video_created']));
		$videosObj->setVar('video_published', strtotime($_POST['video_published']));
		$videosObj->setVar('video_weight', $_POST['video_weight']);
		$videosObj->setVar('video_display', ((1 == $_REQUEST['video_display']) ? '1' : '0'));
		// Insert Data
		if($videosHandler->insert($videosObj)) {
			redirect_header('videos.php?op=list', 2, _AM_VIDEO_FORM_OK);
		}
		// Get Form
		$GLOBALS['xoopsTpl']->assign('error', $videosObj->getHtmlErrors());
		$form = $videosObj->getFormVideos();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'edit':
		$templateMain = 'video_admin_videos.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('videos.php'));
		$adminMenu->addItemButton(_AM_VIDEO_ADD_VIDEO, 'videos.php?op=new', 'add');
		$adminMenu->addItemButton(_AM_VIDEO_VIDEOS_LIST, 'videos.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		// Get Form
		$videosObj = $videosHandler->get($videoId);
		$form = $videosObj->getFormVideos();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'delete':
		$videosObj = $videosHandler->get($videoId);
		if(isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
			if(!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('videos.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
			}
			if($videosHandler->delete($videosObj)) {
				redirect_header('videos.php', 3, _AM_VIDEO_FORM_DELETE_OK);
			} else {
				$GLOBALS['xoopsTpl']->assign(error, $videosObj->getHtmlErrors());
			}
		} else {
			xoops_confirm(array('ok' => 1, 'video_id' => $videoId, 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_VIDEO_FORM_SURE_DELETE, $videosObj->getVar('video_title')));
		}

	break;
}
include __DIR__ . '/footer.php';