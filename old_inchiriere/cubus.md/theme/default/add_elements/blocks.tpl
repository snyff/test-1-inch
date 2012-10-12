<!--
///////////////////////////////////////////////////////////////////////////////////////
// Last modification date:  16.03.2009                                               //
// Version:                 0.3b                                                     //
// (C) 2007-2009                                                                     //
///////////////////////////////////////////////////////////////////////////////////////
-->

{client.data}
{file.data}

<OBJ companyData>	
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Date companie {5170}]</h5>
			<ul class="features">
				<li>[Persoana Juridica {5020}]</li>
			</ul>
			<h5>[Nume companie: {5010}]</h5>
			<ul class="features">
				<li><a target="_blank" href="?L=moderator.users.redirection&ghost={company_id}&chromeless=1">{name}</a></li>
			</ul>
			<h5>[Pers. de contcat: {5011}]</h5>
			<ul class="features">				
				<li>{contact_person}</li>
			</ul>
			<h5>[Date conatct: {5195}]</h5>
			<ul class="features">
				<li>[Adresa: {5012}] {address}</li>
			</ul>
			<ul class="features">
				<li>[Tel: {5013}] {phone}</li>
			</ul>
			<ul class="features">
				<li>[Fax: {5014}] {fax}</li>
			</ul>
			<ul class="features">
				<li>[Email: {5015}] {email}</li>
			</ul>
			<h5>[Contabilitate {5196}]</h5>
			<ul class="features">
				<li>[Cod fiscal: {5016}] {fiscal_code}</li>
			</ul>
			<ul class="features">
				<li>[Cod TVA: {5017}] {vat_code}</li>
			</ul>
			<ul class="features">
				<li>[Cod bancar: {5018}] {bank_code}</li>
			</ul>
			<ul class="features">
				<li>[Denumirea bancii: {5019}] {bank_name}</li>
			</ul>
 		</div>
	</div>
</OBJ companyData>


<OBJ personData>		
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Date persoana {5197}]</h5>
			<ul class="features">
				<li>[Persoana Fizica {5021}]</li>
			</ul>
			<h5>[Nume: {5022}]</h5>
			<ul class="features">
				<li>{name}</li>
			</ul>
			<h5>[Date conatct: {5195}]</h5>
			<ul class="features">
				<li>[Adresa: {5024}] {address}</li>
			</ul>
			<ul class="features">
				<li>[Tel Fix: {5025}] {phone}</li>
			</ul>
			<ul class="features">
				<li>[Tel Mobil: {5026}] {mobil_phone}</li>
			</ul>
			<ul class="features">
				<li>[Cod Personal: {5027}] {personal_code}</li>
			</ul>
			<ul class="features">
				<li>[Email: {5028}] {email}</li>
			</ul>
		</div>
	</div>
</OBJ personData>


<OBJ noCompanyPersonData>		
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Editeaza datele {5170}]</h5>
			[Nu sunt date de contact pentru fisierul respectiv {5194}]			
		</div>
	</div>
</OBJ noCompanyPersonData>




<OBJ fileDetails>		
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Date fisier {5198}]</h5>
			<ul class="features">
				<li>{characters_nr} [caractere {5199}]</li>
				<li>{pages_nr} [pagini {5200}]</li>
				<li>{price_discount} [lei {5044}]</li>
				<li>{description}</li>
			</ul>
		</div>
	</div>
</OBJ fileDetails>




<ZONE mTranslatorsList eaddbonus>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorsList" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="e" value="{editor}" />								
 		<input type="hidden" name="action" value="addBonus" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Bonus {5107}]</h5>
				<ul class="features">
					[Bonus Editor {5109}]: <br />
					<select name="bonus" style="width:150px;">
						<LOOP loopBonus>
							<option value="{id}">{bonus}</option>
						</LOOP loopBonus>
					</select> 	 						 
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList eaddbonus>


<ZONE mTranslatorsList taddbonus>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorsList" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="t" value="{translator}" />								
 		<input type="hidden" name="action" value="addBonus" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Bonus {5107}]</h5>
				<ul class="features">
					[Bonus Traducatori {5108}]: <br />
					<select name="bonus" style="width:150px;">
						<LOOP loopBonus>
							<option value="{id}">{bonus}</option>
						</LOOP loopBonus>
					</select> 	 						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList taddbonus>


