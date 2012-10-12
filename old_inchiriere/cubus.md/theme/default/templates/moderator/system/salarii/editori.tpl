<script language="javascript" type="text/javascript">
  function omov(id, over) {
	document.getElementById('row_language_' + id).style.backgroundColor = (over?"#F1F3F8":"#FFFFFF");
  }
  
  function checkAll(formID, boolean) {
	var formSet = document.forms[formID].getElementsByTagName('input');
	for (var i=0; i<formSet.length; i++) {
		formSet[i].checked = boolean;
	}
  }
  
  
</script>




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
							   
								 <div class="tabbertab black_text_content">
									
									
									<h2>Salarii editori</h2>
									<p>&nbsp;</p>

									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>Editare %</strong></td>
									  </tr>
									  <tr>
										<td height="1" colspan="1" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  <LOOP traducere>
									  <tr id="row_language_{traducere.id}" onClick="ck('{traducere.id}');">
										<td onMouseOver="omov('{traducere.id}', 1);" onMouseOut="omov('{traducere.id}', 0);">{traducere.id} %</td>
									  </tr>
									  <tr>
										<td height="1" colspan="1" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  </LOOP traducere>
									</table>
 									
									
									
									<p>&nbsp;</p>
 									<br /> 
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>Bonusuri %</strong></td>
										<td><strong>Suma minima</strong></td>
										<td><strong>Suma maxima</strong></td>
									  </tr>
									  <tr>
										<td height="1" colspan="3" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  <LOOP listabon>
									  <tr id="row_language_{bonusuri.id}" onClick="ck('{bonusuri.id}');">
										<td onMouseOver="omov('{bonusuri.id}', 1);" onMouseOut="omov('{bonusuri.id}', 0);">{bonusuri.nume} %</td>
										<td onMouseOver="omov('{bonusuri.id}', 1);" onMouseOut="omov('{bonusuri.id}', 0);">{bonusuri.suma.minim} lei</td>
										<td onMouseOver="omov('{bonusuri.id}', 1);" onMouseOut="omov('{bonusuri.id}', 0);">{bonusuri.suma.maxim} lei</td>
									  </tr>
									  <tr>
										<td height="1" colspan="3" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  </LOOP listabon>
									</table>
 									
									
									
									
									
									<br />
									<form method="post" enctype="multipart/form-data">
									<table width="100%" border="0" cellspacing="3" cellpadding="0">
									  <tr>
										<td><strong>Editare %: </strong>
										<BR>
										<input name="traducere_p" type="text" id="traducere_p" />
										
										<input name="Submit" type="submit" id="Submit" value="Create" /></td>
										<td>&nbsp;</td>
									  </tr>
									</table>
									</form>
									<p>&nbsp;</p>
									
									
		
									
									
									
 									<h2>Adauga bonusuri %</h2>
									<br />
									<form method="post" enctype="multipart/form-data">
									<table width="100%" border="0" cellspacing="3" cellpadding="0">
									  <tr>
										<td><strong>Bonusuri %: </strong> <br>
										<input name="bonus_marime" type="text" id="bonus_marime" /></td>
										<td><strong>Suma minim</strong> <br><input name="sumaminim" type="text" id="sumaminim" /></td>
										<td><strong>Suma maxim</strong> <br> <input name="sumamaxim" type="text" id="sumamaxim" /></td>
										<td><input name="Submit" type="submit" id="Submit" value="Create" /></td>
										<td>&nbsp;</td>
									  </tr>
									</table>
									</form>
									<p>&nbsp;</p>
									
									
		
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







	
