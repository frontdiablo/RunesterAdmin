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
class ImController extends CommonController
{
    /**
     * 
     * 前置操作方法
     * 
     */
   public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
        Load('@.list');
        Load('@.sidebar');
    }
	//后置操作
	public function _after_index(){unset($GLOBALS['vo']);}
    public function index() {
	   	$Model = M(CONTROLLER_NAME);
        $pid = I("get.pid","intval");
        if($pid != 0) $where = "type = $pid";
        global $vo;
		$vo = $Model->where($where)->order("sort ASC,id ASC")->select();
	    $this->assign("volist",$vo);
	    $this->assign("pid",$pid);
   		$this->display();    
    }

 /**
     * 
     * 信息添加页面
     * 
     */
    public function add() {
        $type = I("get.type");
        if($type == "banner") $typeval = "0";
        else $typeval = "";
        $this->assign("typeval",$typeval);
		$this->assign("type",$type);
		
		$cudate = date("Y-m-d H:i:s");
        $this->assign("cudate",$cudate);
       	
   		$this->display();    
    }

    /**
 	 *
	 * 信息修改页面 Display
	 *
	 */
    public function edit() {
    	$id = I("get.id");
		$Model = M(CONTROLLER_NAME);
        $vo = $Model->where("id = ". $id)->find();
        $this->assign("vo",$vo);
        
        $type = I("get.type");
        $this->assign("type",$type);
		$this->display();       
		  
    }

  /**
   ***************************************************************
   * 
   * 
   * 
   * 
   * 
   * 
   * 
   *					 Action 操作开始
   * 
   * 
   * 
   * 
   * 
   * 
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
		$create = $Model->create();
        if($create) {
			$result = $Model->add($create);
			if($result){
				$this->success('发布成功！');
			}
            else $this->error('发布失败！'); 
        }
        else $this->error($Model->getError());
    }

   /**
    * 
    * 数据修改
    * 
    */
    public function update(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$post = I("post.");
		$Model = D(CONTROLLER_NAME);
		$create = $Model->create();

        if($create) {
			$result = $Model->save($create);
			$this->success('修改完成！');
        }
        else $this->error($Model->getError());
    }
}
?>