<ZONE mTranslatorsList teditability>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorPage" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="t" value="{translator}" />								
		<input type="hidden" name="a" value="{a.abil}" />								
		<input type="hidden" name="action" value="editAbility" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editeaza {5104}]</h5>
				<ul class="features">
					[Traduce din {5092}]: <br />
					{from_language}
 				</ul>
				<ul class="features">
					[in {5093}]: <br />
					{to_language}
 				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					{file_type}
 				</ul>
				<ul class="features">
					[Salariu {5090}]: <br />
					<select name="salary" style="width:150px;">
						<LOOP loopSalary>
							<option {selected} value="{id}">{percent} %</option>
						</LOOP loopSalary>
					</select> 	 						
 				</ul>
				<ul class="features">
					[Statut {5142}]: <br />
					<select name="activ" style="width:150px;">
						<option {selected.activ} value="0">[activ {5143}]</option>
						<option {selected.inactiv} value="1">[inactiv {5144}]</option>
 					</select> 	 						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Editeaza {5076}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList teditability>


<ZONE mTranslatorsList eeditability>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorPage" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="e" value="{editor}" />								
		<input type="hidden" name="a" value="{a.abil}" />								
		<input type="hidden" name="action" value="editAbility" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editeaza {5104}]</h5>
				<ul class="features">
					[Editeaza din {5105}]: <br />
					{from_language}
 				</ul>
				<ul class="features">
					[in {5093}]: <br />
					{to_language}
 				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					{file_type}
 				</ul>
				<ul class="features">
					[Salariu {5090}]: <br />
					<select name="salary" style="width:150px;">
						<LOOP loopSalary>
							<option {selected} value="{id}">{percent} %</option>
						</LOOP loopSalary>
					</select> 	 						
 				</ul>
				<ul class="features">
					[Statut {5142}]: <br />
					<select name="activ" style="width:150px;">
						<option {selected.activ} value="0">[activ {5143}]</option>
						<option {selected.inactiv} value="1">[inactiv {5144}]</option>
 					</select> 	 						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Editeaza {5076}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList eeditability>

 
<ZONE abilList translation>
 	<script type="text/javascript">	
		var hide_empty_list=true;
		addListGroup("languages", "languages");
		
		<LOOP loopSkills>{skills}</LOOP loopSkills>
		
		<OBJ addList>addList("{default}", "{name}", "", "{id}");</OBJ addList>		
		<OBJ addOption>addOption("{default}", "{name}", "{id}");</OBJ addOption>		
	</script>
</ZONE abilList translation>


<ZONE linkList companies>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.companies.list" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="c" value="{company}" />								
		<input type="hidden" name="action" value="addLink" />								
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga legatura {5121}]</h5>
				<ul class="features">
					<li>[Tip legatura {5122}]</li>
				</ul>
				<ul class="features">
					<select name="link" style="width:150px">
						<option value="1">[Lagatura 1 {5123}]</option>
						<option value="2">[Lagatura 2 {5124}]</option>
						<option value="3">[Lagatura 3 {5125}]</option>
						<option value="4">[Lagatura 4 {5126}]</option>
						<option value="5">[Lagatura 5 {5127}]</option>
						<option value="6">[Lagatura 6 {5134}]</option>
						<option value="7">[Lagatura 7 {5190}]</option>
					</select>
				</ul>
				<ul class="features">
					<li>[Pentru limbile {5128}]</li>
				</ul>
				<ul class="features">
					[Fisier din {5129}]: <br />
					<select name="from_languages" style="width:150px;"></select>
				</ul>
				<ul class="features">
					[in {5106}]: <br />
					<select name="to_languages" style="width:150px;"></select>
				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					<select name="file_types" style="width:150px;"></select>
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE linkList companies>


