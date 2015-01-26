<?php
namespace Adminx\Controller;
use Think\Controller;
/**
 * PageController
 * 
 * @package Adminx
 * @author frontLon
 * @copyright 2014
 * @access public
 */
class NavController extends CommonController
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
        Load('@.list');
    }
    /**
     * 
     * 列表页 Display
     * 
     */
    public function index() {
		R("Sidebar/nav");
        $get = I("get.");
		$keyword = I("post.keyword");
		$Model = M(CONTROLLER_NAME);

		//判断cate_id是否存在，如果不存在取数据库第一项
        if($get['cate'] == ""){
			$cvo = M("Category")->where("cate_type = 'Nav'")->order("cate_id ASC")->field("cate_id")->limit(1)->select();
			$get['cate'] = $cvo[0]['cate_id'];
		}
		$get['pid'] = intval($get['pid']);
		$this->assign("pid",$get['pid']);
		$this->assign("cate_id",$get['cate']);
   		$this->display();    
    }




    /**
 	 *
	 * 添加新页面 Display
	 *
	 */
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
        $where = array("id" => $id);
        $vo = $Model->where($where)->find();
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
    * 数据添加Action
    * 
    */
    public function insert(){
   		header("Content-type: text/html; charset=utf-8");
   		R("Safe/isPost"); //判断是否为post提交
    	$Model = M(CONTROLLER_NAME);
		$post = I("post.");
		$pidArr = explode("_",$post['pid']);
		$path = addParent($pidArr[0]);
		if($post['type'] == "page"){
			$vo = M("Page")->where("id = ".$post['type_page'])->find();
			$data['title'] = $vo['title'];
			$data['alias'] = $vo['alias'];
			$data['cid'] = $vo['cid'];
			$data['pid'] = $pidArr[0];
			$data['level'] = $pidArr[1];
			$data['path'] = $path;
			$data['type'] = "page";
			$data['cate'] = $post['cate'];
			$data['description'] = $vo['description'];
			$data['isHide'] = $post['isHide'];
			$data['isProtect'] = $vo['isProtect'];
			$data['target'] = $post['target'];
			$data['sort'] = $vo['sort'];
			$data['setBanner'] = $vo['setBanner'];
		}
		elseif($post['type'] == "article"){
			$vo = M("ArticleCate")->where("cate_id = ".$post['type_article'])->find();
			$data['title'] = $vo['cate_title'];
			$data['alias'] = $vo['cate_alias'];
			$data['pid'] = $pidArr[0];
			$data['level'] = $pidArr[1];
			$data['path'] = $path;
			$data['type'] = "article";
			$data['cate'] = $post['cate'];
			$data['isHide'] = $post['isHide'];
			$data['isProtect'] = $vo['cate_isProtect'];
			$data['target'] = $post['target'];
			$data['sort'] = $vo['cate_sort'];
		}
		elseif($post['type'] == "dir"){
			$data['title'] = $post['title'];
			$data['pid'] = $pidArr[0];
			$data['level'] = $pidArr[1];
			$data['path'] = $path;
			$data['type'] = "dir";
			$data['cate'] = $post['cate'];
			$data['isHide'] = $post['isHide'];
			$data['target'] = $post['target'];
		}
		elseif($post['type'] == "url"){}
		$result = $Model->add($data);
		if($result)	$this->success('发布成功！');
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
    	$pidArr = explode("_",$post['pid']);
		$Model = D(CONTROLLER_NAME);
		$create = $Model->create();
		//分类path处理
		$path = addParent($pidArr[0]);
		$create['path'] = $path;
		$create['level'] = $pidArr[1];
        if($create) {
			$result = $Model->save();
			if($result)	$this->success('修改完成！');
			else $this->error("修改失败！");
        }
        else $this->error($Model->getError());
    }



   /**
    * 
    * 分类修改Action
    * 
    */ 
    
	public function cateEdit(){
  		$Model = M(CONTROLLER_NAME);
	 	$idArr = I("post.iId");
	    $pid = I("post.iCate");
	    for ($i = 0; $i < count($idArr); $i++) {
	    	$pidArr[$i] = explode("_",$pid[$i]);
	        $where = array('id'=> $idArr[$i],);
	        $path = addParent($pidArr[$i][0],2);
			$data['pid'] = $pidArr[$i];
			$data['path'] = $path;
			$data['level'] = $levelArr[$i];
			
	    	$result = $Model->where($where)->save($data);
	    	echo $Model->getLastSql() . "<br />";
	    }
	    $this->success('分类修改完成！');
	}
	


}
?>