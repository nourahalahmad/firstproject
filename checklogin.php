<?php
session_start();
include ('connection.php');
include ('variables.php');
$email = $_POST['email'];
$password =  md5($_POST['password']);

$sql = "select * from users where email= '{$email}' and password = '{$password}' limit 1";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
	//admin@gmail.com
	$row = $result->fetch_assoc();
  
    $_SESSION['username']  = $row['name'];
    $_SESSION['type'] = $row ['type'];
	$_SESSION['useremail'] = $row ['email'];
   	
	//super global array
	// type = 1 means admin 0 is usual 
	if($row ['type'] == 1){
		
		 header('Location: '.BASE_URL.'users.php');
	}else{
		echo 'user name = '.$row['name'];
		die(' you are not admin');
	}
	//print_r($row);

}else{
	echo 'not exist ';
}