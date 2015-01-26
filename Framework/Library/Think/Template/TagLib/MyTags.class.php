<?php
namespace Think\Template\TagLib;
use Think\Template\TagLib;
defined('THINK_PATH') or exit();
/**
 * MyTags标签库解析类
 */
class MyTags extends TagLib {
    // 标签定义
    protected $tags   =  array(
        // 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
    	'tip' => array('attr'=>'text,position,style,time,width','close'=>0),
    	'navbtn' => array('attr'=>'type,url,area,title','close'=>0),
    	'image' => array('attr'=>'src,width,height,scale','close'=>0),
        'jselect'    => array('attr'=>'name,id,title,value,style,class','close'=>1),
        'editor'    => array('attr'=>'name,width,height,,resize,filter','close'=>1),
        'colorpicker' => array('attr'=>'name,value','close'=>0),
        'kupload' => array('attr'=>'name,value,type','close'=>0),
        );

    /**
     * 字段提示功能
     * 
     * @example <tip type="" value="" />
     * @author frontLon
     * @param string $text 显示的文本内容
     * @param string $position 显示位置 [up|down|left|right]
     * @param string $style 显示样式 [blue|orange|red]
     * @param int $time 显示时长 default:2
     * @param int $width 最大宽度 default:300
     * @return string|void
     */
    public function _tip($tag) {
        $text =  $tag['text'];     
        $position = isset($tag['position'])?$tag['position']:'';
        $style = isset($tag['style'])?$tag['style']:'';
        $time = isset($tag['time'])?$tag['time']:'';
        $width = isset($tag['width'])?$tag['width']:'';
		$parseStr   = "<a class='HelpIco' onmouseover=getTips(this,'$text','$position','$style','$time','$width')></a>";
        return $parseStr;
    }


    /**
     * 导航大按钮
     * 
     * @author frontLon
     * @example <navbtn type="" area="" url="" />
     * @param array $type 按钮类型 {必须} [page|article|...]
     * @param array $url 按钮链接地址
     * @param array $area 按钮位置 (第几个按钮)
     * @return string|void
     */
    public function _navbtn($tag) {
        $type = isset($tag['type'])?$tag['type']:'page';
        $url = isset($tag['url'])?$tag['url']:'javascript:void(0)';
        $area = isset($tag['area'])?$tag['area']:'1';
        $title = isset($tag['title'])?$tag['title']:'';
		$parseStr   = "<li><a href='$url' class='".$type."Btn navButton$area'>$title</a></li>";
		return $parseStr;
    }


    /**
     * 生成缩略图
     * 
     * @author frontLon
     * @example <img src"" width="" height="" scale="" />
     * @param string $src 图片路径 {必须}
     * @param int $width 图片最大宽度 {或与高度必须存在其一}
     * @param int $height 图片最大高度 {或与宽度必须存在其一}
     * @param int $scale 缩放方式 {default:1} [1:等比缩放|2:取中间位置|3:固定宽高]
     * @return string|void
     */
	public function _image($tag) {
		$src = isset($tag['src'])?$tag['src']:'';
		$width = isset($tag['width'])?$tag['width']:0;
		$height = isset($tag['height'])?$tag['height']:0;
		$scale = isset($tag['scale'])?$tag['scale']:1;
		$width = intval($width);
		$height = intval($height);
		$scale = intval($scale);
		echo $scale;
		//替换路径常量
		$src = str_replace("__UPLOADIMG__",UPLOADIMG,$src);
		$src = str_replace("__RESIMG__",RESIMG,$src);

		//获取文件信息
		$info = pathinfo($src);
		$filename = $info["dirname"] ."/". $info["filename"] ."_". $width."x".$height.".".$info["extension"];

		if(!file_exists($filename)){
			switch($scale){
					case 1  : $method = 1;break; //等比缩放
					case 2  : $method = 3;break; //取中间位置
					case 3  : $method = 6;break; //固定宽高
					default : $method = 1;break; //等比缩放
			}
			//生成缩略图
			$image = new \Think\Image();
		    $image->open($src);
			$image->thumb($width , $height , $method);
			$image->save($filename);
		}
		return "<img src='/$filename' width='$width' height='$height' />";
	}

