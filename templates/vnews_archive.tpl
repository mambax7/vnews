<div class="vnews-archive">
    <div class="pad2 marg2">
        <table class="outer">
            <tr>
                <th><{$smarty.const._VNEWS_MD_ARCHIVE}></th>
            </tr>
            <{foreach item=year from=$years}>
                <{foreach item=month from=$year.months}>
                    <tr class="even">
                        <td><a title="<{$month.string}> <{$year.number}>"
                               href="<{$xoops_url}>/modules/<{$module}>/archive.php?year=<{$year.number}>&amp;month=<{$month.number}>"><{$month.string}> <{$year.number}></a>
                        </td>
                    </tr>
                <{/foreach}>
            <{/foreach}>
        </table>
    </div>

    <{if $show_articles == true}>
        <div class="pad2 marg2">
            <table>
                <tr>
                    <th><{$smarty.const._VNEWS_MD_ARCHIVE_ARTICLES}></th>
                    <th class="center"><{$smarty.const._VNEWS_MD_ARCHIVE_VIEW}></th>
                    <th class="center"><{$smarty.const._VNEWS_MD_ARCHIVE_DATE}></th>
                    <th class="center"><{$smarty.const._VNEWS_MD_ARCHIVE_TOPIC}></th>
                </tr>
                <{foreach item=archive from=$archive}>
                    <tr class="<{cycle values="even,odd"}>">
                        <td><a title="<{$archive.story_title}>" href="<{$archive.url}>"><{$archive.story_title}></a>
                        </td>
                        <td class="center"><{$archive.story_hits}></td>
                        <td class="center"><{$archive.story_publish}></td>
                        <td class="center"><a title="<{$archive.topic}>"
                                              href="<{$archive.topicurl}>"><{$archive.topic}></a></td>
                    </tr>
                <{/foreach}>
            </table>
        </div>
        <div class="pagenave"><{$pagenav}></div>
        <div class="marg2 pad2 center"><a title="<{$smarty.const._VNEWS_MD_ARCHIVE_TOTAL}>"
                                          href="<{$xoops_url}>/modules/<{$module}>/archive.php"><{$smarty.const._VNEWS_MD_ARCHIVE_TOTAL}></a>
        </div>
    <{/if}>

</div>
