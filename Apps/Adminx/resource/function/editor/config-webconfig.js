KindEditor.ready(function(K) {
var editor = K.editor({
allowFileManager : true
});

K('#iLogo').click(function() {
	editor.loadPlugin('image', function() {
		editor.plugin.imageDialog({
			imageUrl : K('#web_logo').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#web_logo').val(url);
				editor.hideDialog();
			}
		});
	});
});

var editor1 = K.create('textarea[name="web_footer1"]', {
resizeType : 1,
themeType : 'simple',
uploadJson : EDITROOT+'/php/upload_json.php',
fileManagerJson : EDITROOT+'/php/file_manager_json.php',
items : [
    'source', '|',
    'formatblock', 'fontname', 'fontsize', '|',
    'forecolor', 'hilitecolor', 'bold',	'italic', 'underline', 'strikethrough','|',
    'justifyleft', 'justifycenter', 'justifyright',	'justifyfull','|',
    'image','link', 'unlink'
    ],
allowFileManager : true,
width : '100%',
height : '140',
filterMode : false,
newlineTag : 'p'
});

var editor2 = K.create('textarea[name="web_footer2"]', {
resizeType : 1,
themeType : 'simple',
uploadJson : '__RESFUN__/editor/php/upload_json.php',
fileManagerJson : '__RESFUN__/editor/php/file_manager_json.php',
items : [
    'source', '|',
    'formatblock', 'fontname', 'fontsize', '|',
    'forecolor', 'hilitecolor', 'bold',	'italic', 'underline', 'strikethrough','|',
    'justifyleft', 'justifycenter', 'justifyright',	'justifyfull','|',
    'image','link', 'unlink'
    ],
allowFileManager : true,
width : '100%',
height : '140',
filterMode : false,
newlineTag : 'p'
});
});