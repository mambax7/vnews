<div class="vnews-index-table">
    <table>
        <thead>
        <tr>
            <th><{$smarty.const._VNEWS_MD_TITLE}></th>
            <{if !$story_topic}>
                <th><{$smarty.const._VNEWS_MD_TOPIC}></th><{/if}>
            <{if $info.author}>
                <th><{$smarty.const._VNEWS_MD_AUTHOR}></th><{/if}>
            <{if $info.date}>
                <th><{$smarty.const._VNEWS_MD_DATE}></th><{/if}>
            <{if $info.hits}>
                <th><{$smarty.const._VNEWS_MD_HITS}></th><{/if}>
            <{if $info.coms}>
                <th><{$smarty.const._VNEWS_MD_COMS}></th><{/if}>
        </tr>
        </thead>
        <tbody>
        <{foreach item=content from=$contents}>
            <tr class="<{cycle values="even,odd"}>">
                <td><{if $content.story_important}><span
                            class="red bold"><{$smarty.const._VNEWS_MD_IMPORTANT}></span><{/if}><a
                            href="<{$content.url}>"
                            title="<{$content.story_title}>"><{$content.story_title}></a></td>
                <{if !$story_topic}>
                    <td><a href="<{$content.topicurl}>" title="<{$content.topic}>"><{$content.topic}></a></td><{/if}>
                <{if $info.author}>
                    <td><a title="<{$content.owner}>"
                           href="<{$xoops_url}>/user.php?id=<{$content.story_uid}>"><{$content.owner}></a></td><{/if}>
                <{if $info.date}>
                    <td><{$content.story_publish}></td><{/if}>
                <{if $info.hits}>
                    <td><{$content.story_hits}></td><{/if}>
                <{if $info.coms}>
                    <td><{$content.story_comments}></td><{/if}>
            </tr>
        <{/foreach}>
        </tbody>
    </table>
</div>
