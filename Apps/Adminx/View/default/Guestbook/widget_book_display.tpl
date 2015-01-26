<table class="listTable">
<volist name="volist" id="vo">
<if condition="$vo.pid eq 0">
	<tr>
	<td class="thumbTd headTd">
	<img src="/__UPLOADIMG__/head/{$vo['head']}" width="48px" height="48px" />
	</td>
	<td class="guestbookTd" colspan="2">
	<div class="guestbook_name">{$vo.username} 于 {:forDate($vo['pubDate'],1,1)} 说：</div>
	<div class="clear"></div>
	<div class="guestbook_content">{$vo.content}</div>
	<div class="guestbook_contact">
	<span class="bold">以下是我的联系方式：</span><br />
	电话：{:partitionsNum($vo['phone'])}&#12288;&#12288;邮箱：{$vo.mail}&#12288;&#12288;QQ：{$vo.qq}
	</div>
	</td>
	<td class='funTd' style="width:100px">
	{:btn("reply",$key)}
	{:btn("hide",$key)}
	{:btn("delete",$key)}
	</td>
	</tr>
<else />
	<tr>
	<td class="thumbTd headTd"></td>
	<td class="thumbTd headTd"><img src="/__UPLOADIMG__/head/{$vo.head}" width="48px" height="48px" /></td>
	<td class="guestbookTd" style="border-left: 0;">
	<div class="guestbook_reply">
	<div class="guestbook_name" style="text-align: left;">{$vo.username} 于 {:forDate($vo['pubDate'],1,1)} 回复说：</div>
	<div class="clear"></div>
	<div class="guestbook_content">{$vo.content}</div>
	</div>
	<div class="clear"></div>
	</td>
	<td class="funTd">
	<a href="javascript:void(0)" class="listBtn lbtnDelete" onclick='isConfirm("__URL__/delete?id={$vo.id}","删除后不可恢复，确定要继续吗？")' title="彻底删除"></a>
	</td>
	</tr>
</if>
</volist>
</table>