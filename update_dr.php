<?php

include 'Config.php';

$reg_no = filter_var($_POST['reg_no'], FILTER_SANITIZE_NUMBER_INT);
$fname = filter_var($_POST['dr_fname'], FILTER_SANITIZE_STRING);
// var_dump($fname);
$lname = filter_var($_POST['dr_surname'], FILTER_SANITIZE_STRING);
$othername = filter_var($_POST['dr_othername'], FILTER_SANITIZE_STRING);
$nationality = filter_var($_POST['dr_nationality'], FILTER_SANITIZE_STRING);
$idnumber = filter_var($_POST['dr_idnumber'], FILTER_SANITIZE_STRING);
$dob = filter_var($_POST['dr_dob'], FILTER_SANITIZE_STRING);
$peraddress = filter_var($_POST['personal_address'], FILTER_SANITIZE_STRING);
$busaddress = filter_var($_POST['business_address'], FILTER_SANITIZE_STRING);
$regdate = filter_var($_POST['registration_date'], FILTER_SANITIZE_STRING);
$qualification = filter_var($_POST['dr_qualification'], FILTER_SANITIZE_STRING);
$regtype = filter_var($_POST['registration_type'], FILTER_SANITIZE_STRING);
$comments = filter_var($_POST['Comments'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['dr_email'], FILTER_SANITIZE_EMAIL);
// var_dump($email);
$telno = filter_var($_POST['dr_telno'], FILTER_SANITIZE_STRING);



$sql = "UPDATE registered_doctors
SET dr_fname = ?, dr_surname = ?, dr_othername = ?, dr_nationality = ?, dr_idnumber = ?, dr_dob = ?, personal_address = ?, 
business_address = ?, registration_date = ?, dr_qualification = ?, registration_type = ?, Comments = ?, dr_email = ?, dr_telno = ?
WHERE reg_no = ?";


if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Error!"));
} else {
    if (!$stmt->bind_param("ssssssssssssssi", $fname, $lname, $othername, $nationality, $idnumber, $dob, $peraddress, $busaddress, $regdate, $qualification, $regtype, $comments, $email, $telno, $reg_no)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Error!"));
    } else {
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Error!"));
        } else {
            $result = $stmt->get_result();
            exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Doctor file updated!"));
        }
    }
}
$stmt->close();
