<?php if (!defined('THINK_PATH')) exit();?>
<?php if($mode == 'display'): if(is_array($vo)): foreach($vo as $key=>$vo): $subclass = $vo['cate_pid'] != 0 ? "subLi" : ""; $select = $vo['cate_id'] == $selectid ? "click" : ""; ?>
	<li class="<?php echo ($subclass); ?>"><a href="<?php echo U($Think.CONTROLLER_NAME."/index?pid=".$vo['cate_id']);?>" class="<?php echo ($select); ?>" ><?php echo ($vo['cate_title']); ?></a></li><?php endforeach; endif; ?>


<?php elseif($mode == 'edit'): ?>
<?php if(is_array($vo)): foreach($vo as $key=>$vo): $subclass = $vo['cate_pid'] != 0 ? "subTr" : "";?>
	<tr class="<?php echo ($subclass); ?>">
	<td class="numTd">
	<input type="hidden" value="<?php echo ($vo["cate_id"]); ?>" name="iId[]" id="iId" />
	<input type="text" class="numInput" maxlength="3" value="<?php echo ($vo["cate_sort"]); ?>" onclick="this.select()" name="iSort<?php echo ($vo["cate_id"]); ?>" /></td>
	<td><input type="text" class="NameInput" value="<?php echo ($vo["cate_title"]); ?>" name="iName<?php echo ($vo["cate_id"]); ?>" id="iName<?php echo ($vo["cate_id"]); ?>" onkeydown="sideModifyActive(\"iName<?php echo ($vo["cate_id"]); ?>\")" /></td>
	<td class="btnTd">
	<?php if($edit == 1): ?><a href="<?php echo U("Category/edit?id=".$vo["cate_id"]);?>" class="editBtn" title="编辑"></a><?php endif; ?>
	<a href="javascript:void(0)" class="delBtn" title="删除" onclick='isConfirm("<?php echo U("Category/delete?id=".$vo['cate_id']);?>","您确定要删除这个位置吗？如果该位置存在信息请先清空信息后再执行本操作。")'></a></td>
	</tr><?php endforeach; endif; endif; ?>