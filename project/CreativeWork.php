<?php

/**
This class inhertis functionality of thing class.This class overrides methods of Parent class (Thing) *
 * @author Dishna
 */
ini_set('display_errors', 'On');

class CreativeWork extends Thing
{
Public $CretiveColname="FinalCreativeWork";
private $about;
private $author;
function CreativeWork() {
    parent::__construct();
    $this->about->tag->tagtype = 'span';
    $this->author->tag->tagtype = 'span';
    $this->setaboutAttributes('about');
    $this->setauthorAttributes('author');
}
function prepare_array_Creativework() 
{
    /*Hardcoded Temp*/
    $obj['about'] =$_POST["About"];// "Recipe system 1.0";
    $obj['author'] = $_POST["Author"];///"Nirav Patel";
    return $obj;
}
function setaboutValue($var) 
{
    $this->about->value = $var;
}

function getaboutValue() 
{
    return $this->about->value;
}

function setaboutTag($var) 
{
    $this->about->tag->tagtype = $var;
}

function getaboutTag() 
{
 return $this->about->tag->tagtype ;
}
function setaboutAttributes($var) {

$class = get_class($this) . ' about ' . $var;
$this->about->tag->attributes['class'] = $class;
$this->about->tag->attributes['itemprop'] = 'about';

}

function getaboutAttributes() {

return $this->about->tag->attributes;

}
function setauthorValue($var) 
{
    $this->author->value = $var;
}

function getauthorValue() 
{
    return $this->author->value;
}

function setauthorTag($var) 
{
    $this->author->tag->tagtype = $var;
}

function getauthorTag() 
{
    return $this->about->tag->tagtype ;
}

function setauthorAttributes($var) {

$class = get_class($this) . ' author ' . $var;
$this->author->tag->attributes['class'] = $class;
$this->author->tag->attributes['itemprop'] = 'author';

}

function getauthorAttributes() {

return $this->author->tag->attributes;

}

public function PrintCreativeWork()
{

$dbl=new DBLayer();
$dbl->setCollectionObj($this->CretiveColname);
$obj=$this->prepare_array_Creativework();
$dbl->InsertCollection($obj,$this->objID);
$cursor = $dbl->get_CollectionObject($this->CretiveColname,$this->objID);
foreach ($cursor as $arr) 
{
$this->about->value = $arr['about'];
$this->author->value = $arr['author'];
}

echo "<b>about</b> : " . $this->printaboutHtmlTag().'<br>';
echo "<b>Author</b>  : ". $this->printauthorHtmlTag().'<br>';
}
private function printaboutHtmlTag()
{
$tag = new Tag($this->getaboutTag(), $this->getaboutAttributes(), $this->getaboutValue());
return $tag->get_tag();
}
private function printauthorHtmlTag(){
$tag = new Tag($this->getauthorTag(), $this->getauthorAttributes(), $this->getauthorValue());
return $tag->get_tag();
}
public function SearchCreativeWork()
{
$dbl=new DBLayer();
$dbl->setCollectionObj($this->CretiveColname);

$cursor = $dbl->get_CollectionObject($this->CretiveColname,$this->objID);
foreach ($cursor as $arr) 
{
$this->about->value = $arr['about'];
$this->author->value = $arr['author'];
}

echo "<b>about</b> : " . $this->printaboutHtmlTag().'<br>';
echo "<b>Author</b>  : ". $this->printauthorHtmlTag().'<br>';
}

public function UpdateCreativeWork($_criteria, $_newData)
{

	$dbl=new DBLayer();
	$dbl->setCollectionObj($this->Colname);
	$this->objID=$dbl->UpdateCollection($this->Colname, $_criteria, $_newData);
	$cursor = $dbl->get_CollectionObjectbyid($this->Colname,$this->objID);
	foreach ($cursor as $arr)
	{
		$this->about->value = $arr['about'];
		$this->author->value = $arr['author'];
	}

	echo "<b>about</b> : " . $this->printaboutHtmlTag().'<br>';
	echo "<b>Author</b>  : ". $this->printauthorHtmlTag().'<br>';
}

}
?>
