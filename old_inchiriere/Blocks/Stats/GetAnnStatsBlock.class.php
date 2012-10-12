<?php
require_once 'include/data/flat.lib.php';
class GetAnnStatsBlock extends Block{
	function buildContent() {
		if($from) {
			$cond .= ' AND SUBSTRING(time,1,10) >= "'.$from.'"';
		}
		if($to) {
			$cond .= ' AND SUBSTRING(time,1,10) <= "'.$to.'"';
		}
		$nrApp = getStringFromRequest('app');
		$stats = getStatsAllAnn($nrApp);
		for($i=0;$i<count($stats);$i++) {
			if(!isset($result[$stats[$i]['t']])) {
				$result[$stats[$i]['t']] = 1;
			} else {
				$result[$stats[$i]['t']]++;
			}
		}
		if(count($result)) {
			$totalVisits = array_sum($result);
		}
		if(count($result)) {
			$average = $totalVisits/count($result);
		}
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
			$i++;
			if($i != count($result)) {
				$str .= ', ';
			}
		}
		$infoText = translate(136, LANG, 'Statistica anuntului @nr@');
		$infoText = str_replace('@nr@', $nrApp, $infoText);
		$infoText = '<div class="textBold textSize19 colorGreen textCenter marginBottom5">'.$infoText.'</div>';
		$len = $dayFinal;
		$str = '['.$str.']';
		$html .= '
				<div id="placeholder" style="width:600px;height:300px;position:absolute;margin-top:-3px"></div>
				<script>
					arr = new Array();
					for(i=0;i<='.$len.';i++) {
						arr[i] = new Array();
					}
					'.$javascriptArray.'
					function showTooltip(x, y, contents) {
				        $(\'<div id="tooltip">\' + contents + \'</div>\').css( {
				            position: \'absolute\',
				            zIndex: \'92\',
				            display: \'none\',
				            top: y + 5,
				            left: x + 15,
				            border: \'1px solid #fdd\',
				            padding: \'2px\',
				            \'background-color\': \'#fee\'
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
				        yaxis: { min: 0, max: 500}
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
								    	},
								        yaxis: { 
									  	  	min: 0,
									        max: 500
								    	}
					}));
			</script>
			<div class="statsButsDiv">
				'.but(translate(137, LANG, 'Curata'), 'button', 'id="clear"').'
			</div>
			<div class="statsCloseBut"><a href="javascript:;" onClick="$(\'#overlay\').hide();$(\'#chart\').hide(); $(\'#chart\').html(\'\');">'.translate(53, LANG, 'Inchide').'</a></div>
';
//		$html = annonce($html, false, false, false, 'H');
		echo $infoText.$html;
		die;
	}
}
?>