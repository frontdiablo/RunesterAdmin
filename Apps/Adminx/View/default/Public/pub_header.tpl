<div id="HeaderTop">
<img src="__RESIMG__/logo.png" />
<div class="HeaderTopFunBtnNav">
<a href="/index.php" target="_blank" class="HeaderTopFunBtn HeaderTopFunBtnHome" title="{$Think.lang.HEADER_BTN_BROWSE}"></a>
<if condition="returnAuth($Thik.MODULE_NAME.'/Cache/clear_cache')">
<a href="javascript:void(0)" onclick='popwindow_clear_cache("{:U('Cache/index')}","{$Think.lang.HEADER_BTN_CLEAR_CACHE}")' class="HeaderTopFunBtn HeaderTopFunBtnClear" title="{$Think.lang.HEADER_BTN_CLEAR_CACHE}"></a>
</if>



<a href="javascript:void(0)" onclick='popwindow_favorite("{:U('Favorite/header_display')}","{$Think.lang.HEADER_BTN_FAVORITE}")' class="HeaderTopFunBtn HeaderTopFunBtnFavorite" title="{$Think.lang.HEADER_BTN_FAVORITE}"></a>
<a href="javascript:void(0)" id="favorite" class="HeaderTopFunBtn HeaderTopFunBtnHelp" title="{$Think.lang.HEADER_BTN_HELP}"></a>


<a href="{:U('Index/LoginOut')}" class="HeaderTopFunBtn HeaderTopFunBtnExit" title="{$Think.lang.HEADER_BTN_QUIT}"></a>
</div>
<div class="clear"></div>
</div>