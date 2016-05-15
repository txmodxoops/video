<!-- Header -->
<{include file='db:video_admin_header.tpl'}>
<{if $videos_list}>
	<table class='table table-bordered'>
	<thead><tr class="head"><th class="center"><{$smarty.const._AM_VIDEO_VIDEO_ID}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_CID}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_TITLE}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_FILE}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_CREATED}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_PUBLISHED}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_WEIGHT}></th>
<th class="center"><{$smarty.const._AM_VIDEO_VIDEO_DISPLAY}></th>
<th class="center width5"><{$smarty.const._AM_VIDEO_FORM_ACTION}></th>
</tr>

</thead>
<{if $videos_count}>
	<tbody><{foreach item=video from=$videos_list}>
	<tr class="<{cycle values='odd, even'}>"><td class='center'><{$video.id}></td><td class="center"><{$video.cid}></td>
<td class="center"><{$video.title}></td>
<td class="center"><{$video.file}></td>
<td class="center"><{$video.created}></td>
<td class="center"><{$video.published}></td>
<td class="center"><{$video.weight}></td>
<td class="center"><{$video.display}></td>
<td class="center  width5">
<a href="videos.php?op=edit&amp;video_id=<{$video.id}>" title="<{$smarty.const._EDIT}>">
	<img src="<{xoModuleIcons16 edit.png}>" alt="videos" />
</a>
<a href="videos.php?op=delete&amp;video_id=<{$video.id}>" title="<{$smarty.const._DELETE}>">
	<img src="<{xoModuleIcons16 delete.png}>" alt="videos" />
</a>
</td>
</tr>

<{/foreach}>
</tbody>

<{/if}>

</table>
<div class="clear">&nbsp;</div>
<{if $pagenav}>
	<div class="xo-pagenav floatright"><{$pagenav}></div>
<div class="clear spacer"></div>

<{/if}>

<{/if}>
<{if $form}>
	<{$form}>
<{/if}>
<{if $error}>
	<div class="errorMsg"><strong><{$error}></strong>
</div>

<{/if}>
<br /></br />
<!-- Footer --><{include file='db:video_admin_footer.tpl'}>
