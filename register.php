<?php

include 'Config.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$accesslevel = $_POST['User_lvl'];
// var_dump($email);
// exit;

   
$encry_pwd = password_hash($pwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO tbl_user (fullname, email, password, User_lvl) VALUES ('$fullname', '$email', '$encry_pwd', '$accesslevel')"; 

if (mysqli_query($conn, $sql)) {
   
    exit(header("Location: index.php?message=New user created successfully!")); 
} else {
    exit(header("Location: index.php?message=Something went wrong! Try again later."));
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
      








?>