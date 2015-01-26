<include file="Public:pub_top" />

</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Adv:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_ADV_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Adv:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_ADV_INDEX}</div>
<div class="clear"></div>
</div>

{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="" >
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_PIC}</th>
<th>{$Think.lang.TH_TITLE}</th>
<th>{$Think.lang.TH_AREA}</th>
<th>{$Think.lang.TH_DISPLAY}</th>
<th>{$Think.lang.TH_SORT}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td class="listTableCheckTd">
<input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' />
<input type="hidden" value="{$vo.id}" name='iId[]' />
<input type="hidden" value="{$vo.isProtect}" name="protect_ID[]" id="{$vo.id}" />
</td>
<td>{$vo.id}</td>
<td class="thumbTd">{$vo.content}</td>
<td><span class="{$vo.isTopColor}">{$vo.title}</span></td>
<td><a href="__URL__/index?pid={$vo.type}" title="{$Think.lang.TIP_TITLE_STATE}">{:getCateTitle($vo['type'])}</a></td>
<td><a href="__URL__/index?hide={$vo.isHide}" title="{$Think.lang.TIP_TITLE_STATE}">{:getStateTitle($vo['isHide'],"hide")}</a></td>
<td>
<input type="text" class="input SortInput" value="{$vo.sort}" onclick="this.select();" name="iSort[]" id="iSort" />
</td>
<td class='funTd'>
{:btn("edit",$key)}
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
<td class="listTableCheckTd"><input id="select_all" name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("sort,hide,recycle")}</jselect>
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