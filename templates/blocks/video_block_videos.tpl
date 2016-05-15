<table class='table table-<{$table_type}>'>
		<thead>
			<tr class='head'>
		<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_ID}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_CID}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_TITLE}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_FILE}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_DESCRIPTION}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_URL}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_CREATED}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_PUBLISHED}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_WEIGHT}></th>
<th class='center'><{$smarty.const._MB_VIDEO_VIDEO_DISPLAY}></th>

	</tr>


	</thead>

<{if $videos_count}>
	<tbody><{foreach item=video from=$videos_list}>
	<tr class="<{cycle values="odd, even"}>"><td class="center"><{$video.id}></td>

<td class="center"><{$video.cid}></td>

<td class="center"><{$video.title}></td>

<td class="center"><{$video.file}></td>

<td class="center"><{$video.created}></td>

<td class="center"><{$video.published}></td>

<td class="center"><{$video.weight}></td>

<td class="center"><{$video.display}></td>

<td class="center">
<a href="videos.php?op=edit&amp;video_id=<{$video.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons32 edit.png}>" alt="videos"></img>
</a>

<a href="videos.php?op=delete&amp;video_id=<{$video.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons32 delete.png}><{$video.id}>" alt="videos"></img>
</a>

</td>

</tr>


<{/foreach}>

</tbody>


<{/if}>

<tfoot><tr><td>&nbsp;</td>

</tr>

</tfoot>


</table>

