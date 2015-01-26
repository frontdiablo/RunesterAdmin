<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2013 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;
use Think\Template\TagLib;
defined('THINK_PATH') or exit();
/**
 * CX标签库解析类
 */
class Cx extends TagLib {

    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
    	'tip'    =>  array('attr'=>'text,position,style,time,width','close'=>0),
        );



    /**
     * tip标签解析
     * 格式： <html:imageBtn type="" value="" />
     * @access public
     * @param array $tag 标签属性
     * @return string|void
     */
    public function _tip($tag) {
        $text =  $tag['text'];     
        $position = isset($tag['position'])?$tag['position']:'';
        $style = isset($tag['style'])?$tag['style']:'';
        $time = isset($tag['time'])?$tag['time']:'';
        $width = isset($tag['width'])?$tag['width']:'';
		$parseStr   = "<a class='HelpIco' onclick=getTips(this,'不需要修改密码请留空')></a>";
        return $parseStr;
    }

    }
