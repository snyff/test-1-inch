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
									
									<h2>Acces Moderator Restrictionat</h2>
 									<br /><strong>Lista linkuri accesibile</strong><br /><br />
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>Descriere</strong></td>
										<td><strong>Link</strong></td>
 									  </tr>
									  <tr>
										<td height="1" colspan="2" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  <LOOP links_s>
									  <tr id="row_language_{link.id}" onClick="ck('{link.id}');">
										<td onMouseOver="omov('{link.id}', 1);" onMouseOut="omov('{link.id}', 0);">{link.name}</td>
										<td onMouseOver="omov('{link.id}', 1);" onMouseOut="omov('{link.id}', 0);"><a href="{link.link}">{link.link}</a></td>
 									  </tr>
									  <tr>
										<td height="1" colspan="2" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  </LOOP links_s>
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







	
