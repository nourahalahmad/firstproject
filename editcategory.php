<?php
session_start();
include ('connection.php');
include ('variables.php');
include ('functions.php');
include ('view/menu.php');
check_user();
$id =  $_GET['id'];

$sql = "select * from categories where id= '{$id}' limit 1";

$result = $conn-> query($sql);
if($result-> num_rows > 0){
	//admin@gmail.com
	$row = $result->fetch_assoc();

}
?>

<form action="saveeditcategory.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $id ?>" />
<table class="table">
  <tr>
    <td>Category name</td>
	<td>
	  <input type="text" name="name" value="<?php echo $row['name'] ?>" placeholder="Enter Category Name"  required />
	</td>
  </tr>
  <tr>
    <td>Image</td>
	<td>
	  <input type="file" name="image"/>
	</td>
  </tr>
  <tr>
    <td>comments</td>
	<td>
	  <textarea name="comment"><?php echo $row['comment'] ?></textarea>
	</td>
  </tr>
  <tr>
    <td></td>
	<td>
	  <input type="submit" name="sub" value="Save" class="btn btn-primary"/>
	</td>
  </tr>
</form>