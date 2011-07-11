<?php
class Creative_Works extends Thing{

	private $about;
	private $aggregateRating;
	private $audio;
	private $author;
	private $awards;
	private $contentLocation;
	private $ContentRating;
	private $datePublished;
	private $editor;
	private $encodings;
	private $genre;
	private $headline;
	private $inLanguage;
	private $interactionCount;
	private $isFamilyFriendly;
	private $keywords;
	private $offers;
	private $publisher;
	private $reviews;
	private $video;
	private $itemType = '"http://www.schema.org/CreativeWorks"';

	function getItemTypeValue() {

		return $this->itemtype;

	}
	function getItemTypeAttributes() {
			

		$this->itemtype->attributes['itemprop'] = 'itemtype';

	}

	function setItemTypeValue($var){
		$this->itemtype = $var;
	}

	function setAboutValue($var) {

		$this->about->value = $var;

	}

	function getAboutValue() {

		return $this->about->value;

	}

	function setAboutTag($var) {

		$this->about->tag = $var;

	}

	function getAboutTag() {
		if(strlen($this->about->tag) != 0){
			return $this->about->tag;
		}
		else{
			return 'h1';
		}

	}
	function setAboutAttributes($var) {
		//$class = get_class($this) . ' about ' . $var;
		//$this->about->attributes['class'] = $class;
		$this->about->attributes['itemprop'] = 'about';
	}

	function getAboutAttributes() {

		return $this->about->attributes;

	}

	private function printAboutHtmlTag(){
		$tag = new Tag($this->getAboutTag(), $this->getAboutAttributes(), $this->getAboutValue());
		return $tag->get_tag();
	}

	function setAggregateRatingValue($var) {

		$this->aggregateRating->value = $var;

	}

	function getAggregateRatingValue() {

		return $this->aggregateRating->value;

	}

	function setAggregateRatingTag($var) {

		$this->aggregateRating->tag = $var;

	}

	function getAggregateRatingTag() {
		if(strlen($this->aggregateRating->tag) != 0){
			return $this->aggregateRating->tag;
		}
		else{
			return 'h1';
		}

	}
	function setAggregateRatingAttributes($var) {
		 
		//$class = get_class($this) . ' aggregateRating ' . $var;
		//$this->aggregateRating->attributes['class'] = $class;
		$this->aggregateRating->attributes['itemprop'] = 'aggregateRating';
	}

	function getAggregateRatingAttributes() {

		return $this->aggregateRating->attributes;

	}
	private function printAggregateRatingHtmlTag(){
		$tag = new Tag($this->getAggregateRatingTag(), $this->getAggregateRatingAttributes(), $this->getAggregateRatingValue());
		return $tag->get_tag();
	}
	
function setAuthorValue($var) {

		$this->author->value = $var;

	}

	function getAuthorValue() {

		return $this->author->value;

	}

	function setAuthorTag($var) {

		$this->author->tag = $var;

	}

	function getAuthorTag() {
		if(strlen($this->author->tag) != 0){
			return $this->author->tag;
		}
		else{
			return 'span';
		}

	}
	function setAuthorAttributes($var) {
	  
		//$class = get_class($this) . ' author ' . $var;
		//$this->author->attributes['class'] = $class;
		$this->author->attributes['itemprop'] = 'author';
	}

	function getAuthorAttributes() {

		return $this->author->attributes;

	}
	
private function printAuthorHtmlTag(){
		$tag = new Tag($this->getAuthorTag(), $this->getAuthorAttributes(), $this->getAuthorValue());
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
		$html = $html.$this->printAboutHtmlTag().'<br>';
		$html = $html.$this->printAggregateRatingHtmlTag().'<br>';
		$html = $html.$this->printAuthorHtmlTag().'<br>';
		return $html;
	}

}