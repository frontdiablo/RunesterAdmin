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
class PageCateController extends Controller
{
    /**
     * 
     * 数据添加Action
     * 
     */
    public function insert(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = D(CONTROLLER_NAME);
    	$cate_title = I("post.cate_title");
    	if($cate_title == "在此输入新的分类名称") $this->error("分类名称不能为空！");
		$create = $Model->create();
        if($create) {
			$result = $Model->add($create);
			if($result)$this->success('发布成功！');
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
  	    R('Public/pub_top');
		$post = I("post.");
        $Node = M(CONTROLLER_NAME);
        $vo = $Node->select();
        foreach($vo as $vo){
            $data['cate_title'] = $post["iName".$vo['cate_id']];
            $data['cate_sort'] = $post["iSort".$vo['cate_id']];
            $result = $Node->data($data)->where("cate_id = {$vo['cate_id']}")->save();
        }
        $this->success('更新完成！');
	}


    /**
     * 
     * 彻底删除（单项）
     * 
     */
    public function delete(){
        $id = I("get.id");
        $id = intval($id);
        if($id != 0){
            $Model = M(CONTROLLER_NAME);
            $where = "cate_id = $id";
            $result = $Model->where($where)->delete(); 
            if($result) $this->success('删除成功！'); 
            else $this->error('删除失败！');
        
        }
        else $this->error('传值错误！');
    }





}
?>