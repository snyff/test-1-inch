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

	function userAcces($getData) {
		
		 /*
		      Facem redirectionare catre pagina la care are ACCESS
		 */
		 $moderator[] = "moderator.tools";
		 $moderator[] = "moderator.traducator_fisiere_test";
		 $moderator[] = "";
		 
		 
		  /*
	      
		     if ( me("is_administrator") == 0 && $getData != 'pictures.upload' )     { _fnc("reload", 0, "?L=pictures.upload");     die(); }
		 elseif ( me("is_administrator") == 1 && $getData != 'admin.index' )         { _fnc("reload", 0, "?L=admin.index");         die(); } 
	     elseif ( me("is_administrator") == 2 && !in_array($getData, $moderator) )   { _fnc("reload", 0, "?L=moderator.tools");     die(); } 
	     elseif ( me("is_administrator") == 3 && $getData != 'pictures.translate' )  { _fnc("reload", 0, "?L=pictures.translate");  die(); } 
	     elseif ( me("is_administrator") == 4 && $getData != 'pictures.editor' )     { _fnc("reload", 0, "?L=pictures.editor");     die(); } 
		 
		 
		 */
		 
		 
		 
	         if ( me("is_administrator") == 0 && $getData != 'pictures.upload' )     { _fnc("reload", 0, "?L=pictures.upload");        die(); }
		 elseif ( me("is_administrator") == 1 && $getData != 'admin.index' )         { _fnc("reload", 0, "?L=admin.index");            die(); } 
	     elseif ( me("is_administrator") == 2 && $getData != 'moderator.tools' )     { _fnc("reload", 0, "?L=moderator.tools");        die(); } 
	     elseif ( me("is_administrator") == 3 && $getData != 'pictures.translate' )  { _fnc("reload", 0, "?L=translators.translate");  die(); } 
	     elseif ( me("is_administrator") == 4 && $getData != 'pictures.editor' )     { _fnc("reload", 0, "?L=pictures.editor");        die(); } 
	}

?>