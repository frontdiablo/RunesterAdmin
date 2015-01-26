<?php
namespace Adminx\Model;
use Think\Model;
class ConfigWebModel extends Model{
//自动验证
	protected $_validate = array(
		array('web_title'			, 'require'	, '网站名称不能为空！'    			 , 0 , "" , 3),
		array('web_seoTitle'		, 'require'	, '主页标题不能为空！'    			 , 0 , "" , 3),
		array('pagenum_page'		, 'require'	, '页面分页数不能为空且必须大于0！'     , 0 , "" , 3),
		array('pagenum_article'		, 'require'	, '信息分页数不能为空且必须大于0！'     , 0 , "" , 3),
		array('pagenum_guestbook'	, 'require'	, '留言分页数不能为空且必须大于0！'     , 0 , "" , 3),
		array('pagenum_other'		, 'require'	, '其他分页数不能为空且必须大于0！'     , 0 , "" , 3),
	);
	protected $_auto = array(
		array('web_statistics', 'htmlspecialchars_decode', 3 , 'function' ),
		array('web_footer1'	, 'htmlspecialchars_decode', 3 , 'function' ),
		array('web_footer2'	, 'htmlspecialchars_decode', 3 , 'function' ),
	);
} ?>