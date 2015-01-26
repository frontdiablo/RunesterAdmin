<include file="Public:pub_top" />

<style type="text/css">
body{background:#f2f2f2;width:100%;overflow:hidden}
</style>
</head>
<body>




<div id="validatePageTitle">
<div id="title">审核项目</div>
</div>

<div id="validatewrapper">


<div id="valiInfoWrapper">

<table class="valiInfoTable">
<tr>
<td>
<div class="valiInfo">
<div class="infoTitle">采购信息</div>
<div class="infoText">
<span class="title">物品名称：</span>{($vo.ItemName)}<br />
<span class="title">物品类别：</span>{($vo.ItemGroupName)}<br />
<span class="title">采购数量：</span>{($vo.ItemNum)}<br />
<span class="title">单　　价：</span>{($vo.ItemPrice)} 元<br />
<span class="title">采 购 人：</span>[{(:getGroupName($vo['ItemUserBuyGroup']))}] {(:getUserName($vo['ItemUserBuyUser']))}<br />
<span class="title">使 用 者：</span>[{(:getGroupName($vo['ItemUserUseGroup']))}] {(:getUserName($vo['ItemUserUseUser']))}<br />
<span class="title">采购日期：</span>{(:CDate($vo['ItemDateBuy']))}<br />
<span class="title">备　　注：</span><a href="#" title="{($vo['ItemNoteBuy'])}">指向查看备注</a>
</div>
</div>
</td>

<for start="1" end="$vo['ValiCount']+1" step="1" >
<td>
<div class="valiInfo">
<div class="infoTitle">审核信息</div>
<div class="infoText">


<span class="title">审核状态：</span>



<php>echo getState($vo['ValiName'.$i],$vo['ItemValidate'],$i)</php>


<br />



<span class="title">审 核 人：</span><php>echo $vo['ValiName'.$i]</php><br />
<span class="title">审核权限：</span><php>echo getValiName($vo['ValiName'.$i])</php><br />
<span class="title">审核日期：</span><php>echo CDate($vo['ValiDate'.$i])</php><br />
<span class="title">备　　注：</span><php>echo $vo['ValiNote'.$i]</php>
</div>
</div>
</td>
</for>

<td>
<div class="valiInfo">
<div class="infoTitle">发货信息</div>
<div class="infoText">
<span class="title">发货状态：</span>{($vo.ItemDeliveryState|getDeliveryState)}<br />
<span class="title">送 货 人：</span>{($vo.ItemDeliveryName)}<br />
<span class="title">送达日期：</span>{($vo.ItemDeliveryDate|CDate)}<br />
<span class="title">备　　注：</span>{($vo.ItemNoteVendor)}
</div>
</div>
</td>



</tr>

</table>



</div>

<div class="separate"></div>


<div id="flowWrapper">
<table class="flowTable">
<tr>
<td class="flowTd head"><span class="green">提交成功</span></td>
{(:ValiStateBar($vo))}

</tr>
</table>
</div>

{(:getValiBut($vo['ItemValidate'],$vo['ItemId']))}

</div>


</td>
</tr>

</table>

</body>
</html>






<script type="text/javascript">
function valiPost(id,state){
if(confirm( "确定要执行本操作吗? ")){
    document.myform.action = "__URL__/validateAction?state="+state+"&id="+id;
    document.myform.submit();
}
else return false;
}
</script>












<include file="Public:pub_bottom" />