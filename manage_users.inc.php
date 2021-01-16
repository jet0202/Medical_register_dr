<?php
session_start();

include 'Config.php';


if(isset($_POST['changepw'])){
    
    $userId = filter_var($_SESSION['UserID'], FILTER_SANITIZE_NUMBER_INT);
    $newpw = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $hashed_pwd = filter_var(password_hash($newpw, PASSWORD_DEFAULT), FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($hashed_pwd);
    // exit;

    $sql = "UPDATE tbl_user SET password = ? WHERE UserID = ?";
    
    if (!($stmt = $conn->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }else{
        if (!$stmt->bind_param("si", $hashed_pwd ,$userId)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }else{
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }else{
                $result = $stmt->get_result();  
                exit(header("Location: profile.php?msg=Password Changed!"));
            }
        }
    }

}elseif(isset($_POST['remove_usr'])){

    $userid = filter_var($_POST['remove_usr'], FILTER_SANITIZE_NUMBER_INT); 
    $sql = "DELETE FROM tbl_user WHERE UserID = ?";

    if (!($stmt = $conn->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }else{
        if (!$stmt->bind_param("i" ,$userid)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }else{
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }else{
                $result = $stmt->get_result();  
                exit(header("Location: profile.php?msg=User removed!"));
            }
        }
    }

}elseif(isset($_POST['create_btn'])){
    
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userlvl = filter_var($_POST['User_lvl'], FILTER_SANITIZE_STRING);
    
    $pwd = "Password";
    $encry_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tbl_user (fullname, email, password, User_lvl) VALUES (?, ?, ?, ?)";
    // $result = mysqli_query($conn, $sql);

    if (!($stmt = $conn->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }else{
        if (!$stmt->bind_param("ssss", $fullname, $email, $encry_pwd, $userlvl)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }else{
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }else{
                $result = $stmt->get_result(); 
                exit(header("Location: profile.php?msg=User added!"));
            }
        }
    }

    // if(!$result){
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }else{
    //     exit(header("Location: profile.php?msg=User added!"));
    // }

}

$stmt->close();



?>