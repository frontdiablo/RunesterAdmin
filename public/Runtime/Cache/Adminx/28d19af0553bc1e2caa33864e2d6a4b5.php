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
<td class="ContainerRight">
<div id="pageTitle">
<h1><?php echo (L("PAGETITLE_AUTH_NODE_ADD")); ?></h1>
</div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='<?php echo U('AdminRule/add');?>' class='ruleBtn navButton1'><?php echo (L("NAVBTN_RULE_ADD")); ?></a></li>
<li><a href='<?php echo U('AdminRule/index');?>' class='ruleBtn navButton2'><?php echo (L("NAVBTN_RULE_INDEX")); ?></a></li>
<li><a href='<?php echo U('AdminRuleCate/add');?>' class='ruleBtn navButton3'><?php echo (L("NAVBTN_RULE_GROUP_ADD")); ?></a></li>
<li><a href='<?php echo U('AdminRuleCate/index');?>' class='ruleBtn navButton4'><?php echo (L("NAVBTN_RULE_GROUP_INDEX")); ?></a></li>
<div class="clear"></div>
</ul>
<div class="clear">
</div>

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="/index.php/Adminx/AdminRule/insert">
<div class="TabTitle">
<ul>
<li id="one1" class="hover"><?php echo (L("TAB_NODE_INFO")); ?></li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_IDIFY")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="name" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_DESCRIPTION")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="title" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_CONDITION")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="condition" />
</td>
</tr>

<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_STATE")); ?></td>
<td class="inputTd">
<script>$(function(){ $.divselect("#istatus","#status"); });</script>
        <div id="istatus" class="dropdown" tabindex="0" style="" ><p><?php echo getState(1);?></p><ul  class="" style=""><?php echo getState();?></ul></div> 
        <input type="hidden" id="status" name="status" value="1" />
</td>
</tr>
</table>
</div>

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='<?php echo (L("BTN_ADD")); ?>' />
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