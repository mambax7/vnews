<{include file="db:vnews_header.tpl"}>
<div class="vnews">
    <div class="item">
        <div class="itemHead">
            <div class="itemTitle">
                <h2><{if $content.story_important}><span
                            class="red bold"><{$smarty.const._VNEWS_MD_IMPORTANT}></span><{/if}><{$content.story_title}>
                </h2>
            </div>
        </div>
        <div class="itemInfo">
            <{if $content.author}>
                <span class="itemPoster"><{$smarty.const._VNEWS_MD_AUTHOR}>: <a
                            href="<{$xoops_url}>/user.php?id=<{$content.story_uid}>"
                            title="<{$content.author}>"><{$content.author}></a><{if $alluserpost}> (<a
                        href="<{$xoops_url}>/modules/<{$xoops_dirname}>/index.php?user=<{$content.story_uid}>"
                        title="<{$smarty.const._VNEWS_MD_AUTHOR_ALL_DESC}><{$content.author}>"><{$smarty.const._VNEWS_MD_AUTHOR_ALL}></a>)<{/if}></span>
                <{if $link.date || $link.hits || $content.story_comments || $link.topicshow}> &bull;<{/if}>
            <{/if}>
            <{if $link.date}>
                <span class="itemPostDate"><{$smarty.const._VNEWS_MD_DATE}>: <{$content.story_publish}></span>
                <{if $link.hits || $content.story_comments || $link.topicshow}> &bull;<{/if}>
            <{/if}>
            <{if $link.hits}>
                <span class="itemStats"><{$content.story_hits}> <{$smarty.const._VNEWS_MD_HITS}></span>
                <{if $content.story_comments || $link.topicshow }> &bull;<{/if}>
            <{/if}>
            <{if $link.coms}>
                <span class="itemPermaLink"><{if $content.story_comments > 1}><a href="#comm"
                                                                                 title="<{$smarty.const._VNEWS_MD_COM}>"><{$content.story_comments}> <{$smarty.const._VNEWS_MD_COMS}></a><{elseif $content.story_comments == 1}>
                        <a href="#comm"
                           title="<{$smarty.const._VNEWS_MD_COM}>"><{$content.story_comments}> <{$smarty.const._VNEWS_MD_COM}></a><{/if}></span>
                <{if $link.topicshow && $content.story_comments}> &bull;<{/if}>
            <{/if}>
            <{if $link.topicshow}>
                <span class="itemPermaLink"><{$smarty.const._VNEWS_MD_PUBTOPIC}>: <a
                            title="<{$smarty.const._VNEWS_MD_PUBTOPIC}> <{$link.topic}>"
                            href="<{$link.topicurl}>"><{$link.topic}></a></span>
            <{/if}>
        </div>
        <div class="itemBody">
            <!-- Display content body -->
            <{if $content.story_subtitle}>
                <div class="itemSubTitle"><h3><{$content.story_subtitle}></h3></div>
            <{/if}>
            <{if $content.story_short}>
                <div class="itemShort"><{$content.story_short}></div>
            <{/if}>
            <{if $advertisement && $content.story_short}>
                <div class="itemAde"><{$advertisement}></div>
            <{/if}>
            <div class="itemText editable <{$multiple_columns}>" id="story_<{$content.story_id}>">
                <{if $content.story_img}>
                    <div class="itemImg gallery">
                        <{if $img_lightbox}>
                            <a href="<{$content.imageurl}>" title="<{$content.story_title}>">
                                <img class="<{$imgfloat}> story_img" src="<{$content.thumburl}>"
                                     alt="<{$content.story_title}>">
                            </a>
                        <{else}>
                            <img class="<{$imgfloat}> story_img" src="<{$content.thumburl}>"
                                 alt="<{$content.story_title}>">
                        <{/if}>
                    </div>
                <{/if}>
                <{$content.story_text}>
                <div class="clear spacer"></div>
                <{if $content.story_author}>
                    <div class="itemSource">
                        <{$smarty.const._VNEWS_MD_SOURCE}><a href="<{$content.story_source}>"
                                                             title="<{$smarty.const._VNEWS_MD_SOURCE}><{$content.story_author}>"
                                                             rel="external"><{$content.story_author}></a>
                    </div>
                <{/if}>
                <{if $link.date}>
                    <{if $content.story_update != $content.story_publish}>
                        <div class="itemPostDate"><{$smarty.const._VNEWS_MD_UPDATE}>: <{$content.story_update}></div>
                    <{/if}>
                <{/if}>
            </div>
            <{if $advertisement && !$content.story_short}>
                <div class="itemAde"><{$advertisement}></div>
            <{/if}>
            <{if $content.story_file}>
                <div class="itemPlayer">
                    <{foreach item=file from=$files}>
                        <{if $file.file_type == flv}>
                            <div class="itemVideo">
                                <script type='text/javascript'
                                        src='<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/js/jwplayer/jwplayer.js'></script>
                                <div id='mediaspace<{$file.file_id}>'></div>
                                <script type='text/javascript'>
                                    jwplayer('mediaspace<{$file.file_id}>').setup({
                                        'flashplayer': '<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/js/jwplayer/player.swf',
                                        'file': '<{$file.fileurl}>',
                                        'title': '<{$file.file_title}>',
                                        'controlbar': 'bottom',
                                        'width': '<{$jwwidth}>',
                                        'height': '<{$jwheight}>'
                                    });
                                </script>
                            </div>
                        <{elseif $file.file_type == mp3}>
                            <div class="itemMp3">
                                <object type="application/x-shockwave-flash"
                                        data="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/js/audio/audio-player.swf"
                                        id="audioplayer1" height="35"
                                        width="400">
                                    <param name="movie"
                                           value="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/js/audio/audio-player.swf">
                                    <param name="FlashVars" value="playerID=audioplayer1&soundFile=<{$file.fileurl}>">
                                    <param name="quality" value="high">
                                    <param name="menu" value="false">
                                    <param name="wmode" value="transparent">
                                </object>
                            </div>
                        <{/if}>
                    <{/foreach}>
                </div>
            <{/if}>

            <{if $vote}>
                <div class="vote">
                    <input value="<{$content.story_rating}>" step="1" id="backing<{$content.story_id}>" type="range">
                    <div class="rateit" data-url="<{$xoops_url}>/modules/<{$xoops_dirname}>/ajax.php?op=rate"
                         data-story="<{$content.story_id}>" data-rateit-backingfld="#backing<{$content.story_id}>"
                         data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0"
                         data-rateit-max="10"></div>
                </div>
                <script type="text/javascript">
                    $('.vote .rateit').bind('rated reset', function (e) {
                        var ri = $(this);
                        var rate = ri.rateit('vote');
                        var story = ri.data('story');
                        var url = ri.data('url');
                        ri.rateit('readonly', true);
                        $.ajax({
                            url: url,
                            data: {story: story, rate: rate},
                            type: 'POST',
                            dataType: "json",
                            success: function (result) {
                                if (!result.status == 1) {
                                    alert(result.message);
                                }
                            }
                        });
                    });
                </script>
            <{/if}>
        </div>

        <div class="itemFoot">
            <div class="itemIcons floatleft">
                <{if $xoops_isadmin}>
                    <span class="itemAdminLink">
                    <a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=edit_content&amp;story_id=<{$content.story_id}>"
                       title="<{$smarty.const._VNEWS_MD_EDIT}>"><img
                                src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/edit.png"
                                alt="<{$smarty.const._VNEWS_MD_EDIT}>"></a>
                    <a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=delete&amp;story_id=<{$content.story_id}>"
                       title="<{$smarty.const._VNEWS_MD_DELETE}>"><img
                                src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/delete.png"
                                alt="<{$smarty.const._VNEWS_MD_DELETE}>"></a>&nbsp;
                </span>
                <{/if}>
                <{if $link.print}>
                    <a href="<{$link.print}>" title="<{$smarty.const._VNEWS_MD_PRINT}>"><img
                                src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/printer.png"
                                alt="<{$smarty.const._VNEWS_MD_PRINT}>"></a>
                <{/if}>
                <{if $link.pdf}>
                    <a href="<{$link.pdf}>" title="<{$smarty.const._VNEWS_MD_PDF}>"><img
                                src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/pdf.png"
                                alt="<{$smarty.const._VNEWS_MD_PDF}>"></a>
                <{/if}>
                <{if $link.mail}>
                    <a href="<{$link.mail}>" title="<{$smarty.const._VNEWS_MD_MAIL}>"><img
                                src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/mail.png"
                                alt="<{$smarty.const._VNEWS_MD_MAIL}>"></a>
                <{/if}>
            </div>
            <div class="floatright">
                <{if $link.prev}>
                    <span class="floatleft"><a href="<{$link.prev}>"
                                               title="<{$smarty.const._VNEWS_MD_PREV}> : <{$link.prev_title}>"><img
                                    src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/prev.png"
                                    alt="<{$smarty.const._VNEWS_MD_PREV}>"></a></span>
                <{/if}>
                <{if $link.next}>
                    <span class="floatright"><a href="<{$link.next}>"
                                                title="<{$smarty.const._VNEWS_MD_NEXT}> : <{$link.next_title}>"><img
                                    src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/next.png"
                                    alt="<{$smarty.const._VNEWS_MD_NEXT}>"></a></span>
                <{/if}>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <{if $tags}>
        <div class="tagbar"><{include file="db:tag_bar.tpl"}></div>
    <{/if}>

    <{if $content.story_file}>
        <ul>
            <{foreach item=file from=$files}>
                <{if $file.file_type != flv && $file.file_type != mp3}>
                    <li><a title="<{$file.file_title}>" href="<{$file.fileurl}>"><{$file.file_title}></a></li>
                <{/if}>
            <{/foreach}>
        </ul>
    <{/if}>

    <div class="bookmark"><{include file="db:vnews_bookmarkme.tpl"}></div>

    <{if $related}>
        <ul>
            <{foreach item=related from=$related}>
                <li><a title="<{$related.story_title}>" href="<{$related.url}>"><{$related.story_title}></a></li>
            <{/foreach}>
        </ul>
    <{/if}>

    <{if $anon_canpost ==1 || $content.story_comments}>
        <div class="txtcenter comment_bar">
            <{$commentsnav}>
            <{$lang_notice}>
        </div>
    <{/if}>

    <div class="comments" id="comm">
        <!-- start comments loop -->
        <{if $comment_mode == "flat"}>
            <{include file="db:system_comments_flat.tpl"}>
        <{elseif $comment_mode == "thread"}>
            <{include file="db:system_comments_thread.tpl"}>
        <{elseif $comment_mode == "nest"}>
            <{include file="db:system_comments_nest.tpl"}>
        <{/if}>
        <!-- end comments loop -->
    </div>
</div>
