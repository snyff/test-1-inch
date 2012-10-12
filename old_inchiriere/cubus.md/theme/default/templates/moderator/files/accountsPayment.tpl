<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  02.03.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->


<ZONE accountPaymentModule enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=moderator.files.accountsPayment">[Reload Page {5000}]</a> 
				</div>
				[Conturi de plata {5038}] [ <a href="?L=moderator.files.accountsPayment">in lucru</a> : <a href="?L=moderator.files.accountsPayment&action=showAll">toate</a> ]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<div class="tabber">
						<div class="tabbertab">
							<h2>[Conturi de plata {5038}]</h2>
							<ZONE accountPaymentList enabled>
								<br />
								<LOOP accountPaymentList>
									<h4>[ {1072}]: <span style="font-weight:normal;">{accountPayment.nr}</span> - <a href="?L=c.deleteAccountPayment&chromeless=1&deleteAP={accountPayment.unicID}"><span style="font-weight:normal;">[delete {1073}]</span></a> | <a target="_blank" href="?L=print.accountsPayment&chromeless=1&ap={accountPayment.unicID}"><span style="font-weight:normal;">[download {1077}]</span></a> <p style="float:right; padding:0px; margin:0px; margin-right:10px; margin-top:-18px; font-weight:bold;">[price {1075}]: {accountPayment.price} [money {1078}]</p>  </h4>
									<table  cellspacing="0" border="0" cellpadding="0" style="width:100%; _width:94%; border-right:1px #EFEFEF solid;">
										<tr>
										   <td width="16" class="filesDetails" valign="top"></td>
										   <td style="padding-left:5px;" valign="top">
												<p>
												{accountPayment.type} 
												</p>
										   </td>
										</tr>
										<tr>
											<td width="16" class="filesDetails" valign="top"></td>
											<td valign="top"> &nbsp;<font size="1"><a target="_blank" href="?L=moderator.users.redirection&ghost={accountPayment.company_id}&chromeless=1">[client data {5170}]</a> | <a href="?L=moderator.files.confirmAccountPayment&chromeless=1&apUnicID={accountPayment.unicID}"><font color="#009900">[Aproba contul {5169}]</font></a></font> <br /><br /></td>
										</tr>
									</table>
								</LOOP accountPaymentList>										
								<div style="border-top:1px #EFEFEF solid;"></div>
								<br />
							</ZONE accountPaymentList enabled> 
							<ZONE accountPaymentList empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu sunt conturi de plata. {5039}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE accountPaymentList empty>
 						</div>
						<div class="tabbertab">
							<h2>[Fisiere la traducere {5174}]</h2>
 							<ZONE filesInTranslation enabled>
								<br />
								<LOOP filesInTranslationList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{file_unic_id}');return false">&nbsp;</a>
										<input readonly="readonly" style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="25" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
										{translation.status}
										{obj.add.file.button}
										<a class="buttons_small download d20pxtop" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{file_unic_id}" style="display:{translation.activ}; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
												<p>{description}</p>
												<table cellpadding="0" cellspacing="0" border="0">
													{tfiles.part}
												</table>
 										   </td>
										</tr>
										<tr>
											<td width="16" class="filesDetails" valign="top"></td>
											<td valign="top"> &nbsp;<font size="1"><a target="_blank" href="?L=moderator.users.redirection&ghost={file.company_id}&chromeless=1">[client data {5170}]</a></font><br /></td>
										</tr>
										<tr  style="display:none">
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
											<td width="50%" valign="top">
 												<strong>[Price {5029}]: {file.price}</strong>
												{nrPages.nrCharacters}
											</td>
											<td valign="top">{client.data}</td>
										</tr>
									</table>
								</LOOP filesInTranslationList>
								<div style="border-top:1px #EFEFEF solid;"></div>
								<br />
								<table bgcolor="#f5f5f5" cellspacing="1" border="0" cellpadding="3" style="width:100%; _width:94%;">
									<tr>
										<td width="15" bgcolor="#CC00FF">&nbsp;</td><td bgcolor="#FFFFFF">[Fisierul respectiv are pretul necalculat {5180}]</td>
									</tr>
								</table>
							</ZONE filesInTranslation enabled>
							<ZONE filesInTranslation empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment. {5005}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE filesInTranslation empty>
						</div>
						<div class="tabbertab">
							<h2>[Fisiere la editare {5183}]</h2>
 							<ZONE editFiles enabled>
								<br />
								<LOOP editFilesList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{file_unic_id}');return false">&nbsp;</a>
										<input readonly="readonly" style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="25" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span>
  										<a class="buttons_small download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{file_unic_id}" style="display:{translation.activ}; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
												<p>{description}</p>
												<table cellpadding="0" cellspacing="0" border="0">
													{efiles.part}
												</table>
 										   </td>
										</tr>
 										<tr>
											<td width="16" class="filesDetails" valign="top"></td>
											<td valign="top"> &nbsp;<font size="1"><a target="_blank" href="?L=moderator.users.redirection&ghost={file.company_id}&chromeless=1">[client data {5170}]</a></font><br /></td>
										</tr>
										<tr  style="display:none">
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
											<td width="50%" valign="top">
 												<strong>[Price {5029}]: {file.price}</strong>
												{nrPages.nrCharacters}
											</td>
											<td valign="top">{client.data}</td>
										</tr>
									</table>
								</LOOP editFilesList>
								<div style="border-top:1px #EFEFEF solid;"></div>
 							</ZONE editFiles enabled>
							<ZONE editFiles empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>Nu aveti fisiere moderate pina in acest moment.</strong></font></center>
								<br /><BR /><BR />
							</ZONE editFiles empty>
 						</div>
						<div class="tabbertab">
							<h2>[Aprobare finala {5186}]</h2>
 							<ZONE filesApprove enabled>
								<br />
								<LOOP filesApproveList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{file_unic_id}');return false">&nbsp;</a>
										<input style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="25" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span>
  										<a class="buttons_small download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{file_unic_id}" style="display:{translation.activ}; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
												<p>{description}</p>
												<table cellpadding="0" cellspacing="0" border="0">
													{afiles.part}
												</table>
 										   </td>
										</tr>
										<tr>
											<td width="16" class="filesDetails" valign="top"></td>
											<td valign="top">
												<BR />
												<strong>[Incarca traducerea {3016}]</strong> 
												<form method="post" action="?L=moderator.files.approveInsertFile&chromeless=1" onsubmit="return checkform()" enctype="multipart/form-data">
													<input name="file" id="file" type="file">
													<input name="id" value="{file_unic_id}" type="hidden">
													<input name="Submit" value="[incarca {3017}]" type="submit">
												</form>
												<BR />
											</td>
										</tr>										
										<tr>
											<td width="16" class="filesDetails" valign="top"></td>
											<td valign="top"> &nbsp;<font size="1"><a target="_blank" href="?L=moderator.users.redirection&ghost={file.company_id}&chromeless=1">[client data {5170}]</a></font><br /></td>
										</tr>
										<tr  style="display:none">
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
											<td width="50%" valign="top">
 												<strong>[Price {5029}]: {file.price}</strong>
												{nrPages.nrCharacters}
											</td>
											<td valign="top">{client.data}</td>
										</tr>
									</table>
								</LOOP filesApproveList>
								<div style="border-top:1px #EFEFEF solid;"></div>
 							</ZONE filesApprove enabled>
							<ZONE filesApprove empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment. {5005}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE filesApprove empty>
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
</ZONE accountPaymentModule enabled>

