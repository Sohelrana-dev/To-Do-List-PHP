<?php 
session_start();

$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$red_signal = false;

$db_connect = mysqli_connect('localhost', 'root', '', 'intern');
$email_quiry = "SELECT COUNT(*) AS result FROM users WHERE email='$email'";
$final_quray = mysqli_query($db_connect, $email_quiry);
$fetch_assoc = mysqli_fetch_assoc($final_quray)['result'];


if($user_name){
} 
else {
    $red_signal = true;
    $_SESSION['name_err'] = "<font color='red'> <p>User name is missing</p> </font>";
}

if($email){
    if($fetch_assoc == 0){

    }
    else{
        $red_signal = true;
        $_SESSION['email_duplicate']="Email Alredy Exists";
    }
} 
else {
    $red_signal = true;
    $_SESSION['email_err'] = "<font color='red'> <p>Email is missing</p> </font>";
}

if($password){
} 

else {
    $red_signal = true;
    $_SESSION['password_err'] = "<font color='red'> <p>Password is missing</p> </font>";
}

if($red_signal){
    header('location:admin_user_list.php');
}

else{
    $encryp_pass = password_hash($password, PASSWORD_DEFAULT);
    // $encryp_pass = md5($password);
    $db_connect = mysqli_connect('localhost','root','','intern');
    $user_insert_quary = "INSERT INTO users (user_name, email ,password) VALUES ('$user_name','$email','$encryp_pass')";
    $final_quray = mysqli_query($db_connect, $user_insert_quary);

    header('location:admin_user_list.php');
}


?>