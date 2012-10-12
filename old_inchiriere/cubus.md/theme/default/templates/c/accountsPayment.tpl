<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  23.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->
	
<ZONE islogin login>  
	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td bgcolor="#F3F7FA" valign="top">
			
 				==blocklist==

			</td>
			<td valign="top" width='715' style='border-left:1px solid #C4D6EB;'>
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td valign="top" width="646" align="center" style="padding:20px 20px 20px 20px;" height="460">
					
							<div style="float:right; font-size:13px; color:#009900;">
								<strong>[Hi, {1036}] {name.contact.person}</strong>
							</div>
 														
 							<h3 style="color:#1175C0; text-align:left"><a href="?L">[&laquo; inapoi {1138}]</a> | [account payment {1093}]</h3>
							<br />
	
 							<table class="contPlata" cellpadding="0" cellspacing="0" border="0" width="100%">
								<td  valign="top">
									<div style="background-color:rgb(196, 214, 235); border: 1px solid rgb(196, 214, 235); padding:1px; text-align:left; padding-left:10px;">
 										<p>[ {1080}] </p>
									</div>
									<br />
 									
									<ZONE accountPaymentListNew enabled>
										<LOOP accountPaymentListNew>
											<a name="{accountPayment.unicID}"></a>
											<h4>[ {1072}]: <span style="font-weight:normal;">{accountPayment.nr}</span> {deleteAP} <p style="float:right; padding:0px; margin:0px; margin-right:10px; margin-top:-14px; font-weight:bold;">[price {1075}]: {accountPayment.price} [money {1078}]</p>  </h4>
											<table class="license" cellspacing="0" cellpadding="0" style="width:100%; border-right:1px #EFEFEF solid;">
												<tr>
												   <td width="16" class="filesDetails" valign="top"></td>
												   <td style="padding-left:5px;">
														<p>
														{accountPayment.type}
 														</p>
 												   </td>
												   <td align="right" valign="top" style="padding-right:5px;">
 														<p><a target="_blank" href="?L=print.accountsPayment&chromeless=1&ap={accountPayment.unicID}">[download {1077}]</a></p>
												   </td>
												</tr>
											</table>
										</LOOP accountPaymentListNew>										
										<div style="border-top:1px #EFEFEF solid;"></div>
										<br />
									</ZONE accountPaymentListNew enabled> 
									<ZONE accountPaymentListNew empty>
										<br /><BR /> 
										   <center><font size="2"><strong>[  {1097}]</strong></font></center>
										<br /><BR /> 
									</ZONE accountPaymentListNew empty>

									<div style="background-color:rgb(196, 214, 235); border: 1px solid rgb(196, 214, 235); padding:1px; text-align:left; padding-left:10px; padding-right:10px;">
										<p>[Lista conturi de plata achitate {1092}]</p>
									</div>
									<Br />
									
									<ZONE accountPaymentListConfirm enabled>
										<LOOP accountPaymentListConfirm>
											<a name="{accountPayment.unicID}"></a>
											<h4>[ {1072}]: <span style="font-weight:normal;">{accountPayment.nr}</span><p style="float:right; padding:0px; margin:0px; margin-right:10px; margin-top:-14px; font-weight:bold;">[price {1075}]: {accountPayment.price} [money {1078}]</p>  </h4>
											<table class="license" cellspacing="0" cellpadding="0" style="width:100%; border-right:1px #EFEFEF solid;">
												<tr>
												   <td width="16" class="filesDetails" valign="top"></td>
												   <td style="padding-left:5px;">
														<p>
														{accountPayment.type}
 														</p>
 												   </td>
												   <td align="right" valign="top" style="padding-right:5px;">
 														<p><a target="_blank" href="?L=print.accountsPayment&chromeless=1&ap={accountPayment.unicID}">[download {1077}]</a></p>
												   </td>
												</tr>
											</table>
										</LOOP accountPaymentListConfirm>										
										<div style="border-top:1px #EFEFEF solid;"></div>
										<br />
									</ZONE accountPaymentListConfirm enabled> 
									<ZONE accountPaymentListConfirm empty>
										<br /><BR /> 
										   <center><font size="2"><strong>[  {1097}]</strong></font></center>
										<br /><BR /> 
									</ZONE accountPaymentListConfirm empty>
									
    							</td>
							</table>	
  						</td>
					</tr>
				</table>
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
	
	<OBJ accountPaymentFiles>		
		<table cellpadding="0" cellspacing="0" border="0">
			{files}
		</table>
	</OBJ accountPaymentFiles>
	
	<OBJ accountPaymentDeleteEnabled>	
		- <a href="?L=c.deleteAccountPayment&chromeless=1&deleteAP={accountPayment.unicID}"><span style="font-weight:normal;">[delete {1073}]</span></a>
	</OBJ accountPaymentDeleteEnabled>		

	<OBJ accountPaymentCashAdvance>	
		<p><font color="#FF0000">[Cash Advance {1091}]</font></p>
	</OBJ accountPaymentCashAdvance>		


</ZONE islogin login>

<ZONE islogin guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[Eroare! {5007}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=c.account"><b>[Inregistrare {5008}]</b></a></td>
      </tr>
   </table>
</ZONE islogin guest>
