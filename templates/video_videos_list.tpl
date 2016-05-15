						<tr>
							<{if $xoops_isadmin}>
							<td class="video-admin">
								<a class="btn btn-default" href="<{$video_url}>/submit.php?op=edit&amp;id=<{$video.id}>" title="<{$video.title}>"><em class="fa fa-pencil"></em></a>
								<a class="btn btn-danger" href="<{$video_url}>/admin/videos.php?op=delete&amp;video_id=<{$video.id}>" title="<{$video.title}>"><em class="fa fa-trash"></em></a>
							</td>
							<{/if}>
							<td class="video-id"><{$video.id}></td>
							<td class="video-title"><a href="<{$video_url}>/single.php?id=<{$video.id}>" title="<{$video.title}>"><{$video.title}></a></td>
							<td class="video-description"><{$video.description}></td>
						</tr>