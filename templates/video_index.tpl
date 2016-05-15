<{include file='db:video_header.tpl'}>
<{if count($categories) == 0 && count($videos) == 0}>
<table class="table table-<{$table_type}>">
    <thead>
        <tr class="center">
            <th><{$smarty.const._MA_VIDEO_TITLE}>  -  <{$smarty.const._MA_VIDEO_DESC}></th>
        </tr>
    </thead>
    <tbody>
        <tr class="center">
            <td class="bold pad5">
                <ul class="menu text-center">
                    <li><a href="<{$video_url}>"><{$smarty.const._MA_VIDEO_INDEX}></a></li>
                    <li><a href="<{$video_url}>/categories.php"><{$smarty.const._MA_VIDEO_CATEGORIES}></a></li>
                    <li><a href="<{$video_url}>/videos.php"><{$smarty.const._MA_VIDEO_VIDEOS}></a></li>
                </ul>
				<div class="justify pad5"><{$smarty.const._MA_VIDEO_INDEX_DESC}></div>
            </td>
        </tr>
    </tbody>    
</table>
<{/if}>
<{if count($videos) gt 0}>
<div class="row"> 
	<div class="col-md-12">
		<div class="panel panel-default panel-table">
			<div class="panel-heading">
				<div class="row">				
					<div class="col col-xs-<{if $xoops_isadmin}>6<{else}>12<{/if}>">				
						<h3 class="panel-title"><{$smarty.const._MA_VIDEO_INDEX_LATEST_LIST}></h3>
					</div>
					<{if $xoops_isadmin}>
					<div class="col col-xs-6 text-right">
						<a href="<{$video_url}>/submit.php" class="btn btn-sm btn-primary btn-create" title="<{$smarty.const._MA_VIDEO_SUBMIT_VIDEO}>"><{$smarty.const._MA_VIDEO_SUBMIT_VIDEO}></a>
					</div>
					<{/if}>
				</div>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered table-list">
					<thead>
						<tr>
							<{if $xoops_isadmin}>
							<th><em class="fa fa-cog"></em></th>
							<{/if}>
							<th class="hidden-xs text-center"><{$smarty.const._MA_VIDEO_VIDEO_ID}></th>
							<th><{$smarty.const._MA_VIDEO_VIDEO_TITLE}></th>
							<th><{$smarty.const._MA_VIDEO_VIDEO_DESCRIPTION}></th>
						</tr> 
					</thead>
					<tbody>
						<{foreach item=video from=$videos}>
							<{include file="db:video_videos_list.tpl" video=$video}>
						<{/foreach}>
					</tbody>
				</table>		
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col col-xs-4"><{$pagination}></div>
					<div class="col col-xs-8">
						<{$pagenav}>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<{/if}>
<{include file='db:video_footer.tpl'}>