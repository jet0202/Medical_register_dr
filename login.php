<?php

session_start();
include 'Config.php';

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pwd = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
// var_dump($email);
// var_dump($pwd);
// exit;

$sql = "SELECT * FROM tbl_user WHERE email = ?";
if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    if (!$stmt->bind_param("s", $email)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $hash_pwd = $row['password'];
            $hash = password_verify($pwd, $hash_pwd);
            
        }
    }
}

// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $hash_pwd = $row['password'];
// $hash = password_verify($pwd, $hash_pwd);


if ($hash == 0) {
    exit(header("Location: index.php?msg=Incorrect Password!"));
} else {
    $sql = "SELECT * FROM tbl_user WHERE email= ? AND password = ?";
    if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    if (!$stmt->bind_param("ss", $email, $hash_pwd)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            $result = $stmt->get_result();            
            if(!($row = $result->fetch_assoc())){
                exit(header("Location: index.php?msg=Incorrect Username!"));
            }else{
                $_SESSION['User_lvl'] = $row['User_lvl'];
                $_SESSION['UserID'] = $row['UserID'];
        
                exit(header("Location: dashboard.php?msg=Welcome!"));
            }
        }
    }
}
    // $result = mysqli_query($conn, $sql);

//     if (!$row = mysqli_fetch_assoc($result)) {
//         exit(header("Location: index.php?msg=Incorrect Username!"));
//     } else {
//         $_SESSION['User_lvl'] = $row['User_lvl'];
//         $_SESSION['UserID'] = $row['UserID'];

//         exit(header("Location: dashboard.php?msg=Welcome!"));
//     }
}
