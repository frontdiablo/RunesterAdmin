<include file="Public:pub_top" />


</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">

<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Enterprise:pub_sidebar_enterprise" /></td>
<td class="ContainerRight">

<div id="pageTitle">
<h1>修改用户信息</h1>
</div>
<div id="pageTitleBottom"></div>


<include file="Public:pub_funbut_enterprise" />

<div id="basic-accordian" >



<div class="detail_headings BorderTop">
<div class="headingsLeft">修改用户信息</div>
<div class="headingsRight"><span class="red">*号为必填项</span></div>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('Enterprise/updateAction'))}">
<input type="hidden" value="{($vo.AdminId)}" name="iId" />
<div class="accordion_child">
<table class="listTable">



<tr class="singleTr">
<td class="titleTd">{($must)}员工姓名{(:HelpText("姓名将作为登录系统的用户名"))}</td>
<td class="inputTd">
<input type="text" class="input proInput" name="iName" value="{($vo.AdminUserName)}" />
</td>
</tr>

<tr class="DoubleTr">
<td class="titleTd">登录密码{(:HelpText("若不需要修改密码请留空"))}</td>
<td class="inputTd">
<input type="text" class="input proInput" name="iPassword" />
</td>
</tr>

<tr class="singleTr">
<td class="titleTd">{($must)}所属部门{(:HelpText("此员工所在的部门"))}</td>
<td class="inputTd">
<select name="iGroup" id="iGroup">
<option value="0">--请选择--</option>
{(:getUserGroupOption($vo['AdminGroup']))}
</select>
</td>
</tr>

<tr class="DoubleTr">
<td class="titleTd">{($must)}职务{(:HelpText("系统将根据职务确定是否参与采购审核"))}</td>
<td class="inputTd">

{(:getUserTypeOption($vo['AdminType']))}
</td>
</tr>

<tr class="singleTr">
<td class="titleTd">邮件地址</td>
<td class="inputTd">
<input type="text" class="input proInput" name="iMail" value="{($vo.AdminMail)}" />
</td>
</tr>

<tr class="DoubleTr">
<td class="titleTd">联系电话</td>
<td class="inputTd">
<input type="text" class="input proInput" name="iPhone" value="{($vo.AdminPhone)}" />
</td>
</tr>


</table>


<div class="listTableBottom">
<input type="submit" value="提交" class="btn btnBlue" />
</div>
</div>
{(:FormToken())}
</form>

</div><!-- basic accordian End -->






</td>
</tr>

</table>

</body>
</html>
<include file="Public:pub_bottom" />