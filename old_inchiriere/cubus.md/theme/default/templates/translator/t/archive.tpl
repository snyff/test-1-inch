<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  11.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

<ZONE islogin login>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=translator.t.archive">[Reincarca Pagina {3005}]</a>  
				</div>
				[Arhiva traduceri {3006}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
 					<ZONE tabber active>							
						<div class="tabber">
							<div class="tabbertab">
								<h2>[Arhiva traduceri {3006}]</h2>
								<ZONE archiveFiles enabled>							
									<br />
									<LOOP archiveFilesList>
										<h4>
											<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
											<input readonly="readonly" value="{file.originalName}" size="15" style="border:0; font-weight:bold; color:#333333;" /> <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span>
											<div style="float:right; margin-top:-17px; font-weight:normal;">[Pretul {3027}] {file.t.price} | {file.data} {file.t.paySalary}</div>
										</h4>
										<table id="{unic_id}" style="width:95%; display:none;" class="license" cellspacing="0" cellpadding="0" border="0">
											<tr>
											   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
											   <td style="padding-left:5px;">
											  	  <p>[Descarca {3025}]: <a href="?L=download.file&chromeless=1&path={file.translation}&file={file.translationFile}&filename={file.translationName}">[traducerea {3031}]</a> {file.downloadEdited}</p>
											   </td>
											</tr>
										</table>
									</LOOP archiveFilesList>
									<div style="border-top:1px #EFEFEF solid;"></div>
								</ZONE archiveFiles enabled>
							</div>
						</div>	
						<div style="height:10px;"></div>
						
						<a href="?L=translator.t.archive&action=print&chromeless=1" target="_blank">Versiunea Print</a>
						
						<div style="height:10px;"></div>
						<div id="tabclose" class="tabber"></div>
						
						
 					</ZONE tabber active>	
					<ZONE tabber empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Pentru moment nu sunt fisiere in arhiva. {3026}]</strong></font></center>
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
	
	<OBJ downloadEdited>	
		| <a href="?L=download.file&chromeless=1&path={file.edited}&file={file.editedFile}&filename={file.editedName}">[editarea {3032}]</a>	
	</OBJ downloadEdited>		

	<OBJ tSalaryPay>	
		&nbsp;<A href="?L=translator.t.payment&paymentStatus={file.paymentStatus}&unic_id={file.unic_id}&chromeless=1"><img src="{imgFiles}/pay_add.gif" align="absmiddle" /></A>
	</OBJ tSalaryPay>		
	
 	<OBJ tSalaryPaid>	
		&nbsp;<A href="?L=translator.t.payment&paymentStatus={file.paymentStatus}&unic_id={file.unic_id}&chromeless=1"><img src="{imgFiles}/pay_delete.gif" align="absmiddle" /></A>
	</OBJ tSalaryPaid>		
	
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