<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PHP File Handling HomeWork page</title>
</head>
<body>
<?php

function __autoload($class_name){
	if(file_exists($class_name . '.php')) {
		require_once($class_name . '.php');
	} else {
		throw new Exception("Unable to load $class_name.");
	}
}
//This is error handler testing
$logfile = new ErrorHandler("logfile.txt");
//$logfile->logError("This is error log testing");

//This is file handler testing
$ar =  array("A","B","C");
$fp = new FileOps_class("logfile.txt");
$fp->writeArrayToFile("myfile1.txt", $ar);

//check if file is readable and writable
$fp->is_file_readable("myfile1.csv");
$fp->is_file_writable("logfile.txt");

//check if dir is writable
$fp->is_dir_writable("/home/ukarri/public_html/FirstAssign");

//get files under dir
$filenames = $fp->getAllFileNames("/home/ukarri/public_html/FirstAssign");
foreach ($filenames as $values){
	echo $values;
	echo '<br>';
}

//write to cvs file
$list = array(
			array('Red','Blue','Yellow'),
			
			array ('Purple','Green','Orange')
			);
$f2 = "colors.csv";
$fp->writeArrayToCSV($f2, $list);

//read from csv file
$csvar = $fp->readFromCSV($f2);
foreach ($csvar as $values){
	echo $values;
	echo '<br>';
}

//delete a file
$fp->deleteFile("test.txt");

echo "End of Test.";
?>
</body>
</html>
