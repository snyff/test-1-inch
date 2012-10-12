<?php
function setFlat($title=false, $annonce=false, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $agentie) {
	$db = new Db();
	$q = "INSERT INTO list(id, title, annonce, nr_rooms, etaj, raion, price, valuta, fix, mobil, email, from_date, to_date, televizor, frigider, mobila, masina_spalat, statut, userid, added, accept_status, agentie)
		  VALUES('', '".escape($title)."', '".escape($annonce)."', '".escape($nrRooms)."', '".escape($etaj)."', '".escape($raion)."', '".escape($price)."', '".escape($valuta)."', '".escape($fix)."', '".escape($mobil)."', '".escape($email)."', '".escape($from)."', '".escape($to)."', '".escape($televizor)."', '".escape($frigider)."', '".escape($mobila)."', '".escape($masinaSpalat)."', '".escape($statut)."', '".(int)getSessionVar('userid')."', '".date("Y-m-d G:i:s")."', 'w', '".escape($agentie)."')";
	$db->query($q);
	return $db->lastId();
}
/*
 * pentru anunturile rapide
 */
function setFlatSimple($title=false, $annonce=false, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $pass=false, $agentie) {
	$db = new Db();
	if($email && $pass && !checkMail($email)) {
		$q = "INSERT INTO users(id, pass, email, activated, lang, fast_user, ip, timp, last_name, first_name, confirm_code) 
		VALUES (NULL, '".escape($pass)."', '".escape($email)."', 1, '".escape(LANG)."', 1, '".$_SERVER['REMOTE_ADDR']."', '".date("Y-m-d G:i:s")."', '-1', '-1', '-1')";
		$db->query($q);
		$userId = $db->lastId();
	} else {
		$userId = 0;
	}
	$q = "INSERT INTO list(id, 
							title, 
							annonce, 
							nr_rooms, 
							etaj, 
							raion, 
							price, 
							valuta, 
							fix, 
							mobil, 
							email, 
							televizor, 
							frigider, 
							mobila, 
							masina_spalat, 
							statut, 
							userid, 
							added, 
							accept_status,
							agentie
						)
		  VALUES(NULL, 
		  		'".escape($title)."', 
		  		'".escape($annonce)."', 
		  		'".escape($nrRooms)."', 
		  		'".escape($etaj)."', 
		  		'".escape($raion)."', 
		  		'".escape($price)."', 
		  		'".escape($valuta)."', 
		  		'".escape($fix)."', 
		  		'".escape($mobil)."', 
		  		'".escape($email)."', 
		  		'".escape((int)$televizor)."', 
		  		'".escape((int)$frigider)."', 
		  		'".escape((int)$mobila)."', 
		  		'".escape((int)$masinaSpalat)."', 
		  		'".escape($statut)."', 
		  		'".$userId."', 
		  		'".date("Y-m-d G:i:s")."',
		  		'w',
		  		'".escape($agentie)."'
		  	)";
	$db->query($q);
	$ret = $db->lastId();
	if($userId) {
		@session_start();
		$_SESSION['user_loggedin'] = true;
		$_SESSION['userid'] = $userId;
		httpRedirect(getUrl(array('pagePath'=>'Account', 'lang'=>LANG, 'reste'=>'info-register')));
	}
	return $ret;
}

function setRentSimple($title=false, $annonce=false, $price, $valuta, $fix, $mobil, $email, $statut, $pass=false) {
	$db = new Db();
//	if($email && $pass) {
//		$q = "INSERT INTO users(id, pass, email, activated, lang, fast_user, ip, timp, last_name, first_name, confirm_code) 
//				VALUES (NULL, '".escape($pass)."', '".escape($email)."', 1, '".escape(LANG)."', 1, '".$_SERVER['REMOTE_ADDR']."', '".date("Y-m-d G:i:s")."', '-1', '-1', '-1')";
//		$db->query($q);
//		$userId = $db->lastId();
//	} else {
//		$userId = 0;
//	}
	$userId = 0;
	$q = "INSERT INTO rent(id, title, annonce, price, valuta, fix, mobil, email, statut, userid, added)
		  VALUES('', '".escape($title)."', '".escape($annonce)."', '".escape($price)."', '".escape($valuta)."', '".escape($fix)."', '".escape($mobil)."', '".escape($email)."', '".escape($statut)."', '".$userId."', '".date("Y-m-d G:i:s")."')";
	$db->query($q);
	$ret = $db->lastId();
	return $ret;
}

