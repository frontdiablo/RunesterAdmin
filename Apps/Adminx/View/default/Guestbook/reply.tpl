<include file="Public:pub_top" />
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
<style type="text/css">
html,body{width:100%;overflow:hidden}
</style>
</head>
<body>
<form enctype="multipart/form-data" method="POST" name="myform" target="_parent"  action="__URL__/insert">
<input type="hidden" name="pid" value="{$id}" />
<editor name="content" height="250" resize="0"></editor>
<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_REPLY}' />
</div>
</form>
</body>
</html>
