<ol class="breadcrumb breadcrumb-arrow">
	<li><a href='<{xoAppUrl index.php}>' title='home'><i class="glyphicon glyphicon-home"></i></a></li>
	<{foreach item=itm from=$xoBreadcrumbs name=bcloop}>
		<{if $itm.link}>
			<li><a href='<{$itm.link}>' title='<{$itm.title}>'><{$itm.title}></a></li>
		<{else}>
			<li class="active"><span><{$itm.title}></span></li>
		<{/if}>
	<{/foreach}>
</ol>
