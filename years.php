<?php
include('scripts/dbCon.php');


?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('scripts/head.php'); ?>

<body>

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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Create a Year
                                </div>
                                <div class="panel-body">
                                    <form method="POST">
                                        <div class="table table-responsive">
                                            <p></p>
                                            <div id="showYear"></div>

                                            <table class="table table-responsive">
                                                <tr>
                                                    <td>

                                                        <label class="col-md-5" for="createYear" align="left">Create a Year</label>

                                                        <input type="number" class="form-control col-md-12" id="createYear" name="createYear" placeholder="Create Year" required>
                                                        <p class='error'></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <button class="btn btn-primary" value="send" id="send" name="send">Save Year</button>
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Created Years
                                </div>
                                <div class="panel-body">
                                    <form method="POST">
                                        <ul class="list-group">
                                            <?php
                                            $fetchShow = '';
                                            $fetchYearSQL = 'SELECT * FROM years ORDER BY year DESC LIMIT 10';
                                            $fetchYearResult = mysqli_query($con, $fetchYearSQL);

                                            if (mysqli_num_rows($fetchYearResult) < 0) {
                                                $fetchShow .= '
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       
                                                   <marquee>SORRY NO YEAR CREATED</marquee>
                                                    
                                                    </li>
                                                    ';
                                            } else {
                                                while ($fetchRow = mysqli_fetch_array($fetchYearResult)) {
                                                    $fetchShow .= '
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           
                                                        ' . $fetchRow['year'] . '
                                                        
                                                    </li>
                                                        ';
                                                }
                                            }
                                            echo $fetchShow;
                                            ?>


                                        </ul>
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
<script>
    $(document).ready(function() {
        $('#send').click(function() {
            var years = $('#createYear').val();
            var submit_year = $('#send').val();
            if (years == 0) {
                //    alert('Field can\'t be empty');
                $('.error').css({
                    'color': 'red'
                });
                $('.error').text('This Field cant be empty');
            } else if ($('#createYear').val().length < 4) {
                $('.error').css({
                    'color': 'red'
                });
                $('.error').text('This Field cant be less than 4 digits');
            } else {
                $.ajax({
                    url: 'scripts/yearsScript.php',
                    method: 'POST',
                    data: {
                        years,
                        submit_year
                    },
                    success: function(data) {
                        $('#showYear').html(data);
                        window.location.reload();
                    }
                });
            }
        });
    })
</script>