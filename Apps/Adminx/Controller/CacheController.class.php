<?php
namespace Adminx\Controller;
use Think\Controller;
class CacheController extends Controller
{
    /**
        前置操作方法
     */
   public function _initialize(){
        R('Public/pub_top');

    }
    public function index() {
        $this->display("Public:clearCache");
    }




//RUNTIME_FILE常量是入口文件中配置的runtimefile的路径及文件名；  ay-

public function clear_cache(){
	$get = I("get.");

	if($get['dir'] == "Cache"){$dir = RUNTIME_PATH.$get['dir']."/{$get['type']}/";}
	elseif($get['dir'] == "all"){$dir = RUNTIME_PATH;}
	else{$dir = RUNTIME_PATH.$get['dir']."/";}

	if(is_dir($dir)){
	  $result = $this->delDirAndFile($dir);

	  if($result) $data['msg'] = "删除成功！";
	  else $data['msg'] = "删除失败！请检查文件权限是否可写。";
	}
	$data['status'] = 1;
	$this->ajaxReturn($data,"json");	

}

//循环删除目录和文件函数
private function delDirAndFile( $dirName ){
	if ($handle = opendir("$dirName")){
	   while(false !== ($item = readdir( $handle ))){
		   if( $item != "." && $item != ".." ){
			   if(is_dir("$dirName/$item")) $this->delDirAndFile( "$dirName/$item" );
			   else	unlink("$dirName/$item"); //循环删除文件
		   }
	   }
	   closedir($handle);
	   return true;
	}
	else return false;
}

}
?>