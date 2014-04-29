<div class="vnews-index-default">
	<div id="default" class="item">
		<div class="itemTitle "><h2><{if $content.story_important}><span class="red bold"><{$smarty.const._VNEWS_MD_IMPORTANT}></span><{/if}><{$default.story_title}></h2></div>
		<{if $default.story_short}>
		<div class="itemShort">
			<{if $default.story_img}>
			<div class="itemImg gallery">
			<{if $img_lightbox}>
				<a href="<{$default.imageurl}>" title="<{$content.story_title}>">
					<img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$default.thumburl}>" alt="<{$default.story_title}>"/>
				</a>
			<{else}>
				<img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$default.thumburl}>" alt="<{$default.story_title}>"/>
			<{/if}>
			</div>
			<{/if}>
			<{$default.story_short}>
			<div class="clear spacer"></div>
			<a class="itemMore" href="<{$default.url}>" title="<{$smarty.const._VNEWS_MD_MORE}>"><{$smarty.const._VNEWS_MD_MORE}></a>
		</div>
		<{else}>
		<div class="itemText">
			<{if $default.story_img}>
			<div class="gallery">
			<{if $img_lightbox}>
				<a href="<{$default.imageurl}>" >
					<img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$default.thumburl}>" alt="<{$default.story_title}>"/>
				</a>
			<{else}>
				<img width="<{$imgwidth}>" class="<{$imgfloat}> story_img" src="<{$default.thumburl}>" alt="<{$default.story_title}>"/>
			<{/if}>
			</div>
			<{/if}>
			<{$default.story_text}>
			<div class="clear"></div>
		</div>
		<{/if}>
		<div class="itemPostDate"><{$smarty.const._VNEWS_MD_DATE}>: <{$default.story_publish}>
		<{if $xoops_isadmin}>
		<span class="itemAdminLink">
			<a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=edit_content&amp;story_id=<{$default.story_id}>" title="<{$smarty.const._VNEWS_MD_EDIT}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/edit.png" alt="<{$smarty.const._VNEWS_MD_EDIT}>"/></a>
			<a href="<{$xoops_url}>/modules/<{$xoops_dirname}>/admin/article.php?op=delete&amp;story_id=<{$default.story_id}>" title="<{$smarty.const._VNEWS_MD_DELETE}>"><img src="<{$xoops_url}>/modules/<{$xoops_dirname}>/assets/images/icons/delete.png" alt="<{$smarty.const._VNEWS_MD_DELETE}>"/></a>
		</span>
		<{/if}>
		</div>
	</div>
</div>
