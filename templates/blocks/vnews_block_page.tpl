<div class="itemBlock">
    <div class="itemHead">
        <div class="itemTitle">
            <h2><{$block.story_title}></h2>
        </div>
    </div>
    <{if $block.story_short}>
        <div class="itemBody">
            <{if $block.story_img}>
                <div class="itemImg">
                    <img width="<{$block.width}>" class="<{$block.float}> story_img"
                         src="<{$block.thumburl}><{$block.story_img}>" alt="<{$block.story_title}>">
                </div>
            <{/if}>
            <div class="itemText"><{$block.story_short}></div>
            <div class="itemMore">
                <a href="<{$block.link}>" title="<{$block.story_title}>"><{$smarty.const._VNEWS_MB_MORE}></a>
            </div>
            <div class="clear"></div>
        </div>
    <{else}>
        <div class="itemBody">
            <{if $block.story_img}>
                <div class="itemImg">
                    <img width="<{$block.width}>" class="<{$block.float}> story_img"
                         src="<{$block.thumburl}><{$block.story_img}>" alt="<{$block.story_title}>">
                </div>
            <{/if}>
            <div class="itemText"><{$block.story_text}></div>
            <div class="clear"></div>
        </div>
    <{/if}>
</div>
