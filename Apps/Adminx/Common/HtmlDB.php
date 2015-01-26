<?php

/**
	获取用户姓名
*/
function getUserName($id=0){
	$Model = M("Admin");
	$vo = $Model->where("AdminId = '$id'")->field("AdminUserName")->find();  
	return $vo['AdminUserName'];
}


/**
	获取 窗口打开方式 下拉列表
*/
function getTarget($val = ""){
	if($val == ""){
		$target[0][0] = "在当前页面打开";
		$target[0][1] = "_self";
		$target[1][0] = "在新窗口中打开";
		$target[1][1] = "_blank";
		$target[2][0] = "在父页面打开";
		$target[2][1] = "_parent";
		$target[3][0] = "在最顶端打开";	
		$target[3][1] = "_top";	
	    foreach ($target as $k=>$val){
			echo "<li><a href='javascript:void(0)' rel='{$target[$k][1]}' name='{$target[$k][0]}'>{$target[$k][0]}</a></li>";
	    }
    }
    else{
    	switch($val){
		case "_self" : $text = "在当前页面打开";break;
		case "_blank" : $text = "在新窗口中打开";break;
		case "_parent" : $text = "在父页面打开";break;
		case "_top" : $text = "在最顶端打开";break;
		}
		echo $text;
    }
}


/**
	获取 置顶 下拉列表
*/
function getIsTop($val=""){
	$istop[0] = "不置顶";
	$istop[1] = "置顶";
	if($val == ""){
	    foreach ($istop as $k=>$val){
			echo "<li><a href='javascript:void(0)' rel='$k' name='{$istop[$k]}'>{$istop[$k]}</a></li>";
	    }
   	}
   	else echo $istop[$val];
}

/**
	获取 隐藏 下拉列表
*/
function getIsHide($val=""){
	$ishide[0] = "显示";
	$ishide[1] = "隐藏";

	if($val == ""){
	    foreach ($ishide as $k=>$val){
			echo "<li><a href='javascript:void(0)' rel='$k' name='{$ishide[$k]}'>{$ishide[$k]}</a></li>";
	    }
    }
    else echo $ishide[$val];
}


/**
	获取 是否保护 下拉列表
*/
function getIsProtect($val = ""){
	$arr[0] = "允许删除";
	$arr[1] = "禁止删除";
	
	if($val == ""){
	    foreach ($arr as $k=>$val){
			if ($k == $proval) $select = "selected";
			else $select = "";
			echo "<li><a href='javascript:void(0)' rel='$k' name='{$arr[$k]}'>{$arr[$k]}</a></li>";
	    }
    }
    else echo $arr[$val];
}


/**
	获取 链接类型 下拉列表
*/
function getIsType(){
	$type[0][0] = "目录";
	$type[0][1] = "dir";
	$type[0][2] = "show";
	
	$type[1][0] = "页面";
	$type[1][1] = "page";
	$type[1][2] = "show";
	
	$type[2][0] = "文章列表";
	$type[2][1] = "article";
	$type[2][2] = "show";
	
	$type[3][0] = "外部链接";
	$type[3][1] = "url";
	$type[3][2] = "hide";
    foreach ($type as $k=>$val){
		echo "<li><a href='javascript:void(0)' rel='{$type[$k][1]}' name='{$type[$k][0]}' onclick='cateHide(\"{$type[$k][1]}\")'>{$type[$k][0]}</a></li>";
    }
}

/**
	获取 所有页面 下拉列表
*/

function getPage(){
	$Model = M("Page");
	$order = "sort ASC,id ASC";
	$field = "id,title";
	$vo = $Model->where($where)->order($order)->field($field)->select();
	if($vo){
		foreach($vo as $i => $vo){
			echo "<li><a href='javascript:void(0)' rel='{$vo['id']}' name='{$vo['title']}'>$place{$vo['title']}</a></li>";
		}
	}
}

/**
	获取 链接类型 标题
*/
function getCategoryTypeName($val = ""){
	switch($val){
		case "dir" : $text = "目录";break;
		case "page" : $text = "页面";break;
		case "article" : $text = "文章目录";break;
		case "url" : $text = "外部链接";break;
	}
	echo $text;
}

/**
	获取 文章分类 下拉列表
*/

function getCate($type,$pid=0,$article=0,$loop=0){
	$Model = M("Category");
	$loop++;
	$where['cate_pid'] = $pid;
	$where['cate_type'] = $type;	
	$order = "cate_sort ASC,cate_id ASC";
	$field = "cate_id,cate_title";
	$vo = $Model->where($where)->order($order)->field($field)->select();
	if($vo){
		
	for($k=0;$k<$loop-1;$k++) $place .="&#12288;|&#12288;";
		foreach($vo as $i => $vo){
			echo "<li><a href='javascript:void(0)' rel='{$vo['cate_id']}' name='{$vo['cate_title']}'>$place{$vo['cate_title']}</a></li>";
			getCate($type,$vo['cate_id'],$article,$loop);
		}
	}
}
/**
	获取 文章分类 标题
*/
function getCateTitle($pid=""){
	$Model = M("Category");
	$where['cate_id'] = $pid;
	$field = "cate_title";
	$vo = $Model->where($where)->field($field)->find();
	return $vo['cate_title'];
}


