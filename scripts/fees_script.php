<?php 
include('./dbCon.php');
$show = $showPaymentClass = '';
if (isset($_POST["changeClass"])) {
    $changeClass = $_POST["changeClass"];

    $sql = "SELECT id, fullname FROM studentregistration WHERE class_form='$changeClass' ORDER BY fullname ASC";
    $result = mysqli_query($con, $sql);
    $show .= '
            <select style="width:50%;" class="custom-select d-block my-3 form-control" id="studentname" name="studentname">
               <option value="No Records Found">Select Student Name...</option>
        ';

    if ($num_row = mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {

            $show .= '
                    <option value="' . $row["fullname"] . '">' . $row["fullname"] . '</option>
                    ';

        }
    } else {
        $show .= '<option value="No Records Found">No Records Found</option>';
    }
    $show .= '</Select>';
    echo $show;
}

//=================================================== PAYMENT CLASS NAME
if (isset($_POST["changePaymentClass"])) {
    $changePaymentClass = $_POST["changePaymentClass"];

    $sql = "SELECT names FROM schoolfees WHERE class_form='$changePaymentClass' ORDER BY names ASC";
    $result = mysqli_query($con, $sql);
    $showPaymentClass .= '
            <select style="width:60%;" class="custom-select d-block my-3 form-control" id="studentPaymentName" name="studentPaymentName">
               <option value="No Records Found">Select Student Name...</option>
        ';
    $num_row = mysqli_num_rows($result) > 0;
    if ($num_row) {
        while ($row = mysqli_fetch_array($result)) {

            $showPaymentClass .= '
                    <option value="' . $row["names"] . '">' . $row["names"] . '</option>
                    ';

        }
    } else {
        $showPaymentClass .= '<option value="No Records Found">No Records Found</option>';
    }
    $showPaymentClass .= '</Select>';
    echo $showPaymentClass;
}
$imgShow = '';
if (isset($_POST["payName"])) {
    $payName = $_POST["payName"];
    $payClass = $_POST["payClass"];

    $imgSQL = "SELECT imagename FROM studentregistration WHERE fullname='$payName' AND class_form='$payClass' ";
    $imgResult = mysqli_query($con, $imgSQL);
    $num_rows = mysqli_num_rows($imgResult) > 0;
    if ($num_rows) {
        while ($row = mysqli_fetch_array($imgResult)) {
            $imgShow .= '
                <div class="thumbnail">
                    <img src="img/image/' . $row["imagename"] . '" width="150px" height="200px" id="stdImage" />
                </div>
            ';
        }
    } else {
        $imgShow .= '<p>No Image found</p>';
    }
    echo $imgShow;

}

if (isset($_POST["makePay"])) {
    $studentPaymentClass = mysqli_real_escape_string($con, $_POST["studentPayClass"]);
    $payment = mysqli_real_escape_string($con, $_POST["pay"]);
    $paymentYear = mysqli_real_escape_string($con, $_POST["payYear"]);
    $paymentTerm = mysqli_real_escape_string($con, $_POST["payTerm"]);
    $studentPaymentName = mysqli_real_escape_string($con, $_POST["studentPayName"]);
    $receiptS = mysqli_real_escape_string($con, $_POST["receiptS"]);
        

        //Generate Receipt
 /*   date_default_timezone_set("Africa/Accra");
    $CurrentTime = time();
    $current = strftime("%b%d%Y%H%M%S");
     */
        //Date 
        //Date and Time
    date_default_timezone_set("Africa/Accra");
    $orignalTime = time();
    $dateTime = strftime("%B-%d-%Y");


    $paySql = "INSERT INTO payment VALUES('','$studentPaymentName','$studentPaymentClass','$payment','$paymentYear','$paymentTerm','$dateTime','$receiptS')";

    $payResult = mysqli_query($con, $paySql);
    if ($payResult) {
        echo $studentPaymentName . " HAS MADE A PAYMENT OF " . $payment . " SUCCESSFULLY";
    } else {
        die("cant Connect " . mysqli_error($con));
    }
}

//================================= UPDATE THE FEES TABLE
if (isset($_POST["makePayS"])) {
    $studentPaymentClassS = mysqli_real_escape_string($con, $_POST["studentPayClassS"]);
    $paymentS = mysqli_real_escape_string($con, $_POST["payS"]);
    $paymentYearS = mysqli_real_escape_string($con, $_POST["payYearS"]);
    $paymentTermS = mysqli_real_escape_string($con, $_POST["payTermS"]);
    $studentPaymentNameS = mysqli_real_escape_string($con, $_POST["studentPayNameS"]);
    $showPreviousPayS = mysqli_real_escape_string($con, $_POST["showPreviousPayS"]);
    $showPreviousTotalfeesS = mysqli_real_escape_string($con, $_POST["showPreviousTotalfeesS"]);


    $totalPayment = $paymentS + $showPreviousPayS;
    $stat = "fully paid";
    if ($showPreviousTotalfeesS == $totalPayment) {
        $paySqlUpdate = "UPDATE schoolfees SET amountpaid='$totalPayment', statuss='$stat' WHERE class_form='$studentPaymentClassS' AND names='$studentPaymentNameS' AND term='$paymentTermS' AND fees_year='$paymentYearS'";
        $payResultUpdate = mysqli_query($con, $paySqlUpdate);
        if ($payResultUpdate) {
            echo $studentPaymentNameS . " has paid Fees Fully ";
        } else {
            die("cant Connect " . mysqli_error($con));
        }
    } else {
        $paySqlUpdate = "UPDATE schoolfees SET amountpaid='$totalPayment' WHERE class_form='$studentPaymentClassS' AND names='$studentPaymentNameS' AND term='$paymentTermS' AND fees_year='$paymentYearS'";

        $payResultUpdate = mysqli_query($con, $paySqlUpdate);
        if ($payResultUpdate) {
            echo " SUCCESSFULLY";
        } else {
            die("cant Connect " . mysqli_error($con));
        }
    }


}

