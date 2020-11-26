<?php
include('./dbCon.php');
if (isset($_POST["generateBtn"])) {
    $genClassShow = '';
    $generateClass = $_POST["generateClass"];
    $generateTerm = $_POST["generateTerm"];
    $generateYear = $_POST["generateYear"];

    $genClassSQL = "SELECT * FROM schoolfees WHERE fees_year='$generateYear' AND term='$generateTerm' AND class_form='$generateClass' ";

    $genClassResult = mysqli_query($con, $genClassSQL);

    $genClassShow .= '
             <table id="setTable" border="1px" class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Term\'s Fees </th>
                    <th>Arrears </th>
                    <th>Total Fees</th>
                    <th>Fees Paid</th>
                    <th>Status</th>
                </thead>
                <tbody>
        ';

    $s = 1;
    if (mysqli_num_rows($genClassResult) > 0) {
        while ($row = mysqli_fetch_array($genClassResult)) {
            $genClassShow .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $row["names"] . '</td>
                        <td>' . $row["fees"] . '</td>
                        <td>' . $row["arrears"] . '</td>
                        <td>' . $row["totalfees"] . '</td>
                        <td>' . $row["amountpaid"] . '</td>
                        <td>' . $row["statuss"] . '</td>
                    </tr>
                ';
            $s++;

        }
        $genClassShow .= '
            
                <tr>
                    <td colspan="7">
                    <div align="center">
                        <button style="margin-top:30px; border-radius:50px;" type="button" id="genByReportBtn" name"genByReportBtn" value="genByReportBtn" class="btn btn-warning btn-sm">Generate Report</button>
                    </div>
                    </td>
                </tr>
            
        ';
    } else {
        $genClassShow .= '
                <tr>
                    <td colspan="5"></td>Nothing Found</td>
                </tr>
            ';
    }
    $genClassShow .= '
            </tbody>
            </table>
        ';
    echo $genClassShow;
}

//========================================== CHECK FULL PAID
if (isset($_POST["checkBtn"])) {
    $checkClassShow = '';
    $checkClass = $_POST["checkClass"];
    $checkTerm = $_POST["checkTerm"];
    $checkYear = $_POST["checkYear"];
    $checkStatus = $_POST["checkStatus"];

    $checkClassSQL = "SELECT * FROM schoolfees WHERE fees_year='$checkYear' AND term='$checkTerm' AND class_form='$checkClass' AND statuss ='$checkStatus' ";

    $checkClassResult = mysqli_query($con, $checkClassSQL);

    $checkClassShow .= '
             <table id="check1" border="1px" class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Term\'s Fees </th>
                    <th>Arrears </th>
                    <th>Total Fees</th>
                    <th>Fees Paid</th>
                    <th>Status</th>
                </thead>
                <tbody>
        ';

    $s = 1;
    if (mysqli_num_rows($checkClassResult) > 0) {
        while ($row = mysqli_fetch_array($checkClassResult)) {
            $checkClassShow .= '
                    <tr>
                        <td>' . $s . '</td>
                        <td>' . $row["names"] . '</td>
                        <td>' . $row["fees"] . '</td>
                        <td>' . $row["arrears"] . '</td>
                        <td>' . $row["totalfees"] . '</td>
                        <td>' . $row["amountpaid"] . '</td>
                        <td>' . $row["statuss"] . '</td>
                    </tr>
                ';
            $s++;
        }
        $checkClassShow .= '
            
                <tr>
                    <td colspan="7">
                    <div align="center">
                        <button style="margin-top:30px; border-radius:50px;" type="button" id="checkByReportBtn" name"checkByReportBtn" value="checkByReportBtn" class="btn btn-warning btn-sm">Generate Report</button>
                    </div>
                    </td>
                </tr>
            
        ';
    } else {
        $checkClassShow .= '
                <tr>
                    <td colspan="7">Nothing Found</td>
                </tr>
            ';
    }
    $checkClassShow .= '
            </tbody>
            </table>
        ';
    echo $checkClassShow;
}

//========================================== SUM ALL FEES YEAR
if (isset($_POST["viewByYear"])) {
    $vYear = '';
    $viewByYear = $_POST["viewByYear"];

    $vYearSQL = "SELECT  sum(totalfees)AS TotalFees, sum(arrears)AS TotalArrears, sum(amountpaid)AS TotalReceived FROM schoolfees WHERE fees_year='$viewByYear' ";

    $vYearResult = mysqli_query($con, $vYearSQL);

    $vYear .= '
             <table class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>Total Fees.</th>
                    <th>Total Arrears</th>
                    <th>Total Amount Received</th>
                </thead>
                <tbody>
        ';

   // $s = 1;
    if (mysqli_num_rows($vYearResult) > 0) {
        while ($row = mysqli_fetch_array($vYearResult)) {
            $arrearss = $row["TotalFees"] - $row["TotalReceived"];
            $vYear .= '
                    <tr>
                        
                        <td><h4><strong>' . $row["TotalFees"] . '</strong></h4></td>
                        <td><h4><strong>' . $arrearss . '</strong></h4></td>
                        <td><h4><strong>' . $row["TotalReceived"] . '</strong></h4></td>
                    </tr>
                ';
    //        $s++;
        }
    } else {
        $vYear .= '
                <tr>
                    <td colspan="2">Nothing Found</td>
                </tr>
            ';
    }
    $vYear .= '
            </tbody>
            </table>
        ';
    echo $vYear;
}

