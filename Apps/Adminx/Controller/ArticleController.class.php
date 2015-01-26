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
class ArticleController extends CommonController
{
   
    /**
        前置操作方法
     */
   public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
        Load('@.list');
        Load('@.sidebar');
    }
    /**
        后置操作方法
     */
	public function _after_index(){unset($GLOBALS['vo']);}
	public function _after_recyclebin(){unset($GLOBALS['vo']);}
    /**
        列表页 Display
     */
    public function index() {
      $get = I("get.");
      //获取父分类标题
      $title = M("Category")->where("id = {$get['pid']}")->field("title")->find();
      if($title) $this->assign("cateTitle",$title['title']);
      else $this->assign("cateTitle","所有");
      $Model = M(CONTROLLER_NAME);
      $where[isDel] = array("eq",0);
      $order = "isTop DESC,sort ASC,CONVERT(pubDate,SIGNED) DESC,id DESC";

      //分类筛选
      if($get['pid'] != "") $where['path'] = array("like","%-{$get['pid']}-%");
      if($get['hide'] != "") $where['isHide'] = array("eq",$get['hide']);
      if($get['top'] != "") $where['isTop'] = array("eq",$get['top']);
      if($get['protect'] != "") $where['isProtect'] = array("eq",$get['protect']);
      if($get['date'] != "") $where['pubDate'] = array("eq",$get['date']);

      //搜索关键字显示设置
      $keyword = I("post.keyword");
      if($keyword != "") {
          $where['title'] = array("like","%$keyword%");
          $this->assign("keyword",$keyword);
          $this->assign("cateTitle","搜索结果");
      }
      else $this->assign("keyword","搜索...");

      //分页设置
      $PageNum = 20; //分页数
      $count = $Model->where($where)->count();
      $Page= new Page($count,$PageNum);
      $pageshow = $Page->show();
      //信息输出
      global $vo;
      $vo = $Model->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
      $this->assign("volist",$vo);
      $this->assign("pid",$get['pid']);
      if ($count > $PageNum) $this->assign('page',$pageshow);
      $this->display();    
    }

    /**
        回收站显示页面
     */
    public function recyclebin() {
      $Model = M(CONTROLLER_NAME);
      $where = array("isDel" => 1);
      $order = "sort ASC,id ASC";
      global $vo;
      $vo = $Model->where($where)->order($order)->select();
      $this->assign("volist",$vo);
      $this->display(CONTROLLER_NAME."/recycle");    
    }


    /**
        信息添加页面
     */
    public function add() {
    	echo C("HIDE_FIELD_PAGE_ALIAS");
      $cudate = date("Y-m-d H:i:s");
      $this->assign("cudate",$cudate);
      
      if(session("admin_nickname") == "")$author = session("admin_username");
      else $author = session('admin_nickname');
      $this->assign("author",$author);
      $this->display();    
    }

  /**
	     信息修改页面 Display
	 */
    public function edit() {
      $id = I("get.id");
      $Model = M(CONTROLLER_NAME);
      $ModelC = M(CONTROLLER_NAME."Content");
      $vo1 = $Model->where("id = ". $id)->find();
      $vo2 = $ModelC->where("content_pid = ". $id)->find();
      $vo = array_merge($vo1, $vo2);//合并数组
      //字段处理
      $vo['pubDate'] = forDate($vo['pubDate'],1,2);      
      $vo['description'] = br2nl($vo['description']);
      $vo['content'] = contentUnCompress($vo['content']);
      $this->assign("vo",$vo);
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
    			$result = $Model->add($create);
    			if($result){
					//如果发布成功，写入Article_Content
					$content['content_pid'] = $result;
					$content['content'] = I("post.content");
					$content['content'] = contentCompress($content['content']); //对内容进行压缩处理
					$content['setBanner'] = I("post.setBanner");
					$content['seoDescript'] = I("post.seoDescript");
					//SEO和关键字处理
					if(I("post.seoTitle") == "") $content['seoTitle'] = $create['title'];
					else $content['seoTitle'] = I("post.seoTitle");
					if(I("post.seoKeywords") == "") $content['seoKeywords'] = $create['title'];
					else $content['seoKeywords'] = I("post.seoKeywords");

					$data =  $this->ContentInsert($content);
					if($data) $this->success('发布成功！');
					else {
						$Model->where("id = $result")->limit(1)->delete(); //如果content写入失败，则删除数据
						$this->error('发布失败！');
					}
    			} // Result If
          else $this->error('发布失败！');      
      } // Create If
      else $this->error($Model->getError());
        
    }

   /**
        数据修改
    */
    public function update(){
      header("Content-type: text/html; charset=utf-8");
      R("Safe/isPost"); //判断是否为post提交
      $post = I("post.");
      $Model = D(CONTROLLER_NAME);
      $create = $Model->create();
      //分类path处理
      $path = addParent($post['pid']);
      $create['path'] = $path;

      if($create) {
          $result = $Model->save($create);
          //内容更新处理
          $content['content_id'] = $post['content_id'];
          $content['seoTitle'] = $post['seoTitle'];
          $content['seoKeywords'] = $post['seoKeywords'];
          $content['seoDescript'] = $post['seoDescript'];
          $content['setBanner'] = $post['setBanner'];
          $content['content'] = $post['content'];
          $content['content'] = contentCompress($content['content']); //对内容进行压缩处理 
          $this->ContentUpdate($content);  
          $this->success('修改完成！');
      } // Create If
      else $this->error($Model->getError());
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
		    $ModelC = M(CONTROLLER_NAME."Content");
		    $idArr = $_POST["artical_ID"];
		    if(count($idArr) == 0)  $this->error('请先选择需要删除的数据');
		    else{
			    for ($i = 0; $i < count($idArr); $i++) {
			        $where = array('content_pid'=> $idArr[$i],);
					$resultc =  $ModelC->where($where)->limit(1)->delete();
			    	$where2 = array('id'=> $idArr[$i],);
			    	$result =  $Model->where($where2)->limit(1)->delete();
			    }
			    $this->success('删除完成！');
		    }
	    }
	    //单项操作
	    else{
	    	$resultc =  M(CONTROLLER_NAME."Content")->where("content_pid = $id")->limit(1)->delete();
	    	$result =  M(CONTROLLER_NAME)->where("id = $id")->limit(1)->delete();
			$this->success('删除完成！');
	 	}
	}






    /**
        彻底删除（清空回收站）
     */
	public function recycle_empty(){
	    $Model = M(CONTROLLER_NAME);
	    $ModelC = M(CONTROLLER_NAME."Content");
		$vo = $Model->where("isDel = 1")->field("id")->select();
		foreach($vo as $v){
			$where = array('pid'=> $v['id'],);
			$resultc =  $ModelC->where($where)->limit(1)->delete();
		    if($resultc){
		    	$where = array('id'=> $v['id'],);
		    	$result =  $Model->where($where)->limit(1)->delete();
			}
		}
		$this->success('回收站已清空！');
	}

  /**
    信息表写入成功后写入Content
  */
  
  private function ContentInsert($data){
    $Model = M(CONTROLLER_NAME.'Content');
    $subresult = $Model->add($data);
    return  $subresult;
  }



  /**
    信息表更新成功后更新Content
  */
  private function ContentUpdate($data){
    $Model = M(CONTROLLER_NAME . 'Content');
    $subresult = $Model->save($data);
    return $subresult;
  }

}
?>