/**
	获取分类名称
*/
function getCategoryName($pid=0){
	if($pid == 0){echo "根目录";}
	else{
	$Model =M("Category");
	$CateTitle = $Model->where("id = $pid")->field("title")->find();
	echo $CateTitle['title'];
	}
}
/**
	获取列表页导航分类Option
*/
function getNavCate($type,$pid=0,$selectid=0,$loop=0){
	$Model = M("Nav");
	$loop++;
	$where['type'] = "dir";
	$where['pid'] = $pid;
	$order = "sort ASC,id ASC";
	$vo = $Model->where($where)->order($order)->select();
	if($vo){
		
		for($k=0;$k<$loop-1;$k++) $place .="&#12288;|&#12288;";
		foreach($vo as $i => $vo){
			if($type == 1){
				echo "<li><a href='javascript:void(0)' rel='{$vo['id']}_{$vo['level']}' name='{$vo['title']}'>$place{$vo['title']}</a></li>";
			}
			if($type == 2){
				if($selectid == $vo['id']) $selected = "selected";
				else $selected = "";
				echo "<option value='{$vo['id']}_{$vo['level']}' $selected>$place{$vo['title']}</option>";
			}
			getNavCate($type,$vo['id'],$selectid,$loop);
		}
	}
}

/**
	获取分类名称
*/
function getNavCateTitle($pid=0){
	if($pid == 0){echo "根分类";}
	else{
	$Model =M("Nav");
	$CateTitle = $Model->where("id = $pid")->field("title")->find();
	echo $CateTitle['title'];
	}
}

/**
	获取 广告类型 下拉列表
*/
function getAdvType(){
	$Model = M(CONTROLLER_NAME."Type");
	$order = "type_sort ASC,type_id ASC";
	$vo = $Model->order($order)->select();
	foreach($vo as $i => $vo){
		echo "<li><a href='javascript:void(0)' rel='{$vo['type_id']}' name='{$vo['type_name']}'>{$vo['type_name']}</a></li>";
	}
}


/**
	获取 用户类型 下拉列表
*/
function getAdminType(){
	$Model = M(CONTROLLER_NAME."Type");
	$order = "type_sort ASC,type_id ASC";
	$vo = $Model->order($order)->select();
	foreach($vo as $i => $vo){
		echo "<li><a href='javascript:void(0)' rel='{$vo['type_id']}' name='{$vo['type_name']}'>{$vo['type_name']}</a></li>";
	}
}



/**
	获取 启用状态 下拉列表
*/
function getState($val=""){
	$isstate[1] = "启用";
	$isstate[0] = "禁用";
	if($val == ""){
	    foreach ($isstate as $k=>$val){
			echo "<li><a href='javascript:void(0)' rel='$k' name='{$isstate[$k]}'>{$isstate[$k]}</a></li>";
	    }
   	}
   	else echo $isstate[$val];
}

/**
	获取用户组 下拉列表
*/
function getAdminGroup($id=""){
	

	//如果存在ID，直接输出组名称
	if($id == ""){
		$Model = M("AdminGroup");
		$vo = $Model->field("id,title")->select();
	    foreach ($vo as $k=>$v){
			echo "<li><a href='javascript:void(0)' rel='{$v['id']}' name='{$v['title']}'>{$v['title']}</a></li>";
	    }
   	}
   	//如果不存在ID，则遍历所有组
   	else {
   		$AModel = M("AdminGroupAccess");
   		$GModel = M("AdminGroup");
   		$Awhere = array("uid" => $id);
   		$Avo = $AModel->where($Awhere)->select();
   		$count = count($Avo);
   		if($count > 0){
	    		foreach($Avo as $Avo){
				$Gwhere = array("id" => $Avo['group_id']);
				$Gvo = $GModel->where($Gwhere)->find();
				if($Gvo['title'] == "") echo "<span class='red del f12'>组不存在或已删除</span>";
		   		else echo "{$Gvo['title']}";
	   		}
	   	}
	   	else echo "<span class='blue f12'>未分组</span>";
   	}
}

/**

获取用户组 ID

*/
function getAdminGroupAccessId($id){
$Model = M("AdminGroupAccess");
$where = array("uid" => $id);
$vo = $Model->where($where)->select();
foreach ($vo as $vo) {
	echo $vo['group_id'];
}
}
/**
获取分类隐藏文字
*/

function getCateHideBtn($type,$val){
	switch($val){
		case 0:
			$v['btn_style'] = "Show";
			$v['btn_title'] = "显示中，点击隐藏";
			break;
		case 1:
			$v['btn_style'] = "Hide";
			$v['btn_title'] = "已隐藏，点击显示";
			break;
	}
	return $v;	
    
}



?>