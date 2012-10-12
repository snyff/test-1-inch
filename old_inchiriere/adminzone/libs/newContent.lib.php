<?php
	@session_start();
	function __autoload($class_name) {
    	require_once '../../classes/'. $class_name . '.class.php';
	}
	require "../login.php";
	
	$modifying = false;
	$form_action = 'submit';
	$modify = $_GET['modify'];
	
	$type = $_GET['type'];
	
	if (isset($modify)) {
		$db = new Db();
		$db->query("SELECT * FROM content WHERE id=".$modify);
		$row = $db->fetchArr();
		$form_action = 'modify';
	}
	
	$action = $_POST['action'];
	if (isset($action)) {
		switch ($action) {
			case 'submit' : 	
						$keyWord 	= $_POST['key_word'];
						$content 	= htmlentities($_POST['content']);
						$type 	 	= $_POST['type'];
						$lang 	 	= $_POST['lang'];
						$pageTitle 	= $_POST['page_title'];
						
						$db = new Db();
						$db->query("INSERT INTO content(id, type, content, key_word, time, updated, admin, lang, page_title)
										VALUES ('', '{$type}', '{$content}', '{$keyWord}', NOW(), NOW(), '{$_SESSION['adminid']}', '{$lang}', '{$pageTitle}')");
						echo "Content added with success. Close this window.";
						break;
			case 'modify' : 
						$keyWord = $_POST['key_word'];
						$content = htmlentities($_POST['content']);
						$type = $_POST['type'];
						$contentId = $_POST['content_id'];
												
						$db = new Db();
						$db->query("UPDATE content SET type='{$type}', content='{$content}', key_word='{$keyWord}', updated=NOW(), admin='{$_SESSION['adminid']}' WHERE id='{$contentId}'");
						echo "Content modified with success. Close this window.";
						break;
		}
		exit;
	}
	
	switch ($type) {
			case '1'		: $title = '"Home Page"'; break;
			case '2'		: $title = '"How it works"'; break;
			case '3'		: $title = '"Take a tour"'; break;
			case '4'		: $title = '"Register"'; break;
			case '5'		: $title = '"Forum"'; break;
			case '6'		: $title = '"Contacts"'; break;
			case '7'		: $title = '"About Us"'; break;
		}
	
?>

<html>
 <head>
 	<link href="../css/admin.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/tinymce/tiny_mce.js"></script>
	<script type="text/javascript">
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "advanced",
			plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	
			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
	
			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",
	
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
			media_external_list_url : "lists/media_list.js",
	
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	</script>
  </head>
  <body>
  	<div class="main_div positionRelative">
  	<?php
  		if ($type != 8) { 
  	?>
  		<div class="textSize15 textVerdana marginBottom10 textBold">Content <?php echo $title?></div>
  		<form action="" method="post">
  			<div class="marginBottom5">
	  			Key word:<br>
	  			<input type="text" name="key_word" class="marginBottom5" value="<?php echo $row['key_word']?>">
	  		<div>
	  		<div class="marginBottom5">
	  			Page title:<br>
	  			<input type="text" name="page_title" class="marginBottom5 width500" value="<?php echo $row['page_title']?>">
	  		<div>
	  		<select name="lang">
	  				<option value="rom">Romanian</option>
	  				<option value="eng">English</option>
	  				<option value="rus">Russian</option>
	  		</select><br /><br />
	  		Content:<br />
	  		<textarea name="content"><?php echo html_entity_decode($row['content'])?></textarea><br>
	  		<input type="submit" value="Save" class="but marginBottom5 marginRight5">
	  		<input type="button" value="Cancel" class="but marginBottom5">
	  		<input type="hidden" name="type" value="<?php echo $type ?>">
	  		<input type="hidden" name="action" value="<?php echo $form_action ?>">
	  		<input type="hidden" name="content_id" value="<?php echo $row['id'] ?>">
	  	</form>
	  <?php
  		} else { 
	  ?>
	  	<div class="textSize15 textVerdana marginBottom10 textBold">Content <?php echo $title?></div>
  		<form action="" method="post">
  			<div class="marginBottom5">
	  			Page title:<br>
	  			<input type="text" name="page_title" class="marginBottom5" value="<?php echo $row['page_title']?>">
	  		<div>
	  		Content:<br>
	  		<textarea name="content"><?php echo html_entity_decode($row['content'])?></textarea><br>
	  		<input type="submit" value="Save" class="but marginBottom5 marginRight5">
	  		<input type="button" value="Cancel" class="but marginBottom5">
	  		<input type="hidden" name="type" value="<?php echo $type ?>">
	  		<input type="hidden" name="action" value="<?php echo $form_action ?>">
	  		<input type="hidden" name="content_id" value="<?php echo $row['id'] ?>">
	  	</form>
	  <?php
  		} 
	  ?>
  	</div>
  </body>