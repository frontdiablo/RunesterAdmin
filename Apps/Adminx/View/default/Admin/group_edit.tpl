<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_ADMIN_GROUP_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />
<div id="basic-accordian" >
<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" name="id" value="{$vo.id}" />
<div class="TabTitle">
<ul>
<li id="one1" class="hover">{$Think.lang.TAB_USER_GROUP}</li>
</ul>
</div>
<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="name" value="{$vo.name}"/>
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_DESCRIPTION}</td>
<td class="inputTd">
<input type="text" class="input" name="remark" value="{$vo.remark}" />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">

<jselect name="status" title="{:getState($vo['status'])}" value="$vo['status']">{:getState()}</jselect>
</td>
</tr>
</table>
</div>
<div id="con_one_2" style="display:none">

<foreach name="volist" item="root" >
<div class="level_1">
<table class="listTable">
	<tr>
	<td class="access_level_1" colspan="2"><input type="checkbox" name="access[]" id="access_{$root.id}" value="{$root.id}_1" level="1" <if condition="$root['access']"> checked="checked"</if> /><label for="access_{$root.id}"> {$root.title}</label></td>
	</tr>
		<foreach name="root.child" item="action">
		<tr class="level_2">
		<td class="access_level_2">
		&#12288;<input type="checkbox" name="access[]" id="access_{$action.id}" value="{$action.id}_2" level="2" <if condition="$action['access']"> checked="checked"</if> /><label for="access_{$action.id}"> {$action.title}</label>&#12288;</td>
		<td class="access_level_3">
			<foreach name="action.child" item="method">
			<input type="checkbox" name="access[]" id="access_{$method.id}" value="{$method.id}_3" level="3" <if condition="$method['access']"> checked="checked"</if> /><label for="access_{$method.id}"> {$method.title}</label>&#12288;
			</foreach>
		</td>
		</tr>
		</foreach>
</table>
</div>
</foreach>

</div>
<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_EDIT}' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />