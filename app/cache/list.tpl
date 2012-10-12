<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  10.02.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

  
<ZONE islogin enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>[Companies {5114}]</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<ZONE list enabled>
						<br />
						<div style="border:1px #CCCCCC solid; background:#f5f5f5; padding:8px;">
							<ul>
								<li>[Legatura 1: Compania este de acord cu pretul si nu mai e nevoie de confirmare din partea lor {5116}]</li>
								<li>[Legatura 2: Compania este de acord ca editorul sa nu editeze fisierele companiei date {5117}]</li>
								<li>[Legatura 3: Compania va primi un pret exact pentru numarul de caractere {5118}]</li>
								<li>[Legatura 4: Compania poate face traduceri si sa achite mai tirziu chiar daca nu are bani in avans {5119}]</li>
								<li>[Legatura 5: Compania va primi o reducere permanenta {5120}]</li>
								<li>[Legatura 6: Companiei i se va atribui un traducator {5133}]</li>
								<li>[Legatura 7: Companiei este de acord ca aprobarea sa se faca automat {5191}]</li>
							</ul>
						</div>
						<br />	
 					
						
						<LOOP list>
							<h4>{name} ({person.name}) - <a target="_blank" href="?L=moderator.users.redirection&ghost={cid}&chromeless=1">[Editeaza {5055}]</a></h4>							
							<table bgcolor="#f5f5f5" cellspacing="1" border="0" cellpadding="3" style="width:100%; _width:94%;">
								<tr>
								   <td width="16" class="filesDetails" valign="top"></td>
									<td style="padding-left:5px; background-color:#f5f5f5;">
 										[Legaturi {5049}] | <a href="?L=moderator.companies.list&ld=1&c={cid}&action=addLink">[Adauga {5064}]</a>
									</td>
								</tr>
								{links} 
							</table>
						</LOOP list>										
						<div style="border-top:1px #EFEFEF solid;"></div>
						<br />
					</ZONE list enabled> 
					<ZONE list empty>
						<br /><BR /><BR />
						   <center><font size="2"><strong>[Nu sunt companii. {5115}]</strong></font></center>
						<br /><BR /><BR />
					</ZONE list empty>
 				</div>
			</div>
 		</div>
		<!-- Block LIST -->
		<div class="right-column" style="padding-top:15px;">
			==blocklist==
		</div>
  		<div style="clear:both"></div>
		<!-- /Block LIST -->
	</div><!-- end bd -->
</ZONE islogin enabled>

<ZONE islogin guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">[Sorry, guests can not upload pictures. {5072}]</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=c.registration"><b>[Register {5073}]</b></a> </td>
      </tr>
   </table>
</ZONE islogin guest>


<OBJ linksNone>		
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			[Nu sunt legaturi {5103}]
		</td>
	</tr>
</OBJ linksNone>

<OBJ allFiles>[[Toate {5158}]]</OBJ allFiles>

<OBJ linksOk>	
	<tr>
	   <td width="16" class="filesDetails" valign="top"></td>
		<td style="padding-left:5px; background-color:#ffffff; text-align:center;">
			<table cellpadding="0" cellspacing="0" border="0">
				{links}
			</table>
		</td>
	</tr>
</OBJ linksOk>		

<OBJ linkStr1>[Legatura 1 {5123}]:</OBJ linkStr1>		
<OBJ linkStr2>[Legatura 2 {5124}]:</OBJ linkStr2>		
<OBJ linkStr3>[Legatura 3 {5125}]:</OBJ linkStr3>		
<OBJ linkStr4>[Legatura 4 {5126}]:</OBJ linkStr4>		
<OBJ linkStr5>[Legatura 5 {5127}]:</OBJ linkStr5>		
<OBJ linkStr6>[Legatura 6 {5162}]:</OBJ linkStr6>		
<OBJ linkStr7>[Legatura 7 {5190}]:</OBJ linkStr7>		
<OBJ sms>-[SMS {5163}]-</OBJ sms>		
<OBJ email>-[Email {5164}]-</OBJ email>		
<OBJ linkStr6>[Legatura 6 {5162}]:</OBJ linkStr6>		
<OBJ allTypes><font size="1"> [Toate tipurile de fisiere {5131}]</font></OBJ allTypes>		

