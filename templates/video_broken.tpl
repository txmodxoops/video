<{include file='db:video_header.tpl'}>

<table class='table table-bordered'>
	<thead class="outer"><tr class="head"><th class="center"><{$smarty.const._MA_VIDEO_VIDEO_ID}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_CID}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_TITLE}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_FILE}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_DESCRIPTION}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_URL}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_CREATED}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_PUBLISHED}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_WEIGHT}></th>

<th class="center"><{$smarty.const._MA_VIDEO_VIDEO_DISPLAY}></th>

</tr>

</thead>

	<tbody>
		<{foreach item=video from=$videos}>
		<tr class='<{cycle values="odd, even"}>'>
		<td class='center'><{$video.id}></td>
<td class='center'><{$video.cid}></td>
<td class='center'><{$video.title}></td>
<td class='center'><{$video.file}></td>
<td class='center'><{$video.description}></td>
<td class='center'><{$video.url}></td>
<td class='center'><{$video.created}></td>
<td class='center'><{$video.published}></td>
<td class='center'><{$video.weight}></td>
<td class='center'><{$video.display}></td>

	</tr>


<{/foreach}>


	</tbody>


</table>

<{include file='db:video_footer.tpl'}>
