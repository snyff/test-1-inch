<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  02.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

							
	
	
 <script type="text/javascript">	
 
	var hide_empty_list=true;
	addListGroup("languages", "languages");
 	
	<LOOP loopSkills>{skills}</LOOP loopSkills>
	
	<OBJ addList>addList("{default}", "{name}", "", "{id}");</OBJ addList>		
	<OBJ addOption>addOption("{default}", "{name}", "{id}");</OBJ addOption>		
  
</script>
	
	
<form name="languages">
<table align="center"><tr>
<td><select name="from_languages" style="width:180px;"></select></td>
<td><select name="to_languages" style="width:160px;"></select></td>
<td><select name="file_types" style="width:160px;"></select></td>
<td><input type="submit" value="Go" onclick="goListGroup(document.languages.from_languages, document.languages.to_languages, document.languages.file_types)">
 </tr></table>
</form>




