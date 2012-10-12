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
 														
 							<h3 style="color:#1175C0; text-align:left"><a href="?L">[&laquo; inapoi {1138}]</a> | [files list {1094}]</h3>
							<br />
	
 							<table class="contPlata" cellpadding="0" cellspacing="0" border="0" width="100%">
								<td  valign="top">
 									
									<ZONE filesList enabled>
										<h4>[files name {1083}]</h4>										
										<table class="license translation" cellspacing="1" cellpadding="1" style="width:100%; background-color:EFEFEF;">
											<LOOP loopFilesList>
												<tr><td style="background-color:EFEFEF;" colspan="2" height="5"></td></tr>
												<tr>
												   <td style="padding-left:5px;">
												   		<p><font style="font-weight:bold">{original.name} -</font> <font size="1">( {from.language} -> {to.language} ) : {file.type}</font> <font style="font-weight:bold"> - {price} [moeny {1078}]</font> </p>
												   		<p>[Numarullll de pagini: ~{fisier.nrPage}, Numarul de caractere: {characters_nr} {1095}]</p>
												   </td>
 												   <td align="right" style="padding-right:5px; padding-top:3px;" width="150">
												   		<p><font size="1">[added {1096}]: {time0}</font></p>
														{statut.file}
  												   </td>
												</tr>
											</LOOP loopFilesList>
										</table>
 									</ZONE filesList enabled> 
									
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
	
	<OBJ filesDetail>		
		<strong>[Price {5029}]: {file.price}</strong>
		<BR /><BR />
		[Numarullll de pagini: ~{fisier.nrPage}, Numarul de caractere: {characters_nr} {5032}]
 	</OBJ filesDetail>
  
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


<OBJ statutToPay>	
	<p style="color:red">[spre achitare {1090}]</p>
</OBJ statutToPay>	

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
	<p><a class="buttons download" href="?L=download.file&chromeless=1&path={download.path}&file={file.downloadFile}&filename={file.downloadName}">[descarca {1127}]</a></p>
</OBJ statutDownload>	



