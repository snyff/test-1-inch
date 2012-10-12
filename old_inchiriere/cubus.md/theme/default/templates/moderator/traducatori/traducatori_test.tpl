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
							   
								<!-- lista traducatori -->
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
									
									    <ZONE listaTrad enabled> 

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
									
									        <h2>1.[Lista traducatori {9261}]</h2>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px; padding-top:10px;">
                                                    <tr>
                                                        <td>
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top">
											                            <font class="black_text_content_bold"><b><a href="?L=moderator.traducatori.traducatori_test">Lista simpla</a> | <a href="?L=moderator.traducatori.traducatori_test&list=complet">Lista abilitati</a></b></font>
 										                            </td>
                                                                </tr>
                                                            </table>
						    	                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
														<LOOP tradActivam>
														    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px #CCCCCC solid; padding:5px; margin-top:5px; background-color:#FFFFFF;">
                                                                <tr>
                                                                    <td>
																	    <table cellpadding="0" cellspacing="0" width="100%" border="0">
																		    <tr>
																			    <td>
																					 
																				    &nbsp; <a href="?L=moderator.traducatori.salarii_traducatori&idtrad={id.trad}"><font class="black_text_content_bold"><B># {traducator.id.inc}</B> [Traducator{9263}]: <b>{traducator.nume} {traducator.prenume}</b></font></a>
																			 	</td>
																				<td width="80" align="center"><a href="?L=moderator.traducatori.editor_edit&id_editor={id.trad}"><span style="{editor.active}">Edit editor</span></a></td>
																				<td width="80" align="center"><a href="?L=moderator.traducatori.traducator_edit&id_traducator={id.trad}">Edit traducator</a></td>
																			</tr>
																		</table>
																	    <table cellpadding="0" cellspacing="0" width="99%" border="0">
																			{traducator.listaTestare}
																		</table>
																	</td>
                                                                </tr>          
                                                            </table>
		                                                </LOOP tradActivam>
		                                                </td>
                                                    </tr>
                                                </table>
		                                </ZONE listaTrad enabled>
									
		                                <ZONE listaTrad empty>
		                                
									        <h2>1.[Lista traducatori {9261}]</h2>
										
										    <br /><BR /><BR />
										        <center><font size=2><b>[Lista de traducatori este goala. {9262}]</b></font></center>
										    <br /><BR /><BR />
										
		                                </ZONE listaTrad empty>

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
