<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_ADMIN_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/insert">
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_USER_INFO}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_USERNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="username" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_NICKNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="nickname" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD}</td>
<td class="inputTd">
<input type="password" class="input" name="password" maxlength="20" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_RE}</td>
<td class="inputTd">
<input type="password" class="input" name="repassword" maxlength="20" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_USER_GROUP}</td>
<td class="inputTd">
<jselect name="group_id[]" id="group_id_0" title="请选择用户组" value="">{:getAdminGroup()}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">
<jselect name="status" title="{:getState(1)}" value="1">{:getState()}</jselect>
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