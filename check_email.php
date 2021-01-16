<?php

include 'Config.php';

$check = mysqli_real_escape_string($conn, $_POST["check"]);
// $check = $_POST['check'];


$query = "SELECT * FROM tbl_user WHERE email = '$check'";
// $query = "SELECT * FROM tbl_user WHERE email = 'jeremy.thompson@barbados.gov.bb'";
// $query = "SELECT * FROM tbl_user WHERE email = 'jeremy@email.com'";
$result = mysqli_query($conn, $query);

$numrows = mysqli_num_rows($result);

if($numrows > 0){
    // echo json_encode("good to go");
    echo json_encode(1);
}else{
    echo json_encode(2);
}

// $row = mysqli_fetch_assoc($result);


?>