<ZONE mFilesEdit edit>
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.files.editFile" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="unic_id" value="{unic_id}" />								
		<input type="hidden" name="action" value="editFile" />								
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editeaza datele {5165}]</h5>
 				<ul class="features">
					[Fisier din {5129}]: <br />
					<select name="from_languages" style="width:150px;"></select>
				</ul>
				<ul class="features">
					[in {5106}]: <br />
					<select name="to_languages" style="width:150px;"></select>
				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					<select name="file_types" style="width:150px;"></select>
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mFilesEdit edit>


<OBJ noneData>--[indiferent {5130}]--</OBJ noneData>



<ZONE uploadFileBlock enabled>
	<form enctype="multipart/form-data" name="languages" action="?L=c.insertFile&chromeless=1" method="post">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
			<tr>
				<td>
                                    <div class="upload_div_cornered">
					<span style="font-weight: bold; font-family: arial;padding-bottom:3px;display:block;">[File: {1044}]</span>
					<input type="file" name="file" id="file" style="margin-bottom:12px;" size="18"/>
					<span style="font-weight: bold; font-family: arial;padding-bottom:3px;display:block;">[Languages: {1045}]</span>
					<table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
						<td>
							<select name="from_languages" size="8" style="width:119px"></select>
						</td>
						<td width="22" style="text-align:center">
							 &raquo;
						</td>
						<td>
							<select name="to_languages" size="8" style="width:119px"></select>
						</td>
					</table>
					<span style="font-weight: bold; font-family: arial;padding-bottom:3px;display:block;">[File type: {1046}]</span>
					<select name="file_types" style="margin-bottom:12px; width:256px;"></select> <br />
					<span style="font-weight: bold; font-family: arial;padding-bottom:3px;display:block;">[Description: {1047}]</span>
					<textarea name="description" rows="2" style="width:256px;" id="description"></textarea>
                                        <div style="text-align: center; margin-top: 20px;">
                                            <input name="Submit" class="red_button" type="submit" id="Submit" value="[Upload... {1048}]" />
                                        </div>
                                        <div style="text-align: center; margin-top: 20px;font-family:arial;font-size:11px;font-weight:bold;;">
                                            [Traducerile sunt efectuate de catre traducatori autorizati. {1156}]
                                        </div>
                                    </div>
 			</tr>
		</table>
	</form>
</ZONE uploadFileBlock enabled>

<ZONE contactData enabled>
	<h3 style="color:#1175C0; text-align:left">[Ne gasiti. {7000}]</h3>		
	[str. Banulescu-Bodoni 59, {7001}]
	<br>
	[Chisinau MD-2005 {7002}]
	<br />
	[Tel./Fax {7003}]: +373 22 925090
	<br />
	[Tel./Fax {7004}]: +373 22 402862 
	<br>
	[Skype {7005}]:<a href="skype:cubus.md?call"><img src="http://company.cubus.md/theme/default/images/skype/chat_blue_transparent_97x23.png" border="0" /></a>
	<br />
	
	<!--
	Y! Mess:<a target="_blank" href="http://messenger.yahoo.com/edit/send/?.target=cubus_md"><img border="0" src="http://opi.yahoo.com/yahooonline/u=cubus_md/m=g/t=1/l=us/opi.jpg"></a>
	<br />
	-->
	[mob {7006}].: +373 68640001
	<br />
	<a href="http://www.cubus.md"><font color="blue">www.cubus.md</font></a>, <br />
	
	<script language="javascript">
		var part1 = "info";
		var part2 = "cubus.md";
		var part3 = "Click Here to Send";
		document.write('<a href="mai' + 'lto:' + part1 + '@' + part2 + '"><font color=blue>');
		document.write(part1 + '@' + part2 + '</font></a>');
	</script>
</ZONE contactData enabled>



