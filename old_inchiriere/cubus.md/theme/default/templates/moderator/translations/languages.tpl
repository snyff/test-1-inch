<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  27.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>[Editare traducator {5056}]</h3>
			<div class="big-box">
				<div class="big-box-inner">

					<ZONE languagesList enabled>
						<br />
						<form method="post" action="?L=moderator.translations.languages&chromeless=1">
 							<LOOP languagesList> 
								<div style="border-top:1px #EFEFEF solid;"></div>
								<table class="license" cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid; border-left:1px #EFEFEF solid;">
									<tr>
 									   <td width="140">[Default name {5071}]:</td>
									   <td><input type="text" name="languages[{languages_id}][default_name]" value="{value}" /></td>
									</tr>
									{languages_trans}
								</table>
 							</LOOP languagesList>								
 							<div style="border-top:1px #EFEFEF solid;"></div>
							<DIV style="background:#f5f5f5;"><p>[+ Adauga limba noua {5063}]</p></DIV>
 							<LOOP languagesNewList> 
								<div style="border-top:1px #EFEFEF solid;"></div>
								<table class="license" cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid; border-left:1px #EFEFEF solid;">
									<tr>
 									   <td width="140">[Default name {5071}]:</td>
									   <td><input type="text" name="newlanguages[][default_name]" value="" /></td>
									</tr>
									{new_languages_trans}
								</table>
 							</LOOP languagesNewList>								

							<table class="license" cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid;">
								<tr>
								   <td align="center">
										<p><input type="submit" value="[Salveaza {5062}]" /></p>
								   </td>
								</tr>
							</table>
							<div style="border-top:1px #EFEFEF solid;"></div>
						</form>
 						<br />
					</ZONE languagesList enabled> 
					<ZONE languagesList empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Nu sunt limbi adaugate. {5060}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE languagesList empty>
 
 				</div>
			</div>
 		</div>
		<!-- Block LIST -->
		<div class="right-column" style="padding-top:15px;">
			==blocklist==
		</div>
  		<div style="clear:both"></div>
		<!-- /Block LIST -->
	</div><!-- end bd -->
</ZONE islogin enabled>

<ZONE islogin guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[Sorry, guests can not upload pictures. {5072}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=registration.register"><b>[Register {5073}]</b></a> </td>
      </tr>
   </table>
</ZONE islogin guest>

