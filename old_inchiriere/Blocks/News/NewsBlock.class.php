<?php
require 'include/data/news.lib.php';
class NewsBlock extends Block{
	function setCache() {
		$cnt = getNews(false, false, true);
		$this->cachePath('MainContent/');
		$this->setCacheTime(3000);
		$this->cache(array( 'lang' => LANG, 
							'cnt'  => $cnt)
		);
	}
	function buildContent() {
		$news = getNews(false, 5);
		for($i=0;$i<count($news);$i++) {
			$newsContent .= '
				<span class="textItalic textBold text11px colorBlue">'.substr($news[$i]['date_added'], 0, 10).'</span><br />
				<span class="text12px">'.$news[$i]['short_text_'.substr(LANG, 0, 2)].'</span><br />
				<div class="textRight"><a class="text10px textItalic colorRed" href="'.getUrl(array('pagePath'=>'News', 'lang'=>LANG)).'#'.$news[$i]['id'].'">» '.translate(20, LANG).'</a>&nbsp;</div>
				<div class="dotted"></div>
			';
		}
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(174, LANG, 'Noutati').'</span>';
		$html .= '
			<div class="paddingLeft14 paddingTop14">
				'.stripslashes($newsContent).'
				<div class="textRight">
					<a href="'.getUrl(array('pagePath'=>'News', 'lang'=>LANG)).'" class="text11px textItalic">'.translate(175, LANG, 'Toate noutatile').'</a>&nbsp;
				</div>
			</div>
		';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		if(count($news)) {
			echo '<div class="separator"> </div>'.$html;
		}		
	}
}
?>