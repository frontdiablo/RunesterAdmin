<?php
namespace Adminx\Widget;
use Think\Controller;
class GuestbookWidget extends CommonWidget {
	/*
		аТятап╠М
	*/
	public function bookTable($pid){
		$Model = M(CONTROLLER_NAME);
		$order= "id DESC";
		$volist = $Model->where()->order($order)->select();
		$volist = $this->getArrTree($volist);
		$this->assign("volist",$volist);
		$this->display('Guestbook:widget_book_display');
	}
}
?>