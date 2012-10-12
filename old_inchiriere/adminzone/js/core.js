// JavaScript Document

$(document).ready(function(){
		$("#tablesorter").tablesorter({ sortList:[ [2,1]] });
		$(".cornered").corner();
		$(".date").datepicker();
//		$.timer(52000, function(){
//			$.ajax({
//				url:	'libs/content.lib.php?action=no_action',
//				beforeSend: function(){
//				},
//				success: function(xml_doc){
//				}
//			});
//		});
		
		$('#menu_caller').click(function(){
			$content = $('#menu_caller').html();
			if($content == 'Hide Menu') {
				$('#menu').toggle();
				$('#main_content').removeClass("left212");
				$('#menu_caller').html("Show Menu");
			}
			if($content == 'Show Menu') {
				$('#menu').toggle();
				$('#main_content').addClass("left212");
				$('#menu_caller').html("Hide Menu");
			}
		});
		
		$("#menu a").click(function(){
			if ($(this).attr("id") == 'content') {
				$('#sub_content').toggle(700);
				return false;
			}
			if ($(this).attr("id") == 'products') {
				$('#sub_content_products').toggle(700);
				return false;
			}
			if ($(this).attr("id") == 'stats_main') {
				$('#sub_content_stats').toggle(700);
				return false;
			}
			if ($(this).attr("id") == 'logout') {
				window.location = 'logout.php';
				return true;
			}
			ajaxRequest($(this).attr('id'), 'sub_action', $(this).attr('sub_id'));
			return false;
		});
});

function ajaxRequestSerialize( action, form_id ) {
	$.ajax({
		url:	'libs/content.lib.php?action=' + action + '&' + $(form_id).serialize(),
		beforeSend: function(){
			$("#loader").show();
			$("#overlay").show();
		},

		success: function(xml_doc){
			$('#main_content').html(xml_doc);
			bindAll();
			$("#loader").hide();
			$("#overlay").hide();
		}
	});
}

function ajaxRequest( action, param1, value1, param2, value2, param3, value3, param4, value4 ) {
	$.ajax({
		url: 'libs/content.lib.php',
		data: 'action='+action+'&'+param1+'='+value1+'&'+param2+'='+value2+'&'+param3+'='+value3+'&'+param4+'='+value4,
		type: 'post',
		beforeSend: function(){
			$("#loader").show();
			$("#overlay").show();
		},

		success: function(xml_doc){
			$('#main_content').html(xml_doc);
			bindAll();
			$("#loader").hide();
			$("#overlay").hide();
		}
	});
}

