<include file="Public:pub_top" />
<script type="text/javascript">
$(function(){
	//生成侧边栏select
	$.divselect("#iType","#admin_type");
	$.divselect("#iProtect","#admin_isProtect");
});
</script>
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
<div class="TabTitle">
<ul>
<li id="one1" class="hover" onclick="setTab('one',1,3,'hover')">{$Think.lang.TAB_USER_INFO}</li>
<li id="one2" onclick="setTab('one',2,3,'hover')">{$Think.lang.TAB_USER_PERMISSION}</li>
<li id="one3" onclick="setTab('one',3,3,'hover')">{$Think.lang.TAB_USER_PASSWORD}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$Think.lang.FIELD_HEAD}</td>
<td class="inputTd">
<a href="javascript:void(0)" id="headedit" title="点击修改头像"><img src="__UPLOADIMG__/head/{$vo.admin_head}" width="48px" height="48px"/></a>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_USERNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="admin_username" value="{$vo.admin_username}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_NICKNAME}</td>
<td class="inputTd">
<input type="text" class="input" name="admin_nickname" value="{$vo.admin_nickname}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TYPE}</td>
<td class="inputTd">
<div id="iType" class="dropdown" tabindex="0">  
<p>{:getAdminTypeText($vo['admin_type'])}</p>  
<ul id="cateAdd_category_root">  
{:getAdminType()} 
</ul>
</div>
<input type="hidden" id="admin_type" name="admin_type" value="{$vo.admin_type}" />
</td>
</tr>
</table>
</div>
<div id="con_one_2" style="display:none">
<!-- Tab 2 -->
<table class="listTable">
<tr>
<td class="titleTd">{$must}测试<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
this is qpxian
</td>
</tr>

</table>
</div>
<div id="con_one_3" style="display:none">
<!-- Tab 3 -->
<table class="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_NEW}<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
<input type="text" class="input" name="pw_new" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PASSWORD_RE}<tip text="{$Think.lang.TIP_MODIFY_PASSWORD}" /></td>
<td class="inputTd">
<input type="text" class="input" name="pw_renew" />
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
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
<load href="__RESFUN__/editor/lang/zh_CN.js" />
<script type="text/javascript">
KindEditor.ready(function(K) {
	var editor = K.editor({
		allowFileManager : true
	});
	K('#iPic').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				imageUrl : K('#pic').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#pic').val(url);
					editor.hideDialog();
				}
			});
		});
	});
});
</script>
<include file="Public:pub_bottom" />