<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_IM_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Im:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" value="{$vo.id}" name="id" />
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_BASIC}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->
<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_NAME}</td>
<td class="inputTd">
<input type="text" class="input" name="name" value="{$vo.name}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TYPE}</td>
<td class="inputTd">
<jselect name="type" title="{:getCateTitle($vo['type'])}" value="{$vo.type}">{:getCate("Im")}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_DESCRIPTION}</td>
<td class="inputTd"><input type="text" class="input urlInput" name="description" value="{$vo.description}" /></td>
</tr>s
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CODE}</td>
<td class="inputTd">
<textarea name="url" class="noteTextarea resizenone">{$vo.url}</textarea>
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
<include file="Public:pub_bottom" />