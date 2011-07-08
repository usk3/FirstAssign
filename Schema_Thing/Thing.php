<?php

class Thing extends Tag{

	private $name;
	private $url;
	private $image;
	private $description;
	private $itemtype = '"http://www.schema.org/Thing"';

	function getItemTypeValue() {

		return $this->itemtype;

	}
	function getItemTypeAttributes() {
		 

		$this->itemtype->attributes['itemprop'] = 'itemtype';

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
	  
		//$class = get_class($this) . ' name ' . $var;
		//$this->name->attributes['class'] = $class;
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

		return $this->url->tag;

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

		$this->image->tag = $var;

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

	function setDescriptionTag($var) {

		$this->description->tag = $var;

	}

	function getDescriptionTag() {

		return $this->description->tag;

	}
	function setDescriptionAttributes($var) {
		 
		$class = get_class($this) . ' description ' . $var;
		$this->description->attributes['class'] = $class;
		$this->description->attributes['itemprop'] = 'description';

	}

	function getDescriptionAttributes() {

		return $this->description->attributes;

	}
	/*** print html tag functions **/
	private function printItemScopeHtmlOpen(){
		$tag = "&lt".'div'.' itemscope itemtype='.$this->getItemTypeValue();
		return $tag;
	}
	
	
	private function printItemScopeHtmlClose(){
		$tag = "&gt";
		return $tag;
	}

	private function printNameHtmlTag(){
		$tag = new Tag($this->getNameTag(), $this->getNameAttributes(), $this->getNameValue());
		return $tag->get_tag();
	}

	function printHtml(){
		$html = $this->printItemScopeHtmlOpen();
		$html = $html.$this->printItemScopeHtmlClose();
		$html = $html.$this->printNameHtmlTag();
		return $html;
	}

}


?>