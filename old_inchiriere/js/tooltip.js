(function($){ $.fn.simpletooltip = function(){
	return this.each(function() {
		var text = $(this).attr("src");
//		$(this).attr("title", "");
		img = '<img src="'+text+'" height=270>';
		text =  img.replace('_min', '');
		if(text != undefined) {
			$(this).hover(function(e){
				var tipX = e.pageX + 12;
				var tipY = e.pageY + 12;
//				$(this).attr("title", "");
				$("body").append("<div id='simpleTooltip' style='position: absolute; z-index: 100; display: none;'>" + text + "</div>");
				if($.browser.msie) var tipWidth = $("#simpleTooltip").outerWidth(true)
				else var tipWidth = $("#simpleTooltip").width()
				$("#simpleTooltip").width(tipWidth);
				$("#simpleTooltip").css("left", tipX).css("top", tipY).show();
			}, function(){
				$("#simpleTooltip").remove();
//				var text2 = $(this).attr("title");
//				if(text2) text=text2;
//				$(this).attr("title", text);
			});
			$(this).mousemove(function(e){
				var tipX = e.pageX + 15;
				var tipY = e.pageY + 15;
				var tipWidth = $("#simpleTooltip").outerWidth(true);
				var tipHeight = $("#simpleTooltip").outerHeight(true);
				if(tipX + tipWidth > $(window).scrollLeft() + $(window).width()) tipX = e.pageX - tipWidth;
				if($(window).height()+$(window).scrollTop() < tipY + tipHeight) tipY = e.pageY - tipHeight;
				$("#simpleTooltip").css("left", tipX).css("top", tipY).show();
			});
		}
	});
}})(jQuery);