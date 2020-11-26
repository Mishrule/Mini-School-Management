<?php
require_once('scripts/dbCon.php');


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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Create a Class
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="table table-responsive">
                                            <p></p>
                                            <div id="showclass"></div>

                                            <table class="table table-responsive">
                                                <tr>
                                                    <td>

                                                        <label class="col-md-5" for="createclass" align="left">Create a class</label>

                                                        <input type="text" class="form-control col-md-12" id="createclass" name="createclass" placeholder="Create class" required>
                                                        <p class='error'></p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <button class="btn btn-primary" value="send" id="send" name="send">Save class</button>
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
                                    Created Classes
                                </div>
                                <div class="panel-body">
                                    <form method="POST">
                                        <ul class="list-group">
                                            <?php
                                            $fetchShow = '';
                                            $fetchclassSQL = 'SELECT * FROM classes ORDER BY date_time DESC LIMIT 10';
                                            $fetchclassResult = mysqli_query($con, $fetchclassSQL);

                                            if (mysqli_num_rows($fetchclassResult) < 0) {
                                                $fetchShow .= '
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                       
                                                   <marquee>SORRY NO CLASS CREATED</marquee>
                                                    
                                                    </li>
                                                    ';
                                            } else {
                                                while ($fetchRow = mysqli_fetch_array($fetchclassResult)) {
                                                    $fetchShow .= '
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                           
                                                        ' . $fetchRow['class_name'] . '
                                                        
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
            var classs = $('#createclass').val();
            var submit_class = $('#send').val();
            if (classs == '') {
                //    alert('Field can\'t be empty');
                $('.error').css({
                    'color': 'red'
                });
                $('.error').text('This Field cant be empty');
            } else {
                $.ajax({
                    url: 'scripts/classesScript.php',
                    method: 'POST',
                    data: {
                        classs,
                        submit_class
                    },
                    success: function(data) {
                        $('#showclass').html(data);
                        window.location.reload();
                    }
                    
                });
            }
        });
    })
</script>