<?php 
$type = str_replace(' ', '_', $_POST['type']);
$user_id = $_POST['user_id'];

   $db_connect = mysqli_connect('localhost', 'root', '', 'intern');
   $time_update = "UPDATE users SET type = '$type' WHERE id = $user_id";
   $final_quray = mysqli_query($db_connect,$time_update);
   header('location:switch_user.php');

?>