<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_IM_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Im:pub_funbut" />

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
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="name" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TYPE}</td>
<td class="inputTd">
<jselect name="type" title="请选择号码类型" value="">{:getCate("Im")}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_DESCRIPTION}</td>
<td class="inputTd"><input type="text" class="input urlInput" name="description" /></td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_CODE}</td>
<td class="inputTd">
<textarea name="url" class="noteTextarea resizenone"></textarea>
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