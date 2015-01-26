<div id="pageTitle"></div>
<div class="Tabmenubox Tabmenubox_cate">
<ul id="menu1" class="Tabmenu">
<li id="one2" onclick="setTab('one',2,2,'hover2')"class="hover2">{$Think.lang.TAB_SIDE_CATE_FILTER}</li>
<li id="one1" onclick="setTab('one',1,2,'hover1')">{$Think.lang.TAB_SIDE_SETTING_NAV}</li>
</ul>
</div>
<div class="separate"></div>
<div id="con_one_1" style="display:none">
<include file="Config:inc_sidebar_nav" />
</div><!--con_one_1 End-->

<div id="con_one_2" class="hover">
<div class="sbAddContainer">
	<ul class="sideItemUl">
	<li><a href='{:U($Think.CONTROLLER_NAME."/index")}' <if condition="$pid eq ''">class="click"</if>>{$Think.lang.SIDE_LIST_ALL}</a></li>
	{:W("Sidebar/sideCateTable",array("Favorite","display",$pid))}
	</ul>
</div>
<!--
<div class="separate"></div>
<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="myform6"  action="__URL__/insert">
<input type="text" class="input addinput"  name="name" id="name" value="{$Think.lang.PH_NAME}" onclick="this.select()" /><br />
<input type="text" class="input addinput"  name="url" id="url" value="{$Think.lang.PH_URL}" onclick="this.select()" />
<jselect name="type" title="{$Think.lang.JSELECT_TYPE}" value="">
	<li><a href='javascript:void(0)' rel='1' name='站长工具'>站长工具</a></li>
	<li><a href='javascript:void(0)' rel='2' name='搜索提交入口'>搜索提交入口</a></li>
</jselect>
<input type="submit" value="{$Think.lang.BTN_URL_ADD}" class="btn3 Btn3Blue" />
</form>
</div>
-->
</div><!--con_one_2 End-->