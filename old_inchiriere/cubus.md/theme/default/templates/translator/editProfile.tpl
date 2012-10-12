<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  23.03.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->


<ZONE islogin login>
	<div id="bd">
		<div id="store" class="left-column">
   							<h3> [Editeaza {1140}]</h3>
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
											
  											<form method="post" action="?L=translator.updateProfileData&chromeless=1">
												<input type="hidden" name="translatorid" value="{translator.id}" />
												<table cellpadding="1" cellspacing="5" width="100%" border="0">							
													<tr>
														<td width="160">[Email {1003}]*: </td>
														<td><input name="email" type="text" maxlength="50"  value="{translator.email}" /></td>
														<td>
 															<ZONE error email>
																<font color="#FF0000">[Your email address has an error, please make sure you type it correctly. {1005}] </font>
															</ZONE error email>
														</td>
													</tr>
													<tr>
														<td>[Nume Prenume {3034}]*: </td>
														<td><input name="name" type="text" value="{translator.name}"/></td>
														<td>
															<ZONE name nerror>
																<font color="#FF0000">[Name field id required {3036}]</font>
															</ZONE name nerror>
														</td>
													</tr>
													<tr>
														<td>[Adresa {3035}]*: </td>
														<td><input name="address" type="text" value="{translator.address}"/></td>
														<td>
															<ZONE address aerror>
																<font color="#FF0000">[Address field id required {3036}]</font>
															</ZONE address aerror>
														</td>
													</tr>
													<tr>
														<td>[Phone {1012}]*: </td>
														<td><input name="phone" type="text" value="{translator.phone}"/></td>
														<td>
															<ZONE phone perror>
																<font color="#FF0000">[Phone field id required {3036}]</font>
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
											
											<form method="post" action="?L=translator.updatePassword&chromeless=1">
												<input type="hidden" name="translatorid" value="{translator.id}" />
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
 		</div>
		<!-- Block LIST -->
		<div class="right-column" style="padding-top:15px;">
			==blocklist==
		</div>
  		<div style="clear:both"></div>
		<!-- /Block LIST -->
	</div><!-- end bd -->
</ZONE islogin login>

<ZONE islogin guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[Eroare! {3010}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=c.account"><b>[Inregistrare {3011}]</b></a></td>
      </tr>
   </table>
</ZONE islogin guest>

<meta http-equiv="refresh" content="300">
