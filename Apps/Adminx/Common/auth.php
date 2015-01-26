<?php
/* 获取 启用状态 下拉列表 */
function getRuleType($val=""){
	$type[1] = "系统";
	$type[2] = "用户";
	if($val == ""){
	    foreach ($type as $k=>$val){
			echo "<li><a href='javascript:void(0)' rel='$k' name='{$type[$k]}'>{$type[$k]}</a></li>";
	    }
   	}
   	else echo $type[$val];
}


/**
	获取访问授权列表及radio
 */
function getRuleCheck($pid=0,$rules){
	$rulearr = explode(",",$rules);
	$Model = M("AdminRuleCate");
	$where = "pid = $pid";
	$order = "sort ASC,id ASC";
	$vo = $Model->where($where)->order($order)->select();
	if($vo){
		foreach($vo as $vo){
			if($vo['level'] == 1){echo "<tr class='level_1' name='level_1'><td class='access_level_1' colspan='2'><input type='checkbox' name='parent[]' id='parent_{$vo['id']}' value='{$vo['id']}' level='1' /><label for='parent_{$vo['id']}'> {$vo['title']}</label></td></tr>";}
			elseif($vo['level'] == 2){
				echo "<tr class='level_2' name='level_2'><td class='access_level_2'><input type='checkbox' name='parent[]' id='parent_{$vo['id']}' value='{$vo['id']}' level='2' /><label for='parent_{$vo['id']}'> {$vo['title']}</label></td><td class='access_level_3'>";

				//获取三级数据
				$Model = M("AdminRule");
				$where = "pid = {$vo['id']}";
				$vos = $Model->where($where)->order($order)->select();
				if($vos){
					foreach($vos as $vos){
						if(in_array($vos['id'], $rulearr)) $check = "checked='checked'";
						else $check = "";
						echo "<input type='checkbox' name='access[]' id='access_{$vos['id']}' value='{$vos['id']}' level='3' $check /><label for='access_{$vos['id']}'> {$vos['title']}</label>&#12288;";}	
				}
				echo "</td></tr>";
			} //Level = 2 End
			getRuleCheck($vo['id'],$rules);
		} //foreach End

	} //if End
}


/**
用户授权列表
*/
function getUserList($pid=""){
	
	$Model = M("Admin");
	$where = "type = $pid";
	$vo = $Model->where($where)->select();
	if($vo){
		
		foreach($vo as $vo){
			echo "<input type='checkbox' name='access[]' id='access_{$vo['id']}' value='{$vo['id']}_3' level='3' /><label for='access_{$vo['id']}'> {$vo['title']}</label>&#12288;";
		}	
	} //foreach End

} //if End

function getRuleLevel($id="",$level=1){
	$Model = M("AdminRuleCate");
	if($id == ""){ //遍历Rule列表
		$where = array('level' => 1);
		$vo = $Model->where($where)->select();
		echo "<li><a href='javascript:void(0)' rel='0_1' name='根分类'>根分类</a></li>";
		foreach ($vo as $j=>$vo) {
			echo "<li><a href='javascript:void(0)' rel='{$vo['id']}_2' name='{$vo['title']}'>{$vo['title']}</a></li>";
			if($level == 2){
				$where2 = array('level' => 2,'pid'=>$vo['id']);
				$vo2 = $Model->where($where2)->select();
				foreach ($vo2 as $k=>$vo2) {
					echo "<li><a href='javascript:void(0)' rel='{$vo2['id']}_3' name='{$vo2['title']}'>&#12288;| &#12288;{$vo2['title']}</a></li>";
				}
			}
		}
	}
	else{ //如果id存在，则只输出分类名称，用户Rule修改
		if($id == 0) echo "根分类";
		else{
			$where = array('id' => $id);
			$vo = $Model->where($where)->find();
			echo $vo['title'];
		}
	}
}

?>