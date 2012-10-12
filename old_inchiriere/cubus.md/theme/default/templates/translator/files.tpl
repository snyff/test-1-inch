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
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=translator.files">[Reincarca Pagina {3005}]</a>  
				</div>
				[Lista fisiere noi {3004}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
 					<ZONE tabber active>							
						<div class="tabber">
							<ZONE translator files>	
								<div class="tabbertab">
									<h2>[Spre traducere {3002}] ({new.for.translate})</h2>
									<ZONE translationFiles enabled>							
										<br />
										<LOOP translationFilesList>
											<h4>
												<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
												<input readonly="readonly" value="{file.originalNameH}" size="25" style="border:0; font-weight:bold; color:#333333;" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
												<p style="margin: -18px 10px 0px 0px; padding: 0px; float: right;">{translator.salary} [lei {3028}]</p>
											</h4>
											<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
												<tr>
												   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
												   <td style="padding-left:5px;" valign="top">
														
														<p>
														<strong>[Incarca traducerea {3016}]</strong> 
														<form method="post" action="?L=translator.tinsertFile&chromeless=1" onsubmit="return checkform()" enctype="multipart/form-data">
															<input name="file" id="file" type="file">
															<input name="id" value="{id}" type="hidden">
															<input name="Submit" value="[incarca {3017}]" type="submit">
														</form>
														<p>
														<!--
														<p>{file.description}</p>
														-->
												   </td>
												   <td valign="top" width="30%">
		   												<p><a class="buttons download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">[Descarca {3025}]</a></p>
														<br style="clear:both" />
														<!--
														<p align="right"><br>{file.pages} [pagini {3029}]</p>
														<p align="right">{file.characters} [caractere {3030}]</p>
														-->
												   </td>
												</tr>
											</table>
										</LOOP translationFilesList>
										<div style="border-top:1px #EFEFEF solid;"></div>
									</ZONE translationFiles enabled>
									<ZONE translationFiles empty>
										<br /><BR /><BR />
										   <center><font size="2"><strong>[Nu sunt fisiere spre traducere. {5182}]</strong></font></center>
										<br /><BR />
									</ZONE translationFiles empty>
								</div>
							</ZONE translator files>	
							<ZONE editor files>	
								<div class="tabbertab">
									<h2>[Spre editare {3003}] ({new.for.edit})</h2>
									<ZONE editFiles enabled>							
										<br />
										<LOOP editFilesList>
											<h4>
												<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
												<input readonly="readonly" value="{file.originalNameTranslationH}" size="25" style="border:0; font-weight:bold; color:#333333;" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
											</h4>
											<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
												<tr>
												   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
												   <td style="padding-left:5px;" valign="top">
														<BR />
														<strong>[Incarca traducerea {3016}]</strong> 
														<form method="post" action="?L=translator.einsertFile&chromeless=1" onsubmit="return checkform()" enctype="multipart/form-data">
															<input name="file" id="file" type="file">
															<input name="id" value="{id}" type="hidden">
															<input name="Submit" value="[incarca {3017}]" type="submit">
														</form>
														<BR />
												   </td>
												   <td valign="top" width="50">
												   		<p><a class="buttons download" href="?L=download.file&chromeless=1&path={file.pathTranslation}&file={file.originalFileTranslation}&filename={file.originalNameTranslation}">[Descarca {3025}]</a></p>
												   		<p><br /><a class="buttons download" href="?L=download.file&chromeless=1&path={file.path}&file={file.originalFile}&filename={file.originalName}">[Descarca {3037}]</a></p>
												   </td>
												</tr>
											</table>
										</LOOP editFilesList>
										<div style="border-top:1px #EFEFEF solid;"></div>
									</ZONE editFiles enabled>
									<ZONE editFiles empty>
										<br /><BR /><BR />
										   <center><font size="2"><strong>[Nu sunt fisiere spre editare. {5185}]</strong></font></center>
										<br /><BR />
									</ZONE editFiles empty>
								</div>
							</ZONE editor files>	
						</div>	
						<div style="height:10px;"></div>
						<div id="tabclose" class="tabber"></div>
 					</ZONE tabber active>	
					<ZONE tabber empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Pentru moment contul DVS de traducator si editor este dezactivat va rugam sa contactati persoana de contact. {3008}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE tabber empty>
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
