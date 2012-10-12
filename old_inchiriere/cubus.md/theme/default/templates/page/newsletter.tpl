<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  23.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */
-->
	
	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td style="padding:20px;" bgcolor="#ffffff" valign="top">
 				<div class="quoteLeft">
 					<h1><font style="font-size:28px;" color="#000000">[Abonare newsletter {7025}]</font></h1>
 				</div>					
 			</td>
			<td valign="top" width='250' align="center" style='border-left:1px solid #C4D6EB; background-color:#f5f5f5;'>
				<div style="padding-left:15px; text-align:left; width:100%; ">
 					<br />
  					==blocklist==
					<br />
 				</div>
 			</td>
 			<td width="455" valign="top" style="padding-left:10px;">
				<br />
				<h3 style="color:#1175C0; text-align:left">[Abonare newsletter. {7025}]</h3>		
 				<BR />						
 				
				<ZONE form enabled>
					<form name="oemProSubscription" method="post" action="http://mk.cubus.md/subscribe.php">
						<input type="hidden" name="FormValue_MailListIDs[]" value="20">
						[Email address {1003}]<br>
						<input type="text" name="FormValue_Email" value=""><br> 
						[Nume prenume {1010}]<br>
						<input type="text" name="FormValue_CustomField1" value=""><br> 
						[Telefon {1012}]<br>
						<input type="text" name="FormValue_CustomField6" value=""><br><br> 
						<input type="submit" name="Subscribe" value="[Abonare newsletter. {7025}]">
						<input type="hidden" name="FormValue_SuccessScreenID" value="MQ%3D%3D">
						<input type="hidden" name="FormValue_FailureScreenID" value="Mg%3D%3D">
						<input type="hidden" name="FormValue_CustomFieldIDs" value="MSw2">
					</form>
				</ZONE form enabled>
				
				<ZONE nonokmess enabled>
					<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
						<tr>
							<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
							<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {7027}] </font></td>
						</tr>
 					</table>
				</ZONE nonokmess enabled>
				
				<ZONE okmess enabled>
					<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
						<tr>
							<td rowspan="2" width="30"><img src="{imgFiles}/green_alert.gif" /></td>
							<td align="left" class="black_text_content_bold"><font color="#009900">[info {7026}]</font></td>
						</tr>
 					</table>
 				</ZONE okmess enabled>
 				<BR />						
 			</td>
		</tr>
	</table>
<!--	<table width='940' align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td style='background: url({imgFiles}/ld_gra.jpg) no-repeat left bottom;'><div style='width:8px;height:16px;'></div></td>
			<td style='background: url({imgFiles}/d_gra_p.jpg) repeat-x;' width='100%'><div style='height:16px;'></div></td>
			<td style='background: url({imgFiles}/rd_gra.jpg) no-repeat left bottom;'><div style='width:8px;height:16px;'></div></td>
		</tr>
	</table>-->