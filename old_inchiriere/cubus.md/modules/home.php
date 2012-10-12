<?php

///////////////////////////////////////////////////////////////////////////////////////
// CUBUS Translation                                             http://www.cubus.md //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         CUBUS Tranlsation, CUBUS - info@cubus.md                 //
// Last modification date:  16.02.2009                                               //
// Version:                 CUBUS  0.3b                                              //
//                                                                                   //
// (C) 2007-2009  CUBUS Translation - All rights reserved                            //
///////////////////////////////////////////////////////////////////////////////////////


/* Check Structure Availability */
if (!defined("CORE_STRAP"))
    die("Out of structure call");

$tpl = new template;
$tpl->Load("!theme/{$GLOBALS["THEME"]}/templates/home.tpl");
//        echo "!theme/{$GLOBALS["THEME"]}/templates/home.tpl";die;
$tpl->GetObjects();

/* Daca este administrator trimitem la modulul de moderare */
if (is_op()) {
    header("Location: ?L=moderator.files.filesList");
    die();
}

/* Daca este administrator trimitem la modulul de moderare */
if (is_translator()) {
    header("Location: ?L=translator.files");
    die();
}

/**/
$tpl->Zone("abilList", "translation");
$tpl->Zone("uploadFileBlock", "enabled");
if (me("id"))
    $tpl->Zone("islogin", "login");

$randing = rand(1, 2);

if ($rangimg == 1)
    $tpl->Zone("isimgrand1", "enabled");
else
    $tpl->Zone("isimgrand2", "enabled");

if (_fnc("company", me("id"), 'name', '') == '' && me("id") != '')
    $tpl->Zone("companyName", "enabled");
elseif (_fnc("company", me("id"), 'name', '') != '' && me("id") != '')
    $tpl->Zone("editCompanyName", "edit");

/* Delete files */
if ($_POST['action'] != '') {

    $selectedFiles = @implode(",", $_POST['fileArray']);

    if (me('id') != '') {

        if (_fnc("company", me("id"), 'name', '') == '' && $_POST['action'] == 't' && $_POST['companyName'] == '') {
            _fnc("reload", 0, "?error=noCompanyName");
            die();
        } elseif (_fnc("company", me("id"), 'name', '') == '' && $_POST['action'] == 't' && $_POST['companyName'] != '') {

            myQ("UPDATE `[x]companies` SET `name` = '" . $_POST['companyName'] . "' WHERE `company_id` = '" . me('id') . "'");
        }
    }

    if ($_POST['action'] == 'd' && $selectedFiles != '') {
        _fnc("reload", 0, "?L=c.deleteFiles&chromeless=1&delete=" . $selectedFiles);
    } elseif ($_POST['action'] == 't' && $selectedFiles != '' && me("id") != '') {
        _fnc("reload", 0, "?L=c.addAccountPayment&chromeless=1&translate=" . $selectedFiles);
    } elseif ($_POST['action'] == 't' && $selectedFiles != '' && !me("id")) {
        _fnc("reload", 0, "?L=c.registrationAccount&action=fromFiles");
    } elseif ($selectedFiles == '') {
        _fnc("reload", 0, "?error=noFileSelected");
    }
    die();
}


