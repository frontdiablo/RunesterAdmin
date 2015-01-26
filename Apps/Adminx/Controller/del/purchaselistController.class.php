<?php
header("Content-type: text/html; charset=utf-8");  
class purchaselistAction extends Action
{
    
    public function Index() {
        R('Public/pub_top');
        R('Public/pub_statistics');
        R('Public/pub_bottom');
        Load('@.HtmlDB');
        Load('@.purchase');
        import("MyPages","./Public/ORG");

        $Model = M("Item");
        $PREFIX = C("DB_PREFIX");
        $days = 60; //显示60天内的记录数
        $PageNum = 30; //分页数

     //   $where = "to_days(ItemDateBuy) >= (to_days(now()) - $days)";

     //   $where .= R('purchaselist/getUserWhere'); //判断登录权限

        $join = "LEFT JOIN ".$PREFIX."item_validate ON ".$PREFIX."item.ItemId = ".$PREFIX."item_validate.ValiItemId";

        $count = $Model->where($where)->count();

        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();
        $voi = $Model->where($where)->join($join)->order("ItemDateBuy DESC,ItemId DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("voi",$voi);
        $this->assign("count",$count);
        if ($count > $PageNum) $this->assign('page',$pageshow);
        $this->display();
    }

    public function validate_list() {
        R('Public/pub_top');
        R('Public/pub_statistics');
        R('Public/pub_bottom');
        Load('@.HtmlDB');
        Load('@.purchase');
        import("MyPages","./Public/ORG");

        $Model = M("Item");
        $PREFIX = C("DB_PREFIX");
        $days = 60; //显示60天内的记录数
        $PageNum = 30; //分页数


        $where = "to_days(ItemDateBuy) >= (to_days(now()) - $days)";        
        $where .= R('purchaselist/getUserWhere'); //判断登录权限
        $where .=" and ItemValidate >= 0 ";

        $join = "LEFT JOIN ".$PREFIX."item_validate ON ".$PREFIX."item.ItemId = ".$PREFIX."item_validate.ValiItemId";
        
        $count = $Model->where($where)->count();
        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();

        $voi = $Model->where($where)->join($join)->order("ItemDateBuy DESC,ItemId DESC")->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign("voi",$voi);
        $this->assign("count",$count);
        if ($count > $PageNum) $this->assign('page',$pageshow);
        $this->display("purchaselist:validate_list");
    }

    public function validate() {
        R('Public/pub_top');
        R('Public/pub_bottom');
        Load('@.validate');
        Load('@.HtmlDB');
        $id = $this->_get("id");
        $Model = M("Item");
        $where = "ItemId = $id";
        $PREFIX = C("DB_PREFIX");
        $join = "LEFT JOIN ".$PREFIX."item_validate ON ".$PREFIX."item.ItemId = ".$PREFIX."item_validate.ValiItemId";
        $vo = $Model->where($where)->join($join)->find();

        $this->assign("vo",$vo);
        $this->display("purchaselist:validate");
    }

    public function delivery() {
        R('Public/pub_top');
        R('Public/pub_bottom');
        Load('@.validate');
        Load('@.HtmlDB');
        $id = $this->_get("id");
        $Model = M("Item");
        $where = "ItemId = $id";
        $PREFIX = C("DB_PREFIX");
        $join = "LEFT JOIN ".$PREFIX."item_validate ON ".$PREFIX."item.ItemId = ".$PREFIX."item_validate.ValiItemId";
        $vo = $Model->where($where)->join($join)->find();

        $this->assign("vo",$vo);
        $this->assign("id",$id);
        
        $this->display("purchaselist:delivery");
    }



//审核产品
    public function validateAction() {

        $iName = $this->_post("iName");
        $iDate = $this->_post("iDate");
        $iAdminType = $this->_post("iAdminType");
        $iNote = $this->_post("iNote");
        $state = $this->_get("state");
        $id = $this->_get("id");
        
        
        
        switch($state){
            case "success" :
            echo $iAdminType;
            break;

            case "fail" :
            $iAdminType = -$iAdminType;
            break;
        }

        /* 修改产品审核状态 */
        $ModelItem = M('Item');
        $where = "ItemId = $id";
        $data['ItemValidate'] = $iAdminType;
        $resultItem = $ModelItem->where($where)->data($data)->save();
        
        /* 添加审核者信息 */
        $ModelVali = M('ItemValidate');
        $where = "ValiItemId = $id";
        $data['ValiName'.$iAdminType] = $iName;
        $data['ValiDate'.$iAdminType] = $iDate;
        $data['ValiNote'.$iAdminType] = $iNote;
        $resultVali = $ModelVali->where($where)->data($data)->save();

        if($resultItem && $resultVali) $this->success("审核成功！");
        else $this->error("审核失败，请重试。");

    }

//送达产品
    public function DeliveryAction() {

        $iName = $this->_post("iName");
        $iDate = $this->_post("iDate");
        $iNotePub = $this->_post("iNotePub");
        $iNotePri = $this->_post("iNotePri");
        $iNotePub = nl2br($iNotePub);
        $iNotePri = nl2br($iNotePri);
        
        
        $id = $this->_get("id");
        /* 修改产品审核状态 */


        $Model = M('Item');
        $where = "ItemId = $id";
        
        $data['ItemDeliveryState'] = 1;
        $data['ItemDeliveryName']  = $iName;
        $data['ItemDeliveryDate']  = $iDate;
        $data['ItemNoteVendor']    = $iNotePub;
        $data['ItemNotePrivate']   = $iNotePri;

        $result = $Model->where($where)->data($data)->save();
        
        if($result) $this->success("送达成功！");
        else $this->error("送达失败，请重试。");

    }


//删除项目
  public function del() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
        $id = $this->_get("id");
        $Model = M('Item');
        $where = "ItemId = $id";

        $result = $Model->where($where)->delete();
        
        if($result) $this->success("删除成功！");
        else $this->error("删除失败，请重试。");
        }

//生成订单
    public function CreateOrders() {
        R('Public/pub_top');
        $ModelOrders = M('ItemOrders');
        $data['OrdersSerial'] = date("YmdHis");
        $data['OrdersType'] = 1;
        $data['OrdersDate'] = date("Y-m-d");
        $OrdersId = $ModelOrders->where($where)->data($data)->add();
        
        $ModelItem = M("Item");
        $where = array("ItemOrders" => 0);
        $vo = $ModelItem->where($where)->select();
        foreach($vo as $vo){
            $data['ItemOrders'] = $OrdersId;
            $where = array("ItemId" => $vo['ItemId']);
            $result = $ModelItem->where($where)->data($data)->save();
        }
        $this->success("生成订单成功！");
    }





/* 根据不同权限显示不同信息 */
public function getUserWhere (){
        
    if($_SESSION['TypeValidate'] == 0){ //是否为员工
        $where = " and ItemUserBuyUser = {$_SESSION['AdminId']}";
    }
    else{
        if($_SESSION['AdminType'] == 2){ //是否为部门主管
        $where = " and ItemUserBuyGroup = {$_SESSION['AdminGroup']}";
        }
        else{$where = "";}
    }
    
    return $where;
    
    
    
    
}








/* 在缓存中输出excel */
    public function excel_output() {
        $IdArr = $_POST["artical_ID"];
        Load('@.phpexcel');
        phpExcel_Output($IdArr);

    }
















}
?>