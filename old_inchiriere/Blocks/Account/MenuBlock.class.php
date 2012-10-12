<?php
class MenuBlock extends Block{
	function buildContent() {
		$html .= '
			<div id="main_menu">
				<div class="annonce">
					<div class="add">
						
					</div>
				</div>
				<div class="annonce">
					<div class="modify">
						
					</div>
				</div>
				<div class="annonce">
					<div class="">
						
					</div>
				</div>
<!--				<div class="annonce">
					<div class="rent">
						
					</div>
				</div>
				<div class="annonce">
					<div class="modify_rent">
						
					</div>
				</div>-->
				<div class="annonce">
					<div class="logout">
						
					</div>
				</div>
			</div>
			
			<div id="main_menu">
				<table border="0" class="fullWidth" cellpadding="0" cellspacing="0">
					<tr class="menuHeight">
						<td>
							<table>
								<tr>
									<td>
										<div class="addAcc"></div>
									</td>
									<td>
										<a href="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'add-app')).'" class="">'.translate(182, LANG, 'Dau in chirie').'</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<table>
								<tr>
									<td>
										<div class="modifyAcc"></div>
									</td>
									<td>
										<a href="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'manage-app')).'" class="">'.translate(41, LANG, 'Gestionarea Apartamentelor').'</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<table>
								<tr>
									<td>
										<div class="appStats"></div>
									</td>
									<td>
										<a href="'.getUrl(array('pagePath' => 'AnnStats', 'lang' => LANG)).'" class="">'.translate(135, LANG, 'Statistica').'</a>									
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<!--<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<a href="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'rent')).'" class="rentApp">'.translate(42, LANG, 'Inchiriez').'</a>
						</td>
					</tr>
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<table>
								<tr>
									<td>
										<div class="modify_rentAcc"></div>
									</td>
									<td>
										<a href="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'manage-rent')).'" class="">'.translate(43, LANG, 'Anunturile Mele').'</a>									
									</td>
								</tr>
							</table>
						</td>
					</tr>-->
					<tr>
						<td>
							<div class="separatorMenu"></div>
						</td>
					</tr>
					
					<tr class="menuHeight">
						<td>
							<table>
								<tr>
									<td>
										<div class="logoutAcc"></div>
									</td>
									<td>
										<a href="'.getUrl(array('pagePath' => 'Account', 'lang' => LANG, 'reste' => 'logout')).'" class="">'.translate(44, LANG, 'Iesire').'</a>									
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
		';
		echo $html;
	}
}
?>