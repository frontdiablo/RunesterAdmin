<div class="logoContainer">
<a href="{:U('Admin/edit')}"><img src="/__UPLOADIMG__/head/{$admin_head}" class="sidebarLogo radius" /></a>
<a href="{:U('Admin/edit')}" class="nameLink">

<if condition="$admin_nickname neq ''">
{$admin_nickname}
<else />
{$admin_username}
</if>



</a>
</div>
<ul>

<if condition="returnAuth($Thik.MODULE_NAME.'/Page/index')">
<li><a href="{:U('Page/index')}" class="sidebarBtn btnPage {$sideactive.page}"></a></li>
</if>

<if condition="returnAuth($Thik.MODULE_NAME.'/Article/index')">
<li><a href="{:U('Article/index')}" class="sidebarBtn btnArticle {$sideactive.article}"></a></li>
</if>


<li><a href="{:U('Guestbook/index')}" class="sidebarBtn btnGuestbook"></a></li>

<if condition="returnAuth($Thik.MODULE_NAME.'/Admin/index')">
<li><a href="{:U('Admin/index')}" class="sidebarBtn btnUser {$sideactive.admin}"></a></li>
</if>

<if condition="returnAuth($Thik.MODULE_NAME.'/AdminRule/index')">
<li><a href="{:U('AdminRule/index')}" class="sidebarBtn btnRule {$sideactive.rule}"></a></li>
</if>

<if condition="returnAuth($Thik.MODULE_NAME.'/Nav/index')">
<li><a href="{:U('Nav/index')}" class="sidebarBtn btnNav {$sideactive.nav}"></a></li>
</if>

<if condition="returnAuth($Thik.MODULE_NAME.'/Config/web')">
<li><a href="{:U('Config/web')}" class="sidebarBtn btnSetting {$sideactive.config}"></a></li>
</if>

<li><a href="{:U('Index/LoginOut')}" class="sidebarBtn btnQuit "></a></li>

<!--

<li><a href="{:U('Article/index')}" class="sidebarBtn btnPlugin"></a></li>
-->
</ul>
