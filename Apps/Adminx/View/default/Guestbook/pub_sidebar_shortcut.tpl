<div id="pageTitle"></div>

<div class="Tabmenubox TabmenuboxBorder">
<div class="Tabmenubox_cate">{$Think.lang.TAB_SIDE_CATE_FILTER}</div>
</div>

<div class="separate"></div>

{/* Tab选项卡 1 */}
<div id="con_one_1" class="hover">
	<div class="sbAddContainer">
	<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{:U('Category/insert')}">
	<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="{$Think.lang.PH_CATE_ADD}" onclick="this.select()" /><br />
	<input type="hidden" name="cate_type" value="Page" />
	<input type="submit" value="{$Think.lang.BTN_CATE_ADD}" class="btn3 Btn3Blue" />
	</form>
	</div>
</div>