<ZONE countPrice count>
	<form name="languages" method="get">
		<input type="hidden" name="L" value="c.calcPrice" />
		<input type="hidden" name="ld" value="1" />
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 12px 0px 12px;">
			<tr>
				<td>
					[Numarul de pagini: {1152}]*: <br /> 
					<input type="input" name="pages" size="30"/>  <br />
					<font size="1">[1 pagina = 1800 caractere (fara spatii) {1157}]</font>
					<br />
 					<br />
					[nume prenume: {1010}]: <br />
					<input type="input" name="name" size="30"/>  <br />
					[Telefon {1012}]: <br />
					<input type="input" name="phone" size="30"/>  <br />
					[Email {1024}] <br />
					<input type="input" name="email" size="30"/>  <br /><br />


					[Languages: {1045}]
					<table cellpadding="0" cellspacing="0" border="0" style="margin-bottom:12px;">
						<td>
							<select name="from_languages" size="8" style="width:102px"></select>
						</td>
						<td width="22" style="text-align:center">
							 &raquo;
						</td>
						<td>
							<select name="to_languages" size="8" style="width:102px"></select>
						</td>
					</table>
					[File type: {1046}] <br /> 
					<select name="file_types" style="margin-bottom:12px; width:190px;"></select>  
				</td>
			</tr>																				
			<tr>
				<td style="padding-top:10px;" align="center">
					<input name="Submit" class="btnSubmitYellow" type="submit" id="Submit" value="[Upload... {1153}]" />
				</td>
			</tr>
		</table>
	</form>
</ZONE countPrice count>


<ZONE mTranslatorsList taddabil>	
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorPage" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="t" value="{translator}" />								
		<input type="hidden" name="action" value="addAbility" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Abilitati {5091}]</h5>
				<ul class="features">
					[Traduce din {5092}]: <br />
					<select name="from_languages" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[in {5093}]: <br />
					<select name="to_languages" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					<select name="file_types[]" multiple="multiple" size="3" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[Salariu {5090}]: <br />
					<select name="salary" style="width:150px;">
						<LOOP loopSalary>
							<option value="{id}">{percent} %</option>
						</LOOP loopSalary>
					</select> 	 						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList taddabil>

 
<ZONE mTranslatorsList eaddabil>	
	<form method="get" name="languages">
		<input type="hidden" name="L" value="moderator.translators.translatorPage" />
		<input type="hidden" name="chromeless" value="1" />								
		<input type="hidden" name="e" value="{editor}" />								
		<input type="hidden" name="action" value="addAbility" />								
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Abilitati {5091}]</h5>
				<ul class="features">
					[Editeaza din {5105}]: <br />
					<select name="from_languages" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[in {5106}]: <br />
					<select name="to_languages" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[Tipul textului {5094}]: <br />
					<select name="file_types[]" multiple="multiple" size="3" style="width:150px;"></select>
 				</ul>
				<ul class="features">
					[Salariu {5090}]: <br />
					<select name="salary" style="width:150px;">
						<LOOP loopSalary>
							<option value="{id}">{percent} %</option>
						</LOOP loopSalary>
					</select> 	 						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]">
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsList eaddabil>

 
<ZONE mEditorsSalary salary>
 	<form method="post" action="?L=moderator.translators.editorsSalary&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Bonus {5088}]</h5>
				<ul class="features">
					[Salariu {5090}] %: <br />
					<input type="text" name="percent" style="width:80%"/> %						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mEditorsSalary salary>
 

<ZONE mCompaniesDiscount discount>
 	<form method="post" action="?L=moderator.companies.discount&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga reducere {5136}]</h5>
				<ul class="features">
					[Reducere {5137}] %: <br />
					<input type="text" name="discount" style="width:80%"/> %						
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mCompaniesDiscount discount>


<ZONE mCompaniesDiscount add>
	<form method="post" action="?L=moderator.companies.list&action=addDiscount&c={company}&ft={ft}&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editeaza Pret {5095}]</h5>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					{from_language}
					&raquo;
					{to_language}
				</ul>
				<ul class="features">
					<li>[Tipul textului {5094}]:</li>
				</ul>
				<ul class="features">
					{file_type.name}
 				</ul>
				<ul class="features">
					<li>[Reducere {5137}]:</li>
				</ul>
				<ul class="features">
					<select name="discount" style="width:95px">
						<LOOP loopDiscount>
						<option value="{discount.id}">{discount} %</option>
						</LOOP loopDiscount>
					</select>
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mCompaniesDiscount add>


