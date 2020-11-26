<?php 
include('dbCon.php');
$output = array();
$outputS = array();
$outputShow = array();
//=============================================== CHANGE BY YEAR
if (isset($_POST["changeYear"])) {
    $changeYear = $_POST["changeYear"];
    $sql = "SELECT  sum(totalfees)AS TotalFees, sum(amountpaid)AS TotalReceived FROM schoolfees WHERE fees_year='$changeYear' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $totalArrears = $row["TotalFees"] - $row["TotalReceived"];
            $output['payYear'] = $row["TotalFees"];
            $output['totalArrears'] = $totalArrears;
            $output['totalPayment'] = $row["TotalReceived"];


        }
    }
    echo json_encode($output);

}

//=============================================== CHANGE BY TERM
if (isset($_POST["changeTerm"])) {
    $changeTerm = $_POST["changeTerm"];
    $changeYEar = $_POST["changeYEar"];
    $sql = "SELECT  sum(totalfees)AS TotalFees, sum(amountpaid)AS TotalReceived FROM schoolfees WHERE fees_year='$changeYEar' AND term='$changeTerm' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $totalArrears = $row["TotalFees"] - $row["TotalReceived"];
            $outputS['payYear'] = $row["TotalFees"];
            $outputS['totalArrears'] = $totalArrears;
            $outputS['totalPayment'] = $row["TotalReceived"];


        }
    }
    echo json_encode($outputS);

}

//================================================ SHOW CLASS NAMES
$outPut = '';
if (isset($_POST["classChange"])) {
    $classnames = $_POST["classChange"];
    $sql = "SELECT * FROM schoolfees WHERE class_form='$classnames'";
    $result = mysqli_query($con, $sql);

    $outPut .= '
			 <label style="color: white;" for="studentName">Student Name</label>
			 <select class="custom-select d-block my-3 form-control" id="studentName" name="studentName">
			 <option value="Search Name...">Search Name...</option>
		';
    if ($num_row = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $outPut .= '
					<option value = "' . $row["names"] . '"> ' . $row["names"] . '</option>
					
				';
        }
    } else {
        $outPut .= '
				 <option value = "">Sorry No Records Found...</option> 
			';
    }
    $outPut . '</table></div>';
    echo $outPut;

}

if (isset($_POST["nameChange"])) {
    $name = $_POST["nameChange"];
    $yearCheck = $_POST["yearCheck"];
    $termCheck = $_POST["termCheck"];
    $classCheck = $_POST["classCheck"];
    $sql = "SELECT * FROM schoolfees WHERE names = '$name' AND fees_year='$yearCheck' AND term='$termCheck' AND class_form='$classCheck'";

   // echo $sql;

    $result = mysqli_query($con, $sql);

    if ($num_row = mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            $arrears = $row["totalfees"] - $row["amountpaid"];
            $outputShow['fullnamE'] = $row["names"];
            $outputShow['class_forM'] = $row["class_form"];
            $outputShow['totalfeeS'] = $row["totalfees"];
            $outputShow['amountpaiD'] = $row["amountpaid"];
            $outputShow['arrearS'] = $arrears;
            $outputShow['statuS'] = $row["statuss"];

        }
    }
    echo json_encode($outputShow);

}

?>