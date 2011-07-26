<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Schema Creator</title>
<?php include("class_tag_lib.php"); ?>

</head>
<body>
<?php
include_once 'Thing.php';
include_once 'DAL.php';
include_once 'class_tag_lib.php';
ini_set("display_errors", "On");
echo '<h1> Welcome </h1>';

//        $c = new Mongo();
//        $db = $c->selectDB("test");
//        echo 'begin<br>';
//        $db->dropCollection("audit100");
//        print_r($c->test->listCollections());
//        $c->close();
//        echo '<br>End<br>';

// make a database connection before preparing Thing object
$dal = new DAL("Recipe");
$dal->setCollection("Thing");     //below statement will insert a new record in to the DB   

$thing = new Thing('','','');
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

$id = new MongoId(); //setting the values of Thing object
$thing->setId($id->{'$id'});

//Prepare thing obj to insert into database.
$ar = $thing->prepareArray();
$dal->save_object($ar);

$obj = $dal->find_object($ar);

//Update object

$thing1 = new Thing('','','');
$thing1->setNameValue('Lego waters');
//$dal->update_object($thing->prepareArray(), $thing1->prepareArray());
echo "<br><br>";        //below statement will display records matching the search criteria
//$obj1=$dal->find_object($thing1->prepareArray());

//$thing->refresh_array($obj1);
//$ar = $thing->prepareArray();
echo $thing->printHtml();

?>
</body>
</html>