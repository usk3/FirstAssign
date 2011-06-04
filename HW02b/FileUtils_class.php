<?php

class FileUtils_class{

	// check if file exists and is writable
	function checkDir($_dirName){

		if(is_null($_dirName) || strlen($_dirName) == 0){
			echo '<br>';
			print "Directory specified is either null or blank.";
			return -1;
		}
		try{
			//check if dir exists
			if (file_exists($_dirName)) {
				if(is_writable($_dirName)){
					echo '<br>';
					print "The directory $_dirName exists and writable.";
					return 0;
				}else {
					echo '<br>';
					print "The directory $_dirName exists but not writable.";
					return -1;
				}
			} else {
				echo '<br>';
				print "The directory $_dirName does not exist";
				return -1;
			}
		}catch(Exception $me){
			echo '<br>';
			print $me.getMessage();
			return -1;
		}
	}
	//check if file exists and is readable.
	function checkFile($_fileName){
		if(is_null($_fileName) || strlen($_fileName) == 0){
			print "File specified is either null or blank.";
			return -1;
		}
		try{
			//check if file exists and is readable
			if (file_exists($_fileName)) {
				if (is_readable($_fileName)) {
					echo '<br>';
					print "The file $_fileName exists and is readable.";
				}else {
					echo '<br>';
					print "The file $_fileName is not readable";
				}
				if(is_writable($_fileName)){
					echo '<br>';
					printf( "The file $_fileName exists and is writable.\n");
					return 0;
				}else {
					echo '<br>';
					print "The file $_fileName exists but is not writable.";
					return -1;
				}
			}else {
				echo '<br>';
				print "The file $_fileName does not exists";
				return -1;
			}
		}catch(Exception $e){
			echo '<br>';
			print $e->getMessage();
			return -1;
		}
	}
	
	//read from an array and write to a CSV file.
	function writeArrayToCSV($_absolutePath, $_contentArray){
		if($this->checkFile($_absolutePath) == 0){
			$fp = fopen($_absolutePath,"a+");
			// Write array content to our opened file.
			if($fp){
				foreach ($_contentArray as $fields) {
					if(fputcsv($fp, $fields) == FALSE){
						echo '<br>';
						print "Problem writing ($_contentArray) to file ($_absolutePath)";
						echo '<br>';
						fclose($fp);
						return -1;
					}
				}
				echo '<br>';
				print "Success, wrote ($_contentArray) to file ($_absolutePath)";
				echo '<br>';
				fclose($fp);
				return 0;
			}
		}
		return -1;

	}
	
	//read from CSV into an array.
	function readFromCSV($_absolutePath){
		if($this->checkFile($_absolutePath) == 0){
			if (($fp = fopen($_absolutePath, "r")) !== FALSE) {
				$data = fgetcsv($fp, 1000, ",");
				echo '<br>';
				fclose($fp);
				return $data;
			}
		}
		echo '<br>';
		print "File is not readable.";
		return -1;
	}
	
	//Get all filenames under a dir.
	function getAllFileNames($_dirName){
		if(file_exists($_dirName)){
			try{
				$listFiles = array();
				if ($fp = opendir($_dirName)) {
					while (FALSE !== ($file = readdir($fp))) {
						if(!is_dir($_dirName."/".$file)){
							$listFiles[] = $file;
						}
					}
					closedir($fp);
				}
				return $listFiles;
			}catch(Exception $e){
				// close all resources
				closedir($fp);
				echo '<br>';
				print $e->getMessage();
			}
		}
		return -1;
	}

	//write to a file.
	function writeToFile($_fileName, $_var, $_mode){
		/*
		 if(is_null($_var) || size($_var)==0){
			echo '<br>';
			print "array is empty.";
			return -1;
			}
		if($this->validate_file_mode($_mode) == 0){
			$open_mode = $_mode;
		}
		else {
		
			$open_mode = "w";
		}
		*/
		if($this->checkFile($_fileName) == 0){
			$fp = fopen($_fileName, $_mode);
			foreach ($_var as $fields) {
				if(fputs($fp, $fields) == FALSE) {
					echo '<br>';
					print "problem writing to file ($_absolutePath)";
					fclose($fp);
					return -1;
				}
			}
			fclose($fp);
		}

	}

	
	//write to a file.if file desn't exists, create one.
	function create_to_write_file($_fileName, $_var, $_mode){
		$fp = fopen($_fileName, $_mode);
		if(!$fp){
			echo '<br>';
			print "problem creating file ($_absolutePath)";
			fclose($fp);
			return -1;
		}
		foreach ($_var as $fields) {
			if(fputs($fp, $fields) == FALSE) {
				echo '<br>';
				print "problem writing to file ($_absolutePath)";
				fclose($fp);
				return -1;
			}
		}
		fclose($fp);
	}
	
	//delete a file
	function deleteFile($_fileName){
		if($this->checkFile($_fileName) == 0){
			try{
				echo '<br>';
				print "Deleting file $_fileName";
				if(!unlink($_fileName)){
					echo '<br>';
					print "Unable to delete file $_fileName";
					return -1;
				}
				return 0;
			}catch(Exception $e){
				echo '<br>';
				print $e->getMessage();
				return -1;
			}
		}
	}

	function validate_file_mode($_mode){
		$valid_mode_values = array("r","w","r+","w+","a","a+","x","x+","c","c+");
		$valid_mode = -99;

		if(is_null($_mode) || strlen($_mode) == 0){
			echo '<br>';
			print "Invalid file mode.";
			return -1;
		}

		foreach($valid_mode_values as $value){
			print "mode values $value";
			if(strcmp(strtrim($_mode), $value) == 0){
				$valid_mode = 1;
			}
		}
		print "$valid_mode:valid mode";
		if($valid_mode == 1)
		return 0;
		else
		return -1;
	}

	function createDirectory($_path, $_dirName){
		if($this->checkDir($_path) == 0){
			if(is_dir($_path."/".$_dirName)){
				echo '<br>';
				print "Directory Already exists. Please specify another name for directory!";
				return -1;
			}
			if (!mkdir($_path.$_dirName, 0777)) {
				echo '<br>';
				print "Couldn't create directory.";
				return -1;
			}
			echo '<br>';
			print "Directory $_dirName is successfully created.";
			return 0;
		}
		echo '<br>';
		print "Failed on file check.";
		return -1;
	}

}
