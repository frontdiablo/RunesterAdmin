<?php
namespace Adminx\Controller;
use Think\Controller;

class PublicController extends Controller
{
	

    public function pub_top() {
		header("Content-type: text/html; charset=utf-8");
		// if(!stristr ($_SERVER['HTTP_REFERER'],CURRURL))  header("location:".U("Index/index"));; 
	//	if(!isset($_SESSION['admin_id'])) $this->error('服务器信息丢失，请重新登录','index.php');
		if(!isset($_SESSION[C("USER_AUTH_KEY")])){
			U("Login/index","","",1);
		}
		//Auth验证
		$notAuth_controller = in_array(CONTROLLER_NAME, explode(",", C("AUTH_CONFIG.NOT_AUTH_CONTROLLER")));
		if(!$notAuth_controller){
			if(!returnAuth(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME)){
				//	$this->error('没有权限');
					//echo "没有权限";
			}
		}
	}
    

    public function pub_sidebar() {
      header("Content-type: text/html; charset=utf-8");
      $this->assign("admin_id",$_SESSION["admin_id"]);
	  $this->assign("admin_username",$_SESSION["admin_username"]);
      $this->assign("admin_nickname",$_SESSION["admin_nickname"]);
      $this->assign("admin_head",$_SESSION["admin_head"]);
      //定义按钮样式
      switch(CONTROLLER_NAME){
      	case "Page" : $sideactive['page'] = "btnPageActive";break;
      	case "Article" : $sideactive['article'] = "btnArticleActive";break;
      	case "Admin" : $sideactive['admin'] = "btnUserActive";break;
      	case "AdminGroup" : $sideactive['admin'] = "btnUserActive";break;
      	case "Nav" : $sideactive['nav'] = "btnNavActive";break;
        case "AdminRule" : $sideactive['rule'] = "btnRuleActive";break;
        case "AdminRuleCate" : $sideactive['rule'] = "btnRuleActive";break;
        case "Config" : $sideactive['config'] = "btnSettingActive";break;
        case "Adv" : $sideactive['config'] = "btnSettingActive";break;
        case "Im" : $sideactive['config'] = "btnSettingActive";break;
        case "Webtools" : $sideactive['config'] = "btnSettingActive";break;
        
      }
      $this->assign("sideactive",$sideactive);
      
      
    }


	/**
		更新用户信息
	*/
	public function saveAdminInfo($vo){
		if($vo['id'] != "") $_SESSION['admin_id'] = $vo['id'];
		if($vo['username'] != "") $_SESSION['admin_username'] = $vo['username'];
		if($vo['nickname'] != "") $_SESSION['admin_nickname'] = $vo['nickname'];
		//if($vo['type'] != "") $_SESSION['admin_type'] = $vo['type'];
		if($vo['head'] != "") $_SESSION['admin_head'] = $vo['head'];
		return true;
	}





    


   

}
?>