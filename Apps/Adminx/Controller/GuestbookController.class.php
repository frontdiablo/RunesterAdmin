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
class GuestbookController extends CommonController
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
		$Model = M(CONTROLLER_NAME);
        $order = "id DESC";
		$where['pid'] = 0;
		//分页设置
		$PageNum = 20; //分页数
		$count = $Model->where($where)->count();
		$Page= new Page($count,$PageNum);
		$pageshow = $Page->show();
		
        global $vo;
       	$vo= $Model->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign("volist",$vo);
        if ($count > $PageNum) $this->assign('page',$pageshow);
        
   		$this->display();
    }



    /**
	     信息修改页面 Display
	 */
    public function reply() {
    	$id = I("get.id","intval");
		$Model = M(CONTROLLER_NAME);
		$where['id'] = $id;
        $vo = $Model->where($where)->find();
        $this->assign("vo",$vo);
		$this->assign("id",$id);    
		$this->display();       
    }

    /**
	     留言回复数据写入
	 */
    public function insert() {
  		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
   		$post = I("post.");
    	$Model = D(CONTROLLER_NAME);
		$create = $Model->create();
		if($create) {
			$result = $Model->add($create);
			if($result){$this->success('回复成功！',U(CONTROLLER_NAME."/index"));}
			else {$this->error('回复失败！',U(CONTROLLER_NAME."/index"));} 
		}	// Create If
		else $this->error($Model->getError());
    }

}
?>