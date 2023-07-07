<?php
session_start();
include ('connection.php');
include ('variables.php');
include ('functions.php');
include ('view/menu.php');
check_user();

$sql = "select * from users  ";
$result = $conn-> query($sql);
if(isset($_GET['message'])){
	echo 'Done';
}
while($row = $result-> fetch_assoc()){
	$users[] = $row;
}
//echo '<pre>';
//print_r($users);
echo '<form action="massdelete.php" method="post" class="table table-success table-striped">';
echo "<table width='100%'>";
echo '<tr><th align="left">Name </th> <th align="left"> Email</th> <th align="left"> Id</th><th align="left"> Operation</th></tr>';
foreach($users as $user){
	 echo '<tr><td>'.$user['name'].'</td><td>'.$user['email'].'</td>';
	 echo '<td> '.$user['id']. '</td><td><a href="javascript:void(0)" onclick="delete_user('.$user['id'].')">Delete</a>'; 
	 echo '<input type="checkbox" name="ides[]" value="'.$user['id'].'"/></td></tr>';
}
echo "</table>";
echo '<input type="submit" value="Send"/>';
echo '</form>';
?>
<script>
function delete_user(id){
	var conf  = confirm ('Are You Sure to Delete ThisUser?');
	// conf == true  if true means user confirmed
	// (conf == true)
	if(conf){
		window.location.href="<?php echo BASE_URL?>deleteuser.php?id="+id;
	}else{
		alert('not deleted');
	}
}
</script>