<?php if (!defined('THINK_PATH')) exit();?><table class="listTable">
<?php if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pid"] == 0): ?><tr>
	<td class="thumbTd headTd">
	<img src="/./public/image/head/<?php echo ($vo['head']); ?>" width="48px" height="48px" />
	</td>
	<td class="guestbookTd" colspan="2">
	<div class="guestbook_name"><?php echo ($vo["username"]); ?> 于 <?php echo forDate($vo['pubDate'],1,1);?> 说：</div>
	<div class="clear"></div>
	<div class="guestbook_content"><?php echo ($vo["content"]); ?></div>
	<div class="guestbook_contact">
	<span class="bold">以下是我的联系方式：</span><br />
	电话：<?php echo partitionsNum($vo['phone']);?>&#12288;&#12288;邮箱：<?php echo ($vo["mail"]); ?>&#12288;&#12288;QQ：<?php echo ($vo["qq"]); ?>
	</div>
	</td>
	<td class='funTd' style="width:100px">
	<?php echo btn("reply",$key);?>
	<?php echo btn("hide",$key);?>
	<?php echo btn("delete",$key);?>
	</td>
	</tr>
<?php else: ?>
	<tr>
	<td class="thumbTd headTd"></td>
	<td class="thumbTd headTd"><img src="/./public/image/head/<?php echo ($vo["head"]); ?>" width="48px" height="48px" /></td>
	<td class="guestbookTd" style="border-left: 0;">
	<div class="guestbook_reply">
	<div class="guestbook_name" style="text-align: left;"><?php echo ($vo["username"]); ?> 于 <?php echo forDate($vo['pubDate'],1,1);?> 回复说：</div>
	<div class="clear"></div>
	<div class="guestbook_content"><?php echo ($vo["content"]); ?></div>
	</div>
	<div class="clear"></div>
	</td>
	<td class="funTd">
	<a href="javascript:void(0)" class="listBtn lbtnDelete" onclick='isConfirm("/index.php/Adminx/Guestbook/delete?id=<?php echo ($vo["id"]); ?>","删除后不可恢复，确定要继续吗？")' title="彻底删除"></a>
	</td>
	</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</table>