//========================================= SET SCHOOL FEES
if (isset($_POST["saveBtn"])) {
    $studentclassE = mysqli_real_escape_string($con, $_POST["studentclass"]);
    $studentFeesE = mysqli_real_escape_string($con, $_POST["studentFees"]);
    $studentArrearsE = mysqli_real_escape_string($con, $_POST["studentArrears"]);
    $studentAcademicYearE = mysqli_real_escape_string($con, $_POST["studentAcademicYear"]);
    $studentAcademicTermE = mysqli_real_escape_string($con, $_POST["studentAcademicTerm"]);
    $studentNameE = mysqli_real_escape_string($con, $_POST["studentname"]);
    $feesTotalE = $studentFeesE + $studentArrearsE;

    $amt = "0";
    $statusE = "Not Fully Paid";
    $feesSQLE = "INSERT INTO schoolfees VALUES('','$studentNameE', '$studentFeesE','$studentArrearsE','$studentAcademicYearE','$studentAcademicTermE','$studentclassE', '$feesTotalE', '$amt','$statusE')";

    $sqlResultE = mysqli_query($con, $feesSQLE);
    if ($sqlResultE) {
        echo $studentAcademicYearE . " " . $studentAcademicTermE . " School Fees Created for " . $studentNameE . " To Pay SUCCESSFUL.";
    } else {
     //   mysqli_connect_error($sqlResult);
    }
}

//====================================== SET PREVIOUS PAYMENT
$showPreviousPaymentDisplay = '';
if (isset($_POST["showPreviousPaymentTerm"])) {
    $showPreviousPayMentTerm = $_POST["showPreviousPaymentTerm"];
    $showPreviousPayMentClass = $_POST["showPreviousPaymentClass"];
    $showPreviousPayMentName = $_POST["showPreviousPaymentName"];
    $showPreviousPayMentYear = $_POST["showPreviousPaymentYear"];

    $showPreviousSql = "SELECT * FROM schoolfees WHERE names='$showPreviousPayMentName' AND fees_year='$showPreviousPayMentYear' AND term='$showPreviousPayMentTerm' AND class_form='$showPreviousPayMentClass'";

    $showPreviousResult = mysqli_query($con, $showPreviousSql);

   // if (mysqli_num_rows($showPreviousResult) > 0) {
    while ($row = mysqli_fetch_array($showPreviousResult)) {
        $showPreviousPaymentDisplay .= '
                Payment made:<input type="text" style="width:60%; color:black; font-weight:bold;" id="showPreviousPay" name="showPreviousPay" class="form-control" value="' . $row["amountpaid"] . '" disabled />
                Total Fees:<input type="text" style="width:60%; color:black; font-weight:bold;" id="showPreviousTotalfees" name="showPreviousTotalfees" class="form-control" value="' . $row["totalfees"] . '" disabled />
            ';
    }
   // }
    echo $showPreviousPaymentDisplay;
}
//========================================|RECEIPT
/*if (isset($_POST["makeReceipt"])) {
    $showReceipt='';

    $studentReceiptClass = mysqli_real_escape_string($con, $_POST["studentReceiptClass"]);
    $Receipt = mysqli_real_escape_string($con, $_POST["Receipt"]);
    $ReceiptYear = mysqli_real_escape_string($con, $_POST["ReceiptYear"]);
    $ReceiptTerm = mysqli_real_escape_string($con, $_POST["ReceiptTerm"]);
    $studentReceiptName = mysqli_real_escape_string($con, $_POST["studentReceiptName"]);
        

    /*    //Generate Receipt
    date_default_timezone_set("Africa/Accra");
    $CurrentTime = time();
    $current = strftime("%b%d%Y%H%M%S");

        //Date 
        //Date and Time
    date_default_timezone_set("Africa/Accra");
    $orignalTime = time();
    $dateTime = strftime("%B-%d-%Y");
 */

  /*  $ReceiptSql = "SELECT * FROM payment WHERE names='' AND class_form='' AND amount='' fees_year='' term";

    $payResult = mysqli_query($con, $paySql);
    if ($payResult) {
        echo $studentPaymentName . " HAS MADE A PAYMENT OF " . $payment . " SUCCESSFULLY";
    } else {
        die("cant Connect " . mysql_error());
    }
}*/

?>