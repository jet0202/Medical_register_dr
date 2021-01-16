<?php


include 'Config.php';

$request = mysqli_real_escape_string($conn, $_POST["query"]);
// $query = "SELECT * FROM registered_doctors WHERE CAST(dr_idnumber as CHAR) LIKE '%".$request."%'";
$query = "SELECT * FROM registered_doctors WHERE dr_surname LIKE '%".$request."%'";
$result = mysqli_query($conn, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row['dr_fname']." ".$row["dr_surname"]." - ".$row['reg_no']; 

 }
 echo json_encode($data);
}
