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
		$db->query("SELECT * FROM articles WHERE id=".$modify);
		$row = $db->fetchArr();
		$form_action = 'modify';
	}
	
	$action = $_POST['action'];
	if (isset($action)) {
		switch ($action) {
			case 'submit' : 	
						$content 	= htmlentities($_POST['content']);
						$cat 		= $_POST['cat'];
						$pageKeywords 	= $_POST['keywords'];
						$lang 		= $_POST['lang'];
						$articleTitle = $_POST['article_title'];
						
						$db = new Db();
						$db->query("INSERT INTO articles(id, article_content, cat, time, updated, admin, key_word, lang, title)
										VALUES ('', '".addslashes($content)."', '{$cat}', NOW(), NOW(), '{$_SESSION['adminid']}', '".addslashes($pageKeywords)."', '{$lang}', '".addslashes($articleTitle)."')");
						echo "Article added with success. Close this window.";
						break;
			case 'modify' : 
						$content 	= htmlentities($_POST['content']);
						$cat 		= $_POST['cat'];
						$contentId 	= $_POST['content_id'];
						$pageKeywords 	= $_POST['keywords'];
						$articleTitle = $_POST['article_title'];
												
						$db = new Db();
						$db->query("UPDATE articles SET cat='{$cat}', key_word='".addslashes($pageKeywords)."', article_content='".addslashes($content)."', updated=NOW(), admin='{$_SESSION['adminid']}', title='".addslashes($articleTitle)."' WHERE id='{$contentId}'");
						echo "Article modified with success. Close this window.";
						break;
		}
		exit;
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
  		<div class="textSize15 textVerdana marginBottom10 textBold">Content "Articles"</div>
  		<form action="" method="post">
  			<div class="marginBottom5">
	  			Category:<br>
	  			<input type="text" name="cat" class="marginBottom5" value="<?php echo $row['cat']?>">
	  			<select name="lang">
	  				<option value="rom">Romanian</option>
	  				<option value="eng">English</option>
	  				<option value="rus">Russian</option>
	  			</select>
	  		<div>
	  		<div class="marginBottom5">
	  			Keywords:<br>
	  			<input type="text" name="keywords" class="marginBottom5 width500" value="<?php echo $row['key_word']?>">
	  		<div>
	  		<div class="marginBottom5">
	  			Article title:<br>
	  			<input type="text" name="article_title" class="marginBottom5 width500" value="<?php echo $row['title']?>">
	  		<div>
	  		Content:<br>
	  		<textarea name="content"><?php echo html_entity_decode($row['article_content'])?></textarea><br>
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
	  			<input type="text" name="page_title" class="marginBottom5" value="<?php echo $row['key_word']?>">
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