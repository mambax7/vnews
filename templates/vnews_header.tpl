<{if $img_lightbox}>
    <script type="text/javascript">
        $(function () {
            $('.gallery a').lightBox({
                imageLoading: '<{$xoops_url}>/modules/<{$xoops_dirname}>/language/<{$xoops_language}>/assets/images/lightbox-ico-loading.gif',
                imageBtnClose: '<{$xoops_url}>/modules/<{$xoops_dirname}>/language/<{$xoops_language}>/assets/images/lightbox-btn-close.gif',
                imageBtnNext: '<{$xoops_url}>/modules/<{$xoops_dirname}>/language/<{$xoops_language}>/assets/images/lightbox-btn-next.gif',
                imageBtnPrev: '<{$xoops_url}>/modules/<{$xoops_dirname}>/language/<{$xoops_language}>/assets/images/lightbox-btn-prev.gif',
                imageBlank: '<{$xoops_url}>/modules/<{$xoops_dirname}>/language/<{$xoops_language}>/assets/images/lightbox-blank.gif',
                txtImage: '<{$smarty.const._VNEWS_MD_LIGHTBOX_IMAGE}>',
                overlayOpacity: 0.6,
                containerResizeSpeed: 350,
                txtOf: '<{$smarty.const._VNEWS_MD_LIGHTBOX_OF}>'
            });
        });
    </script>
<{/if}>

<{if $breadcrumb || $rss}>
    <div class="vnews_top">
        <{if $breadcrumb}>
            <div class="breadcrumb floatleft">
                <{$breadcrumb}>
            </div>
        <{/if}>
        <{if $rss}>
            <div class="rss floatright">
                <a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/rss.php"><img
                            src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/rss.png" alt=""></a>
            </div>
        <{/if}>
        <div class="clear"></div>
    </div>
<{/if}>
