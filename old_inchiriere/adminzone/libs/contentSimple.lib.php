<?php require '../login.php'?>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<link href="../css/sorter.css" type="text/css" rel="stylesheet">
<link href="../css/ui.datepicker.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="../js/calender_date_picker.js"></script>
<style>
	table{
		font-size: 10px;
	}
</style> 
<?php
	require '../../classes/Db.class.php';
	require 'func.lib.php';
	date_default_timezone_set('Europe/Chisinau');
	$db = new Db();
	$action = $_GET['action'];
	switch($action) {
		case 'gazde_total'		: manageGazde(); break;
		case 'inchirieri_total'	: manageInchirieri(); break;
		case 'bugs_total'		: manageBugs(); break;
		case 'improvement_total': manageImprovements(); break;
		case 'false_total'		: manageFalse(); break;
		case 'subs_total'		: manageSubs(); break;
		case 'friend_total'		: manageFriendEmails(); break;
		case 'photos_total'		: managePhotos(); break;
		case 'failed'			: failed(); break;
		case 'sondaj_total'		: sondaj(); break;
	}
	
	function sondaj() {
		global $db;
		$q = "SELECT * FROM sondaj";
		$db->query($q);
		$table = '<table>
						<tr>
							<td>
								<b>Text</b>
							</td>
							<td>
								<b>Add date</b>
							</td>
						</tr>';
		while($row = $db->getNextRow()) {
			$table .= '<tr><td>'.$row['text'].'</td><td>'.$row['add_date'].'</td></tr>';
		}
		$table .= '</table>';
		echo $table;
	}
	function failed() {
		global $db;
		$q = "SELECT * FROM log_att";
		$db->query($q);
		while($row = $db->getNextRow()) {
			echo '<br>'.$row['email'].'-'.$row['pass'].'<br>';
		}
	}
	function managePhotos() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM photos WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM photos ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">photo_type</th>
							<th class="textBold" align="center">add_date</th>
							<th class="textBold" align="center">nr_app</th>
							<th class="textBold" align="center">ext</th>
							<th class="textBold" align="center">photo</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'">'.$row['photo_type'].'</td>
					<td class="'.$class.'">'.$row['add_date'].'</td>
					<td class="'.$class.'">'.$row['nr_app'].'</td>
					<td class="'.$class.'">'.$row['ext'].'</td>
					<td class="'.$class.'"><img src="../../photos/'.$row['id'].'_min.'.$row['ext'].'"></td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageFriendEmails() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM friend_mail WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM friend_mail ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">from_name</th>
							<th class="textBold" align="center">email</th>
							<th class="textBold" align="center">friend_name</th>
							<th class="textBold" align="center">add_date</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['from_name'].'</td>
					<td class="'.$class.'">'.$row['email'].'</td>
					<td class="'.$class.'">'.$row['friend_name'].'</td>
					<td class="'.$class.'">'.$row['add_date'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageSubs() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM subs WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM subs ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">raion</th>
							<th class="textBold" align="center">nr_rooms</th>
							<th class="textBold" align="center">from_price</th>
							<th class="textBold" align="center">to_price</th>
							<th class="textBold" align="center">email</th>
							<th class="textBold" align="center">valuta</th>
							<th class="textBold" align="center">unsubs</th>
							<th class="textBold" align="center">date_subs</th>
							<th class="textBold" align="center">etaj</th>
							<th class="textBold" align="center">receive_status</th>
							<th class="textBold" align="center">lang</th>
							<th class="textBold" align="center">ip</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['raion'].'</td>
					<td class="'.$class.'">'.$row['nr_rooms'].'</td>
					<td class="'.$class.'">'.$row['from_price'].'</td>
					<td class="'.$class.'">'.$row['to_price'].'</td>
					<td class="'.$class.'">'.$row['email'].'</td>
					<td class="'.$class.'">'.$row['valuta'].'</td>
					<td class="'.$class.'">'.$row['unsubs'].'</td>
					<td class="'.$class.'">'.$row['date_subs'].'</td>
					<td class="'.$class.'">'.$row['etaj'].'</td>
					<td class="'.$class.'">'.$row['receive_status'].'</td>
					<td class="'.$class.'">'.$row['lang'].'</td>
					<td class="'.$class.'">'.$row['ip'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageFalse() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM false_number WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM false_number ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">name</th>
							<th class="textBold" align="center">number</th>
							<th class="textBold" align="center">add_date</th>
							<th class="textBold" align="center">ip</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'">'.$row['name'].'</td>
					<td class="'.$class.'">'.$row['number'].'</td>
					<td class="'.$class.'">'.$row['add_date'].'</td>
					<td class="'.$class.'">'.$row['ip'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageImprovements() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM improvement WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM improvement ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">content</th>
							<th class="textBold" align="center">browser</th>
							<th class="textBold" align="center">add_date</th>
							<th class="textBold" align="center">ip</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'">'.$row['content'].'</td>
					<td class="'.$class.'">'.$row['browser'].'</td>
					<td class="'.$class.'">'.$row['add_date'].'</td>
					<td class="'.$class.'">'.$row['ip'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
					
					<!--<td align="center">'.$row['televizor'].'</td>
					<td align="center">'.$row['mobila'].'</td>
					<td align="center">'.$row['masina_spalat'].'</td>
					<td align="center">'.$row['frigider'].'</td>
					<td align="center">'.$row['statut'].'</td>-->
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageBugs() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM user_bugs WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM user_bugs ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">content</th>
							<th class="textBold" align="center">browser</th>
							<th class="textBold" align="center">add_date</th>
							<th class="textBold" align="center">ip</th>
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'">'.$row['content'].'</td>
					<td class="'.$class.'">'.$row['browser'].'</td>
					<td class="'.$class.'">'.$row['add_date'].'</td>
					<td class="'.$class.'">'.$row['ip'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
					
					<!--<td align="center">'.$row['televizor'].'</td>
					<td align="center">'.$row['mobila'].'</td>
					<td align="center">'.$row['masina_spalat'].'</td>
					<td align="center">'.$row['frigider'].'</td>
					<td align="center">'.$row['statut'].'</td>-->
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageInchirieri() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$ref = $_GET['app_id'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($del) {
			$q = "DELETE FROM rent WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$q = "UPDATE rent SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		if($ref) {
			$q = "UPDATE rent SET accept_status='r' WHERE id=".$ref;
			$db->query($q);
			$nr_app = $_GET['app_id'];
			$userid = $_GET['userid'];
			$mess = $_GET['mess'];
			$q = "INSERT INTO refused(id, app_id, userid, ref_mess, add_date) VALUES(NULL, ".$nr_app.", ".$userid.", '".$mess."', NOW())";
			$db->query($q);
		}
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM rent ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">title</th>
							<th class="textBold" align="center">annonce</th>
							<th class="textBold" align="center">nr_r</th>
							<th class="textBold" align="center">et</th>
							<th class="textBold" align="center">price</th>
							<th class="textBold" align="center">fix</th>
							<th class="textBold" align="center">mobil</th>
							<th class="textBold" align="center">email</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">added</th>
							<th class="textBold" align="center">raion</th>
							<th class="textBold" align="center">Options</th>
							
							<!--<th class="textBold" align="center">televizor</th>
							<th class="textBold" align="center">mobila</th>
							<th class="textBold" align="center">masina_spalat</th>
							<th class="textBold" align="center">frigider</th>
							<th class="textBold" align="center">statut</th>-->
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['title'].'</td>
					<td class="'.$class.'">'.$row['annonce'].'</td>
					<td align="center" class="'.$class.'">'.$row['nr_rooms'].'</td>
					<td class="'.$class.'">'.$row['etaj'].'</td>
					<td class="'.$class.'"><nobr>'.$row['price'].' '.$row['valuta'].'</nobr></td>
					<td class="'.$class.'">'.$row['fix'].'</td>
					<td class="'.$class.'">'.$row['mobil'].'</td>
					<td class="'.$class.'">'.$row['email'].'</td>
					<td align="center" class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'"><nobr>'.$row['added'].'<nobr></td>
					<td align="center" class="'.$class.'">'.$row['raion'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'						
					</td>
					
					<!--<td align="center">'.$row['televizor'].'</td>
					<td align="center">'.$row['mobila'].'</td>
					<td align="center">'.$row['masina_spalat'].'</td>
					<td align="center">'.$row['frigider'].'</td>
					<td align="center">'.$row['statut'].'</td>-->
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	function manageGazde() {
		global $db;
		$js = '
				<script>
					$(document).ready(function() {
						$(".tablesorter").tablesorter({
				            headers: {
				                4: { sorter: false },
				                5: { sorter: false }
				            },
				            widgets:["zebra"],
				            sortlist:[[0]]
				        });
				        $(".date").datepicker();
					});
				</script>
		';
		$notAllowd[] = 'PHPSESSID';
		foreach($_REQUEST as $key=>$value) {
			if(!in_array($key, $notAllowd)) {
				$queryString .= $key.'='.$value;
				$queryString .= '&';
			}
		}
		$del = $_GET['del'];
		$mod = $_GET['mod'];
		$acc = $_GET['acc'];
		$ref = $_GET['app_id'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		$ag = $_GET['ag'];
		if($time == 'today') {
			$date = date("Y-m-d");
		}
		
		if($ag) {
			$q = "UPDATE list SET agentie=1 WHERE id=".$ag;
			$db->query($q);
		}
		if($del) {
			$q = "DELETE FROM list WHERE id=".$del;
			$db->query($q);
		}
		if($acc) {
			require_once '../../include/data/emailing/emailing.lib.php';
			require_once '../../conf/frameworkFunctions.lib.php';
			$subsArr = sendSubsMails($acc);
			$q = "UPDATE list SET accept_status='a' WHERE id=".$acc;
			$db->query($q);
			$q = "UPDATE refused SET deleted=1 WHERE app_id=".$acc;
			$db->query($q);
		}
		if($ref) {
			$q = "UPDATE list SET accept_status='r' WHERE id=".$ref;
			$db->query($q);
			$nr_app = $_GET['app_id'];
			$userid = $_GET['userid'];
			$mess = $_GET['mess'];
			$q = "INSERT INTO refused(id, app_id, userid, ref_mess, add_date) VALUES(NULL, ".$nr_app.", ".$userid.", '".$mess."', NOW())";
			$db->query($q);
		}
		if($date) {
			$opt .= " WHERE added LIKE '".$date."%'";
		}
		
		$q = "SELECT * FROM list ".$opt." ORDER BY id DESC";
		$db->query($q);
		$table = '
				<form action="contentSimple.lib.php" method="get">
					Date:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<form action="contentSimple.lib.php" method="get">
					Nr:<br />
					<input type="text" class="date" name="date">
					<input type="hidden" name="action" value="gazde_total">&nbsp;
					<input type="submit" class="but" value="Filter">
				</form>
				<table border="0" class="tablesorter" cellpadding="0" >
					<thead>
						<tr>
							<th class="textBold" align="center">id</th>
							<th class="textBold" align="center">title</th>
							<th class="textBold" align="center">annonce</th>
							<th class="textBold" align="center">nr_r</th>
							<th class="textBold" align="center">et</th>
							<th class="textBold" align="center">price</th>
							<th class="textBold" align="center">fix</th>
							<th class="textBold" align="center">mobil</th>
							<th class="textBold" align="center">email</th>
							<th class="textBold" align="center">userid</th>
							<th class="textBold" align="center">added</th>
							<th class="textBold" align="center">raion</th>
							<th class="textBold" align="center">Options</th>
							
							<!--<th class="textBold" align="center">televizor</th>
							<th class="textBold" align="center">mobila</th>
							<th class="textBold" align="center">masina_spalat</th>
							<th class="textBold" align="center">frigider</th>
							<th class="textBold" align="center">statut</th>-->
						</tr>
					</thead>
					<tbody>
					
		';
		while($row = $db->getNextRow()) {
			if($class == 'odd') {
				$class = 'even';
			} else {
				$class = 'odd';
			}
			if(!$row['agentie']) {
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'ag='.$row['id'].'">Agentie</a><br />';
			}
			if($row['accept_status'] == 'w') {
				$class = 'yellow';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			}
			if($row['accept_status'] == 'r') {
				$class = 'red';
				$options .= '<a href="contentSimple.lib.php?'.$queryString.'acc='.$row['id'].'">Accept</a><br />';
			} else {
				$options .= '<a href="javascript:;" onClick="refuseFunc('.$row['id'].', '.$row['userid'].');">Refuse</a><br />';
//				$options .= '<a href="contentSimple.lib.php?action=gazde_total&ref='.$row['id'].'">Refuse</a><br />';
			}
			$tr .= '
				<tr class="'.$class.'">
					<td align="center" class="'.$class.'">'.$row['id'].'</td>
					<td class="'.$class.'">'.$row['title'].'</td>
					<td class="'.$class.'">'.$row['annonce'].'</td>
					<td align="center" class="'.$class.'">'.$row['nr_rooms'].'</td>
					<td class="'.$class.'">'.$row['etaj'].'</td>
					<td class="'.$class.'"><nobr>'.$row['price'].' '.$row['valuta'].'</nobr></td>
					<td class="'.$class.'">'.$row['fix'].'</td>
					<td class="'.$class.'">'.$row['mobil'].'</td>
					<td class="'.$class.'">'.$row['email'].'</td>
					<td align="center" class="'.$class.'">'.$row['userid'].'</td>
					<td class="'.$class.'"><nobr>'.$row['added'].'<nobr></td>
					<td align="center" class="'.$class.'">'.$row['raion'].'</td>
					<td align="center" class="'.$class.'">
						<a href="contentSimple.lib.php?'.$queryString.'del='.$row['id'].'">Del</a>
						<br />
						<a href="contentSimple.lib.php?'.$queryString.'&mod='.$row['id'].'">Mod</a>
						<br />
						'.$options.'
					</td>
					
					<!--<td align="center">'.$row['televizor'].'</td>
					<td align="center">'.$row['mobila'].'</td>
					<td align="center">'.$row['masina_spalat'].'</td>
					<td align="center">'.$row['frigider'].'</td>
					<td align="center">'.$row['statut'].'</td>-->
				</tr>
			';
			$options = false;
		}
		$table = $table.$tr.'</tbody></table>';
		echo $js.$table;
	}
	echo '	
			<div class="displayNone" id="motivul" style="position:fixed; left:430px; top:150px; background-color:#f6f6f6;padding:10px;border:3px solid">
				<form action="contentSimple.lib.php?action=gazde_total" method="GET">
					<b>Motivul: (app nr: <span id="app_nr"></span>)</b><br />
					<textarea name="mess" style="width:500px; height:150px"></textarea>
					<input type="hidden" name="app_id" id="app_id">
					<input type="hidden" name="action" value="gazde_total">
					<input type="hidden" name="ref" value="ref">
					<input type="hidden" name="userid" id="userid">
					<br />
					<br />
					<input type="submit" class="but" value="Ok">&nbsp;&nbsp;
					<input type="button" class="but" value="Cancel" onClick="$(\'#motivul\').hide();">
				</form>
			</div>
			<script>
				function refuseFunc(appId, userid) {
//					$("#motivul").removeClass("displayNone");
					$("#motivul").show();
					$("#app_nr").html(appId);
					$("#app_id").val(appId);
					$("#userid").val(userid);
				}
			</script>
	';
?>