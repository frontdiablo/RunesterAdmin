<?php
namespace Adminx\Widget;
use Think\Controller;
class SidebarWidget extends CommonWidget {
	public function _after_sideCateTable(){unset($vo);}
	public function sideCateTable($type,$mode="display",$selectid=0,$edit=1){
		$Model = M("Category");
		$where['cate_type'] = $type;
		$order = "cate_sort ASC,cate_id DESC";
		$vo = $Model->where($where)->order($order)->select();
		$vo = $this->getArrTree($vo,"cate_pid","cate_id");
		$vo = unique_arr($vo);
		$this->assign("vo",$vo);
		$this->assign("mode",$mode);
		$this->assign("selectid",$selectid);
		$this->assign("edit",$edit);
		$this->display("Public:widget_side_cate_table");
	}
}
?>