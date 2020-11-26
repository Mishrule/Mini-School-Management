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

// 
?>

<!doctype html>
<html lang="en">

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

                        <!-- Student Profile Forms -->


                        <div class="col-md-12">
                            <h1 class="page-head-line"><span style="color:bisque;">Student Profile</span></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--   Kitchen Sink -->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <span style="color:bisque;">Student Profile</span>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <div align="center">
                                            <!--  <label for="studentName">Select Student Name</label>
                                    <select style="width:50%;" class="custom-select d-block my-3 form-control" id="studentName" name="studentName" required>
                                                <option value="">Search Name...</option>
                                                <?php
                                                /*     $msg = '';
                                                $sql = "SELECT * FROM studentregistration ORDER BY fullname ASC";
                                                $result = mysqli_query($con, $sql);
                                                $num_row = mysqli_num_rows($result);
                                                if ($num_row > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $msg .= '
                                                        <option value = "' . $row["id"] . '"> ' . $row["fullname"] . '</option> 
                                                        ';
                                                    }
                                                } else {
                                                    $msg .= '
                                                        <option value = "">Sorry No Records Found...</option> 
                                                        ';
                                                }*/
                                                ?>
                                                <?php // echo $msg; 
                                                ?> 
                                    </select> -->
                                            <table class="table table-responsive">
                                                <tr>
                                                    <td>
                                                        <label for="studentClass">Student Class</label>
                                                        <select style="width:50%;" class="custom-select d-block my-3 form-control" id="studentClass" name="studentClass" required>
                                                            <option value="">Search Class...</option>
                                                            <?php
                                                            $msgs = '';
                                                            $sql = "SELECT * FROM classes ORDER BY class_id ASC";
                                                            $result = mysqli_query($con, $sql);
                                                            $num_row = mysqli_num_rows($result);
                                                            if ($num_row > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $msgs .= '
                                                        <option value = "' . $row["class_name"] . '"> ' . $row["class_name"] . '</option> 
                                                        ';
                                                                }
                                                            } else {
                                                                $msgs .= '
                                                        <option value = "">Sorry No Records Found...</option> 
                                                        ';
                                                            }
                                                            ?>
                                                            <?php echo $msgs; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div id="display"></div>
                                                    </td>
                                        </div>

                                        </tr>
                                        </table>
                                        <div id="displays"></div>
                                    </center>
                                </div>
                            </div>
                            <!-- End  Kitchen Sink -->
                        </div>

                        <!-- End student Profile -->

                    </div>
                </div>
            </div>
        </div>






        <?php require_once('scripts/footer.php'); ?>
    </div>
    <?php require_once('scripts/footerjs.php') ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $(document).on('change', '#studentClass', function() {
            var ClassChange = $('#studentClass').val();

            $.ajax({
                url: 'scripts/student_profile_scripts.php',
                method: 'POST',
                data: {
                    ClassChange: ClassChange
                },
                success: function(data) {
                    $('#display').html(data);
                    /* var dd = $('.edit').val();
                      $('#classForm').val(dd);

                      var ee = $('#hiddendid').val();
                      $('#hidendid').val(ee); 
                     
                      var xx = $('#hiddendid').val();
                      $('#studentUpdate').val(xx);
                     */
                }
            });
        });

        $(document).on('change', '#studentName', function() {
            var nameChange = $('#studentName').val();

            $.ajax({
                url: 'scripts/student_profile_scripts.php',
                method: 'POST',
                data: {
                    nameChange: nameChange
                },
                success: function(data) {
                    $('#displays').html(data);
                    // var dd = $('.edit').val();
                    // $('#classForm').val(dd);

                    // var ee = $('#hiddendid').val();
                    // $('#hidendid').val(ee);

                    // var xx = $('#hiddendid').val();
                    // $('#studentUpdate').val(xx);

                }
            });
        });

        //=================== SET UPDATE PARAMETERS

        $(document).on('click', '.edit', function() {
            var edit = $(this).attr('id');

            $.ajax({
                url: 'scripts/student_profile_scripts.php',
                method: 'POST',
                data: {
                    edit
                },
                dataType: 'json',
                success: function(data) {
                    $('#hidendid').val(data.studentID);
                    $('#StudentName').val(data.studentName);
                    $('#defaultClassForm').val(data.studentClass);
                    $('#guardianName').val(data.studentGuardian);
                    $('#guardianContact').val(data.studentContact);
                    $('#location').val(data.studentLocation);
                    console.log(data);
                }
            });
        });


        //=================================== UPDATE ==================================
        $(document).on('click', '#studentUpdate', function() {
            if (confirm("Are You sure you want to change the class")) {
                var studentUpdateId = $('#hidendid').val();
                var studentUpdateName = $('#StudentName').val();
                var studentUpdateClass = $('#defaultClassForm').val();
                var studentUpdateGuardianName = $('#guardianName').val();
                var studentUpdateContact = $('#guardianContact').val();
                var studentUpdateLocation = $('#location').val();
                var studentUpdateBTN = $('#studentUpdate').val();
                $.ajax({
                    url: 'scripts/student_profile_scripts.php',
                    method: 'POST',
                    data: {
                        studentUpdateId,
                        studentUpdateName,
                        studentUpdateClass,
                        studentUpdateGuardianName,
                        studentUpdateContact,
                        studentUpdateLocation,
                        studentUpdateBTN
                    },
                    success: function(data) {

                        alert(data);
                        window.location.reload();
                    }


                });
            }

        });
        //====================================== DELETE ======================================
        $(document).on('click', '.delete', function() {
            if (confirm("Are you sure you want to delete Student Records")) {
                var del = $(this).attr('id');

                $.ajax({
                    url: 'scripts/student_profile_scripts.php',
                    method: 'POST',
                    data: {
                        del: del
                    },
                    success: function(data) {
                        alert(data);
                        window.location.reload();
                    }
                });
            }
        });
        //CHANGE CLASS
        $('#viewClass').change(function() {

            $('#defaultClassForm').val($('#viewClass').val());

        });


    });
