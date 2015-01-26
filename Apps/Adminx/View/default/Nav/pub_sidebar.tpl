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
	<volist name="rvo" id="rvo">
	<li><a href='{:U($Think.CONTROLLER_NAME."/index","pid=0&cate=".$rvo['cate_id'])}' <if condition="$cate_id eq $rvo['cate_id']">class="click"</if>>{$rvo.cate_title}</li></a>
	</volist>
	</ul>
<div class="separate"></div>
	{:getSideNavCate(0,$pid,$cate_id)}
	</ul>
</div>

{/* Tab选项卡 2 */}
<div id="con_one_2" style="display:none">
<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U('Category/update_multi')}">
<table class='sbItemTable'>
<tr><td colspan="3" class="BtnTr">{$Think.lang.PROMPT_SIDE_CATE}</td></tr>
{:getSideCateTable("Nav","edit",0,0,1,0)}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="{$Think.lang.BTN_CATE_EDIT}" class="btn2 Btn2Red" />
</td>
</tr>
</table>
</form>

<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{:U('Category/insert')}">
<input type="hidden" name="cate_type" value="Nav" />
<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="{$Think.lang.PH_CATE_ADD}" onclick="this.select()" /><br />
<input type="submit" value="{$Think.lang.BTN_CATE_ADD}" class="btn3 Btn3Blue" />
</form>
</div>
</div>