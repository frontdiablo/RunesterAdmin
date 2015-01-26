<?php

class ProductsdetailAction extends Action
{
    public function ProAdd() {
        R('Public/pub_top');
        Load('@.products');
        $this->display("products:pro_add");
    }

    public function ProUpdate() {
        R('Public/pub_top');
        Load('@.products');
        $id = $this->_get("id");

        $Model = M("Product");
        $where = "ProId = '$id'";
        $vo = $Model->where($where)->find();
        $this->assign("vo",$vo);
        $this->display("products:pro_update");
    }

    public function CateAdd() {
        R('Public/pub_top');
        Load('@.products');
        $this->display("products:cate_add");
    }

    public function CateUpdate() {
        R('Public/pub_top');
        Load('@.products');
        $id = $this->_get("id");

        $Model = M("Product");
        $where = "ProId = '$id'";
        $vo = $Model->where($where)->find();
        $this->assign("vo",$vo);
        $this->display("products:cate_update");
    }


    public function ProAddAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = D('Product');

        $iCategory = $this->_post("iCategory");
        
        if($iCategory == "") $this->error('必须选择所属类别');
        
        $cateArr = explode(",",$iCategory);

        if($Node->create()) {
            $Node->ProPid = $cateArr[0];
            $Node->ProLevel = $cateArr[1]+1;
            $result = $Node->add();
            if(!$result) {
                $this->error('添加失败！');
            }
            else $this->success('添加成功！');
        }
        else $this->error($Node->getError());
        }

    public function ProupdateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = D('Product');
        $iCategory = $this->_post("iCategory");
        if($iCategory == "") $this->error('必须选择所属类别');
        $cateArr = explode(",",$iCategory);

        if($Node->create()) {
            $Node->ProPid = $cateArr[0];
            $Node->ProLevel = $cateArr[1]+1;
            $result = $Node->save();
            if(!$result) {
                $this->error('修改失败！可能是没做任何修改导致的');
            }
            else $this->success('修改成功！');
        }
        else $this->error($Node->getError());
        }

}

?>