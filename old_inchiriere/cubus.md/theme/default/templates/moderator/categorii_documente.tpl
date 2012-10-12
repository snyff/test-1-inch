<ZONE categoriiDocumente enabled>
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
	                                    
				                    <!-- ZONE ERROR SUCCESS-->
									<!-- /ZONE ERROR SUCCESS-->	
									
									<ZONE creazaCategorie ok>
									<!-- CENTER TABBER TITLE -->
									<h2>1.[Categorie noua {9279}]</h2>
									<!-- /CENTER TABBER TITLE -->
									</ZONE creazaCategorie ok>

								    <ZONE editeazaCategorie ok>
									<!-- CENTER TABBER TITLE -->
									<h2>1.[Editeaz categorie {9280}]</h2>
									<!-- /CENTER TABBER TITLE -->
									</ZONE editeazaCategorie ok>
							
							        <form method="post">
	                                        <table width="100%" border="0" cellspacing="8" cellpadding="8" style="padding-left:10px;">
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
                                                    <td style="padding-right:25px;" width="160">
													    <strong>
														    <font size="3">[Nume categorie: {9274}]:</font>
														</strong>
														</td>
														<td>
                                                        <input type="text" name="categ_name" value="{categ.default}" class="input_css"/>
														<input type="hidden" name="edit" value="{fisier.id}" />
													</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
                                                        <br />
                                                 		<strong>
														    <font size="3">[Include in categorie: {9275}]:</font>
														</strong>
														</td>
														<td>
                                                  		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		                                                    <tr>
			                                                    <td width="150">
 		                                                            <select name="categSelect" class="select_css">
																	    <option value="0">-</option>
																		<LOOP categSelect>
																	    <option value="{categ.id}" {categ.selected} {categ.disabled}>{categ.language}</option>
                                                                        </LOOP categSelect>
		                                                            </select>
																</td>
		                                                    </tr>
	                                                    </table>
													</td>
												</tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
                                                        <br />
													    <strong>
														    <font size="3">[Romana: {9276}]:</font>
														</strong>
														</td>
														<td>
                                                        <input type="text" name="romana" value="{categ.romana}" class="input_css"/>
													</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
                                                        <br />
													    <strong>
														    <font size="3">[Engleza: {9277}]:</font>
														</strong>
														</td>
														<td>
                                                        <input type="text" name="engleza" value="{categ.engleza}" class="input_css"/>
													</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding-right:25px;">
                                                        <br />
													    <strong>
														    <font size="3">[Rusa: {9278}]:</font>
														</strong>
														</td>
														<td>
                                                        <input type="text" name="rusa" value="{categ.rusa}" class="input_css"/>
													</td>
                                                </tr>
												<tr>
												    <td></td>
                                                    <td style="padding-right:25px; padding-top:3px;" align="left">
													    <input name="Submit" type="submit" id="Submit" value="[Trimite datele {9230}]" class="button_css" />
													</td>
                                                </tr>
                                            </table>
                                    </form>
								</div>
								<!-- /Incarca fisier -->
								
								<!-- Calcul pret -->
                                <div class="tabbertab">

		                                <ZONE listafisiere enabled>
										 
										    <h2>2.[Lista categorii {9281}]</h2>
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
		                                                    <LOOP categListSelect>
															<table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px; margin-top:2px; background-color:#FFFFFF;">
															    <tr>
                                                                    <td width="200"  valign="middle" align="left">{categ.language}</td>
                                                                    <td width="50"  valign="middle" align="left"><a href="?L=moderator.categorii_documente&edit={categ.id}">Editeaza</a></td>
                                                                    <td width="50"  valign="middle" align="left"><a href="?L=moderator.categorii_documente&statut={categ.statut}&rm={categ.id}">{categ.statut.html}</a></td>
																	<td>&nbsp;</td>
                                                                </tr>
                                                            </table>
		                                                    </LOOP categListSelect>
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

</ZONE categoriiDocumente enabled>


<ZONE categoriiDocumente guest> 
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
</ZONE categoriiDocumente guest>
