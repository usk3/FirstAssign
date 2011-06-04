<?php

class build_tag_lib{

	var $tagName;
	var $attributes;
	var $contents;
	var $htmlTag;
	var $SPECIAL ="Special";
	var $REGULAR = "Regular";
	var $ERROR = "Error";
	var $WARNING ="Warning";

	function buildTag($_tagName, $_attributes, $_contents){
		$this->tagName = $_tagName;
		$this->attributes = $_attributes;
		$this->contents = $_contents;

		$this->setHtmlTag($_tagName, $_attributes, $_contents);
	}

	function getHtmlTag(){
		return $this->htmlTag;
	}

	function getTagName(){
		return $this->tagName;
	}

	function getAttributes(){
		return $this->attribues;
	}

	function getContents(){
		return $this->contents;
	}

	function setHtmlTag($_tagName, $_attributes, $_contents){
		$return_status = $this->validate_tag_names($_tagName);
		$this->validate_global_attributes($_attributes);
		$final_tag = '<'.$_tagName.' ';

		switch($return_status){
			case $this->REGULAR:
				{
					foreach($_attributes as $key => $value){
						$attrib .= $key.'='.$value.' ';
					}
					$final_tag .= $attrib.'>'."$_contents"."</".$_tagName.'>';
					break;
				}
			case $this->SPECIAL:
				{
					$final_tag .= $this->compose_special_tag($_tagName, $_attributes, $_contents);
					break;
				}
			case "Error":
				{
					print "Unknown tag";
					break;
				}
		}
		$this->htmlTag = $final_tag;
	}

	function validate_tag_names($_tagName){
		$valid_tags = array("!DOCTYPE","h1","h2","h3","h4","h5","h6","A","link","address","article","blockquote","body","html","footer","br","div","form","head","header","ol","ul","li","p","span","section","nav","style","details","summary","menu","meta","title","dl","dt","dfn");
		$special_tags = array("!DOCTYPE","br","meta","nav","ol","menu","ul","dl");

		if(in_array($_tagName, $special_tags)){
			return $this->SPECIAL;
		}elseif (in_array($_tagName, $valid_tags)) {
			return $this->REGULAR;
		}else{
			print "Unknown Tag Name $_tagName";
			return $this->ERROR;
		}

	}

	function compose_special_tag($_tagName, $_attributes, $_contents){
		$sp_tag;
		$attrib;

		switch(strtoupper($_tagName)){
			case "!DOCTYPE":
				$sp_tag = " HTML>";
				break;
			case "BR":
				$sp_tag = ">";
				break;
			case "NAV":
				{
					$this->buildTag("A", $_attributes, $_contents);
					$a_tag .= $this->getHtmlTag();
					$sp_tag = ">".$a_tag."</"._tagName.">";
					break;
				}
			case "OL":
			case "MENU":
			case "UL":
				{
					foreach($_attributes as $key => $value){
						$attrib .= $key.'='.$value.' ';
					}
					foreach($_contents as $fields){
						$this->buildTag("li", "", $fields);
						$a_tag .= $this->getHtmlTag();
					}
					$sp_tag = $attrib.">".$a_tag."</"._tagName.">";
					break;
				}
			case "DL":
				{
					foreach($_attributes as $key => $value){
						$attrib .= $key.'='.$value.' ';
					}
					foreach($_contents as $fields){
						$this->buildTag("dt", "", $fields);
						$a_tag .= $this->getHtmlTag();
					}
					$sp_tag = $attrib.">".$a_tag."</"._tagName.">";
					break;
				}
			case "META":
				$sp_tag = "/>";
				break;
		}
		return $sp_tag;
	}

	function validate_global_attributes($_attributes){
		foreach($_attributes as $key => $value){

			if(is_int($value) || is_int($key)){
				echo '<br>';
				print "Invalid value, Expected String but found Numeric:$key:$value ";
				echo '<br>';
				return $this->ERROR;
			}
			switch ($key){
				case "contenteditable":
					if(strcmp($value, "true") != 0 ||  strcmp($value, "false") != 0){
						print "Expected values are true or false, Invalid value $value for $key";
					}

				case "dir":
					if (strcmp(strtolower($value), "ltr")!=0 || strcmp(strtolower($value), "rtl")!=0 ){
						print "Invalid value, Expected ltr or rtl: $key:$value ";
					}
				case "draggable":
					if (strcmp(strtolower($value), "true")!=0 || strcmp(strtolower($value), "false")!=0  || strcmp(strtolower($value), "auto")!=0){
						print "Invalid value, Expected true, false or auto: $key:$value ";
					}
				case "hidden":
					if (strcmp(strtolower($value), "hidden")!=0){
						print "Invalid value, Expected hidden : $key:$value ";
					}
				case "spellcheck":
					if (strcmp(strtolower($value), "true")!=0 || strcmp(strtolower($value), "false")!=0){
						print "Invalid value, Expected true or false : $key:$value ";
					}
			}
		}
			
	}
}