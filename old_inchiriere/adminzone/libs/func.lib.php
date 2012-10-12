<?php
		require '../login.php';
		$db = new Db();
		
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
		
?>
<div id="general_stats">
			<a href="../admin.php">Main Menu</a>
			<table>
				<tr>
					<td>Total vizite: </td>
					<td><span class="textBold"><?php echo $totalVizite['total']?></span> (unice:<?php echo $totalViziteUnice['total']?>)</td>
					<td>&nbsp;&nbsp;Total vizite astazi: </td>
					<td><span class="textBold textRed"><?php echo $totalViziteAzi['total']?></span> (unice:<?php echo $totalViziteUniceAzi['total']?>)</td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=gazde_total">Total gazde:</a> </td>
					<td><span class="textBold"><?php echo $totalAnn['total']?></span> (In asteptare: <?php echo $totalAnnWaiting['total']?>)</td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=gazde&time=today">Total gazde astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalAzi['total']?></span> (In asteptare: <?php echo $totalAnnAziWaiting['total']?>)</td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=inchirieri_total">Total inchirieri:</a> </td>
					<td><span class="textBold"><?php echo $totalInc['total']?></span> (In asteptare: <?php echo $totalIncWaiting['total']?>)</td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=inchirieri_total&time=today">Total inchirieri astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalIncAzi['total']?></span> (In asteptare: <?php echo $totalIncAziWaiting['total']?>)</td>
				</tr>
				<tr>
					<td>Total useri: </td>
					<td><span class="textBold"><?php echo $totalUsers['total']?></span></td>
					<td>&nbsp;&nbsp;Total useri astazi: </td>
					<td><span class="textBold textRed"><?php echo $totalUsersAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=bugs_total">Total bugs:</a> </td>
					<td><span class="textBold"><?php echo $totalBugs['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=bugs_total&time=today">Total bugs astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalBugsAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=false_total">Total false nb:</a> </td>
					<td><span class="textBold"><?php echo $totalFalseNb['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=false_total&time=today">Total false nb astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalFalseNbAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=improvement_total">Total improvement:</a> </td>
					<td><span class="textBold"><?php echo $totalImpr['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=improvement_total&time=today">Total improvement astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalImprAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=subs_total">Total subscriptions:</a> </td>
					<td><span class="textBold"><?php echo $totalSubs['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=subs_total&time=today">Total subscriptions astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalSubsAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=friend_total">Total friends mail:</a> </td>
					<td><span class="textBold"><?php echo $totalFri['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=friend_total&time=today">Total friends mail astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalFriAzi['total']?></span></td>
				</tr>
				<tr>
					<td><a href="contentSimple.lib.php?action=photos_total">Total photos:</a> </td>
					<td><span class="textBold"><?php echo $totalPh['total']?></span></td>
					<td>&nbsp;&nbsp;<a href="contentSimple.lib.php?action=photos_total&time=today">Total photos astazi:</a> </td>
					<td><span class="textBold textRed"><?php echo $totalPhAzi['total']?></span></td>
				</tr>
			</table>
		</div>
		<br />