<include file="Public:pub_top" />

<style type="text/css">
body{background:#f2f2f2;width:100%;overflow:hidden}
</style>
</head>
<body>




<div id="validatePageTitle">
<div id="title">问题完成</div>
</div>

<div id="validatewrapper">
<div id="valiInfoWrapper">

<table class="valiInfoTable">
<tr>
<td style="width:280px" >
<div class="valiInfo" style="width:auto;">
<div class="infoTitle">维修信息</div>
<div class="infoText">
<span class="title">问题分类：</span>{($vo.FixType)}<br />
<span class="title">提问日期：</span>{($vo.FixDate)}<br />
<span class="title">提问人：</span>{($vo.FixUser)}<br />
<span class="title">所属部门：</span>{($vo.FixUserGroup)}<br />
<span class="title">联系电话：</span>{($vo.FixPhone)}<br />
<span class="title">问题描述：</span>{(:msubstr(strip_char($vo['FixQuestion']),0,40))}<br />
</div>
</div>
</td>


<td class="deliveryTd">
<form enctype='multipart/form-data' method='POST' name='myform' id='myform' action='#'>
<input type='hidden' value='{($Think.session.AdminUserName)}' name='iName' />
<input type='hidden' value="{(:date('Y-m-d'))}" name='iDate' />

<table class="finishtable">
<tr>
<td class="titletd">分类</td>
<td>
<select name="iType">
<option value="0">-- 请选择 --</option>
{(:getProFirst($vo['FixType'],1))}
</select>
</td>
</tr>
<tr>
<td class="titletd">价格</td>
<td><input type="text" class="input numInput" style="width:50px" name="iPrice" value="{($vo['FixPrice'])}" /> 元</td>
</tr>
<tr>
<td class="titletd">标题</td>
<td><input type="text" class="input" name="iTitle" value="{($vo['FixTitle'])}" style="width:290px" /></td>
</tr>
<tr>
<td class="titletd">说明</td>
<td><textarea name="iNote" >{($vo['FixDeliverNote'])}</textarea></td>
</tr>
<tr>
<td class="titletd"></td>
<td><input type='button' class='btn3 Btn3Blue' style='margin:0' value='完成' onclick = "isDeliVery({($id)})" /></td>
</tr>
</table>




</form>
</td>
</tr>
</table>

</div>
</div>

</body>
</html>






<script type="text/javascript">
function isDeliVery(id){
if(confirm( "确定要执行本操作吗? ")){
    document.myform.action = "__URL__/FinishAction?&id="+id;
    document.myform.submit();
}
else return false;
}
</script>












<include file="Public:pub_bottom" />