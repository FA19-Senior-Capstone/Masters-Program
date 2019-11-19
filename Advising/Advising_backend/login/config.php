<?php

//connects to the username database

//this is for the main server 
 //@$db = new mysqli('localhost', 'advisinguser', '78uijk&*', 'advising_admins');

 //this is for the test server 
 @$db = new mysqli('localhost', 'root', '', 'advising_admins');

 //stops if there is an error 
 if ($db->connect_error) {
    die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
}
?>