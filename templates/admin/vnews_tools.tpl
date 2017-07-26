<{if $header}><{includeq file="$xoops_rootpath/modules/vnews/templates/admin/vnews_header.tpl"}><{/if}>

<div id="tools" class="marg5 pad5">
	<!-- Display clone form -->
	<{if $folder}><{$folder}><{/if}>
	<{if $purge}><{$purge}><{/if}>
	<{if $alias}><{$alias}><{/if}>
	<{if $topicalias}><{$topicalias}><{/if}>
	<{if $description}><{$description}><{/if}>
	<{if $keyword}><{$keyword}><{/if}>
	<{if $prune}><{$prune}><{/if}>
	<{if $messages}>
	<div id="xo-module-log">
	    <h4><{$smarty.const._VNEWS_AM_TOOLS_LOG_TITLE}></h4>
	    <br /><br />
	    <div class="xo-logger">
	        <{foreach item=log from=$messages}>
	        <li><{$log}></li>
	        <{/foreach}>
	    </div>
	</div>
	<{/if}>
</div>
