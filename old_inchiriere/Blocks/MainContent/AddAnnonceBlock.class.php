<?php
class AddAnnonceBlock extends Block{
	function buildContent() {
		$js = '
				<script>
					function getContent(theThis) {
						$.ajax({
			 				url: "'.getUrl(array('pagePath' => 'GetClientContent', 'lang' => LANG)).'",
			 				data: "type="+theThis.value,
			 				type: "post",
			 				beforeSend: function(){
			 					$("#client_type_loader").css("display", "inline");
							},
			 				success: function(xml_doc){
			 					//xml_doc = clearJson(xml_doc);
			 					$("#action").html(xml_doc);
			 					$("#client_type_loader").css("display", "none");
			 					$("#infoEmailPass").hide();
							}
						});
					}
				</script>
		';
		$html .= '
			<center>  
				<div class="content-main positionRelative">
					<span class="colorBlue textVerdana textBold text21px headerStyle">'.translate(142, LANG, 'Alegeti o categorie').': </span>
					<select name="client_type" onChange="getContent(this);" class="inputText padding5">
						<option value="none" selected="selected">-</option>
						<option value="for_rent">'.translate(40, LANG, 'Dau in chirie').'</option>
						<option value="rent">'.translate(42, LANG, 'Inchiriez').'</option>
					</select>
					<div class="clientType" id="client_type_loader"></div>
					<br />
					<br />
					<div id="action"></div>
				</div>
			</center>
		';
		echo $html.$js;
	}
}
?>