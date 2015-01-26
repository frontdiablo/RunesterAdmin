<include file="Public:pub_top" />
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Config:pub_sidebar" /></td>

<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_CONFIG_WEB}</h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U(CONTROLLER_NAME.'/update_home')}">
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_BASIC}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<volist name="vo" id="vo">
<tr>
<td class="titleTd">{$vo.name}</td>
<td class="inputTd">
<input type="text" class="input" value="{$vo.name}" name="name[]" />
<input type="text" class="input" value="{$vo.alias}" name="alias_{$key}" /><br /><br />
<editor name="content_{$key}" height="140">{$vo.content}</editor>
</td>
</tr>
</volist>
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