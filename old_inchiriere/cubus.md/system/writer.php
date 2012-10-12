<?php
///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  20.11.2007                                               //
// Version:                 CUBUS  0.1b                                              //
//                                                                                   //
// (C) 2007 CUBUS Translation - All rights reserved                                 //
///////////////////////////////////////////////////////////////////////////////////////


	$image = imagecreatetruecolor(70, 25); 

	for ($i=0; $i < rand(20,40); $i++) {

		$x = rand(0, 50);
		$y = rand(0, 20);
		
		imageline($image, $x, $y, $x+rand(0,3), $y+rand(0,3), imagecolorallocate($image, rand(0,255),rand(0,255),rand(0,255)));
	}

	imagestring($image, 15, 15, 5, $_GET["T"], imagecolorallocate($image, 254,254,254));
	imagestring($image, 6, 6, 13, $_GET["T"], imagecolorallocate($image, 10,10,10));
	
	imagecolortransparent($image, imagecolorallocate($image, 255, 0, 0));
	imageinterlace($image);
	
	header("Content-type: image/gif");
	imagegif($image);
	imagedestroy($image);
	
?>