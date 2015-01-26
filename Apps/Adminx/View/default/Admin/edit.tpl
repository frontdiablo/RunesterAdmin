<include file="Public:pub_top" />
<script type="text/javascript" src="__RESFUN__/layer/layer.min.js"></script>
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<script type="text/javascript">
$(function(){
$('#headedit').on('click', function(){
var i = $.layer({
	type : 2,
	title : false,
	border : [5, 0.5, '#666', true],
	offset : ['100px',''],
	area : ['820px','410px'],
	iframe: {src: '__URL__/pub_headeidt'}
});
});
});
</script>



</head>
<body>

<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_ADMIN_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" value="{$vo.id}" name="id" />
<div class="TabTitle">
<ul>
<li id="one1" class="hover" onclick="setTab('one',1,2,'hover')">{$Think.lang.TAB_USER_INFO}</li>
<li id="one2" onclick="setTab('one',2,2,'hover')" >{$Think.lang.TAB_USER_PASSWORD}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$Think.lang.FIELD_HEAD}</td>
<td class="inputTd">
<a href="javascript:void(0)" id="headedit" title="点击修改头像"><img src="/__UPLOADIMG__/head/{$vo.head}" width="48px" height="48px"/></a>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_USERNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="username" value="{$vo.username}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_NICKNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="nickname" value="{$vo.nickname}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_USER_GROUP}</td>
<td class="inputTd">


<jselect name="group_id[]" id="group_id_0" title="{:getAdminGroup($vo['id'])}" value="{:getAdminGroupAccessId($vo['id'])}">{:getAdminGroup()}</jselect>

</td>
</tr>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">

<jselect name="status" title="{:getState($vo['status'])}" value="$vo['status']">{:getState()}</jselect>
</td>
</tr>
</table>
</div>
<div id="con_one_2" style="display:none">
<!-- Tab 2 -->
<table class="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_OLD}<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
<input type="password" class="input" name="pw_old" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_NEW}<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
<input type="password" class="input" name="pw_new" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_RE}<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
<input type="password" class="input" name="pw_renew" />
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
