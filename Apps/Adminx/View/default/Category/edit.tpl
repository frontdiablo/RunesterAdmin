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
<h1>{$Think.lang.PAGETITLE_CATEGORY_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Article:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" name="id" value="{$vo.id}" />
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_BASIC}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="title" value="{$vo.title}" />
<colorpicker name="titleColor" value="{$vo.titleColor}"/>
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_ALIAS}</td>
<td class="inputTd">
<input type="text" class="input" name="alias" value="{$vo.alias}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">
<jselect name="pid" title="{:getCateTitle($vo['pid'])}" value="{$vo['pid']}">{:getCate("Article")}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_DATE}</td>
<td class="inputTd">
<input type="text" class="input dateInput" name="pubDate" value="{$vo.pubDate}" {$DateActive} />
</td>
</tr>
<tr>
<td class="titleTd">信息：</td>
<td class="inputTd">
文章出处：<input type="text" class="input" name="source" value="{$vo.source}" />
&#12288;&#12288;发布者：<input type="text" class="input dateInput" name="author" value="{$vo.author}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">
{$Think.lang.FIELD_TARGET}
<jselect name="target" title="{:getTarget($vo['target'])}" value="{$vo['target']}">{:getTarget()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_TOP}
<jselect name="isTop" title="{:getIsTop($vo['isTop'])}" value="{$vo['isTop']}">{:getIsTop()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_HIDE}
<jselect name="isHide" title="{:getIsHide($vo['isHide'])}" value="{$vo['isHide']}">{:getIsHide()}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_DESCRIPTION}</td>
<td class="inputTd"><textarea name="description" class="noteTextarea resizenone" >{$vo.description}</textarea></td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CONTENT}</td>
<td class="inputTd"><editor name="content">{$vo.content}</editor></td>
</tr>
</table>
</div>


<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='完成' />
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