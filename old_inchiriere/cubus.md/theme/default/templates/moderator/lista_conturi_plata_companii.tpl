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
				
                        <h1 class="m_round_corner_headline">Contabilitate</h1>
				  
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
													{date.de.contact}
													<br /><BR />
						    	                </td>
                                            </tr>
																		<OBJ dateCompanie>		
																		<table cellpadding="5" cellspacing="3" border="0" width="100%">
																		    <tr>
																			    <td width="100"><strong>Companie</strong></td><td>&nbsp;</td>
																			    <td><strong>Nume companie:</strong></td><td>{company.name}</td>
																			   <td><strong>Pers. de contcat:</strong></td><td>{company.pers.contact}</td>
																			</tr>
																			<tr>
																			    <td><strong>Adresa:</strong></td><td>{company.adresa}</td>
																			    <td><strong>Tel:</strong></td><td>{company.tel}</td>
																			    <td><strong>Fax:</strong></td><td>{company.fax}</td>
																			</tr>
																			<tr>
																			    <td><strong>Email:</strong></td><td>{company.email}</td>
																			    <td><strong>Cod fiscal:</strong></td><td>{company.codfiscal}</td>
																			    <td><strong>Cod TVA:</strong></td><td>{company.codtva}</td>
 																			</tr>
																			<tr>
																			    <td><strong>Cod bancar:</strong></td><td>{company.codbancar}</td>
																			    <td><strong>Cont bancar:</strong></td><td>{company.contbancar}</td>
																			    <td><strong>Denumirea bancii:</strong></td><td>{company.denumireabancii}</td>
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
																			                <td width="41%">
																					            <font class="black_text_content_bold">[Cont de plata nr.{9042}]: <b>{contplata.id}</b></font>
																		                        <br />
																	                            <font class="black_text_content_bold">[Suma {9043}]: <b>{contplata.suma}</b></font>
																		                        <br />
																	                            <font class="black_text_content_bold">Data: <b>{contplata.data}</b></font>
																						  </td>
																							<td width="59%" align="right" valign="top"><table cellpadding="0" cellspacing="3" border="0" width="50%" style="margin:5px; padding-left:7px; padding-top:1px; border:0px #cccccc solid; background-color:#ffffff">
                                                                                              <tr>
                                                                                                <td align="center" width="25%"><a href="?L=moderator.contabilitate&statut={cont.contconfirmat.statut}&ch=contconfirmat&id={contplata.id}&company={company.id}"><img src="theme/default/images/modules/moderator.contabilitate/{cont.contconfirmat.img}" style="border:1px #CCCCCC solid; padding:2px;" /></a></td>
                                                                                                <td width="10">&nbsp;</td>
                                                                                                <td align="center" width="25%"><a href="?L=moderator.contabilitate&statut={cont.factura.statut}&ch=factura&id={contplata.id}&company={company.id}"><img src="theme/default/images/modules/moderator.contabilitate/{cont.factura.img}" style="border:1px #CCCCCC solid; padding:2px;" /></a></td>
                                                                                                <td width="10">&nbsp;</td>
                                                                                                <td align="center" width="25%"><a href="?L=moderator.contabilitate&statut={cont.contract.statut}&ch=contract&id={contplata.id}&company={company.id}"><img src="theme/default/images/modules/moderator.contabilitate/{cont.contract.img}" style="border:1px #CCCCCC solid; padding:2px;" /></a></td>
                                                                                                <td width="10">&nbsp;</td>
                                                                                                <td align="center" width="25%"><a href="?L=moderator.contabilitate&statut={cont.act.statut}&ch=act&id={contplata.id}&company={company.id}"><img src="theme/default/images/modules/moderator.contabilitate/{cont.act.img}" style="border:1px #CCCCCC solid; padding:2px;" /></a></td>
                                                                                              </tr>
                                                                                              <tr>
                                                                                                <td align="center"><a href="?L=moderator.contabilitate&statut={cont.contconfirmat.statut}&ch=contconfirmat&id={contplata.id}&company={company.id}">Achitare</a></td>
                                                                                                <td align="center">&nbsp;</td>
                                                                                                <td align="center"><a href="?L=moderator.contabilitate&statut={cont.factura.statut}&ch=factura&id={contplata.id}&company={company.id}">Factura</a></td>
                                                                                                <td align="center">&nbsp;</td>
                                                                                                <td align="center"><a href="?L=moderator.contabilitate&statut={cont.contract.statut}&ch=contract&id={contplata.id}&company={company.id}">Contract</a></td>
                                                                                                <td align="center">&nbsp;</td>
                                                                                                <td align="center"><a href="?L=moderator.contabilitate&statut={cont.act.statut}&ch=act&id={contplata.id}&company={company.id}">Act</a></td>
                                                                                              </tr>
                                                                                          </table></td>
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
																			                <td>&nbsp;</td>
																							<td width="100" align="center">
                                                                                                <form action="" method="post" name="myForm">
                                                                                                    <input type=button value="Cont de Plata" style="border:1px #cccccc solid; width:150px; background-color:#f5f5f5; color:#3969F9"  onclick="openJob('{contplata.id}',680,700)" class="button_edit_del_css"> 
												                                                </form>
																							</td>
																			                <td width="10">&nbsp;</td>
																							<td width="100" align="center">
																							    <form action="?L=moderator.act_download" method="get">
 																							        <input type="hidden" name="L" value="moderator.act_download" />
 																							        <input type="hidden" name="chromeless" value="1" />
 																							        <input type="hidden" name="id_contplata" value="{contplata.id}" />
																									<input type="submit" value="Act de indeplinire"  style="border:1px #cccccc solid; width:150px; background-color:#f5f5f5; color:#3969F9" class="button_edit_del_css"  />
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
