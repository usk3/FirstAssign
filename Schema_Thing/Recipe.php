<?php
class Recipe extends Creative_Works {
	private $cookTime ;
	private $cookingMethod ;
	private $ingredients ;
	private $nutrition ;
	private $prepTime ;
	private $recipeCategory ;
	private $recipeCuisine ;
	private $recipeInstructions ;
	private $recipeYield ;
	private $totalTime ;
	private $itemType = '"http://www.schema.org/Recipe"';

	function getItemTypeValue() {

		return $this->itemtype;

	}
	function getItemTypeAttributes() {
			

		$this->itemtype->attributes['itemprop'] = 'itemtype';

	}

	function setItemTypeValue($var){
		$this->itemtype = $var;
	}

	function setIngredientsValue($var) {

		$this->ingredients->value = $var;

	}

	function getIngredientsValue() {

		return $this->ingredients->value;

	}

	function setIngredientsTag($var) {

		$this->ingredients->tag = $var;

	}

	function getIngredientsTag() {
		if(strlen($this->ingredients->tag) != 0){
			return $this->ingredients->tag;
		}
		else{
			return 'span';
		}

	}
	function setIngredientsAttributes($var) {
		//$class = get_class($this) . ' ingredients ' . $var;
		//$this->ingredients->attributes['class'] = $class;
		$this->ingredients->attributes['itemprop'] = 'ingredients';
	}

	function getIngredientsAttributes() {

		return $this->ingredients->attributes;

	}

	private function printIngredientsHtmlTag(){
		$tag = new Tag($this->getIngredientsTag(), $this->getIngredientsAttributes(), $this->getIngredientsValue());
		return $tag->get_tag();
	}

	function setCookTimeValue($var) {

		$this->cookTime->value = $var;

	}

	function getCookTimeValue() {

		return $this->cookTime->value;

	}

	function setCookTimeTag($var) {

		$this->cookTime->tag = $var;

	}

	function getCookTimeTag() {
		if(strlen($this->cookTime->tag) != 0){
			return $this->cookTime->tag;
		}
		else{
			return 'meta';
		}

	}
	function setCookTimeAttributes($var) {
		//$class = get_class($this) . ' cookTime ' . $var;
		//$this->cookTime->attributes['class'] = $class;
		$this->cookTime->attributes['itemprop'] = 'cookTime';
	}

	function getCookTimeAttributes() {

		return $this->cookTime->attributes;

	}

	private function printCookTimeHtmlTag(){
		$tag = new Tag($this->getCookTimeTag(), $this->getCookTimeAttributes(), $this->getCookTimeValue());
		return $tag->get_tag();
	}
	
	function setPrepTimeValue($var) {

		$this->prepTime->value = $var;

	}

	function getPrepTimeValue() {

		return $this->prepTime->value;

	}

	function setPrepTimeTag($var) {

		$this->prepTime->tag = $var;

	}

	function getPrepTimeTag() {
		if(strlen($this->prepTime->tag) != 0){
			return $this->prepTime->tag;
		}
		else{
			return 'meta';
		}

	}
	function setPrepTimeAttributes($var) {
		//$class = get_class($this) . ' prepTime ' . $var;
		//$this->prepTime->attributes['class'] = $class;
		$this->prepTime->attributes['itemprop'] = 'prepTime';
	}

	function getPrepTimeAttributes() {

		return $this->prepTime->attributes;

	}

	private function printPrepTimeHtmlTag(){
		$tag = new Tag($this->getPrepTimeTag(), $this->getPrepTimeAttributes(), $this->getPrepTimeValue());
		return $tag->get_tag();
	}
	
	function setCookingMethodValue($var) {

		$this->cookingMethod->value = $var;

	}

	function getCookingMethodValue() {

		return $this->cookingMethod->value;

	}

	function setCookingMethodTag($var) {

		$this->cookingMethod->tag = $var;

	}

	function getCookingMethodTag() {
		if(strlen($this->cookingMethod->tag) != 0){
			return $this->cookingMethod->tag;
		}
		else{
			return 'h1';
		}

	}
	function setCookingMethodAttributes($var) {
		//$class = get_class($this) . ' cookingMethod ' . $var;
		//$this->cookingMethod->attributes['class'] = $class;
		$this->cookingMethod->attributes['itemprop'] = 'cookingMethod';
	}

	function getCookingMethodAttributes() {

		return $this->cookingMethod->attributes;

	}

	private function printCookingMethodHtmlTag(){
		$tag = new Tag($this->getCookingMethodTag(), $this->getCookingMethodAttributes(), $this->getCookingMethodValue());
		return $tag->get_tag();
	}
	
	function setRecipeInstructionsValue($var) {

		$this->recipeInstructions->value = $var;

	}

	function getRecipeInstructionsValue() {

		return $this->recipeInstructions->value;

	}

	function setRecipeInstructionsTag($var) {

		$this->recipeInstructions->tag = $var;

	}

	function getRecipeInstructionsTag() {
		if(strlen($this->recipeInstructions->tag) != 0){
			return $this->recipeInstructions->tag;
		}
		else{
			return 'span';
		}

	}
	function setRecipeInstructionsAttributes($var) {
		//$class = get_class($this) . ' recipeInstructions ' . $var;
		//$this->recipeInstructions->attributes['class'] = $class;
		$this->recipeInstructions->attributes['itemprop'] = 'recipeInstructions';
	}

	function getRecipeInstructionsAttributes() {

		return $this->recipeInstructions->attributes;

	}

	private function printRecipeInstructionsHtmlTag(){
		$tag = new Tag($this->getRecipeInstructionsTag(), $this->getRecipeInstructionsAttributes(), $this->getRecipeInstructionsValue());
		return $tag->get_tag();
	}
	
	function setRecipeCategoryValue($var) {

		$this->recipeCategory->value = $var;

	}

	function getRecipeCategoryValue() {

		return $this->recipeCategory->value;

	}

	function setRecipeCategoryTag($var) {

		$this->recipeCategory->tag = $var;

	}

	function getRecipeCategoryTag() {
		if(strlen($this->recipeCategory->tag) != 0){
			return $this->recipeCategory->tag;
		}
		else{
			return 'span';
		}

	}
	function setRecipeCategoryAttributes($var) {
		//$class = get_class($this) . ' recipeCategory ' . $var;
		//$this->recipeCategory->attributes['class'] = $class;
		$this->recipeCategory->attributes['itemprop'] = 'recipeCategory';
	}

	function getRecipeCategoryAttributes() {

		return $this->recipeCategory->attributes;

	}

	private function printRecipeCategoryHtmlTag(){
		$tag = new Tag($this->getRecipeCategoryTag(), $this->getRecipeCategoryAttributes(), $this->getRecipeCategoryValue());
		return $tag->get_tag();
	}
	
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
		$html = $html.$this->printCookTimeHtmlTag().'<br>';
		$html = $html.$this->printRecipeCategoryHtmlTag().'<br>';
		$html = $html.$this->printPrepTimeHtmlTag().'<br>';
		$html = $html.$this->printCookingMethodHtmlTag().'<br>';
		$html = $html.$this->printIngredientsHtmlTag().'<br>';
		$html = $html.$this->printRecipeInstructionsHtmlTag().'<br>';
		
		return $html;
	}
}
