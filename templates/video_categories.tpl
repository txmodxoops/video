<{include file='db:video_header.tpl'}>

<div class='panel panel-<{$panel_type}>'>
<div class='panel-heading'>
<{$smarty.const._MA_VIDEO_CATEGORIES_TITLE}></div>

<{foreach item=category from=$categories}>
	<div class='panel panel-body'>
<{include file='db:video_categories_list.tpl' category=$category}>
<{if $category.count is div by $numb_col}>
	<br />

<{/if}>

</div>


<{/foreach}>

</div>

<{include file='db:video_footer.tpl'}>
