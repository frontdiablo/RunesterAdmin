<include file="Public:pub_top" />
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_PAGE_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Page:pub_funbut" />
<div id="basic-accordian" >
<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" name="id" value="{$vo.id}" />
<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover">{$Think.lang.TAB_BASIC}</li>
<li id="one2" onclick="setTab('one',2,3,'hover')" >{$Think.lang.TAB_SEO}</li>
<li id="one3" onclick="setTab('one',3,3,'hover')">{$Think.lang.TAB_OTHER}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="title" value="{$vo.title}" />
</td>
</tr>
<if condition="C('HIDE_FIELD.PAGE_ALIAS') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_ALIAS}</td>
<td class="inputTd">
<input type="text" class="input" name="alias" value="{$vo.alias}" />
</td>
</tr>
</if>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">


<jselect name="pid" title="{:getCateTitle($vo['pid'])}" value="{$vo['pid']}">{:getCate("Page")}</jselect>

</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CONTENT}</td>
<td class="inputTd"><editor name="cotnent">{$vo.content}</editor></td>
</tr>
</table>
</div>

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->

<table class="listTable">
<tr><td colspan="2" class="promptTd">{$must}{$Think.lang.PROMPT_SEO}</td></td></tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_TITLE}</td>
<td class="inputTd"><input type="text" class="input" name="seoTitle" value="{$vo.seoTitle}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_KEYWORDS}</td>
<td class="inputTd">
<input type="text" class="input" name="seoKeywords" value="{$vo.seoKeywords}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_DESCRIPT}</td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea">{$vo.seoDescript}</textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<if condition="C('HIDE_FIELD.PAGE_SETBANNER') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_BANNER}<tip text="{$Think.lang.TIP_BANNER}" /></td>
<td class="inputTd">
<kupload name="setBanner" value="{$vo.setBanner}" />
</td>
</tr>
</if>
<tr>
<td class="titleTd">{$Think.lang.FIELD_PROTECT}<tip text="{$Think.lang.TIP_PROTECT}" /></td>
<td class="inputTd">
<jselect name="isProtect" title="{:getIsProtect($vo['isProtect'])}" value="{$vo['isProtect']}">{:getIsProtect()}</jselect>
</td>
</tr>
</table>
</div>

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_EDIT}' />
</div>
</form>
</div>
</td>
</tr>
</table>
</body>
</html>
<load href="__RESFUN__/DateActive/WdatePicker.js" />
<include file="Public:pub_bottom" />