<include file="Public:pub_top" />


</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>提交新维修</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_fix" />

<div id="basic-accordian" >



<div class="detail_headings BorderTop">
<div class="headingsLeft">提交您的问题</div>
<div class="headingsRight"><span class="red">*号为必填项</span></div>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('Fix/AddAction'))}">

<input type="hidden" id="iName" name="iName" value="{($Think.session.AdminUserName)}" /><!-- 权限 -->
<input type="hidden" id="iGroup" name="iGroup" value="{($GroupName)}" /><!-- 权限 -->
<input type="hidden" id="iValidate" name="iValidate" value="0" /><!-- 权限 -->
<div class="accordion_child">
<table class="listTable">


<tr class="singleTr">
<td class="titleTd">{($must)}问题分类：</td>
<td class="inputTd">
<select name="iType">
<option value="0">-- 请选择 --</option>
{(:getProFirst(0,1))}
</select>
</td>
</tr>


<tr class="singleTr">
<td class="titleTd">{($must)}问题描述：{(:HelpText("请详细描述您的问题"))}</td>
<td class="inputTd">
<textarea name="iContent" style="visibility:hidden;"></textarea>
</td>
</tr>

<tr class="singleTr">
<td class="titleTd">{($must)}联系电话：{(:HelpText("建议留下您的联系方式，如果问题较复杂，需要即时交流"))}</td>
<td class="inputTd">
<input type="text" class="input" name="iPhone" value="{($Think.session.AdminPhone)}" />
</td>
</tr>

</table>


<div class="listTableBottom">
<input type="submit" value="提交" class="btn btnBlue" />
</div>
</div>

</form>

</div><!-- basic accordian End -->






</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
<load href="__RESFUN__/editor/lang/zh_CN.js" />
<script language="javascript">
KindEditor.ready(function(K) {
var editor = K.editor({
allowFileManager : false
});
var editor1 = K.create('textarea[name="iContent"]', {
themeType : 'simple',
uploadJson : '__RESFUN__/editor/php/upload_json.php',
fileManagerJson : '__RESFUN__/editor/php/file_manager_json.php',
items : ['forecolor','bold','|','justifyleft', 'justifycenter', 'justifyright','|','image'],
allowFileManager : false,
width : '700',
height : '400',
filterMode : true,
newlineTag : 'p'
});
});
</script>
