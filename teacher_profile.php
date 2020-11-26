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

                        <!-- teacher Profile Forms -->


                        <div class="col-md-12">
                            <h1 class="page-head-line"><span style="color:bisque;">Teacher Profile</span></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!--   Kitchen Sink -->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <span style="color:bisque;">Teacher Profile</span>
                                </div>
                                <div class="panel-body">
                                    <center>
                                        <div align="center">

                                            <table class="table table-responsive">
                                                <tr>
                                                    <td>
                                                        <label for="teacherStatus">Teacher Status</label>
                                                        <select style="width:50%;" class="custom-select d-block my-3 form-control" id="teacherStatus" name="teacherStatus" required>
                                                            <option>Select Status</option>
                                                            <option value="None Teaching">None Teaching Staff</option>
                                                            <option value="Teaching">Teaching Staff</option>

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

                        <!-- End teacher Profile -->

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
        $(document).on('change', '#teacherStatus', function() {
            var statusChange = $('#teacherStatus').val();

            $.ajax({
                url: 'scripts/teacher_profile_scripts.php',
                method: 'POST',
                data: {
                    statusChange
                },
                success: function(data) {
                    $('#display').html(data);

                }
            });
        });

        $(document).on('change', '#teacherName', function() {
            var nameChange = $('#teacherName').val();

            $.ajax({
                url: 'scripts/teacher_profile_scripts.php',
                method: 'POST',
                data: {
                    nameChange
                },
                success: function(data) {
                    $('#displays').html(data);

                }
            });
        });

        //=================== SET UPDATE PARAMETERS

        $(document).on('click', '.edit', function() {
            var edit = $(this).attr('id');

            $.ajax({
                url: 'scripts/teacher_profile_scripts.php',
                method: 'POST',
                data: {
                    edit
                },
                dataType: 'json',
                success: function(data) {
                    $('#hidendid').val(data.teachertID);
                    $('#teachername').val(data.teacherName);
                    $('#teachercontact').val(data.teacherContact);
                    $('#teacherLocation').val(data.teacherlocation);
                    $('#teacherstatus').val(data.teacherstatus);
                    $('#major').val(data.teachermajor);
                    $('#minor').val(data.teacherminor);
                    console.log(data);
                }
            });
        });


        //=================================== UPDATE ==================================
        $(document).on('click', '#teacherUpdate', function() {
            if (confirm("Are You sure you want to change the class")) {
                var teacherUpdateId = $('#hidendid').val();
                var teacherUpdateName = $('#teachername').val();
                var teacherUpdateClass = $('#teachercontact').val();
                var teacherUpdateteacherLocation = $('#teacherLocation').val();
                var teacherUpdateStatus = $('#teacherstatus').val();
                var teacherUpdateMajor = $('#major').val();
                var teacherUpdateMinor = $('#minor').val();
                var teacherUpdateBTN = $('#teacherUpdate').val();
                $.ajax({
                    url: 'scripts/teacher_profile_scripts.php',
                    method: 'POST',
                    data: {
                        teacherUpdateId,
                        teacherUpdateName,
                        teacherUpdateClass,
                        teacherUpdateteacherLocation,
                        teacherUpdateStatus,
                        teacherUpdateMajor,
                        teacherUpdateMinor,
                        teacherUpdateBTN
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
                    url: 'scripts/teacher_profile_scripts.php',
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
        $('#teacherNewStatus').change(function() {

            $('#teacherstatus').val($('#teacherNewStatus').val());

        });

        $('#changeMajor').change(function() {

            $('#major').val($('#changeMajor').val());

        });

        $('#changeminor').change(function() {

            $('#minor').val($('#changeminor').val());

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

                        <tr hidden>
                            <td><input type="hidden" id="hidendid" name="hidendid" class="form-control" disabled /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="teachername">Teacher Name</label><input type="text" id="teachername" name="teachername" class="form-control" placeholder="Teacher Name" value="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="teachercontact">Contact</label><input type="text" id="teachercontact" style="color:black; font:bold;" name="teachercontact" class="form-control" id="teachercontact" placeholder="Previous Class" value="" disabled /></td>
                        </tr>


                        <tr>
                            <td>
                                <label for="teacherLocation">Teacher Location</label><input type="text" id="teacherLocation" name="teacherLocation" class="form-control" placeholder="Teacher Location" value="" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="teacherstatus">Teacher Status</label>
                                <input type="text" id="teacherstatus" style="color:black; font:bold;" name="teacherstatus" class="form-control" placeholder="Teacher Status" value="" disabled /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="teacherNewStatus">Teacher New Status</label>
                                <select class="custom-select d-block my-3 form-control" id="teacherNewStatus" name="teacherNewStatus" required>
                                    <option>Select Status</option>
                                    <option value="None Teaching">None Teaching Staff</option>
                                    <option value="Teaching">Teaching Staff</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="major">Major Subject</label><input type="text" id="major" name="major" style="color:black; font:bold;" class="form-control" id="major" placeholder="Teacher Status" value="" disabled /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="changeMajor">Change Major Subject</label>
                                <select class="custom-select d-block my-3 form-control" id="changeMajor" name="changeMajor" required>
                                    <?php
                                    $msgs = '';
                                    $sql = "SELECT * FROM subjects ORDER BY subject_id ASC";
                                    $result = mysqli_query($con, $sql);
                                    $num_row = mysqli_num_rows($result);
                                    if ($num_row > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $msgs .= '
                                          <option value = "' . $row["subject_name"] . '"> ' . $row["subject_name"] . '</option> 
                                                        ';
                                        }
                                    } else {
                                        $msgs .= '
                                     <option value = "">Sorry No Records Found...</option> 
                                                        ';
                                    }
                                    echo $msgs;
                                    ?>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="minor">Minor Subject</label><input type="text" id="minor" name="minor" style="color:black; font:bold;" class="form-control" id="minor" placeholder="Minor Subject" value="" disabled /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="changeminor">Change Minor Subject</label>
                                <select class="custom-select d-block my-3 form-control" id="changeminor" name="changeminor" required>
                                    <?php
                                    $msgs = '';
                                    $sql = "SELECT * FROM subjects ORDER BY subject_id ASC";
                                    $result = mysqli_query($con, $sql);
                                    $num_row = mysqli_num_rows($result);
                                    if ($num_row > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $msgs .= '
                                          <option value = "' . $row["subject_name"] . '"> ' . $row["subject_name"] . '</option> 
                                                        ';
                                        }
                                    } else {
                                        $msgs .= '
                                     <option value = "">Sorry No Records Found...</option> 
                                                        ';
                                    }
                                    echo $msgs;
                                    ?>
                                </select>
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="teacherUpdate" name="teacherUpdate" class="btn btn-primary" value="">Update Teacher</button>
            </div>
        </div>
    </div>
</div>