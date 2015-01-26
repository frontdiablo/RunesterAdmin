<?php
namespace Adminx\Controller;
use Think\Controller;
class SafeController extends Controller
{

//判断是否为post提交
public function isPost() {if(!IS_POST) $this->error('非法操作！');}

//判断是否为Ajax提交
public function isAjax() {if(!IS_AJAX) $this->error('非法操作！');}

}
?>