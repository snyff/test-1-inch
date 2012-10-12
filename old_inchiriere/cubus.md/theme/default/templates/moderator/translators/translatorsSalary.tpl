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
			<h3>[Salarii Traducatori {5079}]</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<br />
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<td valign="top">
 							<ZONE percent enabled>
								<table cellspacing="1" bgcolor="#f5f5f5" border="0" cellpadding="8" style="border:1px #EFEFEF solid;">
									<tr>
									   <td bgcolor="#ffffff">
											<font style="font-weight:bold;">[Salariu Traducator {5081}] %</font> 
									   </td>
									</tr>
									<LOOP loopPercent>
										<tr>
										   <td bgcolor="#ffffff" valign="top">
												<font>{salary} %</font> 								  
 										   </td>
										</tr>
									</LOOP loopPercent>	
								</table>
 							</ZONE percent enabled>
							<ZONE percent empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Va rugam sa adaugati salarii pentru traducatori. {5082}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE percent empty>
  						</td>
						<td valign="top">
							<ZONE bonus enabled>
								<table cellspacing="1" bgcolor="#f5f5f5" border="0" cellpadding="8" style="border:1px #EFEFEF solid;">
									<tr>
									   <td bgcolor="#ffffff">
											<font style="font-weight:bold;">[Bonus {5087}] %</font> 
									   </td>
									   <td bgcolor="#ffffff">
											<font style="font-weight:bold;">[Suma minima {5085}]</font> 
									   </td>
									   <td bgcolor="#ffffff">
											<font style="font-weight:bold;">[Suma maxima {5086}]</font> 
									   </td>
									</tr>
									<LOOP loopBonus>
										<tr>
										   <td bgcolor="#ffffff" valign="top">
												<font>{bonus.name} %</font> 								  
 										   </td>
										   <td bgcolor="#ffffff" valign="top">
												<font>{bonus.min}</font> 								  
 										   </td>
										   <td bgcolor="#ffffff" valign="top">
												<font>{bonus.max}</font> 								  
 										   </td>
										</tr>
									</LOOP loopBonus>	
								</table>
								<br /><br />
 							</ZONE bonus enabled>
							<ZONE bonus empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Va rugam sa adaugati bonusuri pentru traducatori. {5083}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE bonus empty>
						</td>
					</table>
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
