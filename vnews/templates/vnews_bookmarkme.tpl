<{if $show_social_book != 0}>

<{if $show_social_book == 1 || $show_social_book == 3}>
<div id="socialnetwork">
    <ul>
        <li>
            <div id="twitter">
                <a href="http://twitter.com/share/<{$link.url}>" rel="nofollow" class="twitter-share-button">Tweet</a>
            </div>
        </li>
        <li>
            <div id="facebook">
                <fb:like href="<{$link.url}>" layout="button_count" show_faces="false"></fb:like>
            </div>
        </li>
        <li>
	         <div id="1button">
		          <g:plusone size="medium" count="true"></g:plusone>
	         </div>
        </li>
    </ul>
</div>
<{/if}>

<{if $show_social_book == 2 || $show_social_book == 3}>
<div id="bookmarkme">
    <!--<div id="bookmarkmetitle"><{$smarty.const._VNEWS_MD_BOOKMARK_ME}></div>-->
    <div id="bookmarkmeitems">
        <ul>
            <li id="bookmarkme-blinklist"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_BLINKLIST}>" href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&Description=&Url=<{$link.url}>&Title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/blinklist.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-icio"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_DELICIOUS}>" href="http://del.icio.us/post?url=<{$link.url}>&title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/delicious.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-digg"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_DIGG}>" href="http://digg.com/submit?phase=2&url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/diggman.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-fark"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_FARK}>" href="http://cgi.fark.com/cgi/fark/edit.pl?new_url=<{$link.url}>&new_comment=<{$content.story_title}>&new_link_other=<{$content.story_title}>&linktype=Misc"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/fark.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-furl"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_FURL}>" href="http://www.furl.net/storeIt.jsp?t=<{$content.story_title}>&u=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/furl.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-nwvine"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_VNEWSVINE}>" href="http://www.nwvine.com/_tools/seed&save?u=<{$link.url}>&h=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/newsvine.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-reddit"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_REDDIT}>" href="http://reddit.com/submit?url=<{$link.url}>&title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/reddit.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-simpy"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_SIMPY}>" href="http://www.simpy.com/simpy/LinkAdd.do?href=<{$link.url}>&title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/simpy.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-spurl"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_SPURL}>" href="http://www.spurl.net/spurl.php?title=<{$content.story_title}>&url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/spurl.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-yahoo"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_YAHOO}>" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?t=<{$content.story_title}>&u=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/yahoomyweb.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-balatarin"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_BALATARIN}>" href="http://balatarin.com/links/submit?phase=2&amp;url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/balatarin.png"></a></li>
            <li id="bookmarkme-facebook"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_FACEBOOK}>" href="http://www.facebook.com/share.php?u=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/facebook_share_icon.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-twitter"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_TWITTER}>" href="http://twitter.com/home?status=Browsing:%20<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/twitter_share_icon.gif" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-scriptandstyle"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_SCRIPSTYLE}>" href="http://scriptandstyle.com/submit?url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/scriptandstyle.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-stumbleupon"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_STUMBLE}>" href="http://www.stumbleupon.com/submit?url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/stumbleupon.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-technorati"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_TECHNORATI}>" href="http://technorati.com/faves?add=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/technorati.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-mixx"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_MIXX}>" href="http://www.mixx.com/submit?page_url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/mixx.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-myspace"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_MYSPACE}>" href="http://www.myspace.com/Modules/PostTo/Pages/?u=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/myspace.jpg" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-designfloat"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_DESIGNFLOAT}>" href="http://www.designfloat.com/submit.php?url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/designfloat.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-google-buzz"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_GOOLGEBUZZ}>" href="http://www.google.com/buzz/post?url=<{$link.url}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/google_buzz_icon.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-google-reader"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_GOOLGEREADER}>" href="http://www.google.com/reader/link?url=<{$link.url}>&amp;title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/google-reader-icon.png" alt="<{$content.story_title}>" /></a></li>
            <li id="bookmarkme-google-bookmarks"><a target="_blank" rel="nofollow external" title="<{$smarty.const._VNEWS_MD_BOOKMARK_TO_GOOLGEBOOKMARKS}>" href="https://www.google.com/bookmarks/mark?op=add&amp;bkmk=<{$link.url}>&amp;title=<{$content.story_title}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/bookmarks/google-icon.png" alt="<{$content.story_title}>" /></a></li>
        </ul>
    </div>
</div>
<{/if}>

<{/if}>
