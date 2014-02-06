<?php

//activities
class entertainment{
	
	function __construct($items) {

		//print_r($items);
		$this->name = ($items->entertainment[array_rand($items->uni)]["name"]);
		//sooner or later we will want to call more than the name	
	}

}

//feelings
class emotion{
	
	function __construct($items) {

		//print_r($items);
		$this->name = ($items->entertainment[array_rand($items->uni)]["name"]);
		//sooner or later we will want to call more than the name	
	}

}


//physical things
class stationary{
	
	function __construct($items) {

		//print_r($items);
		$this->name = ($items->stationary[array_rand($items->stationary)]["name"]);
		//sooner or later we will want to call more than the name	
	}

}