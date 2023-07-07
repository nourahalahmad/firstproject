<?php
session_start();
include ('connection.php');
include ('variables.php');
include ('functions.php');
include ('view/menu.php');
check_user();
$sql = "select * from categories";
$result = $conn-> query($sql);
while($row = $result-> fetch_assoc()){
	$categories[] = $row;
}
?>

<form action="saveproduct.php" method="post" enctype="multipart/form-data">
<table class="table">
  <tr>
    <td>Product name</td>
	<td>
	  <input type="text" name="name" value="" placeholder="Enter Product Name"  required />
	</td>
  </tr>
  <tr>
    <td>Image</td>
	<td>
	  <input type="file" name="image"/>
	</td>
  </tr>
  <tr>
    <td>Description</td>
	<td>
	  <textarea name="description"></textarea>
	</td>
  </tr>
  <tr>
    <td>video_link</td>
	<td>
	  <textarea name="video_link"></textarea>
	</td>
  </tr>
   <tr>
    <td>Category</td>
	<td>
	   <select name="category_id">
	   <?php foreach($categories as $category){ ?>
	   <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
	   <?php } ?>
	   </select>
	</td>
  </tr>
  
  <tr>
    <td></td>
	<td>
	  <input type="submit" name="sub" value="Save" class="btn btn-primary mt-2"/>
	</td>
  </tr>
</form>