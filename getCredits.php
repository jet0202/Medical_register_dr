<?php

include 'Config.php';

// $request = mysqli_real_escape_string($conn, $_POST["data"]);
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT * FROM tbl_credits WHERE Id = ?";
if (!($stmt = $conn->prepare($query))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}else{
    if (!$stmt->bind_param("i", $id)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }else{
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }else{
            $result = $stmt->get_result();  
            $row = $result->fetch_assoc(); 
                echo json_encode($row['credits_awards']);
            
            
        }
    }
}
// $result = mysqli_query($conn, $query);

// $row = mysqli_fetch_assoc($result);

// echo json_encode($row['credits_awards']);
?>