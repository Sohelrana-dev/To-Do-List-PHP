<?php 
session_start();

$email = $_POST['email'];
$password = $_POST['password'];


$db_connect = mysqli_connect('localhost', 'root', '', 'intern');
$select_quiry = "SELECT COUNT(*) AS result FROM users WHERE email= '$email'";
$db_final_query = mysqli_query($db_connect, $select_quiry);
$fetch_assoc = mysqli_fetch_assoc($db_final_query);


if($fetch_assoc['result'] == 1){
    $select_quiry = "SELECT * FROM users WHERE email= '$email'";
    $db_final_query = mysqli_query($db_connect, $select_quiry);
    $fetch_assoc5 = mysqli_fetch_assoc($db_final_query);
    if(password_verify($password,  $fetch_assoc5['password'])){
        $select_quiry = "SELECT * FROM users WHERE email= '$email'";
        $db_final_query = mysqli_query($db_connect, $select_quiry);
        $fetch_assoc_type = mysqli_fetch_assoc($db_final_query);
        if($fetch_assoc_type['type'] == 'Admin' || $fetch_assoc_type['type'] == 'sub_admin'){
            $_SESSION['user_id'] = $fetch_assoc_type['id'];
            header('location:dashbord/admin_user_list.php');
        }
        else{
            $_SESSION['user_id'] = $fetch_assoc_type['id'];
             header('location:dashbord/user_list.php');
        }
        
    }   
    else{
         header('location: login.php');
         $_SESSION['pass_err'] = "Enter valid password";
    }
}
else{
     header('location: login.php');
     $_SESSION['login_err'] = "Enter valid email";
}

?>