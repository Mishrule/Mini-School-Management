<?php
include('dbCon.php');

$displayMessage =  '';
if (isset($_POST["submit_class"])) {
    

    $classs = mysqli_real_escape_string($con, $_POST["classs"]);

    //Data Variabled
    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dataTime = strftime("%B-%d-%Y", $currentTime);

    $sql = "INSERT INTO classes VALUES('','$classs','$dataTime')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $displayMessage .='
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div align="center"><strong>Status: class '.$classs.' Created Successfully on '.$dataTime.'  </strong></div>
        </div>
        ';
    } else {
        $displayMessage .='
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div align="center"><strong>Status: class '.die("Something went wrong try again later " . mysqli_error($con)).'  </strong></div>
        </div>
        ';
        
    }
    echo $displayMessage;
}

?>