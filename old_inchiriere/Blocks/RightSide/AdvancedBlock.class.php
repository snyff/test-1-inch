<?php
class AdvancedBlock extends Block{
	function buildContent() {
		$js = '<script>
					function changeBg(theThis, id) {
						$.ajax({
								url:	"'.getUrl(array('pagePath'=>'AdvancedOptions', 'lang'=>LANG, 'absolute'=>false)).'?action="+theThis.id,
								beforeSend: function(){
									$("#"+id).addClass("optionsLoader");
								},
								success: function(xml_doc){
									$infoDiv = "<div id=\'optionsDiv\' class=\'optionsSlideUp displayNone\'>"+xml_doc+"</div>";
									$("#optionsDiv").remove();
									$("#reper").after($infoDiv);
									$("#"+id).removeClass("optionsLoader");
									$("#optionsDiv").slideDown();
								}
							});
					}
			   </script>
		';
		$header = '<span class="colorBlue textVerdana textBold text13px">'.translate(24, LANG, 'Optiuni adaugatoare').'</span>';
		$html .= '
			<div class="advanced">
				<ul>
					<li id="li_bug"><a href="javascript:void(0);" class="noDecoration colorBlack textVerdana text13px textBold" id="bug" onClick="changeBg(this, \'li_bug\');">'.translate(45, LANG, 'Raporteaza Bug').'</a></li>
					<li id="li_false_number"><a href="javascript:void(0);" class="noDecoration colorBlack textVerdana text13px textBold" id="false_number" onClick="changeBg(this, \'li_false_number\');">'.translate(47, LANG, 'Raporteaza Bug').'</a></li>
					<li id="li_improvement"><a href="javascript:void(0);" class="noDecoration colorBlack textVerdana text13px textBold" id="improvement" onClick="changeBg(this, \'li_improvement\');">'.translate(51, LANG, 'Propune Imbunatatire').'</a></li>
				</ul>
			</div>
		';
		$html = box($header, $html, 'blueBorder', false, 'defaultHeader');
		echo $html.$js;
	}
}
?>