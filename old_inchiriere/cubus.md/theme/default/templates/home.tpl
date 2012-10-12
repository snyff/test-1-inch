<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  16.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->


<!--
	1. GRESEALA: Daca are conturi de plata neachitate dar facute in baza de L4 si adauga bani in cont de avans ce se intimpla ?? DISPAR CONTURILE care stau spre plata sau altceva ???  <br />
	2. trebuie sa analizam daca L1 poate existra de sine statator sau numai in corelare cu CA si L4
-->


	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td bgcolor="" valign="top">
 
 				==blocklist==
 				
 			</td>
			<td valign="top" width='715' style=''>
							
 				<ZONE homeinfo center>
					<div style="text-align:right;">
						<!--|ZONE isimgrand1 enabled|-->
							<img src="{imgFiles}/cubus_new/slider.png" />
						<!--|/ZONE isimgrand1 enabled|						
						|ZONE isimgrand2 enabled|
							<img src="{imgFiles}/oferta_CUBUS_100lei_RO.jpg" />
						|/ZONE isimgrand2 enabled|-->
						<br /><BR />
					</div>
 					
					<div style="margin-left:21px; height:230px;">
 						
						<div class="fb-like-box" style="float:right;" data-href="http://www.facebook.com/cubus.page" data-width="220" data-height="255" data-show-faces="true" data-stream="true" data-header="true"></div>
						                                                                                    
						
						
<!--						<div style="float:right; border:2px #cccccc solid; text-align:center; padding:3px;">-->
						
