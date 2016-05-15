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
 * @version        $Id: 1.0 about.php 14050 Sat 2016-05-07 14:43:58Z Timgno $
 */
include __DIR__ . '/header.php';
$templateMain = 'video_admin_about.tpl';
$GLOBALS['xoopsTpl']->assign('navigation', $adminMenu->addNavigation('about.php'));
$GLOBALS['xoopsTpl']->assign('about', $adminMenu->renderAbout('7LFE862PGJN88', false));
include __DIR__ . '/footer.php';
