<{include file="db:vnews_header.tpl"}>
<div class="vnews">
    <{if $advertisement}>
        <div class="itemAde"><{$advertisement}></div>
    <{/if}>
    <table class="outer">
        <th class="txtcenter"><{$smarty.const._VNEWS_MD_TOPIC_LIST}></th>
        <{include file="db:vnews_topic_list.tpl" level='odd mainLevel'}>
    </table>
    <{if $topic_pagenav}>
        <div class="pagenave"><{$topic_pagenav}></div>
    <{/if}>
</div>