<ZONE accountPaymentModule guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">Sorry, guests can not upload pictures.</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=registration.register"><b>Register</b></a> </td>
      </tr>
   </table>
</ZONE accountPaymentModule guest>
  
  
<OBJ companyData>		
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-top:10px;">
		<tr><td width="120">[Tip persoana: {5009}]</td><td>[Persoana Juridica {5020}]</td></tr>
		<tr><td>[Nume companie: {5010}]</td><td>{name}</td></tr>
		<tr><td>[Pers. de contcat: {5011}]</td><td>{contact_person}</td></tr>
		<tr><td>[Adresa: {5012}]</td><td>{address}</td></tr>
		<tr><td>[Tel: {5013}]</td><td>{phone}</td></tr>
		<tr><td>[Fax: {5014}]</td><td>{fax}</td></tr>
		<tr><td>[Email: {5015}]</td><td>{email}</td></tr>
		<tr><td>[Cod fiscal: {5016}]</td><td>{fiscal_code}</td></tr>
		<tr><td>[Cod TVA: {5017}]</td><td>{vat_code}</td></tr>
		<tr><td>[Cod bancar: {5018}]</td><td>{bank_code}</td></tr>
		<tr><td>[Denumirea bancii: {5019}]</td><td>{bank_name}</td></tr>
	</table>
