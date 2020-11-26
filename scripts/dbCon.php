<?php 
$con = mysqli_connect("localhost", "root", "", "schoolfees");
if ($con) {
   // echo "Succesfully";
} else {
    die("Can't Connect at the moment try again later " . mysqli_connect_error());
}
?>