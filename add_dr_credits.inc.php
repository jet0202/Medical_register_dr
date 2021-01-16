<?php

include 'Config.php';

$Id = filter_var($_POST['course_id'], FILTER_SANITIZE_NUMBER_INT);
$reg_no = filter_var($_POST['reg_no'], FILTER_SANITIZE_NUMBER_INT);
$credits = filter_var($_POST['credits_awards'], FILTER_SANITIZE_NUMBER_INT);
$date_complete = filter_var($_POST['date_completed'], FILTER_SANITIZE_STRING);
// var_dump($Id);
// var_dump($reg_no);
// var_dump($credits);
$course_crds = str_replace('"', "", $credits);
$eligible = "yes";
// var_dump($date_complete);
// exit;

$sql = "INSERT INTO tbl_dr_credits (reg_no, course_id, course_credits, date_completed) VALUES (?, ?, ?, ?)";


// $stmt->execute();


if (!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
    if (!$stmt->bind_param("iiis", $reg_no, $Id, $course_crds, $date_complete)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    } else {
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            $result = $stmt->get_result();

            $creditsql = "SELECT SUM(course_credits) credit_total FROM tbl_dr_credits WHERE date_completed >= DATE_SUB(NOW(),INTERVAL 3 YEAR) AND reg_no = ? AND eligible = ?";
            if (!($stmt = $conn->prepare($creditsql))) {
                echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            } else {
                if (!$stmt->bind_param("is", $reg_no, $eligible)) {
                    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                } else {
                    if (!$stmt->execute()) {
                        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    } else {
                        $creditresult = $stmt->get_result();

                        $row = mysqli_fetch_assoc($creditresult);
                        $numCredits = $row['credit_total'];

                        $updatesql = "UPDATE registered_doctors SET credit_history = ? WHERE reg_no = ?";

                        if (!($stmt = $conn->prepare($updatesql))) {
                            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                        }else{
                            if (!$stmt->bind_param('ii', $numCredits, $reg_no)) {
                                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                            }else{
                                if (!$stmt->execute()) {
                                    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                }else{
                                    $updateresult = $stmt->get_result();

                                    $addtocreds = "UPDATE registered_doctors SET Num_of_credits = Num_of_credits+? WHERE reg_no = ?";
                                    if (!($stmt = $conn->prepare($addtocreds))) {
                                        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                                    }else{
                                        if (!$stmt->bind_param('ii', $course_crds, $reg_no)) {
                                            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
                                        }else{
                                            if (!$stmt->execute()) {
                                                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                                            }else{
                                                $addcredresult = $stmt->get_result();
                                                exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Course added to doctor!"));
                                            }
                                        }
                                    }
                                    // 
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}



$stmt->close();

// if (!$result) {
//     echo "The error is " . $conn->error;
// } else {




//     if (!$creditresult) {
//         echo "The error is " . $conn->error;
//     } else {

      
//         $stmt->execute();
        

//         // $updateresult = mysqli_query($conn, $updatesql);

//         if (!$updateresult) {
//             echo "The error is " . $conn->error;
//         } else {
//             exit(header("Location:doctor_file.php?reg=" . $reg_no . "&msg=Course added to doctor!"));
//         }
//     }
// }
