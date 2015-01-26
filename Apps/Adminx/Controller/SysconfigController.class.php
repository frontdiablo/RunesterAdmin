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
class SysconfigController extends Controller
{
    /**
     * 
     * 前置操作方法
     * 
     */
   public function _initialize(){
        R('Public/pub_top');
        R('Public/pub_sidebar');
        Load('@.HtmlDB');
        Load('@.sysconfig');
    }
    /**
     * PageController::index()
     * 
     * 页面管理列表
     * 
     * @return void
     */

     public function index() {
   		$this->display();    
    }

}
?>