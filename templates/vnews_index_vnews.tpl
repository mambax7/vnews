<div class="vnews-index-vnews">
    <{foreach item=content from=$contents}>
        <div class="item">
            <div class="itemHead">
                <div class="itemTitle">
                    <h2>
                        <{if $content.story_important}><span
                                class="red bold"><{$smarty.const._VNEWS_MD_IMPORTANT}></span><{/if}>
                        <a href="<{$content.url}>" title="<{$content.story_title}>"><{$content.story_title}></a>
                    </h2>
                </div>
            </div>
            <div class="itemInfo">
                <{if $info.author}>
                    <span class="itemPoster">
            <{$smarty.const._VNEWS_MD_AUTHOR}>: <a href="<{$xoops_url}>/user.php?id=<{$content.story_uid}>"
                                                   title="<{$content.owner}>"><{$content.owner}></a><{if $alluserpost}> (<a
                            href="<{$xoops_url}>/modules/<{$xoops_dirname}>/index.php?user=<{$content.story_uid}>"
                            title="<{$smarty.const._VNEWS_MD_AUTHOR_ALL_DESC}><{$content.owner}>"><{$smarty.const._VNEWS_MD_AUTHOR_ALL}></a>)<{/if}>
            </span>
                    <{if $info.date || $info.hits}> &bull;<{/if}>
                <{/if}>
                <{if $info.date}>
                    <span class="itemPostDate">
            <{$smarty.const._VNEWS_MD_DATE}>
                        : <{$content.story_publish}><{if $content.story_update != $content.story_publish}> &bull; <{$smarty.const._VNEWS_MD_UPDATE}>: <{$content.story_update}><{/if}>
            </span>
                    <{if $info.hits}> &bull;<{/if}>
                <{/if}>
                <{if $info.hits}>
                    <span class="itemStats"><{$content.story_hits}> <{$smarty.const._VNEWS_MD_HITS}></span>
                <{/if}>
                <{if $info.showtopic && $content.story_topic}>
                    <span class="itemPermaLink"> &bull; <{$smarty.const._VNEWS_MD_PUBTOPIC}>: <a
                                href="<{$content.topicurl}>"
                                title="<{$smarty.const._VNEWS_MD_PUBTOPIC}> <{$content.topic}>"><{$content.topic}></a></span>
                <{/if}>
            </div>
            <div class="itemBody" id="story_<{$content.story_id}>">
                <{if $content.story_img}>
                    <div class="itemImg gallery">
                        <{if $img_lightbox}>
                            <a href="<{$content.imageurl}>" title="<{$content.story_title}>">
                                <img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$content.thumburl}>"
                                     alt="<{$content.story_title}>">
                            </a>
                        <{else}>
                            <img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$content.thumburl}>"
                                 alt="<{$content.story_title}>">
                        <{/if}>
                    </div>
                <{/if}>
                <{if $content.story_short}>
                    <div class="itemText"><{$content.story_short}></div>
                <{else}>
                    <div class="itemText"><{$content.story_text|truncate:300}></div>
                <{/if}>
                <div class="clear"></div>
            </div>
            <div class="itemFoot">
                <{if $info.coms}>
                    <span class="itemPermaLink"><{if $content.story_comments}><{$content.story_comments}> <{$smarty.const._VNEWS_MD_COMS}><{else}><{$smarty.const._VNEWS_MD_NOCOMS}><{/if}></span>
                <{/if}>
                <{if $xoops_isadmin}>
                    <span class="itemAdminLink">
                <a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=edit_content&amp;story_id=<{$content.story_id}>"
                   title="<{$smarty.const._VNEWS_MD_EDIT}>"><img
                            src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/edit.png"
                            alt="<{$smarty.const._VNEWS_MD_EDIT}>"></a>
                <a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=delete&amp;story_id=<{$content.story_id}>"
                   title="<{$smarty.const._VNEWS_MD_DELETE}>"><img
                            src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/delete.png"
                            alt="<{$smarty.const._VNEWS_MD_DELETE}>"></a>
            </span>
                <{/if}>
            </div>
        </div>
    <{/foreach}>
</div>
