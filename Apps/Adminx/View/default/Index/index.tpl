<include file="Public:pub_top" />
<style type="text/css">
html,body{overflow:hidden;width:100%;height:100%;}
body{background:url("__RESIMG__/bg_1.png")}
</style>
</head>
<body>
<include file="Public:pub_header" />
<div id="loginOutline">
<div id="loginInline">
<div id="loginLogo"><img src="__RESIMG__/logo.jpg" width="75" height="75" class="radius" /></div>
<h1>{$Think.lang.INDEX_PLEASELOGIN}</h1>
<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U('Index/login')}">
<input type="text" class="input unameInput" name="iUsername" value="avatar" />
<input type="password" class="input pwInput" name="iPassword" value="avatar" />
<div id="loginFunLeft"><input type="checkbox" value="1" name="autocheck" id="autocheck" /><label for="autocheck"> {$Think.lang.INDEX_AUTOLOGIN}</label></div>
<div id="loginFunRight"><input type="submit" value="{$Think.lang.INDEX_LOGIN}" class="btn btnBlue" /></div>
</form>
</div>
</div>
</body>
</html>