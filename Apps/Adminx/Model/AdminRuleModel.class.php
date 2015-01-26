<?php
namespace Adminx\Model;
use Think\Model;
class AdminRuleModel extends Model{
    
	protected $_validate = array(
		array('name'	, 'require'	, '标识不能为空！'     , 0 , "" , 3),
		array('title'	, 'require'	, '描述不能为空！'     , 0 , "" , 3),
		array('status'	, 'require'	, '状态不能为空！'     , 0 , "" , 3),
		array('name','','该标识已经存在！',0,'unique',3),

	);
} ?>