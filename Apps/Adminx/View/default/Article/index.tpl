<include file="Public:pub_top" />
</head>
<body>
{:W("Sidebar/sideCateTable")}
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Article:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_ARTICLE_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Article:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_ARTICLE_INDEX}</div>
<include file="Public:pub_searchform" />
</div>
<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" >
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_TITLE}</th>
<th>{$Think.lang.TH_PUB_DATE}</th>
<th>{$Think.lang.TH_CATE}</th>
<th>{$Think.lang.TH_DISPLAY}</th>
<th>{$Think.lang.TH_TOP}</th>
<th>{$Think.lang.TH_PROTECT}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td class="listTableCheckTd">
<input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' />
<input type="hidden" value="{$vo.id}" name="iId[]" id="iId" />
<input type="hidden" value="{$vo.isProtect}" name="protect_ID[]" id="protect_ID" />
</td>
<td>{$vo.id}</td>
<td><span class="{$vo.isTopColor}">{$vo.title}</span></td>
<td><a href="__URL__/index?date={$vo.pubDate}" title="{$Think.lang.TIP_TITLE_DATE}">{:forDate($vo['pubDate'],1,0)}</a></td>
<td><a href="__URL__/index?pid={$vo.pid}" title="{$Think.lang.TIP_TITLE_CATE}">{:getCateTitle($vo['pid'])}</a></td>
<td><a href="__URL__/index?hide={$vo.isHide}" title="{$Think.lang.TIP_TITLE_STATE}">{:getState($vo['isHide'],"hide")}</a></td>
<td><a href="__URL__/index?top={$vo.isTop}" title="{$Think.lang.TIP_TITLE_STATE}">{:getState($vo['isTop'],"top")}</a></td>
<td><a href="__URL__/index?top={$vo.isProtect}" title="{$Think.lang.TIP_TITLE_STATE}">{:getState($vo['isProtect'],"protect")}</a></td>
<td class='funTd'>
{:btn("edit",$key)}
{:btn("top",$key)}
{:btn("hide",$key)}
{:btn("recycle",$key)}
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
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("recycle,hide,top,protect")}</jselect>
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