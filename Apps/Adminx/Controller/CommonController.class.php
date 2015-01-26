<?php
namespace Adminx\Controller;
use Think\Controller;




class CommonController extends Controller
{
	
    /**
        前置操作方法
     */
   public function _initialize(){
        R('Public/pub_top');

    }
	/**
		排序
    */
	public function sort(){
		$get = I("get.");
		$Model = M(CONTROLLER_NAME);
	 	$idArr = I("post.iId");
	    $sortArr = I("post.iSort");
	    for ($i = 0; $i < count($idArr); $i++) {
	        $where['id'] = $idArr[$i];
	        $data['sort'] = $sortArr[$i];
	        $result = $Model->where($where)->save($data);
	    }
	    $this->success('排序完成！');
	}

    /**
		设定显示隐藏
    */
	public function show(){
		$get = I("get.","intval");
		$Model = M(CONTROLLER_NAME);
		switch($get['state']){
			case 0 :$data['isHide'] = 1;break;
			case 1 :$data['isHide'] = 0;break;
			default : $this->error("传值错误");break;
		}
		//批量操作
		if($get['id'] == 0){
			$idArr = I("post.artical_ID");
			if(count($idArr) == 0)  $this->error('请先选择要操作的数据');
		    else{
		   		$where['id'] = array("in",$idArr);
		   		$result = $Model->where($where)->save($data);
		   		if($result) $this->success("操作成功");
		   		else $this->error("操作失败");
		    }
		}
		//单项操作
		else{
			$where['id'] = $get['id'];
			$result = $Model->where($where)->save($data);
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}

    /**
		设定置顶功能
    */
	public function top(){
		$get = I("get.","intval");
		$Model = M(CONTROLLER_NAME);
		$where = array('id' => $get['id']);
		switch($get['state']){
			case 0 : $data['isTop'] = 1;break;
			case 1 : $data['isTop'] = 0;break;
			default : $this->error("传值错误");break;
		}
		//批量操作
		if($get['id'] == 0){
			$idArr = I("post.artical_ID");
			if(count($idArr) == 0)  $this->error('请先选择要操作的数据');
		    else{
		   		$where['id'] = array("in",$idArr);
		   		$result = $Model->where($where)->save($data);
		   		if($result) $this->success("操作成功");
		   		else $this->error("操作失败");
		    }
		}
		//单项操作
		else{
			$where['id'] = $get['id'];
			$result = $Model->where($where)->save($data);
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}

    /**
		设定保护状态
    */
	public function protect(){
		$get = I("get.");
		$Model = M(CONTROLLER_NAME);
		$where = array('id' => $get['id']);
		switch($get['state']){
			case 0 : $data['isProtect'] = 1;break;
			case 1 : $data['isProtect'] = 0;break;
			default : $this->error("传值错误");break;
		}
		//批量操作
		if($get['id'] == 0){
			$idArr = I("post.artical_ID");
			if(count($idArr) == 0)  $this->error('请先选择要操作的数据');
		    else{
		   		$where['id'] = array("in",$idArr);
		   		$result = $Model->where($where)->save($data);
		   		if($result) $this->success("操作成功");
		   		else $this->error("操作失败");
		    }
		}
		//单项操作
		else{
			$where['id'] = $get['id'];
			$result = $Model->where($where)->save($data);
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}
    /**
		设定状态
    */
	public function status(){
		$get = I("get.");
		$Model = M(CONTROLLER_NAME);
		switch($get['state']){
			case 0 : $data['status'] = 1;break;
			case 1 : $data['status'] = 0;break;
			default : $this->error("传值错误");break;
		}
		//批量操作
		if($get['id'] == 0){
			$idArr = I("post.artical_ID");
			if(count($idArr) == 0)  $this->error('请先选择要操作的数据');
		    else{
		   		$where['id'] = array("in",$idArr);
		   		$result = $Model->where($where)->save($data);
				if($result) $this->success("操作成功");
		   		else $this->error("操作失败");
		    }
		}
		//单项操作
		else{
			$where['id'] = $get['id'];
			$result = $Model->where($where)->save($data);
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
	}
	/**
		回收站操作
    */
	public function recycle(){
		$get = I("get.");
		$id = intval($get['id']);
		$Model = M(CONTROLLER_NAME);
		switch($get['state']){
			case 0 : $data = array("isDel" => 1,"delDate" => unixtime());$text="删除";break;
			case 1 : $data = array("isDel" => 0,"delDate" => "");$text="还原";break;
			default : $this->error("传值错误");break;
		}
		//批量操作
		if($id == ""){
			$idArr = I("post.artical_ID");
		    $ProtectArr = I("post.protect_ID");
			if(count($idArr) == 0)  $this->error('请先选择要删除的数据');
		    else{
		   		$where['id'] = array("in",$idArr);
		   		$where['isProtect'] = 0;
				$result = $Model->where($where)->save($data);
				if($result) $this->success($text.'完成！');
				else $this->error($text.'失败');
		    }
		}
		//单项操作
		else{
			$where['id'] = $id;
			$result = $Model->where($where)->save($data);
			if($result) $this->success($text.'完成！');
			else $this->error($text.'失败');
		}
	}
   /**
    	清空回收站
    */
	public function recycle_empty(){
	    $Model = M(CONTROLLER_NAME);
    	$where = array('isDel'=> 1);
    	$result =  $Model->where($where)->delete();
		$this->success('回收站已清空！');
	}

   /**
    	彻底删除
    */
	public function delete(){
	    $get = I("get.");
	    $id = intval($get['id']);
	    $Model = M(CONTROLLER_NAME);
	    //批量操作
	    if($id == 0){
	        $idArr = I("post.artical_ID");
		    if(count($idArr) == 0)  $this->error('请先选择需要删除的数据');
		    else{
		    	$where['id'] = array("in",$idArr);
		   		$where['isProtect'] = 0;
				$result = $Model->where($where)->delete();
				if($result) $this->success('删除完成！');
				else $this->error($text.'删除失败！');
    		}
	    }
	    //单项操作
	    else{
		    $where["id"] = $id;
		    $result =  $Model->where($where)->limit(1)->delete();
			if($result)	$this->success('删除成功！');
		 	else $this->error('删除失败！');
	 	}
	}

}
?>