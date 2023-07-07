<?php
$conn = new mysqli('localhost','root','','firstproject');
//database connection 
if($conn-> connect_errno){
	die('error');
}