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
// It recovered the value of argument op in URL$
$op = XoopsRequest::getString('op', 'list');
// Request cat_id
$catId = XoopsRequest::getInt('cat_id');
switch($op) {
	case 'list':
	default:
		// Define Stylesheet
		$GLOBALS['xoTheme']->addStylesheet( $style, null );
		$start = XoopsRequest::getInt('start', 0);
		$limit = XoopsRequest::getInt('limit', $video->getConfig('adminpager'));
		$templateMain = 'video_admin_categories.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('categories.php'));
		$adminMenu->addItemButton(_AM_VIDEO_ADD_CATEGORY, 'categories.php?op=new', 'add');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		$categoriesCount = $categoriesHandler->getCountCategories();
		$categoriesAll = $categoriesHandler->getAllCategories($start, $limit);
		$GLOBALS['xoopsTpl']->assign('categories_count', $categoriesCount);
		$GLOBALS['xoopsTpl']->assign('video_url', VIDEO_URL);
		$GLOBALS['xoopsTpl']->assign('video_upload_url', VIDEO_UPLOAD_URL);
		// Table view categories
		if($categoriesCount > 0) {
			foreach(array_keys($categoriesAll) as $i) {
				$category = $categoriesAll[$i]->getValuesCategories();
				$GLOBALS['xoopsTpl']->append('categories_list', $category);
				unset($category);
			}
			// Display Navigation
			if($categoriesCount > $limit) {
				include_once XOOPS_ROOT_PATH .'/class/pagenav.php';
				$pagenav = new XoopsPageNav($categoriesCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
				$GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav(4));
			}
		} else {
			$GLOBALS['xoopsTpl']->assign('error', _AM_VIDEO_THEREARENT_CATEGORIES);
		}

	break;
	case 'new':
		$templateMain = 'video_admin_categories.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('categories.php'));
		$adminMenu->addItemButton(_AM_VIDEO_CATEGORIES_LIST, 'categories.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		// Get Form
		$categoriesObj = $categoriesHandler->create();
		$form = $categoriesObj->getFormCategories();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'save':
		// Security Check
		if(!$GLOBALS['xoopsSecurity']->check()) {
			redirect_header('categories.php', 3, implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
		}
		if(isset($catId)) {
			$categoriesObj = $categoriesHandler->get($catId);
		} else {
			$categoriesObj = $categoriesHandler->create();
		}
		// Set Vars
		$categoriesObj->setVar('cat_pid', isset($_POST['cat_pid']) ? $_POST['cat_pid'] : 0);
		$categoriesObj->setVar('cat_title', $_POST['cat_title']);
		$categoriesObj->setVar('cat_description', $_POST['cat_description']);
		// Set Var cat_image
		include_once XOOPS_ROOT_PATH .'/class/uploader.php';
		$uploader = new XoopsMediaUploader(XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32', 
													$video->getConfig('mimetypes'), 
													$video->getConfig('maxsize'), null, null);
		if($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
			//$uploader->setPrefix(cat_image_);
			//$uploader->fetchMedia($_POST['xoops_upload_file'][0]);
			if(!$uploader->upload()) {
				$errors = $uploader->getErrors();
				redirect_header('javascript:history.go(-1).php', 3, $errors);
			} else {
				$categoriesObj->setVar('cat_image', $uploader->getSavedFileName());
			}
		} else {
			$categoriesObj->setVar('cat_image', $_POST['cat_image']);
		}
		$categoriesObj->setVar('cat_weight', $_POST['cat_weight']);
		// Insert Data
		if($categoriesHandler->insert($categoriesObj)) {
			$newCatId = $categoriesObj->getNewInsertedIdCategories();
			$permId = isset($_REQUEST['cat_id']) ? $catId : $newCatId;
			$gpermHandler = xoops_gethandler('groupperm');
			// Permission to view
			if(isset($_POST['groups_view'])) {
				foreach($_POST['groups_view'] as $onegroupId) {
					$gpermHandler->addRight('video_view', $permId, $onegroupId, $GLOBALS['xoopsModule']->getVar('mid'));
				}
			}
			// Permission to submit
			if(isset($_POST['groups_submit'])) {
				foreach($_POST['groups_submit'] as $onegroupId) {
					$gpermHandler->addRight('video_submit', $permId, $onegroupId, $GLOBALS['xoopsModule']->getVar('mid'));
				}
			}
			// Permission to approve
			if(isset($_POST['groups_approve'])) {
				foreach($_POST['groups_approve'] as $onegroupId) {
					$gpermHandler->addRight('video_approve', $permId, $onegroupId, $GLOBALS['xoopsModule']->getVar('mid'));
				}
			}
			redirect_header('categories.php?op=list', 2, _AM_VIDEO_FORM_OK);
		}
		// Get Form
		$GLOBALS['xoopsTpl']->assign('error', $categoriesObj->getHtmlErrors());
		$form = $categoriesObj->getFormCategories();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'edit':
		$templateMain = 'video_admin_categories.tpl';
		$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('categories.php'));
		$adminMenu->addItemButton(_AM_VIDEO_ADD_CATEGORY, 'categories.php?op=new', 'add');
		$adminMenu->addItemButton(_AM_VIDEO_CATEGORIES_LIST, 'categories.php', 'list');
		$GLOBALS['xoopsTpl']->assign('buttons', $adminMenu->renderButton());
		// Get Form
		$categoriesObj = $categoriesHandler->get($catId);
		$form = $categoriesObj->getFormCategories();
		$GLOBALS['xoopsTpl']->assign('form', $form->render());

	break;
	case 'delete':
		$categoriesObj = $categoriesHandler->get($catId);
		if(isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
			if(!$GLOBALS['xoopsSecurity']->check()) {
				redirect_header('categories.php', 3, implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
			}
			if($categoriesHandler->delete($categoriesObj)) {
				redirect_header('categories.php', 3, _AM_VIDEO_FORM_DELETE_OK);
			} else {
				$GLOBALS['xoopsTpl']->assign(error, $categoriesObj->getHtmlErrors());
			}
		} else {
			xoops_confirm(array('ok' => 1, 'cat_id' => $catId, 'op' => 'delete'), $_SERVER['REQUEST_URI'], sprintf(_AM_VIDEO_FORM_SURE_DELETE, $categoriesObj->getVar('cat_title')));
		}

	break;
}
include __DIR__ . '/footer.php';
