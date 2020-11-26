<?php
include('scripts/dbCon.php');
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
                        <!-- View Student -->
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Teachers Table</div>
                                <div class="panel-body">
                                    <div class="table responsive">

                                        <table class="table table-bordered">
                                            <thead>
                                                <th>View by Status</th>
                                                <th>View by Subjects</th>
                                                <th>Records Limit</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select class="custom-select d-block my-3 form-control" id="viewStatus" name="viewStatus">
                                                            <option>Select Status</option>
                                                            <option value="None Teaching">None Teaching Staff</option>
                                                            <option value="Teaching">Teaching Staff</option>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select d-block my-3 form-control" id="viewDate" name="viewDate">
                                                            <option>Select Registration Date</option>
                                                            <?php

                                                            $selectedSql = "SELECT *  FROM subjects";
                                                            $selectedResult = mysqli_query($con, $selectedSql);
                                                            while ($rowed = mysqli_fetch_array($selectedResult)) {

                                                                $showed .= '
                                                                <option Value="' . $rowed["subject_name"] . '">' . $rowed["subject_name"] . '</option>
                                                                    
                                                                ';
                                                            }
                                                            ?>
                                                            <?php echo $showed; ?>

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="custom-select d-block my-3 form-control" id="limit" name="limit">
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="2000">All</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" style="background:#fff;">

                                <div id=showed></div>
                                <div id=showeds></div>
                            </div>
                        </div>


                        <!-- End of View Student -->
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
    /*  $('document').ready(function(){
        $('#send').click(function(){
   /*         var fullName = $('#fullName').val();
            var selectClass = $('#selectClass').val();
            var guardianName = $('#guardianName').val();
            var guardianContact = $('#guardianContact').val();
            var guardianLocation = $('#guardianLocation').val();
            var imagename = $('#imagename').val();
            var send = $('#send').val();
           
   /*         $.ajax({
                url:'scripts/registrationScript.php',
                method:'POST',
                data:{fullName:fullName, selectClass:selectClass, imagename:imagename, guardianName:guardianName, guardianContact:guardianContact, guardianLocation:guardianLocation, send:send},
                success:function(data){
                    alert(data);
                }
 /*           });

        });
    }); */
    $(document).on('change', '#limit', function() {
        var lmt = $('#limit').val();
        var viewStats = $('#viewStatus').val();

        $.ajax({
            url: 'scripts/teacher_profile_scripts.php',
            method: 'POST',
            data: {
                lmt,
                viewStats
            },
            success: function(data) {
                $('#showed').html(data);
            }
        });



    });
    $(document).on('change', '#viewStatus', function() {
        var classChange = $('#viewStatus').val();
        var lmit = $('#limit').val();

        $.ajax({
            url: 'scripts/teacher_profile_scripts.php',
            method: 'POST',
            data: {
                classChange: classChange,
                lmit: lmit
            },
            success: function(data) {
                $('#showed').html(data);
            }
        });
    });
    //==================== view by subject
    $('#viewDate').change(function() {
        var bySubject = $('#viewDate').val();
        var llmt = $('#limit').val();
        $.ajax({
            url: 'scripts/teacher_profile_scripts.php',
            method: 'POST',
            data: {
                bySubject,
                llmt
            },
            success: function(data) {
                $('#showed').html(data);
            }
        });
    })
</script>