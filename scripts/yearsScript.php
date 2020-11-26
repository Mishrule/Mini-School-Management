<?php
include('dbCon.php');

$displayMessage =  '';
if (isset($_POST["submit_year"])) {
    

    $years = mysqli_real_escape_string($con, $_POST["years"]);

    //Data Variabled
    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dataTime = strftime("%B-%d-%Y", $currentTime);

    $sql = "INSERT INTO years VALUES('','$years','$dataTime')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $displayMessage .='
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div align="center"><strong>Status: Year '.$years.' Created Successfully on '.$dataTime.'  </strong></div>
        </div>
        ';
    } else {
        $displayMessage .='
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <div align="center"><strong>Status: Year '.die("Something went wrong try again later " . mysqli_error($con)).'  </strong></div>
        </div>
        ';
        
    }
    echo $displayMessage;
}

?>