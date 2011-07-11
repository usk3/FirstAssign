<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Schema Creator</title>
<?php include("class_tag_lib.php"); ?>
<?php include("Thing.php"); ?>
<?php include("Creative_Works.php"); ?>
<?php include("Recipe.php"); ?>
</head>
<body>
<?php
echo '<h1> Welcome </h1>';
/** Test block for Thing Schema **/
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

/** Test block for Creative_Works **/
$cr = new Creative_Works();

$cr->setAboutValue("Lego blocks");
$cr->setAboutTag("span");
$cr->setAboutAttributes('');

$cr->setAboutValue("Good");
$cr->setAuthorValue("John Smith");
echo $cr->printHtml();

/** recipe test block. Test program, not a good recipe to try **/
$r = new Recipe();
$r->setIngredientsValue("One Cup of Milk");
$r->setIngredientsTag('span');
$r->setCookingMethodTag('Baking');
$r->setRecipeCategoryValue('Desert');
$r->setCookTimeValue('5 minutes');
$r->setPrepTimeValue('1 minute');
$r->setRecipeInstructionsValue('Add Nesquik powder to warm milk.');
echo $r->printHtml();


?>
</body>
</html>