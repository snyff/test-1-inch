<ZONE checkContPlata enabled>
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
				
                        <h1 class="m_round_corner_headline">[Conturi de plata {9048}]</h1>
				  
				        <span class="m_xtop">
					        <span class="m_xb1"></span>
						    <span class="m_xb2"></span>
						    <span class="m_xb3"></span>
						    <span class="m_xb4"></span>
					    </span>
				    					
					    <div class="m_round_corner_content" style="padding: 10px; background-color:#f5f5f5;">
 
                            <div class="tabber">
                                <div class="tabbertab">
																		
									<h2>[Conturi de plata {9048}]</h2>  
 										
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px; padding-top:10px;">
                                            <tr>
                                                <td>
								                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td valign="top">
											                    <font class="black_text_content_bold"><b>[Conturi de plata {9048}]</b></font>
 										                    </td>
                                                        </tr>
                                                    </table>
						    	                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <ZONE contPlata enabled>
		                                                <LOOP contPlata>
														    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #CCCCCC solid; padding:5px; margin-top:5px; background-color:#FFFFFF;">
                                                                <tr>
                                                                    <td>
																	    <table cellpadding="0" cellspacing="0" width="100%" border="0">
																		    <tr>
																			    <td>
																	                <table cellpadding="0" cellspacing="0" width="100%" border="0">
																		                <tr>
																			                <td width="30%">
																					            <font class="black_text_content_bold">[Cont de plata nr.{9042}]: <b>{contplata.id}</b></font>
																		                        <br />
																	                            <font class="black_text_content_bold">[Suma {9043}]: <b>{contplata.suma}</b></font>
																								
																								
																			                    <script>
                                                                                                    var test{contplata.id} = 'test{contplata.id}';
                                                                                                </script>
                                                                                                <a onmouseover="document.getElementById(test{contplata.id}).style.visibility='visible';" onmouseout="document.getElementById(test{contplata.id}).style.visibility='hidden';"><img src="theme/default/images/modules/moderator.conturi_de_plata/info_profil.png" align="absmiddle"/></a>
                                                                                                <div id="test{contplata.id}" style="visibility:hidden; position:absolute; border:1px #CCCCCC solid; background-color:#FFFFFF; padding:7px; left: 487px; top: {height.mouse.over}px;">{date.de.contact}</div>

																		<OBJ dateCompanie>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Companie</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume companie:</td><td>{company.name}</td>
																			</tr>
																			<tr>
																			   <td>Pers. de contcat:</td><td>{company.pers.contact}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{company.adresa}</td>
																			</tr>
																			<tr>
																			    <td>Tel:</td><td>{company.tel}</td>
																			</tr>
																			<tr>
																			    <td>Fax:</td><td>{company.fax}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{company.email}</td>
 																			</tr>
																			<tr>
																			    <td>Cod fiscal:</td><td>{company.codfiscal}</td>
 																			</tr>
																			<tr>
																			    <td>Cod TVA:</td><td>{company.codtva}</td>
 																			</tr>
																			<tr>
																			    <td>Cod bancar:</td><td>{company.codbancar}</td>
 																			</tr>
																			<tr>
																			    <td>Denumirea bancii:</td><td>{company.denumireabancii}</td>
 																			</tr>
																		</table>
																		</OBJ dateCompanie>
																	
																		<OBJ datePersoanaFizica>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Persoana fizica</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume:</td><td>{pers.numele}</td>
																			</tr>
																			<tr>
																			   <td>Prenume:</td><td>{pers.prenumele}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{pers.adresa}</td>
																			</tr>
																			<tr>
																			    <td>TelFix:</td><td>{pers.telFix}</td>
																			</tr>
																			<tr>
																			    <td>Tel Mobil:</td><td>{pers.telMobil}</td>
																			</tr>
																			<tr>
																			    <td>Cod Personal:</td><td>{pers.codPersonal}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{pers.email}</td>
 																			</tr>
																		</table>
																		</OBJ datePersoanaFizica>
																		
																								
																								
																							</td>
																							<td>
																							    <OBJ CPCreat>
																							    <table cellpadding="0" cellspacing="3" border="0" width="100%" style=" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5">
																						              <tr><td align="left"><strong>[Cont de plata creat {9303}]: {timpRamas.ore}:{timpRamas.minute}</strong></td></tr>
																					            </table>	
																								</OBJ CPCreat>

																							    <OBJ CPCreatTreiZile>
																							    <table cellpadding="0" cellspacing="3" border="0" width="100%" style=" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5">
																						              <tr><td align="left"><strong>[Cont de plata creat {9303}]: {timpRamas.ore}:{timpRamas.minute}</strong></td></tr>
																						              <tr><td align="left"><strong>[ALERTA!!! Au mai ramas 2 zile pentru a ACHITA contul {9304}]</strong></td></tr>
																					            </table>	
																								</OBJ CPCreatTreiZile>

																							    <OBJ CPAchitat>
																							    <table cellpadding="0" cellspacing="3" border="0" width="100%" style=" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5">
																						              <tr><td align="left"><strong>[Cont de plata creat {9303}]: {timpRamas.ore}:{timpRamas.minute}</strong></td></tr>
																						              <tr><td align="left"><strong>[ALERTA!!! Cont Achitat dar Neconfirmat {9305}]</strong></td></tr>
																					            </table>	
																								</OBJ CPAchitat>

																							    <OBJ CPAchitatTreiZile>
																							    <table cellpadding="0" cellspacing="3" border="0" width="100%" style=" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5">
																						              <tr><td align="left"><strong>[Cont de plata creat {9303}]: {timpRamas.ore}:{timpRamas.minute}</strong></td></tr>
																						              <tr><td align="left"><strong>[ALERTA!!! Contul nu este confirmat. Au mai ramas 2 zile pina contul va fi sters. {9306}]</strong></td></tr>
																					            </table>	
																								</OBJ CPAchitatTreiZile>
																								
																								{ContPlata.statut}																							    
																							</td>
																						</tr>
																					</table>
																				</td>
																			</tr>
																		    <tr>
																			    <td>
																				    <table cellpadding="0" cellspacing="3" border="0" width="100%" style=" margin:5px; padding-left:10px; padding-top:5px; padding-bottom:5px; border:1px #CCCCCC solid; background-color:#f5f5f5">
																					    {contplata.fileList}
																						
																						<OBJ tipulContuluiPlata>
																						    <tr><td width=10>1.</td><td>[servicii de traducere {9297}]</td></tr>
                                                                                        </OBJ tipulContuluiPlata>  																							   
																					</table>
																				</td>
																			</tr>
																		    <tr>
																			    <td>
																				    <table cellpadding="0" cellspacing="3" border="0" width="100%" style="margin:5px; padding-left:7px; padding-top:1px; border:1px #cccccc solid; background-color:#ffffff">
																		                <tr>
																			                <td>
																							    <OBJ ContPlataNeachitat>																								    
																								    <img src="theme/default/images/icons/alert/red_alert.gif" align="left" vspace="3"  hspace="7"/>
																								    [Daca ati achitat contul de plata apasati "ACHITAT" noi vom "CONFIRMA" plata DVS {9046}]</font>
                                                                                                 </OBJ ContPlataNeachitat>
																							   
																							    <OBJ ContPlataAchitat>																								    
																								    <img src="theme/default/images/icons/wait/waitwe.gif" align="left" vspace="3"  hspace="7"/>
																								    [Vom "CONFIRMA" contul DVS de plata in momentul intrarii in cont. {9049}]</font>
                                                                                                 </OBJ ContPlataAchitat> 
																							   
																							    <OBJ ContPlataConfirmat>																								    
																							    	<img src="theme/default/images/icons/alert/green_alert.gif" align="left" vspace="3"  hspace="7"/>
																								    [Daca ati achitat contul de plata apasati "ACHITAT" noi vom "CONFIRMA" plata DVS {9046}]</font>
                                                                                                 </OBJ ContPlataConfirmat>
																								 
																								 {ContPlata.Achitat} 
																							
																							</td>
																							<td width="100" align="center">
																		                        <script type="text/javascript">
                                                                                                    <!--
                                                                                                        function anuleazaCont{contplata.id}() {
	                                                                                                        var answer = confirm("[Doriti sa anulati contul de plata ? {9174}]")
	                                                                                                        if (answer){
	                                                                                                            window.location = "?L=moderator.conturi_de_plata&cpDelete={contplata.id}";
                                                                              	                            }
                                                                                                        }
                                                                                                    //-->
                                                                                                </script>																		
																	                            <input type="button" value="[Anuleaza {9044}]" ONCLICK="anuleazaCont{contplata.id}()"  {picture.anuleaza.disabled} class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#FF0F15" />
																								
																							</td>
																							<td width="100" align="center"><input type="submit" value="[Achitat {9047}]" class="button_edit_del_css" {picture.achitat.disabled}  style="border:1px #cccccc solid; background-color:#f5f5f5; color:{contplata.achitatColor}" /></td>
																			                <td width="100" align="center">
																							    <form  method="post">
																								    <input type="hidden" name="idcontplataConfirm" value="{contplata.id}" />
																							        <input type="submit" value="[Confirmat {9050}]" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:{contplata.confirmatColor}" />
																							    </form>
																							</td>
																			            </tr>
																					</table>
																				</td>
																			</tr>
																		</table>
																	</td>
                                                                </tr>          
                                                            </table>
		                                                </LOOP contPlata>
		                                            </ZONE contPlata enabled>

		                                            <ZONE contPlata empty>
													   
										                <br /><BR /><BR />
													       <center><font size="2"><strong> [Nu sunt conturi de plata spre moderare {9221}]</strong></font></center>
										                <br /><BR /><BR />
													    
		                                            </ZONE contPlata empty>
		                                        </td>
                                            </tr>
                                        </table>
								</div>
                                <div class="tabbertab">
																		
									<h2>Fisiere in traducere</h2>
									     
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
                                                    <ZONE fisiereTraducere enabled>
		                                                <LOOP fisiereTraducereList>


														    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #CCCCCC solid; padding:5px; margin-top:2px; background-color:#FFFFFF;">
                                                                <tr>
                                                                    <td width="25"  valign="middle" align="center">&nbsp;
																																	    
																    </td>
                                                                    <td width="1%" rowspan="2" valign="middle">
			                                                               <img src="{fisier.file}" name="picture" hspace="3" border="0" id="picture" /> 
			                                                        </td>
                                                                    <td colspan="2" valign="top" style="padding-left:20px;">
																	    <table cellpadding="0" cellspacing="0" border="0" width="100%">
																		   <td align="left"><font class="black_text_content" size="1"><b>{fisier.title}</b></font></td>
																		   <td align="left"><font class="black_text_content" size="1">
									                                           {data.traducator}
																		   </td>
																		   <td align="right" style="color:#FF0000">&nbsp;&nbsp;<b>[Pretul {9055}]: {fisier.pret} [LEI MD {9026}]</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																		</table>																		     
																	</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
																	<td valign="top" align="left"  style="padding-left:20px;">
																		<table cellpadding="0" cellspacing="0" border="0" width="380" style="padding-top:10px;">
																		    <tr>
																			    <td bgcolor="#f5f5f5" style="border:1px #CCCCCC solid; padding:6px;"><font color="#000000" size="1">[Traduce din {9052}]: {fisier.traducDin} -> [in {9053}]: {fisier.traducIn}, [tipul fisierului {9054}]: {fisier.typeFile}</font></td>
																			</tr>
																		</table> 
																	    <table cellpadding="5" cellspacing="3" border="0" width="100%">
																		    <tr>
																			    <td>
																				    &nbsp;<font size="2">{fisier.description}</font>
																					<p><font size="1">[ {9013}]: ~{fisier.nrPage}, [ {9019}]: {fisier.nrCaractere}</font></p>																					
																				</td>
																			</tr>
																		</table>
																		            
																		
																		
																	    <table cellpadding="3" cellspacing="3" border="0" width="100%" bgcolor="#CCCCCC">
																		<TR>
																		<TD bgcolor="#FFFFFF" valign="top">
 																		
																		
																		<OBJ dateCompanie>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Companie</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume companie:</td><td>{company.name}</td>
																			</tr>
																			<tr>
																			   <td>Pers. de contcat:</td><td>{company.pers.contact}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{company.adresa}</td>
																			</tr>
																			<tr>
																			    <td>Tel:</td><td>{company.tel}</td>
																			</tr>
																			<tr>
																			    <td>Fax:</td><td>{company.fax}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{company.email}</td>
 																			</tr>
																			<tr>
																			    <td>Cod fiscal:</td><td>{company.codfiscal}</td>
 																			</tr>
																			<tr>
																			    <td>Cod TVA:</td><td>{company.codtva}</td>
 																			</tr>
																			<tr>
																			    <td>Cod bancar:</td><td>{company.codbancar}</td>
 																			</tr>
																			<tr>
																			    <td>Denumirea bancii:</td><td>{company.denumireabancii}</td>
 																			</tr>
																		</table>
																		</OBJ dateCompanie>
																	
																		<OBJ datePersoanaFizica>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Persoana fizica</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume:</td><td>{pers.numele}</td>
																			</tr>
																			<tr>
																			   <td>Prenume:</td><td>{pers.prenumele}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{pers.adresa}</td>
																			</tr>
																			<tr>
																			    <td>TelFix:</td><td>{pers.telFix}</td>
																			</tr>
																			<tr>
																			    <td>Tel Mobil:</td><td>{pers.telMobil}</td>
																			</tr>
																			<tr>
																			    <td>Cod Personal:</td><td>{pers.codPersonal}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{pers.email}</td>
 																			</tr>
																		</table>
																		</OBJ datePersoanaFizica>
																		
																		{date.de.contact}
																		
																		
																		</td>
																		<TD bgcolor="#FFFFFF" valign="top" width="50%">
																		
																		{date.de.traducator}
																		
																		<OBJ dateTraducator>
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Traducator</strong></td><td></td>
																			</tr>
																			<tr>
																			    <td>Nume:</td><td>{traducator.name}</td>
																			</tr>
																			<tr>
																			   <td>Prenume:</td><td>{traducator.prenume}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{traducator.adresa}</td>
																			</tr>
																			<tr>
																			    <td>Tel:</td><td>{traducator.tel}</td>
																			</tr>
																			<tr>
																			    <td>Mobil:</td><td>{traducator.mobil}</td>
																			</tr>
																			<tr>
																			    <td>Cod personal:</td><td>{traducator.codPersonal}</td>
 																			</tr>
																		</table>
																		</OBJ dateTraducator>
																		
																		
																		</td>
																		</TR>
																		</table>

																	</td>
                                                                    <td valign="top" align="center" width="115">
																	    <table cellpadding="0" width="115" cellspacing="5" border="0" align="right">
																		   <tr>
																		       <td> 
																		           <form method="get" >
																				       <input type="hidden" name="L" value="download.file" />
																				       <input type="hidden" name="chromeless" value="1" />
																				       <input type="hidden" name="path" value="{fisier.path}" />
																				       <input type="hidden" name="file" value="{fisier.filename}" />
																				       <input type="submit" value="[Descarca {9059}]" class="button_edit_del_css" style="border:0px; border:1px #cccccc solid; background-color:#f5f5f5; color:#3969F9" />
																				   </form>																			   </td>
																		   </tr>
																		   
																		   <form method="post">
																		   <tr>
																		       <td>
																			       <input type="hidden" name="id_file" value="{fisier.id}" />
																				   <input type="text" name="value_file" class="button_edit_del_css" style="border:1px #cccccc solid; background-color:#f5f5f5;" />																			   </td>
																		   </tr>
																		   <tr>
																			   <td>
																				   <input type="submit" value="[Editeaza {9040}]" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#009900"  />																			   </td>
																		   </tr>
																		   <tr>
																		       <td><br /><BR /></td>
																		   </tr>
																		   <tr>
																		       <td bgcolor="#FFFF00" height="25"><b>{statut.fisier}</b></td>
																		   </tr>
																		   </form>
																		   
																		  
																		   
																			<script type="text/javascript">
																				<!--
																					function stergeFisierulGo{fisier.id}() {
																						var answer = confirm("Doriti sa stergeti fisierul ?")
																						if (answer){
																							window.location = "?L=moderator.conturi_de_plata&sterge_fisierul_go={fisier.id}";
																						}
																					}
																				//-->
																			</script>																			   
																		   
																		   <tr><td><bR /></td></tr>
																		   <tr>
																			   <td>
																				   <!--<input type="button" ONCLICK="stergeFisierulGo{fisier.id}()" value="Sterge" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:red; color:yellow"  />																			  
																				   -->
																			 </td>
																		   </tr>
																		   
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                </LOOP fisiereTraducereList>

		                                            </ZONE fisiereTraducere enabled>

		                                            <ZONE fisiereTraducere empty>
		                                             
										                <br /><BR /><BR />
													       <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment {9220}]</strong></font></center>
										                <br /><BR /><BR />

											        </ZONE fisiereTraducere empty>
		                                        </td>
                                            </tr>
                                  </table>
 	                            </div>
                                <div class="tabbertab">
																		
									<h2>Fisiere la Editare</h2>
									     
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
                                                    <ZONE fisiereEditare enabled>
		                                                <LOOP fisiereEditareList>


														    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #CCCCCC solid; padding:5px; margin-top:2px; background-color:#FFFFFF;">
                                                                <tr>
                                                                    <td width="25"  valign="middle" align="center">&nbsp;
																																	    
																    </td>
                                                                    <td width="1%" rowspan="2" valign="middle">
			                                                               <img src="{fisier.file}" name="picture" hspace="3" border="0" id="picture" /> 
			                                                        </td>
                                                                    <td colspan="2" valign="top" style="padding-left:20px;">
																	    <table cellpadding="0" cellspacing="0" border="0" width="100%">
																		   <td align="left"><font class="black_text_content" size="1"><b>{fisier.title}</b></font></td>
																		   <td align="right" style="color:#FF0000">&nbsp;&nbsp;<b>[Pretul {9055}]: {fisier.pret} [LEI MD {9026}]</b>&nbsp;&nbsp;&nbsp;&nbsp;</td>
																		</table>																		     
																	</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
																	<td valign="top" align="left"  style="padding-left:20px;">
																		<table cellpadding="0" cellspacing="0" border="0" width="380" style="padding-top:10px;">
																		    <tr>
																			    <td bgcolor="#f5f5f5" style="border:1px #CCCCCC solid; padding:6px;"><font color="#000000" size="1">[Traduce din {9052}]: {fisier.traducDin} -> [in {9053}]: {fisier.traducIn}, [tipul fisierului {9054}]: {fisier.typeFile}</font></td>
																			</tr>
																		</table> 
																	    <table cellpadding="5" cellspacing="3" border="0" width="100%">
																		    <tr>
																			    <td>
																				    &nbsp;<font size="2">{fisier.description}</font>
																					<p><font size="1">[ {9013}]: ~{fisier.nrPage}, [ {9019}]: {fisier.nrCaractere}</font></p>																					
																				</td>
																			</tr>
																		</table>
																		            
																		
																		
																	    <table cellpadding="3" cellspacing="3" border="0" width="100%" bgcolor="#CCCCCC">
																		<TR>
																		<TD bgcolor="#FFFFFF" valign="top">
 																		
																		
																		<OBJ dateCompanie>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Companie</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume companie:</td><td>{company.name}</td>
																			</tr>
																			<tr>
																			   <td>Pers. de contcat:</td><td>{company.pers.contact}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{company.adresa}</td>
																			</tr>
																			<tr>
																			    <td>Tel:</td><td>{company.tel}</td>
																			</tr>
																			<tr>
																			    <td>Fax:</td><td>{company.fax}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{company.email}</td>
 																			</tr>
																			<tr>
																			    <td>Cod fiscal:</td><td>{company.codfiscal}</td>
 																			</tr>
																			<tr>
																			    <td>Cod TVA:</td><td>{company.codtva}</td>
 																			</tr>
																			<tr>
																			    <td>Cod bancar:</td><td>{company.codbancar}</td>
 																			</tr>
																			<tr>
																			    <td>Denumirea bancii:</td><td>{company.denumireabancii}</td>
 																			</tr>
																		</table>
																		</OBJ dateCompanie>
																	
																		<OBJ datePersoanaFizica>		
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Persoana fizica</strong></td><td>&nbsp;</td>
																			</tr>
																			<tr>
																			    <td>Nume:</td><td>{pers.numele}</td>
																			</tr>
																			<tr>
																			   <td>Prenume:</td><td>{pers.prenumele}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{pers.adresa}</td>
																			</tr>
																			<tr>
																			    <td>TelFix:</td><td>{pers.telFix}</td>
																			</tr>
																			<tr>
																			    <td>Tel Mobil:</td><td>{pers.telMobil}</td>
																			</tr>
																			<tr>
																			    <td>Cod Personal:</td><td>{pers.codPersonal}</td>
																			</tr>
																			<tr>
																			    <td>Email:</td><td>{pers.email}</td>
 																			</tr>
																		</table>
																		</OBJ datePersoanaFizica>
																		
																		{date.de.contact}
																		
																		
																		</td>
																		<TD bgcolor="#FFFFFF" valign="top" width="50%">
																		
																		{date.de.traducator}
																		
																		<OBJ dateTraducator>
																		<table cellpadding="0" cellspacing="0" border="0">
																		    <tr>
																			    <td width="100"><strong>Traducator</strong></td><td></td>
																			</tr>
																			<tr>
																			    <td>Nume:</td><td>{traducator.name}</td>
																			</tr>
																			<tr>
																			   <td>Prenume:</td><td>{traducator.prenume}</td>
																			</tr>
																			<tr>
																			    <td>Adresa:</td><td>{traducator.adresa}</td>
																			</tr>
																			<tr>
																			    <td>Tel:</td><td>{traducator.tel}</td>
																			</tr>
																			<tr>
																			    <td>Mobil:</td><td>{traducator.mobil}</td>
																			</tr>
																			<tr>
																			    <td>Cod personal:</td><td>{traducator.codPersonal}</td>
 																			</tr>
																		</table>
																		</OBJ dateTraducator>
																		
																		
																		</td>
																		</TR>
																		</table>

																	</td>
                                                                    <td valign="top" align="center" width="115">
																	    <table cellpadding="0" width="115" cellspacing="5" border="0" align="right">
																		   <tr>
																		       <td> 
																		           <form method="get" >
																				       <input type="hidden" name="L" value="download.file" />
																				       <input type="hidden" name="chromeless" value="1" />
																				       <input type="hidden" name="path" value="{fisier.path}" />
																				       <input type="hidden" name="file" value="{fisier.filename}" />
																				       <input type="submit" value="[Descarca {9059}]" class="button_edit_del_css" style="border:0px; border:1px #cccccc solid; background-color:#f5f5f5; color:#3969F9" />
																				   </form>																			   </td>
																		   </tr>
																		   <tr>
																		       <td><br /><BR /></td>
																		   </tr>
																		   
																							<script type="text/javascript">
                                                                                                    <!--
                                                                                                        function anuleazaCont{fisier.id}() {
	                                                                                                        var answer = confirm("Doriti sa anulati traducerea ?")
	                                                                                                        if (answer){
	                                                                                                            window.location = "?L=moderator.conturi_de_plata&anuleaza_traducerea={fisier.id}";
                                                                              	                            }
                                                                                                        }
                                                                                                    //-->
                                                                                                </script>																			   
																		   
																		   
																		   
																		   <tr>
																		       <td bgcolor="#FFFF00" height="25"><b>{statut.fisier}</b></td>
																		   </tr>
																		   <tr><td><bR /></td></tr>
																		   <tr>
																			   <td>
																				   <input type="button" ONCLICK="anuleazaCont{fisier.id}()" value="Anuleaza" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:red; color:yellow"  />																			   </td>
																		   </tr>
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                </LOOP fisiereEditareList>
		                                            </ZONE fisiereEditare enabled>

		                                            <ZONE fisiereEditare empty>
		                                             
										                <br /><BR /><BR />
													       <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment {9220}]</strong></font></center>
										                <br /><BR /><BR />

											        </ZONE fisiereEditare empty>
		                                        </td>
                                            </tr>
                                  </table>
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

</ZONE checkContPlata enabled>


<ZONE checkContPlata guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="theme/default/images/icons/alert/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[Sorry, guests can not upload pictures. {7495}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=registration.register"><b>[Register {305}]</b></a> </td>
      </tr>
   </table>
</ZONe checkContPlata guest>
