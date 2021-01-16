<?php

$conn = mysqli_connect("localhost", "root", "", "register_of_medical_doctors");


if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
      
}