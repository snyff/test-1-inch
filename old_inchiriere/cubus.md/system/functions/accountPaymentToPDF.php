<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  22.01.2008                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////

 
	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function accountPaymentToPDF($accountPaymentID, $accountPaymentType) {
		
		global $CONF;		
		 
		$pdfData = new template;
		$pdfData -> LoadThis(file_get_contents("theme/templates/GLOBALS/pdf/accountPaymentCreator.tpl"));
		$pdfContent = explode("\n", $pdfData->Flush(1)); 
		 
  		$accountPayment = myF(myQ("SELECT * FROM  `[x]account_payment` WHERE `account_payment_id` = '".$accountPaymentID."' LIMIT 1"));
 		$companyName = _fnc("company", $accountPayment['company_id'], 'name');
		
		if ( $accountPaymentType == 0 ) { 
			
			$sfiles = myQ("
				SELECT * FROM `[x]files_to_account_payment`, `[x]files`
				WHERE `[x]files`.`file_id` = `[x]files_to_account_payment`.`file_id` AND
					  `[x]files_to_account_payment`.`account_payment_id` = '".$accountPayment['account_payment_id']."'
			");
			
			$y=0;
			while ($files = myF($sfiles)) {
				
				$data[$y][$pdfContent[12]] = ($y+1).'.';
				$data[$y][$pdfContent[17]] = $files['original_name'];  
				$data[$y][$pdfContent[18]] = $pdfContent[21];
				$data[$y][$pdfContent[19]] = _fnc("pages_nr", $files['characters_nr'], $accountPayment['company_id']);
				$data[$y][$pdfContent[20]] = _fnc("file_price", _fnc("characters_nr", 1), $files['languages_type'], $accountPayment['company_id']);
				$data[$y][$pdfContent[13]] = $files['price_discount'];
				
				$totalPrice += $files['price_discount'];
				$y++;
			}

		} else if ( $accountPaymentType == 1 ) {
			
			$data[$y][$pdfContent[12]] = ($y+1).'.';
			$data[$y][$pdfContent[17]] = $pdfContent[22];  
			$data[$y][$pdfContent[20]] = $accountPayment['account_payment_price'];
			
			$totalPrice += $accountPayment['account_payment_price'];
			$y = 1;
		}
  		
 		$filesNr = $y;
		$rh = 15.4;
  		
 		$pdf =& new Cezpdf();
		$pdf->selectFont('system/functions/classes/fonts/Helvetica.afm');
		$pdf->ezSetMargins('40', '40', '40', '40');
		$pdf->ezText( $pdfContent[0] .' '. $accountPaymentID ,14);
		$pdf->ezSetDy(-10,'makeSpace');
		$pdf->ezText($pdfContent[1], 10);
		$pdf->setLineStyle(1);
		$pdf->line(40,760,370,760);
		
		
		$pdf->addJpegFromFile($CONF["AP_LINK"].$CONF["AP_IMG_COMPANY_LOGO"], 380, 725, 160);
		
		$pdf->ezSetDy(-20,'makeSpace');
		$pdf->ezText($CONF["COMPANY_NAME"], 7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[3]. $CONF["COMPANY_JUR_ADDRESS_LONG"], 7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[4]. $CONF["COMPANY_OFFICE_ADDRESS_LONG"], 7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[2]. $CONF["COMPANY_TEL_NUMBERS"] .' '.$pdfContent[5]. $CONF["COMPANY_FAX_NUMBERS"].' '.$pdfContent[6]. $CONF["COMPANY_MOBILE_NUMBERS"], 7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText( "http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']).', '.$CONF["COMPANY_EMAIL"] ,7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[7].' '.$CONF["COMPANY_CD"], 7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[8].' '.$CONF["COMPANY_FISCAL_CODE"],7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($CONF["COMPANY_BANK"],7);
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText($pdfContent[9].' '. $CONF["COMPANY_BANK_CODE"],7);
		$pdf->ezSetDy(-20,'makeSpace');
		
		$pdf->ezText( $pdfContent[0].' '.$accountPaymentID. ' '.$pdfContent[10].' '.date('d.m.Y', $accountPayment['created_time']),9, array('justification'=>'center'));
		$pdf->ezSetDy(-3,'makeSpace');
		
		$pdf->ezText($pdfContent[11]. '<b>'.$companyName.'</b>', 9);
		$pdf->ezSetDy(-3,'makeSpace');
		
 		
		$tbArray = array(
			'xPos'=>45,
			'xOrientation'=>'right',
			//'shaded'=>0,
			'width' =>520,
			'cols'  =>array(
				$pdfContent[12] => array('width'=>28),
				$pdfContent[18] => array('width'=>65),
				$pdfContent[19] => array('width'=>65),
				$pdfContent[20] => array('width'=>65),
				$pdfContent[13] => array('width'=>65),
			)
		);
		$pdf->ezSetDy(-5,'makeSpace');
		$pdf->ezTable($data, '', '', $tbArray);		
		
				
		$pdf->setStrokeColor(0,0,0);
		$pdf->rectangle(40,555-$filesNr*$rh,455,20);
		
		$pdf->ezSetDy(-5,'makeSpace');
		$pdf->ezText($pdfContent[13].'                            ', 9, array('justification'=>'right'));
		
		$pdf->rectangle(495,555-$filesNr*$rh,65,20);
		
		$pdf->ezSetDy(+10,'makeSpace');
		$pdf->ezText($totalPrice, 9, array('justification'=>'right'));
		
		
		$pdf->ezSetDy(-20,'makeSpace');
		$pdf->ezText($pdfContent[14].' '.$CONF["ACCOUNT_PAYMENT_AVAILEBLE_DAYS"].' '.$pdfContent[15], 9);
		
		$pdf->ezSetDy(-30,'makeSpace');
		$pdf->ezText($pdfContent[16].'                                   / '.$CONF["COMPANY_CEO_NAME"].' /', 8, array('justification'=>'right'));
		
		$pdf->addJpegFromFile($CONF["AP_LINK"].$CONF["AP_IMG_SIGNATURE"], 418, 485-$filesNr*$rh, 70);
		$pdf->addPngFromFile($CONF["AP_LINK"].$CONF["AP_IMG_STAMP"],  445, 440-$filesNr*$rh, 100);
		
		/* Footer */
		$pdf->addJpegFromFile($CONF["AP_LINK"].$CONF["AP_IMG_SMALL_COMPANY_LOGO"], 45, 360-$filesNr*$rh, 70);
		
		$pdf->setLineStyle(1);
		$pdf->line(115,430-$filesNr*$rh,560,430-$filesNr*$rh);
		
		$pdf->ezSetDy(-65,'makeSpace');
		$pdf->ezText('                                       '.$CONF["COMPANY_OFFICE_ADDRESS_LONG"], 8);
		
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText('                                       '.$pdfContent[2]. $CONF["COMPANY_TEL_NUMBERS"] .' '.$pdfContent[5] . $CONF["COMPANY_FAX_NUMBERS"] .' '. $pdfContent[6] . $CONF["COMPANY_MOBILE_NUMBERS"], 8);
		
		$pdf->ezSetDy(-3,'makeSpace');
		$pdf->ezText('                                       '."http://".$_SERVER['HTTP_HOST'].str_replace("/index.php", NULL, $_SERVER['PHP_SELF']).', '.$CONF["COMPANY_EMAIL"] , 8);
		
 		
		$pdfcode = $pdf->ezOutput();
		$fp=fopen($CONF["files_folder"].$CONF["account_payment"].'/'.$accountPayment['unic_id'].'.pdf', 'wb');
		fwrite($fp,$pdfcode);
		fclose($fp);	
   	}

?>