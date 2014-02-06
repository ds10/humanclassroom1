<?php
class items{
	
	function __construct() {
		
		$this->database = new medoo('classroom_game');
		$this->emotion = ($this->database->select("emotion", "*"));
		$this->entertainment = ($this->database->select("entertainment", "*"));
		$this->names = ($this->database->select("names", "*"));
		$this->stationary = ($this->database->select("stationary", "*"));
		$this->uni = $this->database->select("University", "*");
		
	
	}

}