<?php 
if(isset($_GET['id'])){
    $user_id = $_GET['id']; 
    $db_connect = mysqli_connect('localhost', 'root', '', 'intern');
    $time_update = "UPDATE `users` SET  `deleted_at`= NULL WHERE id = $user_id";
    $final_quray = mysqli_query($db_connect,$time_update);
    header('location:trash_list.php');
}

?>