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
 * @version        $Id: 1.0 functions.php 14050 Sat 2016-05-07 14:43:59Z Timgno $
 */

/***************Blocks***************/
function video_block_addCatSelect($cats) {
    if(is_array($cats))
    {
        $cat_sql = '('.current($cats);
        array_shift($cats);
        foreach($cats as $cat)
        {
            $cat_sql .= ','.$cat;
        }
        $cat_sql .= ')';
    }
    return $cat_sql;
}

/**
 *  Get the permissions ids
 */
function videoGetMyItemIds($permtype, $dirname)
{
    global $xoopsUser;
    static $permissions = array();
    if(is_array($permissions) && array_key_exists($permtype, $permissions)) {
        return $permissions[$permtype];
    }
	$moduleHandler = xoops_getHandler('module');
	$videoModule = $moduleHandler->getByDirname($dirname);
	$groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
	$gpermHandler = xoops_getHandler('groupperm');
	$videos = $gpermHandler->getItemIds($permtype, $groups, $videoModule->getVar('mid'));
    return $videos;
}

/**
 *  Get the number of videos from the sub categories of a category or sub topics of or topic
 */
function videoNumbersOfEntries($mytree, $videos, $entries, $cid)
{
    $count = 0;
    if(in_array($cid, $videos)) {
        $child = $mytree->getAllChild($cid);
        foreach (array_keys($entries) as $i) {
            if ($entries[$i]->getVar('video_id') == $cid){
                $count++;
            }
            foreach (array_keys($child) as $j) {
                if ($entries[$i]->getVar('video_id') == $j){
                    $count++;
                }
            }
        }
    }
    return $count;
}

function videoMetaKeywords($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content= $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if(isset($xoTheme) && is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'keywords', strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_keywords', strip_tags($content));
    }
}

function videoMetaDescription($content)
{
    global $xoopsTpl, $xoTheme;
    $myts = MyTextSanitizer::getInstance();
    $content = $myts->undoHtmlSpecialChars($myts->displayTarea($content));
    if(isset($xoTheme) && is_object($xoTheme)) {
        $xoTheme->addMeta( 'meta', 'description', strip_tags($content));
    } else {    // Compatibility for old Xoops versions
        $xoopsTpl->assign('xoops_meta_description', strip_tags($content));
    }
}

/**
 * Rewrite all url
 *
 * @String  $module  module name
 * @String  $array   array
 * @return  $type    string replacement for any blank case
 */
function video_RewriteUrl($module, $array, $type = 'content')
{
    $comment = '';
    $video = VideoHelper::getInstance();
    $videos = $video->getHandler('videos');
    $lenght_id = $video->getConfig('lenght_id');
    $rewrite_url = $video->getConfig('rewrite_url');

    if ($lenght_id != 0) {
        $id = $array['content_id'];
        while (strlen($id) < $lenght_id)
            $id = "0" . $id;
    } else {
        $id = $array['content_id'];
    }

    if (isset($array['topic_alias']) && $array['topic_alias']) {
        $topic_name = $array['topic_alias'];
    } else {
        $topic_name = video_Filter(xoops_getModuleOption('static_name', $module));
    }

    switch ($rewrite_url) {

        case 'none':
            if($topic_name) {
                 $topic_name = 'topic=' . $topic_name . '&amp;';
            }
            $rewrite_base = '/modules/';
            $page = 'page=' . $array['content_alias'];
            return XOOPS_URL . $rewrite_base . $module . '/' . $type . '.php?' . $topic_name . 'id=' . $id . '&amp;' . $page . $comment;
            break;

        case 'rewrite':
            if($topic_name) {
                $topic_name = $topic_name . '/';
            }
            $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
            $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
            $module_name = '';
            if(xoops_getModuleOption('rewrite_name', $module)) {
                $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
            }
            $page = $array['content_alias'];
            $type = $type . '/';
            $id = $id . '/';
            if ($type == 'content/') $type = '';

            if ($type == 'comment-edit/' || $type == 'comment-reply/' || $type == 'comment-delete/') {
                return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
            }

            return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name  . $id . $page . $rewrite_ext;
            break;

         case 'short':
            if($topic_name) {
                $topic_name = $topic_name . '/';
            }
            $rewrite_base = xoops_getModuleOption('rewrite_mode', $module);
            $rewrite_ext = xoops_getModuleOption('rewrite_ext', $module);
            $module_name = '';
            if(xoops_getModuleOption('rewrite_name', $module)) {
                $module_name = xoops_getModuleOption('rewrite_name', $module) . '/';
            }
            $page = $array['content_alias'];
            $type = $type . '/';
            if ($type == 'content/') $type = '';

            if ($type == 'comment-edit/' || $type == 'comment-reply/' || $type == 'comment-delete/') {
                return XOOPS_URL . $rewrite_base . $module_name . $type . $id . '/';
            }

            return XOOPS_URL . $rewrite_base . $module_name . $type . $topic_name . $page . $rewrite_ext;
            break;
    }
}
/**
 * Replace all escape, character, ... for display a correct url
 *
 * @String  $url    string to transform
 * @String  $type   string replacement for any blank case
 * @return  $url
 */
function video_Filter($url, $type = '', $module = 'video') {

    // Get regular expression from module setting. default setting is : `[^a-z0-9]`i
    $video = VideoHelper::getInstance();
    $videos = $video->getHandler('videos');
    $regular_expression = $video->getConfig('regular_expression');

    $url = strip_tags($url);
    $url = preg_replace("`\[.*\]`U", "", $url);
    $url = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $url);
    $url = htmlentities($url, ENT_COMPAT, 'utf-8');
    $url = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i", "\1", $url);
    $url = preg_replace(array($regular_expression, "`[-]+`"), "-", $url);
    $url = ($url == "") ? $type : strtolower(trim($url, '-'));
    return $url;
}