<?php
ini_set('display_errors', 'On');
class Thing extends Tag{
private $itemscope = 'http://www.schema.org/Thing';
private $id; //mongo object id

private $name;
private $url;
private $image;
private $description;
protected $test1;
public $objID;
Public $Colname="FinalThing";
private $itemtype = '"http://www.schema.org/Thing"';

function __construct(){
	//print 'I am in Thing Construtor';
}
//saves thing
function save_object($collection) {

$obj = $this->prepare_array();
$collection->insert($obj);
}
//gets a thing array to pass to mongo, it will error if you just pass in a $this because it can't access the private variables;
function prepare_array() {
/*Hardcoded Temp*/
//$obj['name'] = "First Recipe ";//$this->name->value;
//
    $obj['name'] = $_POST["RecipeName"];//"First Recipe";
    $obj['url'] =$_POST["URLName"];// "www.MyOwnRecipe.Com/EggOmlete";
    $obj['image'] = $_POST["ImageName"];//"EggOmlete.Jpg";
    $obj['description'] =$_POST["Description"];/// "This is first Recipe from Nirav.";
    return $obj;
//$obj = array( "about" => "Recipe system 1.0", "author" => "Nirav Patel");
//    $salaries["Bob"] = 2000;
//$salaries["Sally"] = 4000;
//$salaries["Charlie"] = 600;
//$salaries["Clare"] = 0;
//
//$obj['url'] = "www.MyOwnRecipe.Com/EggOmlete";//$this->url->value;
//$obj['image'] = 'EggOmlete.Jpg';//$this->image->value;
//$obj['description'] = 'This is first Recipe from Nirav.';//$this->description->value;
/*
foreach($this as $key => $value) {
$obj[$key] = $value;
}
*/
//return $salaries;
}
function getItemTypeValue() {

	return $this->itemtype;

}
function getItemTypeAttributes() {
		

	$this->itemtype->attributes['itemprop'] = 'itemtype';

}

function setItemTypeValue($var){
	$this->itemtype = $var;
}
function getItemScope() {

	return $this->itemscope;

}

function setNameValue($var) {

$this->name->value = $var;

}

function getNameValue() {

return $this->name->value;

}

function setNameTag($var) {

$this->name->tag = $var;
}

function getNameTag() {

	if(strlen($this->name->tag) != 0){
		return $this->name->tag;
	}
	else{
		return 'h1';
	}

}
function setNameAttributes($var) {

$class = get_class($this) . ' name ' . $var;
$this->name->attributes['class'] = $class;
$this->name->attributes['itemprop'] = 'name';

}

function getNameAttributes() {

return $this->name->attributes;

}

function setUrlValue($var) {

$this->url->value = $var;

}

function getUrlValue() {

return $this->url->value;

}

function setUrlTag($var) {

	$this->url->tag = $var;

}

function getUrlTag() {

	if(strlen($this->url->tag) != 0){
		return $this->url->tag;
	}
	else{
		return 'a';
	}
}
function setUrlAttributes($var) {

	$class = get_class($this) . ' url ' . $var;
	$this->url->attributes['class'] = $class;
	$this->url->attributes['itemprop'] = 'url';

}

function getUrlAttributes() {

return $this->url->attributes;

}
function setImageValue($var) {

$this->image->value = $var;

}

function getImageValue() {

return $this->image->value;

}

function setImageTag($var) {

	if(strlen($this->image->tag) != 0){
		return $this->image->tag;
	}
	else{
		return 'img';
	}

}

function getImageTag() {

return $this->image->tag;

}
function setImageAttributes($var) {

$class = get_class($this) . ' image ' . $var;
$this->image->attributes['class'] = $class;
$this->image->attributes['itemprop'] = 'image';

}

function getImageAttributes() {

return $this->image->attributes;

}
function setDescriptionValue($var) {

$this->description->value = $var;

}

function getDescriptionValue() {

	return $this->description->value;

}
function getDescriptionTag() {

	if(strlen($this->description->tag) != 0){
		return $this->description->tag;
	}
	else{
		return 'span';
	}

}
function getDescriptionFormFieldType() {

	return $this->description->form->fieldtype;

}
function setDescriptionFormFieldType($var) {

	$this->description->form->fieldtype = $var;

}
function getImageFormFieldType() {

return $this->image->form->fieldtype;

}
function setImageFormFieldType($var) {

$this->image->form->fieldtype = $var;

}
function getUrlFormFieldType() {

return $this->url->form->fieldtype;

}
function setUrlFormFieldType($var) {

$this->url->form->fieldtype = $var;

}
function getNameFormFieldType() {

return $this->name->form->fieldtype;

}

function setNameFormFieldType($var) {

$this->name->form->fieldtype = $var;

}
function setDescriptionTag($var) {

$this->description->tagtype = $var;

}


function setDescriptionAttributes($var) {

$class = get_class($this) . ' description ' . $var;
$this->description->attributes['class'] = $class;
$this->description->attributes['itemprop'] = 'description';

}

function getDescriptionAttributes() {

return $this->description->attributes;

}

function testclass($id = null, $collection = null) {
//allows the loading of object at instantiation;
if(!is_null($id)) {

$this->get_object($collection, $id);
}

$this->description->tag->tagtype = 'span';
$this->image->tag->tagtype = 'img';
$this->url->tag->tagtype = 'a';
$this->name->tag->tagtype = 'span';
$this->description->form->fieldtype = 'text';
$this->image->form->fieldtype = 'text';
$this->url->form->fieldtype = 'text';
$this->name->form->fieldtype = 'text';
$this->name->tag->attributes['class'] = get_class($this) . ' tag ';
$this->name->tag->attributes['itemprop'] = 'tag';
$this->url->tag->attributes['class'] = get_class($this) . ' url ';
$this->url->tag->attributes['itemprop'] = 'url';
$this->url->tag->attributes['href'] = 'myownrecipe.com';

$this->image->tag->attributes['class'] = get_class($this) . ' image ';
$this->image->tag->attributes['itemprop'] = 'image';
$this->description->tag->attributes['class'] = get_class($this) . ' description ';
$this->description->tag->attributes['itemprop'] = 'description';

//print_r($this);

}
public function PrintThing()
{
   // $this->get_object();
$dbl=new DBLayer();
$dbl->setCollectionObj($this->Colname);
$obj=$this->prepare_array();
$this->objID=$dbl->InsertCollection($obj,NULL);
$cursor = $dbl->get_CollectionObjectbyid($this->Colname,$this->objID);
foreach ($cursor as $arr) 
{
$this->name->value = $arr["name"];
$this->url->value = $arr["url"];
$this->image->value = $arr["image"];
$this->description->value = $arr["description"];
}
//echo 'Printing';
/*
echo '<b>Name<b></b> :'. $this->printNameHtmlTag().'<br>';
echo '<b>Description</b> :'. $this->printDescriptionHtmlTag().'<br>';
echo '<b>URL </b> :'. $this->printUrlHtmlTag().'<br>';
echo '<b>Image </b> :'. $this->printImageHtmlTag().'<br>';
*/
//$this->printNameHtmlTag();
    
}
private function printNameHtmlTag()
{
$tag = new Tag($this->getNameTag(), $this->getNameAttributes(), $this->getNameValue());
return $tag->get_tag();
}
private function printUrlHtmlTag(){
$tag = new Tag($this->getUrlTag(), $this->getUrlAttributes(), $this->getUrlValue());
return $tag->get_tag();
}

private function printDescriptionHtmlTag(){
$tag = new Tag($this->getDescriptionTag(), $this->getDescriptionAttributes(), $this->getDescriptionValue());
return $tag->get_tag();
}
private function printImageHtmlTag(){
$tag = new Tag($this->getImageTag(), $this->getImageAttributes(), $this->getImageValue());
return $tag->get_tag();
}
public function SearchThing($parmName,$parmval)
{
$dbl=new DBLayer();
$dbl->setCollectionObj($this->Colname);
$cursor = $dbl->get_CollectionObjectbysearchParameter($this->Colname,$parmName, $parmval);  
foreach ($cursor as $arr) 
{
$this->objID=$arr["_id"];
$this->name->value = $arr["name"];
$this->url->value = $arr["url"];
$this->image->value = $arr["image"];
$this->description->value = $arr["description"];
}
//echo 'Printing';
echo '<b>Name<b></b> :'. $this->printNameHtmlTag().'<br>';
echo '<b>Description</b> :'. $this->printDescriptionHtmlTag().'<br>';
echo '<b>URL </b> :'. $this->printUrlHtmlTag().'<br>';
echo '<b>Image </b> :'. $this->printImageHtmlTag().'<br>';

//$this->printNameHtmlTag();

}
/*** print html tag functions **/
private function printItemScopeHtmlOpen(){
	$tag = "<".'div'.' itemscope itemtype='.$this->getItemTypeValue();
	return $tag;
}


private function printItemScopeHtmlClose(){
	$tag = ">";
	return $tag;
}
function printHtml(){
	$html = $this->printItemScopeHtmlOpen();
	$html = $html.$this->printItemScopeHtmlClose().'<br>';
	$html = $html.$this->printNameHtmlTag().'<br>';
	$html = $html.$this->printUrlHtmlTag().'<br>';
	$html = $html.$this->printDescriptionHtmlTag().'<br>';
	$html = $html.$this->printImageHtmlTag().'<br>';
	return $html;
}
}
?>