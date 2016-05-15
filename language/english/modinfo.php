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
 * @version        $Id: 1.0 modinfo.php 14050 Sat 2016-05-07 14:43:58Z Timgno $
 */
// ---------------- Admin Main ----------------
define('_MI_VIDEO_NAME', "Video");
define('_MI_VIDEO_DESC', "This module is for videos");
// ---------------- Admin Menu ----------------
define('_MI_VIDEO_ADMENU1', "Dashboard");
define('_MI_VIDEO_ADMENU2', "Categories");
define('_MI_VIDEO_ADMENU3', "Videos");
define('_MI_VIDEO_ADMENU4', "Permissions");
define('_MI_VIDEO_ABOUT', "About");
// ---------------- Admin Nav ----------------
define('_MI_VIDEO_ADMIN_PAGER', "Admin pager");
define('_MI_VIDEO_ADMIN_PAGER_DESC', "Admin per page list");
// User
define('_MI_VIDEO_USER_PAGER', "User pager");
define('_MI_VIDEO_USER_PAGER_DESC', "User per page list");
// Submenu
define('_MI_VIDEO_SMNAME1', "categories");
define('_MI_VIDEO_SMNAME2', "videos");
define('_MI_VIDEO_SMNAME3', "Submit");
// Blocks
define('_MI_VIDEO_CATEGORIES_BLOCK', "Categories block");
define('_MI_VIDEO_CATEGORIES_BLOCK_DESC', "Categories block description");
define('_MI_VIDEO_CATEGORIES_BLOCK_CATEGORY', "Categories block CATEGORY");
define('_MI_VIDEO_CATEGORIES_BLOCK_CATEGORY_DESC', "Categories block CATEGORY description");
define('_MI_VIDEO_VIDEOS_BLOCK', "Videos block");
define('_MI_VIDEO_VIDEOS_BLOCK_DESC', "Videos block description");
define('_MI_VIDEO_VIDEOS_BLOCK_VIDEO', "Videos block  VIDEO");
define('_MI_VIDEO_VIDEOS_BLOCK_VIDEO_DESC', "Videos block  VIDEO description");
define('_MI_VIDEO_VIDEOS_BLOCK_LAST', "Videos block last");
define('_MI_VIDEO_VIDEOS_BLOCK_LAST_DESC', "Videos block last description");
define('_MI_VIDEO_VIDEOS_BLOCK_NEW', "Videos block new");
define('_MI_VIDEO_VIDEOS_BLOCK_NEW_DESC', "Videos block new description");
define('_MI_VIDEO_VIDEOS_BLOCK_HITS', "Videos block hits");
define('_MI_VIDEO_VIDEOS_BLOCK_HITS_DESC', "Videos block hits description");
define('_MI_VIDEO_VIDEOS_BLOCK_TOP', "Videos block top");
define('_MI_VIDEO_VIDEOS_BLOCK_TOP_DESC', "Videos block top description");
define('_MI_VIDEO_VIDEOS_BLOCK_RANDOM', "Videos block random");
define('_MI_VIDEO_VIDEOS_BLOCK_RANDOM_DESC', "Videos block random description");
// Config
define('_MI_VIDEO_KEYWORDS', "Keywords");
define('_MI_VIDEO_KEYWORDS_DESC', "Insert here the keywords (separate by comma)");
define('_MI_VIDEO_MAXSIZE', "Max size");
define('_MI_VIDEO_MAXSIZE_DESC', "Set a number of max size uploads files in byte");
define('_MI_VIDEO_MIMETYPES', "Mime Types");
define('_MI_VIDEO_MIMETYPES_DESC', "Set the mime types selected");
define('_MI_VIDEO_WIDTH', "Width");
define('_MI_VIDEO_WIDTH_DESC', "Set the default width");
define('_MI_VIDEO_HEIGHT', "Height");
define('_MI_VIDEO_HEIGHT_DESC', "Set the default height");
define('_MI_VIDEO_USE_TAG', "Use TAG");
define('_MI_VIDEO_USE_TAG_DESC', "If you use tag module, check this option to yes");
define('_MI_VIDEO_NUMB_COL', "Number Columns");
define('_MI_VIDEO_NUMB_COL_DESC', "Number Columns to View.");
define('_MI_VIDEO_DIVIDEBY', "Divide By");
define('_MI_VIDEO_DIVIDEBY_DESC', "Divide by columns number.");
define('_MI_VIDEO_TABLE_TYPE', "Table Type");
define('_MI_VIDEO_TABLE_TYPE_DESC', "Table Type is the bootstrap html table.");
define('_MI_VIDEO_PANEL_TYPE', "Panel Type");
define('_MI_VIDEO_PANEL_TYPE_DESC', "Panel Type is the bootstrap html div.");
define('_MI_VIDEO_IDPAYPAL', "Paypal ID");
define('_MI_VIDEO_IDPAYPAL_DESC', "Insert here your PayPal ID for donactions.");
define('_MI_VIDEO_ADVERTISE', "Advertisement Code");
define('_MI_VIDEO_ADVERTISE_DESC', "Insert here the advertisement code");
define('_MI_VIDEO_MAINTAINEDBY', "Maintained By");
define('_MI_VIDEO_MAINTAINEDBY_DESC', "Allow url of support site or community");
define('_MI_VIDEO_BOOKMARKS', "Social Bookmarks");
define('_MI_VIDEO_BOOKMARKS_DESC', "Show Social Bookmarks in the single page");
define('_MI_VIDEO_FACEBOOK_COMMENTS', "Facebook comments");
define('_MI_VIDEO_FACEBOOK_COMMENTS_DESC', "Allow Facebook comments in the single page");
define('_MI_VIDEO_DISQUS_COMMENTS', "Disqus comments");
define('_MI_VIDEO_DISQUS_COMMENTS_DESC', "Allow Disqus comments in the single page");
// Notifications
define('_MI_VIDEO_GLOBAL_NOTIFY', "Global notify");
define('_MI_VIDEO_GLOBAL_NOTIFY_DESC', "Global notify desc");
define('_MI_VIDEO_CATEGORY_NOTIFY', "Category notify");
define('_MI_VIDEO_CATEGORY_NOTIFY_DESC', "Category notify desc");
define('_MI_VIDEO_VIDEO_NOTIFY', "Video notify");
define('_MI_VIDEO_VIDEO_NOTIFY_DESC', "Video notify desc");
define('_MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY', "Global newcategory notify");
define('_MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_CAPTION', "Global newcategory notify caption");
define('_MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_DESC', "Global newcategory notify desc");
define('_MI_VIDEO_GLOBAL_NEWCATEGORY_NOTIFY_SUBJECT', "Global newcategory notify subject");
define('_MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY', "Global VIDEOmodify notify");
define('_MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_CAPTION', "Global VIDEO modify notify caption");
define('_MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_DESC', "Global VIDEOmodify notify desc");
define('_MI_VIDEO_GLOBAL_VIDEOMODIFY_NOTIFY_SUBJECT', "Global VIDEO modify notify subject");
define('_MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY', "Global VIDEO broken notify");
define('_MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_CAPTION', "Global VIDEObroken notify caption");
define('_MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_DESC', "Global VIDEObroken notify desc");
define('_MI_VIDEO_GLOBAL_VIDEOBROKEN_NOTIFY_SUBJECT', "Global VIDEObroken notify subject");
define('_MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY', "Global VIDEO submit notify");
define('_MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_CAPTION', "Global VIDEO submit notify caption");
define('_MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_DESC', "Global VIDEOsubmit notify desc");
define('_MI_VIDEO_GLOBAL_VIDEOSUBMIT_NOTIFY_SUBJECT', "Global VIDEOsubmit notify subject");
define('_MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY', "Global newVIDEO notify");
define('_MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_CAPTION', "Global newVIDEO notify caption");
define('_MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_DESC', "Global newVIDEO notify desc");
define('_MI_VIDEO_GLOBAL_NEWVIDEO_NOTIFY_SUBJECT', "Global newVIDEO notify subject");
define('_MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY', "Category VIDEOsubmit notify");
define('_MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_CAPTION', "Category VIDEO submit notify caption");
define('_MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_DESC', "Category VIDEO submit notify desc");
define('_MI_VIDEO_CATEGORY_VIDEOSUBMIT_NOTIFY_SUBJECT', "Category VIDEO submit notify subject");
define('_MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY', "Category newVIDEO notify");
define('_MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_CAPTION', "Category newVIDEO notify caption");
define('_MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_DESC', "Category newVIDEO notify desc");
define('_MI_VIDEO_CATEGORY_NEWVIDEO_NOTIFY_SUBJECT', "Category newVIDEO notify subject");
define('_MI_VIDEO_VIDEO_APPROVE_NOTIFY', "Video approve notify");
define('_MI_VIDEO_VIDEO_APPROVE_NOTIFY_CAPTION', "Video approve notify caption");
define('_MI_VIDEO_VIDEO_APPROVE_NOTIFY_DESC', "Video approve notify desc");
define('_MI_VIDEO_VIDEO_APPROVE_NOTIFY_SUBJECT', "Video approve notify subject");
// Permissions Groups
define('_MI_VIDEO_GROUPS', "Groups access");
define('_MI_VIDEO_GROUPS_DESC', "Select general access permission for groups.");
define('_MI_VIDEO_ADMIN_GROUPS', "Admin Group Permissions");
define('_MI_VIDEO_ADMIN_GROUPS_DESC', "Which groups have access to tools and permissions page");
// ---------------- End ----------------