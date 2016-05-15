<{include file='db:video_header.tpl'}>

<div class='panel panel-<{$panel_type}>'>
<div class='panel-heading'>
<{$smarty.const._MA_VIDEO_VIDEOS_TITLE}></div>

<{foreach item=video from=$videos}>
	<div class='panel panel-body'>
<{include file='db:video_videos_list.tpl' video=$video}>
<{if $video.count is div by $numb_col}>
	<br />

<{/if}>

</div>


<{/foreach}>

</div>

<{include file='db:video_footer.tpl'}>
