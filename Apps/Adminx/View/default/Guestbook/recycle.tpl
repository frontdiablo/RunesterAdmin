<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_PAGE_RECYCLE}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Page:pub_funbut" />

<div id="basic-accordian" >
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="">
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_PAGE_RECYCLE}</div>
<div class="clear"></div>
</div>
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_TITLE}</th>
<th>{$Think.lang.TH_CATE}</th>
<th>{$Think.lang.TH_DEL_DATE}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td class="listTableCheckTd">
<input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' />
<input type="hidden" value="{$vo.id}" name='iId[]'/>
<input type="hidden" value="{$vo.isProtect}" name="protect_ID[]" id="protect_ID" />
</td>
<td>{$vo.title}</td>
<td><a href="__URL__/recyclebin?pid={$vo.pid}" title="{$Think.lang.TIP_TITLE_CATE}">{:getCateTitle($vo['pid'])}</a></td>
<td>{:forDate($vo['delDate'])}</td>
<td class='funTd'>
{:btn("restore",$key)}
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
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("restore,delete,empty")}</jselect>
</td>
</tr>
</table>
</div>
<div class='bottomRight'>
<div class="pages">{$page}</div>
</div>
<div class='clear'></div>
</div>

</div>{/* accordion_child End */}
</form>


</div>{/* basic accordian End */}
</td>
</tr>

</table>
</body>
</html>
<include file="Public:pub_bottom" />