<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 0.848b C1 [ALICIA]                               http://www.phpizabi.net //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         Claude Desjardins, R - feedback@realitymedias.com        //
// Last modification date:  August 13th 2006                                         //
// Version:                 PHPizabi 0.848b C1                                       //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias / PHPizabi - All rights reserved                    //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");
	
	function convertEmoticons($body) {
		
		$emoticons = array(
			"O:)" 	=> "angel",
			"O:-)" 	=> "angel",
			":@" 	=> "angry",
			":S"	=> "confused",
			":-S"	=> "confused",
			"o.O"	=> "confused",
			"8-]"	=> "cool",
			":&#039;(" 	=> "crying",
			":$" 	=> "embarrassed",
			"8-|" 	=> "glasses",
			"8-)" 	=> "glasses",
			":-]" 	=> "grin",
			":*"	=> "kiss",
			":-*" 	=> "kiss",
			":|" 	=> "plain",
			"8)" 	=> "rolling",
			"8-)" 	=> "rolling",
			":("	=> "sad",
			":-(" 	=> "sad",
			":#"	=> "sealed",
			":-#" 	=> "sealed",
			"+-(" 	=> "sick",
			":)" 	=> "smile",
			":DD" 	=> "smile-big2",
			":D" 	=> "smile-big",
			":-O" 	=> "surprise",
			":P"	=> "tongue",
			":-P" 	=> "tongue",
			":?" 	=> "uh",
			":-?"	=> "uh",
			":w" 	=> "vampire",
			"(V)"	=> "vampire",
			"&#059;)"	=> "wink",
			"&#059;-)" 	=> "wink"
		);
			
		$emoticonReplaceCount = 0;
			
		foreach ($emoticons as $asciiCode => $imageName) {
			while (strstr($body, $asciiCode) and $emoticonReplaceCount < 20) {
				$body = substr_replace(
					$body, 
					'<img 
						src="theme/default/images/icons/emoticons/'.$imageName.'.png" 
						align="absbottom" 
						width="16" 
						height="16"
						alt="'.$imageName.'"
						title="'.$imageName.'"
					>',
					strpos($body, $asciiCode, 0),
					strlen($asciiCode)
				);

				$emoticonReplaceCount ++;
			}
		}

		return $body;
	}
	
?>