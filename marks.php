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

/*$displayMessage = $show = $showed = $showedl = $time = '';
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
}*/
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
                                                <label for="subject" id="subjectLabel">Select Subject</label>
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
                                                                $fetchRow['subject_name'] .
                                                                '">' .
                                                                $fetchRow['subject_name'] .
                                                                '</option>
                                                                        ';
                                                        }
                                                    }
                                                    echo $fetchShow;
                                                    ?>


                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="class_" id="classLabel">Select Class</label>
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
                                                                $fetchClassRow['class_name'] .
                                                                '">' .
                                                                $fetchClassRow['class_name'] .
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
                                                    <label for="classScorePercent" id="classScorePercentLabel">Enter Class Score Percent</label>
                                                    <input type="number" class="form-control" id="classScorePercent" name="classScorePercent" placeholder="30%">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="examScorePercent" id="examScorePercentLabel">Enter Exam Score Percent</label>
                                                    <input type="number" class="form-control" id="examScorePercent" name="examScorePercent" placeholder="70%">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 30px;">
                                                <div id="stat"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div id="showStudentInClass"></div>

                                                </div>
                                                <div class="col-md-4">
                                                    <table class="table table-responsive" id="assessTable">
                                                        <tr>
                                                            <td colspan="2">
                                                                <input type="text" style="color:black;" class="form-control" id="studentName" name="studentName" placeholder="Student Name" disabled>
                                                                <input type="hidden" class="form-control" id="studentId" name="studentId" placeholder="Student ID" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" class="form-control" id="classScore" name="classScore" placeholder="class score">
                                                            </td>
                                                            <td>
                                                                <p id="convertClass">00%</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="number" class="form-control" id="examScore" name="examScore" placeholder="Exams score">
                                                            </td>
                                                            <td>
                                                                <p id="convertExams">00%</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>Total: <span id="total">Total</span></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p>Grade: <span id="grade">Grade</span> </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p id="remarks">Remarks</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <button type="button" class="btn btn-primary" id="saveMarks" name="saveMarks" value="saveMarks"><i class="fa fa-save"></i> Save Marks</button>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                                <div class="col-md-4">
                                                    <div id="displayMarksEntered"></div>
                                                    <!-- <div class="list-group">
                                                        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                                            Entered Marks
                                                        </button>
                                                        <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                                                        <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                                                        <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                                                        <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                                                    </div> -->

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
<script>
    $(document).ready(function() {
        //=============== HIDDEN COMPONENT
        $('#subject').hide();
        $('#class_').hide();
        $('#subjectLabel').hide();
        $('#classLabel').hide();
        $('#classScorePercent').hide();
        $('#examScorePercent').hide();
        $('#classScorePercentLabel').hide();
        $('#examScorePercentLabel').hide();
        $('#showStudentInClass').hide();
        $('#assessTable').hide();
        //============================== YEAR CHANGE METHODS =========================
        $('#year').change(function() {
            var yearChange = $(this).val();
            if (yearChange == '') {
                alert('PLEASE SELECT A YEAR');
                $('#subject').hide();
                $('#class_').hide();
                $('#subjectLabel').hide();
                $('#classLabel').hide();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {
                $('#subject').show();
                $('#class_').hide();
                $('#subjectLabel').show();
                $('#classLabel').hide();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            }
        });

        //============================== YEAR CHANGE METHODS =========================
        $('#subject').change(function() {
            var subjectChange = $(this).val();
            if (subjectChange == 'Select Subject') {
                // alert(subjectChange);
                $('#class_').hide();
                $('#classLabel').hide();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {
                // alert(subjectChange);
                $('#class_').show();
                $('#classLabel').show();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            }
        });

        //============================== SUBJECT CHANGE METHODS =========================
        $('#subject').change(function() {
            var subjectChange = $(this).val();
            if (subjectChange == 'Select Subject') {
                // alert(subjectChange);
                $('#class_').hide();
                $('#classLabel').hide();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {
                // alert(subjectChange);
                $('#class_').show();
                $('#classLabel').show();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            }
        }); //============================== CLASS CHANGE METHODS =========================
        $('#class_').change(function() {
            var classChange = $(this).val();
            if (classChange == 'Select Class or Form') {
                // alert('PLEASE SELECT CLASS OR FORM');
                // $('#class_').hide();
                // $('#classLabel').hide();
                $('#classScorePercent').hide();
                $('#examScorePercent').hide();
                $('#classScorePercentLabel').hide();
                $('#examScorePercentLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {
                // alert(classChange);
                $('#classScorePercent').show();
                $('#examScorePercent').show();
                $('#classScorePercentLabel').show();
                $('#examScorePercentLabel').show();
                $('#showStudentInClass').show();
                $('#assessTable').show();

                $.ajax({
                    method: 'get',
                    url: 'scripts/marksScripts.php',
                    data: {
                        classChange
                    },
                    success: function(data) {
                        $('#showStudentInClass').html(data);
                    }
                });
            }
        });
        let totalClassScore = 0.0;
        let totalExamScore = 0.0;
        $(document).on('keyup', '#classScore', function() {
            var classPercent = $('#classScorePercent').val();
            var class_score = $('#classScore').val();
            if (classPercent == '') {
                alert('Enter Class Score Percent');
                $('#classScore').val('');
            } else {
                totalClassScore = parseFloat(classPercent / 100) * parseFloat(class_score);
                $('#convertClass').text(totalClassScore.toFixed(2).toString());
            }

        });
        //*********************Exams percentage */
        $(document).on('keyup', '#examScore', function() {
            var examPercent = $('#examScorePercent').val();
            var exam_score = $('#examScore').val();
            if (examPercent == '') {
                alert('Enter exam Score Percent');
                $('#examScore').val('');
            } else {
                totalExamScore = parseFloat(examPercent / 100) * parseFloat(exam_score);
                $('#convertExams').text(totalExamScore.toFixed(2).toString());
                let total = parseFloat(totalClassScore) + parseFloat(totalExamScore);
                $('#total').text(total.toFixed(2).toString());
                gradingSystem(total);
            }

        });
        // ===================== SET NAME TO FIELD
        $(document).on('click', '.add', function() {
            let studentId = $(this).attr('id');
            let studentName = $(this).attr('value');
            $('#studentName').val(studentName);
            $('#studentId').val(studentId);
        });

        //======================= SAVE MARKS
        $('#saveMarks').click(function() {
            let term = $('#term').val();
            let academicYear = $('#year').val();
            let subject = $('#subject').val();
            let class_ = $('#class_').val();
            let classScorePercent = $('#classScorePercent').val();
            let examScorePercent = $('#examScorePercent').val();
            let studentName = $('#studentName').val();
            let studentId = $('#studentId').val();
            let convertClass = $('#convertClass').text();
            let convertExams = $('#convertExams').text();
            let total = $('#total').text();
            let grade = $('#grade').text();
            let remarks = $('#remarks').text();
            let saveBtn = $('#saveMarks').val();

            if ($('#classScore').val() == '' && $('#examScore').val() == '') {
                alert('Class & Exams Score Fields can\'t be empty');
            } else if ($('#studentName').val() == '') {
                alert('Please click on Student\'s Name from the left panel')
            } else {
                $.ajax({
                    method: 'POST',
                    url: 'scripts/marksScripts.php',
                    data: {
                        term,
                        academicYear,
                        subject,
                        class_,
                        classScorePercent,
                        examScorePercent,
                        studentName,
                        studentId,
                        convertClass,
                        convertExams,
                        total,
                        grade,
                        remarks,
                        saveBtn
                    },
                    success: function(data) {
                        // $('#stat').html(data);
                        alert(data);
                        $('#studentName').val('');
                        $('#classScore').val('');
                        $('#examScore').val('');
                        $('#convertClass').text('0.0%');
                        $('#convertExams').text('0.0%');
                        $('#total').text('0.0%');
                        $('#grade').text('');
                        $('#remarks').text('');
                    }
                });
            }

        });

        //========================== ENTERED MARKS
        $('#class_').change(function() {
            let marksClass = $(this).val();
            let marksTerm = $('#term').val();
            let marksYear = $('#year').val();
            let marksSubject = $('#subject').val();
            $.ajax({
                method: 'get',
                url: 'scripts/marksScripts.php',
                data: {
                    marksClass,
                    marksTerm,
                    marksYear,
                    marksSubject,
                },
                success: function(data) {
                    $('#displayMarksEntered').html(data);
                }
            });

        });

        //========================== Grading System
        function gradingSystem(grade) {
            if (grade >= 75 || grade == 100) {
                $('#grade').text('A1');
                $('#remarks').text('Excellent');
                $('#remarks').css('color', 'black');
            } else if (grade >= 70 || grade == 74) {
                $('#grade').text('B2');
                $('#remarks').text('Very Good');
                $('#remarks').css('color', 'black');
            } else if (grade >= 65 || grade == 69) {
                $('#grade').text('B3');
                $('#remarks').text('Good');
                $('#remarks').css('color', 'black');
            } else if (grade >= 60 || grade == 64) {
                $('#grade').text('C4');
                $('#remarks').text('Credit');
                $('#remarks').css('color', 'black');
            } else if (grade >= 55 || grade == 59) {
                $('#grade').text('C5');
                $('#remarks').text('Credit');
                $('#remarks').css('color', 'black');
            } else if (grade >= 50 || grade == 54) {
                $('#grade').text('C6');
                $('#remarks').text('Credit');
                $('#remarks').css('color', 'black');
            } else if (grade >= 45 || grade == 49) {
                $('#grade').text('D7');
                $('#remarks').text('Pass');
                $('#remarks').css('color', 'black');
            } else if (grade >= 40 || grade == 44) {
                $('#grade').text('E8');
                $('#remarks').text('Pass');
                $('#remarks').css('color', 'black');
            } else if (grade >= 0 || grade == 39) {
                $('#grade').text('F9');
                $('#remarks').text('Fail');
                $('#remarks').css('color', 'red');
            } else {
                alert('Marks Out of Range');
            }
        }
    })
</script>