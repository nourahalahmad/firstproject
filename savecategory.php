<?php
session_start();
include ('connection.php');
include ('variables.php');

include ('functions.php');
check_user();

$name = addslashes(trim($_POST['name']));
$comment = trim($_POST['comment']);

if(isset($_FILES['image']) and $_FILES['image']['error'] == 0){
	$targetDir = "uploads/";
	$imageType = strtolower(explode('/',$_FILES['image']['type'])[1]);//image/png   .png
	//print_r(explode('/',$_FILES['image']['type']));
	//out put Array ( [0] => image [1] => png )
	//die();
	//$array = explode('/',$_FILES['image']['type']) 
	//$array[0] = 'image';
	/** alternative way*/
	/*if($_FILES['image']['type'] == 'image/png'){
		$imageType = 'png';
	}
	if($_FILES['image']['type'] == 'image/jpg'){
		$imageType = 'jpg';
	}
	if($_FILES['image']['type'] == 'image/jpeg'){
		$imageType = 'jpeg';
	}*/
	//die(uniqid()); to get uniq name 
	$imageName = uniqid().'.'.$imageType;
	$targetFile = $targetDir.$imageName ;
	
	$allowedExtensions = ['png','jpg','jpeg','gif'];
	if(!in_array($imageType,$allowedExtensions)){
		die('not allowed extension');
	}
	if (!move_uploaded_file($_FILES['image']['tmp_name'],$targetFile)){
		die('not uploaded');
	}
}
$sql = "insert into categories (name,comment,image) values ('{$name}','{$comment}','{$imageName}')";
// Column count doesn't match value count at row 1 in
$conn-> query($sql);
header('Location: '.BASE_URL.'/addcategory.php');