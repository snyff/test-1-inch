<ZONE contDePlataModul enabled>
	<div id="bd">
		<div id="store" class="left-column">
			<h3>
				<div style="float:right;font-size:11px;">
					<a href="{siteURL}/?L=moderator.files.conturi_de_plata">Reload Page</a> 
				</div>
				Conturi de plata
			</h3>
			<div class="big-box">
				<div class="big-box-inner">
					<div class="tabber">
						<div class="tabbertab">
							<h2>Conturi de plata</h2>
							<div id="files0InjectObject"> 	
								<ZONE fisiereNeAprobate enabled>
									<br />
									<LOOP fisiereNeAprobateList>
										{lista.conturi.de.plata}
									</LOOP fisiereNeAprobateList>
									<div style="border-top:1px #EFEFEF solid;"></div>
								</ZONE fisiereNeAprobate enabled>
								<ZONE fisiereNeAprobate empty>
									<br /><BR /><BR />
									   <center><font size="2"><strong>Nu sunt conturi de plata.</strong></font></center>
									<br /><BR /><BR />
								</ZONE fisiereNeAprobate empty>
							</div>
						</div>
						<div class="tabbertab">
							<h2>Fisiere la traducere</h2>
							<div id="files1InjectObject"> 	
								<ZONE fisiereAprobate enabled>
									<br />
									<LOOP fisiereAprobateList>
										{lista.fisiere}
									</LOOP fisiereAprobateList>
									<div style="border-top:1px #EFEFEF solid;"></div>
								</ZONE fisiereAprobate enabled>
								<ZONE fisiereAprobate empty>
									<br /><BR /><BR />
									   <center><font size="2"><strong>Nu aveti fisiere moderate pina in acest moment.</strong></font></center>
									<br /><BR /><BR />
								</ZONE fisiereAprobate empty>
							</div>
						</div>
						<div class="tabbertab">
							<h2>Fisiere la editare</h2>
							<div id="files2InjectObject"> 	
								<ZONE fisiereRespinse enabled>
									<br />
									<LOOP fisiereRespinseList>
										{lista.fisiere}
									</LOOP fisiereRespinseList>
									<div style="border-top:1px #EFEFEF solid;"></div>
								</ZONE fisiereRespinse enabled>
								<ZONE fisiereRespinse empty>
									<br /><BR /><BR />
									   <center><font size="2"><strong>Nu aveti fisiere moderate pina in acest moment.</strong></font></center>
									<br /><BR /><BR />
								</ZONE fisiereRespinse empty>
							</div>
						</div>
					</div>	
 					<div style="height:10px;"></div>
					<div id="tabclose" class="tabber"></div>
				</div>
			</div>
 		</div>
		<!-- Block LIST -->
			==blocklist==
		<!-- /Block LIST -->
	</div><!-- end bd -->
</ZONE contDePlataModul enabled>

<ZONE contDePlataModul guest> 
   <br />
   <table cellpadding="0" cellspacing="4" width="100%" style="border:2px #FF0000 solid;">
      <tr>
	     <td rowspan="2" width="30"><img src="{imgFiles}/red_alert.gif" /></td>
		 <td align="left" class="black_text_content_bold"><font color="#FF0000">Sorry, guests can not upload pictures.</font></td>
	  </tr>
	  <tr>
	     <td align="left" class="black_text_content"><a class="black_text_content_bold" href="?L=registration.register"><b>Register</b></a> </td>
      </tr>
   </table>
</ZONE contDePlataModul guest>
  
  
  
<OBJ dateCompanie>		
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-top:10px;">
		<tr><td width="120">Tip persoana:</td><td>{company.statut}</td></tr>
		<tr><td>Nume companie:</td><td>{company.name}</td></tr>
		<tr><td>Pers. de contcat:</td><td>{company.pers.contact}</td></tr>
		<tr><td>Adresa:</td><td>{company.adresa}</td></tr>
		<tr><td>Tel:</td><td>{company.tel}</td></tr>
		<tr><td>Fax:</td><td>{company.fax}</td></tr>
		<tr><td>Email:</td><td>{company.email}</td></tr>
		<tr><td>Cod fiscal:</td><td>{company.codfiscal}</td></tr>
		<tr><td>Cod TVA:</td><td>{company.codtva}</td></tr>
		<tr><td>Cod bancar:</td><td>{company.codbancar}</td></tr>
		<tr><td>Denumirea bancii:</td><td>{company.denumireabancii}</td></tr>
	</table>
</OBJ dateCompanie>

<OBJ datePersoanaFizica>		
	<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-top:10px;">
		<tr><td width="100">Tip persoana:</td><td>{pers.statut}</td></tr>
		<tr><td>Nume:</td><td>{pers.numele}</td></tr>
		<tr><td>Prenume:</td><td>{pers.prenumele}</td></tr>
		<tr><td>Adresa:</td><td>{pers.adresa}</td></tr>
		<tr><td>TelFix:</td><td>{pers.telFix}</td></tr>
		<tr><td>Tel Mobil:</td><td>{pers.telMobil}</td></tr>
		<tr><td>Cod Personal:</td><td>{pers.codPersonal}</td></tr>
		<tr><td>Email:</td><td>{pers.email}</td></tr>
	</table>
