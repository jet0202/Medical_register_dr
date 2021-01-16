<?php

include 'Config.php';

$getregno = "SELECT * FROM registered_doctors ORDER BY reg_no DESC LIMIT 1";
$getresult = mysqli_query($conn, $getregno);
$row = mysqli_fetch_assoc($getresult);

$reg_no =  $row['reg_no'] + 1;

$fname = filter_var($_POST['dr_fname'], FILTER_SANITIZE_STRING);
$surname = filter_var($_POST['dr_surname'], FILTER_SANITIZE_STRING);
$othername = filter_var($_POST['dr_othername'], FILTER_SANITIZE_STRING);
$ID = filter_var($_POST['dr_idnumber'], FILTER_SANITIZE_STRING);
$nationality = filter_var($_POST['dr_nationality'], FILTER_SANITIZE_STRING);
$dob = filter_var($_POST['dr_dob'], FILTER_SANITIZE_STRING);
$per_address = filter_var($_POST['personal_address'], FILTER_SANITIZE_STRING);
$bus_address = filter_var($_POST['business_address'], FILTER_SANITIZE_STRING);
$reg_date = filter_var($_POST['registration_date'], FILTER_SANITIZE_STRING);
$qualification = filter_var($_POST['dr_qualification'], FILTER_SANITIZE_STRING);
$reg_type = filter_var($_POST['registration_type'], FILTER_SANITIZE_STRING);
$comments = filter_var($_POST['Comments'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['dr_email'], FILTER_SANITIZE_EMAIL);
$tel_no = filter_var($_POST['dr_telno'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO registered_doctors (reg_no, dr_surname, dr_fname, dr_othername, dr_nationality, dr_dob, dr_idnumber, personal_address, business_address, registration_date, dr_qualification, registration_type, Comments, dr_email, dr_telno) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit(header("Location: newdoctor_form.php?msg=Error!"));
} else {
    if (!$stmt->bind_param("issssssssssssss", $reg_no, $surname, $fname, $othername, $nationality, $dob, $ID, $per_address, $bus_address, $reg_date, $qualification, $reg_type, $comments, $email, $tel_no)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        exit(header("Location: newdoctor_form.php?msg=Error!"));
    } else {
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            exit(header("Location: newdoctor_form.php?msg=Error!"));
        } else {
            $result = $stmt->get_result();
            exit(header("Location: newdoctor_form.php?msg=new record created!"));
        }
    }
}


// $result = mysqli_query($conn, $sql);

// if (!$result) {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// } else {
//     exit(header("Location: newdoctor_form.php?msg=new record created!"));
// }