function bindAll() {
	$(".date").datepicker();
	$("#tablesorter").tablesorter();
	$("#tablesorter a").click(function(){
		if($(this).attr('type') == "delete") {
			var sure = confirm("Confirm deleting admin: '"+$(this).attr("admin_name")+"'");
			if (sure) {
				ajaxRequest('admins', 'del_admin', $(this).attr('admin'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "delete_news") {
			var sure = confirm("Confirm deleting news: '"+$(this).attr("news_id")+"'");
			if (sure) {
				ajaxRequest('news', 'del_news', $(this).attr('news_id'));
				return false;
			} else {
				return false;
			}
		}

		if($(this).attr('type') == "modify") {
			$('#admin_modify_name').val($(this).attr("admin_name"));
			$('#admin_modify_pass').val($(this).attr("password"));
			$('#admin_id').val($(this).attr("admin"));
			$('#admin_modify_form').show();
			$("#overlay").show();
			return false;
		}
		
		if($(this).attr('type') == "delete_adv") {
			var sure = confirm("Confirm deleting advertising nr: '"+$(this).attr("adv")+"'");
			if (sure) {
				ajaxRequest('advertising', 'del_adv', $(this).attr('adv'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "delete_user") {
			var sure = confirm("Confirm deleting user: '"+$(this).attr("user_name")+"'");
			if (sure) {
				ajaxRequest('users', 'del_user', $(this).attr('user'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "del_content") {
			var sure = confirm("Confirm deleting content: '"+$(this).attr("content_id")+"'");
			if (sure) {
				ajaxRequest('homepage', 'sub_action', 'homepage', 'del_content', $(this).attr('content_id'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "del_article") {
			var sure = confirm("Confirm deleting article: '"+$(this).attr("content_id")+"'");
			if (sure) {
				ajaxRequest('articles','sub_action', 'articles', 'del_article', $(this).attr('content_id'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "delete_trans") {
			var sure = confirm("Confirm deleting translation: '"+$(this).attr("trans_id")+"'");
			if (sure) {
				ajaxRequest('translate', 'del_translate', $(this).attr('trans_id'));
				return false;
			} else {
				return false;
			}
		}
		
		if($(this).attr('type') == "modify_trans") {
//			$('#eng_text_mod').val($(this).attr("eng"));
//			$('#rom_text_mod').val($(this).attr("rom"));
//			$('#rus_text_mod').val($(this).attr("rus"));
			
			var id = $(this).attr("trans_id");
			var eng_id = "#"+id+"_eng"; 
			var rom_id = "#"+id+"_rom"; 
			var rus_id = "#"+id+"_rus"; 
			
			$('#eng_text_mod').val($(eng_id).html());
			$('#rom_text_mod').val($(rom_id).html());
			$('#rus_text_mod').val($(rus_id).html());
			
			$('#trans_id').val($(this).attr("trans_id"));
			$('#trans_modify_form').show();
			$("#overlay").show();
			return false;
		}
		
		if($(this).attr('type') == "modify_news") {
			var id = $(this).attr("news_id");
			var short_ro = "#"+id+"_short_ro"; 
			var long_ro = "#"+id+"_long_ro"; 
			var short_en = "#"+id+"_short_en"; 
			var long_en = "#"+id+"_long_en"; 
			var short_ru = "#"+id+"_short_ru";
			var long_ru = "#"+id+"_long_ru";
			
			$('#rom_text_short').val($(short_ro).html());
			$('#rom_text_long').val($(long_ro).html());
			$('#eng_text_short').val($(short_en).html());
			$('#eng_text_long').val($(long_en).html());
			$('#rus_text_short').val($(short_ru).html());
			$('#rus_text_long').val($(long_ru).html());
			
			$('#news_id').val($(this).attr("news_id"));
			$('#news_add_div').show();
			$("#overlay").show();
			return false;
		}
		
		if($(this).attr('type') == "modify_adv") {
			$('#adv_modify').val($(this).attr("adv_content"));
			$('#adv_id').val($(this).attr("adv"));
			$('#adv_modify_form').show();
			$("#overlay").show();
			return false;
		}
	});
	
	$("#google_trans").click(function(){
		$selectedTransRadio = document.getElementsByName("g_trans_radio");
		$fromLang = false;
		$text = false;
		$toLang = false;
		$idChecked = false;
		for($i=0;$i<$selectedTransRadio.length;$i++) {
			if($selectedTransRadio[$i].checked) {
				$fromLang = $selectedTransRadio[$i].id;
				break;
			}
		}
		switch($fromLang) {
			case 'trans_from_eng': $fromLang = 'en';
								   $text = $("#eng_text").val();
									break;
			case 'trans_from_rom': $fromLang = 'ro';
									$text = $("#rom_text").val();
									break;
			case 'trans_from_rus': $fromLang = 'ru';
									$text = $("#rus_text").val();
									break;
		}
		if(document.getElementById("trans_field_rus").checked) {
			$toLang = 'ru';
			$idChecked = 'rus_text';
		}
		if(document.getElementById("trans_field_eng").checked) {
			$toLang = 'en';
			$idChecked = 'eng_text';
		}
		if(document.getElementById("trans_field_rom").checked) {
			$toLang = 'ro';
			$idChecked = 'rom_text';
		}
		$.ajax({
			url:	'libs/gtranslate.lib.php?from_lang='+$fromLang+'&to_lang='+$toLang+'&text='+$text,
			beforeSend: function(){
				$("#loader").show();
				$("#overlay").show();
			},

			success: function(xml_doc){
				$("#"+$idChecked).val(xml_doc);
				$("#loader").hide();
				$("#overlay").hide();
			}
		});
	});
	
	$('#show_hide').click(function(){
		ajaxRequest('articles', 'sub_action', 'articles', 'show_hide', $(this).attr('status'));
	});
	
	$(".resize").resizehandle();

	
	$('#advertising_add').click(function(){
		$('#adv_add_form').show();
		$('#overlay').show();
	});
	
	$('#translation_add').click(function(){
		$('#trans_add_form').show();
		$('#overlay').show();
	});
	
	$('#news_add').click(function(){
		$('#news_id').val('');
		$('#news_add_div').show();
		$('#overlay').show();
	});
	
	$('#cancel_modify_adv_but').click(function(){
		$('#adv_modify_form').hide();
		$("#overlay").hide();
	});
	
	$('#modify_adv_but').click(function(){
		ajaxRequest('advertising', 'modify_adv', $('#adv_modify').val(), 'adv_id', $('#adv_id').val());
		$('#adv_modify_form').hide();
		$("#overlay").hide();
	});
	
	$('#add_adv_but').click(function(){
		ajaxRequest('advertising', 'add_adv', $('#adv_add').val());
	});
	
	$('#add_trans_but').click(function(){
		ajaxRequest('translate', 'eng_text', $('#eng_text').val(), 'rom_text', $('#rom_text').val(), 'rus_text', $('#rus_text').val(), 'fra_text', $('#fra_text').val());
		
	});
	
	$('#add_news_but').click(function(){
		ajaxRequestSerialize('news', '#news_add_form');
		
	});
	
	$('#cancel_add_adv_but').click(function(){
		$('#adv_add_form').hide();
		$('#overlay').hide();
	});
	
	$('#cancel_add_trans_but').click(function(){
		$('#trans_add_form').hide();
		$('#overlay').hide();
	});
	$('#cancel_add_news_but').click(function(){
		$('#news_add_div').hide();
		$('#overlay').hide();
	});
	
	$('#modify_admin_but').click(function(){
		ajaxRequest('admins', 'admin_modify_name', $('#admin_modify_name').val(), 'admin_modify_pass', $('#admin_modify_pass').val(), 'admin_id', $('#admin_id').val());
		$('#admin_modify_form').hide();
	});
	
	$('#filter_button').click(function(){
		ajaxRequest('stats','date',$('#filter_date').val());
	});
	
	$('#filter_browser').click(function(){
		ajaxRequest('stats','date',$('#filter_date').val(), 'filter_browser', $('#browser_filter').val());
	});
	
	$('#filter_page').click(function(){
		ajaxRequest('stats','date',$('#filter_date').val(), 'filter_page', $('#page_filter').val());
	});
	
	$('#admin_add').click(function(){
		$('#admin_add_form').show();
		$("#overlay").show();
	});
	
	$('#cancel_add_admin_but').click(function(){
		$('#admin_add_form').hide();
		$("#overlay").hide();
		$('#admin_name').val("");
		$('#admin_pass').val("");
	});
	$('#cancel_modify_admin_but').click(function(){
		$('#admin_modify_form').hide();
		$("#overlay").hide();
	});
	
	$('#add_admin_but').click(function(){
		ajaxRequestSerialize('admins', '#add_admin');
		$('#admin_add_form').hide();
	});
	
	$('#exec_query').click(function(){
		ajaxRequest('mysql', 'query', $('#query').val());
	});
	
	$('#modify_trans_but').click(function(){
//		ajaxRequestSerialize('translate', '#trans_mod_form');
		ajaxRequest('translate', 'eng_text_mod', $('#eng_text_mod').val(), 'rom_text_mod', $('#rom_text_mod').val(), 'rus_text_mod', $('#rus_text_mod').val(), 'trans_id', $('#trans_id').val());
	});
	$('#search_trans_id_but').click(function(){
		ajaxRequestSerialize('translate', '#search_trans_id_form');
	});
	$('#search_trans_val_but').click(function(){
		ajaxRequestSerialize('translate', '#search_trans_val_form');
	});
	$('#cancel_modify_trans_but').click(function(){
		$('#trans_modify_form').hide();
		$("#overlay").hide();
	});
	$('#add_content').click(function(){
		$('#add_content_div').toggle(500);
	});
	
	$('#add_content_but').click(function(){
		ajaxRequest('', 'sub_action', 'homepage', 'content_text', $('#content_text').val(), 'key_word', $('#key_word').val());
	});
	
	$('#filter_ip').click(function(){
		ajaxRequest('stats', 'ip_filter', $('#ip_option').val(), 'date', $('#filter_date').val(), 'ip_list', $('#ip_list').val());
	});
	
	$('#show_humans').click(function(){
		ajaxRequest('stats', 'human', '1', 'date', $('#filter_date').val());
	});
	
	$('#submit_bot').click(function(){
		ajaxRequest('stats', 'submit_bot', $('#bot_add').val(), 'date', $('#filter_date').val());
	});
	
	$('#execute_filter').click(function(){
		ajaxRequestSerialize('stats_general', '#chart_filter_form');
	});
	
	
}






