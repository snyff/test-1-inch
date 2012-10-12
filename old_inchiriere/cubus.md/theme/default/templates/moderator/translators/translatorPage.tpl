<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  12.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->


	3. Legaturi <br />
	4. Trebuie de vazut in ce conditii putem sa stergem abilitati (daca traduce in file din RO->Ru nu putem sa ii stergem aceasta abilitate acum) <br />
	7. Daca dezactivam sau stergem o abilitate atunci trebuie sa vedem cum influenteaza legaturi le si al criterii ale platformei <br />


<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=moderator.files.filesList">[Reincarca Pagina {5000}]</a> <!--| <a href="{siteURL}/?L=moderator.files.filesMap">[Harta fisiere {5035}]</a> -->
				</div>
				[Traducatori {5050}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<ZONE translatorsList enabled>
						<br />
						<LOOP translatorsList>
							<h4>{name} - <a target="_blank" href="?L=moderator.users.redirection&ghost={id}&chromeless=1">[Editeaza {5055}]</a>  <p style="float:right; padding:0px; margin:0px; margin-right:10px; margin-top:-18px; font-weight:bold;">[translator {5054}]: <a href="?L=moderator.translators.activateDeactivate&t={id}&s={t.status}&chromeless=1">{tstatus.name}</a> &nbsp;&nbsp;[editor {5053}]: <a href="?L=moderator.translators.activateDeactivate&e={id}&s={e.status}&chromeless=1">{estatus.name}</a></p></h4>							
							<table bgcolor="#f5f5f5" cellspacing="1" border="0" cellpadding="3" style="width:100%; _width:94%;">
								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Abilitati {5097}] | <a href="?L=moderator.translators.translatorPage&ld=2&t={id}&action=addAbility">[Adauga {5064}]</a>
									</td>
								</tr>
								{tabil} 
  								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Bonusuri {5098}] | <a href="?L=moderator.translators.translatorPage&t={id}&action=addBonus">[Adauga {5064}]</a>
									</td>
								</tr>
								{tbonus}
								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Teste Traducator {5139}]:
									</td>
								</tr>
								{ttests} 
								<tr>
								   <td width="16" class="filesDetails"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
 										[Legaturi {5049}] 
									</td>
								</tr>
 								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
										[Nu sunt legaturi {5103}]
									</td>
								</tr>
								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Abilitati {5099}] | <a href="?L=moderator.translators.translatorPage&ld=2&e={id}&action=addAbility">[Adauga {5064}]</a>
									</td>
								</tr>
								{eabil} 
  								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Bonusuri {5109}] | <a href="?L=moderator.translators.translatorPage&e={id}&action=addBonus">[Adauga {5064}]</a>
									</td>
								</tr>
								{ebonus}
								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
										[Teste Editor {5146}]:
									</td>
								</tr>
								{etests} 
							</table>
						</LOOP translatorsList>										
						<div style="border-top:1px #EFEFEF solid;"></div>
						<br />
						<table bgcolor="#f5f5f5" cellspacing="1" border="0" cellpadding="3" style="width:100%; _width:94%;">
							<tr>
								<td width="15" bgcolor="yellow">&nbsp;</td><td bgcolor="#FFFFFF">[Nu sunt fisiere test pentru limbile respective. {5157}]</td>
							</tr>
						</table>
					</ZONE translatorsList enabled> 
					<ZONE translatorsList empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Nu sunt traducatori. {5052}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE translatorsList empty>
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

<OBJ testsNone>		
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			[Nu sunt fisiere la testare. {5140}]
		</td>
	</tr>
</OBJ testsNone>

<OBJ tactivAD><font size="1"><i><a href="?L=download.file&chromeless=1&path={o.path}&file={o.original_file}&filename={o.original_name}">[original {5148}]</a> : <a href="?L=download.file&chromeless=1&path={o.path}&file={t.original_file}&filename={t.original_name}">[traducerea {5149}]</a> -> <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&t={t}&a={a}&s=2">[Accepta {5150}]</a> | <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&t={t}&a={a}&s=3">[Respinge {5151}]</a></i></font></OBJ tactivAD>		
<OBJ eactivAD><font size="1"><i><a href="?L=download.file&chromeless=1&path={o.path}&file={o.original_file}&filename={o.original_name}">[original {5148}]</a> : <a href="?L=download.file&chromeless=1&path={o.path}&file={e.original_file}&filename={e.original_name}">[traducerea {5149}]</a> -> <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&e={e}&a={a}&s=2">[Accepta {5150}]</a> | <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&e={e}&a={a}&s=3">[Respinge {5151}]</a></i></font></OBJ eactivAD>		

<OBJ tactivNone><font size="1"><i>[Fisierul este in proces de traducere {5141}] -> <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&t={t}&a={a}&s=2">[Accepta {5150}]</a> | <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&t={t}&a={a}&s=3">[Respinge {5151}]</a></i></font></OBJ tactivNone>		
<OBJ eactivNone><font size="1"><i>[Fisierul este in proces de traducere {5141}] -> <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&e={e}&a={a}&s=2">[Accepta {5150}]</a> | <a href="?L=moderator.translators.activateDeactivateFile&chromeless=1&e={e}&a={a}&s=3">[Respinge {5151}]</a></i></font></OBJ eactivNone>		

<OBJ activA><font size="1" color="#009900">[Acceptat {5152}]</font></OBJ activA>	
<OBJ activR><font size="1" color="red">[Respins {5153}]</font></OBJ activR>		
<OBJ tcancelAbil><font size="1">&nbsp; &nbsp;[<a href="?L=moderator.translators.cancelAbil&chromeless=1&t={t}&a={a}">[Anuleaza {5154}]</a>]</font></OBJ tcancelAbil>
<OBJ ecancelAbil><font size="1">&nbsp; &nbsp;[<a href="?L=moderator.translators.cancelAbil&chromeless=1&e={e}&a={a}">[Anuleaza {5154}]</a>]</font></OBJ ecancelAbil>

<OBJ testsOk>	 
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			<table cellpadding="0" cellspacing="0" border="0">
				{tests}
			</table>
		</td>
	</tr>
</OBJ testsOk>		



<OBJ abilNone>		
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			[Nu sunt abilitati {5101}]
		</td>
	</tr>
</OBJ abilNone>


<OBJ abilOk>	
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			<table cellpadding="0" cellspacing="0" border="0">
				{ability}
			</table>
		</td>
	</tr>
</OBJ abilOk>		


<OBJ abilInactive><font size="1" color="red">[inactiv {5155}]</font></OBJ abilInactive>		
<OBJ abilActive><font size="1" color="#009900">[activ {5156}]</font></OBJ abilActive>		


<OBJ bonusNone>		
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			[Nu sunt bonusuri {5102}]
		</td>
	</tr>
</OBJ bonusNone>

<OBJ bonusOk>	
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			<table cellpadding="0" cellspacing="0" border="0">
				{bonus}
			</table>
		</td>
	</tr>
</OBJ bonusOk>		

<OBJ activate>[activeaza {5077}]</OBJ activate>		

<OBJ deactivate>[dezactiveaza {5078}]</OBJ deactivate>		

