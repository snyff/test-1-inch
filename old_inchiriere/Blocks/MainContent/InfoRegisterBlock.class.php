<?php
class InfoRegisterBlock extends Block{
	function buildContent() {
		$reste = $this->page->reste;
		if($reste[1] == 'status_w') {
			return false;
		}
		$html .= '
			'.translate(167, LANG, 'Specificati un email si o parola cind adaugati anuntul, aceasta va va oferi urmatoarele posibilitati').':<br />
			<ul>
				<li>
					'.translate(168, LANG, 'Sa adaugati fotografii').'
				</li>
				<li>
					'.translate(169, LANG, 'Sa modificati anuntul').'
				</li>
				<li>
					'.translate(170, LANG, 'Sa stergeti anuntul').'
				</li>
				<li>
					'.translate(171, LANG, 'Sa analizati statistica vizitelor anuntului Dvs.').'
				</li>
			</ul>
		';
		$html = annonce($html, false, false, false, 'H');
		$html = '<div id="infoEmailPass">'.$html.'</div>';
		echo $html;
	}
}
?>