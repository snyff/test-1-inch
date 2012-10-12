<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  19.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->
	
	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td valign="top">
				<form enctype="multipart/form-data" action="?L=c.insertFile&chromeless=1" method="post">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 12px 0px 12px;">
						<tr>
							<td>
								<b>[File: {1044}]</b> <br /> 
								<input type="file" name="file" id="file" style="margin-bottom:12px;" size="20"/>
								[Languages: {1045}]
								<table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
									<td>
										<select name="from_language" size="8" style="width:102px">
											<LOOP selectLanguagesFrom>
											<option value="{language.id}" {language.selected}>{language.name}</option>
											</LOOP selectLanguagesFrom>
										</select>
									</td>
									<td width="22" style="text-align:center">
										 &raquo; 
									</td>
									<td>
										<select name="to_language" size="8" style="width:102px">
											<LOOP selectLanguagesTo>
											<option value="{language.id}" {language.selected}>{language.name}</option>
											</LOOP selectLanguagesTo>
										</select>
									</td>
								</table>
								[File type: {1046}] <br /> 
								<select name="file_type" style="margin-bottom:12px;">
									<LOOP selectFileType>
									<option value="{file_type.default_name}" {file_type.selected}>{file_type.name}</option>
									</LOOP selectFileType>
								</select>
								[Description: {1047}] <br /> 
								<textarea name="description" rows="2" cols="25" id="description"></textarea>
								<input name="Submit" class="btnSubmitYellow" type="submit" id="Submit" value="[Upload... {1048}]" />
						</tr>
					</table>
				</form>
			</td>
			<td valign="top" width='715' style=''>
				<table cellpadding="0" cellspacing="0" border="0" width="100%">
					<tr>
						<td valign="top" width="646" align="center" style="" height="460">
						
							<ZONE islogin login>
								<div style="float:right; font-size:13px; color:#009900;">
									<strong>[Hi, {1036}] {name.contact.person}</strong>
								</div>
							</ZONE islogin login>
														
 							<h3 style="color:#1175C0; text-align:left">[Step 1 {1037}]</h3>
							<br />
	
							<!-- ZONE ERROR SUCCESS-->
							<ZONE uploadHeader BigFileSize>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}] </font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[max {1039}] {max.upload.file.size} [Mb {1061}]</td>
									</tr>
								</table>
								<BR />
							</ZONE uploadHeader BigFileSize>
		  
							<ZONE uploadHeader noFile>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}] </font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[Sorry, the file field appeared to be empty, you have to fill the FILE form field. {1040}] </td>
									</tr>
								</table>
								<BR />
							</ZONE uploadHeader noFile>
		  
							<ZONE uploadHeader unallowedExtension>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {1038}]  </font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[Sorry, the file type you sent is not supported by this website. {1041}] </td>
									</tr>
	
								</table>
								<BR />
							</ZONE uploadHeader unallowedExtension>
												 
							<ZONE uploadHeader unallowedLang>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1042}]</font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[please select two different languages. {1043}] </td>
									</tr>
								</table>
								<BR />
							</ZONE uploadHeader unallowedLang>
												 
							<ZONE accountPayment pricenotcalc>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1064}]</font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[error details. {1065}] </td>
									</tr>
								</table>
								<BR />
							</ZONE accountPayment pricenotcalc>
												 
							<ZONE accountPayment noFileSelected>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1066}]</font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[error details. {1067}] </td>
									</tr>
								</table>
								<BR />
							</ZONE accountPayment noFileSelected>
												 
							<ZONE accountPayment fileIsInAP>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#FF0000">[error {1068}]</font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[error details. {1069}] </td>
									</tr>
								</table>
								<BR />
							</ZONE accountPayment fileIsInAP>
												 
							<ZONE uploadNewFile enabled>
								<table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
									<tr>
										<td rowspan="2" width="30"><img src="{imgFiles}/green_alert.gif" /></td>
										<td align="left" class="black_text_content_bold"><font color="#009900">[info {1070}]</font></td>
									</tr>
									<tr>
										<td align="left" class="black_text_content">[info details. {1071}] </td>
									</tr>
								</table>
								<BR />
							</ZONE uploadNewFile enabled>
							<!-- /ZONE ERROR SUCCESS-->	
							
							
							<ZONE filesListNew enabled>
								<ZONE deadline enabled>
									<table cellpadding="0" cellspacing="0" border="0" width="100%">
										<td>
											<nobr>[Deadline {1054}] <input class="calendar" readonly="readonly" value="29/10/2008"  id="date1" name="date1" type="text"></nobr>
										</td>
									</table>
								</ZONE deadline enabled>
								
								<ZONE deadline disabled>
									<div style="text-align:right;">
										<img src="{imgFiles}/loading.gif"  style="border:1px #47A3E8 solid; vertical-align:middle;">
										<span style="padding:3px;">
											<form style="float:right;" name="counter">
												<input type="text" border="0" style="border:#FFFFFF; width:18px;" name="d2"> [seconds {1062}]
											</form> 
											[Calc price... {1063}]
 										</span>  
									</div>
								</ZONE deadline disabled>
	
								<br style="clear:both;">
		
								<form method="post" action="?chromeless=1">
									<table border="0" cellpadding="0" cellspacing="0" width="640">
										<thead class="fixedHeader">
											<tr>
												<th style="width:5%;">&nbsp;</th>
												<th>[File name {1049}]</th>
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
										
										<ZONE checkoutOffline pretCalculatOffline>
											<input value="Pay Online" style="float:right;"  class="btnSubmitYellow" onClick="showMsgBox(600,340, 'msgPayBox');" type="submit">
										</ZONE checkoutOffline pretCalculatOffline>
										
										<div style="float:left; width:70%; text-align:left">
											<select style="border:1px #CCCCCC solid; background:#f5f5f5;" name="action">
												<option value="t">[Translate files {1055}]</option>
												<option value="d">[Delete files {1059}]</option>
											</select>
											<input value="[Apply {1058}]" style="margin-right:10px;" class="btnSmallGray resetButton"   type="submit">
										</div>
										
										<input value="[Contact me {1056}]" style="float:right; margin-right:10px;" onClick="showMsgBox(300,220, 'msgContactBox');" class="btnSubmitYellow"      type="submit">
									</div> 
 								</form>
																				
							</ZONE filesListNew enabled>
							
							<BR /><Br /><Br />
								
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
												<h4>[ {1072}]: <span style="font-weight:normal;">{accountPayment.nr}</span> - <a href="?L=c.deleteAccountPayment&chromeless=1&deleteAP={accountPayment.unicID}"><span style="font-weight:normal;">[delete {1073}]</span></a>  </h4>
												<table class="license" cellspacing="0" cellpadding="0" style="width:100%; border-right:1px #EFEFEF solid;">
													<tr>
													   <td width="16" class="filesDetails" valign="top"><a class="filesDetailsSel" href="#"></a></td>
													   <td style="padding-left:5px;">
															{accountPayment.type}
															<strong>[price {1075}]: {accountPayment.price} [money {1078}]</strong>
													   </td>
													   <td align="right" style="padding-right:5px;">
															<p><a href="#">[details {1076}]</a></p>
															<a href="#">[download {1077}]</a>
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
												<p style="text-align:center"><a href="#">[Archive {1082}]</a></p>
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
													   <td style="padding-left:5px;"><p>{original.name}</p></td>
													   <td align="right" style="padding-right:5px;"><p style="color:red">[spre achitare {1090}]</p></td>
													</tr>
												</LOOP loopFilesListAP>
											</table>
											<br />
										</ZONE filesListAP enabled>
											
										<ZONE islogin login>
											<div style="background-color:#EFEFEF; padding:1px; text-align:center;">
												<p><a href="#">[Arhiva fisiere {1089}]</a></p>
											</div>
										</ZONE islogin login>
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
	
	<OBJ accountPaymentCashAdvance>	
		<p><font color="#FF0000">[Cash Advance {1091}]</font></p>
	</OBJ accountPaymentCashAdvance>		
	
	<script> 
		<!-- // 
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
		--> 
	</script> 
	
	
	
