<?php

class EnterpriseAction extends Action
{

    public function index() {
        R('Public/pub_top');
        Load('@.user');
        $Model = M("AdminGroup");
        $where = "";
        $vo = $Model->where($where)->order("GroupSort ASC,GroupId ASC")->select();
        $this->assign("vo",$vo);
        $this->display("enterprise:index");
    }


    public function UserAdd() {
        R('Public/pub_top');
        Load('@.user');
        $this->display("enterprise:user_add");
    }



    public function UserUpdate() {
        R('Public/pub_top');
        Load('@.user');
        $id = $this->_get("id");

        $Model = M("Admin");
        $where = "AdminId = '$id'";
        $vo = $Model->where($where)->find();
        $this->assign("vo",$vo);
        $this->display("enterprise:user_update");
    }

    public function AddAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = D('Admin');
        
        
        $iPassword = $this->_post("iPassword");
        if($iPassword == "") $this->error('密码不能为空');

        if($Node->create()) {
            $Node->AdminPassword = FrontHash($iPassword);
            $result = $Node->add();
            if(!$result) {
                $this->error('添加失败！');
            }
            else $this->success('添加成功！');
        }
        else $this->error($Node->getError());

        }

    public function updateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
        $iPassword = $this->_post("iPassword");
        $HashPassword = FrontHash($iPassword);
        $Node = D('Admin');
        

        if($Node->create()) {
            
            if($iPassword != "") $Node->AdminPassword = $HashPassword;
            $result = $Node->save();
            if(!$result) {
                
                $this->error('修改失败！可能是没做任何修改导致的');
            }
            else $this->success('修改成功！');
        }
        else $this->error($Node->getError());
        }





































    //添加部门
    public function GroupAdd() {
        R('Public/pub_top');
        
        $Node = M('AdminGroup');

        $iGroupName = $this->_post("iGroupName");
        
        if($iGroupName == "") $this->error('请填写部门名称');

        $data['GroupName'] = $iGroupName;
        $data['GroupType'] = 1;
        $result = $Node->data($data)->add();

        if(!$result) {
              $this->error('添加失败！');
        }
        else $this->success('添加成功！');
        
    }
        
    //添加新职位
    public function GroupTypeAdd() {
        R('Public/pub_top');
        
        $Node = M('AdminType');

        $iGroupTypeName = $this->_post("iGroupTypeName");
        
        if(iGroupTypeName == "") $this->error('请填写职位名称');

        $data['TypeName'] = $iGroupTypeName;;
        $data['TypeLevel'] = 10;
        $data['TypeValidate'] = 0;
        $result = $Node->data($data)->add();

        if(!$result) {
              $this->error('添加失败！');
        }
        else $this->success('添加成功！');
        
    }   
    //删除部门
    public function delGroup(){
        $id = $this->_get("id");
        $Model = M("Admin");
        $where = array('AdminGroup'=>$id);

        $count = $Model->where($where)->count();
        if($count > 0) $this->error('该部门下存在员工，请先删除该分类下的所有员工再执行操作');
        else{
            $Model = M("AdminGroup");
            $where = array('GroupId'=>$id);
            $result = $Model->where($where)->limit(1)->delete(); 
            if($result) $this->success('删除成功！'); 
            else $this->error('删除失败！');
        }

    }

    //删除职位
    public function delGroupType(){
        $id = $this->_get("id");
        $Model = M("Admin");
        $where = array('AdminType'=>$id);
        $count = $Model->where($where)->count();
        
        if($count != 0) $this->error('该职位下存在员工，请先删除该职位下的所有员工再执行操作');
        else{
            $Model = M("AdminType");
            $where = array('TypeId'=>$id);
            $result = $Model->where($where)->delete(); 
            if($result) $this->success('删除成功！'); 
            else $this->error('删除失败！');
        }
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


    //更新部门信息
    public function GroupUpdateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = M('AdminGroup');
        $vo = $Node->select();
        foreach($vo as $vo){
            $data['GroupSort'] = $this->_post("iSortGroup".$vo['GroupId']);
            $data['GroupName'] = $this->_post("isbGroupName".$vo['GroupId']);
            $result = $Node->data($data)->where("GroupId = {$vo['GroupId']}")->save();
        }
        $this->success('更新完成！');
    }


    //更新职位级别
    public function TypeUpdateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = M('AdminType');
        $vo = $Node->where("TypeLevel != -1")->select();
        foreach($vo as $vo){
            $data['TypeName'] = $this->_post("isbTypeName".$vo['TypeId']);
            $data['TypeLevel'] = $this->_post("iSortType".$vo['TypeId']);
            $result = $Node->data($data)->where("TypeId = {$vo['TypeId']}")->save();
        }
        $this->success('更新完成！');
    }


    //更新职位权限
    public function TypeValiUpdateAction() {
        R('Public/pub_top');
        $Node = M('AdminType');
        $vo = $Node->where("TypeLevel != -1")->select();
        foreach($vo as $vo){
            $data['TypeValidate'] = $this->_post("iSortValidate".$vo['TypeId']);
            $result = $Node->data($data)->where("TypeId = {$vo['TypeId']}")->save();
        }
        $this->success('更新完成！');
    }


  



    //更新数据缓存，将用户和部门写入js
    public function UsercacheUpdate(){
        header("Content-type: text/html; charset=utf-8");
        Load('@.linkagesel_user');
        $file = $_SERVER['DOCUMENT_ROOT']."/home/resource/function/linkagesel/jquery.linkagesel-users.js";
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