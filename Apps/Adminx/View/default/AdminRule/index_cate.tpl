<include file="Public:pub_top" />
</head>
<body >
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="AdminRule:pub_sidebar_cate" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_AUTH_NODE_CATE_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="AdminRule:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_RULE_GROUP_INDEX}</div>

<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="javascript:void(0)" onsubmit='formSubmit("__URL__/sort")' >

<div class="accordion_child">

<table class="listTable">
<tr>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_GROUP_NAME}</th>
<th>{$Think.lang.TH_GROUP_IDIFY}</th>
<th>{$Think.lang.TH_CATE}</th>
<th>{$Think.lang.TH_MODULE}</th>
<th>{$Think.lang.TH_SORT}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>

<volist name="volist" id="vo">
	<tr>
	<td>{$vo.id}<input type="hidden" value="{$vo.id}" name="iId[]" id="iId" /></td>
	<td>{$vo.title}</td>
	<td>{$vo.controller}</td>
	<td><a href="__URL__/index?pid={$vo.pid}">{:getRuleLevel($vo['pid'])}</a></td>
	<td><a href="__URL__/index?module={$vo.module}">{$vo.module}</a></td>
	<td><input type="text" class="input SortInput" value="{$vo.sort}" onclick="this.select();" name="iSort[]" id="iSort" /></td>
	<td class='funTd'>
	{:btn("edit",$key)}
	{:btn("delete",$key)}
	</td>
	</tr>
</volist>


</table>
<div class='listTableBottom'>

<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("sort")}</jselect>
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

</div>{/* basic accordian End */}
</td>
</tr>
</table>
</body>
</html>
<include file="Public:pub_bottom" />