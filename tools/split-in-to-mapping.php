<?php

require '../medoo.min.php';

$database = new medoo('classroom_game');
$uri_ = $database->select("uri_", "*");
$new_uri_and_labels=array("_toy_brands","_emotion","_entertainment","_pet","_social_class","_stationery");
 
//lets put in descriptions first
foreach ($new_uri_and_labels as $key=>$table){
	
	$sorted=$database->insert("_human_description", ["human_description"=>$table] );

	
}


foreach ($new_uri_and_labels as $key=>$table){
	 
	$results = $database->select($table, "*");
	
	foreach ($results as $result){
		$id = $database->insert("_uri", ["uri"=>$result["isValueOf"]] );
		$human_description_id = $database->select("_human_description", "*",  ["human_description" => $table]);
		$mapping_id=$database->insert("_mapping_human", ["human_id" => $human_description_id[0]['id'] , "uri_id" => $id]);

		$id3 = $database->insert("_label", ["label"=>$result["name"]] );
		$mapping_idlab=$database->insert("_mapping_label", ["label_id" => $id3 , "uri_id" => $id]);
	
		//insert label and map
	}
	
	
	//foreach ($results as $uri){
		// $human_description_id = $database->select("_label", "id",  ["label" => $uri['name']]);
   	  	// $uri_id = $database->select("uri", "id",  ["uri" => $uri['URI']]); 
    	// $last_user_id = $database->insert("mapping_label", ["label_id" => $human_description_id[0] , "uri_id" => $uri_id[0]]);
	//}
	
	
	
}

exit();

foreach ($result as $uri){
	 
	 $human_description_id = $database->select("label", "id",  ["label" => $uri['name']]);
     $uri_id = $database->select("uri", "id",  ["uri" => $uri['URI']]); 
     $last_user_id = $database->insert("mapping_label", ["label_id" => $human_description_id[0] , "uri_id" => $uri_id[0]]);

}


