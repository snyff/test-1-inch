<ZONE traducatorFisiere test>
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
							   
							    <!-- Incarca fisier -->
								<div class="tabbertab">
	                                    
				                    <!-- ZONE ERROR SUCCESS-->
									<ZONE uploadHeader BigFileSize>
				                        <br />
				                        <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
				                            <tr>
					                            <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
						                        <td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {7430}] </font></td>
					                        </tr>
					                        <tr>
					                            <td align="left" class="black_text_content">[Va rugam introduceti fotografii numai in format GIF sau JPG de maxim 2000 Kb. {9037}] </td>
					                        </tr>
			                            </table>
				                    </ZONE uploadHeader BigFileSize>
				  
				                    <ZONE uploadHeader noFile>
				                        <br />
				                        <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
				                            <tr>
					                            <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
						                        <td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {7430}] </font></td>
					                        </tr>
					                        <tr>
					                            <td align="left" class="black_text_content">[Sorry, the file field appeared to be empty, you have to fill the FILE form field. {7435}] </td>
					                        </tr>
			                            </table>
				                    </ZONE uploadHeader noFile>
				  
				                    <ZONE uploadHeader unallowedExtension>
				                        <br />
				                        <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
				                            <tr>
					                            <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
						                        <td align="left" class="black_text_content_bold"><font color="#FF0000">[Can not save picture {7430}]  </font></td>
					                        </tr>
					                        <tr>
					                            <td align="left" class="black_text_content">[Sorry, the file type you sent is not supported by this website. {7440}] </td>
					                        </tr>
			                            </table>
				                    </ZONE uploadHeader unallowedExtension>
				  
				                    <ZONE uploadHeader selectOtherLANG>
				                        <br />
				                        <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
				                            <tr>
					                            <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
						                        <td align="left" class="black_text_content_bold"><font color="#FF0000">[Greseala!!! {9110}]  </font></td>
					                        </tr>
					                        <tr>
					                            <td align="left" class="black_text_content">[ Fisiere cu limba selectata sunt deja in lista de fisiere {9253}] </td>
					                        </tr>
			                            </table>
				                    </ZONE uploadHeader selectOtherLANG>
									<!-- /ZONE ERROR SUCCESS-->	
									
									
									<ZONE incarcaFisiere ok>
									<!-- CENTER TABBER TITLE -->
									<h2>1.[Incarca fisier {9100}]</h2>
									<!-- /CENTER TABBER TITLE -->
									</ZONE incarcaFisiere ok>
								
								
								    <ZONE editeazaFisiere ok>
									<!-- CENTER TABBER TITLE -->
									<h2>1.[Editeaz fisier {9051}]</h2>
									<!-- /CENTER TABBER TITLE -->
									</ZONE editeazaFisiere ok>
                            
							
							        <form enctype="multipart/form-data" method="post">
	                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-left:10px;">
                                                <tr>
                                                    <td>
		                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td valign="top">
 			                                                        <font class="black_text_content_bold"><b>[Upload Pictures {645}]</b></font>
 														        </td>
                                                            </tr>
                                                        </table>          
													</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
													    <strong>
														    <font size="3">[File: {7475}]</font>
														</strong>
														<br />
                                                        <input type="file" name="file" id="file"  size="33" class="button_file_css"/>
														<input type="hidden" name="edit" value="{fisier.id}" />
													</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
                                                        <br />
                                                 		<strong>
														    <font size="3">[Limbi traducere: {7480}]</font>
														</strong>
														<br />	
                                                  		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		                                                    <tr>
			                                                    <td width="150">
 		                                                            <select name="lang" class="select_css">
                                                                        <LOOP langSelect>
																	    <option value="{lang.id}" {lang.selected} {lang.disabled}>{lang.language}</option>
                                                                        </LOOP langSelect>
		                                                            </select>
																</td>
		                                                    </tr>
	                                                    </table>
													</td>
												</tr>
												<tr>
                                                    <td style="padding-right:25px; padding-top:20px;" align="left">
													    <input name="Submit" type="submit" id="Submit" value="[Incarca... {295}]" class="button_css" />
													</td>
                                                </tr>
                                            </table>
                                  </form>
								</div>
								<!-- /Incarca fisier -->
								
								<!-- Calcul pret -->
                                <div class="tabbertab">

 									    <ZONE filedelete success>
				                            <br />
				                            <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
				                                <tr>
                                                    <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/green_alert.gif" /></td>
						                            <td align="left" class="black_text_content_bold"><font color="#009900">[Successful! {315}]</font></td>
					                            </tr>
					                            <tr>
					                                <td align="left" class="black_text_content">[Fisierul a fost sters cu succes {9169}]</td>
					                            </tr>
			                                </table>
				                        </ZONE filedelete success>
									
									    <ZONE listafisiere enabled> 

 									        <ZONE uploadHeader success>
				                            <br />
				                                <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #009900 solid;">
				                                    <tr>
                                                        <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/green_alert.gif" /></td>
						                                <td align="left" class="black_text_content_bold"><font color="#009900">[Successful! {315}]</font></td>
					                                </tr>
					                                <tr>
					                                    <td align="left" class="black_text_content">[Your picture has been added successfully. Would you like to upload more pictures? {9036}]</td>
					                                </tr>
			                                    </table>
				                            </ZONE uploadHeader success>
									
									        <h2>2.[Lista fisiere {9038}]</h2>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px; padding-top:10px;">
                                                    <tr>
                                                        <td>
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top">
											                            <font class="black_text_content_bold"><b>[Lista documente {7390}]</b></font>
 										                            </td>
                                                                </tr>
                                                            </table>
						    	                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
		                                                    <LOOP fislist>
														    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #CCCCCC solid; padding:5px; margin-top:2px; background-color:#FFFFFF;">
                                                                <tr>
                                                                    <td width="25"  valign="middle" align="center">&nbsp;
																																	    
																    </td>
                                                                    <td width="1%" rowspan="2" valign="middle">
			                                                                <img src="{fisier.file}" name="picture" hspace="3" border="0" id="picture" /> 
			                                                        </td>
                                                                    <td valign="top" style="padding-left:20px;" colspan="2">
																	    <table cellpadding="0" cellspacing="0" border="0" width="100%">
																		   <td align="left"><font class="black_text_content" size="1"><b>{fisier.title}</b></font></td>
																		</table>																		     
																	</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
																	<td valign="top" align="left"  style="padding-left:20px;">{fisier.limba}</td>
                                                                    <td valign="middle" align="center" width="115">
																		<table cellpadding="0" width="115" cellspacing="5" border="0" align="right">
																		   <tr>
																			   <td>
																			       <form method="get">
																				       <input type="hidden" name="edit" value="{fisier.edit.id}" />
																				       <input type="hidden" name="L" value="moderator.traducator_fisiere_test" />
																					   <input type="submit" value="[Editeaza {9040}]"  class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#FF0F15; "  />
																				   </form>
																			   </td>
																		   </tr>
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                    </LOOP fislist>
		                                                </td>
                                                    </tr>
                                                </table>
		                                </ZONE listafisiere enabled>
									
		                                <ZONE listafisiere empty>
		                                
										    <h2>2.[Lista fisiere {9038}]</h2>
										
										    <br /><BR /><BR />
										        <center><font size=2><b>[You have to upload pictures before you can use this tool {7416}]</b></font></center>
										    <br /><BR /><BR />
										
		                                </ZONE listafisiere empty>

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
</ZONE traducatorFisiere test>


<ZONE traducatorFisiere guest> 
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
</ZONE traducatorFisiere guest>
