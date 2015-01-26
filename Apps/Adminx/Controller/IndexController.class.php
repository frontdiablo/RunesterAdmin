<?php
namespace Adminx\Controller;
use Think\Controller;
class IndexController extends Controller
{
	
	public function test(){
//	Load('@.front');
		$this->display();
		
	}
	   public function info(){
        Load('@.HtmlDB');
        $Model = M('Admin');

        $this->display();
    }

    public function index() {
		if(cookie('username') != "" and cookie('password') != "")
		echo "<script>window.location.href='" . U("Index/login") .  "'</script>";
    	$this->display();
    }
public function login(){

        $autocheck = $_POST['autocheck'];
       
	   
	    $Model = M('Admin');

        if(cookie('username') != "" and cookie('password') != ""){
		$iUsername = cookie("username");
        $iPassword = cookie("password");
        }
        else{
        $iUsername = $_POST['iUsername'];
        $iPassword = FrontHash($_POST['iPassword']);
        }
        $where = array("username" => "$iUsername",);
        $PREFIX = C("DB_PREFIX");
        $vo = $Model->where($where)->find();

        if($iUsername == "") $this->error("请输入用户名");
        if(!$vo) $this->error("此用户不存在或已删除");
        if($vo['password'] != $iPassword) $this->error("密码错误");

		//登录成功，进行数据存储。
		$data['admin_loginTime'] = unixtime(date("Y-m-d H:i:s"));
		$data['admin_loginIP'] = getIP();
		
		$result = $Model->where("id = ".$vo['id'])->save($data);		

		//存储session
 		$index = A("Public");  
        $saveinfo = $index->saveAdminInfo($vo);

        if($autocheck == 1){
        cookie('username',$vo['username'],3600*24*30);
        cookie('password',$vo['password'],3600*24*30);
        }
        echo "<script>parent.window.location.href='" . U("Page/add") .  "'</script>";
        
}

 

    public function LoginOut (){
        unset($_SESSION['admin_id']);
		unset($_SESSION['username']);
        unset($_SESSION['admin_type']);
		unset($_SESSION);
        session_destroy();
        cookie(null);
        $this->success("安全退出成功！",U("Index/index"));
        
    }




    /*
    用户注册
public function reg() { 
    if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
   $Node = D('Admin');

$iGroup = $this->_post("iGroup");
$iPassword = $this->_post("iPassword");

if($iPassword == "") $this->error('密码不能为空！');

$iPassword = FrontHash($iPassword);
if($Node->create()) {
//if($iGroup == "1") $Node->admin_type = 1;
$Node->admin_type = 2;

$Node->password = $iPassword;
        $result = $Node->add();
        if(!$result) {
            $this->error('用户注册失败，请重试！');
        }
        else $this->success('用户注册成功，请登录！');
    }
    else $this->error($Node->getError());

  }
*/
/*
//更新用户资料
public function update() {
    if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
   $Node = D('Admin');

$iGroup = $this->_post("iGroup");
$iPhone = $this->_post("iPhone");
$iMail = $this->_post("iMail");
$iPassword = $this->_post("iPassword");





$where = "id = {$_SESSION['admin_id']}";
if($Node->create()) {
if($iGroup == "1") $Node->admin_type = 1;
else $Node->admin_type = 2;

if($iPassword != ""){
    $iPassword = FrontHash($iPassword);
    $Node->password = $iPassword;
}


        $result = $Node->where($where)->save();
        if($result) {
            $this->success('用户信息更新成功！',U("Index/info"));
        }
        else {
            $this->error('用户信息更新失败，请重试！');
        }
    }
    else $this->error($Node->getError());

  }
  */

}
?>