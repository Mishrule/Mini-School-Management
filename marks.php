<?php
include 'scripts/dbCon.php';

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
if (isset($_POST['send'])) {
    $fullName = mysqli_real_escape_string($con, $_POST['fullName']);
    $teacherContact = mysqli_real_escape_string($con, $_POST['teacherContact']);
    $teacherLocation = mysqli_real_escape_string(
        $con,
        $_POST['teacherLocation']
    );
    $teacherStatus = mysqli_real_escape_string($con, $_POST['teacherStatus']);
    $majorSubject = mysqli_real_escape_string($con, $_POST['majorSubject']);
    $minorSubject = mysqli_real_escape_string($con, $_POST['minorSubject']);

    if ($teacherContact == 'Select Class or Form') {
        $displayMessage = '<p style="color:red">PLEASE SELECT A CLASS</p>';
    } else {
        //Data Variabled
        date_default_timezone_set('Africa/Accra');
        $currentTime = time();
        $dataTime = strftime('%B-%d-%Y', $currentTime);

        //Image Process to database base
        $imagename = $_FILES['imagename']['name'];
        $target = 'img/image/' . basename($_FILES['imagename']['name']);

        $sql = "INSERT INTO teachers VALUES('','$fullName','$teacherContact','$teacherLocation','$teacherStatus','$majorSubject','$minorSubject','$dataTime','$imagename')";

        $result = mysqli_query($con, $sql);
        move_uploaded_file($_FILES['imagename']['tmp_name'], $target);

        if ($result) {
            $displayMessage = $fullName . ' Records Saved Succesfully';
            header('Refresh:2');
        } else {
            die(
                'Something went wrong try again later ' . mysqli_connect_error()
            );
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<?php require_once 'scripts/head.php'; ?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <?php require_once 'scripts/aside.php'; ?>
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
                    <?php require_once 'scripts/header.php'; ?>
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
                                    Enter Marks
                                </div>
                                <div class="panel-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="table table-responsive">
                                            <p></p>
                                            <div class="col-md-3">
                                                <label for="term">Select Term</label>
                                                <select class="form-control" name="term" id="term">
                                                    <option value="Term one">Term One</option>
                                                    <option value="Term two"> Term Two</option>
                                                    <option value="Term three">Term Three</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="year">Select Year</label>
                                                <select class="form-control" name="year" id="year">
                                                    <option value="">Select Year</option>
                                                    <?php
                                                    $yearShow = '';
                                                    $yearSql =
                                                        'SELECT * FROM years ORDER BY year ASC';
                                                    $yearResult = mysqli_query(
                                                        $con,
                                                        $yearSql
                                                    );
                                                    while (
                                                        $yearRow = mysqli_fetch_array(
                                                            $yearResult
                                                        )
                                                    ) {
                                                        $yearShow .=
                                                            '
                                                   <option value="' .
                                                            $yearRow['year'] .
                                                            '">' .
                                                            $yearRow['year'] .
                                                            '</option>
                                                                            ';
                                                    }
                                                    echo $yearShow;
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="subject">Select Subject</label>
                                                <select class="form-control" name="subject" id="subject">
                                                    <?php
                                                    $fetchShow = '';
                                                    $fetchSubjectSQL =
                                                        'SELECT * FROM subjects ORDER BY date_time DESC ';
                                                    $fetchSubjectResult = mysqli_query(
                                                        $con,
                                                        $fetchSubjectSQL
                                                    );
                                                    $fetchShow .= '
                                                                <option>Select Subject</option>
                                                                ';

                                                    if (
                                                        mysqli_num_rows(
                                                            $fetchSubjectResult
                                                        ) <= 0
                                                    ) {
                                                        $fetchShow .= '
                                                                    <option>No Subject Created Yet</option>';
                                                    } else {
                                                        while (
                                                            $fetchRow = mysqli_fetch_array(
                                                                $fetchSubjectResult
                                                            )
                                                        ) {
                                                            $fetchShow .=
                                                                '
                                                                        <option value="' .
                                                                $fetchRow[
                                                                    'subject_name'
                                                                ] .
                                                                '">' .
                                                                $fetchRow[
                                                                    'subject_name'
                                                                ] .
                                                                '</option>
                                                                        ';
                                                        }
                                                    }
                                                    echo $fetchShow;
                                                    ?>


                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class_">Select Class</label>
                                                <select class="form-control" name="class_" id="class_">
                                                    <?php
                                                    $fetchClassShow = '';
                                                    $fetchClassSQL =
                                                        'SELECT * FROM classes ORDER BY class_id ASC';
                                                    $fetchClassResult = mysqli_query(
                                                        $con,
                                                        $fetchClassSQL
                                                    );
                                                    $fetchClassShow .= '
                                                                <option>Select Class or Form</option>
                                                                ';

                                                    if (
                                                        mysqli_num_rows(
                                                            $fetchClassResult
                                                        ) <= 0
                                                    ) {
                                                        $fetchClassShow .= '
                                                            <option>No Class Created Yet</option>';
                                                    } else {
                                                        while (
                                                            $fetchClassRow = mysqli_fetch_array(
                                                                $fetchClassResult
                                                            )
                                                        ) {
                                                            $fetchClassShow .=
                                                                '
                                                                        <option value="' .
                                                                $fetchClassRow[
                                                                    'class_name'
                                                                ] .
                                                                '">' .
                                                                $fetchClassRow[
                                                                    'class_name'
                                                                ] .
                                                                '</option>
                                                                        ';
                                                        }
                                                    }
                                                    echo $fetchClassShow;
                                                    ?>

                                                </select>
                                            </div>

                                            <br /><br />
                                            <hr />
                                            <div class="row" style="margin-top: 50px;">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="classScorePercent">Enter Class Score Percent</label>
                                                    <input type="text" class="form-control" id="classScorePercent" name="classScorePercent" placeholder="30%">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="examScorePercent">Enter Class Score Percent</label>
                                                    <input type="text" class="form-control" id="examScorePercent" name="examScorePercent" placeholder="30%">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>Class Score</th>
                                                            <th></th>
                                                            <th>Exams Score</th>
                                                            <th></th>
                                                            <th>Total</th>
                                                            <th>Remarks</th>
                                                            <th>Buttons</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <p>Ernest Kyei Nkrumah</p>

                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm" type="text" placeholder="classScore">


                                                                </td>
                                                                <td>
                                                                    <p>30%</p>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm" type="text" placeholder="examScore">

                                                                </td>
                                                                <td>

                                                                    <p>60%</p>

                                                                </td>
                                                                <td>
                                                                    <p>Total</p>
                                                                </td>
                                                                <td>
                                                                    <p>Remarks</p>
                                                                </td>
                                                                <td>
                                                                    <i class="fa fa-save fa-lg "></i>

                                                                </td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <?php require_once 'scripts/footer.php'; ?>
    </div>
    <?php require_once 'scripts/footerjs.php'; ?>
</body>

</html>