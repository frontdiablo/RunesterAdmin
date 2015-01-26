<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Favorite:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_Favorite_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Favorite:pub_funbut" />

<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="">
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_FAVORITE_INDEX}</div>
<div class="clear"></div>
</div>

{/* 信息表 开始 */}

<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_NAME}</th>
<th>{$Think.lang.TH_URL}</th>
<th>{$Think.lang.TH_CATE}</th>
<th>{$Think.lang.TH_SORT}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td class="listTableCheckTd"><input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' /></td>
<td>{$vo.name}</td>
<td><a href="http://{$vo.url}" target="_blank" title="{$Think.lang.TIP_TITLE_CLICK}">{$vo.url}</a></td>
<td><a href="__URL__/index?type={$vo.type}" title="{$Think.lang.TIP_TITLE_CATE}">{:getCateTitle($vo['type'])}</a></td>
<td>
<input type="text" class="input SortInput" value="{$vo.sort}" onclick="this.select();" name="iSort[]" id="iSort" />
<input type="hidden" value="{$vo.id}" name="iId[]" id="iId" />
</td>
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
<td class="listTableCheckTd"><input id="select_all"   name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("sort,delete")}</jselect>
</td>
</tr>
</table>
</div>
<div class='clear'></div>
</div>

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