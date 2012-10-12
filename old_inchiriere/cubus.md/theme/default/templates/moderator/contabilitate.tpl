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
																		
									<h2>Lista companii</h2>
 										
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-right:10px; padding-top:10px;">
                                            <tr>
                                                <td>
								                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td valign="top">
											                    <font class="black_text_content_bold"><b>Lista companii</b></font>
 										                    </td>
                                                        </tr>
                                                    </table>
						    	                </td>
                                            </tr>
                                            <tr>
                                                <td>
													
										
													<ZONE dateCompanii enabled>
													    <br />
														<table cellpadding="0" cellspacing="0" border="0" width="100%">
														<LOOP dateCompaniiloop>
														    <tr>
															    <td style="background:#f5f5f5; height:35px; border-top:1px #CCCCCC solid;"><font class="black_text_content_bold"><a href="?L=moderator.lista_conturi_plata_companii&companyid={id.companie}"><strong>{eroare.contconfirmat}</strong> {nume.companie}</a></font></td>
															    <td style="background:#f5f5f5; height:35px; border-top:1px #CCCCCC solid;"><font class="black_text_content_bold"><strong>{eroare.companie}</strong></font></td>
															</tr>
														</LOOP dateCompaniiloop>	
														</table>
														
														<OBJ cp>
														    # {point.companie}.
                                                        </OBJ cp>  																							   
													
														<OBJ newcp>
														    <font color="#FF0000"># {point.companie}.</font>
                                                        </OBJ newcp>  																							   
													
													</ZONE dateCompanii enabled>
													

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
