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
 * @version        $Id: 1.0 xoops_version.php 14050 Sat 2016-05-07 14:44:04Z Timgno $
 */

// 
$dirname = basename(__DIR__);
// ------------------- Informations ------------------- //
$modversion['name'] = _MI_VIDEO_NAME;
$modversion['version'] = 1.0;
$modversion['description'] = _MI_VIDEO_DESC;
$modversion['author'] = 'Txmod Xoops';
$modversion['author_mail'] = 'info@txmodxoops.org';
$modversion['author_website_url'] = 'http://txmodxoops.org';
$modversion['author_website_name'] = 'Txmod Xoops';
$modversion['credits'] = 'Timgno';
$modversion['license'] = 'GPL 3.0 or later';
$modversion['license_url'] = 'http://www.gnu.org/licenses/gpl-3.0.en.html';
$modversion['help'] = 'page=help';
$modversion['release_info'] = 'release_info';
$modversion['release_file'] = XOOPS_URL . '/modules/video/docs/release_info file';
$modversion['release_date'] = '2016-05-07';
$modversion['manual'] = 'link to manual file';
$modversion['manual_file'] = XOOPS_URL . '/modules/video/docs/install.txt';
$modversion['min_php'] = '5.3';
$modversion['min_xoops'] = '2.5.7';
$modversion['min_admin'] = '1.1';
$modversion['min_db'] = array('mysql' => '5.1', 'mysqli' => '5.1'); // Using InnoDB Version 5.1 or Later
$modversion['image'] = 'assets/images/video_logo.png';
$modversion['dirname'] = basename(__DIR__);
$modversion['dirmoduleadmin'] = 'Frameworks/moduleclasses/moduleadmin';
$modversion['sysicons16'] = '../../Frameworks/moduleclasses/icons/16';
$modversion['sysicons32'] = '../../Frameworks/moduleclasses/icons/32';
$modversion['modicons16'] = 'assets/icons/16';
$modversion['modicons32'] = 'assets/icons/32';
$modversion['demo_site_url'] = 'http://www.txmodxoops.org/modules/';
$modversion['demo_site_name'] = 'Txmod Xoops';
$modversion['support_url'] = 'http://xoops.org/modules/newbb';
$modversion['support_name'] = 'Support Forum';
$modversion['module_website_url'] = 'www.txmodxoops.org';
$modversion['module_website_name'] = 'Txmod Xoops';
$modversion['release'] = '2016-05-07';
$modversion['module_status'] = 'Beta 1';
$modversion['system_menu'] = 1;
$modversion['hasAdmin'] = 1;
$modversion['hasMain'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';
$modversion['onInstall'] = 'include/install.php';
$modversion['onUpdate'] = 'include/update.php';
// ------------------- Templates ------------------- //
// Admin
$modversion['templates'][] = array('file' => 'video_admin_about.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_header.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_index.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_categories.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_videos.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_permissions.tpl', 'description' => '', 'type' => 'admin');
$modversion['templates'][] = array('file' => 'video_admin_footer.tpl', 'description' => '', 'type' => 'admin');
// User
$modversion['templates'][] = array('file' => 'video_header.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_index.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_categories.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_categories_list.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_videos.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_videos_list.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_breadcrumbs.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_broken.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_pdf.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_print.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_rate.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_rss.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_search.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_single.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_submit.tpl', 'description' => '');
$modversion['templates'][] = array('file' => 'video_footer.tpl', 'description' => '');
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'][1] = 'video_categories';
$modversion['tables'][2] = 'video_videos';
// ------------------- Search ------------------- //
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = 'include/search.inc.php';
$modversion['search']['func'] = 'video_search';
// ------------------- Comments ------------------- //
$modversion['comments']['pageName'] = 'comments.php';
$modversion['comments']['itemName'] = 'com_id';
// Comment callback functions
$modversion['comments']['callbackFile'] = 'include/comment_functions.php';
$modversion['comments']['callback']['approve'] = 'videoCommentsApprove';
$modversion['comments']['callback']['update'] = 'videoCommentsUpdate';
// ------------------- Submenu ------------------- //
// Sub categories
$modversion['sub'][1]['name'] = _MI_VIDEO_SMNAME1;
$modversion['sub'][1]['url'] = 'categories.php';
// Sub videos
$modversion['sub'][2]['name'] = _MI_VIDEO_SMNAME2;
$modversion['sub'][2]['url'] = 'videos.php';
// Sub Submit
$modversion['sub'][3]['name'] = _MI_VIDEO_SMNAME3;
$modversion['sub'][3]['url'] = 'submit.php';
// ------------------- Blocks ------------------- //
$b = 1;
// Categories
$modversion['blocks'][$b]['file'] = 'categories.php';
$modversion['blocks'][$b]['name'] = _MI_VIDEO_CATEGORIES_BLOCK_CATEGORY;
$modversion['blocks'][$b]['description'] = _MI_VIDEO_CATEGORIES_BLOCK_CATEGORY_DESC;
$modversion['blocks'][$b]['show_func'] = 'b_video_categories_show';
$modversion['blocks'][$b]['edit_func'] = 'b_video_categories_edit';
$modversion['blocks'][$b]['template'] = 'video_block_categories.tpl';
$modversion['blocks'][$b]['options'] = 'cat|5|25|0';
++$b;
// Videos
$modversion['blocks'][$b]['file'] = 'videos.php';
$modversion['blocks'][$b]['name'] = _MI_VIDEO_VIDEOS_BLOCK_VIDEO;
$modversion['blocks'][$b]['description'] = _MI_VIDEO_VIDEOS_BLOCK_VIDEO_DESC;
$modversion['blocks'][$b]['show_func'] = 'b_video_videos_show';
$modversion['blocks'][$b]['edit_func'] = 'b_video_videos_edit';
$modversion['blocks'][$b]['template'] = 'video_block_videos.tpl';
$modversion['blocks'][$b]['options'] = 'video|5|25|0';
++$b;
unset($b);
// ------------------- Config ------------------- //
$c = 1;
// Keywords
$modversion['config'][$c]['name'] = 'keywords';
$modversion['config'][$c]['title'] = '_MI_VIDEO_KEYWORDS';
$modversion['config'][$c]['description'] = '_MI_VIDEO_KEYWORDS_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'video, categories, videos';
++$c;
// Uploads : maxsize of image
$modversion['config'][$c]['name'] = 'maxsize';
$modversion['config'][$c]['title'] = '_MI_VIDEO_MAXSIZE';
$modversion['config'][$c]['description'] = '_MI_VIDEO_MAXSIZE_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 100000000000000;
// Uploads : mimetypes of image
++$c;
$modversion['config'][$c]['name'] = 'mimetypes';
$modversion['config'][$c]['title'] = '_MI_VIDEO_MIMETYPES';
$modversion['config'][$c]['description'] = '_MI_VIDEO_MIMETYPES_DESC';
$modversion['config'][$c]['formtype'] = 'select_multi';
$modversion['config'][$c]['valuetype'] = 'array';
$modversion['config'][$c]['default'] = array('video/mp4', 'video/ogg', 'video/mpeg');
$modversion['config'][$c]['options'] = array('mp4' => 'video/mp4', 'm4v' => 'video/m4v', 'ogg' => 'video/ogg', 'wmv' => 'video/wmv', 
											 'mov' => 'video/quicktime', 'mpeg' => 'video/mpeg', 'jpeg' => 'video/jpeg');
++$c;
// Width : size of video
$modversion['config'][$c]['name'] = 'width';
$modversion['config'][$c]['title'] = '_MI_VIDEO_WIDTH';
$modversion['config'][$c]['description'] = '_MI_VIDEO_WIDTH_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = '100%';
++$c;
// Height : size of video
$modversion['config'][$c]['name'] = 'height';
$modversion['config'][$c]['title'] = '_MI_VIDEO_HEIGHT';
$modversion['config'][$c]['description'] = '_MI_VIDEO_HEIGHT_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = '360';
++$c;
// Admin pager
$modversion['config'][$c]['name'] = 'adminpager';
$modversion['config'][$c]['title'] = '_MI_VIDEO_ADMIN_PAGER';
$modversion['config'][$c]['description'] = '_MI_VIDEO_ADMIN_PAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
// User pager
$modversion['config'][$c]['name'] = 'userpager';
$modversion['config'][$c]['title'] = '_MI_VIDEO_USER_PAGER';
$modversion['config'][$c]['description'] = '_MI_VIDEO_USER_PAGER_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 10;
++$c;
// Use tag
$modversion['config'][$c]['name'] = 'usetag';
$modversion['config'][$c]['title'] = '_MI_VIDEO_USE_TAG';
$modversion['config'][$c]['description'] = '_MI_VIDEO_USE_TAG_DESC';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
// Number column
$modversion['config'][$c]['name'] = 'numb_col';
$modversion['config'][$c]['title'] = '_MI_VIDEO_NUMB_COL';
$modversion['config'][$c]['description'] = '_MI_VIDEO_NUMB_COL_DESC';
$modversion['config'][$c]['formtype'] = 'select';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 1;
$modversion['config'][$c]['options'] = array(1 => '1', 2 => '2', 3 => '3', 4 => '4');
++$c;
// Divide by
$modversion['config'][$c]['name'] = 'divideby';
$modversion['config'][$c]['title'] = '_MI_VIDEO_DIVIDEBY';
$modversion['config'][$c]['description'] = '_MI_VIDEO_DIVIDEBY_DESC';
$modversion['config'][$c]['formtype'] = 'select';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 1;
$modversion['config'][$c]['options'] = array(1 => '1', 2 => '2', 3 => '3', 4 => '4');
++$c;
// Table type
$modversion['config'][$c]['name'] = 'table_type';
$modversion['config'][$c]['title'] = '_MI_VIDEO_DIVIDEBY';
$modversion['config'][$c]['description'] = '_MI_VIDEO_DIVIDEBY_DESC';
$modversion['config'][$c]['formtype'] = 'select';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 'bordered';
$modversion['config'][$c]['options'] = array('bordered' => 'bordered', 'striped' => 'striped', 'hover' => 'hover', 'condensed' => 'condensed');
++$c;
// Panel by
$modversion['config'][$c]['name'] = 'panel_type';
$modversion['config'][$c]['title'] = '_MI_VIDEO_PANEL_TYPE';
$modversion['config'][$c]['description'] = '_MI_VIDEO_PANEL_TYPE_DESC';
$modversion['config'][$c]['formtype'] = 'select';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'default';
$modversion['config'][$c]['options'] = array('default' => 'default', 'primary' => 'primary', 'success' => 'success', 'info' => 'info', 'warning' => 'warning', 'danger' => 'danger');
++$c;
// Advertise
$modversion['config'][$c]['name'] = 'advertise';
$modversion['config'][$c]['title'] = '_MI_VIDEO_ADVERTISE';
$modversion['config'][$c]['description'] = '_MI_VIDEO_ADVERTISE_DESC';
$modversion['config'][$c]['formtype'] = 'textarea';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = '';
++$c;
// Bookmarks
$modversion['config'][$c]['name'] = 'bookmarks';
$modversion['config'][$c]['title'] = '_MI_VIDEO_BOOKMARKS';
$modversion['config'][$c]['description'] = '_MI_VIDEO_BOOKMARKS_DESC';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
// Facebook Comments
$modversion['config'][$c]['name'] = 'facebook_comments';
$modversion['config'][$c]['title'] = '_MI_VIDEO_FACEBOOK_COMMENTS';
$modversion['config'][$c]['description'] = '_MI_VIDEO_FACEBOOK_COMMENTS_DESC';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
// Disqus Comments
$modversion['config'][$c]['name'] = 'disqus_comments';
$modversion['config'][$c]['title'] = '_MI_VIDEO_DISQUS_COMMENTS';
$modversion['config'][$c]['description'] = '_MI_VIDEO_DISQUS_COMMENTS_DESC';
$modversion['config'][$c]['formtype'] = 'yesno';
$modversion['config'][$c]['valuetype'] = 'int';
$modversion['config'][$c]['default'] = 0;
++$c;
// Maintained by
$modversion['config'][$c]['name'] = 'maintainedby';
$modversion['config'][$c]['title'] = '_MI_VIDEO_MAINTAINEDBY';
$modversion['config'][$c]['description'] = '_MI_VIDEO_MAINTAINEDBY_DESC';
$modversion['config'][$c]['formtype'] = 'textbox';
$modversion['config'][$c]['valuetype'] = 'text';
$modversion['config'][$c]['default'] = 'http://xoops.org/modules/newbb';
unset($c);
// ------------------- Notifications ------------------- //
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php';
$modversion['notification']['lookup_func'] = 'video_notify_iteminfo';
// Global Notify
$modversion['notification']['category'][1]['name'] = 'global';
$modversion['notification']['category'][1]['title'] = _MI_VIDEO_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_VIDEO_GLOBAL_NOTIFY_DESC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php', 'categories.php', 'videos.php');
// Category Notify
$modversion['notification']['category'][2]['name'] = 'category';
$modversion['notification']['category'][2]['title'] = _MI_VIDEO_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_VIDEO_CATEGORY_NOTIFY_DESC;
$modversion['notification']['category'][2]['subscribe_from'] = array('categories.php', 'videos.php');
$modversion['notification']['category'][2]['item_name'] = 'video_cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;
// Video Notify
$modversion['notification']['category'][3]['name'] = 'video';
$modversion['notification']['category'][3]['title'] = _MI_VIDEO_VIDEO_NOTIFY;
$modversion['notification']['category'][3]['description'] = _MI_VIDEO_VIDEO_NOTIFY_DESC;
$modversion['notification']['category'][3]['subscribe_from'] = 'videos.php';
$modversion['notification']['category'][3]['item_name'] = 'video_id';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;
// GLOBAL Notify
$modversion['notification']['event'][1]['name'] = 'new_category';
$modversion['notification']['event'][1]['category'] = 'global';
$modversion['notification']['event'][1]['admin_only'] = 0;
$modversion['notification']['event'][1]['title'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION;
$modversion['notification']['event'][1]['description'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_DESC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newcategory_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT;
// GLOBAL Notify
$modversion['notification']['event'][2]['name'] = 'video_modify';
$modversion['notification']['event'][2]['category'] = 'global';
$modversion['notification']['event'][2]['admin_only'] = 1;
$modversion['notification']['event'][2]['title'] = _MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_CAPTION;
$modversion['notification']['event'][2]['description'] = _MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_DESC;
$modversion['notification']['event'][2]['mail_template'] = 'global_videomodify_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_SUBJECT;
// GLOBAL Notify
$modversion['notification']['event'][3]['name'] = 'video_broken';
$modversion['notification']['event'][3]['category'] = 'global';
$modversion['notification']['event'][3]['admin_only'] = 1;
$modversion['notification']['event'][3]['title'] = _MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_CAPTION;
$modversion['notification']['event'][3]['description'] = _MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_DESC;
$modversion['notification']['event'][3]['mail_template'] = 'global_videobroken_notify';
$modversion['notification']['event'][3]['mail_subject'] = _MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_SUBJECT;
// GLOBAL Notify
$modversion['notification']['event'][4]['name'] = 'video_submit';
$modversion['notification']['event'][4]['category'] = 'global';
$modversion['notification']['event'][4]['admin_only'] = 1;
$modversion['notification']['event'][4]['title'] = _MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_CAPTION;
$modversion['notification']['event'][4]['description'] = _MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_DESC;
$modversion['notification']['event'][4]['mail_template'] = 'global_videosubmit_notify';
$modversion['notification']['event'][4]['mail_subject'] = _MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_SUBJECT;
// GLOBAL Notify
$modversion['notification']['event'][5]['name'] = 'new_video';
$modversion['notification']['event'][5]['category'] = 'global';
$modversion['notification']['event'][5]['admin_only'] = 0;
$modversion['notification']['event'][5]['title'] = _MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY;
$modversion['notification']['event'][5]['caption'] = _MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_CAPTION;
$modversion['notification']['event'][5]['description'] = _MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_DESC;
$modversion['notification']['event'][5]['mail_template'] = 'global_newvideo_notify';
$modversion['notification']['event'][5]['mail_subject'] = _MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_SUBJECT;
// CATEGORY Notify
$modversion['notification']['event'][6]['name'] = 'video_submit';
$modversion['notification']['event'][6]['category'] = 'category';
$modversion['notification']['event'][6]['admin_only'] = 1;
$modversion['notification']['event'][6]['title'] = _MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY;
$modversion['notification']['event'][6]['caption'] = _MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_CAPTION;
$modversion['notification']['event'][6]['description'] = _MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_DESC;
$modversion['notification']['event'][6]['mail_template'] = 'category_videosubmit_notify';
$modversion['notification']['event'][6]['mail_subject'] = _MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_SUBJECT;
// CATEGORY Notify
$modversion['notification']['event'][7]['name'] = 'new_video';
$modversion['notification']['event'][7]['category'] = 'category';
$modversion['notification']['event'][7]['admin_only'] = 0;
$modversion['notification']['event'][7]['title'] = _MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY;
$modversion['notification']['event'][7]['caption'] = _MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_CAPTION;
$modversion['notification']['event'][7]['description'] = _MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_DESC;
$modversion['notification']['event'][7]['mail_template'] = 'category_newvideo_notify';
$modversion['notification']['event'][7]['mail_subject'] = _MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_SUBJECT;
// VIDEO Notify
$modversion['notification']['event'][8]['name'] = 'approve';
$modversion['notification']['event'][8]['category'] = 'video';
$modversion['notification']['event'][8]['admin_only'] = 1;
$modversion['notification']['event'][8]['title'] = _MI_VIDEO_VIDEO_APPROVE_NOTIFY;
$modversion['notification']['event'][8]['caption'] = _MI_VIDEO_VIDEO_APPROVE_NOTIFY_CAPTION;
$modversion['notification']['event'][8]['description'] = _MI_VIDEO_VIDEO_APPROVE_NOTIFY_DESC;
$modversion['notification']['event'][8]['mail_template'] = 'video_approve_notify';
$modversion['notification']['event'][8]['mail_subject'] = _MI_VIDEO_VIDEO_APPROVE_NOTIFY_SUBJECT;
