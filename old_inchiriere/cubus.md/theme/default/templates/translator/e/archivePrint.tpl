<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  11.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

<ZONE islogin login>
	<ZONE tabber active>							
		<h2>[Arhiva traduceri {3006}]</h2>
		<ZONE archiveFiles enabled>							
			<table cellpadding="0" cellpadding="0" border="1" width="700">
 				<LOOP archiveFilesList>
					<tr>
						<td>{file.originalName}</td>
						<td><span style="font-weight:normal;">( {file.translateFrom} -> {file.translateTo} ) : {file.type}</span></td>
						<td><div style="float:right; font-weight:normal;">[Pretul {3027}] {file.e.price} | {file.data} {file.e.paySalary}</div></td>
					</tr>
				</LOOP archiveFilesList>
			</table>
				
		</ZONE archiveFiles enabled>
	</ZONE tabber active>	
	<ZONE tabber empty>
		<br /><BR /><BR />
		   <center><font size="2"><strong>[Pentru moment nu sunt fisiere in arhiva. {3026}]</strong></font></center>
		<br /><BR /><BR />
	</ZONE tabber empty>
	
</ZONE islogin login>


