<?php

class FileHandler{

	protected $fileName;

	/*Creates the file */
	function __construct($_filename){
		if(!is_dir($_fileName)){
			//check if file exists , is readable and is_writable
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


	/*Checks to see if the desired file can be found*/
	function file_found($file){

		if(!file_exists($file)){
			$errorMessage = "Error: File (".$file.") not found";
			return false;
		}

		return true;

	}

	/*Checks to see if a desired directory can be found*/
	function directory_found($directory){

		/*First checks to see if the location is in fact a directory then makes sure it exists*/
		if(is_dir($directory)){
			if(!file_exists($directory)){
				$errorMessage = "Error: Directory (".$directory.") not found";
				return false;
			}
		}

		else{
			$errorMessage = "Error: (".$directory.") is not a directory";
			return false;
		}

		return true;

	}

	/*Checks to see if you can write to a specified directory*/
	function directory_writable($dirname){

		if(!is_writable($dirname)){
			$errorMessage = "Error ".$dirname." is not writeable";
			return false;
		}

		else{
			return true;
		}

	}

	/*Checks to see if you can write to a specified file*/
	function is_file_writable($filename){

		if(is_writable($filename)){
			return true;
		}

		else{
			return false;
		}

	}

	/*Checks to see if a specified file is readable*/
	function is_file_readable($filename){

		if(is_readable($readable)){
			return true;
		}

		else{
			return false;
		}

	}

	/*Deletes a specified file*/
	function delete_file($filename){

		if($this->file_found($filename)){
			unlink($filename);
		}

	}

	/*Creates a directory if it doesn't already exist*/
	function create_directory($directoryName){

		if(!file_exists($directoryName)){
			mkdir($directoryName);
		}

	}

	/*Writes the contents of an array to a file*/
	function array_to_file($content){

		$file = fopen($this->fullFileLocation ,"a+");

		foreach($content as $value){
			fwrite($file, $value."\n");
		}

		fclose($file);

	}

	/*A list of getter functions*/
	function get_file_name(){
		return $this->fileName;
	}


	/*End line of entire class*/
}

/*A class that is used specifically for error handling*/
class ErrorFileHandler extends FileHandler{

	var $errorLog;
	/*Creates the directory and log file for error handling*/
	function __construct($errorLog){
		$this->errorLog = $errorLog;
		parent::__construct($errorLog);
	}

	function add_to_error_log($errorMessage){

		$timeStamp = date("d/m/y  H:i:s", time());
		$file = fopen($this->errorLog ,"a+");
		fwrite($file, $timeStamp." ".$errorMessage."\n");
		fclose($file);

	}

}


?>
