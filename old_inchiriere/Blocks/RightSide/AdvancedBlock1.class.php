<?php
class AdvancedBlock extends Block{
	function buildContent() {
		$js = '<script>
					function changeBg(theThis) {
						$.ajax({
								url:	"'.getUrl(array('pagePath'=>'AdvancedOptions', 'lang'=>LANG)).'?action="+theThis.id,
								beforeSend: function(){
									$(theThis).addClass("optionsLoader");
								},
								success: function(xml_doc){
									$infoDiv = "<div id=\'optionsDiv\' class=\'optionsSlideUp displayNone\'>"+xml_doc+"</div>";
									$("#optionsDiv").remove();
									$("#reper").after($infoDiv);
									$(theThis).removeClass("optionsLoader");
									$("#optionsDiv").slideDown();
								}
							});
					}
			   </script>
		';
		$html .= '
			<div class="adver-content">
				<h2>'.translate(24, LANG, 'Optiuni adaugatoare').'</h2>
				<ul>
					<li><a href="javascript:void(0);" id="bug" onClick="changeBg(this);">'.translate(45, LANG, 'Raporteaza Bug').'</a></li>
					<li><a href="javascript:void(0);" id="false_number" onClick="changeBg(this);">'.translate(47, LANG, 'Raporteaza Bug').'</a></li>
					<li><a href="javascript:void(0);" id="improvement" onClick="changeBg(this);">'.translate(51, LANG, 'Propune Imbunatatire').'</a></li>
				</ul>
			</div>
		';
		echo $html.$js;
	}
}
?>