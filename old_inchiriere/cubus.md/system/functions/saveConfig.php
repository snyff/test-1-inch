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
	
	function saveConfig($confItem, $newVal) {
		
		global $CONF;
		
		/*
			Check if we can write that file
		*/
		if (is_writable("system/conf.inc.php")) {
			
			/*
				Create the new line to be inserted
			*/
			$newLine = "\$CONF[\"".strtoupper($confItem)."\"] = ";
			
			/*
				Play with values types, we will try
				to assign the value as integer, bool,
				or string.
			*/
			if (is_numeric($newVal)) $newLine .= $newVal;
			elseif (is_bool($newVal)) $newLine .= ($newVal?"true":"false");
			else $newLine .= "\"".str_replace("\"", "\\\"", stripslashes($newVal))."\"";
			
			/*
				Append line termination
			*/
			$newLine .= ";";

			/*
				Load the configuration file body into a buffer
			*/
			$configBody = @file_get_contents("system/conf.inc.php");
			
			/*
				Swap the old line with the new one
			*/
			$configBody = preg_replace(
				'/\\$CONF\\["'.preg_quote(strtoupper($confItem)).'"\\].*/', 
				$newLine, 
				$configBody
			);
			
			/*
				Backup the configuration file before we make any change
			*/
			copy("system/conf.inc.php", "system/cache/backups/autobackup_".date("dmyhi")."conf.inc.php");
			
			/*
				Save the buffer into the configuration file ...
			*/
			ignore_user_abort(true);
			if ($handle = fopen("system/conf.inc.php", "w")) {
				
				/*
					Tryt to lock the file and write
				*/
				flock($handle, LOCK_EX);
				fwrite($handle, $configBody);
				flock($handle, LOCK_UN);
				fclose($handle);
				ignore_user_abort(false);
				
				/*
					Override the actual configuration
				*/
				$CONF[$confItem] = $newVal;
				
				return true;
			}
		}

		else return false;
	}

?>