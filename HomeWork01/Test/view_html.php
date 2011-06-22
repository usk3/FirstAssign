<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> My First HomeWork page </title>
<!-- php class included -->  
<?php include("html_class.php"); ?>
</head>
<body>
		
	<?php
	$user = new html_class();

	$user->setH1Tag("welcome-header1");
	echo $user->getH1Tag();
	
	$user->setH2Tag("welcome-header2");
	echo $user->getH2Tag();
	
	$user->setH3Tag("welcome-header3");
	echo $user->getH3Tag();
	
	$user->setH4Tag("welcome-header4");
	echo $user->getH4Tag();
	
	$user->setH5Tag("welcome-header5");
	echo $user->getH5Tag();
	
	$user->setH6Tag("welcome-header6");
	echo $user->getH6Tag();

	// default css file
	echo $user->getCssFileLink();
	
	echo '<br>';
	// set css file
	echo $user->setCssFile("style.css");
	echo $user->getCssFileLink();
	
	echo '<br>';
	// default js file
	echo $user->getJSFileLink();
	
	echo '<br>';
	//set js file
	echo $user->setJSFile("utils.js");
	echo $user->getJSFileLink();
	
	echo '<br>';
	print "HTML tag";
	echo $user->getStartHtmlTag();
	echo $user->getCloseHtmlTag();
	
	echo '<br>';
	print "Body Tag";
	echo $user->getStartBodyTag();
	echo $user->getCloseBodyTag();
	
	echo '<br>';
	print "DocType Tag";
	echo $user->getDocTypeTag();
		
	 ?>
</body>
</html>