<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_ADMIN_GROUP_AUTH}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update_access">
<input type="hidden" name="id" value="{$vo.id}" />
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_AUTH_ACCESS}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->


<div class="auth_rule">
<table class="listTable">
<tr><td class='access_level_0' colspan='2'><input type='checkbox' name='check_all' id='check_all' value='0' class="chceck_all" /><label for='check_all'> 全选</label></td></tr>
{:getRuleCheck(0,$vo['rules'])}
</table>
</div>


</div>



<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_AUTH}' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />