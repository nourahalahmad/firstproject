<?php
include ('connection.php');
include ('variables.php');
$id = $conn->real_escape_string( $_GET['id']);
$sql = "delete from users where id = {$id}  ";
if($conn-> query($sql)){
	header('Location: '.BASE_URL.'users.php?message=true');
}