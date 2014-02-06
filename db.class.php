<?php

require 'medoo.min.php';



class db{
	
	var $database;
	
	function __construct() {
		$this->database = new medoo('classroom_game');	
	}
	
	
	function grab_item($human_description, $number){
		
	
		$result = $this->database->query("SELECT `uri`.`uri`, 
					`uri`.`id`, 
					`label`.`label`, 
					`human_description`.`human_description` 
			
					FROM `uri` 
					
					LEFT JOIN `mapping_label` ON `uri`.`id` = `mapping_label`.`uri_id`
					 LEFT JOIN `mapping_human` ON `uri`.`id` = `mapping_human`.`uri_id` 
					 LEFT JOIN `human_description` ON `mapping_human`.`human_id` = `human_description`.`id` 
					 LEFT JOIN `label` ON `mapping_label`.`label_id` = `label`.`id`
					 
					Where human_description = '$human_description'

					ORDER BY RAND()
					LIMIT $number")->fetchAll();;
		
		
		return $result;
	}
	
	function generate_name(){
		
		
	$result = $this->database->query("
	SELECT name from names
	ORDER BY RAND()
	LIMIT 1")->fetchAll();;
	
	return $result[0]['name'];
	}
	

}