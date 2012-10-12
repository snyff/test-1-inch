<ZONE legaturi enabled>
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
				    <td width="14"></td>
			        <td align="left" valign="top">
				
                        <h1 class="m_round_corner_headline">[Moderator {9249}]</h1>
				  
				        <span class="m_xtop">
					        <span class="m_xb1"></span>
						    <span class="m_xb2"></span>
						    <span class="m_xb3"></span>
						    <span class="m_xb4"></span>
					    </span>
				    					
					    <div class="m_round_corner_content" style="padding: 10px; background-color:#f5f5f5;">
 
                            <!-- START TABBER -->
							<div class="tabber">
							   
							    <!-- Creaza categorie Editeaza categorie  -->
								<div class="tabbertab">
	                                    
									<ZONE legaturanoua enabled>
									    <h2>1.Legatura noua</h2>
									<ZONE legaturanoua enabled>
									
									<ZONE listaediteaza enabled>
									    <h2>1.Editeaza Legatura</h2>
									<ZONE listaediteaza enabled>

							        <form method="get">
	                                        
											<input type="hidden" name="L" value="moderator.legaturi_companie_traducator" />
											
											<table width="100%" border="0" cellspacing="8" cellpadding="8" style="padding-left:10px;">
                                                <tr>
                                                        <td>
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top" colspan="3">
											                            <font class="black_text_content_bold"><b>[Lista documente {7390}]</b></font> 										                            
																	</td>
                                                                </tr>
                                                            </table>						    	                        </td>
                                                </tr>
                                                <tr>
                                                        <td colspan="2">
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top"><font size="1">2. LEGATURA COMPANIE - TRADUCATOR ( noi delegam un traducator 
		      care va face toate traducerile acelei companii pentru anumite limbi)
																	</td>
                                                                </tr>
                                                            </table>						    	                        
														</td>
                                                </tr>
												
												<ZONE listacompanii enabled>
												
                                                <tr>
                                                    <td width="160" style="padding-right:25px;">
                                                        <br />
                                                 		<strong>
														    <font size="3">[Include in categorie: {9275}]:</font>														</strong>													
													</td>
													<td>
                                                  		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		                                                    <tr>
			                                                    <td width="150">
 		                                                            <select name="legaturaCompanie" style="width:450px;" size="10" class="select_css">
																		<LOOP listaCompanii>
																	    <option value="{id.companie}">{nume.companie} ({nume.companie.login})</option>
                                                                        </LOOP listaCompanii>
		                                                            </select>																</td>
		                                                    </tr>
	                                                    </table>													
													</td>
												</tr>
												
												</ZONE listacompanii enabled>
												
												
												<ZONE listatraducatori enabled>
												
                                                <tr>
                                                    <td width="160" style="padding-right:25px;">
                                                        <br />
                                                 		<strong>
														    <font size="3">Lista traducatori:</font>														</strong>													
													</td>
													<td>
                                                  		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		                                                    <tr>
			                                                    <td width="150">
 		                                                            <select name="legaturaTraducator" style="width:450px;" class="select_css">
																		<LOOP listaTraducatorii>
																	    <option value="{id.traducator}">{nume.traducator}</option>
                                                                        </LOOP listaTraducatorii>
		                                                            </select>																</td>
		                                                    </tr>
	                                                    </table>													
													</td>
												</tr>
												
												</ZONE listatraducatori enabled>
												
                                              
											    <ZONE listalimbitrad enabled>
											  
											    <tr>
                                                    <td width="160" style="padding-right:25px;">
                                                                   <br />
                                                             		<strong>
														              <font size="3">[Limbi traducere: {7480}]</font>
														            </strong>
													            	<br />	
													</td>
													<td>
                                                  		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		                                                    <tr>
													            <td width="150">
 		                                                            <select name="from_lang" size="8" class="select_css">
                                                                        <LOOP langSelectFrom>
																	    <option value="{lang.id}" {lang.selected}>{lang.language}</option>
                                                                        </LOOP langSelectFrom>
		                                                            </select>
																</td>
		                                                        <td align="center">
																    <img src="theme/default/theme_data/register/sageata.jpg">
																</td>
			                                                    <td>
 		                                                            <select name="to_lang" size="8" class="select_css">
                                                                        <LOOP langSelectTo>
																	    <option value="{lang.id}" {lang.selected}>{lang.language}</option>
                                                                        </LOOP langSelectTo>
		                                                            </select>
                                                                </td>
		                                                    </tr>
	                                                    </table>													
													</td>
												</tr>
											    </ZONE listalimbitrad enabled>
												
												<tr>
												    <td></td>
                                                    <td style="padding-right:25px; padding-top:3px;" align="left">
													    <input type="submit" value="[Trimite datele {9230}]" class="button_css" />													</td>
                                                </tr>
                                            </table>
                                    </form>
								</div>
								<!-- /Incarca fisier -->
								
								<!-- Calcul pret -->
                                <div class="tabbertab">

		                                <ZONE listafisieredocs enabled>
										 
										    <h2>2.Lista legaturi</h2>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px; padding-top:10px;">
                                                    <tr>
                                                        <td>
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top">
											                            <font class="black_text_content_bold"><b>[Lista {9281}]</b></font>
 										                            </td>
                                                                </tr>
                                                            </table>
						    	                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
		                                                    <LOOP listaLegaturi>
															<table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px; margin-top:2px; background-color:#FFFFFF;">
															    <tr>
                                                                    <td width="200"  valign="middle" align="left">{nume.companie} ({login.companie})</td>
                                                                    <td width="100"  valign="middle" align="left">{nume.traducator}</td>
                                                                    <td width="100"  valign="middle" align="left">{from.lang} -> {to.lang}</td>
                                                                    <td width="100"  valign="middle" align="left"><a href="?L=moderator.legaturi_companie_traducator&rm={id.companie}">Sterge legatura</a></td>
																	<td>&nbsp;</td>
                                                                </tr>
                                                            </table>
		                                                    </LOOP listaLegaturi>
		                                                </td>
                                                    </tr>
                                                </table>
		                                </ZONE listafisieredocs enabled>
									
		                                <ZONE listafisieredocs empty>
		                                
										    <h2>2.Lista legaturi</h2>
										
										    <br /><BR /><BR />
										        <center><font size=2><b>[Lista categorii este goala.{9309}]</b></font></center>
										    <br /><BR /><BR />
										
		                                </ZONE listafisieredocs empty>

 	                            </div>
								<!-- /Calcul pret -->
								
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

</ZONE legaturi enabled>


<ZONE legaturi guest> 
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
</ZONE legaturi guest>
