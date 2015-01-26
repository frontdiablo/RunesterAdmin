<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Config:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>网站高级设置</h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update_advance">

<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,2,'hover')" class="hover">功能字段显示</li>
<li id="one2" onclick="setTab('one',2,2,'hover')">图片尺寸设置</li>
</ul>
</div>

{/* Tab 1 */}
<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr><td colspan="2" class="promptTd">{$must}请勾选需要显示的项目</td></td></tr>
<volist name="vo" id="vo">
<tr>
<td class="titleTd">{$vo.name}：</td>
<td class="inputTd">{:getConfigField($vo['id'])}</td>
</tr>
</volist>
</table>
</div>

{/* Tab 2 */}
<div id="con_one_2" style="display:none">
<!-- Tab 1 -->

<table class="listTable">
<tr>
<td class="titleTd">LOGO图片尺寸：</td>
<td class="inputTd"><input type="text" class="input dateInput" name="url" value="120*88" /> px</td>
</tr>
<tr>
<td class="titleTd">Banner图片尺寸：</td>
<td class="inputTd"><input type="text" class="input dateInput" name="url" value="1280*100" /> px</td>
</tr>
</table>
</div>







<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='设置' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>
<load href="__RESFUN__/editor/kindeditor-min.js" />
<load href="__RESFUN__/editor/config-webconfig.js" />
<load href="__RESFUN__/DateActive/WdatePicker.js" />
<include file="Public:pub_bottom" />

