<{include file='db:video_header.tpl'}>
<div class='row'>
	<div class='col-md-7'>		
		<{if $file != ''}>
		<video width="<{$video_width}>" height="<{$video_height}>" controls>
			<source src="<{$video_upload_url}>/files/videos/<{$file}>" type="video/mp4" media="all and (max-width:480px)">
			<source src="<{$video_upload_url}>/files/videos/<{$file}>" type="video/webm" media="all and (max-width:480px)">
			<source src="<{$video_upload_url}>/files/videos/<{$file}>" type="video/mp4">
			<source src="<{$video_upload_url}>/files/videos/<{$file}>" type="video/webm">
			Your browser does not support the video tag.
		</video>
		<{elseif $url != ''}>
			<iframe width="<{$video_width}>" height="<{$video_height}>" src="<{$url}>" frameborder="0" allowfullscreen></iframe>
		<{else}>
			<img class="img-responsive" src="http://placehold.it/500?text=Nessun+Video" alt="<{$title}>" />
		<{/if}>
		<hr />
		<p><{$smarty.const._MA_VIDEO_VIDEO_PUBLISHED}>: <{$published}></p>
	</div>
	<div class='col-md-5'>
		<h4 class='page-header'><strong><{$smarty.const._MA_VIDEO_CATEGORY_TITLE}></strong>: <{$title}></h4>
		<p><strong><{$smarty.const._MA_VIDEO_VIDEO_DESCRIPTION}></strong>: <{$description}></p>
		<p><{$smarty.const._MA_VIDEO_VIDEO}>: <{$count}></p>
	</div>
</div>
<{include file='db:video_footer.tpl'}>
