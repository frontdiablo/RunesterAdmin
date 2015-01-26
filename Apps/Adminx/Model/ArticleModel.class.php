<?php
namespace Adminx\Model;
use Think\Model;
class ArticleModel extends Model{
//自动验证
	protected $_validate = array(
		array('title'	, 'require'	, '标题不能为空！'     , 0 , "" , 3),
		array('pid'	, 'require'	, '必须选择所属分类！'     , 0 , "" , 3),
		array('content'	, 'require'	, '内容不能为空！'     , 0 , "" , 3),
		array('pubDate'	, 'require'	, '发布时间不能为空！'     , 0 , "" , 3),
	);
//自动完成
	protected $_auto = array(
		array('description'	, 'nl2br', 3 , 'function' ),
		array('url'	, 'replaceUrlhttp', 3 , 'function' ),
		array('content'	, 'htmlspecialchars_decode', 3 , 'function' ),
		array('pubDate'	, 'unixtime', 3 , 'function' ),
	);
} ?>