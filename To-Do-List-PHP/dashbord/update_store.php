<?php 
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];

$db_connect = mysqli_connect('localhost','root','','intern');
$all_data = "UPDATE users SET user_name = '$user_name', email = '$email' WHERE id = $user_id";
$mysql_qury = mysqli_query($db_connect, $all_data);

header('location:user_update.php');


?>