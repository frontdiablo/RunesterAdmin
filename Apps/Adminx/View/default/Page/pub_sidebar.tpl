<div id="pageTitle"></div>
<div class="Tabmenubox Tabmenubox_cate">
<ul id="menu1" class="Tabmenu">
<li id="one1" onclick="setTab('one',1,2,'hover1')" class="hover1">{$Think.lang.TAB_SIDE_CATE_FILTER}</li>
<li id="one2" onclick="setTab('one',2,2,'hover2')" >{$Think.lang.TAB_SIDE_CATE_SETTING}</li>
</ul>
</div>
<div class="separate"></div>

{/* Tab选项卡 1 */}
<div id="con_one_1" class="hover">
	<ul class="sideItemUl">
		<li><a href='{:U($Think.CONTROLLER_NAME."/index")}' <if condition="$pid eq ''">class="click"</if>>{$Think.lang.SIDE_LIST_ALL}</li></a>
		{:W("Sidebar/sideCateTable",array("Page","display",$pid))}
	</ul>
</div>

{/* Tab选项卡 2 */}
<div id="con_one_2" style="display:none">

<form enctype="multipart/form-data" method="POST" name="myform" action="{:U('Category/update_multi')}" >
<table class='sbItemTable'>
<tr><td colspan="3" class="BtnTr">{$Think.lang.PROMPT_SIDE_CATE}</td></tr>
{:W("Sidebar/sideCateTable",array("Page","edit"))}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="{$Think.lang.BTN_CATE_EDIT}" class="btn2 Btn2Red" />
</td>
</tr></table>
</form>
<div class="separate"></div>
<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{:U('Category/insert')}">
<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="{$Think.lang.PH_CATE_ADD}" onclick="this.select()" /><br />
<input type="hidden" name="cate_type" value="Page" />
<input type="submit" value="{$Think.lang.BTN_CATE_ADD}" class="btn3 Btn3Blue" />
</form>
</div>
</div>