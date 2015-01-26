<div id="pageTitle"></div>
<div class="Tabmenubox">
<ul id="menu1" class="Tabmenu">
<li onclick="setTabPro(1)" id="tab1"  class="hover3">大类管理</li>
<li onclick="setTabPro(2)" id="tab2"  class="userBtn4" >单位管理</li>
</ul>
</div>
<div class="separate"></div>
<div class="Tabmain">
<div class="Tabmain">
<div class="block" id="main1">
<form enctype="multipart/form-data" method="POST" name="cateFirstForm"  action="{(:U('Productslist/CateFirstUpdateAction'))}">
<table class='sbItemTable'>
{(:getSidebarTypeOne())}
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="更新大类信息" class="btn2 Btn2Green" />
</td>
</tr>
</table>
</form>
<div class="separate"></div>

<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="myform"  action="{(:U('Productslist/CateFirstAdd'))}">
<input type="text" class="input addinput" value="请输入大类名称" onclick="this.select()" name="iCateFirstName"/>
<input type="submit" value="添加新大类" class="btn3 Btn3Blue" />
</form>
</div>


<div class="separate"></div>

<a href="{(:U('Productslist/ProcacheUpdate'))}" class="btn3 Btn3Red" title="添加新商品或新分类后请及时更新缓存">更新数据缓存</a>

</div>








<div class="block" id="main2" style="display:none;">


<form enctype="multipart/form-data" method="POST" name="unitForm"  action="{(:U('Productslist/UnitUpdateAction'))}">
<table class='sbItemTable'>
{(:getSidebarUnits())}
<td colspan="3" class="BtnTr">
<input type="submit" value="更新单位名称" class="btn2 Btn2Green" />
</td>
</table>
</form>
<div class="separate"></div>

<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="unitsform"  action="{(:U('Productslist/UnitAdd'))}">
<input type="text" class="input addinput" value="请输入单位名称" onclick="this.select()" name="iUnits"/>
<input type="submit" value="添加新单位" class="btn3 Btn3Blue" />
</form>
</div>

</div>
</div></div>





