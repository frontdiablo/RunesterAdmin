<include file="Public:pub_top" />

</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>信息管理</h1></div>
<div id="pageTitleBottom"></div>
<include file="Article:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$cateTitle}</div>
<include file="Public:pub_searchform" />
</div>
<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" >
<div class="accordion_child">
<table class="listTable">
<tr>

<th>标题</th>
<th>排序</th>
<th>功能</th>
</tr>
{:getArticleCteTable()}
</table>

<div class='listTableBottom'>

<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"   name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<input type='button' class='btn btnRed' value='删除选定' onclick='formConfirm("__URL__/recycle_multi?state=0","确定要删除选定的内容吗？")' />

</td>
</tr>
</table>
</div>

<div class='bottomRight'>
<div class="pages">{$page}</div>
</div>
<div class='clear'></div>
</div>

</div>





</form>
{/* 信息表 结束 */}









</td>
</tr>
</table>
























</body>
</html>

<include file="Public:pub_bottom" />