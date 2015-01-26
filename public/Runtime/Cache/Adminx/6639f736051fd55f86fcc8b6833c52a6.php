<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>RunesterAdmin</title>
<link href="/Apps/Adminx/resource/style/reset.css" rel="stylesheet" type="text/css" />
<link href="/Apps/Adminx/resource/style/style.css" rel="stylesheet" type="text/css" />
<link href="/Apps/Adminx/resource/style/btn.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Apps/Adminx/resource/function/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
EDITROOT = "/Apps/Adminx/resource/function/editor"; //编辑器
</script>
<?php
$DateActive = "onfocus=\"WdatePicker({isShowClear:false,readOnly:false,dateFmt:'yyyy-MM-dd HH:mm:ss'})\""; $must = "<span class='must'>*&nbsp;</span>"; ?>
</head>
<body >
<div id="HeaderTop">
<img src="/Apps/Adminx/resource/images/logo.png" />
<div class="HeaderTopFunBtnNav">
<a href="/index.php" target="_blank" class="HeaderTopFunBtn HeaderTopFunBtnHome" title="<?php echo (L("HEADER_BTN_BROWSE")); ?>"></a>
<?php if(returnAuth($Thik.MODULE_NAME.'/Cache/clear_cache')): ?><a href="javascript:void(0)" onclick='popwindow_clear_cache("<?php echo U('Cache/index');?>","<?php echo (L("HEADER_BTN_CLEAR_CACHE")); ?>")' class="HeaderTopFunBtn HeaderTopFunBtnClear" title="<?php echo (L("HEADER_BTN_CLEAR_CACHE")); ?>"></a><?php endif; ?>



<a href="javascript:void(0)" onclick='popwindow_favorite("<?php echo U('Favorite/header_display');?>","<?php echo (L("HEADER_BTN_FAVORITE")); ?>")' class="HeaderTopFunBtn HeaderTopFunBtnFavorite" title="<?php echo (L("HEADER_BTN_FAVORITE")); ?>"></a>
<a href="javascript:void(0)" id="favorite" class="HeaderTopFunBtn HeaderTopFunBtnHelp" title="<?php echo (L("HEADER_BTN_HELP")); ?>"></a>


<a href="<?php echo U('Index/LoginOut');?>" class="HeaderTopFunBtn HeaderTopFunBtnExit" title="<?php echo (L("HEADER_BTN_QUIT")); ?>"></a>
</div>
<div class="clear"></div>
</div>
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><div class="logoContainer">
<a href="<?php echo U('Admin/edit');?>"><img src="/./public/image/head/<?php echo ($admin_head); ?>" class="sidebarLogo radius" /></a>
<a href="<?php echo U('Admin/edit');?>" class="nameLink">

<?php if($admin_nickname != ''): echo ($admin_nickname); ?>
<?php else: ?>
<?php echo ($admin_username); endif; ?>



</a>
</div>
<ul>

<?php if(returnAuth($Thik.MODULE_NAME.'/Page/index')): ?><li><a href="<?php echo U('Page/index');?>" class="sidebarBtn btnPage <?php echo ($sideactive["page"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Article/index')): ?><li><a href="<?php echo U('Article/index');?>" class="sidebarBtn btnArticle <?php echo ($sideactive["article"]); ?>"></a></li><?php endif; ?>


<li><a href="<?php echo U('Guestbook/index');?>" class="sidebarBtn btnGuestbook"></a></li>

<?php if(returnAuth($Thik.MODULE_NAME.'/Admin/index')): ?><li><a href="<?php echo U('Admin/index');?>" class="sidebarBtn btnUser <?php echo ($sideactive["admin"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/AdminRule/index')): ?><li><a href="<?php echo U('AdminRule/index');?>" class="sidebarBtn btnRule <?php echo ($sideactive["rule"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Nav/index')): ?><li><a href="<?php echo U('Nav/index');?>" class="sidebarBtn btnNav <?php echo ($sideactive["nav"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Config/web')): ?><li><a href="<?php echo U('Config/web');?>" class="sidebarBtn btnSetting <?php echo ($sideactive["config"]); ?>"></a></li><?php endif; ?>

<li><a href="<?php echo U('Index/LoginOut');?>" class="sidebarBtn btnQuit "></a></li>

<!--

<li><a href="<?php echo U('Article/index');?>" class="sidebarBtn btnPlugin"></a></li>
-->
</ul>
</td>
<td class="ContainerInline"><div id="pageTitle"></div>


