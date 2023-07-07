<?php
function check_user(){
	if($_SESSION['type'] != 1){
	  return header('Location: '.BASE_URL.'login.php');
	}

}