<?php
	function pagination($page=0, $total, $nrPages=10, $pagePath=PAGE_PATH, $queryStr=false) {
		if(!$page) {
			$page = 1;
		}
		if(!$nrPages) {
			return false;
		}
		$nrNavBut = ceil($total/$nrPages);
		$stack = $page/$nrPages;
		$stack = round($stack);
		
		if($stack+$nrPages > $nrNavBut) {
			$to = $nrNavBut;
		} else {
			$to = $stack+$nrPages;
		}
		if($queryStr) {
			$queryStr = '&'.$queryStr;
		}
		$to = $nrNavBut;
		for($i=$stack+1; $i<$to+1; $i++) {
			if($i == $page) {
				$buts .= '<span class="textVerdana text14px textBold">'.$i.'</span>';
			} else {
				$href = getUrl(array('pagePath' => $pagePath, 'lang'=>LANG, 'reste'=>RESTE, 'queryString' => array('page'=>$i)));
				$buts .= '
					<a href="'.$href.$queryStr.'" class="navBut textVerdana text14px textBold"> '.$i.'</a>
				';
			}
		}
		$buts = '<div class="textCenter">'.$buts.'</div>';
		return $buts;
	}
?>