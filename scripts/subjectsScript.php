<?php
include('dbCon.php');

$displayMessage =  '';
if (isset($_POST["submit_Subject"])) {
    
    $subjects = mysqli_real_escape_string($con, $_POST["subjects"]);

    //Data Variabled
    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dataTime = strftime("%B-%d-%Y", $currentTime);

    $sql = "INSERT INTO subjects VALUES('','$subjects','$dataTime')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $displayMessage .='
        '.$subjects.' Created Successfully on '.$dataTime .'
        ';
    } else {
        $displayMessage .='
        '.die("Something went wrong try again later " . mysqli_error($con)).'
        ';
        
    }
    echo $displayMessage;
}

?>