</script>
<!-- Trigger the modal with a button -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

<!-- Modal -->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">UPDATE STUDENT RECORDS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <table class="table table-responsive table-hover">

                        <tr>
                            <td><input type="hidden" id="hidendid" name="hidendid" class="form-control" disabled /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="StudentName">Previous Class</label><input type="text" id="StudentName" name="StudentName" class="form-control" id="StudentName" placeholder="Student Name" value="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="defaultClassForm">Previous Class</label><input type="text" id="defaultClassForm" style="color:black; font:bold" name="defaultClassForm" class="form-control" id="defaultClassForm" placeholder="Previous Class" value="" disabled /></td>
                        </tr>

                        <tr>
                            <td><label for="viewClass">New Class</label>
                                <select class="custom-select d-block my-3 form-control" id="viewClass" name="viewClass">

                                    <?php
                                    $selectedSqll = "SELECT * FROM classes ORDER BY class_id ASC";
                                    $selectedResultl = mysqli_query($con, $selectedSqll);
                                    while ($rowedl = mysqli_fetch_array($selectedResultl)) {

                                        $showedl .= '
                                             <option Value="' . $rowedl["class_name"] . '">' . $rowedl["class_name"] . '</option>
                                                                    
                                        ';
                                    }
                                    ?>
                                    <?php echo $showedl; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="guardianName">Guardian Name</label><input type="text" id="guardianName" name="guardianName" class="form-control" id="guardianName" placeholder="Guardian Name" value="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="guardianContact">Guardian Contact</label><input type="text" id="guardianContact" name="guardianContact" class="form-control" id="guardianContact" placeholder="Guardian Contact" value="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="location">Location</label><input type="text" id="location" name="location" class="form-control" id="location" placeholder="location" value="" /></td>
                        </tr>

                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="studentUpdate" name="studentUpdate" class="btn btn-primary" value="">Update Student Class</button>
            </div>
        </div>
    </div>
</div>