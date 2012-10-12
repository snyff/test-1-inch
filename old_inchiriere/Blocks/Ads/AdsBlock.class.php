<?php
class AdsBlock extends Block{
	function buildContent() {
                echo '';
                return;
		$html = '<a href="'.getUrl(array('pagePath'=>'Ads', 'queryString'=>'')).'"><img src="http://ajutor.md/images/banners/devishnik_240x80.gif" /></a>';
		$html = '<div style="height: 5px;"></div><div style="margin: 0 auto; width: 982px;">'.$html.'</div>';
		echo $html;
	}
}
?>