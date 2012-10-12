<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  12.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=moderator.translators.translatorsList">[Reincarca Pagina {5000}]</a> <!--| <a href="{siteURL}/?L=moderator.files.filesMap">[Harta fisiere {5035}]</a> -->
				</div>
				[Traducatori {5050}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<ZONE translatorsList enabled>
						<br />
						<LOOP translatorsList>
							<h4 style="font-weight:normal;"> &nbsp; #&nbsp; <span style="font-weight:bold">{name}</span> - <a target="_blank" href="?L=moderator.users.redirection&ghost={id}&chromeless=1">[profilul {5192}]</a> | <a href="?L=moderator.translators.translatorPage&id={id}">[editeaza {5055}]</a>  <p style="float:right; padding:0px; margin:0px; margin-right:10px; margin-top:-18px;">[translator {5054}]: <a href="?L=moderator.translators.activateDeactivate&t={id}&s={t.status}&chromeless=1">{tstatus.name}</a> &nbsp;&nbsp;[editor {5053}]: <a href="?L=moderator.translators.activateDeactivate&e={id}&s={e.status}&chromeless=1">{estatus.name}</a></p></h4>							
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

<OBJ activate><span style="color:#D8921D">[activeaza {5077}]</span></OBJ activate>		
<OBJ deactivate><span style="color:#009900">[dezactiveaza {5078}]</span></OBJ deactivate>		

