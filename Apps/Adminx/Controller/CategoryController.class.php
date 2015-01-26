<?php
namespace Adminx\Controller;
use Think\Controller;

class CategoryController extends CommonController
{
	
	
    /**
        前置操作方法
     */
   public function _initialize(){
        R('Public/pub_top');
    }


  /**
	     信息修改页面 Display
	 */
    public function edit() {
      $id = I("get.id");
      $Model = M(CONTROLLER_NAME);
      $vo = $Model->where("id = ". $id)->find();
      $this->assign("vo",$vo);
	  $this->display();
    }

  /**
    插入新分类
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
        else $this->error("Create失败"); 
    }

  /**
    多条更新
  */
	public function update_multi(){
		    $post = I("post.");
        $iId = $post['iId'];
        $Node = M(CONTROLLER_NAME);
        foreach($iId as $id){
            $data['cate_title'] = $post["iName".$id];
            $data['cate_sort'] = $post["iSort".$id];
            $where = array('cate_id' => $id);
            $result = $Node->data($data)->where($where)->limit(1)->save();
        }
        $this->success('更新完成！');
	}
   /**
    	彻底删除（单项）
    */
	public function delete(){
	    $get = I("get.");
	    $id = intval($get['id']);
	    if($id == 0) $this->error("传值错误");
	    $where["cate_id"] = $id;
	    $result =  M(CONTROLLER_NAME)->where($where)->limit(1)->delete();
		if($result){
			$this->success('删除成功！');
		}
	 	else $this->error('删除失败！');
	 	
	}
}
?>