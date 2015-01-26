<?php
namespace Adminx\Controller;
use Think\Controller;
/**
 * PageController
 * 
 * @package Adminx
 * @author frontLon
 * @copyright 2014
 * @access public
 */
class SidebarController extends Controller
{
    /**
     * PageController::index()
     * 
     * 侧边栏
     * 
     * @return void
     */

    //输出导航分类
    public function nav() {
        $Model = M("Category");
		$where['cate_type'] = "Nav";
        $rvo = $Model->where($where)->select();
        $this->assign("rvo",$rvo);
    }
    //输出侧边栏用户组
    public function admin() {
        $Model = M("AdminGroup");
        $vos = $Model->select();
        $this->assign("vos",$vos);
    } 
    //输出侧边栏用户节点
    public function admin_rule() {
        Load('@.sidebar');
        $Model = M("AdminRuleCate");
        $catevo = $Model->select();
        $this->assign("catevo",$catevo);
    }
    //输出侧边栏用户节点组
    public function admin_rule_cate() {
        Load('@.sidebar');
        $where = "pid = 0";
        $Model = M("AdminRuleCate");
        $catevo = $Model->where($where)->select();
        $this->assign("catevo",$catevo);
    }
}
?>