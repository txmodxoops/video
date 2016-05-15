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
 * @version        $Id: 1.0 search.inc.php 14050 Sat 2016-05-07 14:44:00Z Timgno $
 */

// search callback functions
function video_search($queryarray, $andor, $limit, $offset, $userid)
{
    global $xoopsDB;
    $sql = "SELECT 'video_id', 'video_title' FROM ".$xoopsDB->prefix('video_videos')." WHERE video_id != 0";
    if ( $userid != 0 ) {
        $sql .= " AND video_submitter=".(int) ($userid);
    }
    if ( is_array($queryarray) && $count = count($queryarray) )
    {
        $sql .= " AND ((v LIKE %$queryarray[0]%)";
        for($i = 1; $i < $count; ++$i)
        {
            $sql .= " $andor ";
            $sql .= "(v LIKE %$queryarray[0]%)";
        }
        $sql .= ")";
    }
    $sql .= " ORDER BY 'video_id' DESC";
    $result = $xoopsDB->query($sql,$limit,$offset);
    $ret = array();
    $i = 0;
    while($myrow = $xoopsDB->fetchArray($result))
    {
        $ret[$i]['image'] = 'assets/icons/32/blank.gif';
        $ret[$i]['link'] = 'videos.php?video_id='.$myrow['video_id'];
        $ret[$i]['title'] = $myrow['video_title'];
        ++$i;
    }
    unset($i);
}