//========================================== SUM ALL FEES YEAR
if (isset($_POST["termClassBtn"])) {
    $termYear = '';
    $chkByTermYear = $_POST["chkByTermYear"];
    $vwByYear = $_POST["vwByYear"];



    $termYearSQL = "SELECT  sum(totalfees)AS TotalFees, sum(amountpaid)AS TotalReceived FROM schoolfees WHERE fees_year='$vwByYear' AND term='$chkByTermYear '";

    $termYearResult = mysqli_query($con, $termYearSQL);

    $termYear .= '
             <table class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>Total Fees.</th>
                    <th>Total Arrears</th>
                    <th>Total Amount Received</th>
                </thead>
                <tbody>
        ';

   // $s = 1;
    if (mysqli_num_rows($termYearResult) > 0) {
        while ($row = mysqli_fetch_array($termYearResult)) {
            $arrearss = $row["TotalFees"] - $row["TotalReceived"];
            $termYear .= '
                    <tr>
                        <td><h4><strong>' . $row["TotalFees"] . '</strong></h4></td>
                        <td><h4><strong>' . $arrearss . '</strong></h4></td>
                        <td><h4><strong>' . $row["TotalReceived"] . '</strong></h4></td>
                    </tr>
                ';
    //        $s++;
        }
    } else {
        $termYear .= '
                <tr>
                    <td colspan="2">Nothing Found</td>
                </tr>
            ';
    }
    $termYear .= '
            </tbody>
            </table>
        ';
    echo $termYear;
}

//========================================== SUM ALL FEES YEAR
if (isset($_POST["vClassYearBtn"])) {
    $classTermDisplay = '';
    $vwByYearClass = $_POST["vwByYearClass"];
    $vClassYear = $_POST["vClassYear"];



    $yearClassSQL = "SELECT  sum(totalfees)AS TotalFees, sum(amountpaid)AS TotalReceived FROM schoolfees WHERE fees_year='$vwByYearClass' AND class_form='$vClassYear '";

    $yearClassResult = mysqli_query($con, $yearClassSQL);

    $classTermDisplay .= '
             <table class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>Total Fees.</th>
                    <th>Total Arrears</th>
                    <th>Total Amount Received</th>
                </thead>
                <tbody>
        ';

   // $s = 1;
    if (mysqli_num_rows($yearClassResult) > 0) {
        while ($row = mysqli_fetch_array($yearClassResult)) {
            $arrearss = $row["TotalFees"] - $row["TotalReceived"];
            $classTermDisplay .= '
                    <tr>
                        
                        <td><h4><strong>' . $row["TotalFees"] . '</strong></h4></td>
                        <td><h4><strong>' . $arrearss . '</strong></h4></td>
                        <td><h4><strong>' . $row["TotalReceived"] . '</strong></h4></td>
                        
                    </tr>
                ';
    //        $s++;
        }
    } else {
        $classTermDisplay .= '
                <tr>
                    <td colspan="2">Nothing Found</td>
                </tr>
            ';
    }
    $classTermDisplay .= '
            </tbody>
            </table>
        ';
    echo $classTermDisplay;
}

//========================================== SUM ALL FEES CLASS AND TERM
if (isset($_POST["vClassTermBtn"])) {
    $classTermDisplays = '';
    $vwByTermClass = $_POST["vwByTermClass"];
    $vClassTerm = $_POST["vClassTerm"];



    $TermClassSQL = "SELECT  sum(totalfees)AS TotalFees,  sum(amountpaid)AS TotalReceived FROM schoolfees WHERE term='$vwByTermClass' AND class_form='$vClassTerm '";

    $TermClassResult = mysqli_query($con, $TermClassSQL);

    $classTermDisplays .= '
             <table class="table table-responsive table-striped table-hover table-primary">
                <thead>
                    <th>Total Fees.</th>
                    <th>Total Arrears</th>
                    <th>Total Amount Received</th>
                </thead>
                <tbody>
        ';

   // $s = 1;
    if (mysqli_num_rows($TermClassResult) > 0) {
        while ($row = mysqli_fetch_array($TermClassResult)) {
            $arrearss = $row["TotalFees"] - $row["TotalReceived"];
            $classTermDisplays .= '
                    <tr>
                        
                        <td><h4><strong>' . $row["TotalFees"] . '</strong></h4></td>
                        <td><h4><strong>' . $arrearss . '</strong></h4></td>
                        <td><h4><strong>' . $row["TotalReceived"] . '</strong></h4></td>
                        
                    </tr>
                ';
    //        $s++;
        }
    } else {
        $classTermDisplays .= '
                <tr>
                    <td colspan="2">Nothing Found</td>
                </tr>
            ';
    }
    $classTermDisplays .= '
            </tbody>
            </table>
        ';
    echo $classTermDisplays;
}


?>
