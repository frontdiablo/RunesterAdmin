var messagebox_timer;
$.fn.messagebox = function(message, type, delay) {
	clearTimeout(messagebox_timer);
	$("#msgprint").remove();
	var m_body = $(this),
		timer = false;
	delay = (typeof delay == "undefined" ? 5000 : delay);
	var box_style;
	switch (type) {
		case 1 : box_style = "MessageBoxSuccess";break;
		case 0 : box_style = "MessageBoxError";break;
		default : box_style = "MessageBoxSuccess";break;
	}
	var str = "<div id=\"msgprint\" class=\"MessageBox " + box_style + "\">" + message + "</div>";
	m_body.append(str);
	var dom_obj = document.getElementById("msgprint");
	var ext_width = $("#msgprint").width();

	if($.browser.msie) { dom_obj.style.top = (document.documentElement.scrollTop + (document.documentElement.clientHeight - dom_obj.offsetHeight - $("#msgprint").height()) / 2) + "px"; } 
	else { dom_obj.style.top = (document.body.scrollTop+(document.documentElement.clientHeight - dom_obj.offsetHeight)/2 - 100)+"px"; }

	dom_obj.style.left = ((document.documentElement.clientWidth - dom_obj.offsetWidth - $("#msgprint").width()) / 2 - 100) + "px";
	$("#msgprint").fadeIn(500, function() {
		messagebox_timer = setTimeout(messagebox_out, delay)
	})
};
function messagebox_out() {$("#msgprint").fadeOut(500)}