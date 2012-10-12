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
									
									
									<h2>Languages Settings</h2>
									<p>&nbsp;</p>
									<form metod="get" id="banControlForm">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>{langCount.total} Total  languages in system <br>
										  {langCount.active} Total active languages <br>
										  </strong></td>
										<td align="right" valign="top">
										  </td>
									  </tr>
									</table>
									<br /><br /><br />
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tr>
										<td><strong>Language</strong></td>
										<td><strong>Activated</strong></td>
										<td><strong>Dictionary Size </strong></td>
										<td><strong>Default </strong></td>
										<td><strong>Set Default </strong></td>
										<td><strong>Activate</strong></td>
										<td><strong>Unlink</strong></td>
										<td><strong>Edit</strong></td>
										<td><strong>Edit DB</strong></td>
									  </tr>
									  <tr>
										<td height="1" colspan="8" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  <LOOP languages>
									  <tr id="row_language_{language.id}" onClick="ck('{language.id}');">
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);">{language.id}</td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);">{language.supported}</td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);">{language.size} Kb </td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);">{language.default}</td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);"><a href="?L=moderator.system.languages.languages&default={language.id}">Default</a></td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);"><a href="?L=moderator.system.languages.languages&activate={language.id}">Activate</a></td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);"><a href="?L=moderator.system.languages.languages&unlink={language.id}">Unlink</a></td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);"><a href="?L=moderator.system.languages.edit&id={language.id}">Edit</a></td>
										<td onMouseOver="omov('{language.id}', 1);" onMouseOut="omov('{language.id}', 0);"><a href="#">Edit DB</a></td>
									  </tr>
									  <tr>
										<td height="1" colspan="8" bgcolor="#CCCCCC"><img src="{themePath}/images/frame/spacer.gif" alt="Spacer" height="1" /></td>
									  </tr>
									  </LOOP languages>
									</table>
									</form>
									
									
									
									
									
									
									
									<p><br />
									  <br />
									  <br />
									</p>
									<h2>Add a language </h2>
									<br />
									<br />
									<form method="post" enctype="multipart/form-data">
									<table width="100%" border="0" cellspacing="3" cellpadding="0">
									  <tr>
										<td><strong>Language Name: </strong></td>
										<td><input name="name" type="text" id="name" /></td>
										<td>&nbsp;</td>
										<td><strong>Clone from: </strong></td>
										<td><select name="clone" id="clone">
										  <option>Select a language to clone from </option>
										  <LOOP langDropDown>
											<option value="{language.id}">{language.id}</option>
										  </LOOP langDropDown>
										</select>    </td>
									  </tr>
									  <tr>
										<td><strong>Create from File: </strong></td>
										<td><input type="file" name="file"></td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									  </tr>
									  <tr>
										<td><input name="Submit" type="submit" id="Submit" value="Create" /></td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
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







	
