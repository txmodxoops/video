<!-- Header -->
<{include file='db:video_admin_header.tpl'}>
<{if $categories_list}>
	<table class='table table-bordered'>
	<thead><tr class="head"><th class="center"><{$smarty.const._AM_VIDEO_CATEGORY_ID}></th>
<th class="center"><{$smarty.const._AM_VIDEO_CATEGORY_TITLE}></th>
<th class="center"><{$smarty.const._AM_VIDEO_CATEGORY_PID}></th>
<th class="center"><{$smarty.const._AM_VIDEO_CATEGORY_IMAGE}></th>
<th class="center"><{$smarty.const._AM_VIDEO_CATEGORY_WEIGHT}></th>
<th class="center width5"><{$smarty.const._AM_VIDEO_FORM_ACTION}></th>
</tr>

</thead>
<{if $categories_count}>
	<tbody><{foreach item=category from=$categories_list}>
	<tr class="<{cycle values='odd, even'}>"><td class='center'><{$category.id}></td><td class="center"><{$category.title}></td>
<td class="center"><{$category.pid}></td>
<td class="center">
	<img src="<{xoModuleIcons32}><{$category.image}>" alt="categories" />
</td>
<td class="center"><{$category.weight}></td>
<td class="center  width5">
<a href="categories.php?op=edit&amp;cat_id=<{$category.id}>" title="<{$smarty.const._EDIT}>">
	<img src="<{xoModuleIcons16 edit.png}>" alt="categories" />
</a>
<a href="categories.php?op=delete&amp;cat_id=<{$category.id}>" title="<{$smarty.const._DELETE}>">
	<img src="<{xoModuleIcons16 delete.png}>" alt="categories" />
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
