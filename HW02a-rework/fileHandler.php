<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Error Testing</title>
<?php include("class_filehandler_lib.php"); ?> 
</head>
<body>
<?php

$content = array("a","b","c","d");

$directory = getcwd();
$log = new FileHandler($directory);
$log->array_to_file($content);


/*Used For Testing Purposes
echo "File name: ".$errorLog->get_file_name()."\n";
echo "Directory name: ".$errorLog->get_directory()."\n";
echo "Full path: ".$errorLog->get_full_path()."\n";
*/

?>
<br/><br/>
</body>
</html>