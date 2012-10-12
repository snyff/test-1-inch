<script language="javascript" type="text/javascript">
  function omov(id, over) {
	document.getElementById('row_moderator_' + id).style.backgroundColor = (over?"#F1F3F8":"#FFFFFF");
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
									
									<h2>Moderator Acces</h2>
									<p>&nbsp;</p>
									<form metod="get" id="banControlForm">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>{moder.total} Moderatori Total <br>
										  {moder.active} Moderatori Activi <br>
										  </strong></td>
										<td align="right" valign="top">
										  </td>
									  </tr>
									</table>
									<br /><br /><br />
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>Moderator</strong></td>
										<td><strong>Default </strong></td>
										<td><strong>Activate</strong></td>
										<td><strong>Unlink</strong></td>
										<td><strong>Edit Acces</strong></td>
 									  </tr>
									  <tr>
										<td height="1" colspan="8" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  <LOOP moderator>
									  <tr id="row_moderator_{moderator.id}" onClick="ck('{moderator.id}');">
										<td onMouseOver="omov('{moderator.id}', 1);" onMouseOut="omov('{moderator.id}', 0);">{moderator.username}</td>
										<td onMouseOver="omov('{moderator.id}', 1);" onMouseOut="omov('{moderator.id}', 0);">{moderator.default}</td>
										<td onMouseOver="omov('{moderator.id}', 1);" onMouseOut="omov('{moderator.id}', 0);"><a href="?L=moderator.system.users.acces&activate={moderator.id}">Activate</a></td>
										<td onMouseOver="omov('{moderator.id}', 1);" onMouseOut="omov('{moderator.id}', 0);"><a href="?L=moderator.system.users.acces&unlink={moderator.id}">Unlink</a></td>
										<td onMouseOver="omov('{moderator.id}', 1);" onMouseOut="omov('{moderator.id}', 0);"><a href="?L=moderator.system.users.edit_acces&id={moderator.id}">Edit</a></td>
									  </tr>
									  <tr>
										<td height="1" colspan="8" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  </LOOP moderator>
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







	
