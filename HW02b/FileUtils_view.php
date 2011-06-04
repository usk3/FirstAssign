<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>PHP File Handling HomeWork page</title>
<!-- php class included -->
<?php include("FileUtils_class.php"); ?>
</head>
<body>

	<?php
	$myfile = new FileUtils_class();

	// check if dir exists
	$dir = "/home/ukarri/public_html";
	$myfile->checkDir($dir);
	echo '<br>';

	//check if file exists
	echo '<br>';
	$fl = "/home/ukarri/public_html/FirstAssign/index.html";
	$myfile->checkFile($fl);


	//convert an array into CSV file
	echo '<br>';
	$list = array(
			array('Red','Blue','Yellow'),
			array ('Monday','Tuesday','Wednesday')
			);
	$f2 = "/home/ukarri/public_html/test.csv";
	$myfile->writeArrayToCSV($f2, $list);

	//read from csv file
	$fl = "/home/ukarri/public_html/FirstAssign/file.csv";
	$csvar = $myfile->readFromCSV($fl);
	echo "Contents of CSV file are,";
	echo '<br>';
	foreach ($csvar as $values){
		echo $values;
		echo '<br>';
	}
	
	//reading filenames from dir
	$dir = "/home/ukarri/public_html/FirstAssign";
	echo "List filenames under FirstAssign directory:";
	echo '<br>';
	$filenames = $myfile->getAllFileNames($dir);
	foreach ($filenames as $values){
		echo $values;
		echo '<br>';
	}
	
	//write to file
	$w1 = "/home/ukarri/public_html/FirstAssign/write1.txt";
	$ar = array("We are suppose to submit our homework on Monday.");
	$myfile->writeToFile($w1, $ar, "w");
	
	//delete a file
	$del_file = "/home/ukarri/public_html/HW02b/del.txt";
	$myfile->deleteFile($del_file);
	
	//append data to file
	$w1 = "/home/ukarri/public_html/FirstAssign/write1.txt";
	$ar = array("And Assignments on Tuesday.");
	$myfile->writeToFile($w1, $ar, "a");
	
	//create a file and write data
	$w2 = "/home/ukarri/public_html/write2.txt";
	$ar2 = array("This is Summer semester class");
	$myfile->create_to_write_file($w2, $ar2, "w+");
	
	//create a dir
	$path = "/home/ukarri/public_html/";
	$dir = "Test_dir";
	$myfile->createDirectory($path, $dir);
	

	?>
</body>
</html>
