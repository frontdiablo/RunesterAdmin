<?php
namespace Adminx\Widget;
use Think\Controller;
class CommonWidget extends Controller {
	
	static public $treeList = array(); 

	/*
		对数据库数组进行重拍
	*/
	static public function getArrTree(&$data,$field_pid="pid",$field_id="id",$pid = 0,$count = 1) {
	        foreach ($data as $key => $value){
	            if($value[$field_pid]==$pid){
	                $value['Count'] = $count;
	                self::$treeList []=$value;
	                unset($data[$key]);
	                self::getArrTree($data,$field_pid,$field_id,$value[$field_id],$count+1);
	            } 
	        }
	        return self::$treeList ;
	    }



	
}
?>