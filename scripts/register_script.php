<?php
include('./dbCon.php');
/* if (isset($_POST["send"])) {
    $fullName = mysqli_real_escape_string($con, $_POST["fullName"]);
    $selectClass = mysqli_real_escape_string($con, $_POST["selectClass"]);
    $guardianName = mysqli_real_escape_string($con, $_POST["guardianName"]);
    $guardianContact = mysqli_real_escape_string($con, $_POST["guardianContact"]);
    $guardianLocation = mysqli_real_escape_string($con, $_POST["guardianLocation"]);

        //Data Variabled
    date_default_timezone_set("Africa/Accra");
    $currentTime = time();
    $dataTime = strftime("%B-%d-%Y %H:%M:%S", $currentTime);

        //Image Process to database base
    $imagename = $_FILES["imagename"]["name"];
    $target = "image/" . basename($_FILES["imagename"]["name"]);

    $sql = "INSERT INTO studentregistration VALUES('','$fullName','$selectClass','$imagename','$dataTime','$guardianName','$guardianContact','$guardianLocation')";

    $result = mysqli_query($con, $sql);
    move_uploaded_file($_FILES["imagename"]["tmp_name"], $target);

    if ($result) {
        echo $fullName . " Records Saved Succesfully";
    } else {
        die("Something went wrong try again later " . mysqli_connect_error());
    }
} */
$show = $shows = '';
if (isset($_POST["lmt"])) {
    $s = 1;
    $lmt = $_POST["lmt"];
    $selectSql = "SELECT * FROM studentregistration ORDER BY reg_date DESC LIMIT $lmt";
    $selectResult = mysqli_query($con, $selectSql);
    $show .= '
           
                <table class="table table-bordered table-responsive" style="background:#fff;">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
                 <!-- <th>Image</th> -->
                    <th>Registration Date</th>
                </thead>
                <tbody>
        ';
    while ($row = mysqli_fetch_array($selectResult)) {

        $show .= '
            <tr>
                <td>' . $s . '</td>
                <td><a href="#" id="' . $row["id"] . '">' . $row["fullname"] . '</a></td>
                <td>' . $row["class_form"] . '</td>
                <!--   <td><img src="image/' . $row["imagename"] . '" class="img-responsive" style="height:50px; width:100px;"></td>-->
                <td>' . $row["reg_date"] . '</td>
            </tr>
            ';
        $s++;
    }
    $show .= '
            </tbody>
        </table>
    ';
    echo $show;
}


if (isset($_POST["classChange"])) {
    $lim = intVal($_POST["lmit"]);
    $classChange = $_POST["classChange"];
    $s = 1;
    $msql = "SELECT * FROM studentregistration WHERE class_form = '$classChange' ORDER BY reg_date DESC LIMIT $lim";
    $selectResult = mysqli_query($con, $msql);
    $shows .= '
                <table class="table table-bordered table-responsive" style="background:#fff;">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
                 <!-- <th>Image</th> -->
                    <th>Registration Date</th>
                </thead>
                <tbody>
        ';
    while ($row = mysqli_fetch_array($selectResult)) {

        $shows .= '
            <tr>
                <td>' . $s . '</td>
                <td><a href="#" id="' . $row["id"] . '">' . $row["fullname"] . '</a></td>
                <td>' . $row["class_form"] . '</td>
                <!--   <td><img src="image/' . $row["imagename"] . '" class="img-responsive" style="height:50px; width:100px;"></td>-->
                <td>' . $row["reg_date"] . '</td>
            </tr>
            ';
        $s++;
    }
    $shows .= '
            </tbody>
        </table>
    ';
    echo $shows;

}

//============================================

// $class_shows = '';
// if (isset($_POST["classChange"])) {
//     $class_lim = $_POST["lmit"];
//     $class_Change = $_POST["classChange"];
//     $s = 1;
//     $msql = "SELECT * FROM studentregistration WHERE class_form = '$class_Change' ORDER BY reg_date DESC LIMIT $class_lim";
//     $select_Result = mysqli_query($con, $msql);
//     $class_shows .= '
//                 <table class="table table-bordered table-responsive table-hover table-striped">
//                 <thead>
//                     <th>No.</th>
//                     <th>Name</th>
//                     <th>Class</th>
//                  <!-- <th>Image</th> -->
//                     <th>Registration Date</th>
//                 </thead>
//                 <tbody>
//         ';
//     while ($row = mysqli_fetch_array($selectResult)) {

//         $class_shows .= '
//             <tr>
//                 <td>' . $s . '</td>
//                 <td><a href="#" id="' . $row["id"] . '">' . $row["fullname"] . '</a></td>
//                 <td>' . $row["class_form"] . '</td>
//                 <!--   <td><img src="image/' . $row["imagename"] . '" class="img-responsive" style="height:50px; width:100px;"></td>-->
//                 <td>' . $row["reg_date"] . '</td>
//             </tr>
//             ';
//         $s++;
//     }
//     $class_shows .= '
//             </tbody>
//         </table>
//     ';
//     echo $class_shows;

// }

?>