<include file="Public:pub_top" />
</head>
<body >
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Guestbook:pub_sidebar_shortcut" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_PAGE_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Guestbook:pub_funbut" />
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_PAGE_INDEX}</div>
<include file="Public:pub_searchform" />
</div>
<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform">
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_DESCRIPTION}</th>
<th>{$Think.lang.TH_SORT}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="vo" id="vo">
<tr>
<td class="listTableCheckTd">
	<input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' />
	<input type="hidden" value="{$vo.id}" name='iId[]' />
	<input type="hidden" value="{$vo.isProtect}" name="protect_ID[]" id="{$vo.id}" />
</td>
<td>{$vo.id}</td>
<td>{$vo.content}</td>
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
<td class="listTableCheckTd"><input id="select_all" name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("sort,recycle")}</jselect>
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