function updateFlat($title=false, $annonce=false, $nrRooms, $etaj, $raion, $price, $valuta, $fix, $mobil, $email, $from, $to, $televizor, $frigider, $mobila, $masinaSpalat, $statut, $id, $agentie) {
	$db = new Db();
	$q = "UPDATE list SET
		   title='".escape($title)."', annonce='".escape($annonce)."', nr_rooms='".escape($nrRooms)."', 
		   etaj='".escape($etaj)."', raion='".escape($raion)."', price='".escape($price)."', 
		   valuta='".escape($valuta)."', fix='".escape($fix)."', mobil='".escape($mobil)."', email='".escape($email)."', 
		   from_date='".escape($from)."', to_date='".escape($to)."', televizor='".escape($televizor)."', 
		   frigider='".escape($frigider)."', mobila='".escape($mobila)."', masina_spalat='".escape($masinaSpalat)."', statut='".escape($statut)."',
		   agentie='".escape($agentie)."' 
		   WHERE userid=".getSessionVar('userid')." AND id=".escape($id);
	$db->query($q);
	return $db->lastId();
}

function getFlat($userid=false, $count=false, $idflat=false, $limit=false, $offset=false, $statut=false, $nbPhotos=false, $agentii=false) {
	$db = new Db();
	$weeks = date("Y-m-d", strtotime("-5 week"));
	$weeks = " AND added > '".$weeks."'";
	if($agentii) {
		$searchAgentii = " AND agentie='1'";
		$weeks = date("Y-m-d", strtotime("-10 week"));
		$weeks = " AND added > '".$weeks."'";
	} else {
		$searchAgentii = " AND agentie!='1'";
	}
	
	if($statut) {
		$statut = " statut='".escape($statut)."' AND accept_status='a'";
	}
	if($limit) {
		$limit = " LIMIT ".$offset.', '.$limit;
//			LIMIT 20,10
	} else {
		$limit = false;
	}
		
	if($count) {
		if($userid) {
			$userid = " WHERE userid=".$userid;
		}
		if($userid && $statut) {
			$statut = " AND ".$statut." ".$weeks;
		} elseif($statut) {
			$statut = " WHERE ".$statut." AND accept_status='a'".$weeks;
		}
		$q = "SELECT count(*) AS total FROM	list".$userid.$statut.$searchAgentii;
	} elseif($userid && $idflat) {
		$q = "SELECT * FROM list WHERE userid=".$userid." AND id=".escape($idflat).$statut;
	} elseif($idflat) {
		$q = "SELECT * FROM list WHERE id='".escape($idflat)."'".$statut.$limit;
	} elseif($userid) {
		if($nbPhotos) {
			$cond = ', (SELECT id FROM photos WHERE nr_app=l.id LIMIT 1) AS photo ';
		}
		$q = "SELECT * ".$cond." FROM list l WHERE userid=".$userid.$statut." ORDER BY id DESC".$limit;
	} else {
		if($statut) {
			$statut = " WHERE ".$statut.$weeks;
		} else {
			$statut = " WHERE accept_status='a'".$weeks;
		}
		if($nbPhotos) {
			$cond = ', (SELECT id FROM photos WHERE nr_app=l.id LIMIT 1) AS photo ';
		}
		$q = "SELECT *".$cond." FROM list l ".$statut.$searchAgentii." ORDER BY id DESC".$limit;
	}
	
	$db->query($q);
	if($count) {
		$row = $db->getNextRow();
		$ret = $row['total'];
	} elseif($idflat) {
		$row = $db->getNextRow();
		$ret = $row;
	} else {
		while($row = $db->getNextRow()) {
			$ret[] = $row;
		}
	}
	
	return $ret;
}
function searchFlats($raion, $nrRooms, $fromPrice, $toPrice, $valuta, $nrEtaj, $count=false, $limit=false, $offset=false, $nbPhotos=false) {
	$db = new Db();
	$weeks = date("Y-m-d", strtotime("-5 week"));
	$weeks = " AND added > '".$weeks."'";
	if($limit) {
		$limit = " LIMIT ".$offset.', '.$limit;
//			LIMIT 20,10
	} else {
		$limit = false;
	}
	
	if(is_numeric($raion) && ($raion>=1 && $raion<=7)) {
		$sqlArr['raion'] = escape($raion);
	}
	if(is_numeric($nrRooms) && ($nrRooms>=1 && $nrRooms<=4)) {
		$sqlArr['nr_rooms'] = escape($nrRooms);
	}
	if(is_numeric($fromPrice)) {
		$fromPriceSql = escape($fromPrice);
	}
	if(is_numeric($toPrice)) {
		$toPriceSql = escape($toPrice);
	}
	$val = getCurrency();
	if(in_array($valuta, $val)) {
		$sqlArr['valuta'] = escape($valuta);
	}
	if(is_numeric($nrEtaj)) {
		$sqlArr['etaj'] = escape($nrEtaj);
	}
	
	$i = 0;
	if(count($sqlArr)) {
		foreach($sqlArr as $key => $value) {
			$resultSql .= $key.'="'.$value.'"';
			$i++;
			if($i!=count($sqlArr)) {
				$resultSql .= ' AND ';
			}
		}
	}
	if($fromPriceSql) {
		$price = ' AND price>='.$fromPriceSql;
	}
	if($toPriceSql) {
		$price .= ' AND price<='.$toPriceSql;
	}
	if($resultSql!='' || $price!='') {
		if($resultSql!='') {
			$resultSql .= ' AND ';
		}
		$resultSql = ' WHERE '.$resultSql.' statut=1 AND accept_status="a"';
	} else {
		$resultSql = " WHERE accept_status='a'";
	}
	if($count) {
		$table = 'count(*) AS total';
	} else {
		$table = '*';
	}
	if($nbPhotos) {
		$cond = ', (SELECT id FROM photos WHERE nr_app=l.id LIMIT 1) AS photo ';
	}
	$q = "SELECT ".$table.$cond." FROM list l ".$resultSql.$price.$weeks." ORDER BY id DESC ".$limit;
	$db->query($q);
	
	if($count) {
		$row = $db->getNextRow();
		$ret = $row['total'];
	} else {
		while($row = $db->getNextRow()) {
				$ret[] = $row;
		}
	}
	return $ret;
}
/*
 * for mail subscription
 */
