<div class="vnews-index-list">
    <div class="itemList">
        <ul>
            <{foreach item=content from=$contents}>
                <li>
                    <h3><{if $content.story_important}><span
                                class="red bold"><{$smarty.const._VNEWS_MD_IMPORTANT}></span><{/if}><a
                                href="<{$content.url}>"
                                title="<{$content.story_title}>"><{$content.story_title}></a></h3>
                    <{if $info.author || $info.date || $info.hits}>
                        <div class="pad2">
                            <{if $info.author}>
                                <span class="itemPoster">
                        <a href="<{$xoops_url}>/user.php?id=<{$content.story_uid}>"
                           title="<{$content.owner}>"><{$content.owner}></a><{if $alluserpost}> (<a
                                        href="<{$xoops_url}>/modules/<{$xoops_dirname}>/index.php?user=<{$content.story_uid}>"
                                        title="<{$smarty.const._VNEWS_MD_AUTHOR_ALL_DESC}><{$content.owner}>"><{$smarty.const._VNEWS_MD_AUTHOR_ALL}></a>)<{/if}>
                    </span>
                                <{if $info.date || $info.hits}> &bull;<{/if}>
                            <{/if}>
                            <{if $info.date}>
                                <span class="itemPostDate"><{$content.story_publish}></span>
                                <{if $info.hits}> &bull;<{/if}>
                            <{/if}>
                            <{if $info.hits}>
                                <span class="itemStats"><{$content.story_hits}> <{$smarty.const._VNEWS_MD_HITS}></span>
                            <{/if}>
                        </div>
                    <{/if}>
                </li>
            <{/foreach}>
        </ul>
    </div>
</div>
