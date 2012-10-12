<?php
class FooterBlock extends Block{
	function buildContent() {
		$top20Stats = '
			<script type="text/javascript">
				top20_id="inchirieremd";
				top20_showimg=0;
			</script>
			<script src="http://www.top20.md/client/scripts/stats.js" type="text/javascript"></script>
			<noscript>
				<a href="http://www.top20.md/?site=inchirieremd"><img border="0" alt="top20.md" src="http://v1.stream.top20.md/?top20_id=inchirieremd"/></a> 
			</noscript>
		';
		$gAnalytics = '
			</body>
			<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
				</script>
				<script type="text/javascript">
				try {
				var pageTracker = _gat._getTracker("UA-10160390-1");
				pageTracker._trackPageview();
				} catch(err) {}
			</script>
<!-- Start SEO monitor -->
<a href="http://seomonitor.bunt.ro" id="seomonitor" style="position:relative;">SEO</a>
<script type="text/javascript">
document.write(unescape("%3Cscript src=\'http://seomonitor.ro/seomonitor.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<!-- End SEO monitor -->
		';
		if(!$this->getParameter('withoutHeader')) {
			$html .= '
						
						<br clear="all">
						'.getPromoAds().'
						<div id="footer" style="position:relative;">
							<div style="position: absolute;top: 10px;" title="Help for people that are stuttering."><a href="http://www.iamstuttering.com/">Stuttering treatment</a></div>
							<div id="footerMiddle">
								inchiriere.md - '.translate(146, LANG).' | <a href="'.getUrl(array('pagePath'=>'Privacy', 'lang'=>LANG)).'">'.translate(159, LANG).'</a> | '.translate(69, LANG, 'Reguli').': <a href="mailto:contacts@inchiriere.md">contacts@inchiriere.md</a> | <a href="'.getUrl(array('pagePath'=>'Sitemap', 'lang'=>LANG)).'">'.translate(164, LANG, 'Sitemap').'</a>
							</div>
							<div id="footerRight">
							</div>
						</div>
						<div id="reper">
						</div>
			';
		}

		$cheatOn = isCheatOn();
		$cheatOn = 0;
		if((!isset($_COOKIE['w__mc'])/* || $_COOKIE['w__mc']=='ut'*/) && $cheatOn) {
			$cookieVal = $_COOKIE['w__mc'];
			if($cookieVal=='ut') {
				$cookieVal = 'mi';
			}
			if(!$cookieVal) {
				$cookieVal = 'ut';
			}
			$cheatJs = '
				<script id="mirss">
					function setCookie(c_name, value, expiredays) {
						var exdate=new Date();
						exdate.setDate(exdate.getDate()+expiredays);
						document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
					}
				</script>
			';
		}
		
		echo $html.$gAnalytics.$top20Stats.$cheatJs.'</html>';
	}
}
?>