<include file="Public:pub_top" />


</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>采购新商品</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_purchase" />

<div id="basic-accordian" >



<div class="detail_headings BorderTop">
<div class="headingsLeft">添加新项目</div>
<div class="headingsRight"><span class="red">*号为必填项</span></div>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('purchasedetail/AddAction'))}">
<input type="hidden" id="iProIdArr" name="iProIdArr" /><!-- 产品ID Arr -->
<input type="hidden" id="iProNameArr" name="iProNameArr" /><!-- 产品名称 Arr -->
<input type="hidden" id="iProPrice" name="iProPrice" /><!-- 产品价格 -->

<input type="hidden" id="iBuyUserArr" name="iBuyUserArr" value="{($Think.session.AdminGroup)},{($Think.session.AdminId)}" /><!-- 产品采购者 Arr -->

<input type="hidden" id="iUseUserArr" name="iUseUserArr" /><!-- 产品使用者 Arr -->
<input type="hidden" id="iValidate" name="iValidate" value="{($Think.session.TypeValidate)}" /><!-- 权限 -->
<input type="hidden" id="iBuyDate" name="iBuyDate" value="{(:date('Y-m-d'))}" /><!-- 购买日期 -->


<div class="accordion_child">
<table class="listTable">
<tr class="singleTr">
<td class="titleTd">{($must)}产品选择方式：</td>
<td class="inputTd"><input type="radio" value="0" name="ProCheck" id="ProCheck1" checked="checked" onclick="itemCheck()" /><label for="ProCheck1"> 自动选择产品</label>&#12288;&#12288;<input type="radio" value="1" name="ProCheck" id="ProCheck2" onclick="itemCheck()" /><label for="ProCheck2">手动填写产品</label></td>
</tr>

<tr class="singleTr" id="proTr1">
<td class="titleTd">{($must)}自动选择：</td>
<td class="inputTd"><select name="productSelect" id="productSelect"></select></td>
</tr>

<tr class="singleTr" id="proTr2" style="display:none">
<td class="titleTd">{($must)}手动填写：{(:HelpText("如果商品列表中没有找到您所需要的物品，请在此处填写。我们会尽快添加到商品列表中。"))}</td>
<td class="inputTd">
<select name="iManualSelect">
<option value="">请选择产品大类</option>
<volist name="pvo" id="pvo">
<option value="{($pvo.ProId)},{($pvo.ProName)}">{($pvo.ProName)}</option>
</volist>
</select>
<input type="text" class="input proInput" name="iManualText" />
</td>
</tr>

<tr class="singleTr" id="proTr3">
<td class="titleTd">产品单价：</td>
<td class="inputTd"><div id="priceInnerHtml">请选择产品</div></td>
</tr>


<tr class="singleTr">
<td class="titleTd">{($must)}采购数量：</td>
<td class="inputTd">
<a href="javascript:void(0)" class="numBut numButSub" onclick="ItemNumFun('sub')"></a>
<input type="text" class="input numInput" value="1" onclick="this.select()" maxlength="3" name="iNum" id="iNum" />
<a href="javascript:void(0)" class="numBut numButAdd" onclick="ItemNumFun('add')"></a>
</td>
</tr>



<tr class="singleTr">
<td class="titleTd">{($must)}使用者：{(:HelpText("如果您是帮他人采购，请在这里选择他的姓名。"))}</td>
<td class="inputTd"><select name="UseSelect" id="UseSelect"></select></td>
</tr>

<tr class="singleTr">
<td class="titleTd">备注：{(:HelpText("上级审核领导可见，填写详细的备注信息可增加审核通过的机率。"))}</td>
<td class="inputTd"><textarea name="iNoteBuy" class="noteTextarea"></textarea></td>
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
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-min.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-products.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-users.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-add.js"></script>
<script type="text/javascript">$(document).ready(linkageSelset({($Think.session.AdminGroup)},{($Think.session.AdminId)}));</script>
<include file="Public:pub_bottom" />