<?php
class html_class {
	
	var $h1 ="<h1>Header1</h1>";
	var $h2	="<h2>Header2</h2>";
	var $h3	="<h3>Header3</h3>";
	var $h4	="<h4>Header4</h4>";
	var $h5	="<h5>Header5</h5>";
	var $h6	="<h6>Header6</h6>";
	
	var $starthtmltag	="<html> ";
	var $closehtmltag	="</html> ";
	
	var $startbodytag	="<body> ";
	var $closebodytag	="</body> ";
	
	var $doctype	="<!DOCTYPE html>";
	
	var $csslink	='<link rel="stylesheet" type="text/css" href="';
	var $cssfile	='mystyle.css" >';
	
	
	var $jsfile	='jsquery.js" >';
	var $jslink	= '<script type="text/javascript" src="';
	
			
	function getH1Tag(){
		return $this->h1;
	}
	
	function setH1Tag($_str){
		$this->h1 = '<h1>'.$_str.'</h1>';
	}
	
	function getH2Tag(){
		return $this->h2;
	}
	
	function setH2Tag($_str){
		$this->h2 = '<h2>'.$_str.'</h2>';
	}
	
	function getH3Tag(){
		return $this->h3;
	}
	
	function setH3Tag($_str){
		$this->h3 = '<h3>'.$_str.'</h3>';
	}
	
	function getH4Tag(){
		return $this->h4;
	}
	
	function setH4Tag($_str){
		$this->h4 = '<h4>'.$_str.'</h4>';
	}
	
	function getH5Tag(){
		return $this->h5;
	}
	
	function setH5Tag($_str){
		$this->h5 = '<h5>'.$_str.'</h5>';
	}
	
	function getH6Tag(){
		return $this->h6;
	}
	
	function setH6Tag($_str){
		$this->h6 = '<h6>'.$_str.'</h6>';
	}
	
	function getStartHtmlTag(){
		return $this->starthtmltag;
	}
	
	function getCloseHtmlTag(){
		return $this->closehtmltag;
	}
	
	function getStartBodyTag(){
		return $this->startbodytag;
	}
	
	function getCloseBodyTag(){
		return $this->closebodytag;
	}
	
	function getDocTypeTag(){
		return $this->doctype;
	}
	
	function getCssFileLink(){
		return $this->csslink.$this->cssfile;
	}
	
	function getJSFileLink(){
		return $this->jslink.$this->jsfile;
	}
	
	function setCssFile($var){
		$this->cssfile = "$var".'">';
	}
	
	function setJSFile($var){
		$this->jsfile = "$var".'">';
	}
}