<ZONE mCompaniesTranslator add>
	<form method="post" action="?L=moderator.companies.list&action=addTranslator&c={company}&ft={ft}&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Legatura Traducator {5159}]</h5>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					{from_language}
					&raquo;
					{to_language}
				</ul>
				<ul class="features">
					<li>[Tipul textului {5094}]:</li>
				</ul>
				<ul class="features">
					{file_type.name}
 				</ul>
				<ul class="features">
					<li>[Traducator {5160}]:</li>
				</ul>
				<ul class="features">
					<select name="translator" style="width:140px">
						<LOOP loopTranslator>
						<option value="{translator.id}">{translator}</option>
						</LOOP loopTranslator>
					</select>
 				</ul>
				<ul class="features">
					<li>[Alerte {5161}]:</li>
				</ul>
				<ul class="features">
					<input type="checkbox" name="email" value="1" /> Email <br />
					<input type="checkbox" name="sms" value="1" /> SMS
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mCompaniesTranslator add>


<ZONE mEditorsSalaryBonus bonus>
 	<form method="post" action="?L=moderator.translators.editorsSalary&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Bonus {5088}]</h5>
				<ul class="features">
					[Bonus {5087}] %:
					<input type="text" name="bonus" style="width:80%"/>	%					
					[Suma minima {5085}]:
					<input type="text" name="min" />
 					[Suma maxima {5086}]:
 					<input type="text" name="max" />	
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mEditorsSalaryBonus bonus>


<ZONE mTranslatorsSalary salary>
 	<form method="post" action="?L=moderator.translators.translatorsSalary&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Salariu {5089}]</h5>
				<ul class="features">
					[Salariu {5090}] %: 
					<input type="text" name="percent" style="width:80%"/> %				
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsSalary salary>


<ZONE mTranslatorsSalaryBonus bonus>
 	<form method="post" action="?L=moderator.translators.translatorsSalary&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga Bonus {5088}]</h5>
				<ul class="features">
					[Bonus {5087}] %:
					<input type="text" name="bonus" style="width:80%"/>	%					
					[Suma minima {5085}]:
					<input type="text" name="min" />
 					[Suma maxima {5086}]:
 					<input type="text" name="max" />	
 				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslatorsSalaryBonus bonus>

<ZONE mTranslationsRates newPrice>
 	<form method="post" action="?L=moderator.translations.rates&chromeless=1">
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Adauga pret {5061}]</h5>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					<select name="from_language" style="width:65px">
						<LOOP selectLanguagesFrom>
						<option value="{language.id}" {language.selected}>{language.name}</option>
						</LOOP selectLanguagesFrom>
					</select>
					&raquo;
					<select name="to_language" style="width:65px">
						<LOOP selectLanguagesTo>
						<option value="{language.id}" {language.selected}>{language.name}</option>
						</LOOP selectLanguagesTo>
					</select>
				</ul>
				<ul class="features">
					<li>[Price {5067}]:</li>
				</ul>
				<ul class="features">
					<LOOP selectFileType>
						{file_type.name} 
						<input type="text" name="fileType[{file_type.id}]" value="" />											
					</LOOP selectFileType>
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[Adauga {5064}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslationsRates newPrice>


<ZONE mTranslationsRates editPrice>
	<form method="post" action="?L=moderator.translations.rates&chromeless=1">
 		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editeaza Pret {5095}]</h5>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					{from_language}
					&raquo;
					{to_language}
				</ul>
				<ul class="features">
					<li>[Price {5067}]:</li>
				</ul>
				<ul class="features">
					<LOOP selectFileType>
						{file_type.name}
						<input type="text" name="fileTypePrice" value="{price}" />	
						<input type="hidden" name="edit" value="{id}" />									
					</LOOP selectFileType>
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE mTranslationsRates editPrice>


