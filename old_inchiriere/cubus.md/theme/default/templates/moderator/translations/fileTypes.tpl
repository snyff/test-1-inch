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
			<h3>[Editare tip fisier {5070}]</h3>
			<div class="big-box">
				<div class="big-box-inner">

					<ZONE fileTypeList enabled>
						<br />
						<form method="post" action="?L=moderator.translations.fileTypes&chromeless=1">
 							<LOOP fileTypeList> 
								<div style="border-top:1px #EFEFEF solid;"></div>
								<table class="license" cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid; border-left:1px #EFEFEF solid;">
									<tr>
 									   <td width="140">[Default name {5071}]:</td>
									   <td><input type="text" name="fileType[{id_file_type}][default_name]" value="{value}" /></td>
									</tr>
									{file_type_trans}
								</table>
 							</LOOP fileTypeList>								
 							<div style="border-top:1px #EFEFEF solid;"></div>
							<DIV style="background:#f5f5f5;"><p>[+ Adauga tip fisier {5074}]</p></DIV>
 							<LOOP fileTypeListNewList> 
								<div style="border-top:1px #EFEFEF solid;"></div>
								<table class="license" cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid; border-left:1px #EFEFEF solid;">
									<tr>
 									   <td width="140">[Default name: {5071}]</td>
									   <td><input type="text" name="newfileType[][default_name]" value="" /></td>
									</tr>
									{new_file_type_trans}
								</table>
 							</LOOP fileTypeListNewList>								

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
					</ZONE fileTypeList enabled> 
					<ZONE fileTypeList empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[+ Adauga tip fisier. {5074}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE fileTypeList empty>
 
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