<div class="Tabmenubox Tabmenubox_cate">
<ul id="menu1" class="Tabmenu">
<li id="one1" onclick="setTab('one',1,2,'hover1')" class="hover1"><?php echo (L("TAB_SIDE_CATE_FILTER")); ?></li>
<li id="one2" onclick="setTab('one',2,2,'hover2')" ><?php echo (L("TAB_SIDE_CATE_SETTING")); ?></li>
</ul>
</div>
<div class="separate"></div>


<div id="con_one_1" class="hover">
	<ul class="sideItemUl">
	<?php if(is_array($rvo)): $i = 0; $__LIST__ = $rvo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rvo): $mod = ($i % 2 );++$i;?><li><a href='<?php echo U($Think.CONTROLLER_NAME."/index","pid=0&cate=".$rvo['cate_id']);?>' <?php if($cate_id == $rvo['cate_id']): ?>class="click"<?php endif; ?>><?php echo ($rvo["cate_title"]); ?></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
<div class="separate"></div>
	<?php echo getSideNavCate(0,$pid,$cate_id);?>
	</ul>
</div>


<div id="con_one_2" style="display:none">
<form enctype="multipart/form-data" method="POST" name="myform"  action="<?php echo U('Category/update_multi');?>">
<table class='sbItemTable'>
<tr><td colspan="3" class="BtnTr"><?php echo (L("PROMPT_SIDE_CATE")); ?></td></tr>
<?php echo getSideCateTable("Nav","edit",0,0,1,0);?>
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="<?php echo (L("BTN_CATE_EDIT")); ?>" class="btn2 Btn2Red" />
</td>
</tr>
</table>
</form>

<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="sbGroupform"  action="<?php echo U('Category/insert');?>">
<input type="hidden" name="cate_type" value="Nav" />
<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="<?php echo (L("PH_CATE_ADD")); ?>" onclick="this.select()" /><br />
<input type="submit" value="<?php echo (L("BTN_CATE_ADD")); ?>" class="btn3 Btn3Blue" />
</form>
</div>
</div></td>
<td class="ContainerRight">
<div id="pageTitle"><h1><?php echo (L("PAGETITLE_NAV_INDEX")); ?></h1></div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='/index.php/Adminx/Nav/add' class='navBtn navButton1'><?php echo (L("NAVBTN_NAV_ADD")); ?></a></li>
<li><a href='/index.php/Adminx/Nav/index' class='navBtn navButton2'><?php echo (L("NAVBTN_NAV_INDEX")); ?></a></li>
<div class="clear"></div>
</ul>
<div class="clear"></div>
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft"><?php echo (L("TABLETITLE_NAV_INDEX")); ?></div>
<div class="clear"></div>
</div>

<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="/index.php/Adminx/Nav/sort">
<div class="accordion_child">
<table class="listTable">
<tr>
<th><?php echo (L("TH_CHECK")); ?></th>
<th><?php echo (L("TH_TITLE")); ?></th>
<th><?php echo (L("TH_CATE")); ?></th>
<th><?php echo (L("TH_SORT")); ?></th>
<th><?php echo (L("TH_DISPLAY")); ?></th>
<th><?php echo (L("TH_FUNCTION")); ?></th>
</tr>
<?php echo getNavTable($pid,$cate_id);?>
</table>
<div class='listTableBottom'>
<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"  name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<script>$(function(){ $.divselect("#iifun","#ifun"); });</script>
        <div id="iifun" class="dropdown" tabindex="0" style="width:120px" ><p><?php echo (L("JSELECT_OPTION")); ?></p><ul  class="" style="width:120px"><!--
<li><a href='javascript:void(0)' onclick='formConfirm("/index.php/Adminx/Nav/cateEdit","确定要批量修改所在分类吗？")'>修改分类</a></li>
-->
<?php echo getListBatchBtn("delete,hide,sort");?></ul></div> 
        <input type="hidden" id="ifun" name="ifun" value="0" />
</td>
</tr>
</table>
</div>
<div class='bottomRight'>
<div class="pages"><?php echo ($page); ?></div>
</div>
<div class='clear'></div>
</div>
</div>
</form>

</div>
</td>
</tr>
</table>
</body>
</html>
<script type="text/javascript" src="/Apps/Adminx/resource/function/mycommon.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/quickView.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/layer/layer.min.js"></script>