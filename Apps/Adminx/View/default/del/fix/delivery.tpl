<include file="Public:pub_top" />

<style type="text/css">
body{background:#f2f2f2;width:100%;overflow:hidden}
</style>
</head>
<body>




<div id="validatePageTitle">
<div id="title">问题回复</div>
</div>

<div id="validatewrapper">

<div class="valiInfo" style="width:auto;float:none">
<div class="infoTitle">维修信息</div>
<div class="infoText" style="height:150px;overflow:auto;">
<span class="title">问题分类：</span>{($vo.FixType)}<br />
<span class="title">提问日期：</span>{($vo.FixDate)}<br />
<span class="title">提问人：</span>{($vo.FixUser)}<br />
<span class="title">所属部门：</span>{($vo.FixUserGroup)}<br />
<span class="title">联系电话：</span>{($vo.FixPhone)}<br />
<span class="title">问题描述：</span>{($vo.FixQuestion)}<br />
</div>
</div>




<form enctype='multipart/form-data' method='POST' name='myform' id='myform' action='{(:U('Fix/DeliveryAction?id='.$id))}'>
<div class="valiInfo" style="width:auto;margin-top:10px;height:240px">
<div class="infoTitle">DATAOA回复</div>

<input type='hidden' value='{($Think.session.AdminUserName)}' name='iName' />
<input type='hidden' value="{(:date('Y-m-d'))}" name='iDate' />
<textarea name="iContent" style="display:none">{($vo.FixDeliverNote)}</textarea>




</div>
<input type='submit' class='btn3 Btn3Blue' style='margin-top:10px' value='回复'  />
</form>



</div>

</body>
</html>






<script type="text/javascript">
function isDeliVery(id){
if(confirm( "确定要执行本操作吗? ")){
    document.myform.action = ;
    document.myform.submit();
}
else return false;
}
</script>


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
width : '1166',
height : '200',
filterMode : true,
newlineTag : 'p'
});
});
</script>