function setSubs($nrRooms=false, $etaj=false, $raion=false, $fromPrice=false, $toPrice=false, $valuta=false, $email, $subsLang) {
	if(!$email) {
		return false;
	}
	$db = new Db();
	if(!is_numeric($nrRooms)) {
		$nrRooms = -1;
	}
	if(!is_numeric($etaj)) {
		$etaj = -1;
	}
	if(!is_numeric($raion)) {
		$raion = -1;
	}
	if(!is_numeric($fromPrice)) {
		$fromPrice = -1;
	}
	if(!is_numeric($toPrice)) {
		$toPrice = -1;
	}
	$chars = 'qwertyuiop[]lkjhgfdsazxcvbnm123456789';
	for($i=0;$i<strlen($chars);$i++) {
		$unsubs .= $chars[rand(0, strlen($chars))];
	}
	$unsubs = md5($unsubs);
	$q = "INSERT INTO subs(id, raion, nr_rooms, from_price, to_price, email, valuta, etaj, unsubs, date_subs, receive_status, lang, ip)
		  VALUES(NULL, '".escape($raion)."', '".escape($nrRooms)."', '".escape($fromPrice)."', '".escape($toPrice)."', '".escape($email)."',
		  '".escape($valuta)."', '".escape($etaj)."', '".$unsubs."', '".date("Y-m-d G:i:s")."', 'y', '".escape($subsLang)."', '".escape($_SERVER['REMOTE_ADDR'])."')";
	$db->query($q);
	return $db->lastId();
}
/*
 * unsubscribe from announce emails
 */
