<?php

$hostname="localhost";
$username="root";
$password="";
$db_name="project";

$connecton = mysqli_connect($hostname, $username, $password, $db_name);

if (!$connecton){
    
    die("database not connect". mysqli_connect_error());
    
    
    
}
 


