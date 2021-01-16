<?php

include 'Config.php';


if (isset($_POST['qual_submit'])) {

    $discipline = filter_var($_POST['discipline'], FILTER_SANITIZE_STRING);
    $cpe_activity = filter_var($_POST['cpe_activity'], FILTER_SANITIZE_STRING);
    $credits_awards = filter_var($_POST['credits_awards'], FILTER_SANITIZE_NUMBER_INT);
    $cme_date = filter_var($_POST['cme_date'], FILTER_SANITIZE_STRING);
    $notes = filter_var($_POST['notes'], FILTER_SANITIZE_STRING);
   


    // $sql = "INSERT INTO tbl_credits (discipline, cpe_activity, credits_awards, cme_date, notes)VALUES('$discipline', '$cpe_activity', '$credits_awards', '$cme_date', '$notes')";
    $sql = "INSERT INTO tbl_credits (discipline, cpe_activity, credits_awards, cme_date, notes)VALUES(?, ?, ?, ?, ?)";

    
    if (!($stmt = $conn->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        exit(header("Location: qualifications.php?msg=Error!"));
    }else{
        if (!$stmt->bind_param("ssiss", $discipline, $cpe_activity, $credits_awards, $cme_date, $notes)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            exit(header("Location: qualifications.php?msg=Error!"));
        }else{
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                exit(header("Location: qualifications.php?msg=Error!"));

            }else{
                $result = $stmt->get_result();  
                exit(header("Location: qualifications.php?msg=new course created!"));
            }
        }
    }
    
    
}
