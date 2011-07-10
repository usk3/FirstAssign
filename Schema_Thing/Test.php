<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Schema Creator</title>
<?php include("class_tag_lib.php"); ?>
<?php include("Thing.php"); ?>
</head>
<body>
<?php
echo '<h1> Welcome </h1>';
$thing = new Thing();

$thing->setNameValue('lego block');
$thing->setNameTag("span");
$thing->setNameAttributes('');


$thing->setUrlValue('http://www.lego.com');
$thing->setUrlTag('a');
$thing->setUrlAttributes('link');


$thing->setImageValue('http://www.mmocrunch.com/wp-content/uploads/2008/01/lego.jpg');
$thing->setImageTag('img');
$thing->setImageAttributes('picture');


$thing->setDescriptionValue('This is a small red lego block');
$thing->setDescriptionTag('span');
$thing->setDescriptionAttributes('text');


echo $thing->printHtml();

?>
</body>
</html>