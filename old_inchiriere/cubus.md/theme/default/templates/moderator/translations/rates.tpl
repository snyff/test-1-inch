<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  30.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>[Adauga pret {5061}]</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<br />
					<ZONE priceList enabled>
						<table cellspacing="1" bgcolor="#f5f5f5" border="0" width="100%" cellpadding="8" style="border:1px #EFEFEF solid;">
							<tr>
							   <td bgcolor="#ffffff">
									<font style="font-weight:bold;">[Traducere din in {5065}] &raquo; [Tip fisier {5066}]</font>
							   </td>
							   <td bgcolor="#ffffff">
									<font style="font-weight:bold;">[Price {5067}]</font>
							   </td>
							   <td bgcolor="#ffffff" colspan="3" align="center">
									<font style="font-weight:bold;">[Operatiuni {5068}]</font>
							   </td>
							</tr>
							<LOOP priceList>
								<tr>
								   <td bgcolor="{bgcolor}" valign="top">
										<font>{from_languages} &raquo; {to_languages} &raquo; {file_type}</font>
								   </td>
								   <td bgcolor="{bgcolor}">
										<font style="color:red">{price}</font>
								   </td>
								   <td bgcolor="{bgcolor}">
										<a href="?L=moderator.translations.rates&edit={id}">[editeaza {5055}]</a>
								   </td>
								   <td bgcolor="{bgcolor}">
										<a href="?L=moderator.translations.rates&status={status}&id={id}&chromeless=1">{activ.notactiv}</a>
								   </td>
								   <td bgcolor="{bgcolor}">
										{default}
								   </td>
								</tr>
							</LOOP priceList>	
						</table>
						
						<OBJ defaultNone>
							<a href="?L=moderator.translations.rates&default={id}&chromeless=1">[default {5096}]</a>
						</OBJ defaultNone>		
						
						<OBJ defaultActive></OBJ defaultActive>		
						
						<OBJ statusActive>[activeaza {5077}]</OBJ statusActive>		
						<OBJ statusDeActive>[dezactiveaza {5078}]</OBJ statusDeActive>		
					</ZONE priceList enabled>
					<ZONE priceList empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Va rugam sa adaugati pretul pentru traduceri. {5075}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE priceList empty>
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
