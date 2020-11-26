<?php
include('scripts/dbCon.php');

// include('session.php');

// $sql = "SELECT * FROM users WHERE username = '$login_Session' ";
// $result = mysqli_query($con, $sql);

// $row = mysqli_fetch_array($result);
// $count = mysqli_num_rows($result);
// if ($count == 1) {
//     $fullname = $row["first_name"] . ' ' . $row["other_name"] . ' ' . $row["surname"];
//     $contact = $row["contact"];
//     $email = $row["email"];
// }

$displayMessage = $show = $showed = $showedl = $time = '';
if (isset($_POST["send"])) {
    
    $fullName = mysqli_real_escape_string($con, $_POST["fullName"]);
    $teacherContact = mysqli_real_escape_string($con, $_POST["teacherContact"]);
    $teacherLocation = mysqli_real_escape_string($con, $_POST["teacherLocation"]);
    $teacherStatus = mysqli_real_escape_string($con, $_POST["teacherStatus"]);
    $majorSubject = mysqli_real_escape_string($con, $_POST["majorSubject"]);
    $minorSubject = mysqli_real_escape_string($con, $_POST["minorSubject"]);

    if ($teacherContact == 'Select Class or Form') {
        $displayMessage = '<p style="color:red">PLEASE SELECT A CLASS</p>';
    } else {

        //Data Variabled
        date_default_timezone_set("Africa/Accra");
        $currentTime = time();
        $dataTime = strftime("%B-%d-%Y", $currentTime);

        //Image Process to database base
        $imagename = $_FILES["imagename"]["name"];
        $target = "img/image/" . basename($_FILES["imagename"]["name"]);

        $sql = "INSERT INTO teachers VALUES('','$fullName','$teacherContact','$teacherLocation','$teacherStatus','$majorSubject','$minorSubject','$dataTime','$imagename')";

        $result = mysqli_query($con, $sql);
        move_uploaded_file($_FILES["imagename"]["tmp_name"], $target);

        if ($result) {

            $displayMessage = $fullName . " Records Saved Succesfully";
            header("Refresh:2");
        } else {
            die("Something went wrong try again later " . mysqli_connect_error());
        }
    }
}

?>

<!doctype html>
<html class="no-js" lang="en">

<?php require_once('scripts/head.php'); ?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <?php require_once('scripts/aside.php'); ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <?php require_once('scripts/header.php'); ?>
                </div>
            </div>

        </div>
        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Register a Teacher
                                </div>
                                <div class="panel-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="table table-responsive">
                                            <p></p>
                                            <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <div align="center"><strong>Status:
                                                        <?php echo $displayMessage; ?></strong></div>
                                            </div>
                                            <table class="table table-responsive">
                                                <tr>
                                                    <td>

                                                        <label class="col-md-3" for="fullName" align="left">Full Name
                                                        </label>

                                                        <input type="text" class="form-control col-md-12" id="fullName" name="fullName" placeholder="First name" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label align="left" for="teacherContact" class="col-md-3">Teacher's Contact</label>
                                                        <p class="error"></p>
                                                        <input type="number" class="form-control" id="teacherContact" name="teacherContact" placeholder="Teacher Contact" required>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label align="left" class="col-md-3" for="imagename">Teacher Image</label>
                                                        <input type="file" id="imagename" name="imagename" class="form-control-file">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label align="left" class="col-md-3" for="teacherLocation">Location</label>
                                                        <input type="text" class="form-control" id="teacherLocation" name="teacherLocation" placeholder="Teacher Location" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <label align="left" class="col-md-3" for="teacherStatus">Teacher Status </label>
                                                        <select class="custom-select d-block my-3 form-control" id="teacherStatus" name="teacherStatus" required>
                                                        
                                                            <option>Select Status</option>
                                                            <option value="None Teaching">None Teaching Staff</option>
                                                            <option value="Teaching">Teaching Staff</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label align="left" class="col-md-3" for="majorSubject">Major Subject Taught </label>
                                                        <select class="custom-select d-block my-3 form-control" id="majorSubject" name="majorSubject" required>
                                                            <?php
                                                            $fetchSubjectShow = '';
                                                            $fetchSubjectSQL = 'SELECT * FROM subjects ORDER BY Subject_id ASC';
                                                            $fetchSubjectResult = mysqli_query($con, $fetchSubjectSQL);
                                                            $fetchSubjectShow .= '
                                                                <option>Select Subject</option>
                                                                <option value="None">None</option>
                                                                ';

                                                            if (mysqli_num_rows($fetchSubjectResult) <= 0) {
                                                                $fetchSubjectShow .= '
                                                                    <option>No Subject Created Yet</option>';
                                                            } else {
                                                                while ($fetchSubjectRow = mysqli_fetch_array($fetchSubjectResult)) {
                                                                    $fetchSubjectShow .= '
                                                                        <option value="' . $fetchSubjectRow['subject_name'] . '">' . $fetchSubjectRow['subject_name'] . '</option>
                                                                        ';
                                                                }
                                                            }
                                                            echo $fetchSubjectShow;
                                                            ?>
                                                        </select>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label align="left" class="col-md-3" for="minorSubject">Other Subject</label>
                                                        <select class="custom-select d-block my-3 form-control" id="minorSubject" name="minorSubject" required>
                                                            <?php
                                                            $fetchSubjectsShow = '';
                                                            $fetchSubjectsSQL = 'SELECT * FROM subjects ORDER BY Subject_id ASC';
                                                            $fetchSubjectsResult = mysqli_query($con, $fetchSubjectsSQL);
                                                            $fetchSubjectsShow .= '
                                                                <option>Select Subject</option>
                                                                <option value="None">None</option>
                                                                ';

                                                            if (mysqli_num_rows($fetchSubjectsResult) <= 0) {
                                                                $fetchSubjectsShow .= '
                                                                    <option>No Subjects Created Yet</option>';
                                                            } else {
                                                                while ($fetchSubjectsRow = mysqli_fetch_array($fetchSubjectsResult)) {
                                                                    $fetchSubjectsShow .= '
                                                                        <option value="' . $fetchSubjectsRow['subject_name'] . '">' . $fetchSubjectsRow['subject_name'] . '</option>
                                                                        ';
                                                                }
                                                            }
                                                            echo $fetchSubjectsShow;
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <button class="btn btn-primary" value="send" id="send" name="send" type="submit">Save Records</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <?php require_once('scripts/footer.php'); ?>
    </div>
    <?php require_once('scripts/footerjs.php') ?>
</body>

</html>