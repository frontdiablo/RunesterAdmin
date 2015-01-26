<?php
namespace Adminx\Controller;
use Think\Controller;
use Think\Page;
/**
 * PageController
 * 
 * @package Adminx
 * @author frontLon
 * @copyright 2014
 * @access public
 */
class AdminController extends CommonController
{
    /**
     	前置操作方法
     */
   public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
    }
	/**
		后置操作
	*/
	public function _after_index(){unset($GLOBALS['vo']);}

    /**
    	页面管理列表
     */
    public function index() {
    	R('Sidebar/admin');
        Load('@.list');
	 	$get = I("get.");
	 	//$type = I("get.type");
	 	if($get['type'] != "") $where['type'] = array("like", ",{$get['type']},");
	 	if($get['status'] != "") $where['status'] = array("eq", $get['status']);
		// $where['super'] = 0;


     //搜索关键字显示设置
      $keyword = I("post.keyword");
      if($keyword != "") {
          $where['username'] = array("like","%$keyword%");
          $where['nickname'] = array("like","%$keyword%");
          $where['_logic'] = 'OR';
          $this->assign("keyword",$keyword);
      }
      else $this->assign("keyword","搜索...");

		$Model = M(CONTROLLER_NAME);
	//	$where['super']=0;
	    //分页设置
		$PageNum = 10; //分页数
        $count = $Model->where($where)->count();
        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();
        global $vo;
		$vo = $Model->where($where)->order("id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("volist",$vo);
		$this->assign("type",$get['type']);
   		$this->display();    
    }


    /**
    	信息添加页面显示
     */
    public function add() {$this->display();}

    /**
	 	信息修改页面显示
	 */
    public function edit() {
		$Model = M(CONTROLLER_NAME);
		$id = I("get.id");
		//如果id为空，则是用户修改自己的用户信息
		if($id == "") $id = $_SESSION['admin_id'];
        $vo = $Model->where("id = ". $id)->find();
        $this->assign("vo",$vo);
        $_SESSION['upload_id'] = $_SESSION['admin_id'];
		$this->display();
    }


    /**
     	数据添加Action
    */
    public function insert(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = D(CONTROLLER_NAME);
		$create = $Model->create();
        if($create) {
        	$post = I("post.");
			if($post['group_id'][0] == "") $this->error("请选择用户组");	
			if($post['password'] == "") $this->error("新密码不能为空");	
			if($post['password'] != $post['repassword']) $this->error("两次输入的密码不一致");
			$post['password'] = FrontHash($post['password']);
        	$create['password'] = $post['password'];

        	$gid = implode(",", $post['group_id']);
        	$gid = ",".$gid.",";
        	$create['type'] = $gid;
 
			$result = $Model->add($create);
			if($result) {
			$data['uid'] = $result;
			$data['group_id'] = $post['group_id'];
			//更新Group的Access信息
	        $saveinfo = $this->insert_access($data);
			}
            else $this->error('操作失败！'); 
        }
        else $this->error($Model->getError());
    }

   /**
    	数据修改
    */
    public function update(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$post = I("post.");
		$Model = M(CONTROLLER_NAME);
		$where = "id =".$post['id'];
		if($post['username'] == "") $this->error("登录名不能为空");
		if($post['group_id'] == "") $this->error("管理员类型不能为空");

		$data['username'] = $post['username'];
		$data['nickname'] = $post['nickname'];
		$data['group_id'] = $post['group_id'];
		$data['uid'] = $post['id'];

        $gid = implode(",", $post['group_id']);
        $gid = ",".$gid.",";
        $data['type'] = $gid;


		/* 修改密码 */
		if($post['pw_old'] != "" or $post['pw_new'] != "" or $post['pw_renew'] != "" ){
			if($_SESSION['type'] != 1){ //不是管理员，则验证旧密码
				if($post['pw_old'] == "") $this->error("旧密码不能为空");
				$post['pw_old'] = FrontHash($post['pw_old']);
				$vo = $Model->where($where)->field("password")->find();
				if($post['pw_old'] != $vo['password']) $this->error("旧密码输入错误");
			}
			if($post['pw_new'] == "") $this->error("新密码不能为空");
			if($post['pw_renew'] == "") $this->error("确认新密码不能为空");	
			if($post['pw_new'] != $post['pw_renew']) $this->error("两次新密码不一致");
			
			$post['pw_new'] = FrontHash($post['pw_new']);
			$data['password'] = $post['pw_new'];
		}
		$result = $Model->where($where)->save($data);
		if($result){
	        $saveinfo = $this->insert_access($data); //更新Group的Access信息
	        $pub = A("Public");  
	        $saveinfo = $pub->saveAdminInfo($data); //更新用户session信息
		}
        else{
			$this->error("用户信息更新失败");
		}
    }

/**
		更新头像
*/
    public function head_upload(){
		$post_input = 'php://input';
		$save_path=  dirname( __FILE__ ) . "../../../../public/image/head/";
		$uniqid = uniqid();
		$postdata = file_get_contents( $post_input );
		if ( isset( $postdata ) && strlen( $postdata ) > 0 ) {
		$picname = $uniqid . '.jpg';
		$filename = $save_path.$picname;
		$handle = fopen( $filename, 'w+' );
		fwrite( $handle, $postdata );
		fclose( $handle );
		if ( is_file( $filename ) ) {
			
			//头像上传成功，文件名写入数据库
			if($_SESSION['upload_id'] != "") $id = $_SESSION['upload_id'];
			else $id = $_SESSION['id'];
			
			$Model = M("Admin");
			$data['head'] = $picname;
			$result = $Model->where("id = $id")->save($data);
			if($result) {
				$_SESSION['head'] = $picname;
				$_SESSION['upload_id'] = null;
				echo '头像上传成功!';
			}
			else {
				die("头像上传失败");
				exit ();
			}
		}
		else {
		die ( '文件错误!' );
		}
		}else {
		die ( '数据读取失败' );
		}
    
	}
    /**
	添加Admin_Group_Access
    */
    private function insert_access($data){
		$Model = M("AdminGroupAccess");
		$Model->where("uid = ".$data['uid'])->delete();
		$rulearr = array();
		//遍历所添加的用户组并压入数组；
		foreach($data['group_id'] as $k =>$v){
			$rulearr[] = array(
			'uid' => $data['uid'],
			'group_id' => $data['group_id'][$k],
			);
		}
		$access = $Model->addAll($rulearr);
		if($access) $this->success("操作成功");
		else $this->error("用户组分配失败");
    }
}
?>