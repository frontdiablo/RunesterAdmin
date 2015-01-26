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
class AdvController extends CommonController
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
        Load('@.sidebar');
        }
	//后置操作
	public function _after_index(){unset($GLOBALS['vo']);}
	public function _after_recyclebin(){unset($GLOBALS['vo']);}

    /**
     * PageController::index()
     * 
     * 页面管理列表
     * 
     * @return void
     */
    public function index() {
        Load('@.list');
	 	$get = I("get.");
		$Model = M("Adv");
	 	$where["isDel"] = array("eq",0);
	 	if($get['pid'] != "") $where['type'] = array("eq",$get['pid']);
	 	if($get['hide'] != "") $where['isHide'] = array("eq",$get['hide']);
	 	//if($get['pid'] != "") $where['pid'] = array("eq",$get['pid']);
	    //分页设置
		$PageNum = 10; //分页数
        $count = $Model->where($where)->count();
        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();
        global $vo;
		$vo = $Model->where($where)->order("sort ASC,id ASC")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("volist",$vo);
		$this->assign("pid",$get['pid']);
   		$this->display();    
    }

    /**
     * 
     * 回收站显示页面
     * 
     */
    public function recyclebin() {
		Load('@.list');
		$type = I("get.type");
		$Model = M(CONTROLLER_NAME);
        $where["isDel"] = array("eq",1);
        $order = "sort ASC,id ASC";
        global $vo;
        $vo = $Model->where($where)->order($order)->select();
        $this->assign("volist",$vo);        
   		$this->display(CONTROLLER_NAME."/recycle");    
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
		$vo['description'] = br2nl($vo['description']);
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