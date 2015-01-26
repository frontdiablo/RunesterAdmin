<include file="Public:pub_top" />

</head>
<body onload="new Accordian('basic-accordian',2,'header_highlight');" >
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Enterprise:pub_sidebar_enterprise" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>用户管理</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_enterprise" />

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
<div class="headingsLeft">{($vo.GroupName)}</div>
<div class="clear"></div>
</div>
<div id="test{($i)}-content">  <div class="accordion_child">
<table class="listTable">
<tr>
<th>排序</th>
<th>姓名</th>
<th>职位</th>
<th>功能</th>
</tr>



{($vo.GroupId|getUsers)}
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