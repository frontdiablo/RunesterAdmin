<include file="Public:pub_top" />


</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="products:pub_sidebar_products" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>修改商品信息</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_products" />

<div id="basic-accordian" >



<div class="detail_headings BorderTop">
<div class="headingsLeft">修改商品信息</div>
<div class="headingsRight"><span class="red">*号为必填项</span></div>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('Productsdetail/ProUpdateAction'))}">
<input type="hidden" name="iId" value="{($vo.ProId)}" />
<div class="accordion_child">
<table class="listTable">
<tr class="singleTr">
<td class="titleTd">{($must)}所属分类</td>
<td class="inputTd">
<select name="iCategory">
<option value="">请选择所属分类</option>
{(:getProCategory($vo['ProPid']))}
</select>
</td>
</tr>


<tr class="singleTr">
<td class="titleTd">{($must)}产品名称</td>
<td class="inputTd">
<input type="text" class="input proInput" name="iName" value="{($vo.ProName)}" />
</td>
</tr>




<tr class="singleTr" id="proTr3">
<td class="titleTd">{($must)}产品单价：</td>
<td class="inputTd"><input type="text" class="input priceInput" name="iPrice" value="{($vo.ProPrice)}" /> 元</td>
</tr>


<tr class="singleTr">
<td class="titleTd">{($must)}单位：</td>
<td class="inputTd">
{(:getProUnits($vo['ProUnits']))}

</td>
</tr>

</table>

<div class="listTableBottom">
<input type="submit" value="提交" class="btn btnBlue" />
</div>
</div>
{(:FormToken())}
</form>

</div><!-- basic accordian End -->






</td>
</tr>

</table>

</body>
</html>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-min.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-products.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-users.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-add.js"></script>
<script type="text/javascript">$(document).ready(linkageSelset({($Think.session.AdminGroup)},{($Think.session.AdminId)}));</script>
<include file="Public:pub_bottom" />