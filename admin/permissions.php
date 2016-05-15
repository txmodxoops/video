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
 * @version        $Id: 1.0 permissions.php 14050 Sat 2016-05-07 14:43:59Z Timgno $
 */
include __DIR__ . '/header.php';
include_once XOOPS_ROOT_PATH .'/class/xoopsform/grouppermform.php';
$categoriesHandler = $video->getHandler('categories');
// Check admin have access to this page
$templateMain = 'video_admin_permissions.tpl';
$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('permissions.php'));
$op = XoopsRequest::getString('op', 'global');
xoops_load('XoopsFormLoader');
$permTableForm = new XoopsSimpleForm('', 'fselperm', 'permissions.php', 'post');
$formSelect = new XoopsFormSelect('', 'op', $op);
$formSelect->setExtra('onchange="document.fselperm.submit()"');
$formSelect->addOption('global', _AM_VIDEO_PERMISSIONS_GLOBAL);
$formSelect->addOption('approve', _AM_VIDEO_PERMISSIONS_APPROVE);
$formSelect->addOption('submit', _AM_VIDEO_PERMISSIONS_SUBMIT);
$formSelect->addOption('view', _AM_VIDEO_PERMISSIONS_VIEW);
$permTableForm->addElement($formSelect);
$permTableForm->display();
switch($op) {
	case 'global':
	default:
		$formTitle = _AM_VIDEO_PERMISSIONS_GLOBAL;
		$permName = 'video_ac';
		$permDesc = _AM_VIDEO_PERMISSIONS_GLOBAL_DESC;
		$globalPerms = array( '4' => _AM_VIDEO_PERMISSIONS_GLOBAL_4, '8' => _AM_VIDEO_PERMISSIONS_GLOBAL_8, '16' => _AM_VIDEO_PERMISSIONS_GLOBAL_16 );
	break;
	case 'approve':
		$formTitle = _AM_VIDEO_PERMISSIONS_APPROVE;
		$permName = 'video_approve';
		$permDesc = _AM_VIDEO_PERMISSIONS_APPROVE_DESC;
	break;
	case 'submit':
		$formTitle = _AM_VIDEO_PERMISSIONS_SUBMIT;
		$permName = 'video_submit';
		$permDesc = _AM_VIDEO_PERMISSIONS_SUBMIT_DESC;
	break;
	case 'view':
		$formTitle = _AM_VIDEO_PERMISSIONS_VIEW;
		$permName = 'video_view';
		$permDesc = _AM_VIDEO_PERMISSIONS_VIEW_DESC;
	break;
}
$moduleId = $xoopsModule->getVar('mid');
$permform = new XoopsGroupPermForm($formTitle, $moduleId, $permName, $permDesc, 'admin/permissions.php');
if($op == 'global') {
	foreach($globalPerms as $gPermId => $gPermName) {
	$permform->addItem($gPermId, $gPermName);
	}
$GLOBALS['xoopsTpl']->assign('form', $permform->render());
} else {
$categoriesCount = $categoriesHandler->getCountCategories();
$categoriesAll = $categoriesHandler->getAllCategories(0, 'cat_title');
	foreach(array_keys($categoriesAll) as $i) {
	$permform->addItem($categoriesAll[$i]->getVar('cat_id'), $categoriesAll[$i]->getVar('cat_title'));
	}
	if($categoriesCount > 0) {
$GLOBALS['xoopsTpl']->assign('form', $permform->render());
	} else {
redirect_header('categories.php.php?op=new', 3, _AM_VIDEO_NO_PERMISSIONS_SET);
	exit();
	}
}
unset($permform);
include __DIR__ . '/footer.php';
