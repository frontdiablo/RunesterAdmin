<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_NAV_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Nav:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/insert">

<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_BASIC}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TYPE} <tip text="一经选定不可修改" style="red" /></td>
<td class="inputTd">
<jselect name="type" title="{:getCategoryTypeName('dir')}" value="dir">{:getIsType()}</jselect>
<jselect name="type_page" title="请选择" value="" style="display:none">{:getPage()}</jselect>
<jselect name="type_article" title="{:getCategoryTypeName('dir')}" value="" style="display:none">{:getCate("Nav",0,1)}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">
<jselect name="pid" title="根分类" value="0">
<li><a href='javascript:void(0)' rel='0_1' name='根分类'>根分类</a></li>
{:getNavCate(1)}
</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_AREA}</td>
<td class="inputTd">
<jselect name="cate" title="请选择" value="">{:getCate("Nav",0)}</jselect>
</td>
</tr>

<tr id="tr_title">
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="title" />
</td>
</tr>

<tr id="tr_url" style="display:none">
<td class="titleTd">{$must}{$Think.lang.FIELD_LINK}</td>
<td class="inputTd">
<input type="text" class="input" name="url" />
</td>
</tr>
<tr id="urlTr" class="displaynone">
<td class="titleTd">{$Think.lang.FIELD_LINK}<tip text="{$Think.lang.TIP_LINK_CATE}" /></td>
<td class="inputTd"><input type="text" class="input urlInput" name="url" id="url" /></td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">
{$Think.lang.FIELD_TARGET}
<jselect name="target" title="{:getTarget('_blank')}" value="_blank">{:getTarget()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_HIDE}
<jselect name="isHide" title="{:getIsHide('0')}" value="0">{:getIsHide()}</jselect>
</td>
</tr>
</table>
</div>
<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_ADD}' />
</div>
</form>
</div>
</td>
</tr>
</table>
</body>
</html>
<include file="Public:pub_bottom" />