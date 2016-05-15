<{include file='db:video_header.tpl'}>

<div class='video-tips'>
<ul>
	<li><{$smarty.const._MA_VIDEO_SUBMIT_SUBMITONCE}></li>
<li><{$smarty.const._MA_VIDEO_SUBMIT_ALLPENDING}></li>
<li><{$smarty.const._MA_VIDEO_SUBMIT_DONTABUSE}></li>
<li><{$smarty.const._MA_VIDEO_SUBMIT_TAKEDAYS}></li>

</ul>

</div>

<{if $message_error != ''}>
	<div class='errorMsg'>
<{$message_error}>
</div>


<{/if}>

<div class='video-submitform'>
<{$form}>
</div>

<{include file='db:video_footer.tpl'}>
