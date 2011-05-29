<?php
class class_person {
	var $firstName = "UnKnown";
	var $lastName = "UnKnown";
	var $country = "UnKnown";
	
	function getFirstName() {
		return $this->firstName;
	}
	
function getLastName() {
		return $this->lastName;
	}
	
function getCountry() {
		return $this->country;
	}
	
function setFirstName($_name) {
		$this->firstName = $_name;
	}
	
function setLastName($_name) {
		$this->lastName = $_name;
	}
	
function setCountry($_country) {
		$this->country = $_country;
	}
	
}