    /**
     * jquery select 菜单
     * 
     * @author frontLon
     * @example <jselect name="pid" title="请选择所属分类" value="0">content...</jselect>
     * @param string $name input名称 {必须}
     * @param string $title select默认标题
     * @param string $value input的默认值
     * @param string $content select内容
     * @return string|void
     */
    public function _jselect($tag,$content) {
        $name  = isset($tag['name'])?$tag['name']:"";
        $id  = isset($tag['id'])?$tag['id']:$tag['name'];
        $title = isset($tag['title'])?$tag['title']:"请选择";
        $value = isset($tag['value'])?$tag['value']:"";
        $style = isset($tag['style'])?$tag['style']:"";
        $class = isset($tag['class'])?$tag['class']:"";
        $parseStr  =  "<script>$(function(){ $.divselect(\"#i$id\",\"#$id\"); });</script>";
        $parseStr .= "
        <div id=\"i$id\" class=\"dropdown\" tabindex=\"0\" style=\"$style\" ><p>$title</p><ul  class=\"$class\" style=\"$style\">$content</ul></div> 
        <input type=\"hidden\" id=\"$id\" name=\"$name\" value=\"$value\" />";
        return $parseStr;
    }
    /**
     * kindeditor编辑器
     * 
     * @author frontLon
     * @example <jselect name="pid" title="请选择所属分类" value="0">content...</jselect>
     * @param string $name input名称 {必须}
     * @param string $title select默认标题
     * @param string $value input的默认值
     * @param string $content select内容
     * @return string|void
     */
    public function _editor($tag,$content) {
        $name  = isset($tag['name'])?$tag['name']:"";
        $width  = isset($tag['width'])?$tag['width']:"100%";
		$height  = isset($tag['height'])?$tag['height']:"500";
		$resizeType  = isset($tag['resize'])?$tag['resize']:"1";
		$filterMode  = isset($tag['filter'])?$tag['filter']:"false";
        $parseStr = "
        <textarea name='$name' class='noteTextarea'>$content</textarea>
        <script type='text/javascript'>
		    KindEditor.ready(function(K) {
				var editor_$name = K.create('textarea[name=\"$name\"]', {
					resizeType : $resizeType,
					themeType : 'simple',
					uploadJson : EDITROOT+'/editor/php/upload_json.php',
					fileManagerJson : EDITROOT+'/editor/php/file_manager_json.php',
					allowFileManager : true,
					width : '$width',
					height : '$height',
					filterMode : $filterMode,
					newlineTag : 'p',
					items : [
					    'source', 'fullscreen','|',
					    'undo', 'redo', '|',
					    'preview','selectall','cut', 'copy', 'paste','plainpaste', 'wordpaste', '|',
					    'clearhtml','removeformat', 'quickformat','|',
					    'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'lineheight','|',
					    'superscript', 'subscript',
					    '/',
					    'formatblock', 'fontname', 'fontsize', '|',
					    'forecolor', 'hilitecolor', 'bold',	'italic', 'underline', 'strikethrough','|',
					    'justifyleft', 'justifycenter', 'justifyright',	'justifyfull','|',
					    'image', 'multiimage','flash', 'media', 'insertfile', 'table','emoticons','link', 'unlink'
					    ]
				});
			});
		</script>";
        return $parseStr;
    }


   /**
     * kindeditor颜色选择器
     * 
     * @author frontLon
     * @example <colorpicker name="titleColor" value="#336600"/>
     * @param string $name input名称 {必须}
     * @param string $value 十六进制色值
     * @return string|void
     */

     public function _colorpicker($tag) {
        $name  = isset($tag['name'])?$tag['name']:"";
        $value  = isset($tag['value'])?$tag['value']:"";
        if($value != "") $style = "background:$value";
        else $style = "";
        $parseStr = "
		<input type='text' id='i$name'  class='input colorInput' value='标题颜色' readonly='readonly' style='$style'  />
		<input type='hidden' id='$name' name='$name' value='$value' />
		<script type='text/javascript'>
			KindEditor.ready(function(K) {
			var colorpicker;
			K('#i$name').bind('click', function(e) {
				e.stopPropagation();
				if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
					return;
			}
			var colorpickerPos = K('#i$name').pos();
			colorpicker = K.colorpicker({
				x : colorpickerPos.x,
				y : colorpickerPos.y + K('#i$name').height(),
				z : 19811214,
				selectedColor : 'default',
				noColor : '默认颜色',
				click : function(color) {
					K('#$name').val(color);
					K('#i$name').attr(\"style\", \"background:\"+color);
					colorpicker.remove();
					colorpicker = null;
				}
			});
			});
			K(document).click(function() {
						if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
				}
			});
		});
		</script>";
		return $parseStr;
	}
    
	
	
	/**
     * kindeditor文件上传控件
     * 
     * @author frontLon
     * @example <kupload name="setBanner1" value="" />
     * @param string $name input名称 {必须}
     * @param string $value 文本框值
     * @param string $type 控件类型，目前仅支持image
     * @return string|void
     */
	
	public function _kupload($tag) {
        $name  = isset($tag['name'])?$tag['name']:"";
        $value  = isset($tag['value'])?$tag['value']:"";
        $type = isset($tag['type'])?$tag['type']:"image";
       	$parseStr ="
		<input type='text' id='$name' value='$value' name='$name' class='input dateInput' /><input type='button' id='i$name' value='选择图片' class='btn btnWhite' />";
        if($type == "image"){
			$parseStr .= "
				<script>
				KindEditor.ready(function(K) {
				var editor_$name = K.editor({
				allowFileManager : true});
				K('#i$name').click(function() {
				editor_$name.loadPlugin('image', function() {
				editor_$name.plugin.imageDialog({
				imageUrl : K('#$name').val(),
				clickFn : function(url, title, width, height, border, float) {
				K('#$name').val(url);
				editor_$name.hideDialog();}});});});});
				</script>";
        }
		return $parseStr;
	}
	 
}
?>