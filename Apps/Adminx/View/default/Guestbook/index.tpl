<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Guestbook:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_PAGE_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Guestbook:pub_funbut" />
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_PAGE_INDEX}</div>
</div>
<div class="clear"></div>
</div>
{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform">
<div class="accordion_child" style="margin:0 25px;">
{:W("Guestbook/bookTable")}
<div class='listTableBottom'>
<div class='bottomLeft'></div>
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