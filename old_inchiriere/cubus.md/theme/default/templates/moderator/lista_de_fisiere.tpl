<ZONE uploadPicture enabled>
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
				
                        <h1 class="m_round_corner_headline">[Lista fisiere {9038}]</h1>
				  
				        <span class="m_xtop">
					        <span class="m_xb1"></span>
						    <span class="m_xb2"></span>
						    <span class="m_xb3"></span>
						    <span class="m_xb4"></span>
					    </span>
				    					
					    <div class="m_round_corner_content" style="padding: 10px; background-color:#f5f5f5;">
 
                            <div class="tabber">
                                <div class="tabbertab">
																		
									    <h2>[Lista fisiere {9038}]</h2>
									     
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
													<div id="lista_documente">
													
													<ZONE fisiereNeAprobate enabled>
		                                                <LOOP fisiereNeAprobateList>

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
																		   <td align="right" style="color:#FF0000">&nbsp;</td>
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
																		      <td>&nbsp;<br><font size="2">{fisier.description}</font></td>
																			</tr>
																		</table>
																		
																		{date.de.contact}
																		
																	    <table cellpadding="5" cellspacing="3" border="0" width="100%">
																		    <tr>
																			    <td align="right">
																					<script type="text/javascript">
                                                                                        <!--
                                                                                        function deleteConfirmation26() {
	                                                                                        var answer = confirm("[Doriti sa stergeti acest fisier ? {9173}]")
	                                                                                        if (answer){
	                                                                                            window.location = "?L=moderator.lista_de_fisiere&delete_file={fisier.id}";
                                                                              	            }
                                                                                        }
                                                                                        //-->
                                                                                    </script>
																					
																					
																					<input type="button" value="[sterge {9056}]" ONCLICK="deleteConfirmation26()"   class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#FF0F15"  />
																				</td>
																			</tr>
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
																				   </form>
																			   </td>
																		   </tr>
																		   
																		   <form method="get">
																		   <tr>
																		       <td>
																			       <input type="hidden" name="L" value="moderator.lista_de_fisiere" />
																			       <input type="hidden" name="file_name" value="{fisier.namestart}" />
																				   <input type="text" name="file_value" class="button_edit_del_css" style="border:1px #cccccc solid; background-color:#f5f5f5;" />
																			   </td>
																		   </tr>
																		  
																		  <!--
																		   <tr>
																			   <td>
																					<select name="traducator">
																					    <option>-</option>
																						{data.traducator}
																					</select>
																			   </td>
																		   </tr>
																		  -->
																		  
																		   <tr>
																			   <td>
																				   <input type="submit" value="[Editeaza {9040}]" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#009900"  />
																			   </td>
																		   </tr>
																		   </form>
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                </LOOP fisiereNeAprobateList>
		                                            </ZONE fisiereNeAprobate enabled>
													
		                                            <ZONE fisiereNeAprobate empty>
		                                             
										                <br /><BR /><BR />
													       <center><font size="2"><strong>[You have to upload pictures before you can use this tool {9219}]</strong></font></center>
										                <br /><BR /><BR />
												  
												    </ZONE fisiereNeAprobate empty>
													
													</div>
		                                        </td>
                                            </tr>
                                        </table>
 	                            </div>
                                <div class="tabbertab">
																		
									<h2>[Lista fisiere recente {9041}]</h2>
									     
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
                                                    <ZONE fisiereAprobate enabled>
		                                                <LOOP fisiereAprobateList>


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
																		            
																		<OBJ dateCompanie>		
																		<table cellpadding="0" cellspacing="0" border="0" width="380" style="padding-top:10px;">
																		    <tr>
																			    <td width="100">Tip persoana:</td><td>{company.statut}</td>
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
																		<table cellpadding="0" cellspacing="0" border="0" width="380" style="padding-top:10px;">
																		    <tr>
																			    <td width="100">Tip persoana:</td><td>{pers.statut}</td>
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
																				   </form>
																			   </td>
																		   </tr>
																		   
																			<script type="text/javascript">
																				<!--
																					function stergeFisier{fisier.id}() {
																						var answer = confirm("Doriti sa anulati traducerea ?")
																						if (answer){
																							window.location = "?L=moderator.lista_de_fisiere&sterge_fisierul={fisier.id}";
																						}
																					}
																				//-->
																			</script>																			   

																		   
																		   <form method="get">
																		   <tr>
																		       <td>
																			       <input type="hidden" name="L" value="moderator.lista_de_fisiere" />
																			       <input type="hidden" name="file_name_recent" value="{fisier.namestart}" />
																				   <input type="text" name="file_value_recent" class="button_edit_del_css" style="border:1px #cccccc solid; background-color:#f5f5f5;" />
																			   </td>
																		   </tr>
																		   <tr>
																			   <td>
																				   <input type="submit" value="[Editeaza {9040}]" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#009900"  />
																			   </td>
																		   </tr>
																		   </form>

																		   <tr><td><input type="button" ONCLICK="stergeFisier{fisier.id}()" value="Sterge" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:red; color:yellow"  /></td></tr>
																		
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                </LOOP fisiereAprobateList>

		                                            </ZONE fisiereAprobate enabled>

		                                            <ZONE fisiereAprobate empty>
		                                             
										                <br /><BR /><BR />
													       <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment {9220}]</strong></font></center>
										                <br /><BR /><BR />

											        </ZONE fisiereAprobate empty>
		                                        </td>
                                            </tr>
                                  </table>
 	                            </div>
                                <div class="tabbertab">
																		
									<h2>[fisiere respinse {9301}]</h2>
									     
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
                                                    <ZONE fisiereRespinse enabled>
		                                                <LOOP fisiereRespinseList>


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
																		   <td align="right" style="color:#FF0000">&nbsp;</td>
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
																					
																		             <table cellpadding="0" cellspacing="0" border="0" width="380" style="padding-top:10px;">
																		                <tr>
																			                <td  style="border:1px #CCCCCC solid; padding:4px;" bgcolor="#FFFF00"><font color="red" size="1">&nbsp;&nbsp;<strong>[Fisier in curs de stergere. {9302}]</strong>: {timp.ore}:{timp.minute}</font> </td>
																			            </tr>
																		             </table>
																					
																		             {date.de.contact}

																				</td>
																			</tr>
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
																				   </form>
																			   </td>
																		   </tr>
																		   
																		   <form method="post">
																		   <tr>
																		       <td>
																			       <input type="hidden" name="id_file" value="{fisier.id}" />
																				   <input type="text" name="value_file" class="button_edit_del_css" style="border:1px #cccccc solid; background-color:#f5f5f5;" />
																			   </td>
																		   </tr>
																		   <tr>
																			   <td>
																				   <input type="submit" value="[Editeaza {9040}]" class="button_edit_del_css"  style="border:1px #cccccc solid; background-color:#f5f5f5; color:#009900"  />
																			   </td>
																		   </tr>
																		   </form>
																		</table>
																	</td>
                                                                </tr>  
                                                            </table>
		                                                </LOOP fisiereRespinseList>
		                                            </ZONE fisiereRespinse enabled>

		                                            <ZONE fisiereRespinse empty>
		                                             
										                <br /><BR /><BR />
													       <center><font size="2"><strong>[Nu aveti fisiere moderate pina in acest moment {9220}]</strong></font></center>
										                <br /><BR /><BR />

											        </ZONE fisiereRespinse empty>
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

</ZONE uploadPicture enabled>


<ZONE uploadPicture guest> 
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
</ZONe uploadPicture guest>
