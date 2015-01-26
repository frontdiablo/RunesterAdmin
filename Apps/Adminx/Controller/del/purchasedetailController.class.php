<?php

class purchasedetailAction extends Action
{
    public function Index() {

    }
    public function add() {
        R('Public/pub_top');
        Load('@.HtmlDB');
        
        $Model = M("Product");
        $where = "ProType = '1'";
        $pvo = $Model->where($where)->select();

        $this->assign("pvo",$pvo);        
        $this->display();
    }
    public function update() {
        R('Public/pub_top');
        Load('@.purchase_detail');
        Load('@.HtmlDB');
        $id = $this->_get("id");
        $Model = M("Item");
        
        $where = "ItemId = '$id'";
        $vo = $Model->where($where)->find();
        $this->assign("vo",$vo);
        $this->display();
    }

    public function addAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $ProCheck   = $this->_post("ProCheck");   //单选：选择产品和自定义产品
        $iBuyUser   = $this->_post("iBuyUserArr");  //采购用户Arr
        $iUseUser   = $this->_post("iUseUserArr");  //使用用户Arr
        $BuyUserArr = explode(",",$iBuyUser);   //购买用户Arr分割
        $UseUserArr = explode(",",$iUseUser);   //使用用户Arr分割

        if($ProCheck == 0){ //列表中选择
            $iProPrice     = $this->_post("iProPrice");    // 产品价格
            $iProId        = $this->_post("iProIdArr");    // 产品Id Arr
            $iProName      = $this->_post("iProNameArr");  // 产品名称Arr
            $iProNameArr   = explode(",",$iProName);       // 产品名称Arr分割
            $iProIdArr     = explode(",",$iProId);
            $ProName       = end($iProNameArr);            // 产品名称(Arr最后字段)
            $ProGroupId    = $iProIdArr[0];                // 产品分类Id
            $ProGroupName  = $iProNameArr[0];              // 产品分类名称

            if($iProPrice == "" or $iProPrice == "undefined") $this->error('请选择产品');
        }
        elseif($ProCheck == 1){ //自定义产品

            $iSelect       = $this->_post("iManualSelect");  // 产品大类
            $iSelectArr    = explode(",",$iSelect);          // 产品大类Arr分割:"id,名称"
            $ProName       = $this->_post("iManualText");    // 产品名称
            $ProGroupId    = $iSelectArr[0];                 // 产品大类Id
            $ProGroupName  = $iSelectArr[1];                 // 产品大类名称
            $iProId        = "";                             // 产品Id Arr

            if($iSelect == "" or $ProName == "") $this->error('请选择产品');
        }

        if($BuyUserArr[1] == "") $this->error('请选择采购人');
        if($UseUserArr[1] == "") $this->error('请选择使用者');
 
        $Model = D('Item');
        if($Model->create()) {
        $Model->ItemName      = $ProName;
        $Model->ItemGroupArr  = $iProId;
        $Model->ItemGroupId   = $ProGroupId;
        $Model->ItemGroupName = $ProGroupName;

        $Model->ItemUserBuyGroup  = $BuyUserArr[0];
        $Model->ItemUserBuyUser   = $BuyUserArr[1];
        $Model->ItemUserUseGroup  = $UseUserArr[0];
        $Model->ItemUserUseUser   = $UseUserArr[1];

        $result = $Model->add();

        if($result) {
                //如果项目数据写入成功，则创建验证数据
                $ModelC = M("AdminType");
                $countC = $ModelC->where("TypeValidate != '0'")->count();
                $ModelV = M("ItemValidate");
                $data['ValiItemId'] = $result;
                $data['ValiCount'] = $countC;
                $resultV = $ModelV->add($data);
                if($resultV) $this->success('提交成功，请等待审核！');
                else $this->error('流程2提交失败！请重试');
        }
        else $this->error('流程1提交失败！请重试');

        }

}
    public function updateAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
        
        $ProCheck   = $this->_post("ProCheck");   //单选：选择产品和自定义产品
        $iBuyUser   = $this->_post("iBuyUserArr");  //采购用户Arr
        $iUseUser   = $this->_post("iUseUserArr");  //使用用户Arr
        $BuyUserArr = explode(",",$iBuyUser);   //购买用户Arr分割
        $UseUserArr = explode(",",$iUseUser);   //使用用户Arr分割

        $iProPrice     = $this->_post("iProPrice");    // 产品价格
        $iProId        = $this->_post("iProIdArr");    // 产品Id Arr
        $iProName      = $this->_post("iProNameArr");  // 产品名称Arr
        $iProNameArr   = explode(",",$iProName);       // 产品名称Arr分割
        $iProIdArr     = explode(",",$iProId);
        $ProName       = end($iProNameArr);            // 产品名称(Arr最后字段)
        $ProGroupId    = $iProIdArr[0];                // 产品分类Id
        $ProGroupName  = $iProNameArr[0];              // 产品分类名称
  
        if($iProPrice == "" or $iProPrice == "undefined") $this->error('请选择产品');
        if($BuyUserArr[1] == "") $this->error('请选择采购人');
        if($UseUserArr[1] == "") $this->error('请选择使用者');
 
        $Model = D('Item');
        if($Model->create()) {
        $Model->ItemName      = $ProName;
        $Model->ItemGroupArr  = $iProId;
        $Model->ItemGroupId   = $ProGroupId;
        $Model->ItemGroupName = $ProGroupName;

        $Model->ItemUserBuyGroup  = $BuyUserArr[0];
        $Model->ItemUserBuyUser   = $BuyUserArr[1];
        $Model->ItemUserUseGroup  = $UseUserArr[0];
        $Model->ItemUserUseUser   = $UseUserArr[1];

        $result = $Model->save();
        if(!$result) {
            $this->error('编辑失败！请重试');
        }
        else $this->success('编辑成功！');
        }
        else $this->error($Model->getError()); 

}







}
?>