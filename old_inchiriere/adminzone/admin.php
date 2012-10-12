<?php
	@session_start();
	date_default_timezone_set('Europe/Chisinau');
	function __autoload($class_name) {
    	require_once '../classes/'. $class_name . '.class.php';
	}
	require "login.php";
	
	$db = new Db();
	
	$db->query("SELECT * FROM user_grants WHERE userid=".$_SESSION['adminid']);
	$grants = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM list");
	$totalAnn = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%'");
	$totalAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM list WHERE accept_status='w'");
	$totalAnnWaiting = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='w'");
	$totalAnnAziWaiting = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM rent");
	$totalInc = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM rent WHERE added LIKE '".date("Y-m-d")."%'");
	$totalIncAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM rent WHERE accept_status='w'");
	$totalIncWaiting = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM rent WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='w'");
	$totalIncAziWaiting = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM stats");
	$totalVizite = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM stats WHERE time LIKE '".date("Y-m-d")."%'");
	$totalViziteAzi = $db->getNextRow();
	$db->query("SELECT COUNT(DISTINCT(ip)) as total FROM stats");
	$totalViziteUnice = $db->getNextRow();
	$db->query("SELECT COUNT(DISTINCT(ip)) as total FROM stats WHERE time LIKE '".date("Y-m-d")."%'");
	$totalViziteUniceAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM user_bugs");
	$totalBugs = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM user_bugs WHERE add_date LIKE '".date("Y-m-d")."%'");
	$totalBugsAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM false_number");
	$totalFalseNb = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM false_number WHERE add_date LIKE '".date("Y-m-d")."%'");
	$totalFalseNbAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM improvement");
	$totalImpr = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM improvement WHERE add_date LIKE '".date("Y-m-d")."%'");
	$totalImprAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM subs");
	$totalSubs = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM subs WHERE date_subs LIKE '".date("Y-m-d")."%'");
	$totalSubsAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM friend_mail");
	$totalFri = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM friend_mail WHERE add_date LIKE '".date("Y-m-d")."%'");
	$totalFriAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM photos");
	$totalPh = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM photos WHERE add_date LIKE '".date("Y-m-d")."%'");
	$totalPhAzi = $db->getNextRow();
	
	$db->query("SELECT count(*) as total FROM users");
	$totalUsers = $db->getNextRow();
	$db->query("SELECT count(*) as total FROM users WHERE timp LIKE '".date("Y-m-d")."%'");
	$totalUsersAzi = $db->getNextRow();
	
	$db->query("SELECT statut FROM ch");
	$chStatut = $db->getNextRow();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/admin.css" type="text/css" rel="stylesheet">
<link href="css/sorter.css" type="text/css" rel="stylesheet">
<link href="css/ui.datepicker.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/corner.js"></script>
<script type="text/javascript" src="js/calender_date_picker.js"></script>
<script type="text/javascript" src="js/core.js"></script>
<script type="text/javascript" src="js/jquery.timer.js"></script>
<script type="text/javascript" src="js/resize.js"></script>
<script type="text/javascript" src="js/jquery.flot.pack.js"></script>
<!--[if IE]><script language="javascript" type="text/javascript" src="../excanvas.pack.js"></script><![endif]-->
</head>

<body>
<script>
	$.timer(4000, function() {
		$.ajax({
				url: "libs/content.lib.php?action=ajaxCounter",
				type: "post",
				beforeSend: function() {
			    },
				success: function(xml_doc) {
						eval("v="+xml_doc);
//						$("#id_totalVizite").html(v['stats_total']+" "+v['stats_unice']);
						$("#id_totalViziteAzi").html(v['stats_azi']+ " "+v['stats_unice_azi']);
//						$("#id_totalGazde").html(v['ann_total']+" "+v['total_waitingGazde']);
						$("#id_totalGazdeAzi").html(v['ann_total_azi']+" "+v['total_waitingAziGazde']);
//						$("#id_totalInc").html(v['total_inc']+" "+v['total_waitingInc']);
						$("#id_totalIncAzi").html(v['total_incAzi']+" "+v['total_waitingAziInc']);
						$("#last_page").html(v['last_page']);
						$("#browser").html(v['browser']);
						$("#referer").html(v['referer']);
			}
		});
	});
