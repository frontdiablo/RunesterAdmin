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
class FavoriteController extends CommonController
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
    //header部分显示
     public function header_display() {
     	$Model = M("Favorite");
     	$voC = M("Category")->where("cate_type = 'Favorite'")->field("cate_id")->order("cate_sort ASC,cate_id ASC")->select();
		 foreach($voC as $key=>$voC){
     		$where['type'] = $voC['cate_id'];
    		$vo[$key] = $Model->where($where)->order("sort ASC,id ASC")->field("name,url")->select();
    		$this->assign("vo".$key,$vo[$key]);
     	}
   		$this->display();    
    }

    //搜索引擎提交
     public function index() {
	   	$Model = M(CONTROLLER_NAME);
	   	Load('@.list');
        $get = I("get.");
        if($get['pid'] != "") $where['type'] = intval($get['pid']);
		global $vo;
		$vo = $Model->where($where)->order("sort ASC,id DESC")->select();
	    $this->assign("volist",$vo);
	    $this->assign("pid",$get['pid']);
   		$this->display();    
    }
    public function add() {
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
    * 添加新工具
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
				$this->success('添加成功！');
			}
            else $this->error('添加失败！'); 
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