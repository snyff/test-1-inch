<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  23.01.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////

/* CORECT */
-->
	
	<table width='940'  style='' cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td style="padding:20px;" bgcolor="#ffffff" valign="top">
 				<div class="quoteLeft">
 					<h1><font style="font-size:28px;" color="#000000">[Free Instant Quote {1154}]</font></h1>
					<p style="line-height:1.8">[You can have a free instant quote for your translation in seconds and even pay online. {1155}]</p>
				</div>					
 			</td>
			<td valign="top" width='715' align="center" style='border-left:1px solid #C4D6EB;'>
				<br />
				<div style="background-color:#f5f5f5; padding-left:15px; width:646px; ">
					<ZONE regform regformm>						 
						<form method="post">
							<table cellpadding="1" cellspacing="5" width="100%" border="0">							
								<tr>
									<td><font style="font-size:18px;" color="#052B47">[New Account {1002}]</font></td>
								</tr>
								<tr>
									<td width="160">[Email {1003}]*: </td>
									<td><input name="email" type="text" maxlength="50"  value="{user.email}" /></td>
									<td>
										<ZONE error emailClone>
											<font color="#FF0000">[Sorry, that email address is already registered on this website {1004}]</font>
										</ZONE error emailClone>
										<ZONE error email>
											<font color="#FF0000">[Your email address has an error, please make sure you type it correctly. {1005}] </font>
										</ZONE error email>
									</td>
								</tr>
								<tr>
									<td>[Password {1006}]*: </td>
									<td><input name="password" type="password"/></td>
									<td>
										<ZONE passworderror lenghterr> 
											<font color="#FF0000">[The password you entered was too short. Please make sure your password is at least {password_minlen} characters long. {1007}]</font>
										</ZONE passworderror lenghterr>
										<ZONE passworderror nomatch> 
											<font color="#FF0000">[The password you entered does not match the password confirmation, please try again. {1008}] </font>
										</ZONE passworderror nomatch>                  
									</td>
								</tr>
								<tr>
									<td>[Repeat password {1009}]*: </td>
									<td><input name="passcheck" type="password"/></td>
								</tr>
								<tr>
									<td>[Contact Person {1010}]*: </td>
									<td><input name="contactperson" type="text"/></td>
									<td>
										<ZONE contactperson nperror>
											<font color="#FF0000">[Contact Person field id required {1011}]</font>
										</ZONE contactperson nperror>
									</td>
								</tr>
								<tr>
									<td>[Phone {1012}]*: </td>
									<td><input name="phone" type="text"/></td>
									<td>
										<ZONE phone perror>
											<font color="#FF0000">[Phone field id required {1013}]</font>
										</ZONE phone perror>
									</td>
								</tr>
								<tr>
									<td>[Contact type {1014}]*:</td>
									<td>
										<input type="radio" name="user_type" checked="checked" value="1" /> [Business {1015}]
										<!--
										<br />
										<input type="radio" name="user_type" value="2" /> [Private {1016}]
										-->
										<br />
										<ZONE translator enabled>
										<input type="radio" name="user_type" value="3" /> [translator {1124}]
										</ZONE translator enabled>
									</td>
								</tr>
								<tr>
									<td>[Code {1017}]*</td>
									<td>
										<img src="system/writer.php?R=0&amp;T={vcode}&amp;W=100&amp;H=20&amp;FC=16.16.16&amp;BC=16.16.16&amp;D=0&amp;S=1&amp;FS=15&amp;X=15&amp;Y=15" align="absmiddle" />
										<input type="hidden" name="syscode" value="{vcode}" />
										<input name="code" type="text" id="code" size="4" />
									</td>
									<td> 
										<ZONE error code>
											<font color="#FF0000">[The verification code you entered does not match, please try again. {1018}]</font>
										</ZONE error code>
									</td>
								</tr>
								<tr>
									<td></td>
									<td align="left" style="padding-left:5px;padding-top:10px;"><input type="submit" class="btnSubmitYellow"  name="Submit" id="Submit" value="[New Account {1019}]"  /></td>
								</tr>
							</table>						 
						</form>
						<br /> 
						<form method="get">												
							<input style="float:left;" type="submit" class="btnSmallGray resetButton" value="[Back {1020}]"  />
							<input type="hidden" name="L" value="" />
						</form>
						<br /> 
						<br /> 
					</ZONE regform regformm>
					<ZONE regform success>
						<font size="4"><b>[Success! {1021}] </b></font>
						<br /><br />
						<font size="3">[This was a success... Please check your emails. {1022}] </font>
					</ZONE regform success>
				</div>
 			</td>
		</tr>
	</table>
<!--	<table width='940' align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td style='background: url({imgFiles}/ld_gra.jpg) no-repeat left bottom;'><div style='width:8px;height:16px;'></div></td>
			<td style='background: url({imgFiles}/d_gra_p.jpg) repeat-x;' width='100%'><div style='height:16px;'></div></td>
			<td style='background: url({imgFiles}/rd_gra.jpg) no-repeat left bottom;'><div style='width:8px;height:16px;'></div></td>
		</tr>
	</table>-->
	
