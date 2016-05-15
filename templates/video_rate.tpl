<{include file="db:video_header.tpl"}>
<table class="video">
    <thead class="outer">
        <tr class="head">
            <th class="center"><{$smarty.const._MA_VIDEO_VIDEO_ID}></th>
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
        <{foreach item=list from=$videos}>
            <tr class="<{cycle values='odd, even'}>">
                <td class="center"><{$list.id}></td>
                <td class="center"><{$list.cid}></td>
                <td class="center"><{$list.title}></td>
                <td class="center"><{$list.file}></td>
                <td class="center"><{$list.description}></td>
                <td class="center"><{$list.url}></td>
                <td class="center"><{$list.created}></td>
                <td class="center"><{$list.published}></td>
                <td class="center"><{$list.weight}></td>
                <td class="center"><{$list.display}></td>
            </tr>
        <{/foreach}>
    </tbody>
</table>
<{include file="db:video_footer.tpl"}>