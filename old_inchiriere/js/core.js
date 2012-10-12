$(document).ready(function(){
	$("#help_subscription").mouseover(function(){
		$("#help_subscription_div").show();
	}).mouseout(function(){
		$("#help_subscription_div").hide();
	});
	
	$("#statutHelp").mouseover(function(){
		$("#statutHelp_div").show();
	}).mouseout(function(){
		$("#statutHelp_div").hide();
	});
	$("#optionsHelp").mouseover(function(){
		$("#optionsHelp_div").show();
	}).mouseout(function(){
		$("#optionsHelp_div").hide();
	});
//	$(".date").datepicker();
});

function clearJson(str) {
	var result = str.indexOf("<!-- www.000webhost.com");
	var retStr = str.substr(0,result);
	return retStr;
}

function switchUserName(state) {
	switch(state) {
		case 1:
			if($.trim($("#user").val()) == 'email') {
				$("#user").val('');
			}
			break;
		case 2:
			if($.trim($("#user").val()) == '') {
				$("#user").val('email');
			}
	}
}
function NewWindow(hrf, w, h) {
	 w1=screen.width-100;
	 h1=screen.height-200;
	 if (w>w1) w=w1;
	 if (h>h1) h=h1;
	 var winl = (screen.width - w) / 2;
	 var wint = (screen.height - h) / 2;
	
	 winprops = 'scrollbars=1,height='+h+',width='+w+',top='+wint+',left='+winl+','
	 win = window.open(hrf, '_blank', winprops)
	 if (parseInt(navigator.appVersion) >= 4) { 
		 	win.window.focus(); 
	 }
	
}