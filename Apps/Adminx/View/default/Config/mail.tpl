<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Config:pub_sidebar" /></td>

<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_CONFIG_MAIL}</h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U(CONTROLLER_NAME.'/update_mail')}">
<input type="hidden" name="id" value="1" />

<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,2,'hover')" class="hover">{$Think.lang.TAB_BASIC}</li>
<li id="one2" onclick="setTab('one',2,2,'hover')" >{$Think.lang.TAB_SMTP_SETTING}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_COLLECT_ADDRESS}</td>
<td class="inputTd">
<input type="text" class="input" name="collect_address" value="{$vo.collect_address}" />
</td>
</tr>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_COLLECT_NAME}</td>
<td class="inputTd">
<input type="text" class="input" name="collect_name" value="{$vo.collect_name}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SUBJUECT}</td>
<td class="inputTd">
<input type="text" class="input" name="subjuect" value="{$vo.subjuect}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_GUESTNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="guestname" value="{$vo.guestname}" />
</td>
</tr>

</table>
</div><!-- Tab 1 End-->

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->
<table class="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_HOST}</td>
<td class="inputTd">
<input type="text" class="input" name="smtp_host" value="{$vo.smtp_host}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_PORT}</td>
<td class="inputTd">
<input type="text" class="input" name="smtp_port" value="{$vo.smtp_port}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_USERNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="smtp_username" value="{$vo.smtp_username}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_PASSWORD}</td>
<td class="inputTd">
<input type="password" class="input" name="smtp_password" value="{$vo.smtp_password}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_MAIL}</td>
<td class="inputTd">
<input type="text" class="input" name="smtp_mail" value="{$vo.smtp_mail}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_SSL}</td>
<td class="inputTd">
<jselect name="smtp_ssl" title="{:getState($vo['smtp_ssl'])}" value="{$vo.smtp_ssl}">{:getState()} </jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_MAIL_SMTP_AUTH}</td>
<td class="inputTd">
<jselect name="smtp_auth" title="{:getState($vo['smtp_auth'])}" value="{$vo.smtp_auth}">{:getState()} </jselect>
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