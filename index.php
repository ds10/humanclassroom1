<?php

require 'db.class.php';
require 'student.class.php';

$db = new db;
//$student = new student;


//print_r($student);

//lets try a script first and then go OO on this bad boy


//1. Grab a name

print "Name:"; print $db->generate_name();
print "<br/><br/>Stats:";
$socialclass = $db->grab_item("social_class", 1); print "Social Class:";  print $socialclass[0]['label']; print "<br/><br/>";
$entertainment = $db->grab_item("entertainment", 1); print "Enjoys:";  print $entertainment[0]['label']; print "<br/><br/>";
$pet = $db->grab_item("pet", 1);print "Pet:";  print $pet[0]['label']; print "<br/><br/>";
$owns = $db->grab_item("toy", 1);print "Favourite toy:";  print $owns[0]['label']; print "<br/><br/>";
$stolen = $db->grab_item("stationary", 1);print "Stole  ";  print $stolen[0]['label']; print " from the classroom"; print "<br/><br/>";