<ZONE fileDataRightBlock enabled>
	<form method="post" name="form" action="?L=moderator.files.accountsPayment&chromeless=1&unic_id={unic_id}&action=editFileAccountPayment">
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editare fisier {5132}]</h5>
				<ul class="features">
					<li>[Traducator {5048}]</li>
				</ul>
				<ul class="features">
					<select name="translator" style="width:140px">
						<LOOP loopFTranslator>
						<option {selected} value="{translator.id}">{translator}</option>
						</LOOP loopFTranslator>
					</select>
				</ul>
				<ul class="features">
					<li>[Deadline {5168}]</li>
				</ul>
				<ul class="features">
					<input type="text" size="15" id="deadline" value="{deadline}" readonly name="deadline"> <input type="button" value="[D {5181}]" onclick="displayCalendar(form.deadline,'yyyy/mm/dd hh:ii',this,true)">
				</ul>
				<ul class="features">
					<li>[Reducere {5166}]</li>
				</ul>
				<ul class="features">
					{discount} %
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE fileDataRightBlock enabled>

 
<ZONE translateFileTools selectlanguage>
	<form method="post" action="?L=moderator.files.accountsPayment&unic_id={unic_id}&action=translateFileSelectTranslator&sub_action={sub_action}&filePartUnicID={filePartUnicID}">
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editare fisier {5132}]</h5>
				<ZONE translatePartFileName enabled>
					<ul class="features">
						<li>[Nume Fisier {5176}]</li>
					</ul>
					<ul class="features">
						{partFile.name}
					</ul>
				</ZONE translatePartFileName enabled>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					<select name="from_language" style="width:65px">
 						<option value="{fromLanguage.id}">{fromLanguage.name}</option>
 					</select>
					&raquo;
					<select name="type_file" style="width:65px">
						<LOOP selectLanguagesTo>
						<option value="{language.id}" {language.selected}>{language.name}</option>
						</LOOP selectLanguagesTo>
					</select>
				</ul>
				<ul class="features">
					<li>[Reducere {5166}]</li>
				</ul>
				<ul class="features">
					{discount} %
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br />
			</div>
		</div> 
	</form>
</ZONE translateFileTools selectlanguage>

<ZONE translateOneFileTools confirm>
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Editare fisier {5132}]</h5>
			<ul class="features">
				<li>[Doriti sa mai adaugati inca o parte a traducerii {5177}]</li>
			</ul>
			<br />
			<ul style="text-align:center" class="features">
				<table cellpadding="0" cellspacing="0" border="0">
					<td>
						<form method="get">
							<input type="hidden" name="L" value="moderator.files.accountsPayment" />
							<input type="hidden" name="unic_id" value="{unic_id}" />
							<input type="hidden" name="sub_action" value="addNewFile" />
							<input type="hidden" name="action" value="translateFileTools" />
							<input type="submit" value="[Da {5178}]" />
						</form>
					</td>
					<td>&nbsp;&nbsp;</td>
					<td>
						<form method="get">
							<input type="hidden" name="L" value="moderator.files.accountsPayment" />
  							<input type="submit" value="[Nu {5179}]" />
						</form>
					</td>
				</table>
 			</ul>
			<br />
		</div>
	</div> 
</ZONE translateOneFileTools confirm>


<ZONE editFilePartData edit>
	<form method="post" name="form" action="?L=moderator.files.accountsPayment&unic_id={unic_id}&action=editFilePart&filePartUnicID={filePartUnicID}&chromeless=1">
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editare fisier {5132}]</h5>
				<ul class="features">
					<li>[Nume Fisier {5176}]</li>
				</ul>
				<ul class="features"> 
					{partFile.name} 
				</ul>
 				<ul class="features">
					<li>[Traducere din in {5065}]</li> 
				</ul>
				<ul class="features">
					{fromLanguage.name}
					&raquo;
					{toLanguage.name}
				</ul>
				<ZONE editFilePartNrCar nrcaracters>
					<ul class="features">
						<li>[Numarul de caractere {5030}]</li>
					</ul>
					<ul class="features">
						<input type="text" name="characters_nr" />
					</ul>
				</ZONE editFilePartNrCar nrcaracters>
				<ul class="features">
					<li>[Traducator {5048}]</li>
				</ul>
				<ul class="features">
					<select name="translator" style="width:140px">
						<LOOP loopFTranslator>
						<option {selected} value="{translator.id}">{translator}</option>
						</LOOP loopFTranslator>
					</select>
				</ul>
				<ul class="features">
					<li>[Deadline {5168}]</li>
				</ul>
				<ul class="features">
					<input type="text" size="15" id="deadline" value="{deadline}" readonly name="deadline"> <input type="button" value="[D {5181}]" onclick="displayCalendar(form.deadline,'yyyy/mm/dd hh:ii',this,true)">
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br /> 
			</div>
		</div> 
	</form>
