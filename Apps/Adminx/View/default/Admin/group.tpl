<include file="Public:pub_top" />

</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_ADMIN_GROUP_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_ADMIN_GROUP_INDEX}</div>
<div class="clear"></div>
</div>

{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="javascript:void(0)" onsubmit='formSubmit("__URL__/sort")' >
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_NAME}</th>
<th>{$Think.lang.TH_STATE}</th>
<th>{$Think.lang.TH_DESCRIPTION}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td>{$vo.title}</span></td>
<td>{:getStateTitle($vo['status'],"status")}</td>
<td>{$vo.description}</td>

<td class='funTd'>
{:btn("auth",$key)}
{:btn("status",$key)}
{:btn("edit",$key)}
{:btn("delete",$key)}
</td>
</tr>
</volist>
</table>
<div class='listTableBottom'>


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