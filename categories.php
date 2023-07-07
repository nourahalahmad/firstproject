<?php
session_start();
include ('connection.php');
include ('variables.php');
include ('functions.php');
include ('view/menu.php');
check_user();
$search = "";
if(isset($_GET['cname'])){
	$name = $_GET['cname'];
	$search = " where name like '%{$name}%'";
}
$sql = "select * from categories $search order by id desc";
$result = $conn-> query($sql);
if(isset($_GET['message'])){
	echo 'Done';
}
while($row = $result-> fetch_assoc()){
	$categories[] = $row;
}
//echo '<pre>';
//print_r($users);
?>
<form action="" method="get">
  <input type="text" name="cname" />
  <input type="submit" name="search" value="Search"/>
</form>
<?php
echo '<form action="massdelete.php" method="post">';
echo "<table width='100%' class='table table-success table-striped'>";
echo '<tr><th align="left">Name </th> <th align="left"> Image</th> <th align="left"> Id</th><th align="left"> Operation</th></tr>';
foreach($categories as $category){
	?>
	 <tr>
	 <td><?php echo $category['name']?></td>
	 <td>
	 <?php if(!empty($category['image'])){?>
	 <img src="uploads/<?php echo $category['image']?>" width="50px" height="50px"/>
	 <?php } ?>
	 </td>
	 <td><?php echo $category['id']?></td>
	 <td><a href="editcategory.php?id=<?php echo $category['id']?>">Edit</a></td>
	 <td><a href="javascript:void(0)" onclick="delete_category('<?php echo $category['id']?>')">Delete</a> 
	 <input type="checkbox" name="ides[]" value="'<?php echo $category['id']?>'"/></td></tr>
<?php	 
}
echo "</table>";
echo '<input type="submit" value="Send"/>';
echo '</form>';
?>
<script>
function delete_category(id){
	var conf  = confirm ('Are You Sure to Delete This Category?');
	// conf == true  if true means user confirmed
	// (conf == true)
	if(conf){
		window.location.href="<?php echo BASE_URL?>deletecategory.php?id="+id;
	}else{
		alert('not deleted');
	}
}
</script>