/* alaturam toate fisierele la utilizatori in cazul in care acesta este logat */
if (me("id") != '' && $_SESSION['temporary_files_id'] != '') {

    $fListSelect = myQ("SELECT * FROM `[x]files` WHERE `temporary_id` = '" . $_SESSION['temporary_files_id'] . "' AND `temporary_id` <> ''");
    while ($fLSelect = myF($fListSelect)) {

        /* Punem toate fisierele in contul companiei */
        myQ("UPDATE `[x]files` 
					 SET    `company_id`    = '" . me("id") . "', 
							`temporary_id`  = ''
					 WHERE  `unic_id`='" . $fLSelect['unic_id'] . "'
					 LIMIT 1
				");

        $fSelect = myF(myQ("SELECT * FROM `[x]files` WHERE `unic_id`='" . $fLSelect['unic_id'] . "' LIMIT 1"));

        if ($fSelect['price_discount'] != '') {

            /* Scoatem cont avans */
            $cash_advance = _fnc("company", me("id"), 'cash_advance', '');

            /* Adaugam/Controlam legaturile fiecarui fisier/companii si determinam ce trebuie sa facem cu el */
            $linksData = _fnc("addLinksToFile", $fSelect, $cash_advance, $fSelect['price_discount']);

            /* extragem din links traducatorul cu asa legatura */
            $translatorArr = _fnc("linkt1", $fSelect['company_id'], $fSelect['languages_type']);
            $forTranslator = $translatorArr['translator_id'];

            // UPDATE ...
            myQ("UPDATE `[x]files` 
						SET `status_file`='" . $linksData['status_file'] . "',  
						 `translator_id`='" . $forTranslator . "',
						 `salary_translator`='" . _fnc("translator_salary", $file_price, $forTranslator, $fSelect["languages_type"]) . "',
						 `payment_type`='" . $linksData['paymentType'] . "',
						 `company_id`    = '" . me("id") . "', 
						 `temporary_id`  = ''
						WHERE `unic_id`='" . $fSelect['unic_id'] . "'
						LIMIT 1
					");

            /* crrem cont de plata in caz ca acest lucru este necesar */
            if ($linksData['autoAP'] == 1)
                _fnc("addAccountPayment", $fSelect['unic_id'], $linksData['statusAP']);
        }
    }
    unset($_SESSION['temporary_files_id']);
}


/* Facem LOOP la Lista cu LIMBI */
$ttList = _fnc("select_type_translation", '');
/* AFISAM Lista cu posibilitatile de traduceri existente */
if (isset($ttList))
    $tpl->Loop("loopSkills", $ttList);


/* Scoatem eroare in caz ca este nevoie la incarcarea fisierului */
if ($_GET['error'] == 'noFile') {
    $tpl->Zone("uploadHeader", "noFile");
} elseif ($_GET['error'] == 'unallowedExtension') {
    $tpl->Zone("uploadHeader", "unallowedExtension");
} elseif ($_GET['error'] == 'BigFileSize') {
    $tpl->Zone("uploadHeader", "BigFileSize");
} elseif ($_GET['error'] == 'pricenotcalc') {
    $tpl->Zone("accountPayment", "pricenotcalc");
} elseif ($_GET['error'] == 'noFileSelected') {
    $tpl->Zone("accountPayment", "noFileSelected");
} elseif ($_GET['error'] == 'fileIsInAP') {
    $tpl->Zone("accountPayment", "fileIsInAP");
} elseif ($_GET['error'] == 'noDataInAP') {
    $tpl->Zone("accountPayment", "noDataInAP");
} elseif ($_GET['error'] == 'noNumAP') {
    $tpl->Zone("accountPayment", "noNumAP");
} elseif ($_GET['error'] == 'noCompanyName') {
    $tpl->Zone("accountPayment", "noCompanyName");
}


/* Selectam fisiere din DB */
if (me("id")) {
    $where_files = " `company_id`='" . me("id") . "'";
} else {
    $where_files = " `temporary_id` <> '' AND `temporary_id` = '" . $_SESSION['temporary_files_id'] . "'";
}


$fileSelect = myQ("
			SELECT *
			FROM  `[x]files`
			where (`status_file`='0' OR `status_file`='10' OR `status_file`='30' OR `status_file`='40' OR `status_file`='50' OR `status_file`='60' OR `status_file`='70' OR `status_file`='80') AND 
				  " . $where_files . "
 			ORDER BY `file_id` DESC
		");




/* Afisam lista cu documente */
$i = 0;
$filesListNew = array();
$COUNTED_EXTENTIONS = explode(",", $CONF["FILES_COUNTED_EXTENTIONS"]);
$C_EXTENTIONS = 0;
while ($files = myF($fileSelect)) {

    $type_file = _fnc("file_extension", $CONF["files_folder"] . $CONF["new_files"] . "/" . $files["original_file"]);

    /* Datele care sunt introduse in HTML */
    $filesList[$i]["unic.id"] = $files["unic_id"];
    $filesList[$i]["original.name"] = $files["original_name"];
    $filesList[$i]["original.file"] = $files["original_file"];
    $filesList[$i]["from.language"] = _fnc("languages", _fnc("translation", $files["languages_type"], 'from_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
    $filesList[$i]["to.language"] = _fnc("languages", _fnc("translation", $files["languages_type"], 'to_language'), $GLOBALS['CONF']["LOCALE_SITE_DEFAULT_LANGUAGE"]);
    $filesList[$i]["characters.nr"] = ($files["characters_nr"] == 0) ? '---' : $files["characters_nr"];
    $filesList[$i]["price"] = ($files["price_discount"] == 0) ? '---' : $files["price_discount"];


    if ($files["status_file"] == 80) {

        $downloadFileArr["{download.path}"] = urlencode($CONF["edited_files"]);
        $downloadFileArr["{file.downloadFile}"] = $files['edited_file'];
        $downloadFileArr["{file.downloadName}"] = $files['edited_name'];
    }

    if ($files["status_file"] >= 10 && $files["status_file"] <= 30)
        $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToPay"];
    elseif ($files["status_file"] == 50)
        $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToTranslation"];
    elseif ($files["status_file"] >= 60 && $files["status_file"] <= 70)
        $filesList[$i]["statut.file"] = $GLOBALS["OBJ"]["statutToEdit"];
    elseif ($files["status_file"] == 80)
        $filesList[$i]["statut.file"] = strtr($GLOBALS["OBJ"]["statutDownload"], $downloadFileArr);

    /* Analizam daca pretul la fisierele afisate poate fi calculat AUTOMAT */
    if (!in_array($type_file, $COUNTED_EXTENTIONS) && $files["status_file"] == 0)
        $C_EXTENTIONS++;

    if ($files["characters_nr"] == 0) {
        $priceCheck++;
    }
    $countAllPrices += $files["price_discount"];

    if ($files["status_file"] >= 0 && $files["status_file"] <= 10) {
        $filesListNew[$i] = $filesList[$i];
    } elseif ($files["status_file"] > 10 && $files["status_file"] <= 80) {
        $filesListAP[$i] = $filesList[$i];
    }

    $i++;
}


/* Analizam daca sunt fisiere cu pret necalculat */
if ($priceCheck == 0 && $CONF["DEADLINE_ENABLED"]) {
    $tpl->Zone("deadline", "enabled");
} elseif ($priceCheck > 0) {
    if ($C_EXTENTIONS == 0) {

        if ($_GET['autoCounter'] == 1 || !isset($_GET['autoCounter']))
            $seconds = 10;
        if ($_GET['autoCounter'] == 2)
            $seconds = 60;
        if ($_GET['autoCounter'] >= 3)
            $seconds = 300;

        $refresh = $_GET['autoCounter'];

        $tpl->AssignArray(array(
            "counter.seconds" => $seconds,
            "counter.refresh" => $refresh + 1
        ));

        $tpl->Zone("refresh", "page");
        $tpl->Zone("deadline", "disabled");
    } else {
        $tpl->Zone("countPrice", "manual");
    }
}


/* AFISAM Lista pentru CALCUL PRET */
if (count($filesListNew) > 0 || $_GET['error'] != '') {
    $tpl->Zone("homeinfo", "isafile");
    $tpl->Zone("filesListNew", "enabled");
    $tpl->Loop("loopFilesListNew", $filesListNew);
} elseif (me('id')) {
    $tpl->Zone("homeinfo", "isafile");
    $tpl->Zone("uploadNewFile", "enabled");
} else {
    $tpl->Zone("homeinfo", "center");
}


/* AFISAM Lista pentru CALCUL PRET */
if (isset($filesListAP)) {
    $tpl->Zone("filesListAP", "enabled");
    $tpl->Loop("loopFilesListAP", $filesListAP);
}


/* Conturi de plata */
if (me('id')) {

    /* Account payment */
    $accountPaymentSelect = myQ("
				SELECT *
				FROM  `[x]account_payment`
				where `company_id` = '" . me('id') . "' AND (`account_payment_status` = '0' OR `account_payment_status` = '20') 
				ORDER BY `account_payment_id` DESC
			");

    /* display account payment */
    $i = 0;
    $debt = 0;
    while ($accountPayment = myF($accountPaymentSelect)) {

        $countFiles = myQ("
					SELECT * FROM `[x]files_to_account_payment`, `[x]account_payment`
					WHERE `[x]account_payment`.`account_payment_id` = `[x]files_to_account_payment`.`account_payment_id` AND
						  `[x]files_to_account_payment`.`account_payment_id` = '" . $accountPayment['account_payment_id'] . "'
				");

        $accountPaymentCountFiles = array("{files.nr}" => myNum($countFiles));

        $accountPaymentUnicID = array("{accountPayment.unicID}" => $accountPayment['unic_id']);

        /* Datele care sunt introduse in HTML */
        $accountPaymentList[$i]["accountPayment.nr"] = $accountPayment['account_payment_id'];
        $accountPaymentList[$i]["accountPayment.unicID"] = $accountPayment['unic_id'];
        $accountPaymentList[$i]["accountPayment.price"] = $accountPayment["account_payment_price"];
        $accountPaymentList[$i]["deleteAP"] = ($accountPayment["payment_type"] || $accountPayment['account_payment_status'] == 20) ? '' : strtr($GLOBALS["OBJ"]["accountPaymentDeleteEnabled"], $accountPaymentUnicID);
        $accountPaymentList[$i]["accountPayment.status"] = ($accountPayment['account_payment_status'] == 0) ? strtr($GLOBALS["OBJ"]["statutToPayLink"], $accountPaymentUnicID) : $GLOBALS["OBJ"]["statutToConfirm"];


        if ($accountPayment['account_payment_type'])
            $accountPaymentList[$i]["accountPayment.type"] = $GLOBALS["OBJ"]["accountPaymentCashAdvance"];
        else
            $accountPaymentList[$i]["accountPayment.type"] = strtr($GLOBALS["OBJ"]["accountPaymentFiles"], $accountPaymentCountFiles);

        $debt += $accountPayment['account_payment_price'];

        $i++;
    }

    /* display account payment zone */
    if (isset($accountPaymentList)) {

        $tpl->Zone("accountPaymentList", "enabled");
        $tpl->Loop("accountPaymentList", $accountPaymentList);
    }

    $tpl->AssignArray(array(
        "debt" => $debt,
        "debt.nr" => $i,
        "name.contact.person" => _fnc("company", me("id"), 'contact_person', ''),
        "cash.advance" => (_fnc("company", me("id"), 'cash_advance', '') == '') ? 0 : _fnc("company", me("id"), 'cash_advance', ''),
        "min.account.payment" => $CONF["MIN_ACCOUNT_PAYMENT"],
        "company.Name" => _fnc("company", me("id"), 'name', '')
    ));
}


/* Generate the random verification code */
$replace["vcode"] = rand(1000, 9999);
$replace["max.upload.file.size"] = $CONF["MAX_UPLOAD_FILE_SIZE"] / 1024 / 1024;
$tpl->AssignArray($replace);


$tpl->CleanZones();
$tpl->Flush();
?>