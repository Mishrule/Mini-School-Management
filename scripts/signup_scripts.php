<?php 
    include('dbCon.php');

    if(isset($_POST['send'])){
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $surName = mysqli_real_escape_string($con, $_POST['surName']);
        $otherName = mysqli_real_escape_string($con, $_POST['otherName']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $securityQuestion =mysqli_real_escape_string($con, $_POST['securityQuestion']);
        $securityAnswer = mysqli_real_escape_string($con, $_POST['securityAnswer']);
        $userPassword = mysqli_real_escape_string($con, $_POST['userPassword']);
        $userEmail = mysqli_real_escape_string($con, $_POST['userEmail']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);

        $signUpSQL = "INSERT INTO users VALUES('','$firstName','$otherName','$surName','$username','$securityQuestion','$securityAnswer','$userPassword','$userEmail', '$contact')";
        $signUpResult = mysqli_query($con, $signUpSQL);

        if($signUpResult){
            echo 'Account Created Successfully';
            
        }else{
            echo 'Failed to Create a User '.mysqli_error($con);
        }

    }
?>