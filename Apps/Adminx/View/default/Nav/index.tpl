<include file="Public:pub_top" />
</head>
<body >
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Nav:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_NAV_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Nav:pub_funbut" />
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_NAV_INDEX}</div>
<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="__URL__/sort">
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_TITLE}</th>
<th>{$Think.lang.TH_CATE}</th>
<th>{$Think.lang.TH_SORT}</th>
<th>{$Think.lang.TH_DISPLAY}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
{:getNavTable($pid,$cate_id)}
</table>
<div class='listTableBottom'>
<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"  name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">
<!--
<li><a href='javascript:void(0)' onclick='formConfirm("__URL__/cateEdit","确定要批量修改所在分类吗？")'>修改分类</a></li>
-->
{:getListBatchBtn("delete,hide,sort")}
</jselect>
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