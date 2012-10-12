<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  19.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->
	
<ZONE islogin login>
	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td style="padding:20px;" bgcolor="#ffffff" valign="top">
 				<div class="quoteLeft">
 					<h1><font style="font-size:28px;" color="#000000">[Free Instant Quote {1154}]</font></h1>
					<p style="line-height:1.8">[You can have a free instant quote for your translation in seconds and even pay online. {1155}]</p>
				</div>					
 			</td> 
			<td valign="top" width='715' style='border-left:1px solid #C4D6EB;'>
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td valign="top" width="646" style="padding:20px 20px 20px 20px;" height="460">
					
							<div style="float:right; font-size:13px; color:#009900;">
								<strong>[Hi, {1036}] {name.contact.person}</strong>
							</div>
 							<h3 style="color:#1175C0; text-align:left"><a href="?L">[&laquo; inapoi {1138}]</a> | [Editeaza {1140}]</h3>
							
							<br />
							<div class="big-box">
								<div class="big-box-inner">
									<div class="tabber">
										<div class="tabbertab">
											<h2>[Editeaza {1140}]</h2>
											
											<ZONE updateD enabled>
												<br />
												<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
													<tr>
														<td rowspan="2" width="30"><img src="{imgFiles}/green_alert.gif" /></td>
														<td align="left" class="black_text_content_bold"><font color="#009900">[info {1149}]</font></td>
													</tr>
													<tr>
														<td align="left" class="black_text_content"> </td>
													</tr>
												</table>
												<br />
											</ZONE updateD enabled>
											
  											<form method="post" action="?L=c.updateProfileData&chromeless=1">
												<input type="hidden" name="companyid" value="{company.id}" />
												<table cellpadding="1" cellspacing="5" width="100%" border="0">							
													<tr>
														<td width="160">[Email {1003}]*: </td>
														<td><input name="email" type="text" maxlength="50"  value="{company.email}" /></td>
														<td>
 															<ZONE error email>
																<font color="#FF0000">[Your email address has an error, please make sure you type it correctly. {1005}] </font>
															</ZONE error email>
														</td>
													</tr>
													<tr>
														<td>[Company name {1060}]*: </td>
														<td><input name="name" type="text" value="{company.name}"/></td>
														<td>
															<ZONE companyname cnerror>
																<font color="#FF0000">[Company name field id required {1013}]</font>
															</ZONE companyname cnerror>
														</td>
													</tr>
													<tr>
														<td>[Contact Person {1010}]*: </td>
														<td><input name="contactperson" type="text" value="{name.contact.person}"/></td>
														<td>
															<ZONE contactperson nperror>
																<font color="#FF0000">[Contact Person field id required {1011}]</font>
															</ZONE contactperson nperror>
														</td>
													</tr>
													<tr>
														<td>[Phone {1012}]*: </td>
														<td><input name="phone" type="text" value="{company.phone}"/></td>
														<td>
															<ZONE phone perror>
																<font color="#FF0000">[Phone field id required {1013}]</font>
															</ZONE phone perror>
														</td>
													</tr>
													<tr>
														<td align="center" colspan="2" style="padding-left:5px;padding-top:10px;"><input type="submit" class="btnSubmitYellow"  name="SubmitEditData" id="Submit" value="[Save {1143}]"  /></td>
														<td width="50%"></td>
													</tr>
												</table>						 
											</form>
										</div>
										<div class="tabbertab">
											<h2>[Schimba parola {1141}]</h2>
											
											<ZONE updateP enabled>
												<br />
												<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
													<tr>
														<td rowspan="2" width="30"><img src="{imgFiles}/green_alert.gif" /></td>
														<td align="left" class="black_text_content_bold"><font color="#009900">[info {1149}]</font></td>
													</tr>
													<tr>
														<td align="left" class="black_text_content"> </td>
													</tr>
												</table>
												<br />
											</ZONE updateP enabled>
											
											<form method="post" action="?L=c.updatePassword&chromeless=1">
												<input type="hidden" name="companyid" value="{company.id}" />
												<table cellpadding="1" cellspacing="5" width="100%" border="0">							
													<tr>
														<td width="160">[Parola veche {1144}]*: </td>
														<td><input name="oldpass" type="text" maxlength="50" /></td>
														<td>
 															<ZONE oldpass olderror>
																<font color="#FF0000">[Parola nu este corecta. {1147}] </font>
															</ZONE oldpass olderror>
														</td>
													</tr>
													<tr>
														<td>[Parola noua {1145}]*: </td>
														<td><input name="newpass" type="text" /></td>
														<td rowspan="2">
															<ZONE newpass nperror>
																<font color="#FF0000">[Va rugam sa introduceti aceiasi parola in ambele cimpuri {1148}]</font>
															</ZONE newpass nperror>
														</td>
													</tr>
													<tr>
														<td>[Repeta noua parola {1146}]*: </td>
														<td><input name="rnewpass" type="text" /></td>
													</tr>
 													<tr>
														<td align="center" colspan="2" style="padding-left:5px;padding-top:10px;"><input type="submit" class="btnSubmitYellow"  name="SubmitEditPass" id="Submit" value="[Save {1143}]"  /></td>
														<td width="50%"></td>
													</tr>
												</table>						 
											</form>
										</div>
									</div>	
									<div style="height:10px;"></div>
									<div id="tabclose" class="tabber"></div>
								</div>
							</div>
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