</ZONE editFilePartData edit>


<ZONE selectEditor activateEditor>
	<form method="post" name="form" action="?L=moderator.files.accountsPayment&unic_id={unic_id}&filePartUnicID={filePartUnicID}&action=selectEditor&chromeless=1">
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editare fisier {5132}]</h5>
				<ul class="features">
					<li>[Nume Fisier {5176}]</li>
				</ul>
				<ul class="features"> 
					<input size="20" readonly="readonly" value="{editFile.name}" />
				</ul>
 				<ul class="features">
					<li>[Traducere din in {5065}]</li> 
				</ul>
				<ul class="features">
					{fromLanguage.name}
					&raquo;
					{toLanguage.name}
				</ul>
				<ul class="features">
					<li>[Editor {5184}]</li>
				</ul>
				<ul class="features">
					<select name="editor" style="width:140px">
						<LOOP loopFEditor>
							<option {selected} value="{editor.id}">{editor}</option>
						</LOOP loopFEditor>
					</select>
				</ul>
				<ul class="features">
					<li>[Deadline {5168}]</li>
				</ul>
				<ul class="features">
					<input type="text" size="15" id="deadline" value="{deadline}" readonly name="deadline"> <input type="button" value="[D {5181}]" onclick="displayCalendar(form.deadline,'yyyy/mm/dd hh:ii',this,true)">
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" value="[+Editeaza {5076}]" />
				</ul>
				<br /> 
			</div>
		</div> 
	</form>
</ZONE selectEditor activateEditor>


<ZONE translateFileSelectTranslator selecttranslator>
	<form enctype="multipart/form-data" name="form" method="post" name="form" action="?L=moderator.files.accountsPayment&chromeless=1&unic_id={unic_id}&action=translateFileSelectTranslator&sub_action={sub_action}&filePartUnicID={filePartUnicID}">
		<input type="hidden" name="type_file" value="{file_type}" />
		<div class="side-box">
			<div class="side-box-inner">
				<h5>[Editare fisier {5132}]</h5>
				<ZONE translatePartFile enabled>
					<ul class="features">
						<li>[Nume Fisier {5176}]</li>
					</ul>
					<ul class="features">
						{partFile.name}
					</ul>
				</ZONE translatePartFile enabled>
				<ul class="features">
					<li>[Traducere din in {5065}]</li>
				</ul>
				<ul class="features">
					{from_language}
					&raquo;
					{to_language}
				</ul>
				<ul class="features">
					<li>[Tipul textului {5094}]:</li>
				</ul>
				<ul class="features">
					{file_type.name}
 				</ul>
				<ZONE translatePartFile upload>
					<ul class="features">
						<li>[Part file {5175}]</li>
					</ul>
					<ul class="features">
						<input type="file" size="10" name="file" id="file" />
					</ul>
				</ZONE translatePartFile upload>
				<ul class="features">
					<li>[Traducator {5048}]</li>
				</ul>
				<ul class="features">
					<select name="translator" style="width:140px">
						<LOOP loopFTranslator>
						<option {selected} value="{translator.id}">{translator}</option>
						</LOOP loopFTranslator>
					</select>
				</ul>
				<ul class="features">
					<li>[Deadline {5168}]</li>
				</ul>
				<ul class="features">
					<input type="text" size="15" id="deadline" value="{deadline}" readonly name="deadline"> <input type="button" value="[D {5181}]" onclick="displayCalendar(form.deadline,'yyyy/mm/dd hh:ii',this,true)">
				</ul>
				<ul class="features">
					<li>[Reducere {5166}]</li>
				</ul>
				<ul class="features">
					{discount} %
				</ul>
				<br />
				<ul style="text-align:center" class="features">
					<input type="submit" name="Submit" value="[+Editeaza {5076}]" />
				</ul>
				<br />
			</div>
		</div>
	</form>
