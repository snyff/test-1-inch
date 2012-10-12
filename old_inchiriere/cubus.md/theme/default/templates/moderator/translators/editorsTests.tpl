<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  11.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

1. nu poti sterge un test in cazul in care cineva are de facut un test sau trebuie de gindit o alta alternativa cred ca trebuie sa apara o alerte

<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>[Teste Editori {5147}]</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<br />
					<ZONE testList enabled>
						<table cellspacing="1" bgcolor="#f5f5f5" border="0" width="100%" cellpadding="8" style="border:1px #EFEFEF solid;">
							<tr>
							   <td bgcolor="#ffffff">
									<font style="font-weight:bold;">[Traducere din in {5065}] &raquo; [Tip fisier {5066}]</font>
							   </td>
							   <td bgcolor="#ffffff" width="45%">
									<font style="font-weight:bold;">[Lista fisiere test {5111}]</font>
							   </td>
							</tr>
							<LOOP testList>
								<tr>
								   <td bgcolor="#ffffff">
										<font>{from_languages} &raquo; {to_languages} &raquo; {file_type}</font>
								   </td>
								   <td bgcolor="#ffffff">
								   		{file}
								   </td>
								</tr>
							</LOOP testList>	
						</table>
						
						<OBJ fileNone>
							<nobr>
								<form enctype="multipart/form-data" action="?L=moderator.translators.einsertTestFile&chromeless=1" method="post"> 
									<input type="file" name="file" id="file"/> 
									<input type="hidden" name="translation_languages_id" value="{translation.languages.id}" />
									<input value="+ Adauga" name="Submit" type="submit">
								</form>
							</nobr>					
						</OBJ fileNone>		
						
						<OBJ fileIs>
							{file.name} <a href="?L=moderator.translators.eDeleteTestFile&f={file.id}&chromeless=1"><img src="theme/default/components/images/delete3.png"></a>
						</OBJ fileIs>		
						
					</ZONE testList enabled>
					<ZONE testList empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Va rugam sa adaugati pretul pentru traduceri. {5075}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE testList empty>
					<br />
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
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=c.registration"><b>[Register {5073}]</b></a> </td>
      </tr>
   </table>
</ZONE islogin guest>
