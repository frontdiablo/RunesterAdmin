<div id="pageTitle"></div>
<div class="Tabmenubox Tabmenubox_cate">
<ul id="menu1" class="Tabmenu">
<li id="one2" onclick="setTab('one',2,2,'hover2')" class="hover2">{$Think.lang.TAB_SIDE_ADV_AREA}</li>
<li id="one1" onclick="setTab('one',1,2,'hover1')" >{$Think.lang.TAB_SIDE_SETTING_NAV}</li>
</ul>
</div>
<div class="separate"></div>
<div id="con_one_1" style="display:none">
<include file="Config:inc_sidebar_nav" />
</div><!--con_one_1 End-->

<div id="con_one_2" class="hover">

<ul class="sideItemUl">
{:W("Sidebar/sideCateTable",array("Adv","display",$pid))}
</ul>

<div class="separate"></div>

<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{:U('Category/update_multi')}">
<table class='sbItemTable'>
<tr>
<td colspan="3" class="BtnTr">
{$Think.lang.PROMPT_SIDE_CATE}
</td>
</tr>
{:W("Sidebar/sideCateTable",array("Adv","edit"))}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="{$Think.lang.BTN_CATE_EDIT}" class="btn2 Btn2Red" />
</td>
</tr>
</table>
</form>
<div class="separate"></div>

<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{:U('Category/insert')}">
<input type="hidden" name="cate_type" value="Adv" />
<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="{$Think.lang.PH_CATE_ADD}" onclick="this.select()" /><br />
<input type="submit" value="{$Think.lang.BTN_CATE_ADD}" class="btn3 Btn3Blue" />
</form>
</div>

</div><!--con_one_2 End-->