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
<h1>{$Think.lang.PAGETITLE_PAGE_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Page:pub_funbut" />

<div id="basic-accordian" >
<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/insert">
<input type="hidden" name="type" value="page" />
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
<td class="titleTd">{$Think.lang.FIELD_SEO_DESCRIPT}</td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea"></textarea></td>
</tr>
<if condition="C('HIDE_FIELD.PAGE_ALIAS') neq 'true'">

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
<load href="__RESFUN__/DateActive/WdatePicker.js" />
<include file="Public:pub_bottom" />