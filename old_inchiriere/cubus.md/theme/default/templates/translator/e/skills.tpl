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
					<a href="{siteURL}/?L=translator.e.skills">[Reincarca Pagina {3005}]</a>  
				</div>
				[Abilitati editari {3024}]
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
 					<ZONE tabber active>							
						<div class="tabber">
							<div class="tabbertab">
								<h2>[Abilitati editari {3024}]</h2>
								<ZONE testFiles enabled>							
									<br />
									<LOOP testFilesList>
										<h4>											
											<span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type} &nbsp; - &nbsp; {skills.status}</span>											
										</h4>
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


<OBJ active><font color="red">[Respins {3020}]</font></OBJ active>		
<OBJ rejected><font color="#009900">[Acceptat {3019}]</font></OBJ rejected>		
<OBJ pending><font color="blue">[Se analizeaza {3021}]</font></OBJ pending>		
<OBJ testing><font color="blue">[La testare {3022}]</font></OBJ testing>		