function unsubEmail($key) {
	$db = new Db();
	$q = "UPDATE subs SET receive_status='n' WHERE unsubs='".escape($key)."'";
	$db->query($q);
}

function setRent($title=false, $annonce=false, $price, $valuta, $fix, $mobil, $email, $statut) {
	$db = new Db();
	$q = "INSERT INTO rent(id, title, annonce, price, valuta, fix, mobil, email, statut, userid, added)
		  VALUES('', '".escape($title)."', '".escape($annonce)."', '".escape($price)."', '".escape($valuta)."', '".escape($fix)."', '".escape($mobil)."', '".escape($email)."', '".escape($statut)."', '".(int)getSessionVar('userid')."', '".date("Y-m-d G:i:s")."')";
	$db->query($q);
	return $db->lastId();
}

function updateRent($title=false, $annonce=false, $price, $valuta, $fix, $mobil, $email, $statut, $id) {
	$db = new Db();
	$q = "UPDATE rent SET
		   title='".escape($title)."', annonce='".escape($annonce)."', price='".escape($price)."', 
		   valuta='".escape($valuta)."', fix='".escape($fix)."', mobil='".escape($mobil)."', email='".escape($email)."', 
		   statut='".escape($statut)."' 
		   WHERE userid=".getSessionVar('userid')." AND id=".escape($id);
	$db->query($q);
	return $db->lastId();
}

function getRent($userid=false, $count=false, $idflat=false, $limit=false, $offset=false, $statut=false) {
	$db = new Db();
	
	if($statut) {
		$statut = " statut=".escape($statut)." AND accept_status='a'";
	}
	if($limit) {
		$limit = " LIMIT ".$offset.', '.$limit;
//			LIMIT 20,10
	} else {
		$limit = false;
	}
		
	if($count) {
		if($userid) {
			$userid = " WHERE userid=".$userid;
		}
		if($userid && $statut) {
			$statut = " AND ".$statut;
		} elseif($statut) {
			$statut = " WHERE ".$statut;
		}
		$q = "SELECT count(*) AS total FROM	rent".$userid.$statut;
	} elseif($userid && $idflat) {
		$q = "SELECT * FROM rent WHERE userid=".$userid." AND id=".escape($idflat).$statut;
	} elseif($idflat) {
		$q = "SELECT * FROM rent WHERE id=".escape($idflat).$statut.$limit;
	} elseif($userid) {
		$q = "SELECT * FROM rent WHERE userid=".$userid.$statut." ORDER BY id DESC".$limit;
	} else {
		if($statut) {
			$statut = " WHERE ".$statut;
		} 
		$q = "SELECT * FROM rent ".$statut." ORDER BY id DESC".$limit;
	}
	
	$db->query($q);
	if($count) {
		$row = $db->getNextRow();
		$ret = $row['total'];
	} elseif($idflat) {
		$row = $db->getNextRow();
		$ret = $row;
	} else {
		while($row = $db->getNextRow()) {
			$ret[] = $row;
		}
	}
	
	return $ret;
}

function getRaions() {
	$raion = array();
	$raion[1] = 'Centru';
	$raion[2] = 'Riscani';
	$raion[3] = 'Ciocana';
	$raion[4] = 'Buiucani';
	$raion[5] = 'Botanica';
	$raion[6] = 'Posta Veche';
	$raion[7] = 'Telecentru';
	
	return $raion;
}
function getCurrency() {
	$valuta = array();
	$valuta['eur'] = 'eur';
	$valuta['usd'] = 'usd';
	$valuta['lei'] = 'lei';
	
	return $valuta;
}
function getPhotos($nrApp, $type, $count=false) {
	$db = new Db();
	if($count) {
		$q = "SELECT count(*) AS total FROM photos WHERE nr_app='".escape($nrApp)."' AND photo_type='".escape($type)."' ";
		$db->query($q);
		$row = $db->getNextRow();
		$retData = $row['total'];
	} else {
		$q = "SELECT * FROM photos WHERE nr_app='".escape($nrApp)."' AND photo_type='".escape($type)."' ";
		$db->query($q);
		while($row = $db->getNextRow()) {
			$retData[] = $row;
		}
	}
	return $retData;
}

