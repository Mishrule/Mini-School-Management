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
                                    View Records
                                </div>
                                <div class="panel-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="table table-responsive">
                                            <p></p>
                                            <div class="col-md-4">
                                                <label for="term">Select Term</label>
                                                <select class="form-control" name="term" id="term">
                                                    <option value="Term one">Term One</option>
                                                    <option value="Term two"> Term Two</option>
                                                    <option value="Term three">Term Three</option>

                                                </select>
                                            </div>
                                            <div class="col-md-4">
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
                                           
                                            <div class="col-md-4">
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
                                            
                                            <div class="row" style="margin-top: 30px;">
                                                <div id="stat"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div id="showStudentInClass"></div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div id="reportTable"></div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="schoolName" id="schoolNameLabel">Enter School Name</label>
                                                    <input type="text" class="form-control" id="schoolName" name="schoolName" placeholder="School Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="headMasterRemarks" id="headMasterRemarksLabel">Headmaster's Remarks</label>
                                                    <input type="text" class="form-control" id="headMasterRemarks" name="headMasterRemarks" placeholder="Headmaster's Remark">
                                                </div>
                                                    <div class="col-md-6">
                                                    <label for="classTeacherRemarks" id="classTeacherRemarksLabel">Class Teacher's Remark</label>
                                                    <input type="text" class="form-control" id="classTeacherRemarks" name="classTeacherRemarks" placeholder="Teacher's Remarks">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="studentInterest" id="studentInterestLabel">Student's Interest</label>
                                                    <input type="text" class="form-control" id="studentInterest" name="studentInterest" placeholder="Student Interest">
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

        $('#class_').hide();
        $('#classLabel').hide();
        $('#showStudentInClass').hide();
        $('#assessTable').hide();
        //============================== YEAR CHANGE METHODS =========================
        $('#year').change(function() {
            var yearChange = $(this).val();
            if (yearChange == '') {
                alert('PLEASE SELECT A YEAR');

                $('#class_').hide();
                $('#classLabel').hide();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {

                $('#class_').show();
                $('#classLabel').show();
                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            }
        });


        //============================== CLASS CHANGE METHODS =========================
        $('#class_').change(function() {
            var classChange = $(this).val();
            if (classChange == 'Select Class or Form') {
                alert('PLEASE SELECT CLASS OR FORM');

                $('#showStudentInClass').hide();
                $('#assessTable').hide();
            } else {

                $('#showStudentInClass').show();
                $('#assessTable').show();

                $.ajax({
                    method: 'get',
                    url: 'scripts/print_report_scripts.php',
                    data: {
                        classChange
                    },
                    success: function(data) {
                        $('#showStudentInClass').html(data);
                    }
                });
            }
        });
        

        // ===================== SET NAME TO FIELD
        $(document).on('click', '.add', function() {
            let studentId = $(this).attr('id');
            let studentName = $(this).attr('value');
            let reportTerm = $('#term').val();
            let reportYear = $('#year').val();
            let reportClass = $('#class_').val();


            $.ajax({
                method: 'get',
                url: 'scripts/print_report_scripts.php',
                data: {
                    studentId,
                    studentName,
                    reportTerm,
                    reportYear,
                    reportClass
                },
                success: function(data) {
                    $('#reportTable').html(data);
                    // alert(data);
                }
            });

           
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

        // ================ SET SCHOOL NAME
        $('#schoolName').keyup(function(){
            let schoolName = $('#schoolName').val();
            $('#school_Name').text(schoolName);
            
        });

         // ================ SET HEADMASTER
         $('#headMasterRemarks').keyup(function(){
            let masterRemarks = $('#headMasterRemarks').val();
            $('#headmaster').text(masterRemarks);
            
        });

         // ================ SET CLASS TEACHER
         $('#classTeacherRemarks').keyup(function(){
            let teacher = $('#classTeacherRemarks').val();
            $('#teacher').text(teacher);
            
        });

         // ================ SET STUDENT
         $('#studentInterest').keyup(function(){
            let student = $('#studentInterest').val();
            $('#stuRemarks').text(student);
            
        });

        $(document).on('click', '#printValue', function(){
            var printon = document.getElementById('reportTable');
            var winkon = window.open('', '','width=900, height = 650');
            winkon.document.write(printon.outerHTML);
            winkon.document.close();
            winkon.focus();
            winkon.print();
            winkon.close();
        })

    })
</script>