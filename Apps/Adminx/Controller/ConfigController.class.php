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
class ConfigController extends Controller
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
        Load('@.config');
    }
    /**
     * PageController::index()
     * 
     * 页面管理列表
     * 
     * @return void
     */
    public function web() {
	   	$Model = M("ConfigWeb");
        $vo = $Model->where("web_id = 1")->find();
	    $this->assign("vo",$vo);
	    $this->display();
		     
    }
    public function mail() {
	   	$Model = M("ConfigMail");
        $vo = $Model->where("id = 1")->find();
	    $this->assign("vo",$vo);
	    $this->display();
		     
    }
    public function home() {
	   	$Model = M("ConfigHome");
        $vo = $Model->select();
	    $this->assign("vo",$vo);
	    $this->display();
		     
    }
     public function advance() {
     	$Model = M("ConfigField");
        $vo = $Model->where("pid = 0")->select();
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
	
	/* 网站信息修改 */
	public function update_web(){
		$post = I("post.");
		$Model = D("ConfigWeb");
		$create = $Model->create();
        if($create) {
		$where = array('id'=> 1);
		$result = $Model->where($where)->save();
		if($result) {
			$setfile='./public/Conf/web.config.php';
			write_file($setfile,"WEB",$post); //将配置写入配置文件
			$this->success('修改完成！');
		}
		else $this->error('修改失败');
		}
  		else $this->error($Model->getError());
	}

	/* 邮件设置修改 */
	public function update_mail(){
		$Model = D("ConfigMail");
		$create = $Model->create();
        if($create) {
		$result = $Model->where()->save();
		if($result) $this->success('修改完成！');
		else $this->error('修改失败');
		}
  		else $this->error($Model->getError());
	}

	/* 首页显示信息修改 */
	public function update_home(){
		$post = I("post.");
		$namearr = $post['name'];
		$Model = D("ConfigHome");
		//清空所有数据
		$clear = $Model->where("id != 0")->delete();
		if($clear){
			//重新写入信息
			foreach($namearr as $key => $narr){
				$data['name'] = $namearr[$key];
				$data['alias'] = $post['alias_'.$key];
				$data['content'] = $post['content_'.$key];
				$result = $Model->data($data)->add();
			}
			$this->success('修改完成！');
		}
  		else $this->error("旧数据清空失败");
	}

	public function update_advance(){
		//写入数据库
		$Model = M("ConfigField");
		$fieldArr = I("post.fields");
		$where['pid'] = array("neq",0);
   		$where['id'] = array("in",$fieldArr);
  		$data['value'] ="false";
   		$result1 = $Model->where($where)->save($data);
   		$where['id'] = array("not in",$fieldArr);
  		$data['value'] ="true";
   		$result2 = $Model->where($where)->save($data);
  		//写入配置文件
  		$vo = $Model->where("value = 'true'")->field("name,value")->select();
  		foreach($vo as $vo){$arr[$vo['name']] = $vo['value'];}
		$setfile='./public/Conf/field.config.php';
		write_file($setfile,"HIDE_FIELD",$arr);
	    $this->success("操作完成");
	}


}
?>