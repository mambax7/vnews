<{if $block.showtype == 'list'}>
    <div class="itemBlock">
        <ul>
            <{foreach item=topic from=$block.topics}>
                <li>
                    <{if $block.img || $block.description}>
                        <h3><a title="<{$topic.topic_title}>"
                               href="<{$topics.topicurl}>"><{$topic.topic_title}></a><{if $block.count}> ( <{$topic.count}> ) <{/if}>
                        </h3>
                        <div class="itemBody" id="topic_<{$topic.story_id}>">
                            <{if $block.img && $topic.topic_img}>
                                <div class="itemImg">
                                    <img class="<{$block.float}>" src="<{$topic.thumburl}>"
                                         alt="<{$topic.topic_title}>">
                                </div>
                            <{/if}>
                            <{if $block.description && $topic.topic_desc}>
                                <div class="itemText"><{$topic.topic_desc}></div>
                            <{/if}>
                            <div class="clear"></div>
                        </div>
                    <{else}>
                        <a title="<{$topic.topic_title}>"
                           href="<{$topic.topicurl}>"><{$topic.topic_title}></a><{if $block.count}> ( <{$topic.count}> ) <{/if}>
                    <{/if}>
                </li>
            <{/foreach}>
        </ul>
    </div>
<{elseif $block.showtype == 'table'}>
    <table>
        <thead>
        <th class="txtcenter"><{$smarty.const._VNEWS_MB_TOPIC_NAME}></th>
        <th class="txtcenter"><{$smarty.const._VNEWS_MB_TOPIC_IMG}></th>
        </thead>
        <tbody>
        <{foreach item=topic from=$block.topics}>
            <tr class="odd">
                <td<{if !$topic.topic_img}> colspan="2"<{/if}> class="top">
                    <div class="topicTitle"><a title="<{$topic.topic_title}>"
                                               href="<{$topic.topicurl}>"><{$topic.topic_title}></a><{if $block.count}> ( <{$topic.count}> ) <{/if}>
                    </div>
                    <div class="topicDesc"><{$topic.topic_desc}></div>
                </td>
                <{if $topic.topic_img}>
                    <td class="top txtcenter">
                        <div class="topicImg">
                            <img class="<{$imgfloat}> story_img" src="<{$topic.thumburl}>"
                                 alt="<{$topic.topic_title}>">
                        </div>
                    </td>
                <{/if}>
            </tr>
        <{/foreach}>
        </tbody>
    </table>
<{/if}>
