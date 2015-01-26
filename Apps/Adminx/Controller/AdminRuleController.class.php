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
class AdminRuleController extends CommonController
{
	
	
  /**
    前置操作方法
  */
  public function _initialize(){
  R('Public/pub_top');
  R('Public/pub_sidebar');
  Load('@.HtmlDB');
  Load('@.auth');
  }
	/**
    后置操作
  */
	public function _after_index(){unset($GLOBALS['vo']);}
    /**
        页面管理列表
     */
    public function index() {
      R('Sidebar/admin_rule');
      Load('@.list');
      $Model = M(CONTROLLER_NAME);
      $get = I("get.");
      if($get['pid'] != "") $where['pid'] = $get['pid'];
      $order = "sort ASC,id ASC";
      //分页设置
      $PageNum = 30; //分页数
      $count = $Model->where($where)->count();
      $Page= new Page($count,$PageNum);
      $pageshow = $Page->show();
      global $vo;
  		$vo = $Model->where($where)->order($order)->field($field)->limit($Page->firstRow.','.$Page->listRows)->select();
  		$this->assign("volist",$vo);
  		$this->assign("pid",$get['pid']);
  		
  		if ($count > $PageNum) $this->assign('page',$pageshow);
     		$this->display();    
    }


    /**
        信息添加页面
     */
    public function add() {
   		$this->display();    
    }

    /**
	     信息修改页面 Display
	 */

    /**
	     信息修改页面 Display
	 */
    public function edit() {
  		$Model = M(CONTROLLER_NAME);
  		$id = I("get.id");
      $vo = $Model->where("id = ".$id)->find();
      $this->assign("vo",$vo);
  		$this->display();
    }

    /**
        数据添加Action
     */
    public function insert(){
    	header("Content-type: text/html; charset=utf-8");
      $post = I("post.");
    	$name = explode("/",$post['name']);
      $count = count($name);
      if($count != 3) $this->error("标识格式错误");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = D(CONTROLLER_NAME);
		  $create = $Model->create();
      if($create) {
        	$create['module'] = $name[0];
          $create['pid'] = $this->get_cate_id($name[1]);
		    	$result = $Model->add($create);
			if($result)	$this->success('添加成功！');
      else $this->error('添加失败！'); 
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
    	$name = explode("/",$post['name']);
      $count = count($name);
      if($count != 3) $this->error("标识格式错误");
  		$Model = D(CONTROLLER_NAME);
  		$create = $Model->create();
  		if($create){
          	$create['module'] = $name[0];
            $create['pid'] = $this->get_cate_id($name[1]);
  			$result = $Model->save($create);
  			if($result)$this->success('修改完成！');
  	    else $this->error("修改失败");
  		}
  		else $this->error("Create失败");
    }

    /**
      传入控制器名称，返回节点组的id，用户插入或更新节点
    */
    private function get_cate_id($controller){
        $Model = M(CONTROLLER_NAME."Cate");
        $where = array('controller' => $controller);
        $vo = $Model->where($where)->field("id")->find();
        if(!$vo) $this->error("不存在此控制器，请先添加控制器在进行此操作。"); 
        return $vo['id'];
    }
}
?>