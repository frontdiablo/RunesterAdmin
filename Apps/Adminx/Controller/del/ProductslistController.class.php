<?php

class ProductslistAction extends Action
{

    public function index() {
        R('Public/pub_top');
        Load('@.products');
        $pid = $this->_get("pid");
        $Model = M("Product");
        
        if($pid == "") $where = "ProLevel = 1";
        else {
            $where = "ProPid = $pid ";
            $count = $Model->where("ProPid = $pid and ProType = 1 ")->select();
            if($count == 0) $where = "ProId = $pid";
        }
        
        $vo = $Model->where($where)->order("ProSort ASC,ProId ASC")->select();

        $this->assign("vo",$vo);
        $this->display("products:index");
    }


    public function delPro(){
        $id = $this->_get("id");
        $Model = M("Product");
        $where = array('ProId'=>$id);
        $result = $Model->where($where)->delete(); 
        if($result) $this->success('删除成功！'); 
        else $this->error('删除失败！');
    }

    public function delCate(){
        $id = $this->_get("id");
        $Model = M("Product");
        $where = array('ProPid'=>$id);
        $count = $Model->where($where)->count();
        
        if($count != 0) $this->error('该分类下存在子分类或商品，请先删除该分类下的所有内容再执行操作');
        else{
            $where = array('ProId'=>$id);
            $result = $Model->where($where)->delete(); 
            if($result) $this->success('删除成功！'); 
            else $this->error('删除失败！');
        }
    }

//添加一级大分类
    public function CateFirstAdd() {
        R('Public/pub_top');
        
        $Node = M('Product');

        $iCateFirstName = $this->_post("iCateFirstName");
        
        if($iCateFirstName == "") $this->error('请填写大类名称');

        $data['ProPid'] = 0;
        $data['ProLevel'] = 1;
        $data['ProType'] = 1;
        $data['ProName'] = $iCateFirstName;
        $result = $Node->data($data)->add();

        if(!$result) {
              $this->error('添加失败！');
        }
        else $this->success('添加成功！');
        
    }
        
 //添单位名称
    public function UnitAdd() {
        R('Public/pub_top');
        
        $Node = M('ProductUnits');

        $iUnits = $this->_post("iUnits");
        
        if($iUnits == "") $this->error('请填写单位名称');

        $data['UnitName'] = $iUnits;
        $result = $Node->data($data)->add();

        if(!$result) {
              $this->error('添加失败！');
        }
        else $this->success('添加成功！');
        
    }   
//删除单位名称
    public function delUnit(){
        $id = $this->_get("id");
        $Model = M("ProductUnits");
        $where = array('UnitId'=>$id);
        $result = $Model->where($where)->delete(); 
        if($result) $this->success('删除成功！'); 
        else $this->error('删除失败！');
    }


//商品大类信息修改（名称、排序）
    public function CateFirstUpdateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = M('Product');

        $vo = $Node->where("ProPid = 0")->select();
        foreach($vo as $vo){
            $data['ProSort'] = $this->_post("iSort".$vo['ProId']);
            $data['ProName'] = $this->_post("isbCateName".$vo['ProId']);
             $result = $Node->data($data)->where("ProId = {$vo['ProId']}")->save();
        }
        $this->success('更新完成！');
    }


//单位名称排序
    public function UnitUpdateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = M('ProductUnits');
        $vo = $Node->select();
        foreach($vo as $vo){
            $data['UnitSort'] = $this->_post("iSortUnit".$vo['UnitId']);
            $data['UnitName'] = $this->_post("isbUnitName".$vo['UnitId']);
            $result = $Node->data($data)->where("UnitId = {$vo['UnitId']}")->save();
        }
        $this->success('更新完成！');
    }



//更新数据缓存，将商品和分类写入js
    public function ProcacheUpdate(){
        header("Content-type: text/html; charset=utf-8");
        Load('@.linkagesel');
        $file = $_SERVER['DOCUMENT_ROOT']."/home/resource/function/linkagesel/jquery.linkagesel-products.js";
        $fileopen=fopen($file,'w+');
        $link = linkagesel();
        if(fwrite($fileopen,$link)){
            fclose($fileopen);
            $this->success("数据写入成功！");
        }
        else $this->error("数据写入失败！");
    }


}
?>