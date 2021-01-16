<?php
include 'Config.php';


if (isset($_POST['dashbtn'])) {

    // $var = $_POST['dashbtn'];
    // 
    $var = $_POST['doctor'];
    // var_dump($var);

    $ID = explode('- ', $var);
    // echo$ID[1];
    exit(header("Location: doctor_file.php?reg=$ID[1]"));

} elseif (isset($_POST['view_dr'])) {
    $dr_num = $_POST['view_dr'];

    exit(header("Location: doctor_file.php?reg=$dr_num"));
}
