<?php

class FixAction extends Action
{

    public function index() {
        R('Public/pub_top');
        R('Public/pub_statistics');
        R('Public/pub_bottom');
        Load('extend');
        Load('@.HtmlDB');
        Load('@.fix');
        import("MyPages","./Public/ORG");
        $Model = M("Fix");
        $PREFIX = C("DB_PREFIX");
        $days = 60; //显示60天内的记录数
        $PageNum = 30; //分页数

        $where = "to_days(FixDate) >= (to_days(now()) - $days)";
        $order = "FixValidate ASC,FixDate DESC,FixId DESC";
       // $where .= R('Fix/getUserWhere'); //判断登录权限

       // $join = "LEFT JOIN ".$PREFIX."item_validate ON ".$PREFIX."item.ItemId = ".$PREFIX."item_validate.ValiItemId";

        $count = $Model->where($where)->count();

        $Page= new Page($count,$PageNum);
        $pageshow = $Page->show();
        $voi = $Model->where($where)->join($join)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();

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

    public function delivery() {
        R('Public/pub_top');
        R('Public/pub_bottom');
        Load('@.HtmlDB');
        $id = $this->_get("id");
        $Model = M("Fix");
        $where = "FixId = $id";
        $vo = $Model->where($where)->join($join)->find();

        $this->assign("vo",$vo);
        $this->assign("id",$id);
        
        $this->display("Fix:delivery");
    }
    public function detail() {
        R('Public/pub_top');
        R('Public/pub_bottom');
        Load('@.HtmlDB');
        $id = $this->_get("id");
        $Model = M("Fix");
        $where = "FixId = $id";
        $vo = $Model->where($where)->join($join)->find();

        $this->assign("vo",$vo);
        $this->assign("id",$id);
        
        $this->display("Fix:detail");
    }
    public function finish() {
        R('Public/pub_top');
        R('Public/pub_bottom');
        Load('@.HtmlDB');
        Load('extend');
        $id = $this->_get("id");
        $Model = M("Fix");
        $where = "FixId = $id";
        $vo = $Model->where($where)->join($join)->find();

        $this->assign("vo",$vo);
        $this->assign("id",$id);
        
        $this->display("Fix:finish");
    }
//回复问题
    public function DeliveryAction() {

        $iName = $this->_post("iName");
        $iDate = $this->_post("iDate");
        $iContent = $this->_post("iContent");
        $id = $this->_get("id");

        if($iName == "") $this->error("登录信息丢失，请重新登录。");
        if($iContent == "") $this->error("回复内容不能为空");

        $Model = M('Fix');
        $where = "FixId = $id";

        $data['FixDeliveryName']   = $iName;
        $data['FixDeliveryDate']   = $iDate;
        $data['FixDeliveryAnswer'] = $iContent;
        $data['FixValidate']       = 1;
        $result = $Model->where($where)->data($data)->save();
        
        if($result) $this->success("回复成功！");
        else $this->error("回复失败，请重试。");

    }


//完成问题
    public function FinishAction() {

        $iType = $this->_post("iType");
        $iNote = $this->_post("iNote");
        $iPrice = $this->_post("iPrice");
        $iTitle = $this->_post("iTitle");
        $id = $this->_get("id");

        $Model = M('Fix');
        $where = "FixId = $id";

        $data['FixType']        = $iType;
        $data['FixDeliverNote'] = $iNote;
        $data['FixPrice']       = $iPrice;
        $data['FixValidate']    = 2;
        $data['FixTitle'] = $iTitle;
        $result = $Model->where($where)->data($data)->save();
        
        if($result) $this->success("完成设置成功！");
        else $this->error("完成设置失败，请重试。");

    }


    public function add() {
        R('Public/pub_top');
        Load('@.HtmlDB');
        $gid = session("AdminGroup");
        $GroupName = getGroupName($gid);
        $this->assign("GroupName",$GroupName);        
        $this->display();
    }



  public function AddAction() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');

        $Node = D('Fix');

        if($Node->create()) {
            $result = $Node->add();
            if(!$result) {
                $this->error('添加失败！');
            }
            else $this->success('添加成功！');
        }
        else $this->error($Node->getError());
        }


//删除项目
  public function del() {
        R('Public/pub_top');
        if($_POST['__hash__'] != Session("__seshash__")) $this->error('非法操作');
        $id = $this->_get("id");
        $Model = M('Fix');
        $where = "FixId = $id";

        $result = $Model->where($where)->delete();
        
        if($result) $this->success("删除成功！");
        else $this->error("删除失败，请重试。");
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
































}
?>