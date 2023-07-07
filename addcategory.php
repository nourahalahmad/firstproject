<?php
session_start();
include ('connection.php');
include ('variables.php');
include ('functions.php');
include ('view/menu.php');
check_user();
?>

<form action="savecategory.php" method="post" enctype="multipart/form-data">
<table class="table">
  <tr>
    <td>Category name</td>
	<td>
	  <input type="text" name="name" value="" placeholder="Enter Category Name"  required />
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
	  <textarea name="comment"></textarea>
	</td>
  </tr>
  <tr>
    <td></td>
	<td>
	  <input type="submit" name="sub" value="Save" class="btn btn-primary mt-2"/>
	</td>
  </tr>
</form>