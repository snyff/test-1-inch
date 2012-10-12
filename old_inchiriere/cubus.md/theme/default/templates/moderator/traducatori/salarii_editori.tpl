<ZONE salariiTrad enabled>



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
							   
								<!-- lista stats -->
                                <div class="tabbertab">

									        <h2>Salarii traducatori</h2>
											
								                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td valign="top">
											                            <font class="black_text_content_bold"><b><a href="?L=moderator.salarii_traducatori&idtrad={id.trad}">Fisiere neachitate</a> | <a href="?L=moderator.salarii_traducatori&idtrad={id.trad}&list_files=all">Toate</a></b></font>
 										                            </td>
                                                                </tr>
                                                            </table>
											
											
											<form method="post" action="?L=moderator.salarii_traducatori&idtrad={id.trad}">

  
 											   <LOOP tradList>
 												<table cellpadding="7" cellspacing="4" border="0" width="100%">
																			<tr>
																			    <td width="100"><strong>Date Generale</strong></td><td>&nbsp;</td>
																			    <td>Numele prenume:</td><td>{nume.prenume}</td>
																			</tr>
																			<tr>
																			   <td>Telefon mobil:</td><td>{tel.mobil}</td>
																			   <td>Telefon fix:</td><td>{tel.fix}</td>
																			</tr>
																			<tr>
																			   <td>Seria buletin:</td><td>{seria.buletin}</td>
																			   <td>Cod personal:</td><td>{cod.personal}</td>
																			</tr>
																			<tr>
																			    <td>
 																				</td>
																			</tr>
												</table>
												 {lista.traduceri}		  
		    
		 
    										 </LOOP tradList>
											 
											 <select name="luna_anil" size="10" style="position:fixed; top:200px; width:270px; left:31px;" class="select_css">
											 	<LOOP selectYear>
												<option {select.selected} value="{anul.luna}">{anul.luna.put}</option>
												</LOOP selectYear>
											 </select>										 											 				 
											 
											 
											 <input type="submit" value="Act !!!" style="position:fixed; top:200px; width:150px; right:5px;" class="button_css" />
											 
											
								  </form>
    
</div>

 







</div></div>
           			    
						
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

</ZONE salariiTrad enabled>


<ZONE salariiTrad guest> 
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
</ZONe salariiTrad guest>
