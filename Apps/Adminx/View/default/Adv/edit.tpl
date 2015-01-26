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
<h1>{$Think.lang.PAGETITLE_ADV_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Adv:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" id="id" name="id" value="{$vo.id}" />
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
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_AREA}</td>
<td class="inputTd">
<jselect name="type" title="{:getCateTitle($vo['type'])}" value="{$vo.type}">{:getCate("Adv")}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_HIDE}</td>
<td class="inputTd">
<jselect name="isHide" title="{:getIsHide($vo['isHide'])}" value="{$vo.isHide}">{:getIsHide()}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_CONTENT}</td>
<td class="inputTd"><editor name="content" height="200">{$vo.content}</editor></td>
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
<include file="Public:pub_bottom" />