<?php

class FileOps_class extends ErrorHandler {
	var $logfilename;

	function __construct($_fileName){
		if(!is_dir($_fileName)){
			//check if file exists , is readable and is_writable
			$this->setLogfileName($_fileName);
			if (file_exists($_fileName)) {
				if (!$this->is_file_readable($_fileName) || !$this->is_file_writable($_fileName) ) {
					chmod($_fileName, "0755");
				}
			}else {
				//create file with read & write permissions and in append mode.
				try{
					$fp = fopen($_fileName, "a+");
					if($fp){
						if(!$this->is_file_readable($_fileName) || !$this->is_file_writable($_fileName)){
							chmod($_fileName, "0755");
						}
					}

				}catch(Exception $e){
					throw  new Exception("Unable to Create or open file", $e);
				}
			}
		}
	}

	function setLogfileName($filename){
		$this->logfilename = $filename;
	}

	function  getLogFileName(){
		return $this->logfilename;
	}

	//read from an array and write to a CSV file.
	function writeArrayToCSV($_absolutePath, $_contentArray){
		parent::logDebug($this->getLogFileName(),"Entering writing array to CSV\n");
		try{
			$fp = fopen($_absolutePath,"a+");
			// Write array content to our opened file.
			if($fp){
				foreach ($_contentArray as $fields) {
					if(fputcsv($fp, $fields) == FALSE){
						fclose($fp);
						parent::logError($this->getLogFileName(),"Problem with writing array to CSV\n");
						return FALSE;
					}
				}
				parent::logDebug($this->getLogFileName(),"Successfully wrote to file : $_absolutePath\n");
				fclose($fp);
				return TRUE;
			}else {
				parent::logError($this->getLogFileName(),"Problem with creating or opening file : $_absolutePath\n");
			}
		}catch(Exception $e){
			parent::logError($this->getLogFileName(),"Unable to Create or Open file: $_fileName, $e\n");
			fclose($fp);
			throw  new Exception("Unable to open file", $e);
		}
		return FALSE;
	}



	//read from CSV into an array.
	function readFromCSV($_absolutePath){
		parent::logDebug($this->getLogFileName(),"Entering readfromcsv\n");
		if(file_exists($_absolutePath)){
			parent::logDebug($this->getLogFileName(),"File exists $_absolutePath\n");
			try{
				if (($fp = fopen($_absolutePath, "r")) !== FALSE) {
					$data = fgetcsv($fp, 1000, ",");
					fclose($fp);
					parent::logInfo($this->getLogFileName(),"Successfully read from File: $_absolutePath\n");
					return $data;
				}
			}catch(Exception $e){
				parent::logError($this->getLogFileName(),"Unable to Create or Open file: $_fileName, $e\n");
				fclose($fp);
				throw  new Exception("Unable to open file", $e);
			}
		}
		return FALSE;
	}

	//Get all filenames under a dir.
	function getAllFileNames($_dirName){
		parent::logDebug($this->getLogFileName(),"Getting all files under dir : $_dirName\n");
		if(file_exists($_dirName)){
			parent::logDebug($this->getLogFileName(),"Directory exists : $_dirName");
			try{
				$listFiles = array();
				if ($fp = opendir($_dirName)) {
					if($fp){
						while (FALSE !== ($file = readdir($fp))) {
							if(!is_dir($_dirName."/".$file)){
								$listFiles[] = $file;
							}
						}
						closedir($fp);
					}
				}
				return $listFiles;
			}catch(Exception $e){
				// close all resources
				parent::logError($this->getLogFileName(),"Unable to Create or Open file: $_fileName, $e");
				closedir($fp);
				throw new Exception("Unable to read files under dir: $_dirName", $e);
			}
		}
		parent::logWarning($this->getLogFileName(),"Directory doesn not exists : $_dirName");
		return FALSE;
	}

	//write array o a file.
	function writeArrayToFile($_fileName, $_var){
		try{
			$fp;
			if(file_exists($_fileName) == 0){
				parent::logWarning($this->getLogFileName(),"File already exists, appending content: $_fileName\n");
				$fp = fopen($_fileName, "a+");
			}
			else{
				parent::logInfo($this->getLogFileName(),"Creating file : $_fileName\n");
				$fp = fopen($_fileName, "w+");
			}
			if($fp){
				foreach ($_var as $fields) {
					if(fputs($fp, $fields) == FALSE) {
						fclose($fp);
						parent::logError($this->getLogFileName(),"Problem with writing content to file: $_fileName\n");
						return FALSE;
					}
				}
				fclose($fp);
				parent::logDebug($this->getLogFileName(),"Succesfully wrote to file: $_fileName\n");
				return TRUE;
			}
		}catch(Exception $e){
			parent::logError($this->getLogFileName(),"Unable to Open  and write to file: $_fileName, $e\n");
			throw new Exception("Unable to open file and write to it: $_fileName", $e);
		}
		return FALSE;
	}

	//write stream of data to a file.
	function writeStreamToFile($_fileName, $_var){
		try{
			$fp = fopen($_fileName, "a+");
			if($fp){
				fwrite($fp, $_var);
				fclose($fp);
				return TRUE;
			}
		}catch(Exception $e){
			throw new Exception("Unable to open file and write to it: $_fileName", $e);
		}
		return FALSE;
	}



	//delete a file
	function deleteFile($_fileName){
		parent::logDebug($this->getLogFileName(),"Entering deletFile function\n");
		if(file_exists($_fileName)){
			parent::logDebug($this->getLogFileName(),"File exists for deletion: $_fileName\n");
			try{
				if(!unlink($_fileName)){
					parent::logError($this->getLogFileName(),"Unable to delete file, check file and dir permissions: $_fileName\n");
					return FALSE;
				}
				parent::logDebug($this->getLogFileName(),"Succesfully deleted file: $_fileName\n");
				return TRUE;
			}catch(Exception $e){
				parent::logError($this->getLogFileName(),"Unable to delete file: $_fileName, $e\n");
				throw new Exception("Unable to delete file, check dir and file permissions : $_fileName", $e);;
			}
		}
		parent::logWarning($this->getLogFileName(),"File does not exists or doesn't have permission to delete: $_fileName\n");
		return FALSE;
	}


	function createDirectory($_path, $_dirName){
		if(file_exists($_path) == 0){
			if(is_dir($_path."/".$_dirName)){
				parent::logError($this->getLogFileName(),"Its not a directory");
				return FALSE;
			}
			if (!mkdir($_path.$_dirName, 0777)) {
				parent::logError($this->getLogFileName(),"Unable to create Directory, check dir permissions: $_fileName");
				return FALSE;
			}
			parent::logDebug($this->getLogFileName(),"Succesfully dcreated directory");
			return TRUE;
		}
		parent::logError($this->getLogFileName(),"Path does not exists. Invalid path!! : $_path");
		return FALSE;
	}

	/*Checks to see if specified directory is writable */
	function is_dir_writable($_dirName){
		if(!is_writable($_dirName)){
			return FALSE;
		}
		else{
			return TRUE;
		}
	}

	/*Checks to see if file is writable*/
	function is_file_writable($_fileName){
		if(is_writable($_fileName)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	/*Checks to see if file is writable*/
	function is_file_readable($_fileName){
		if(is_readable($_fileName)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}


