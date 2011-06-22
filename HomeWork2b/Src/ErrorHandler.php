<?php
class ErrorHandler {

	var $filename;
	var $errorMsg;
	var $debugMsg;
	var $infoMsg;
	var $fatalMsg;
	var $warnMsg;



	function __autoload($classname){
		if(file_exists($class_name . '.php')) {
			require_once($class_name . '.php');
		} else {
			throw new Exception("Unable to load $class_name.");
		}
	}

	function __construct($_fileName){
		$this->setFileName($_fileName);
		$fileops = new FileOps_class($this->filename);
	}

	function getFileName(){
		return $this->filename;
	}

	function setFileName($filename){
		$this->filename = $filename;
	}
	function getErrorMsg(){
		return $this->errorMsg;
	}

	function setErrorMsg($errorMsg){
		$this->errorMsg = $errorMsg;
	}

	function getDebugMsg(){
		return $this->debugMsg;
	}

	function setDebugMsg($debugMsg){
		$this->debugMsg = $debugMsg;
	}

	function getInfoMsg(){
		return $this->infoMsg;
	}

	function setInfoMsg($infoMsg){
		$this->infoMsg = $infoMsg;
	}

	function getWarnMsg(){
		return $this->WarnMsg;
	}

	function setWarnMsg($warnMsg){
		$this->warnMsg = $warnMsg;
	}

	function getFatalMsg(){
		return $this->fatalMsg;
	}

	function setFatalMsg($fatalMsg){
		$this->fatalMsg = $fatalMsg;
	}

	function logError($filename,$contents){
		try{
			$timeStamp = date("d/m/y  H:i:s", time());
			$fileops = new FileOps_class($filename);
			$fileops->writeStreamToFile($filename, $timeStamp."  ERROR:".$contents);
		}catch(Exception $me){
			echo '<br>';
			echo $me;
			echo '<br>';
		}
	}

	function logDebug($filename,$contents){
		try{
			$timeStamp = date("d/m/y  H:i:s", time());
			$fileops = new FileOps_class($filename);
			$fileops->writeStreamToFile($filename, $timeStamp."  DEBUG:".$contents);
		}catch(Exception $me){
			echo '<br>';
			echo $me;
			echo '<br>';
		}
	}

	function logInfo($filename,$contents){
		try{
				
			$timeStamp = date("d/m/y  H:i:s", time());
			$fileops = new FileOps_class($filename);
			$fileops->writeStreamToFile($filename, $timeStamp."  INFO:".$contents);
		}catch(Exception $me){
			echo '<br>';
			echo $me;
			echo '<br>';
		}
	}

	function logFatal($filename,$contents){
		try{
			$timeStamp = date("d/m/y  H:i:s", time());
			$fileops = new FileOps_class($filename);
			$fileops->writeStreamToFile($filename, $timeStamp."  FATAL:".$contents);
		}catch(Exception $me){
			echo '<br>';
			echo $me;
			echo '<br>';
		}
	}

	function logWarning($filename,$contents){
		try{
			$timeStamp = date("d/m/y  H:i:s", time());
			$fileops = new FileOps_class($filename);
			$fileops->writeStreamToFile($filename, $timeStamp."  WARNING:".$contents);
		}catch(Exception $me){
			echo '<br>';
			echo $me;
			echo '<br>';
		}
	}
}