</script>
<div id="overlay"></div>
<div id="loader"></div>
<div id="menu_callert" style="background-color: #f6f6f6; margin-bottom:10px; width:80px"><a href="javascript:void(0)" id="menu_caller">Hide Menu</a></div>
<div class="main_div positionRelative">
<!--  <div class="textCenter textSize30 textVerdana marginBottom10">Best-diets.eu - Administration Panel</div>-->
	<div id="menu" class="borderGrey width200 colorGrey padding5 displayLeft">
	<?php if ($grants['stats']) {?>
		<a href="##" id="stats_main" class="a_menu">Stats</a><br />
		<div class="displayNone paddingLeft20" id="sub_content_stats">
			<a href="javascript:void(0)" class="a_sub_menu" id="stats">List</a><br />
			<a href="javascript:void(0)" class="a_sub_menu" id="stats_general">General Stats</a>
		</div>
	<?php }?>
	<?php if ($grants['admins']) {?>
		<a href="##" id="admins" class="a_menu">Admins</a><br>
	<?php }?>
	<?php if ($grants['users']) {?>
		<a href="##" id="users" class="a_menu">Users</a><br>
	<?php }?>
	
	<?php if ($grants['advertising']) {?>
		<a href="##" id="advertising" class="a_menu">Advertising</a><br />
	<?php }?>
	<?php if ($grants['translations']) {?>
		<a href="##" id="translate" class="a_menu">Translations</a><br />
		<a href="##" id="news" class="a_menu">News</a><br />
	<?php }?>
	<?php if ($grants['db']) {?>
		<a href="##" id="mysql" class="a_menu">Database management</a><br />
	<?php }?>
		<a href="##" id="logout" class="a_menu">Logout</a><br />
	</div>
	<div id="main_content" class="marginLeft5 positionAbsolute left212">
		<div id="general_stats">
			<table>
				<tr>
					<td>Total vizite: </td>
					<td id="id_totalVizite"><span class="textBold"><?php echo $totalVizite['total']?></span> (unice: <?php echo $totalViziteUnice['total']?>)</td>
					<td>&nbsp;&nbsp;Total vizite astazi: </td>
					<td id="id_totalViziteAzi" style="font-size:25px"><span class="textBold textRed"><?php echo $totalViziteAzi['total']?></span> (unice: <?php echo $totalViziteUniceAzi['total']?>)</td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=gazde_total">Total gazde:</a> </td>
					<td id="id_totalGazde"><span class="textBold"><?php echo $totalAnn['total']?></span> (In asteptare: <?php echo $totalAnnWaiting['total']?>)</td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=gazde&time=today">Total gazde astazi:</a> </td>
					<td id="id_totalGazdeAzi" style="font-size:25px"><span class="textBold textRed"><?php echo $totalAzi['total']?></span> (In asteptare: <?php echo $totalAnnAziWaiting['total']?>)</td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=inchirieri_total">Total inchirieri:</a> </td>
					<td id="id_totalInc"><span class="textBold"><?php echo $totalInc['total']?></span> (In asteptare: <?php echo $totalIncWaiting['total']?>)</td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=inchirieri_total&time=today">Total inchirieri astazi:</a> </td>
					<td id="id_totalIncAzi" style="font-size:25px"><span class="textBold textRed"><?php echo $totalIncAzi['total']?></span> (In asteptare: <?php echo $totalIncAziWaiting['total']?>)</td>
				</tr>
				<tr>
					<td>Total useri: </td>
					<td><span class="textBold"><?php echo $totalUsers['total']?></span></td>
					<td>&nbsp;&nbsp;Total useri astazi: </td>
					<td><span class="textBold textRed"><?php echo $totalUsersAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=bugs_total">Total bugs:</a> </td>
					<td><span class="textBold"><?php echo $totalBugs['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=bugs_total&time=today">Total bugs astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalBugsAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=false_total">Total false nb:</a> </td>
					<td><span class="textBold"><?php echo $totalFalseNb['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=false_total&time=today">Total false nb astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalFalseNbAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=improvement_total">Total improvement:</a> </td>
					<td><span class="textBold"><?php echo $totalImpr['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=improvement_total&time=today">Total improvement astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalImprAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=subs_total">Total subscriptions:</a> </td>
					<td><span class="textBold"><?php echo $totalSubs['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=subs_total&time=today">Total subscriptions astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalSubsAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=friend_total">Total friends mail:</a> </td>
					<td><span class="textBold"><?php echo $totalFri['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=friend_total&time=today">Total friends mail astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalFriAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=photos_total">Total photos:</a> </td>
					<td><span class="textBold"><?php echo $totalPh['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="libs/contentSimple.lib.php?action=photos_total&time=today">Total photos astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalPhAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="libs/contentSimple.lib.php?action=sondaj_total">Total sondaj</a> </td>
					<td> </td>
					<td> </td>
					<td> </td>
				</tr>
			</table>
			<br />
			<br />
			Special mode: <?php 
						if($chStatut['statut']==0) {
							echo 'off';
						} else {
							echo '<span style="color:red;font-weight:bold;">on</span>';
						}
					  ?>
			<br />
			<br />
			<br />
			<span>Last visited page: </span>
			<span id="last_page"></span>
			<br />
			<br />
			<span>Browser: </span>
			<span id="browser"></span>
			<br />
			<br />
			<span>Referer: </span>
			<span id="referer"></span>
			<br />
			<br />
		</div>
	</div>
	
</div>
</body>
</html>
