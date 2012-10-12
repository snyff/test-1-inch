<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  12.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

 

<ZONE islogin login>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=translator.e.tests">[Reincarca Pagina {3005}]</a>  
				</div>
				[Teste Editor {3018}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
 					<ZONE tabber active>							
						<div class="tabber">
							<div class="tabbertab">
								<h2>[Teste Editor {3018}]</h2>
								<ZONE testFiles enabled>							
									<br />
									<LOOP testFilesList>
										<h4>
											<a class="buttons_openClose openClose" href="javascript:;" onclick="toggleTag('{unic_id}');return false">&nbsp;</a>
											{file.originalName} <span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></font>
										</h4>
										<table id="{unic_id}" style="display:none; width:95%;" class="license" cellspacing="0" cellpadding="0" border="0">
											<tr>
											   <td width="16" class="filesDetails" valign="top"><a href="#"></a></td>
											   <td style="padding-left:5px;" valign="top">
													<BR />
													<strong>[Incarca traducerea {3016}]</strong> 
													<form method="post" action="?L=translator.e.insertFile&chromeless=1" onsubmit="return checkform()" enctype="multipart/form-data">
														<input name="file" id="file" type="file">
														<input name="id" value="{id}" type="hidden">
														<input name="Submit" value="[incarca {3017}]" type="submit">
													</form>
													<BR />
											   </td>
											   <td>
											   		<p>
														<a class="buttons download" href="?L=download.file&chromeless=1&path=translators_tests&file={file.originalFile}&filename={file.originalName}">&nbsp;</a>
													</p>
											   </td>
											</tr>
										</table>
									</LOOP testFilesList>
									<div style="border-top:1px #EFEFEF solid;"></div>
								</ZONE testFiles enabled>
							</div>
						</div>	
						<div style="height:10px;"></div>
						<div id="tabclose" class="tabber"></div>
 					</ZONE tabber active>	
					<ZONE tabber empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Pentru moment nu sunt fisiere spre testare. <br><br> Va rugam sa contactati persoana de contact in cazul in care doriti sa adaugati ale abilitati. {3015}]</strong></font></center>
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