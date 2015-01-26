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
class AdminRuleCateController extends CommonController
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
        管理节点组
     */
    public function index() {
      R('Sidebar/admin_rule_cate');
      Load('@.list');
      $Model = M(CONTROLLER_NAME);
      $get = I("get.");
      if($get['module'] != "") $where['module'] = $get['module'];
      if($get['pid'] != "") $where['pid'] = $get['pid'];
      $order = "pid ASC,sort ASC";
      //分页设置
      $PageNum = 10; //分页数
      $count = $Model->where($where)->count();
      $Page= new Page($count,$PageNum);
      $pageshow = $Page->show();
      global $vo;
      $vo = $Model->where($where)->order($order)->field($field)->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign("volist",$vo);
      $this->assign("pid",$get['pid']);
      
      if ($count > $PageNum) $this->assign('page',$pageshow);
        $this->display("AdminRule/index_cate");  
    }

      /**
        添加节点组
     */
    public function add() {
      $this->display("AdminRule/add_cate");    
    }

    /**
       编辑节点组
   */
    public function edit() {
      $id = I("get.id");
      $id = intval($id);
      if($id > 0){
        $Model = M(CONTROLLER_NAME);
        $vo = $Model->where("id = ".$id)->find();
        $this->assign("vo",$vo);
        $this->display("AdminRule/edit_cate");
      }
      else{
        $this->error("传值错误");
      }
    }
    /**
        节点组添加Action
     */
    public function insert(){
      header("Content-type: text/html; charset=utf-8");
      $post = I("post.");
      $level = explode("_", $post['level']);
      
      R("Safe/isPost"); //判断是否为post提交
      $Model = D(CONTROLLER_NAME);
      $create = $Model->create();
      if($create) {
          $create['pid'] = $level[0];
          $create['level'] = $level[1];
          $create['module'] = "Adminx";
          $result = $Model->add($create);
          if($result){
            $this->success('添加成功！');
          }
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
      $level = explode("_", $post['level']);
      $Model = D(CONTROLLER_NAME);
      $create = $Model->create();
      if($create){
          $create['pid'] = $level[0];
          $create['level'] = $level[1];
          $create['module'] = "Adminx";
        $result = $Model->save($create);
        if($result){$this->success('修改完成！');}
            else{$this->error("修改失败");}
      }
      else $this->error("Create失败");
    }

}
?>