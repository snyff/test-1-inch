<?php
	@session_start();
	date_default_timezone_set('Europe/Chisinau');
	function __autoload($class_name) {
    	require_once '../../classes/'. $class_name . '.class.php';
	}
	require "../login.php";
	
	$action = $_REQUEST['action'];
	
	switch ($action) {
		case 'no_action': return;
		case 'stats_general': statsGeneral(); break;
		case 'stats' 	: contentStats(); break;
		case 'admins'	: contentAdmins(); break;
		case 'users' 	: contentUsers(); break;
		case 'products' : break;
		case 'content' 	: break;
		case 'money' 	: break;
		case 'translate': contentTranslate(); break;
		case 'advertising' : contentAdvertising(); break;
		case 'mysql'	: contentMysql (); break;
		case 'ajaxCounter'	: ajaxCounter (); break;
		case 'news'	: News(); break;
		default:{
			$sub_action = $_REQUEST['sub_action'];
			switch ($sub_action) {
				case 'homepage'		:
				case 'how_it_works'	:
				case 'take_a_tour'	:
				case 'register'		:
				case 'forum'		:
				case 'contacts'		:
				case 'about_us'		: contentManage(); break;
				case 'articles'		: contentArticles(); break;
				case 'category'		: contentProductsCategory(); break;
				case 'sub_products'		: echo "sub_products"; break;
			}
		}
	}
	
	function News() {
		$db = new Db();
		$romShort = $_REQUEST['rom_text_short'];
		$romLong = $_REQUEST['rom_text_long'];
		$engShort = $_REQUEST['eng_text_short'];
		$engLong = $_REQUEST['eng_text_long'];
		$rusShort = $_REQUEST['rus_text_short'];
		$rusLong = $_REQUEST['rus_text_long'];
		
		$delNews = $_REQUEST['del_news'];
		$modNews = $_REQUEST['news_id'];
		if($delNews) {
			$q = "DELETE FROM news WHERE id=".$delNews;
			$db->query($q);
		}
		
		if($romShort && $romLong && $rusShort && $rusLong && !$modNews) {
			$q = "INSERT INTO news(id, 
									date_added, 
									short_text_ro, 
									long_text_ro, 
									short_text_ru, 
									long_text_ru,
									short_text_en, 
									long_text_en
								) 
				  			VALUES(NULL, 
				  					NOW(), 
				  					'".addslashes($romShort)."', 
				  					'".addslashes($romLong)."', 
				  					'".addslashes($rusShort)."', 
				  					'".addslashes($rusLong)."',
				  					'".addslashes($engShort)."', 
				  					'".addslashes($engLong)."'
				  				)";
			$db->query($q);
		} elseif($romShort && $romLong && $rusShort && $rusLong && $modNews) {
			$q = "UPDATE news SET short_text_ro='".addslashes($romShort)."', long_text_ro='".addslashes($romLong)."', short_text_ru='".addslashes($rusShort)."', long_text_ru='".addslashes($rusLong)."', short_text_en='".addslashes($engShort)."', long_text_en='".addslashes($engLong)."' WHERE id=".$modNews;
			$db->query($q);
		}
		$html = '
			<div class="positionAbsolute borderGrey colorGrey left20 top30 displayNone zOver" id="news_add_div">
				<form id="news_add_form">
					<div class="textBold textCenter textVerdana">Add news</div>
					<table border="0">
						<tr>
							<td>Romanian short text:<br>
								<textarea id="rom_text_short" class="resize height30" name="rom_text_short"></textarea>
							</td>
						</tr>
						<tr>
							<td>Romanian long text:<br>
								<textarea id="rom_text_long" class="resize height30" name="rom_text_long"></textarea>
							</td>
						</tr>
						<tr>
							<td>English short text:<br>
								<textarea id="eng_text_short" class="resize height30" name="eng_text_short"></textarea>
							</td>
						</tr>
						<tr>
							<td>English long text:<br>
								<textarea id="eng_text_long" class="resize height30" name="eng_text_long"></textarea>
							</td>
						</tr>
						<tr>
							<td>Russian short text:<br>
								<textarea id="rus_text_short" class="resize height30" name="rus_text_short"></textarea>
							</td>
						</tr>
						<tr>
							<td>Russian long text:<br>
								<textarea id="rus_text_long" class="resize height30" name="rus_text_long"></textarea>
							</td>
						</tr>
					 	<tr>
							<td>
								<input type="button" value="Save" id="add_news_but" class="but"> 
								<input type="button" value="Cancel" id="cancel_add_news_but" class="but">
								<input type="hidden" value="" name="news_id" id="news_id">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<input type="button" class="but" value="Add news" id="news_add">
			<br />
			<br />
			<table border="0" class="tablesorter width1000" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">Date</td>
					<td class="textBold">Text Ro Short</td>
					<td class="textBold">Text Ro Long</td>
					<td class="textBold">Text En Short</td>
					<td class="textBold">Text En Long</td>
					<td class="textBold">Text Ru Short</td>
					<td class="textBold">Text Ru Long</td>
					<td class="textBold">Options</td>
				</tr>
		';
		$q = "SELECT * FROM news";
		$db->query($q);
		while ($row = $db->getNextRow()) {
				$html .= "<tr>
							<td>{$row['id']}</td>
							<td><NOBR>{$row['date_added']}</NOBR></td>
							<td id='".$row['id'].'_short_ro'."'>".stripslashes($row['short_text_ro'])."</td>
							<td id='".$row['id'].'_long_ro'."'>".stripslashes($row['long_text_ro'])."</td>
							<td id='".$row['id'].'_short_en'."'>".stripslashes($row['short_text_en'])."</td>
							<td id='".$row['id'].'_long_en'."'>".stripslashes($row['long_text_en'])."</td>
							<td id='".$row['id'].'_short_ru'."'>".stripslashes($row['short_text_ru'])."</td>
							<td id='".$row['id'].'_long_ru'."'>".stripslashes($row['long_text_ru'])."</td>
							<td>
								<a href='javascript:;' id='del' type='delete_news' news_id='".$row['id']."'><img width='20' src='./images/delete.png'></a>
								<a href='javascript:;' id='mod' type='modify_news' news_id='".$row['id']."'><img width='20' src='./images/edit.png'></a>
							</td>
						  </tr>";
		}
		$html .= "</table>";
		echo $html;
	}
	
	function ajaxCounter() {
		$db = new Db();
		date_default_timezone_set('Europe/Chisinau');
		$db->query("SELECT count(*) as total FROM list");
		$totalAnn = $db->getNextRow();
		$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%' AND agentie=0 AND accept_status='a'");
		$totalAzi = $db->getNextRow();
		
		$db->query("SELECT count(*) as total FROM list WHERE accept_status='w'");
		$totalAnnWaiting = $db->getNextRow();
		$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='w' AND agentie=0");
		$totalAnnAziWaiting = $db->getNextRow();
		
//		$db->query("SELECT count(*) as total FROM rent");
//		$totalInc = $db->getNextRow();
		$db->query("SELECT count(*) as total FROM rent WHERE added LIKE '".date("Y-m-d")."%'");
		$totalIncAzi = $db->getNextRow();
		
//		$db->query("SELECT count(*) as total FROM rent WHERE accept_status='w'");
//		$totalIncWaiting = $db->getNextRow();
		$db->query("SELECT count(*) as total FROM rent WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='w'");
		$totalIncAziWaiting = $db->getNextRow();
		
		$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='w' AND agentie=1");
		$totalAgentiiWaiting = $db->getNextRow();
		
		$db->query("SELECT count(*) as total FROM list WHERE added LIKE '".date("Y-m-d")."%' AND accept_status='a' AND agentie=1");
		$totalAgentiiAccepted = $db->getNextRow();
		
		
		$db->query("SELECT url, browser, referer FROM stats ORDER BY id DESC LIMIT 1");
		$lastPage = $db->getNextRow();
		
//		$db->query("SELECT count(*) as total FROM stats");
//		$totalVizite = $db->getNextRow();
		$db->query("SELECT count(*) as total FROM stats WHERE time LIKE '".date("Y-m-d")."%'");
		$totalViziteAzi = $db->getNextRow();
//		$db->query("SELECT COUNT(DISTINCT(ip)) as total FROM stats");
//		$totalViziteUnice = $db->getNextRow();
		$db->query("SELECT COUNT(DISTINCT(ip)) as total FROM stats WHERE time LIKE '".date("Y-m-d")."%'");
		$totalViziteUniceAzi = $db->getNextRow();
		
		echo "{	 'stats_azi':'".$totalViziteAzi['total']."', 
				 'stats_unice_azi':'(Unice: ".$totalViziteUniceAzi['total'].")',
				 'ann_total_azi':'".$totalAzi['total']."',
				 'total_waitingAziGazde':'(In asteptare: ".$totalAnnAziWaiting['total'].")<br />".$totalAgentiiAccepted['total']." (In asteptare: ".$totalAgentiiWaiting['total'].") - Agentii',
				 'total_incAzi':'".$totalIncAzi['total']."',
				 'total_waitingAziInc':'(In asteptare: ".$totalIncAziWaiting['total'].")',
				 'last_page':'".$lastPage['url']."',
				 'browser':'".$lastPage['browser']."',
				 'referer':'".$lastPage['referer']."'
				}";
