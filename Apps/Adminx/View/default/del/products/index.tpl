<include file="Public:pub_top" />

</head>
<body onload="new Accordian('basic-accordian',2,'header_highlight');" >
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="products:pub_sidebar_products" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>商品管理</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_products" />

<div id="basic-accordian" >




<volist name="vo" id="vo">

<if condition="$i eq 1">
<assign name="BorderTop" value="BorderTop" />
<assign name="header_highlight" value="header_highlight" />
<else />
<assign name="BorderTop" value="" />
<assign name="header_highlight" value="" />
</if>
<div id="test{($i)}-header" class="accordion_headings {($BorderTop)} {($header_highlight)}">
<div class="headingsLeft">{($vo.ProName)}</div>
<div class="headingsRight"><a href="javascript:history.go(-1)" class="backBut" title="返回"></a></div>
<div class="clear"></div>
</div>
<div id="test{($i)}-content">  <div class="accordion_child">
<table class="listTable">
<tr>
<th>排序</th>
<th>名称</th>
<th>价格</th>
<th>功能</th>
</tr>



{(:getProducts($vo['ProId']))}
</table>


<div class="listTableBottom">
<div class="bottomRight"></div>
<div class="clear"></div>
</div>
</div></div>
</volist>


</div><!-- basic accordian End -->






</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />
