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
							   
								 <div class="tabbertab black_text_content">
									
									


											<h2>Edit Dictionary File</h2>
											<br />
											<br />
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											  <tr>
												<td><strong>Language file:</strong> {language} </td>
												<td align="right"></td>
											  </tr>
											</table>
											<br />
											
											<form method="post">
											<table width="100%" border="0" cellspacing="3" cellpadding="0">
											  <LOOP langEdit>
											  <tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											  </tr>
											  <tr>
												<td><strong>Id:</strong> {string.id} 
												<strong>At</strong>: {string.location}</td>
												<td>&nbsp;</td>
											  </tr>
											  <tr>
												<td>Editing {string.newlang}:<br>
												<textarea name="string[{string.id}]" cols="50" rows="3" id="string_{string.id}">{string.langBody}</textarea></td>
												<td>Romanian sample:<br>
												  <textarea name="NULL" cols="50" rows="3" id="NULL" onKeyPress="void(0); return false;">{string.mapBody}</textarea></td>
											  </tr>
											  <tr>
												<td height="1" colspan="2" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
											  </tr>
											  </LOOP langEdit>
											  <tr>
												<td height="30" colspan="2" bgcolor="#CCCCCC" style="padding-left:8px;"><input type="submit" name="Submit" value="Submit"></td>
											  </tr>
											</table>
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







	

