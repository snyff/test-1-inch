<?php
class Block extends Page{
	var $page;
	var $otherParams;
	var $path;
	var $cacheSettings;
	var $blockContent;
	
	function __construct($parentPage, $otherParams = array()) {
		$this->page = $parentPage;
		$this->otherParams = $otherParams;
		$this->setCache();
	}
	function getParameter($param) {
		if (in_array($param, $this->otherParams)){
			return $this->otherParams[$param];
		}
	}
	function cache($cacheParams=array()) {
		if(!empty($cacheParams) && is_array($cacheParams)) {
			$this->cacheSettings['cacheParamsSet'] = true;
			$blockName = get_class($this);
			$i=0;
			foreach($cacheParams as $key => $value) {
				$formedUrl .= $key.'_'.$value;
				if($i<count($cacheParams)-1) {
					$formedUrl .= '.';
				}
				$i++;
			}
			$filePath = './'.CACHE_PATH.$this->getCachePath().$blockName.'.'.$formedUrl.'.html';
			$this->cacheSettings['fileCachePath'] = $filePath;
			if(file_exists($filePath)) {
				$this->cacheSettings['fileCacheFileExists'] = 'ok';
			} else {
				$this->cacheSettings['fileCacheFileExists'] = 'nok';
				$this->storeContentInFile();
			}
		} else {
			$this->cacheSettings['cacheParamsSet'] = false;
		}
	}
	function storeContentInFile() {
		ob_start();
		$this->buildContent();
		$this->blockContent = ob_get_contents();
		ob_end_clean();
		$fp = fopen($this->cacheSettings['fileCachePath'], 'w');
		$this->cacheSettings['startTime'];
		fwrite($fp, $this->cacheSettings['startTime'].'-'.$this->cacheSettings['endTime'].' cacheParamsInFile');
		fwrite($fp, $this->blockContent);
		fclose($fp);
	}
	function setCacheTime($time) {
		$this->cacheSettings['startTime'] = time();
		$this->cacheSettings['endTime'] = time()+$time*60;
	}
	function cachePath($path) {
		$this->path = $path;
	}
	function getCachePath() {
		if($this->path) {
			return $this->path;
		}
	}
	function setCache() {
		
	}
	function getCache() {
		if(is_array($this->cacheSettings) && !empty($this->cacheSettings)) {
			if($this->cacheSettings['fileCacheFileExists'] == 'ok') {
				$output = file_get_contents($this->cacheSettings['fileCachePath']);
				$timeInterval = substr($output, 0, 21);
				$timeIntervalArr = explode('-', $timeInterval);
				if($timeIntervalArr[1] < time()) {
					$this->storeContentInFile();
				}
				$output = strstr($output, 'cacheParamsInFile');
				$output = str_replace('cacheParamsInFile', '', $output);
				echo $output;
			} elseif($this->cacheSettings['fileCacheFileExists'] == 'nok') {
				echo $this->blockContent;
//				printArray($this->blockContent);
			}
		} else {
			$this->buildContent();
		}
	}
	function getOutput() {
		$this->getCache();
	}
}
?>