//		echo "{	 'stats_total':'".$totalVizite['total']."', 
//				 'stats_azi':'".$totalViziteAzi['total']."', 
//				 'stats_unice':'(Unice: ".$totalViziteUnice['total'].")', 
//				 'stats_unice_azi':'(Unice: ".$totalViziteUniceAzi['total'].")',
//				 'ann_total':'".$totalAnn['total']."',
//				 'ann_total_azi':'".$totalAzi['total']."',
//				 'total_waitingGazde':'(In asteptare: ".$totalAnnWaiting['total'].")',
//				 'total_waitingAziGazde':'(In asteptare: ".$totalAnnAziWaiting['total'].")',
//				 'total_inc':'".$totalInc['total']."',
//				 'total_incAzi':'".$totalIncAzi['total']."',
//				 'total_waitingInc':'(In asteptare: ".$totalIncWaiting['total'].")',
//				 'total_waitingAziInc':'(In asteptare: ".$totalIncAziWaiting['total'].")'
//				}";
	}
	
	function statsGeneral() {
		$db = new Db();
		$humanBotOptions = true;
		$checkBox['on'] = 'checked="checked"';
		$withBots 	= $_REQUEST['inc_bots'];
		$withHumans = $_REQUEST['inc_humans'];
		$unic		= $_REQUEST['unic'];
		$outputType = $_REQUEST['output_type'];
		$from 		= $_REQUEST['from'];
		$to 		= $_REQUEST['to'];
		
//=================================================================================== check human or bot
		if($withBots && $withHumans) {
			$humanBotOptions = false;
		}
		
		if($humanBotOptions) {
			$db->query('SELECT bot FROM bots');
			if($withBots) {
				while($row = $db->getNextRow()) {
					$bots .= ' OR browser LIKE "%'.$row['bot'].'%"';
				}
				$bots = substr($bots, 3, strlen($bots));
				$cond .= 'AND ('.$bots.')';
			}
			if($withHumans) {
				while($row = $db->getNextRow()) {
					$bots .= ' AND browser NOT LIKE "%'.$row['bot'].'%"';
				}
				$cond .= $bots;
			}
		}
//=================================================================================== date->from, to
		if($from) {
			$cond .= ' AND SUBSTRING(time,1,10) >= "'.$from.'"';
		}
		if($to) {
			$cond .= ' AND SUBSTRING(time,1,10) <= "'.$to.'"';
		}
//=================================================================================== type of output
		if($unic) {
			$fromTimestamp 	= strtotime($from);
			$toTimestamp 	= strtotime($to);
			$sutka			= 86400;
			for($i=$fromTimestamp;$i<$toTimestamp;$i+=$sutka) {
				$dayUnic = date("Y-m-d", $i);
				$db->query('SELECT count(distinct(ip)) as unic, SUBSTRING(time,1,10) as t FROM stats WHERE SUBSTRING(time,1,10)="'.$dayUnic.'" GROUP BY t');
				$row = $db->getNextRow();
				if($row['t']) {
					$result[$row['t']] = $row['unic'];
				}
			}
		} else {
			$db->query('SELECT *, SUBSTRING(time,1,10) as t FROM stats WHERE 1=1 '.$cond);
		}
		if(!$unic) {
			while($row = $db->getNextRow()) {
				if(!isset($result[$row['t']])) {
					$result[$row['t']] = 1;
				} else {
					$result[$row['t']]++;
				}
			}
		}
		if(count($result)) {
			$totalVisits = array_sum($result);
		}
		if(count($result)) {
			$average = $totalVisits/count($result);
		}
		
		if($result && $outputType == 2) {
			$selected2 = 'selected="selected"';
			$html .= 'Total: <span class="textRed textBold">'.count($result).'</span> days, total visits: <span class="textGreen textBold">'.$totalVisits.'</span>.<br />';
			$html .= '<table border="0" class="tablesorter marginTop5" id="tablesorter">
						<tr>
							<td class="textBold textSize12">Date</td>
							<td class="textBold textSize12">Number of visitors</td>
						</tr>
			';
			foreach($result as $key => $value) {
				if($value >= $average) {
					$key = '<span class="textBold textRed">'.$key.'</span>';
					$value = '<span class="textBold textRed textSize12">'.$value.'</span>';
				}
				$html .= '<tr>
							<td>
								'.$key.'
							</td>
							<td>
								'.$value.'
							</td>
						  </tr>
				';
			}
			$html .= '</table>';
		} elseif($result && $outputType == 1) {
//			[[1, 3], [5, 9], [8, 2], [15, 19], [17, 0]]
			$i=0;
			$selected1 = 'selected="selected"';
			foreach($result as $key => $value) {
				$day = substr($key, 8, strlen($key));
				if($dayFinal > $day) {
					$dayFinal += $day;
				} else {
					$dayFinal = $day;
				}
				$javascriptArray .= "arr[".$dayFinal."][".$value."] = \"".$key."\";\n";
				$str .= '['.$dayFinal.', '.$value.']';
//				$str .= '['.$key.', '.$value.']';
				$i++;
				if($i != count($result)) {
					$str .= ', ';
				}
			}
			$len = $dayFinal;
			$str = '['.$str.']';
			$html .= '
					<div id="placeholder" style="width:600px;height:300px;"></div>
					<br />
					<input type="button" value="Clear" id="clear" class="but">
					<script>
						arr = new Array();
						for(i=0;i<='.$len.';i++) {
							arr[i] = new Array();
						}
						'.$javascriptArray.'
						function showTooltip(x, y, contents) {
					        $(\'<div id="tooltip">\' + contents + \'</div>\').css( {
					            position: \'absolute\',
					            display: \'none\',
					            top: y + 5,
					            left: x + 15,
					            border: \'1px solid #fdd\',
					            padding: \'2px\',
					            \'background-color\': \'#fee\',
					            opacity: 0.80
					        }).appendTo("body").fadeIn(200);
					    }
						var data2 = '.$str.';
					    $("#clear").click(function () {
					    	var plot = $.plot(placeholder, data, options);
					    });
					    
					    var data = [
					        {
					            data: data2
					        }
					    ];
					    
					    var options = {
					    	legend: {show: false},
					        lines: { show: true },
					        points: { show: true },
					        grid: { hoverable: true, clickable: true, markingsColor:"#000" },
					        selection: { mode: "x", color: "green" },
					        yaxis: { min: 0, max: 2000}
					    };
					
					    var placeholder = $("#placeholder");
					
					    placeholder.bind("plotselected", function (event, ranges, item) {
					        $("#selection").text(ranges.xaxis.from.toFixed(1) + " to " + ranges.xaxis.to.toFixed(1));
					
					        var zoom = true;
					        if (zoom)
					            plot = $.plot(placeholder, data,
					                          $.extend(true, {}, options, {
					                        	  	xaxis: { 
							  					      min: ranges.xaxis.from, 
							  					      max: ranges.xaxis.to
							  				    	},
							  				        yaxis: { 
							  				    		min: ranges.yaxis.from, 
								  					    max: ranges.yaxis.to
							  				    	}
					                          }));
					    });
					    
					    $("#placeholder").bind("plotclick", function (event, pos, item) {
					        if (item) {
					            plot.highlight(item.series, item.datapoint);
					        }
					    });

						var previousPoint = null;
					    $("#placeholder").bind("plothover", function (event, pos, item) {
					        $("#x").text(pos.x.toFixed(2));
					        $("#y").text(pos.y.toFixed(2));
				            if (item) {
				                if (previousPoint != item.datapoint) {
				                    previousPoint = item.datapoint;
				                    
				                    $("#tooltip").remove();
				                    var x = item.datapoint[0].toFixed(2),
				                        y = item.datapoint[1].toFixed(2);
				                    var content = parseInt(y)+" visits on "+arr[parseInt(x)][parseInt(y)];
				                    showTooltip(item.pageX, item.pageY, content);
				                }
				            }
				            else {
				                $("#tooltip").remove();
				                previousPoint = null;            
				            }
					    });
					    
					    var plot = $.plot(placeholder, data, $.extend(true, {}, options, {
									    	legend: {show: false},
									        lines: { show: true },
									        points: { show: true },
									        grid: { hoverable: true, clickable: true, markingsColor:"#000" },
									        selection: { mode: "x", color: "green" },
									        xaxis: { 
//									        	mode: "time",
//            									minTickSize: [1, "day"],
//            									min: (new Date("2008/05/02")).getTime(),
//            									max: (new Date("2009/05/30")).getTime()
            									
//										  	  	min: 0,
//										        max: '.count($result).'
									    	},
									        yaxis: { 
										  	  	min: 0,
										        max: 2000
									    	}
						}));
				</script>
';
		}
		
		
		$html = '<fieldset>
					<legend>Period</legend>
					<form id="chart_filter_form" onSubmit="return false;">
						From: <input type="text" name="from" id="from" class="date" value="'.$from.'">&nbsp;&nbsp;To: <input type="text" name="to" id="to" class="date" value="'.$to.'">
						<br />
						<br />
						<span class="textBold">Include:</span> <br />
						<table border="0">
							<tr>
								<td>
									Bots: 
								</td>
								<td>
									<input type="checkbox" name="inc_bots" '.$checkBox[$withBots].'>
								</td>
								<td>
									Output type: 
									<select name="output_type" id="output_type">
										<option value="1" '.$selected1.'>Chart</option>
										<option value="2" '.$selected2.'>List</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									Humans: 
								</td>
								<td>
									<input type="checkbox" name="inc_humans" '.$checkBox[$withHumans].'>
								</td>
								<td>
									<input type="button" id="execute_filter" class="but" value="Filter period">
								</td>
							</tr>
							<tr>
								<td>
									Unique: 
								</td>
								<td>
									<input type="checkbox" name="unic" '.$checkBox[$unic].'>
								</td>
							</tr>
						</table>
					</form>
				 </fieldset>'.$html;
		echo $html;
	}
	
	function contentStats(){
		$db = new Db();
		$html = false;
		$row = false;
		$myIp = array();
		$myIp[] = '89.41.79.151';
		$date 			= $_REQUEST['date'];
		$dateQuery 		= false;
		$ipFilter 		= $_REQUEST['ip_filter'];
		$ipList 		= $_REQUEST['ip_list'];
		$filterBrowser 	= $_REQUEST['filter_browser'];
		$filterPage 	= $_REQUEST['filter_page'];
		$human 			= $_REQUEST['human'];
		$submitBot		= $_REQUEST['submit_bot'];
		
		if($human) {
			$bots = $db->query("SELECT * FROM bots");
			while($botRow = $db->getNextRow()) {
				$humanSql .= ' AND browser NOT LIKE "%'.$botRow['bot'].'%"';
			}
		}
		
		if($submitBot) {
			$db->query("INSERT INTO bots(id, bot) VALUES ('', '".$submitBot."')");
		}
		
		if (isset($filterPage)) {
			$pageFilter = $filterPage;
			$filterPage = ' AND page LIKE "%'.$filterPage.'%"';
		}
		
		if (isset($filterBrowser)) {
			$browserFilter = $filterBrowser;
			$filterBrowser = ' AND browser LIKE "%'.$filterBrowser.'%"';
		}
		
		if (isset($ipFilter)) {
			$ipList = explode(',', $ipList);
			if ($ipFilter == 'only') {
				$cond = '=';
				$operator = 'OR';
			} else {
				$cond = '!=';
				$operator = 'AND';
			}
			for($i=0; $i<count($ipList); $i++){
				$str .= 'ip'.$cond.' "'.$ipList[$i].'"';
				if ($i != count($ipList)-1)
					$str .= ' '.$operator.' ';
			}
			$ipFilterQuery = ' AND '.$str;
			$ipListToString = implode(',', $ipList);
		}
		
	//	$myIp[] = '92.115.80.241';
		
		if (isset($date)) {
			$dateQuery = ' WHERE time LIKE "'.$date.'%"'.$ipFilterQuery.$filterBrowser.$filterPage.$humanSql;
		} else {
			$date = date("Y-m-d");
			$dateQuery = ' WHERE time LIKE "'.$date.'%"'.$ipFilterQuery.$filterBrowser.$filterPage.$humanSql;
		}
		
//		total visits
		$db->query('SELECT count(*) AS total FROM stats '.$dateQuery);
		$total = $db->getNextRow();
		$total = $total['total'];
		
//		total human visits
		$bots = $db->query("SELECT * FROM bots");
		while($botRow = $db->getNextRow()) {
			$humanSqlForCount .= ' AND browser NOT LIKE "%'.$botRow['bot'].'%"';
		}
		$db->query('SELECT count(s.id) AS total FROM stats s '.$dateQuery.$humanSqlForCount);
		$totalHumans = $db->getNextRow();
		$totalHumans = $totalHumans['total'];
		
//		total bots
	    $totalBots = $total - $totalHumans;
		
		$db->query('SELECT * FROM stats '.$dateQuery.' ORDER BY id DESC');
		
		$html = <<<TEXT
			<center>Total visits:<span class="textRed textBold">{$total}</span>; Total human:<span class="textRed textBold">{$totalHumans}</span>; 
			Total bots:<span class="textBold">{$totalBots}</span></center>
			<fieldset class="marginBottom5">
				<legend class="textBold">Filter options</legend>
				Date: 
				<input type='text' class='date' value="{$date}" id="filter_date" name="filter_date">
				<input type='button' value='Filter Date' id="filter_button" name="filter_button" class="but"> (Result for: {$date})
				<input type='button' value='Clear' id="clear_date" name="clear_date" class="but" onclick="$('#filter_date').val('')">
				<br>
				Ip: 
				<select id="ip_option" name="ip_option" class="marginTop5">
					<option value="exclude">exclude</option>
					<option value="only">only</option>
				</select>
				 Ip: 
				<input type="text" id="ip_list" name="ip_list" class="width500" value="{$ipListToString}"> 
				<input type="button" value="Filter Ip" id="filter_ip" name="filter_ip" class="but"><br>
				Browser: <input type="text" id="browser_filter" name="browser_filter" class="width500 marginTop5" value="{$browserFilter}">
				<input type="button" value="Filter Browser" id="filter_browser" name="filter_browser" class="but"><br>
				Page: <input type="text" id="page_filter" name="page_filter" class="width500 marginTop5" value="{$pageFilter}">
				<input type="button" value="Filter Page" id="filter_page" name="filter_page" class="but"><br>
				<input type="button" value="Show Only Humans" id="show_humans" name="show_humans" class="but marginTop5">
				Bot: <input type="text" id="bot_add" name="bot_add" class="width500 marginTop5" value="">
				<input type="button" value="Submit Bot" id="submit_bot" name="submit_bot" class="but marginTop5">
				<br>
				
			</fieldset>
			<table border='0' class="tablesorter width1000" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
<!--					<td class="textBold">Page</td> -->
					<td class="textBold">Ip</td>
					<td class="textBold">Date</td>
					<td class="textBold">Browser</td>
					<td class="textBold">Host</td>
					<td class="textBold">Url</td>
					<td class="textBold">Referer</td>
				</tr>
TEXT;
		
		while ($row = $db->getNextRow()) {
			if (!in_array($row['ip'], $myIp))
				$html .= "<tr>
							<td>{$row['id']}</td>
<!--							<td><NOBR>{$row['page']}</NOBR></td> -->
							<td><NOBR>{$row['ip']}</NOBR></td>
							<td><NOBR>{$row['time']}</NOBR></td>
							<td><NOBR>{$row['browser']}</NOBR></td>
							<td>".gethostbyaddr($row['ip'])."</td>
							<td>{$row['url']}</td>
							<td>{$row['referer']}</td>
						  </tr>";
		}
		$html .= "
				</table>";
		
			
TEXT;
		echo $html;
	}
	
	function contentAdmins(){
		$html = false;
		$row = false;
		$error = false;
		$db = new Db();
		$adminName = $_REQUEST['admin_name'];
		$adminPass = $_REQUEST['admin_pass'];
		$delAdmin = $_REQUEST['del_admin'];
		$admin  = $_REQUEST['admin_modify_name'];
		if (isset($adminModify)) {
			$db->query("UPDATE adm SET nick='".$adminModify."', pass='".$_REQUEST['admin_modify_pass']."' WHERE id='".$_REQUEST['admin_id']."'");
		}
		
		if (isset($delAdmin)) {
			$db->query("SELECT master FROM adm WHERE id='".$delAdmin."'");
			$isMaster = $db->getNextRow();
			if ($isMaster['master']==1) {
				$error = '<div class="marginBottom5 textRed textBold">Master admin cannot be deleted.</div>';
			} else {
				$db->query("DELETE FROM adm WHERE id='".$delAdmin."'");
				$db->query("DELETE FROM user_grants WHERE userid=".$delAdmin);
			}
		}
		
		if (isset($adminName) && isset($adminPass)) {
			$db->query("INSERT INTO adm(id, nick, pass) VALUE('', '".$adminName."', '".$adminPass."')");
			$lastId = $db->lastId();
			$db->query("INSERT INTO user_grants SET
							admins = '{$_REQUEST['admins']}',
							stats  = '{$_REQUEST['stats']}',
							translations  = '{$_REQUEST['translations']}',
							db  = '{$_REQUEST['database']}',
							userid  = '{$lastId}',
							users  = '{$_REQUEST['users']}'
						");
		}
		$db->query('SELECT * FROM adm');
		
		$html = <<<TEXT
			{$error}
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="admin_modify_form">
				<div class="textBold textCenter textVerdana">Modify admin</div>
				<table>
					<tr>
						<td>Name:</td>
						<td><input type="text" id="admin_modify_name" name="admin_modify_name"></td>
					<tr>
				 	<tr>
						<td>Password:</td>
						<td><input type="text" id="admin_modify_pass" name="admin_modify_pass"></td>
					<tr>
					<tr>
						<td> <input type="hidden" id="admin_id" name="admin_id" value=""></td>
						<td><input type="button" value="Save" id="modify_admin_but" name="modify_admin_but" class="but"> <input type="button" value="Cancel" id="cancel_modify_admin_but" class="but"></td>
					<tr>
				</table>
			</div>
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="admin_add_form">
				<div class="textBold textCenter textVerdana">Add admin</div>
				<form id="add_admin">
					<table>
						<tr>
							<td>Name:</td>
							<td><input type="text" id="admin_name" name="admin_name"></td>
						<tr>
					 	<tr>
							<td>Password:</td>
							<td><input type="text" id="admin_pass" name="admin_pass"></td>
						<tr>
						<tr>
							<td>Stats:</td>
							<td><input type="checkbox" value="1" name="stats"></td>
						<tr>
						<tr>
							<td>Admins:</td>
							<td><input type="checkbox" value="1" name="admins"></td>
						<tr>
						<tr>
							<td>Users:</td>
							<td><input type="checkbox" value="1" name="users"></td>
						<tr>
						<tr>
							<td>Products:</td>
							<td><input type="checkbox" value="1" name="products"></td>
						<tr>
						<tr>
							<td>Content:</td>
							<td><input type="checkbox" value="1" name="content"></td>
						<tr>
						<tr>
							<td>Money:</td>
							<td><input type="checkbox" value="1" name="money"></td>
						<tr>
						<tr>
							<td>Advertising:</td>
							<td><input type="checkbox" value="1" name="advertising"></td>
						<tr>
						<tr>
							<td>Translations:</td>
							<td><input type="checkbox" value="1" name="translations"></td>
						<tr>
						<tr>
							<td>Database:</td>
							<td><input type="checkbox" value="1" name="database"></td>
						<tr>
						<tr>
							<td> </td>
							<td><input type="button" value="Save" id="add_admin_but" class="but"> <input type="button" value="Cancel" id="cancel_add_admin_but" class="but"></td>
						<tr>
					</table>
				</form>
			</div>
			<input type="button" value="Add admin" id="admin_add" class="but marginBottom5">
			<table border='0' width='100%' class="tablesorter" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">Nick</td>
					<td class="textBold">Pass</td>
					<td class="textBold">Delete</td>
					<td class="textBold">Modify</td>
				</tr>
TEXT;
		
		while ($row = $db->getNextRow()) {
			if ($_SESSION['master'] == 1) {
				$password = 'password="'.$row['pass'].'"';
			} else {
				$password = false;
			}
			$html .= "<tr>
						<td>{$row['id']}</td>
						<td><NOBR>{$row['nick']}</NOBR></td>
						<td><NOBR>{$row['pass']}</NOBR></td>
						<td align='center'><a href='' id='del' admin='{$row['id']}' type='delete' admin_name='{$row['nick']}'><img width='20' src='./images/delete.png'></a></td>
						<td align='center'><a href='' id='mod' admin='{$row['id']}' type='modify' admin_name='{$row['nick']}' {$password}><img width='20' src='./images/edit.png'></a></td>
					  </tr>";
		}
		$html .= "</table>";
		echo $html;
	}
	
	function contentUsers(){
		$html = false;
		$row = false;
		$del_user = $_REQUEST['del_user'];
		$db = new Db();
		
		if (isset($del_user)) {
			$db->query("DELETE FROM users WHERE id=".$del_user);
		}
		
		$db->query('SELECT * FROM users ORDER BY id DESC');
		
		$html = <<<TEXT
			<table border='0' width='100%' class="tablesorter" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">Nick</td>
					<td class="textBold">Pass</td>
					<td class="textBold">Date</td>
					<td class="textBold">Email</td>
					<td class="textBold">Ip</td>
					<td class="textBold">First name</td>
					<td class="textBold">Last name</td>
					<td class="textBold">Delete</td>
					<td class="textBold">Modify</td>
				</tr>
TEXT;
		
		while ($row = $db->getNextRow()) {
			$html .= "<tr>
						<td>{$row['id']}</td>
						<td>{$row['nick']}</td>
						<td>{$row['pass']}</td>
						<td>{$row['timp']}</td>
						<td>{$row['email']}</td>
						<td>{$row['ip']}</td>
						<td>{$row['first_name']}</td>
						<td>{$row['last_name']}</td>
						<td align='center'><a href='' id='del' user='{$row['id']}' type='delete_user' user_name='{$row['nick']}'><img width='20' src='./images/delete.png'></a></td>
						<td align='center'><a href='' id='modr' user='{$row['id']}' type='modify_user' user_name='{$row['nick']}'><img width='20' src='./images/edit.png'></a></td>
					  </tr>";
		}
		$html .= "</table>";
		
			
TEXT;
		echo $html;
	}
	
	function contentAdvertising(){
		$html = false;
		$db = new Db();
		$newAdv = $_REQUEST['add_adv'];
		$modifyAdv = $_REQUEST['modify_adv'];
		$delAdv = $_REQUEST['del_adv'];
		
		if (isset($delAdv)) {
			$db->query("DELETE FROM advertising WHERE id='".$delAdv."'");
		}
		
		if (isset($modifyAdv)) {
			$db->query("UPDATE advertising SET content='".htmlentities($modifyAdv)."' WHERE id='".$_REQUEST['adv_id']."'");
		}
//		die("UPDATE advertising SET content='".$modifyAdv."' WHERE id='".$_REQUEST['adv_id']."'");
		
		if (isset($newAdv)) {
			$db->query("INSERT INTO advertising (id, time, content, admin) VALUES('', NOW(), '".htmlentities($newAdv)."', '".$_SESSION['adminid']."')");
		}
		
		$html = <<<TEXT
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="adv_add_form">
				<div class="textBold textCenter textVerdana">Add advertising</div>
				<table>
					<tr>
						<td>Advertising text:<br>
							<textarea id="adv_add" class="height200 width300"></textarea>
						</td>
					<tr>
				 	<tr>
						<td>
							<input type="button" value="Save" id="add_adv_but" class="but"> 
							<input type="button" value="Cancel" id="cancel_add_adv_but" class="but">
						</td>
					<tr>
				</table>
			</div>
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="adv_modify_form">
				<div class="textBold textCenter textVerdana">Modify advertising</div>
				<table>
					<tr>
						<td>Advertising text:<br>
							<textarea id="adv_modify" name="adv_modify" class="height200 width300"></textarea>
						</td>
					<tr>
				 	<tr>
						<td>
							<input type="button" value="Save" id="modify_adv_but" class="but"> 
							<input type="button" value="Cancel" id="cancel_modify_adv_but" class="but"></td>
					<tr>
				</table>
			</div>
			<input type="hidden" id="adv_id" value="">
			<input type="button" value="Add advertising" id="advertising_add" class="but marginBottom5">
			<table border='0' width='100%' class="tablesorter" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">Date</td>
					<td class="textBold">Content</td>
					<td class="textBold">Admin</td>
					<td class="textBold">Delete</td>
					<td class="textBold">Modify</td>
					<td class="textBold">Hide</td>
				</tr>
TEXT;
		$db->query("SELECT *, (SELECT nick FROM adm WHERE id=admin) AS admin_nick FROM advertising");
		while ($row = $db->getNextRow()) {
			$html .= "<tr>
						<td>{$row['id']}</td>
						<td>{$row['time']}</td>
						<td>".substr($row['content'], 0, 150)."...</td>
						<td>{$row['admin_nick']}</td>
						<td align='center'><a href='' id='del_adv' adv='{$row['id']}' type='delete_adv' adv_content='{$row['content']}'><img width='20' src='./images/delete.png'></a></td>
						<td align='center'><a href='' id='mod_adv' adv='{$row['id']}' type='modify_adv' adv_content='{$row['content']}'><img width='20' src='./images/edit.png'></a></td>
						<td>Hide</td>
					  </tr>";
		}
		echo $html;
	}

	function contentMysql(){
		$html = $query = false;
		$db = new Db();
		$query = $_REQUEST['query'];
		if ( isset($query) ) {
			$query = stripslashes($query);
			$db->query($query);
		}
		$html = <<<TEXT
			Type mysql command:<br>
			<textarea id="query" name="query"></textarea><br>
			<input type="button" class="but" value="Execute" id="exec_query">
			
TEXT;
	echo $html;
	}
	
	function contentManage(){
		$html = false;
		$message = false;
		$contentType = $_REQUEST['sub_action'];
		$delContent = $_REQUEST['del_content'];
		
		$db = new Db();
		
		if (isset($delContent)) {
			$db->query("DELETE FROM content WHERE id=".$delContent);
		}
		
		switch ($contentType) {
			case 'homepage'		: $type = 1; $title = '"Home Page"'; break;
			case 'how_it_works'	: $type = 2; $title = '"How it works"'; break;
			case 'take_a_tour'	: $type = 3; $title = '"Take a tour"'; break;
			case 'register'		: $type = 4; $title = '"Register"'; break;
			case 'forum'		: $type = 5; $title = '"Forum"'; break;
			case 'contacts'		: $type = 6; $title = '"Contacts"'; break;
			case 'about_us'		: $type = 7; $title = '"About Us"'; break;
			case 'articles'		: $type = 8; $title = '"Articles"'; break;
			default : $type = 1;
		}
		
		
		
		$html .= '<span class="textSize15 textBold">Content->'.$title.'</span><br>';
		$html .= '<input type="button" value="Add content" class="but marginBottom5 marginTop5" 
					onclick="window.open (\'libs/newContent.lib.php?type='.$type.'\',\'mywindow\',\'status=1\')">';
		$html .= $message;
		
		$html .= '<table class="tablesorter marginTop10" id="tablesorter">
					<tr>
						<td class="textBold">Id</td>
						<td class="textBold">Content</td>
						<td class="textBold">Key word</td>
						<td class="textBold">Date creation</td>
						<td class="textBold">Update</td>
						<td class="textBold">Admin</td>
						<td class="textBold">Delete</td>
						<td class="textBold">Modify</td>
					</tr>
		';
		
		$db->query("SELECT *, (SELECT nick FROM adm WHERE id=admin) AS admin_nick FROM content WHERE type='".$type."'");
		
		while ( $row = $db->getNextRow() ) {
			$html .= '
				<tr>
					<td>'.$row['id'].'</td>
					<td>'.substr($row['content'], 0, 20).'</td>
					<td>'.$row['key_word'].'</td>
					<td>'.$row['time'].'</td>
					<td>'.$row['updated'].'</td>
					<td>'.$row['admin_nick'].'</td>
					<td align="center"><a href="" id="del" content_id="'.$row['id'].'" type="del_content"><img width="20" src="./images/delete.png"></a></td>
					<td align="center"><a href="" content_id="'.$row['id'].'" type="modify_content" onclick="window.open (\'libs/newContent.lib.php?modify='.$row['id'].'&type='.$type.'\',\'mywindow\',\'status=1\'); return false;"><img width="20" src="./images/edit.png"></a></td>
				</tr>
			';
		}
		
		$html .= '</html>';
		
		echo $html;
	}
	
	function contentArticles() {
		$html = false;
		$delArticle = $_REQUEST['del_article'];
		$showHide = $_REQUEST['show_hide'];

		$db = new Db();
		
		if (isset($showHide)) {
			switch ($showHide) {
				case 'show' : $db->query("DELETE FROM articles WHERE id=".$delArticle);
			}
		}
		
		if (isset($delArticle)) {
			$db->query("DELETE FROM articles WHERE id=".$delArticle);
		}
		
		$html .= '<span class="textSize15 textBold">Content->Articles</span><br>';
		$html .= '<input type="button" value="Add article" class="but marginBottom5 marginTop5" 
					onclick="window.open (\'libs/newArticle.lib.php?type='.$type.'\',\'mywindow\',\'status=1\')">';
		$html .= $message;
		
		$html .= '<table class="tablesorter marginTop10" id="tablesorter">
					<tr>
						<td class="textBold">Id</td>
						<td class="textBold">Article content</td>
						<td class="textBold">Date creation</td>
						<td class="textBold">Update</td>
						<td class="textBold">Admin</td>
						<td class="textBold">Delete</td>
						<td class="textBold">Modify</td>
						<td class="textBold">Public</td>
					</tr>
		';
		
		$db->query("SELECT *, (SELECT nick FROM adm WHERE id=admin) AS admin_nick FROM articles");
		
		while ( $row = $db->getNextRow() ) {
			if ($row['hidden'] == 0) {
				$showHide = "<a href='#' id='show_hide' status='show'>Show</a>";
			} else {
				$showHide = "<a href='#' id='show_hide' status='hide'>Hide</a>";
			}
			$html .= '
				<tr>
					<td>'.$row['id'].'</td>
					<td>'.substr($row['article_content'], 0, 20).'</td>
					<td>'.$row['time'].'</td>
					<td>'.$row['updated'].'</td>
					<td>'.$row['admin_nick'].'</td>
					<td align="center"><a href="" id="del" content_id="'.$row['id'].'" type="del_article"><img width="20" src="./images/delete.png"></a></td>
					<td align="center"><a href="" content_id="'.$row['id'].'" type="modify_content" onclick="window.open (\'libs/newArticle.lib.php?modify='.$row['id'].'&type='.$type.'\',\'mywindow\',\'status=1\'); return false;"><img width="20" src="./images/edit.png"></a></td>
					<td align="center">'.$showHide.'</td>
				</tr>
			';
		}
		
		$html .= '</html>';
		
		echo $html;
	}
	
	function contentTranslate() {
		$html = false;
		$db = new Db();
		$textEng = $_REQUEST['eng_text'];
		$textRom = $_REQUEST['rom_text'];
		$textRus = $_REQUEST['rus_text'];
		$textFra = $_REQUEST['fra_text'];
		$delTranslation = $_REQUEST['del_translate'];
		$modifyTrans = $_REQUEST['trans_id'];
		$searchTransId = $_REQUEST['search_trans_id'];
		$searchTransVal = $_REQUEST['search_trans_val'];
		
		if (isset($searchTransVal)) {
			$searchTransVal = " WHERE ".$_REQUEST['select_trans_lang']." like '%".$searchTransVal."%'";
		}
		
		if (isset($searchTransId)) {
			$searchTransId = " WHERE id=".$searchTransId;
		}
		
		if (isset($modifyTrans)) {
			$textEngMod = $_REQUEST['eng_text_mod'];
			$textRomMod = $_REQUEST['rom_text_mod'];
			$textRusMod = $_REQUEST['rus_text_mod'];
			$textFraMod = $_REQUEST['fra_text_mod'];
			$transId 	= $_REQUEST['trans_id'];
			
			$db->query("UPDATE translations SET ENG='".addslashes($textEngMod)."', ROM='".addslashes($textRomMod)."', RUS='".addslashes($textRusMod)."', FRA='".addslashes($textFraMod)."' WHERE id={$transId}");
//			$cont = file("http://best-diets.eu/adminzone/libs/addTrans.lib.php?en=".$textEngMod."&ro=".$textRomMod."&ru=".$textRusMod."&mode=mod&id=".$transId);
		}
		
		if (isset($delTranslation)) {
			$db->query("DELETE FROM translations WHERE id=".$delTranslation);
//			$cont = file("http://best-diets.eu/adminzone/libs/addTrans.lib.php?en=".$textEng."&ro=".$textRom."&ru=".$textRus."&mode=del&id=".$delTranslation);
		}
		
		if (isset($textEng) || isset($textRom) || isset($textRus) || isset($textFra)) {
			$db->query("INSERT INTO translations (id, ENG, ROM, RUS, FRA) VALUES ('', '".addslashes($textEng)."', '".addslashes($textRom)."', '".addslashes($textRus)."', '".addslashes($textFra)."')");
//			$cont = file("http://best-diets.eu/adminzone/libs/addTrans.lib.php?en=".$textEng."&ro=".$textRom."&ru=".$textRus."&mode=add");
		}
		$html = <<<TEXT
			<div class="positionAbsolute borderGrey colorGrey left20 top30 displayNone zOver" id="trans_add_form">
				<div class="textBold textCenter textVerdana">Add translation</div>
				<table border="0">
					<tr>
						<td>English text:<br>
							<input type="radio" id="trans_from_eng" name="g_trans_radio" value="eng">
							<input type="checkbox" id="trans_field_eng">
							<textarea id="eng_text" class="resize height30" name="eng_text"></textarea>
						</td>
					</tr>
					<tr>
						<td>Romanian text:<br>
							<input type="radio" id="trans_from_rom" name="g_trans_radio" value="rom">
							<input type="checkbox" id="trans_field_rom">
							<textarea id="rom_text" class="resize height30" name="rom_text"></textarea>
						</td>
					</tr>
					<tr>
						<td>Russian text:<br>
							<input type="radio" id="trans_from_rus" name="g_trans_radio" value="rus">
							<input type="checkbox" id="trans_field_rus">
							<textarea id="rus_text" class="resize height30" name="rus_text"></textarea>
						</td>
					</tr>
				 	<tr>
						<td>
							<input type="button" value="Save" id="add_trans_but" class="but"> 
							<input type="button" value="Cancel" id="cancel_add_trans_but" class="but">
							<input type="button" value="Translate with google" id="google_trans" class="but">
						</td>
					</tr>
				</table>
			</div>
			<div class="positionAbsolute borderGrey colorGrey left20 top30 displayNone zOver" id="trans_modify_form">
				<div class="textBold textCenter textVerdana">Modify translation</div>
				<form class="form" id="trans_mod_form">
					<table border="0">
						<tr>
							<td>English text:<br>
								<textarea id="eng_text_mod" class="resize height30" name="eng_text_mod"></textarea>
							</td>
						</tr>
						<tr>
							<td>Romanian text:<br>
								<textarea id="rom_text_mod" class="resize height30" name="rom_text_mod"></textarea>
							</td>
						</tr>
						<tr>
							<td>Russian text:<br>
								<textarea id="rus_text_mod" class="resize height30" name="rus_text_mod"></textarea>
							</td>
						</tr>
					 	<tr>
							<td>
								<input type="button" value="Save" id="modify_trans_but" class="but">
								<input type="button" value="Cancel" id="cancel_modify_trans_but" class="but">
								<input type="hidden" name="modify_trans" value="1">
								<input type="hidden" name="trans_id" id="trans_id" value="">
							</td>
						</tr>
					</table>
				</form>
			</div>
<!--			<input type="hidden" id="adv_id" value="">-->
			<form id="search_trans_id_form">
				<input type="text" name="search_trans_id">
				<input type="button" class="marginBottom5 marginLeft5 but" value="Search id" id="search_trans_id_but">
			</form>
			<br />
			<form id="search_trans_val_form">
				<select name="select_trans_lang">
					<option value="ROM">Romanian</option>
					<option value="ENG">English</option>
					<option value="RUS">Russian</option>
				</select>
				<input type="text" name="search_trans_val"><input type="button" class="marginBottom10 marginLeft5 but" value="Search value" id="search_trans_val_but"><br />
			</form>
			<input type="button" value="Add translation" id="translation_add" class="but marginBottom5">
			<table border='0' width='100%' class="tablesorter" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">ENG</td>
					<td class="textBold">ROM</td>
					<td class="textBold">RUS</td>
					<td class="textBold">Delete</td>
					<td class="textBold">Modify</td>
				</tr>
TEXT;
		$db->query("SELECT * FROM translations".$searchTransId.$searchTransVal." ORDER BY id DESC");
		while ($row = $db->getNextRow()) {
			$html .= "<tr>
						<td>".stripslashes($row['id'])."</td>
						<td id='".$row['id']."_eng'>".stripslashes($row['ENG'])."</td>
						<td id='".$row['id']."_rom'>".stripslashes($row['ROM'])."</td>
						<td id='".$row['id']."_rus'>".stripslashes($row['RUS'])."</td>
						<td align='center'><a href='' id='del' trans_id='{$row['id']}' type='delete_trans'><img width='20' src='./images/delete.png'></a></td>
						<td align='center'><a href='javascript:void(0)' id='mod' trans_id='{$row['id']}' type='modify_trans'><img width='20' src='./images/edit.png'></a></td>
					  </tr>";
		}
		echo $html;
	}
	
	function contentProductsCategory() {
		$html = false;
		$db = new Db();
		print_r($_REQUEST);
		$textEng = $_REQUEST['eng_text'];
		$textRom = $_REQUEST['rom_text'];
		$textRus = $_REQUEST['rus_text'];
		$textFra = $_REQUEST['fra_text'];
		$delTranslation = $_REQUEST['del_translate'];
		
		if (isset($modify_trans)) {
			$textEngMod = $_REQUEST['eng_text_mod'];
			$textRomMod = $_REQUEST['rom_text_mod'];
			$textRusMod = $_REQUEST['rus_text_mod'];
			$textFraMod = $_REQUEST['fra_text_mod'];
			$transId 	= $_REQUEST['trans_id'];
			
			$db->query("UPDATE translations SET ENG='{$textEngMod}', ROM='{$textRomMod}', RUS='{$textRusMod}', FRA='{$textFraMod}' WHERE id={$transId}");
		}
		
		if (isset($delTranslation)) {
			$db->query("DELETE FROM translations WHERE id=".$delTranslation);
		}
		
		if (isset($textEng) || isset($textRom) || isset($textRus) || isset($textFra)) {
			$db->query("INSERT INTO translations (id, ENG, ROM, RUS, FRA) VALUES ('', '{$textEng}', '{$textRom}', '{$textRus}', '{$textFra}')");
		}
		
		$html = <<<TEXT
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="cat_add_form">
				<div class="textBold textCenter textVerdana">Add translation</div>
				<table border="0">
					<tr>
						<td>English text:<br>
							<input type="text" id="eng_cat" name="eng_cat">
						</td>
					</tr>
					<tr>
						<td>Romanian text:<br>
							<input type="text" id="rom_cat" name="rom_cat">
						</td>
					</tr>
					<tr>
						<td>Russian text:<br>
							<input type="text" id="rus_cat" name="rus_cat">
						</td>
					</tr>
				 	<tr>
						<td>
							<input type="button" value="Save" id="add_cat_but" class="but"> 
							<input type="button" value="Cancel" id="cancel_add_cat_but" class="but">
						</td>
					</tr>
				</table>
			</div>
			<div class="positionAbsolute borderGrey colorGrey left260 top300 displayNone zOver" id="trans_modify_form">
				<div class="textBold textCenter textVerdana">Modify translation</div>
				<form class="form" id="trans_mod_form">
					<table border="1">
						<tr>
							<td>English text:<br>
								<input type="text" id="eng_cat_mod" name="eng_cat_mod">
							</td>
						</tr>
						<tr>
							<td>Romanian text:<br>
								<input type="text" id="rom_cat_mod" name="rom_cat_mod">
							</td>
						</tr>
						<tr>
							<td>Russian text:<br>
								<input type="text" id="rus_cat_mod" name="rus_cat_mod>
							</td>
						</tr>
					 	<tr>
							<td>
								<input type="button" value="Save" id="modify_cat_but" class="but">
								<input type="button" value="Cancel" id="cancel_modify_cat_but" class="but">
								<input type="hidden" name="modify_cat" value="1">
								<input type="hidden" name="cat_id" id="trans_id" value="">
							</td>
						</tr>
					</table>
				</form>
			</div>
			<input type="hidden" id="adv_id" value="">
			<input type="button" value="Add category" id="cat_add" class="but marginBottom5">
			<table border='0' width='100%' class="tablesorter" id="tablesorter">
				<tr>
					<td class="textBold">Id</td>
					<td class="textBold">ENG</td>
					<td class="textBold">ROM</td>
					<td class="textBold">RUS</td>
					<td class="textBold">FRA</td>
					<td class="textBold">Delete</td>
					<td class="textBold">Modify</td>
				</tr>
TEXT;
		$db->query("SELECT * FROM translations LIMIT 0,20");
		while ($row = $db->getNextRow()) {
			$html .= "<tr>
						<td>{$row['id']}</td>
						<td>{$row['ENG']}</td>
						<td>{$row['ROM']}</td>
						<td>{$row['RUS']}</td>
						<td>{$row['FRA']}</td>
						<td align='center'><a href='' id='del' trans_id='{$row['id']}' type='delete_trans'><img width='20' src='./images/delete.png'></a></td>
						<td align='center'><a href='' id='mod' trans_id='{$row['id']}' type='modify_trans' eng='{$row['ENG']}' rus='{$row['RUS']}' fra='{$row['FRA']}' rom='{$row['ROM']}'><img width='20' src='./images/edit.png'></a></td>
					  </tr>";
		}
		echo $html;
	}
?>