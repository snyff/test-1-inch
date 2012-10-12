<?php
	$text = $_GET['text'];
	$fromLang = $_GET['from_lang'];
	$toLang = $_GET['to_lang'];
	
	$text = str_replace(' ', '%20', $text);
	$content = file("http://translate.google.com/translate_a/t?client=t&text=".$text."&sl=".$fromLang."&tl=".$toLang);
	$content = str_replace('"', '', $content[0]);
	iconv_set_encoding("internal_encoding", "ISO-8859-1");
	iconv_set_encoding("output_encoding", "UTF-8");
	$content = iconv("ISO-8859-1", "UTF-8", $content);
	
	echo utf8_encode($content);
?>