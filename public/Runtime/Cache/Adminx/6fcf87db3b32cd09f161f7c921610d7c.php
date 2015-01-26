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
<body>
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
<div class="Tabmenubox TabmenuboxBorder">
<div class="Tabmenubox_cate"><?php echo (L("TAB_SIDE_USER_GROUP")); ?></div>
</div>
<div class="separate"></div>
<div >
<ul class="sideItemUl">
<li><a href='<?php echo U($Think.CONTROLLER_NAME."/index");?>' <?php if($type == ''): ?>class="click"<?php endif; ?>><?php echo (L("SIDE_LIST_ALL")); ?></a></li>
<?php if(is_array($vos)): $i = 0; $__LIST__ = $vos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Admin/index','type='.$vos['id']);?>"><?php echo ($vos["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="separate"></div>
</div><!--con_one_1 End--></td>
<td class="ContainerRight">
<div id="pageTitle"><h1><?php echo (L("PAGETITLE_ADMIN_INDEX")); ?></h1></div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='<?php echo U('Admin/add');?>' class='userBtn navButton1'><?php echo (L("NAVBTN_USER_ADD")); ?></a></li>
<li><a href='<?php echo U('Admin/index');?>' class='userBtn navButton2'><?php echo (L("NAVBTN_USER_index")); ?></a></li>
<li><a href='<?php echo U('AdminGroup/add');?>' class='userBtn navButton3'><?php echo (L("NAVBTN_USER_GROUP_ADD")); ?></a></li>
<li><a href='<?php echo U('AdminGroup/index');?>' class='userBtn navButton4'><?php echo (L("NAVBTN_USER_GROUP_INDEX")); ?></a></li>
<div class="clear"></div>
</ul>
<div class="clear">
</div>

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft"><?php echo (L("TABLETITLE_ADMIN_INDEX")); ?></div>
<form enctype="multipart/form-data" method="POST" name="searchform" id="searchform" action="javascript:void(0)" onsubmit='searchFormValidate("/index.php/Adminx/Admin/index")' >
<div class="listTableSearch">
<input type="text" class="searchInput" value="<?php echo ($keyword); ?>" name="keyword" id="keyword" onclick="this.select()" title="按回车键也可以搜索哦 :)" />
<input type="submit" class="searchBtn" value=""  />
<div class="clear"></div>
</form>
<div class="clear"></div>
</div>


<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="" >
<div class="accordion_child">
<table class="listTable">
<tr>
<th><?php echo (L("TH_CHECK")); ?></th>
<th><?php echo (L("TH_ID")); ?></th>
<th><?php echo (L("TH_HEAD")); ?></th>
<th><?php echo (L("TH_LOGIN_NAME")); ?></th>
<th><?php echo (L("TH_NICKNAME")); ?></th>
<th><?php echo (L("TH_TYPE")); ?></th>
<th><?php echo (L("TH_STATE")); ?></th>
<th><?php echo (L("TH_LOGIN_TIME")); ?></th>
<th><?php echo (L("TH_LOGIN_IP")); ?></th>
<th><?php echo (L("TH_FUNCTION")); ?></th>
</tr>
<?php if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td class="listTableCheckTd">
<input type="checkbox" value="<?php echo ($vo["id"]); ?>" name='artical_ID[]' id='artical_ID' />

</td>
<td><?php echo ($vo["id"]); ?></span></td>
<td class="thumbTd">
<img src="/./public/image/head/<?php echo ($vo["head"]); ?>" width="48px" height="48px" />
</td>
<td><?php echo ($vo["username"]); ?></span></td>
<td><?php echo ($vo["nickname"]); ?></td>
<td><?php echo getAdminGroup($vo['id']);?></td>
<td><a href="/index.php/Adminx/Admin/index?status=<?php echo ($vo["status"]); ?>" title="<?php echo (L("TIP_TITLE_STATE")); ?>"><?php echo getState($vo['status'],"status");?></a></td>
<td>
<?php if($vo["admin_loginTime"] == ''): ?>未登录
<?php else: ?>
<?php echo forDate($vo['loginTime']); endif; ?>
</td>
<td>
<?php if($vo["loginIP"] == ''): ?>未登录
<?php else: ?>
<?php echo ($vo["loginIP"]); endif; ?>
</td>
<td class='funTd'>
<?php echo btn("status",$key);?>
<?php echo btn("edit",$key);?>
<?php echo btn("delete",$key);?>
</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class='listTableBottom'>
<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"   name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<script>$(function(){ $.divselect("#iifun","#ifun"); });</script>
        <div id="iifun" class="dropdown" tabindex="0" style="width:120px" ><p><?php echo (L("JSELECT_OPTION")); ?></p><ul  class="" style="width:120px"><?php echo getListBatchBtn("delete,status");?></ul></div> 
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


</td>
</tr>
</table>
</body>
</html>

<script type="text/javascript" src="/Apps/Adminx/resource/function/mycommon.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/quickView.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/layer/layer.min.js"></script>