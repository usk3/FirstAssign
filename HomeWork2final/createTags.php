<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Created Tags</title>
<?php include("class_tag_lib.php"); ?> 
</head>
<body>
<?php

$tagType = $_POST['tag'];
$content = $_POST['content'];
$attribute1 = $_POST['attribute1'];
$attributeValue1 = $_POST['value1'];
$attribute2 = $_POST['attribute2'];
$attributeValue2 = $_POST['value2'];
$attribute3 = $_POST['attribute3'];
$attributeValue3 = $_POST['value3'];


/*Creates an array then checks to make sure the values exist before
adding them to the array*/
$attributes = array();

if($attribute1 != ''){
$attributes[$attribute1] = $attributeValue1;
}
if($attribute2 != ''){
$attributes[$attribute2] = $attributeValue2;
}
if($attribute3 != ''){
$attributes[$attribute3] = $attributeValue3;
}

/*Creates the tag*/
$tag = new Tag($tagType, $attributes, $content);
echo $tag->get_tag();

/*Used for testing Purposes*/
/*
echo $tag->get_tag_type()."\n";
echo $tag->get_tag_attributes()."\n";
echo $tag->get_tag_content()."\n";
*/
?>
<br/><br/>
<a href="tagCreator.php">Create another tag</a><br/>
<a
href="http://www.mywebclass.org/~ukarri/FirstAssign/HW02a-rework/errorLog.txt">Click
here to see an error log</a>
</body>
</html>