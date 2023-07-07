<?php
include ('connection.php');

/*$mark = $_POST['mark'];
if( $mark  > 0  and $mark < 100 ){
	 echo 'ok ';
}else{
		 echo ' not ok ';
}
die();*/
//echo \'<pre>\';
//print_r($_POST);
//die();
$name = addslashes(trim($_POST['fname']));
$password = md5(trim($_POST['password']));
$email = trim($_POST['email']);

$sql = "insert into users (name,password,email) values ('{$name}','{$password}','{$email}')";
// Column count doesn't match value count at row 1 in
$conn-> query($sql);
header('Location: '.'http://localhost/firstproject/register.php');
