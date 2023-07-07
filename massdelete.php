<?php
include ('connection.php');
include ('variables.php');
$ides = $_POST['ides'];
$idesTodelete = implode(',',$ides );
$sql = "delete from  `users`  where id in ($idesTodelete)";
if($conn-> query($sql)){
	header('Location: '.BASE_URL.'users.php?message=true');
}