</ZONE translateFileSelectTranslator selecttranslator>


<ZONE moderatorRightBlock enabled>
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Conturi de plata, Fisiere {5036}]</h5>
			<ul class="features">
				<li><a href="?L=moderator.files.filesList">[Lista Fisiere {5037}]</a></li>
				<li><a href="?L=moderator.files.accountsPayment">[Conturi de plata {5038}]</a></li>
			</ul>
			<h5>[Traducatori {5050}]</h5>
			<ul class="features">
				<li><a href="?L=moderator.translators.translatorsList">[Traducatori {5050}]</a></li>
				<li><a href="?L=moderator.translators.translatorsTests">[Teste Traducatori {5110}]</a></li>
				<li><a href="?L=moderator.translators.editorsTests">[Teste Editori {5147}]</a></li>
				<li><a href="?L=moderator.translators.translatorsSalary">[Salarii Traducatori {5079}]</a></li>
				<li><a href="?L=moderator.translators.editorsSalary">[Salarii Editori {5080}]</a></li>
			</ul>
			<h5>[Companies {5114}]</h5>
			<ul class="features">
				<li><a href="?L=moderator.companies.list">[Companies {5114}]</a></li>
				<li><a href="?L=moderator.companies.discount">[Company Discount {5135}]</a></li>
			</ul>
			<h5>[Limbi {5057}]</h5>
			<ul class="features">
				<li><a href="?L=moderator.translations.languages">[Limbi {5058}]</a></li>
				<li><a href="?L=moderator.translations.fileTypes">[Tip fisier {5069}]</a></li>
				<li><a href="?L=moderator.translations.rates">[Pret {5059}]</a></li>
			</ul>
			<h5>Contabilitate</h5>
			<ul class="features">
				<li><a href="?L=moderator.files.conturi_de_plata">Contabilitate</a></li>
			</ul>
		</div>
	</div>
</ZONE moderatorRightBlock enabled>


<ZONE translatorRightBlock enabled>
	<div class="side-box">
		<div class="side-box-inner">
			<h5>[Unelte {3001}]</h5>
			<ul class="features">
				<li><a href="?L=translator.editProfile">[Editeaza datele {3033}]</a></li>
			</ul>
			<ul class="features">
				<ZONE tfiles tests>
					<li><a href="?L=translator.t.tests"><font color="#FF0000">[Teste Traducator {3000}] ({new.ttests})</font></a></li>
				</ZONE tfiles tests>
				<ZONE efiles tests>
					<li><a href="?L=translator.e.tests"><font color="#FF0000">[Teste Editor {3009}] ({new.etests})</font></a></li>
				</ZONE efiles tests>
			</ul>
			<div style="height:8px;"></div>
			<ul class="features">
				<ZONE fToTranslate new> 
					<li><a href="?L=translator.files">[Fisiere la traducere {3012}] ({new.for.translate})</font></a></li>
				</ZONE fToTranslate new>
				<ZONE fToEdit new>
					<li><a href="?L=translator.files">[Fisiere la editare {3013}] ({new.for.edit})</font></a></li>
				</ZONE fToEdit new>
 			</ul>
			<div style="height:8px;"></div>
			<ul class="features">
				<li><a href="?L=translator.t.archive">[Arhiva traduceri {3006}]</font></a></li>
				<li><a href="?L=translator.e.archive">[Arhiva editari {3007}]</font></a></li>
 			</ul>
			<div style="height:8px;"></div>
			<ul class="features">
				<li><a href="?L=translator.t.skills">[Abilitati traduceri {3023}]</font></a></li>
				<li><a href="?L=translator.e.skills">[Abilitati editari {3024}]</font></a></li>
 			</ul>
		</div>
	</div>
</ZONE translatorRightBlock enabled>


<ZONE tRightBlock back>
	<div class="side-box">
		<div class="side-box-inner">
			<a href="?L=translator.files">&laquo; [inapoi {3014}]</a>
 		</div>
	</div>
</ZONE tRightBlock back>

