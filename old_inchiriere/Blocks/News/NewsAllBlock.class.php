<?php
class NewsAllBlock extends Block{
	function buildContent() {
		require 'include/data/news.lib.php';
		require 'include/data/flat.lib.php';
		$news = getNews();
		for($i=0;$i<count($news);$i++) {
			$newsContent .= '
				<a name="'.$news[$i]['id'].'"></a>
				<span class="textItalic textBold text11px colorBlue">'.substr($news[$i]['date_added'], 0, 10).'</span><br />
				<span class="text12px textBold">'.$news[$i]['short_text_'.substr(LANG, 0, 2)].'</span><br />
				<span class="text12px">'.$news[$i]['long_text_'.substr(LANG, 0, 2)].'</span><br />
			';
			if($i!=count($news)-1) {
				$newsContent .= '<div class="dotted"></div>';
			}
		}
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(174, LANG, 'Noutati');
		$html .= '
			<div class="paddingLeft14 paddingTop14">
				'.stripslashes($newsContent).'
			</div>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="textBold text24px colorBlue textCenter marginBottom5 headerStyle">'.translate(174, LANG, 'Noutati').'</div>'.$html;		
		echo $html;
	}
}


?>