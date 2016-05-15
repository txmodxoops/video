<{if $bookmarks != 0}>
<{include file="db:system_bookmarks.html"}>
<{/if}>

<{if $fbcomments != 0}>
<{include file="db:system_fbcomments.html"}>
<{/if}>
<div class="pull-left"><{$copyright}></div>
<{if $pagenav != ''}>
    <div class="pull-right"><{$pagenav}></div>
<{/if}>
<br />
<{if $xoops_isadmin}>
   <div class="text-center bold"><a href="<{$admin}>"><{$smarty.const._MA_VIDEO_ADMIN}></a></div><br />
<{/if}>
<div class="pad2 marg2">
    <{if $comment_mode == "flat"}>
        <{include file="db:system_comments_flat.html"}>
    <{elseif $comment_mode == "thread"}>
        <{include file="db:system_comments_thread.html"}>
    <{elseif $comment_mode == "nest"}>
        <{include file="db:system_comments_nest.html"}>
    <{/if}>
</div>

<br />
<{include file='db:system_notification_select.html'}>