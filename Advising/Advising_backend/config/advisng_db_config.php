<?php 
/*
File created by: Sean Doody 
Created for: Advising Systems Project 
Created on: 10/17/19
File Name: advising_db_config.php

*/

/* This files is ment to connect to the database. To save repeating code we can
* call the path to this file and it will connect to the database. 
* for example to call this file you need to type: require_once '../config/advisng_db_config.php
* Keep in mind this is just for how I have the file structor. If yours is diffent 
* you will need to adjust accordingly 
* I hope that this helps a bit.
*/


//info for the database 
$hostName = 'localhost'; // this would be hostname
$userName = 'root'; //users name 
$password = ''; //password if any ***if no password use ''*****
$dbName = 'cs492s19'; //database name 

//this reports any mysql and mysqli errors 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//commant to open a new connection to the database
//this is just a blueprint of what the connection to the database will look like
//everythin gyou see above is ment for xammp
//this will be differnt for the server that this is going to be hosted on. 
@$db = new mysqli($hostName, $userName, $password, $dbName);


//if there is an error it will throw this. 
if($db->connect_error){
    die('Connection Error ' . $db->connect_errno . ': ' . $db->connect_error);
}