<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  16.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

	1. greseala la editare nu apar taburile e greseala de JS trebuie de corectta cumva <br>

<ZONE filesModule enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=moderator.files.filesList">[Reincarca Pagina {5000}]</a> <!--| <a href="{siteURL}/?L=moderator.files.filesMap">[Harta fisiere {5035}]</a> -->
				</div>
				[Lista fisiere noi {5001}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<div class="tabber">
						<div class="tabbertab">
							<h2>[Lista fisiere {5002}]</h2>
							<ZONE newFiles enabled>							
								<br />
								<LOOP newFilesList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
										<input readonly="readonly" style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="25" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span>
										&nbsp;&nbsp;<a href="?L=moderator.files.filesList&ld=1&unic_id={unic_id}&action=editFile"><img align="absmiddle" src="theme/default/components/images/file_edit.png"></a>
										&nbsp;<a href="?L=moderator.files.filesList&cDetails={file.companyID}"><img align="absmiddle" src="theme/default/components/images/cinfo.png"></a>
										&nbsp;<a href="?L=moderator.files.filesList&fDetails={unic_id}"><img align="absmiddle" src="theme/default/components/images/finfo.png"></a>
										<a class="d20pxtop buttons_small delete" onclick="deleteFileConfirmation('{unic_id}')" href="#">&nbsp;</a>
										<a class="d20pxtop buttons_small download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
												<p>{description}</p>
												<p><strong>[Price {5029}]: {file.price}</strong></p>
												<p>
													<strong>[Numarul de caractere {5030}]</strong> 
													<form method="get">
														<input name="L" value="moderator.files.countPriceFile" type="hidden">
														<input name="file_unic_id" value="{unic_id}" type="hidden">
														<input name="characters_nr" size="18" type="text">
														<input name="chromeless" value="1" type="hidden">
														<input value="[Calculeaza pretul {5031}]" type="submit">
													</form>
												</p>
										   </td>
										</tr>
									</table>
								</LOOP newFilesList>
								<div style="border-top:1px #EFEFEF solid;"></div>
							</ZONE newFiles enabled>
							<ZONE newFiles empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu sunt fisiere spre moderare. {5003}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE newFiles empty>
						</div>
						<div class="tabbertab">
							<h2>[Lista fisiere recente {5004}]</h2>
							<ZONE approvedFiles enabled>
								<br />
								<LOOP approvedFilesList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
										<input readonly="readonly" style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="25" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
										&nbsp;&nbsp;<a href="?L=moderator.files.filesList&ld=1&unic_id={unic_id}&action=editFile"><img align="absmiddle" src="theme/default/components/images/file_edit.png"></a>
										&nbsp;<a href="?L=moderator.files.filesList&cDetails={file.companyID}"><img align="absmiddle" src="theme/default/components/images/cinfo.png"></a>
										&nbsp;<a href="?L=moderator.files.filesList&fDetails={unic_id}"><img align="absmiddle" src="theme/default/components/images/finfo.png"></a>
										<a class="d20pxtop buttons_small delete" onclick="deleteFileConfirmation('{unic_id}')" href="#">&nbsp;</a>
										<a class="d20pxtop buttons_small download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
 												<p><strong>[Price {5029}]: {file.price}</strong></p>
												<p>{nrPages.nrCharacters}</p>
												<p>{description}</p>
												<p>
													<strong>[Numarul de caractere {5030}]</strong> 
													<form method="get">
														<input name="L" value="moderator.files.countPriceFile" type="hidden">
														<input name="file_unic_id" value="{unic_id}" type="hidden">
														<input name="characters_nr" size="18" type="text">
														<input name="chromeless" value="1" type="hidden">
														<input value="[Calculeaza pretul {5031}]" type="submit">
													</form>
												</p>
										   </td>
										</tr>
									</table>
								</LOOP approvedFilesList>
								<div style="border-top:1px #EFEFEF solid;"></div>
							</ZONE approvedFiles enabled>
							<ZONE approvedFiles empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment. {5005}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE approvedFiles empty>
						</div>
						<div class="tabbertab">
							<h2>[Fisiere respinse {5006}]</h2>
							<ZONE rejectedFiles enabled>
								<br />
								<LOOP rejectedFilesList>
									<h4>
										<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
										<input readonly="readonly" style="border:0; font-weight:bold; color:#333333;" value="{file.originalNameH}" size="15" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
										&nbsp;<a href="?L=moderator.files.filesList&cDetails={file.companyID}"><img align="absmiddle" src="theme/default/components/images/cinfo.png"></a>
										&nbsp;<a href="?L=moderator.files.filesList&fDetails={unic_id}"><img align="absmiddle" src="theme/default/components/images/finfo.png"></a>
										<a class="buttons delete d20pxtop" href="#">{file.hours}:{file.minutes}</a>
										<a class="buttons_small download d20pxtop" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
									</h4>
									<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
										<tr>
										   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
										   <td style="padding-left:5px;" valign="top">
												<p>{description}</p>
												<p><strong>[Price {5029}]: {file.price}</strong></p>
												
												<!--
												<BR />
												<BR />
												<BR />
												<strong>[Numarul de caractere {5030}]</strong> 
												<form method="get">
													<input name="L" value="moderator.files.countPriceFile" type="hidden">
													<input name="file_unic_id" value="{unic_id}" type="hidden">
													<input name="characters_nr" size="18" type="text">
													<input name="chromeless" value="1" type="hidden">
													<input value="[Calculeaza pretul {5031}]" type="submit">
												</form>
												-->
										   </td>
										</tr>
									</table>
								</LOOP rejectedFilesList>
								<div style="border-top:1px #EFEFEF solid;"></div>
							</ZONE rejectedFiles enabled>
							<ZONE rejectedFiles empty>
								<br /><BR /><BR />
								   <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment. {5005}]</strong></font></center>
								<br /><BR /><BR />
							</ZONE rejectedFiles empty>
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
</ZONE filesModule enabled>

<ZONE filesModule guest> 
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
</ZONE filesModule guest>


<OBJ nrPagesnrCharactersYes>	
	[Numarullll de pagini: ~{fisier.nrPage} {5032}] <br />
	[Numarul de caractere: {characters_nr} {5171}] 
</OBJ nrPagesnrCharactersYes>	

<OBJ nrPagesnrCharactersNone></OBJ nrPagesnrCharactersNone>

<OBJ calcPriceAuto><font color="green">[pretul se calculeaza automat {5112}]</font></OBJ calcPriceAuto>	
<OBJ calcPriceManual><font color="red">[trebuie de calculat pret manual {5113}]</font></OBJ calcPriceManual>	


<meta http-equiv="refresh" content="300">