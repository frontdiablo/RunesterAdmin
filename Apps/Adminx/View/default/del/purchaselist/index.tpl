<include file="Public:pub_top" />

</head>
<body onload="new Accordian('basic-accordian',2,'header_highlight');" >
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>管理商品</h1>
</div>




<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_purchase" />

<div id="basic-accordian" >
<div id="accordian-info">
<span class="red">*</span> 列表中只显示60天内的采购项目，如果需查询更早的记录，请至 <a href="#" title="点击这里查询更早的记录信息">记录查询</a> 查询更多信息。
</div>

<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('purchaselist/excel_output'))}">
<div class="accordion_headings BorderTop">
<div class="headingsLeft">
60天内共采购了 <span class="blue">{($count)}</span> 个商品
</div>

<div class="clear"></div>
</div>
<div class="accordion_child">
<table class="listTable">
<tr>
<th>选择</th>
<th>名称</th>
<th>类型</th>
<th>数量</th>
<th>总价</th>
<th>采购日期</th>
<th>采购人</th>
<th>备注</th>
<th>审核状态</th>
<th>功能</th>
</tr>


<volist name="voi" id="voi">

<if condition="$i % 2 eq 0">
<assign name="TrStyle" value="singleTr" />
<else />
<assign name="TrStyle" value="doubleTr" />
</if>
<assign name="TotalPrice" value="$voi['ItemPrice'] * $voi['ItemNum']" />

<tr class='{($TrStyle)}' onmouseover="overbgcolor('product_{($i)}_1')" onmouseout="outbgcolor('product_{($i)}_1')">
<td class="listTableCheckTd"><input type="checkbox" value="{($voi.ItemId)}" name='artical_ID[]' id='artical_ID' /></td>
<td>{($voi.ItemName)}</td>
<td>{($voi.ItemGroupName)}</td>
<td>{($voi.ItemNum)}</td>
<td>{($TotalPrice)}</td>
<td>{(:CDate($voi['ItemDateBuy']))}</td>
<td>{(:getUserName($voi['ItemUserBuyUser']))}</td>
<td>{(:getNode($voi['ItemNoteBuy'],$voi['ItemNoteVali1'],$voi['ItemNoteVali2'],$voi['ItemNoteVali3'],$voi['ItemNoteVali4'],$voi['ItemNoteVendor']))}</td>
<td>{(:getValiState($voi['ValiCount'],$voi['ItemValidate'],$voi['ItemDeliveryState']))}</td>
<td class='funTd'>{(:getButton($voi['ItemId'],$voi['ItemUserBuyUser'],$voi['ItemValidate'],$voi['ValiCount']))}</td>
</tr>

</volist>

</table>
<div class='listTableBottom'>

<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"   name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td><input type='submit' class='btn btnBlue' value='打印所选' /></td>
</tr>
</table>
</div>

<div class='bottomRight'>
<div class="pages">{($page)}</div>
</div>
<div class='clear'></div>
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
<script type="text/javascript">var CB_ScriptDir='__RESFUN__/clearbox';</script>
<script type="text/javascript" src="__RESFUN__/clearbox/clearbox.js?config=shadow"></script>