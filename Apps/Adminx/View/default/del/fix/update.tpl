<include file="Public:pub_top" />


</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>更新商品信息</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_purchase" />

<div id="basic-accordian" >



<div class="detail_headings BorderTop">
<div class="headingsLeft">编辑项目</div>
<div class="headingsRight"><span class="red">*号为必填项</span></div>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('purchasedetail/updateAction'))}">
<input type="hidden" id="iId" name="iId" value="{($vo.ItemId)}" /><!-- 产品ID Arr -->
<input type="hidden" id="iProIdArr" name="iProIdArr" /><!-- 产品ID Arr -->
<input type="hidden" id="iProNameArr" name="iProNameArr" /><!-- 产品名称 Arr -->
<input type="hidden" id="iBuyUserArr" name="iBuyUserArr" value="{($vo.ItemUserBuyGroup)},{($Think.session.ItemUserBuyUser)}" /><!-- 产品采购者 Arr -->
<input type="hidden" id="iUseUserArr" name="iUseUserArr" value="{($vo.ItemUserUseGroup)},{($Think.session.ItemUserUseUser)}" /><!-- 产品使用者 Arr -->

<div class="accordion_child">
<table class="listTable">

<if condition="$vo['ItemGroupArr'] eq ''">
<tr class="singleTr">
<td class="titleTd">产品选择方式：</td>
<td class="inputTd">
<div class="noPro">
此产品为手动填写商品，请尽快将此产品 <a href="#">添加到产品库</a>，以便为客户在下一次购买此产品带来便捷。
</div>
</td>
</tr>
</if>
<tr class="singleTr" id="proTr1">
<td class="titleTd">{($must)}选择产品：{(:HelpText("如果此商品为手动填写商品，需在产品库中添加产品后在这里更新产品选择，以方便日后的搜索统计。"))}</td>
<td class="inputTd"><select name="productSelect" id="productSelect"></select></td>
</tr>

<tr class="singleTr" id="proTr3">
<td class="titleTd">{($must)}产品单价：</td>
<td class="inputTd"><input type="text" id="iProPrice" name="iProPrice" class="input priceInput" value="{($vo.ItemPrice)}" /><!-- 产品价格 --><div id="priceInnerHtml"> 元</div></td>
</tr>


<tr class="singleTr">
<td class="titleTd">{($must)}采购数量：</td>
<td class="inputTd">
<a href="javascript:void(0)" class="numBut numButSub" onclick="ItemNumFun('sub')"></a>
<input type="text" class="input numInput" onclick="this.select()" maxlength="3" name="iNum" id="iNum" value="{($vo.ItemNum)}" />
<a href="javascript:void(0)" class="numBut numButAdd" onclick="ItemNumFun('add')"></a>
</td>
</tr>

<tr class="singleTr">
<td class="titleTd">{($must)}采购人：</td>
<td class="inputTd"><select name="buySelect" id="buySelect"></select></td>
</tr>

<tr class="singleTr">
<td class="titleTd">{($must)}使用者：</td>
<td class="inputTd"><select name="useSelect" id="useSelect"></select></td>
</tr>

<tr class="singleTr">
<td class="titleTd">出厂日期：{(:HelpText("请填写此产品的出厂日期，便于客户管理产品的使用年限。"))}</td>
<td class="inputTd"><input type="text" class="input dateInput" {($DateActive)} name="iDateMade" value="{($vo.ItemDateMade)}" /></td>
</tr>

<tr class="singleTr">
<td class="titleTd">DataOA备注：{(:HelpText("DataOA的备注，所有人可见"))}</td>
<td class="inputTd"><textarea name="iNoteVendor" class="noteTextarea">{($vo.ItemValiNoteVendor)}</textarea></td>
</tr>

<tr class="singleTr">
<td class="titleTd">私有备注{(:HelpText("DataOA私有备注，仅自己可见。"))}</td>
<td class="inputTd">
<a href="javascript:void(0)" class="noteDisplayBut" id="noteDis1" onclick="noteDisplay('show')">显示</a>
<a href="javascript:void(0)" class="noteDisplayBut" id="noteDis2" onclick="noteDisplay('hide')" style="display:none">隐藏</a>
<textarea name="iNotePrivate" id="iNotePrivate" class="noteTextarea" style="display:none">{($vo.ItemValiNotePrivate)}</textarea>
</td>
</tr>

<tr class="singleTr">
<td class="titleTd">客户备注信息：</td>
<td class="inputTd">
<div id="guestNote">

<if condition="$vo['ItemNoteBuy'] neq ''">
<strong>采购人（{($vo.ItemUserBuyUser|getUserName)}）备注：</strong>
<cite>{($vo.ItemNoteBuy)}</cite>
<div class="hr"></div>
</if>

<if condition="$vo['ItemValiNote3'] neq ''">
<strong>部门主管（{($vo.ItemValiName3)}）备注：</strong>
<cite>{($vo.ItemValiNote3)}</cite>
<div class="hr"></div>
</if>

<if condition="$vo['ItemValiNote2'] neq ''">
<strong>综合部（{($vo.ItemValiName2)}）备注：</strong>
<cite>{($vo.ItemValiNote2)}</cite>
<div class="hr"></div>
</if>

<if condition="$vo['ItemValiNote1'] neq ''">
<strong>综合部主管（{($vo.ItemValiName1)}）备注：</strong>
<cite>{($vo.ItemValiNote1)}</cite>
</if>

</div>
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
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-min.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-products.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-users.js"></script>
<script type="text/javascript" src="__RESFUN__/linkagesel/jquery.linkagesel-update.js"></script>
<script type="text/javascript">$(document).ready(linkageSelset({($vo.ItemUserBuyUser)},{($vo.ItemUserBuyGroup)},{($vo.ItemUserUseUser)},{($vo.ItemUserUseGroup)},'{($vo.ItemGroupArr)}'));</script>

<script type="text/javascript" src="__RESFUN__/DateActive/WdatePicker.js"></script>


<include file="Public:pub_bottom" />