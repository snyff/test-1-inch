<?php


	      /* Check Structure Availability */
       	  if (!defined("CORE_STRAP")) die("Out of structure call");
	
 		 
	      $contplata_data = myF(myQ("
			  SELECT *
			  FROM `[x]cont_plata`
			  WHERE `id`='".$_GET['id_contplata']."'
			  LIMIT 1
		  "));
		 
		 
		  $filename_demo = file_get_contents("./system/cache/download/act_download.xml");
		  

		  $user_list_arr = explode(",",$contplata_data['files_id']);
		  
		  $str_user_list = " OR `id`='".implode("' OR `id`='", $user_list_arr)."'";
		  		  
		  
    	  $listaFisiere = myQ("
			  SELECT *
   			  FROM `[x]files`
			  WHERE 1=2 ".$str_user_list."
			  ORDER BY `id` DESC
		  ");
		  
		 /*
		  echo "
			  SELECT *
   			  FROM `[x]files`
			  WHERE 1=2  ".$str_user_list."
			  ORDER BY `id` DESC
		  ";
		  */
		  
		  
		  $i=1;
		  $add_new_line = '';
		  $pret_total = 0;
		  while ($listaFisiereToata = myF($listaFisiere)) {
			
			   $pret_total += $listaFisiereToata['pretul'];
 			   
			   $add_new_line .= '<w:tr>
 <w:trPr>
 <w:trHeight w:val="259"/></w:trPr>
 <w:tc>
  <w:tcPr>
   <w:tcW w:w="509" w:type="dxa"/></w:tcPr>
   <w:p>
    <w:pPr>
	 <w:rPr>
	  <w:sz w:val="20"/>
	   <w:sz-cs w:val="20"/>
	    <w:lang w:val="RO"/>
	 </w:rPr>
	</w:pPr>
	<w:r>
	 <w:rPr>
	  <w:sz w:val="20"/>
	   <w:sz-cs w:val="20"/>
	    <w:lang w:val="RO"/>
	 </w:rPr>
	 <w:t>'.$i.'.</w:t>
	</w:r>
   </w:p>
  </w:tc>
  <w:tc>
   <w:tcPr>
    <w:tcW w:w="4739" w:type="dxa"/>
   </w:tcPr>
   <w:p>
    <w:pPr>
	 <w:rPr>
	  <w:sz w:val="20"/>
	   <w:sz-cs w:val="20"/>
	    <w:lang w:val="RO"/>
	 </w:rPr>
	</w:pPr>
	<w:r>
	 <w:rPr>
	  <w:sz w:val="20"/>
	   <w:sz-cs w:val="20"/>
	    <w:lang w:val="RO"/>
	 </w:rPr>
	 <w:t>Traducere din '._fnc("lang_data", $listaFisiereToata['from_lang'], 'ro').' in '._fnc("lang_data", $listaFisiereToata['to_lang'], 'ro').' </w:t>
	</w:r>
   </w:p>
  </w:tc>
  <w:tc>
   <w:tcPr>
   <w:tcW w:w="1104" w:type="dxa"/></w:tcPr>
    <w:p>
	 <w:pPr>
	  <w:rPr>
	   <w:sz w:val="20"/>
	   <w:sz-cs w:val="20"/>
	   <w:lang w:val="RO"/>
	   </w:rPr>
	  </w:pPr>
	  <w:r>
	   <w:rPr>
	    <w:sz w:val="20"/>
		<w:sz-cs w:val="20"/>
		<w:lang w:val="RO"/>
	   </w:rPr>
	   <w:t>pagini</w:t>
	  </w:r>
	 </w:p>
	</w:tc>
	<w:tc>
	 <w:tcPr>
	  <w:tcW w:w="1472" w:type="dxa"/>
	 </w:tcPr>
	 <w:p>
	    <w:pPr>
		   <w:rPr>
		      <w:sz w:val="20"/>
			     <w:sz-cs w:val="20"/>
			     <w:lang w:val="RO"/>
		   </w:rPr>
		</w:pPr>
		<w:r>
		   <w:rPr>
		      <w:sz w:val="20"/>
			     <w:sz-cs w:val="20"/><w:lang w:val="RO"/></w:rPr><w:t>'._fnc("nrPagini", $listaFisiereToata['nr_caractere']).'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1471" w:type="dxa"/></w:tcPr><w:p><w:pPr><w:rPr><w:sz w:val="20"/><w:sz-cs w:val="20"/><w:lang w:val="RO"/></w:rPr></w:pPr><w:r><w:rPr><w:sz w:val="20"/><w:sz-cs w:val="20"/><w:lang w:val="RO"/></w:rPr><w:t>'._fnc("calc_price",  'company', _fnc("nrCaractere", 1), $listaFisiereToata["from_lang"], $listaFisiereToata["to_lang"], $listaFisiereToata["type_file"], $listaFisiereToata["company"]).'</w:t></w:r></w:p></w:tc><w:tc><w:tcPr><w:tcW w:w="1433" w:type="dxa"/></w:tcPr><w:p><w:pPr><w:rPr><w:sz w:val="20"/><w:sz-cs w:val="20"/><w:lang w:val="RO"/></w:rPr></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Arial" w:h-ansi="Arial" w:cs="Arial"/><wx:font wx:val="Arial"/><w:sz w:val="20"/><w:sz-cs w:val="20"/><w:lang w:val="RO"/></w:rPr><w:t>'.$listaFisiereToata['pretul'].'</w:t></w:r></w:p></w:tc></w:tr>';
			   
		 
		     $i++;
		  }
			
		  
		   //$pret_total = 99;
		  
		  $filename_demo = str_replace("{file.list.put}", $add_new_line, $filename_demo);
		  $filename_demo = str_replace("{pret.total}",    $pret_total,   $filename_demo);
		 
		  echo $filename_demo;
		  
/*
          $filename = "../system/cache/download/act_companie.doc";
          $handle = fopen($filename, "a+");
          $contents = fread($handle, filesize($filename));
          fclose($handle);
*/		  
		  force_download($filename);
		  
		  
		  
// *********		  
function force_download($filename) {

        header("Content-type: application/force-download");
        header('Content-Disposition: inline; filename="'.$filename.'"');
        header("Content-Transfer-Encoding: Binary");
        header("Content-length: ".filesize($filename));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="Companie_CUBUS_'.date('d-m-Y', time()).'_'.rand(1,100).'.doc"');
        readfile($filename);
}


?>