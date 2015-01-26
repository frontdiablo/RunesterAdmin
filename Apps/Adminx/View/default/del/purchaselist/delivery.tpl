<include file="Public:pub_top" />

<style type="text/css">
body{background:#f2f2f2;width:100%;overflow:hidden}
</style>
</head>
<body>




<div id="validatePageTitle">
<div id="title">商品送达</div>
</div>

<div id="validatewrapper">
<div id="valiInfoWrapper">

<table class="valiInfoTable">
<tr>
<td style="width:280px" >
<div class="valiInfo" style="width:auto;">
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


<td class="deliveryTd">
<form enctype='multipart/form-data' method='POST' name='myform' id='myform' action='#'>
<input type='hidden' value='{($Think.session.AdminUserName)}' name='iName' />
<input type='hidden' value="{(:date('Y-m-d'))}" name='iDate' />
<textarea id='iNotePub' name='iNotePub' >如果您对该商品有公有备注说明，请在这里输入。</textarea>
<textarea id='iNotePri' name='iNotePri' >如果您对该商品有私有备注说明，请在这里输入。</textarea>
<input type='button' class='btn3 Btn3Blue' style='margin:0' value='送达' onclick = "isDeliVery({($id)})" />
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
    document.myform.action = "__URL__/DeliveryAction?&id="+id;
    document.myform.submit();
}
else return false;
}
</script>












<include file="Public:pub_bottom" />