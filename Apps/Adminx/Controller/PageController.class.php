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
class PageController extends CommonController
{
	public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
        Load('@.list');
        Load('@.sidebar');
    }
	//后置操作
	public function _after_index(){unset($GLOBALS['vo']);}
	public function _after_recyclebin(){unset($GLOBALS['vo']);}
	
    /**
        列表页 Display
     */
    public function index() {
        $get = I("get.");
		$keyword = I("post.keyword");
		$Model = M(CONTROLLER_NAME);

		//获取信息列表
		$where[isDel] = array("eq",0);
		$where[type] = array("eq","page");
		
        $order = "sort ASC,id ASC";

        //搜索关键字显示设置
        if($keyword != "") {
        	$where['title'] = array("like","%$keyword%");
        	$this->assign("keyword",$keyword);
        }
        else {$this->assign("keyword","搜索...");}
        
        //分类筛选
        if($get['pid'] != "") $where['pid'] = $get['pid'];
		if($get['hide'] != "") $where['isHide'] = array("eq",$get['hide']);
		if($get['protect'] != "") $where['isProtect'] = array("eq",$get['protect']);
		
		//分页设置
		$PageNum = 20; //分页数
		$count = $Model->where($where)->count();
		$Page= new Page($count,$PageNum);
		$pageshow = $Page->show();
		
        global $vo;
       	$vo= $Model->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("volist",$vo);
        $this->assign("pid",$get['pid']);
        if ($count > $PageNum) $this->assign('page',$pageshow);
   		$this->display();
    }


    /**
	     回收站显示页面 Display
	 */
    public function recyclebin() {
		$Model = M(CONTROLLER_NAME);
        $where[isDel] = array("eq",1);
        $where[type] = "page";
        if($get['pid'] != "") $where['pid'] = $get['pid'];
        $order = "sort ASC,id ASC";
        global $vo;
        $vo = $Model->where($where)->order($order)->select();
        $this->assign("volist",$vo);        
   		$this->display(CONTROLLER_NAME."/recycle");
    }


    /**
	     添加新页面 Display
	 */
    public function add() {
   		$this->display();
    }

    /**
	     信息修改页面 Display
	 */
    public function edit() {
    	$id = I("get.id");
		$Model = M(CONTROLLER_NAME);
        $where = array();
        $vo = $Model->where("id = ". $id)->find();
        $vo['content'] = contentUnCompress($vo['content']);
        $this->assign("vo",$vo);
        //获取父分类标题
        $title = M("Category")->where("id = {$vo['pid']}")->field("title")->find();
        $this->assign("cateTitle",$title['title']);
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
            //分类path处理
			$path = addParent(I("post.pid"));
			$create['path'] = $path;
			//关键字处理
			
			if(I("post.seoTitle") == "") $create['seoTitle'] = $create['title'];
			else $create['seoTitle'] = I("post.seoTitle");
				
			if(I("post.seoKeywords") == "")	$create['seoKeywords'] = $create['title'];
            else $create['seoKeywords'] = I("post.seoKeywords");

			$result = $Model->add($create);
			if($result){
     				$this->success('发布成功！');
			}
            else $this->error('发布失败！'); 
        }
        else $this->error($Model->getError());
    }

   /**
        数据修改Action
    */
    public function update(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$post = I("post.");
		$Model = D(CONTROLLER_NAME);
		$create = $Model->create();
        if($create) {
			$result = $Model->save();
			if($result)	$this->success('修改完成！');
			else $this->error("修改失败");
        }
        else $this->error($Model->getError());
    }
}
?>