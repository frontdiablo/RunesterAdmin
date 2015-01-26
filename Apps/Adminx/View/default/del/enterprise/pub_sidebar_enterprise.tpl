<div id="pageTitle"></div>
<div class="Tabmenubox">
<ul id="menu1" class="Tabmenu">
<li onclick="setTabUser(1)" id="tab1"  class="hover1">部门管理</li>
<li onclick="setTabUser(2)" id="tab2"  class="userBtn2" >职位管理</li>
</ul>
</div>
<div class="separate"></div>
<div class="Tabmain">
<div class="Tabmain">
<div class="block" id="main1">
<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="{(:U('Enterprise/GroupUpdateAction'))}">
<table class='sbItemTable'>
{(:getSidebarGroup())}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="更新部门信息" class="btn2 Btn2Green"   />
</td>
</tr>
</table>
</form>
<div class="separate"></div>










<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('Enterprise/GroupAdd'))}">
<input type="text" class="input addinput" value="请输入新部门名称" name="iGroupName" onclick="this.select()"/>
<input type="submit" value="添加新部门" class="btn3 Btn3Blue" />
</form>
</div>


<div class="separate"></div>

<a href="{(:U('Enterprise/UsercacheUpdate'))}" class="btn3 Btn3Red" title="添加新用户或新部门后请及时更新缓存">更新用户缓存</a>



</div>
<div class="block" id="main2" style="display:none;">
<form enctype="multipart/form-data" method="POST" name="sbTypeform"  action="{(:U('Enterprise/TypeUpdateAction'))}">
<table class='sbItemTable'>
{(:getSidebarType())}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="更新职位级别" class="btn2 Btn2Red" />
</td>
</tr>
</table>
</form>
<div class="separate"></div>
<form enctype="multipart/form-data" method="POST" name="sbValiform"  action="{(:U('Enterprise/TypeValiUpdateAction'))}">
<table class='sbItemTable'>
<tr>
<td colspan="2" class="BtnTr">
请将参与采购审批的职位从小到大排列。<br />如果职位不参与采购审批，请设置为0
</td>
</tr>
{(:getSidebarTypeVali())}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="更新审批权限" class="btn2 Btn2Green" />
</td>
</tr>
</table>
</form>



<div class="separate"></div>




<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="GroupTypeForm"  action="{(:U('Enterprise/GroupTypeAdd'))}">
<input type="text" class="input addinput" value="请输入新的职位名称" onclick="this.select()" name="iGroupTypeName"/>
<input type="submit" value="添加新职位" class="btn3 Btn3Red" />
</form>
</div>



</div>
</div></div>
