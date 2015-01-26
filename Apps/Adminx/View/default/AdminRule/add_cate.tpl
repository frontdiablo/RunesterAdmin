<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_AUTH_NODE_CATE_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="AdminRule:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/insert">
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_NODE_INFO_GROUP}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_IDIFY}</td>
<td class="inputTd">
<input type="text" class="input" name="controller" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_NAME}</td>
<td class="inputTd">
<input type="text" class="input" name="title" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">
<jselect name="level" title="根分类" value="1" class="multi_ul">{:getRuleLevel()}</jselect>
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