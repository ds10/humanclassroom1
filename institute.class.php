<?php
class institute{
	
	function __construct($items) {

		//print_r($items);
		$this->name = ($items->uni[array_rand($items->uni)]["name"]);
		$this->students = ($items->uni[array_rand($items->uni)]["numberofstudents"]);
		$this->staff = ($items->uni[array_rand($items->uni)]["numberofstaff"]);
			
	}

}