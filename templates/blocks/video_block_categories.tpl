<table class='table table-<{$table_type}>'>
		<thead>
			<tr class='head'>
		<th class='center'><{$smarty.const._MB_VIDEO_CAT_ID}></th>
<th class='center'><{$smarty.const._MB_VIDEO_CAT_PID}></th>
<th class='center'><{$smarty.const._MB_VIDEO_CAT_TITLE}></th>
<th class='center'><{$smarty.const._MB_VIDEO_CAT_DESCRIPTION}></th>
<th class='center'><{$smarty.const._MB_VIDEO_CAT_IMAGE}></th>
<th class='center'><{$smarty.const._MB_VIDEO_CAT_WEIGHT}></th>

	</tr>


	</thead>

<{if $categories_count}>
	<tbody><{foreach item=category from=$categories_list}>
	<tr class="<{cycle values="odd, even"}>"><td class="center"><{$category.id}></td>

<td class="center"><{$category.pid}></td>

<td class="center"><{$category.title}></td>

<td class="center"><img src="<{xoModuleIcons32}><{$category.image}>" alt="categories"></img>
</td>

<td class="center"><{$category.weight}></td>

<td class="center">
<a href="categories.php?op=edit&amp;cat_id=<{$category.id}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons32 edit.png}>" alt="categories"></img>
</a>

<a href="categories.php?op=delete&amp;cat_id=<{$category.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons32 delete.png}><{$category.id}>" alt="categories"></img>
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