</OBJ datePersoanaFizica>



<OBJ listaFisiereCompact>		
	<h4>{fisier.title} <span style="font-weight:normal;">( {fisier.traducDin} -> {fisier.traducIn} ) : {fisier.typeFile}</span></h4>
	<table class="license" cellspacing="0" cellpadding="0" style="width:95%;">
		<tr>
		   <td width="16" class="filesDetails" valign="top"><a class="filesDetailsSel" href="javascript:ajFetch('?L=moderator.files.lista_de_fisiere&chromeless=1&file_id={fisier.id}&tab={lista.Fisiere.Tab}', 'files{lista.Fisiere.Tab}InjectObject', 0, false);"></a></td>
		   <td style="padding-left:5px;">
				<p>{fisier.description}</p>
				<strong>Pret: {fisier.pret}</strong>
				
				{data.nrPagini.nrCaractere}
		   </td>
		   <td align="right">
		   		{edit.delete.files}
		   </td>
		</tr>
	</table>
</OBJ listaFisiereCompact>		
	
<OBJ listaFisiereDetails>		
	<h4>
		{fisier.title} <span style="font-weight:normal;">( {fisier.traducDin} -> {fisier.traducIn} ) : {fisier.typeFile}</span></font>
		{edit.delete.files}
	</h4>
	<table class="license" cellspacing="0" cellpadding="0" border="0" style="width:95%;">
		<tr>
		   <td width="16" class="filesDetailsSelected" valign="top"><a class="filesDetailsSelSelected" href="javascript:ajFetch('?L=moderator.files.lista_de_fisiere&chromeless=1&tab={lista.Fisiere.Tab}', 'files{lista.Fisiere.Tab}InjectObject', 0, false);"></a></td>
		   <td style="padding-left:5px;" valign="top">
				<p>{fisier.description}</p>
				<BR />
				<strong>Pret: {fisier.pret} </strong>
				<BR />
				<BR />
				<BR />
				<strong>Numarul de caractere</strong>
				<form method="get">
					<input name="L" value="moderator.files.lista_de_fisiere" type="hidden">
					<input name="file_name" value="{fisier.namestart}" type="hidden">
					<input name="file_value" size="18" type="text">
					<input name="chromeless" value="1" type="hidden">
					<input value="Calculeaza pretul" type="submit">
				</form>
		   </td>
		   <td align="center" width="50%">
				{date.de.contact}
		   </td>
		</tr>
	</table>
</OBJ listaFisiereDetails>		



<OBJ listaContDePlataCompact>		
	<h4>{fisier.title} <span style="font-weight:normal;">( {fisier.traducDin} -> {fisier.traducIn} ) : {fisier.typeFile}</span></h4>
	<table class="license" cellspacing="0" cellpadding="0" style="width:95%;">
		<tr>
		   <td width="16" class="filesDetails" valign="top"><a class="filesDetailsSel" href="javascript:ajFetch('?L=moderator.files.lista_de_fisiere&chromeless=1&file_id={fisier.id}&tab={lista.Fisiere.Tab}', 'files{lista.Fisiere.Tab}InjectObject', 0, false);"></a></td>
		   <td style="padding-left:5px;">
				<p>{fisier.description}</p>
				<strong>Pret: {fisier.pret}</strong>
				
				{data.nrPagini.nrCaractere}
		   </td>
		   <td align="right">
		   		{edit.delete.files}
		   </td>
		</tr>
	</table>
</OBJ listaContDePlataCompact>		
	
<OBJ listaContDePlataDetails>		
	<h4>
		{fisier.title} <span style="font-weight:normal;">( {fisier.traducDin} -> {fisier.traducIn} ) : {fisier.typeFile}</span></font>
		{edit.delete.files}
	</h4>
	<table class="license" cellspacing="0" cellpadding="0" border="0" style="width:95%;">
		<tr>
		   <td width="16" class="filesDetailsSelected" valign="top"><a class="filesDetailsSelSelected" href="javascript:ajFetch('?L=moderator.files.lista_de_fisiere&chromeless=1&tab={lista.Fisiere.Tab}', 'files{lista.Fisiere.Tab}InjectObject', 0, false);"></a></td>
		   <td style="padding-left:5px;" valign="top">
				<p>{fisier.description}</p>
				<BR />
				<strong>Pret: {fisier.pret} </strong>
				<BR />
				<BR />
				<BR />
				<strong>Numarul de caractere</strong>
				<form method="get">
					<input name="L" value="moderator.files.lista_de_fisiere" type="hidden">
					<input name="file_name" value="{fisier.namestart}" type="hidden">
					<input name="file_value" size="18" type="text">
					<input name="chromeless" value="1" type="hidden">
					<input value="Calculeaza pretul" type="submit">
				</form>
		   </td>
		   <td align="center" width="50%">
				{date.de.contact}
		   </td>
		</tr>
	</table>
</OBJ listaContDePlataDetails>		