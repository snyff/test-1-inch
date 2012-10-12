<?php
class SitemapMainBlock extends Block{
	function buildContent() {
		$html = '
			<ul>
				<li>
					<a href="'.getUrl(array('pagePath' => 'HomePage', 'lang' => LANG)).'">'.translate(68, LANG, 'Acasa').'</a>
				</li>
				<li>
					<a href="'.getUrl(array('pagePath' => 'AddAnnonce', 'lang' => LANG)).'">'.translate(130, LANG, 'Adauga Anunt').'</a>
				</li>
				<li>
					<a href="'.getUrl(array('pagePath' => 'Sitemap', 'lang' => LANG, 'reste' => 'for-rent')).'">'.translate(40, LANG, 'Dau In Chirie').'</a>
				</li>
				<li>
					<a href="'.getUrl(array('pagePath' => 'Sitemap', 'lang' => LANG, 'reste' => 'rent')).'">'.translate(42, LANG, 'Inchiriez').'</a>
				</li>
				<!--<li>
					<a href="'.getUrl(array('pagePath' => 'Registration', 'lang' => LANG)).'">'.translate(64, LANG, 'Inregistrare').'</a>
				</li>-->
				<li>
					<a href="'.getUrl(array('pagePath' => 'About', 'lang' => LANG)).'">'.translate(70, LANG, 'Despre Noi').'</a>
				</li>
			</ul>
		'; 
		$html = annonce($html, false, false, false, 'H');
		$html = '<div class="textBold text24px colorBlue textCenter marginBottom5">'.translate(164, LANG, 'Sitemap').'</div>'.$html;
		echo $html;
	}
}
?>