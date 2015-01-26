<?php
namespace Adminx\Controller;
use Think\Controller;
use Think\Page;
use Admin\Model\AdminRuleModel;
use Admin\Model\AdminGroupModel;
/**
 * PageController
 * 
 * @package Adminx
 * @author frontLon
 * @copyright 2014
 * @access public
 */
class AdminGroupController extends CommonController
{
	
	
    /**
     * 
     * 前置操作方法
     * 
     */
   public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.auth');
        Load('@.HtmlDB');
    }
	//后置操作
	public function _after_index(){unset($GLOBALS['vo']);}
    /**
     * PageController::index()
     * 
     * 页面管理列表
     * 
     * @return void
     */
    public function index() {
        Load('@.list');
	 	$type = I("get.type");
		$Model = M(CONTROLLER_NAME);
	    //分页设置
		$PageNum = 10; //分页数
        $count = $Model->where($where)->count();
        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();
        global $vo;
		$vo = $Model->where($where)->order("id ASC")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("volist",$vo);
		$this->assign("type",$type);
   		$this->display("Admin/group");    
    }


    /**
     * 
     * 信息添加页面
     * 
     */
    public function add() {	
    	$Model = M("AdminNode");
    	$vo = $Model->order("sort ASC,id ASC")->select();
    	$this->assign("volist",$vo);
   		$this->display("Admin/group_add");    
    }

    /**
 	 *
	 * 信息修改页面 Display
	 *
	 */
    public function edit() {
		
		$Model = M(CONTROLLER_NAME);
		$id = I("get.id");
        $vo = $Model->where("id = ".$id)->find();
        $this->assign("vo",$vo );

    	$Node = M("AdminNode");
    	$field = array('id','name','title','pid');
    	$node = $Node->order("sort ASC,id ASC")->field($field)->select();
	
    	$access = M('AdminAccess')->where("role_id = $id")->getField('node_id',true);
    	$node = node_merge($node,$access);	
    
    	
        $this->assign("volist",$node);
        
		$this->display("Admin/group_edit");       
		  
    }

	//用户组授权
    public function access() {
        $id = I("get.id");
		$Model = M("AdminGroup");
        $where = array("id" => $id);
        $vo = $Model->where($where)->field("id,rules")->find();

        $this->assign("vo",$vo);
		$this->display("Admin/group_auth");
		  
    }
  /**
   ***************************************************************
    
    
    
    
    
    
    
   					 Action 操作开始
    
    
    
    
    
    
   ***************************************************************
   */
	

    /**
     * 
     * 数据添加Action
     * 
     */
    public function insert(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = D(CONTROLLER_NAME);
    	$AModel = M("AdminGroup");
		$create = $Model->create();
        if($create) {
        	$post = I("post.");
			$result = $Model->add($create); //添加用户组
			if($result) $this->success('用户组添加成功！');
            else $this->error('用户组添加失败！'); 
        }
        else $this->error("Create失败");
    }
 
   /**
    * 
    * 数据修改
    * 
    */
    public function update(){
  		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = D(CONTROLLER_NAME);
    	$AModel = M("AdminAccess");
    	$post = I("post.");
		$create = $Model->create();
        if($create) {
			$result = $Model->save($create); //修改用户组信息
			$AModel->where("role_id = ".$post['id'])->delete(); //清空原有权限
			foreach($post['access'] as $v){
				$tmp = explode("_",$v);
				$data[] = array(
					'role_id' => $post['id'],
					'node_id' => $tmp[0],
					'level' => $tmp[1],
				);
			}
			$access  =$AModel->addAll($data);//插入新的权限
			if($access) $this->success('修改成功！');
			else $this->error("修改失败");
            
        }
        else $this->error(Create失败！);
    }

/**
  *
  将Rule添加到Group
  *
*/
	public function update_access(){
	    $id = I("post.id");
	    $access = I("post.access");
	    $accesschar = implode(",", $access);
	    $Model = M("AdminGroup");
	    $where = array("id" => $id);
	    $data['rules'] = $accesschar;
	    $result = $Model->where($where)->save($data);
	    if($result) $this->success("权限设定成功");
	    else $this->error("权限设定失败");

	}

    
}
?>