</OBJ companyData>

<OBJ personData>		
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-top:10px;">
		<tr><td width="100">[Tip persoana:</td><td>[Persoana Fizica {5021}]</td></tr>
		<tr><td>[Nume: {5022}]</td><td>{name}</td></tr>
 		<tr><td>[Adresa: {5024}]</td><td>{address}</td></tr>
		<tr><td>[Tel Fix: {5025}]</td><td>{phone}</td></tr>
		<tr><td>[Tel Mobil: {5026}]</td><td>{mobil_phone}</td></tr>
		<tr><td>[Cod Personal: {5027}]</td><td>{personal_code}</td></tr>
		<tr><td>[Email: {5028}]</td><td>{email}</td></tr>
	</table>
</OBJ personData>


<OBJ accountPaymentFiles>		
	<table cellpadding="0" cellspacing="0" border="0">
		{files}
	</table>
</OBJ accountPaymentFiles>

<OBJ accountPaymentCashAdvance>	
	<p><font color="#FF0000">[Cash Advance {1091}]</font></p>
</OBJ accountPaymentCashAdvance>		

<OBJ nrPagesnrCharactersYes>	
	<BR /><BR />
	[Numarullll de pagini: ~{fisier.nrPage} {5032}] <br />
	[Numarul de caractere: {characters_nr} {5171}] 
</OBJ nrPagesnrCharactersYes>	

<OBJ nrPagesnrCharactersNone></OBJ nrPagesnrCharactersNone>

<OBJ translationStatusYes>	
	&nbsp; <span style="background-color:#009900; font-weight:normal; color:#FFFFFF;"><font size="1">[[in traducere {5172}]]</font></span>
</OBJ translationStatusYes>	

<OBJ translationStatusNone>
	&nbsp; <span style="background-color:yellow; font-weight:normal; color:#999999;"><font size="1">[[in asteptare {5173}]]</font></span>
</OBJ translationStatusNone>

<OBJ translationActive>block</OBJ translationActive>
<OBJ translationInactive>none</OBJ translationInactive>

<OBJ addFileButton>
	&nbsp;&nbsp;<a href="?L=moderator.files.accountsPayment&unic_id={file_unic_id}&action=translateFileTools"><img align="absmiddle" src="theme/default/components/images/add_button1.png"></a>
</OBJ addFileButton>

<OBJ downloadTFiles>
	<font size="1" color="blue"> | [Download: {5187}]: <a href="?L=download.file&chromeless=1&path={translation.path}&file={file.translationFile}&filename={file.translationName}">[traducere {5188}]</a> | </font>
</OBJ downloadTFiles>


<OBJ downloadEFiles>
	<font size="1" color="blue"><a href="?L=download.file&chromeless=1&path={edit.path}&file={file.editFile}&filename={file.editName}">[editare {5189}]</a> | </font>
</OBJ downloadEFiles>

<OBJ dontEditFilePart><font size="1" color="#ffffff" style="background-color:#CC00FF; padding:3px;">[[editare {5193}]]</font></OBJ dontEditFilePart>


 