function deletePhoto($nrPhoto, $userid) {
	$db = new Db();
	$uploadPath = UPLOAD_PATH;
	$q = "SELECT * FROM photos WHERE id='".escape($nrPhoto)."' AND userid='".$userid."'";
	$db->query($q);
	$row = $db->getNextRow();
	if($row) {
		$q = "DELETE FROM photos WHERE id='".escape($nrPhoto)."' AND userid='".$userid."'";
		$db->query($q);
		@unlink($uploadPath.$row['id'].'.'.$row['ext']);
		@unlink($uploadPath.$row['id'].'_min.'.$row['ext']);
	}
	
}

function tellFriend($email, $myName, $friendsName) {
	$db = new Db();
	$q = "INSERT INTO friend_mail(id, from_name, email, friend_name, add_date) VALUES(NULL, '".escape($myName)."', '".escape($email)."', '".escape($friendsName)."', '".date("Y-m-d G:i:s")."')";
	$db->query($q);
	return $db->lastId();
}

function delFlat($nrApp, $userid) {
	$db = new Db();
	$db->query("DELETE FROM list WHERE id='".escape($nrApp)."' AND userid='".$userid."'");
}

function delRent($nrRent, $userid) {
	$db = new Db();
	$db->query("DELETE FROM rent WHERE id='".escape($nrRent)."' AND userid='".$userid."'");
}

function isUsersFlat($userid, $nrFlat) {
	$db = new Db();
	$db->query("SELECT count(*) AS total FROM list WHERE userid='".escape($userid)."' AND id='".$nrFlat."'");
	$row = $db->getNextRow();
	return $row['total'];
}

function getRefuseAppReason($nrFlat) {
	$db = new Db();
	$q = "SELECT ref_mess FROM refused WHERE app_id='".escape($nrFlat)."' AND deleted=0";
	$db->query($q);
	$row = $db->getNextRow();
	return $row['ref_mess'];
}

function getFlatStats($idFlat, $time='now') {
	$db = new Db();
	if($time == 'now') {
		$date = " AND time LIKE '".date("Y-m-d")."%'";
	}
	$q = "SELECT count(distinct(ip)) AS total_today_unique, count(*) AS total_today FROM flat_stats WHERE id_flat='".escape($idFlat)."'".$date;
	$db->query($q);
	$row = $db->getNextRow();
	return $row;
}

function getStatsAllAnn($idFlat) {
	$db = new Db();
	$q = "SELECT *, SUBSTRING(time,1,10) as t FROM flat_stats WHERE id_flat='".escape($idFlat)."'";
	$db->query($q);
	while($row = $db->getNextRow()) {
		$retData[] = $row;
	}
	return $retData;
}

function getGAds($type='simple') {
	if($type == 'simple') {
		$ret = '
<script type="text/javascript"><!--
google_ad_client = "pub-5949181121748532";
/* 468x60, created 2/8/11 */
google_ad_slot = "3794712830";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	';

	}
	if($type == 'links') {
		$ret = '
			<script type="text/javascript"><!--
				google_ad_client = "pub-5949181121748532";
				google_ad_slot = "4291503117";
				google_ad_width = 200;
				google_ad_height = 90;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
		';
		$ret = '
			<script type="text/javascript"><!--
google_ad_client = "pub-5949181121748532";
/* 468x60, created 2/8/11 */
google_ad_slot = "3794712830";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		';
	}
	return $ret;
}

function getPromoAds() {
//			<script src=http://promo.md/Ex/Default.aspx?RID=2075></script>
	$promo = '
			<script src="http://promo.md/Ex/Default.aspx?RID=2077"></script>
	';
//	return false;
	return $promo;
}

function isCheatOn() {
	$db = new Db();
	$q = "SELECT statut FROM ch";
	$db->query($q);
	$row = $db->getNextRow();
	return $row['statut'];
}
?>