<!--						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="300" height="263" title="tehPlayah"><param name="movie" value="http://clip.md/playah.swf" /><param name="quality" value="high" /><param name="allowFullScreen" value="true" /><param name="FlashVars" value="xurl=http://clip.md/ro/videos/41985-5535126c.xml&panelxml=http://clip.md/ro/videos/playlist-25050.xml&autoplay=false&isembeded=true&volume=0.5&changevolumeurl=http://clip.md/ro/videos/changevolume" /><embed src="http://clip.md/playah.swf" FlashVars="xurl=http://clip.md/ro/videos/41985-5535126c.xml&panelxml=http://clip.md/ro/videos/playlist-25050.xml&autoplay=false&isembeded=true&volume=0.5&changevolumeurl=http://clip.md/ro/videos/changevolume" allowFullScreen="true" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="300" height="263"></embed></object>-->
						
						
						</div>
					</div>
					<br />
 				</ZONE homeinfo center>
 				
				<ZONE homeinfo isafile>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td valign="top" width="646" align="center" style="padding:20px 20px 20px 20px;">
								<table cellpadding="0" cellspacing="0" border="0" width="100%">
									<td width="70%">
										<ZONE editCompanyName edit>
											<div style="text-align:left;">
												[Company name {1060}]: <span style="font-weight:bold">{company.Name}</span> <font size="1">[<a href="?L=c.editProfile">[Editeaza {1140}]</a>]</font>
											</div>
										</ZONE editCompanyName edit>
									</td>
									<td>
										<ZONE islogin login>
											<div style="float:right; font-size:13px; color:#009900;">
												<strong>[Hi, {1036}] {name.contact.person}</strong>
											</div>
										</ZONE islogin login>
									</td>
								</table>
								<br />
								
															
								<!--
									<h3 style="color:#1175C0; text-align:left">[Step 1 {1037}]</h3>
									<br />
								-->
								<ZONE uploadNewFile enabled>
									<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
										<tr>
											<td rowspan="2" width="30"><img src="{imgFiles}/imagine_cubus.jpg" /></td>
											<td align="left" class="black_text_content_bold"><font color="#009900">[info {1070}]</font></td>
										</tr>
										<tr>
											<td align="left" class="black_text_content">[info details. {1071}] </td>
										</tr>
									</table>
								</ZONE uploadNewFile enabled>
								<!-- /ZONE ERROR SUCCESS-->	
										
								
								<ZONE filesListNew enabled>
									<!--
									<ZONE deadline enabled>
										<div style="text-align:right;">
											<nobr>[Deadline {1054}] <input class="calendar" readonly="readonly" value="29/10/2008"  id="date1" name="date1" type="text"></nobr>
										</div>
									</ZONE deadline enabled>
									-->
									
									<form method="post" action="?chromeless=1">
								
										<table cellpadding="0" cellspacing="0" border="0" width="100%">
											<td width="70%">
												<ZONE companyName enabled>
													<div style="text-align:left;">
														[Company name {1060}]:* <input type="text" name="companyName" value=""  size="15" /> <font size="1">[(ex: SC Aqua SRL) {1122}]</font>
													</div>
												</ZONE companyName enabled>
											</td>
											<td>
												<ZONE deadline disabled>
													<div style="text-align:right;">
														<img src="{imgFiles}/loading.gif"  style="border:1px #47A3E8 solid; vertical-align:middle;">
														<span style="padding:3px;">
															<!--
															<form style="float:right;" name="counter">
																<input type="text" border="0" style="border:#FFFFFF; width:18px;" name="d2"> [seconds {1062}]
															</form> 
															-->
															[Calc price... {1063}]
														</span>  
													</div>
												</ZONE deadline disabled>
											
												<ZONE countPrice manual>
													<div style="text-align:left; width:100%; padding:2px; border:1px red solid; background:#FFFF00;">
														<span>
															[Calc price... {1158}]
														</span>  
													</div>
												</ZONE countPrice manual>
											</td>
										</table>
										
									
												
										<!-- ZONE ERROR SUCCESS-->
										<ZONE uploadHeader BigFileSize>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}] </font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[max {1039}] {max.upload.file.size} [Mb {1061}]</td>
												</tr>
											</table>
										</ZONE uploadHeader BigFileSize>
					  
										<ZONE uploadHeader noFile>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}] </font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[Sorry, the file field appeared to be empty, you have to fill the FILE form field. {1040}] </td>
												</tr>
											</table>
										</ZONE uploadHeader noFile>
					  
										<ZONE uploadHeader unallowedExtension>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}]  </font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[Sorry, the file type you sent is not supported by this website. {1041}] </td>
												</tr>
				
											</table>
										</ZONE uploadHeader unallowedExtension>
															 
										<ZONE accountPayment pricenotcalc>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1064}]</font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[error details. {1065}] </td>
												</tr>
											</table>
										</ZONE accountPayment pricenotcalc>
															 
										<ZONE accountPayment noFileSelected>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/selectFile.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1066}]</font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[error details. {1067}] </td>
												</tr>
											</table>
										</ZONE accountPayment noFileSelected>
															 
										<ZONE accountPayment fileIsInAP>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1068}]</font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[error details. {1069}] </td>
												</tr>
											</table>
										</ZONE accountPayment fileIsInAP>
										
										<ZONE accountPayment noCompanyName>
											<BR />
											<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
												<tr>
													<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
													<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1068}]</font></td>
												</tr>
												<tr>
													<td align="left" class="black_text_content">[error details. {1123}] </td>
												</tr>
											</table>
										</ZONE accountPayment noCompanyName>
															 
										
										
										<br style="clear:both;">
				
										<table border="0" cellpadding="0" cellspacing="0" width="640">
											<thead class="fixedHeader">
												<tr>
													<th style="width:5%;">&nbsp;</th>
													<th style="width:45%;">[File name {1049}]</th>
													<th>[From language {1050}]</th>
													<th>[To language {1051}]</th>
													<th>[Characters Nr {1052}]</th>
													<th>[Price {1053}]</th>
												</tr>
											</thead>
											<tbody class="scrollContent">
												<LOOP loopFilesListNew>
													<tr class="oddRow">
														<td style="text-align:center;"><input type="checkbox" name="fileArray[]" value="{unic.id}"/></td>
														<td>{original.name}</td>
														<td>{from.language}</td>
														<td>{to.language}</td>		
														<td>{characters.nr}</td>
														<td>{price}</td>
													</tr>
												</LOOP loopFilesListNew>
											</tbody>
										</table>
										<br />
										
										<div id="tableContainer" class="tableContainer">
											
											<div style="float:left; width:70%; text-align:left">
												
												<select style="border:1px #CCCCCC solid; background:#f5f5f5;" name="action">
													<option value="t">[Translate files {1055}]</option>
													<option value="d">[Delete files {1059}]</option>
												</select>
												
												<input value="[Apply {1058}]" style="margin-right:10px;" class="btnSmallGray resetButton"   type="submit">
											</div>
											
											<!--
											<input value="[Contact me {1056}]" style="float:right; margin-right:10px;" onClick="showMsgBox(300,220, 'msgContactBox');" class="btnSubmitYellow"      type="submit">
											-->
										</div> 
									</form>
																					
								</ZONE filesListNew enabled>
								
								<BR style="clear:both;" /><Br />
									
								<ZONE accountPayment noNumAP>
									<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
										<tr>
											<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
											<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1068}]</font></td>
										</tr>
										<tr>
											<td align="left" class="black_text_content">[error details. {1088}] </td>
										</tr>
									</table>
									<BR />
								</ZONE accountPayment noNumAP>
													 
								<ZONE accountPayment noDataInAP>
									<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
										<tr>
											<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
											<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1068}]</font></td>
										</tr>
										<tr>
											<td align="left" class="black_text_content">[error details. {1087}] {min.account.payment} [ {1078}]</td>
										</tr>
									</table>
									<BR />
								</ZONE accountPayment noDataInAP>
								
								
								<ZONE islogin login> 						
									<div style="background-color:#EFEFEF; padding:1px; text-align:left; padding-left:10px; padding-right:10px;">
										<p>[ {1084}]: {cash.advance} [ {1078}]  <span style="float:right; margin-top:-16px; margin-right:12px;"><a href="javascript:;" onclick="toggleTag('new_payment_account');return false">+[add  {1085}]</a></span></p>
										<div style="display:none;" id="new_payment_account">
											<div style="border-top:1px #CCCCCC solid;"></div>
											<form method="get">
											<p>
												[add new payment account {1085}] 
												<input type="text" size="5" name="addAP" />
												[ {1078}]
												<input type="hidden" name="chromeless" value="1" />
												<input type="hidden" name="L" value="c.addAccountPayment" />
												<input type="submit" value="[add {1086}]" class="btnSmallGray resetButton" />											
											</p>
											</form>
										</div>
									</div>
									<Br />
								</ZONE islogin login> 						
								
								 
								<table class="contPlata" cellpadding="0" cellspacing="0" border="0" width="100%">
									<td width="280" valign="top">
										<ZONE accountPaymentList enabled>
											<LOOP accountPaymentList>
												<h4>[ {1072}]: <span style="font-weight:normal;">{accountPayment.nr}</span> {deleteAP}  </h4>
												<table class="license" cellspacing="0" cellpadding="0" style="width:100%; border-right:1px #EFEFEF solid;">
													<tr>
													   <td width="16" class="filesDetails" valign="top"><a class="filesDetailsSel" href="?L=c.accountsPayment&ld=1#{accountPayment.unicID}"></a></td>
													   <td style="padding-left:5px;">
															{accountPayment.type}
															<strong>[price {1075}]: {accountPayment.price} [money {1078}]</strong>
													   </td>
													   <td align="right" style="padding-right:5px;">
															<p>{accountPayment.status}</p>
															<a target="_blank" href="?L=print.accountsPayment&chromeless=1&ap={accountPayment.unicID}">[download {1077}]</a>
													   </td>
													</tr>
												</table>
											</LOOP accountPaymentList>										
											<div style="border-top:1px #EFEFEF solid;"></div>
											<br />
										</ZONE accountPaymentList enabled> 
										
										<ZONE islogin login>
											<div style="background-color:#EFEFEF; padding:1px; text-align:left; padding-left:10px;">
												<p>[ {1079}]: {debt} [ {1078}]</p>
												<p>[ {1080}]: {debt.nr} [ {1081}]</p>
												<p style="text-align:center"><a href="?L=c.accountsPayment&ld=1">[Archive {1082}]</a></p>
											</div>
										</ZONE islogin login>
									</td>
									<td width="15" align="center"></td>
									<td valign="top">
										<ZONE filesListAP enabled>											
											<h4>[files name {1083}]</h4>										
											<table class="license translation" cellspacing="1" cellpadding="1" style="width:100%; background-color:EFEFEF;">
												<LOOP loopFilesListAP>
													<tr>
													   <td style="padding-left:5px;"><p><input style="border:0;" value="{original.name}" size="35" /></p></td>
													   <td align="right" style="padding-right:5px;">{statut.file}</td>
													</tr>
												</LOOP loopFilesListAP>
											</table>
											<br />
										</ZONE filesListAP enabled>
											
										<ZONE islogin login>
											<div style="background-color:#EFEFEF; padding:1px; text-align:center;">
												<p><a href="?L=c.filesList&ld=1">[Arhiva fisiere {1089}]</a></p>
											</div>
										</ZONE islogin login>
									</td>
								</table>	
							</td>
						</tr>
					</table>
				</ZONE homeinfo isafile>
				
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
	
	
	<!-- pina aici parca e corect -->
	<div id="bgBox">&nbsp;</div>
 	<div id="msgContactBox">
		<div style="background:#527DC1; height:17px; padding:3px; color:#FFFFFF; font-weight:bold;">
			<span style="float:left;">&nbsp;&nbsp;Contact Me</span>
			<span style="float:right;"><a href="javascript:closeMsgBox('msgContactBox');"><img border="0" src="{imgFiles}/close.png" /></a></span>
		</div>
		<table  style="padding-left:15px; padding-top:8px;" cellpadding="2" cellspacing="0" border="0" width="100%">
			<form method="get">
				<input type="hidden" name="contactme" value="1" />
				<input type="hidden" name="chromeless" value="1" />
				<input type="hidden" name="L" value="c.sendContactMe" />
				<tr><td width="38%">Nume Prenume:</td><td><input type="text" name="nume" value="" /></td></tr>
				<tr><td>E-mail:</td><td><input type="text" name="email" value="" /></td></tr>
				<tr><td>Numar de telefon:</td><td><input type="text" name="nr_tel" value="" /></td></tr>
				<tr><td>Tara:</td><td><input type="text" name="country" value="" /></td></tr>
				<tr><td>Tipul contactului:</td><td><input type="radio" name="contacttype" checked="checked" value="b" /> Business<br /><input type="radio" name="contacttype" value="p" /> Private</td></tr>
				<tr><td align="center" colspan="2"><input name="Submit" class="btnSubmitYellow"  style="margin-top:6px;" type="submit" id="Submit" value="Trimite datele" /></td></tr>
			</form>
		</table>               	
	</div>
	
  	<div id="msgPayBox">
		<div style="background:#527DC1; height:17px; padding:3px; color:#FFFFFF; font-weight:bold;">
			<span style="float:left;">&nbsp;&nbsp;Informatie Cont</span>
			<span style="float:right;"><a href="javascript:closeMsgBox('msgPayBox');"><img border="0" src="{imgFiles}/close.png" /></a></span>
		</div>
		<table  style="padding-left:15px; padding-top:8px;" cellpadding="2" cellspacing="0" border="0" width="100%">
			<tr>
				<td width="230" valign="top">
					<table  style="padding-left:15px; padding-right:20px; padding-top:8px;" cellpadding="2" cellspacing="0" border="0" width="100%">
						<form method="post">
							<input type="hidden" name="L" value="c.account" />
							<tr><td width="38%"><strong>Email:</strong></td><td><input type="text" name="email" value="" /></td></tr>
							<tr><td width="38%"><strong>Password:</strong></td><td><input type="password" name="password" value="" /></td></tr>
							<tr><td align="center" colspan="2"><input name="userlogin" class="btnSubmitYellow" style="margin-top:6px;" type="submit" id="Submit" value="Intra Cont" /></td>
							</tr>
						</form>
					</table>
				</td>
				<td width="1" bgcolor="#CCCCCC"></td>
				<td>
					<table  style="padding-left:20px; padding-top:8px;" cellpadding="2" cellspacing="0" border="0" width="100%">
						<form method="post" action="">
							<input type="hidden" name="new_type_profile" value="1" />
							<tr><td><strong>E-mail*:</strong></td><td><input type="text" name="email" value="" /></td></tr>
							<tr><td width="38%"><strong>Password*:</strong></td><td><input type="password" name="password" value="" /></td></tr>
							<tr><td width="38%"><strong>Re-Password*:</strong></td><td><input type="password" name="passcheck" value="" /></td></tr>
							<tr><td width="38%">Nume Prenume*:</td><td><input type="text" name="numeprenume" value="" /></td></tr>
							<tr><td>Numar de telefon*:</td><td><input type="text" name="phone" value="" /></td></tr>
							<tr><td>Tara*:</td><td><input type="text" name="country" value="" /></td></tr>
							<tr><td>Tipul contactului*:</td><td><input type="radio" name="contacttype" checked="checked" value="1" /> Business <br />
									<input type="radio" name="contacttype" value="2" /> Private</td>
							</tr>
							<tr>
								<td>[Introduce codul {7605}]*</td>
								<td align="left" style="padding-left:5px;">
									<img src="system/writer.php?R=0&amp;T={vcode}&amp;W=100&amp;H=20&amp;FC=16.16.16&amp;BC=16.16.16&amp;D=0&amp;S=1&amp;FS=15&amp;X=15&amp;Y=15" alt="[Code {7655}]" align="absmiddle" />
									<input type="hidden" name="syscode" value="{vcode}" />
									<input name="code" type="text" id="code" size="4" />
								</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<input name="Submit" class="btnSubmitYellow" style="margin-top:6px;" type="submit" id="Submit" value="Cont nou" />
								</td>
							</tr>
						</form>
					</table> 
				</td>
			</tr>
		</table>              	
	</div>
			
	<OBJ accountPaymentFiles>	
		<p>{files.nr} [files {1074}]</p>
	</OBJ accountPaymentFiles>		
	
	<OBJ accountPaymentDeleteEnabled>	
		- <a href="?L=c.deleteAccountPayment&chromeless=1&deleteAP={accountPayment.unicID}"><span style="font-weight:normal; color:red; font-size:10px;">[delete {1073}]</span></a>
	</OBJ accountPaymentDeleteEnabled>		
	
 	<OBJ accountPaymentCashAdvance>	
		<p><font color="#FF0000">[Cash Advance {1091}]</font></p>
	</OBJ accountPaymentCashAdvance>		
 
 	<OBJ statutToPay>	
		<p style="color:red">[spre achitare {1090}]</p>
 	</OBJ statutToPay>	

 	<OBJ statutToPayLink>	
		<a href="?L=c.paidAccountPayment&chromeless=1&apUnicID={accountPayment.unicID}&account=c"><font color="#009900">[am achitat {1128}]</font></a>
 	</OBJ statutToPayLink>	


 	<OBJ statutToConfirm>	
		<p style="color:#D8921D">[la confirmare {1129}]</p>
 	</OBJ statutToConfirm>	

 	<OBJ statutToTranslation>	
		<p style="color:blue">[la traducere {1125}]</p>
 	</OBJ statutToTranslation>	

 	<OBJ statutToEdit>	
		<p style="color:blue">[la editare {1126}]</p>
 	</OBJ statutToEdit>	

 	<OBJ statutDownload>	
		<a href="?L=download.file&chromeless=1&path={download.path}&file={file.downloadFile}&filename={file.downloadName}"><p style="color:#009900">[descarca {1127}]</p></a>
 	</OBJ statutDownload>	

	<ZONE refresh page>
		<meta http-equiv="refresh" content="{counter.seconds};url=?autoCounter={counter.refresh}">
	</ZONE refresh page>
	
	<!--
	<script> 
		 
		 var milisec=0 
		 var seconds=20 
		 document.counter.d2.value='30' 
		
		function display(){ 
		 if (milisec<=0){ 
			milisec=9 
			seconds-=1 
		 } 
		 if (seconds<=-1){ 
			milisec=0 
			seconds+=1 
		 } 
		 else 
			milisec-=1 
			document.counter.d2.value=seconds
			setTimeout("display()",100) 
		} 
		display() 
		 
	</script> 
	
	-->
	
