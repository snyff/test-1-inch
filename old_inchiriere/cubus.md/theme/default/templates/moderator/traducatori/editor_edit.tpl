<ZONE traducatorLista test>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
   <tr>
        <td style="padding-left:10px;"> 
			<!-- HEADER IMG -->
			    ==navbar==	    
			<!-- /HEADER IMG -->
 	    </td>
    </tr>
    <tr>
        <td> 
            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-left:10px; margin-top:13px;">
		        <tr>
			        <td width="280" valign="top" align="left">
					    <!-- Block LIST -->
					        ==blocklist==
						<!-- /Block LIST -->
				    </td>
				    
					<!-- SPACE -->
					<td width="14"></td>
					<!-- /SPACE -->
					
					<!-- CENTER --> 
			        <td align="left" valign="top">
					
					    <a name="middle"></a>
				        
						<!-- CENTER BLOCK TITLE -->
                        <h1 class="m_round_corner_headline">[Moderator {9249}]</h1>
				        <!-- /CENTER BLOCK TITLE -->
				        
						<!-- LINE HEADER CORNE BORDER CSS-->	
						<span class="m_xtop">
					        <span class="m_xb1"></span>
						    <span class="m_xb2"></span>
						    <span class="m_xb3"></span>
						    <span class="m_xb4"></span>
					    </span>
						<!-- /LINE HEADER CORNE BORDER CSS-->	
				    		
						<!-- LINE LEFT RIGHT CORNE BORDER CSS-->			
					    <div class="m_round_corner_content" style="padding: 10px; background-color:#f5f5f5;">
 
                            <!-- START TABBER -->
							<div class="tabber">
							   
								 <div class="tabbertab">
									
									<h2>1. Editare editor</h2>
									
										<form method="POST">
										<div>																    
											<BR />
											<table cellpadding="0" cellspacing="8" border="0" width="100%">
												<tr> 
													<td><font class="black_text_content_bold"><b>{editor.nume} {editor.prenume}</b></font>
														<BR /><BR />
														<table cellpadding="0" cellspacing="4" border="0" width="100%">
															<tr>
																<td>
																	<input type="checkbox" name="editor_active" value="1" {checkbox.checked} /> <font class="black_text_content_bold"> Activat</font>
																</td>
															</tr>
															<tr>
																<td>
																	<select name="procente" class="select_small_css">
																		<LOOP procentEditor>
																		<option {sel.selected} value="{procent.trad}">{procent.trad} %</option>
																		</LOOP procentEditor>
																	</select> <font class="black_text_content_bold">Salariu</font>
																</td>
															</tr>
															<tr>
																<td>
																	<select name="bonusuri[]" size="5" multiple="multiple" class="select_small_css">
																		<option value="">-</option>
																		<LOOP bonusuriEditori>
																		<option {bonus.selected} value="{bonusuri.id}">{bonusuri.procent} % | Min - {bonus.sum.minim} lei | Max - {bonus.sum.maxim} lei</option>
																		</LOOP bonusuriEditori>
																	</select> <font class="black_text_content_bold">Bonusuri</font>
																</td>
																	<input type="hidden" name="id_editor" value="{editor.id}" />
															</tr>
														</table>		
													</td>
												</tr>
												<tr> 
													<td>
														<input type="hidden" name="L" value="registration.confirm" />
														<input type="hidden" name="admin" value="3" />						
														<input type="submit" name="Submit" id="Submit" value="[Trimite datele {9230}]" class="button_css" />
													</td>
												</tr>
											</table>																	    
										</div>
										</form>
		
								</div>
                            </div>	   
           			    </div>
			        
					    <span class="m_xbottom">
					        <span class="m_xb4"></span>
						    <span class="m_xb3"></span>
						    <span class="m_xb2"></span>
						    <span class="m_xb1"></span>
					    </span>	
						
			        </td>
			    </tr>
		    </table>
 	    </td>
    </tr>
</table>
</ZONE traducatorLista test>


<ZONE traducatorLista guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[EROARE!!! {9247}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><strong>[Nu puteti accesa aceasta pagina. {9248}]</strong></td>
      </tr>
   </table>
</ZONE traducatorLista guest>
