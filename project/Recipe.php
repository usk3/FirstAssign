<?php

/**
This class provides details of Recipe.Extracts information from other two classes.Thing and Creative work and 
 * Display all relevant information for recipe.
 * @author Dishna
 */
class Recipe Extends CreativeWork
{
Public $RecipeColname="RecipeWork";
private $instructions;
private $ingredients;

function Recipe() {
    parent::__construct();
    $this->instructions->tag->tagtype = 'span';
    $this->ingredients->tag->tagtype = 'span';
    $this->setinstructionsAttributes('instructions');
    $this->setingredientsAttributes('ingredients');
}
function prepare_array_Recipework() 
{
    $obj['instructions'] =$_POST["Instructions"];
    $obj['ingredients'] = $_POST["Ingredients"];
    return $obj;
}
function setinstructionsValue($var) 
{
    $this->instructions->value = $var;
}
function getinstructionsValue() 
{
    return $this->instructions->value;
}
function setinstructionsTag($var) 
{
    $this->instructions->tag->tagtype = $var;
}
function getinstructionsTag() 
{
 return $this->instructions->tag->tagtype ;
}
function setinstructionsAttributes($var) 
{
$class = get_class($this) . ' instructions ' . $var;
$this->instructions->tag->attributes['class'] = $class;
$this->instructions->tag->attributes['itemprop'] = 'instructions';
}
function getinstructionsAttributes() 
{
return $this->instructions->tag->attributes;
}
function setingredientsValue($var) 
{
    $this->ingredients->value = $var;
}
function getingredientsValue() 
{
    return $this->ingredients->value;
}
function setingredientsTag($var) 
{
    $this->ingredients->tag->tagtype = $var;
}
function getingredientsTag() 
{
 return $this->ingredients->tag->tagtype ;
}
function setingredientsAttributes($var) 
{
$class = get_class($this) . ' ingredients ' . $var;
$this->ingredients->tag->attributes['class'] = $class;
$this->ingredients->tag->attributes['itemprop'] = 'ingredients';
}
function getingredientsAttributes() 
{
return $this->ingredients->tag->attributes;
}
public function PrintRecipeWork()
{

$dbl=new DBLayer();
$dbl->setCollectionObj($this->RecipeColname);
$obj=$this->prepare_array_Recipework();
$dbl->InsertCollection($obj,$this->objID);
$cursor = $dbl->get_CollectionObject($this->RecipeColname,$this->objID);
foreach ($cursor as $arr) 
{
$this->instructions->value = $arr['instructions'];
$this->ingredients->value = $arr['ingredients'];
}

echo "<b>Instructions</b> : " . $this->printinstructionsHtmlTag().'<br>';
echo "<b>Ingredients</b>  : ". $this->printingredientsHtmlTag().'<br>';
}
private function printinstructionsHtmlTag()
{
$tag = new Tag($this->getinstructionsTag(), $this->getinstructionsAttributes(), $this->getinstructionsValue());
return $tag->get_tag();
}
private function printingredientsHtmlTag()
{
$tag = new Tag($this->getingredientsTag(), $this->getingredientsAttributes(), $this->getingredientsValue());
return $tag->get_tag();
}
public function SearchRecipeWork()
{
$dbl=new DBLayer();
$dbl->setCollectionObj($this->RecipeColname);
$cursor = $dbl->get_CollectionObject($this->RecipeColname,$this->objID);
foreach ($cursor as $arr) 
{
$this->instructions->value = $arr['instructions'];
$this->ingredients->value = $arr['ingredients'];
}
echo "<b>Instructions</b> : " . $this->printinstructionsHtmlTag().'<br>';
echo "<b>Ingredients</b>  : ". $this->printingredientsHtmlTag().'<br>';
}

}
?>
