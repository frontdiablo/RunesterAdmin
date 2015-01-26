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
class GuestbookShortcutController extends CommonController
{
	public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
        Load('@.list');
        Load('@.sidebar');
    }
	//后置操作
	public function _after_index(){unset($GLOBALS['vo']);}
	public function _after_recyclebin(){unset($GLOBALS['vo']);}
	
    /**
        列表页 Display
     */
    public function index() {
		$Model = M(CONTROLLER_NAME);
        $vo = $Model->select();
        $this->assign("vo",$vo);
		$this->display("Guestbook:shortcut"); 	
    }

}
?>