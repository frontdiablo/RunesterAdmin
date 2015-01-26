<?php
namespace Adminx\Model;
use Think\Model;
class AdminRuleCateModel extends Model{
    
	protected $_validate = array(
		array('title'	, 'require'	, '组名称不能为空！'     , 0 , "" , 3),
		array('controller'	, 'require'	, '组标识不能为空！'     , 0 , "" , 3),
		array('status'	, 'require'	, '状态不能为空！'     , 0 , "" , 3),
		array('title','','该名称已存在！',0,'unique',3),
		array('controller','','该标识已经存在！',0,'unique',3),

	);
} ?>