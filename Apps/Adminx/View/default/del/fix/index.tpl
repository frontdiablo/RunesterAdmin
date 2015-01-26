<include file="Public:pub_top" />

</head>
<body onload="new Accordian('basic-accordian',2,'header_highlight');" >
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>管理维修订单</h1>
</div>




<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_fix" />

<div id="basic-accordian" >
<div id="accordian-info">
<span class="red">*</span> 列表中只显示60天内的维修记录，如果需查询更早的记录，请至 <a href="#" title="点击这里查询更早的记录信息">记录查询</a> 查询更多信息。
</div>


<div class="accordion_headings BorderTop">
<div class="headingsLeft">
60天内共提交了 <span class="blue">{($count)}</span> 个维修订单
</div>

<div class="clear"></div>
</div>
<div class="accordion_child">
<table class="listTable">
<tr>
<th>提问人</th>
<th>问题类型</th>
<th>提问日期</th>
<th>问题描述</th>

<th>状态</th>
<th>功能</th>
</tr>


<volist name="voi" id="voi">

<if condition="$i % 2 eq 0">
<assign name="TrStyle" value="singleTr" />
<else />
<assign name="TrStyle" value="doubleTr" />
</if>
<assign name="TotalPrice" value="$voi['ItemPrice'] * $voi['ItemNum']" />

<tr class='{($TrStyle)}'>
<td>{($voi.FixUser)}</td>
<td>{($voi.FixType)}</td>
<td>{($voi.FixDate)}</td>



<td>{(:msubstr(strip_char($voi['FixQuestion']),0,10))}</td>

<td>
<if condition="$voi['FixValidate'] eq 0">
<span class="graytext">未回复</span>
<elseif condition="$voi['FixValidate'] eq 1"/><span class="red">已回复</span>
<elseif condition="$voi['FixValidate'] eq 2"/><span class="blue">已完成</span>
</if>

</td>

<td class='funTd'>{(:getButton($voi['FixId']))}</td>
</tr>

</volist>

</table>
<div class='listTableBottom'>

<div class='bottomLeft'>
<!--
<input type='button' class='btn btnBlue' value='通过审核' />
<input type='button' class='btn btnRed' value='拒绝审核' />
-->



</div>

<div class='bottomRight'>
<div class="pages">{($page)}</div>
</div>
<div class='clear'></div>
</div>






















</div>



</div><!-- basic accordian End -->






</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />
<script type="text/javascript">var CB_ScriptDir='__RESFUN__/clearbox';</script>
<script type="text/javascript" src="__RESFUN__/clearbox/clearbox.js?config=shadow"></script>