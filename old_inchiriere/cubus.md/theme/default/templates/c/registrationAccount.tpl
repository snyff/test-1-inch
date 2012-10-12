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
			<td valign="top" align="center">
 				<div style="background-color:#f5f5f5; padding-left:15px; padding-top:15px; width:450px; ">
					<form method="post" action="?L=c.registration">
						<table cellpadding="1" cellspacing="5" width="100%" border="0">							
							<tr>
								<td><font style="font-size:18px;" color="#052B47">[New Account {1002}]</font></td>
							</tr>
							<tr>
								<td width="160">[Email {1003}]*: </td>
								<td><input name="email" type="text" maxlength="50"  value="" /></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>[Password {1006}]*: </td>
								<td><input name="password" type="password"/></td>
								<td></td>
							</tr>
							<tr>
								<td>[Repeat password {1009}]*: </td>
								<td><input name="passcheck" type="password"/></td>
							</tr>
							<tr>
								<td>[Contact Person {1010}]*: </td>
								<td><input name="contactperson" type="text"/></td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>[Phone {1012}]*: </td>
								<td><input name="phone" type="text"/></td>
								<td>&nbsp;</td>
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
								<td>&nbsp;</td>
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
				</div>
 			</td>
			<td valign="top" align="center" style='border-left:1px solid #C4D6EB;'>
 				<div style="background-color:#f5f5f5; padding-left:15px; padding-top:15px; width:450px; ">
					<form method="post" action="?L=c.account">
						<table cellpadding="1" cellspacing="5" width="100%" border="0">							
							<tr>
								<td><font style="font-size:18px;" color="#052B47">[Cont ... {1023}]</font></td>
							</tr>
							<tr>
								<td width="160">[E-mail {1003}]*:</td>
								<td><input name="email" type="text" id="email" size="15" /></td>
								<td width="40%" rowspan="3" valign="top"></td>
							</tr>
							<tr>
								<td>[Password {1006}]*: </td>
								<td><input name="password" type="password" id="password" size="15" /></td>
								<td></td>
							</tr>
							<tr>
								<td colspan="2" align="center" style="padding-left:5px;padding-top:10px;"> <input name="userlogin" class="btnSubmitYellow" type="submit" id="userlogin" value="[Enter... {1025}]" ></td>
							</tr>
							<tr>
								<td colspan="2" align="center"><a style="font-family:'Trebuchet MS'; font-size:11px;" href="?L=c.registration">[Register {1002}]</a> | <a style="font-family:'Trebuchet MS'; font-size:11px;"  href="?L=c.lostpass">[Lost password {1026}]</a></font></td>
							</tr>
						</table>						 
					</form>
					<br /> 
					<br /> 
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
	
