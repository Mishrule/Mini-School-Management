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
                        <!-- Generate Fees -->
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>GENERATE FEES BY CLASS</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form method="GET" action="genByClass.php">
                                        <div align="left">
                                            <label for="genByClass">Student Class</label><br />
                                            <select class="custom-select d-block my-3 form-control" id="genByClass" name="genByClass" required>
                                                <option value="">Select Student Class or Form...</option>
                                                <?php
                                                $msg = '';
                                                $sql = "SELECT DISTINCT class_form FROM schoolfees";
                                                $result = mysqli_query($con, $sql);
                                                $num_row = mysqli_num_rows($result);
                                                if ($num_row > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $msg .= '
                                        <option value = "' . $row["class_form"] . '"> ' . $row["class_form"] . '</option> 
                                        ';
                                                    }
                                                }

                                                ?>
                                                <?php echo $msg; ?>
                                            </select>
                                        </div><br />
                                        <div align="left">
                                            <label align="left" for="genByTerm">Term</label>
                                            <select class="custom-select d-block my-3 form-control" id="genByTerm" name="genByTerm">
                                                <option value="">Select Term</option>
                                                <option value="Term one">Term one</option>
                                                <option value="Term two">Term two</option>
                                                <option value="Term three">Term three</option>
                                            </select>
                                        </div><br />

                                        <div align="left">
                                            <label align="left" for="genByYear">Year</label>
                                            <select class="custom-select d-block my-3 form-control" id="genByYear" name="genByYear">
                                                <option value="">Select Year</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>

                                        <div align="center">
                                            <button style="margin-top:30px; border-radius:50px;" type="button" id="genByClassBtn" name"genByClassBtn" value="genByClassBtn" class="btn btn-primary btn-md">Preview</button>
                                            <!-- <button style="margin-top:30px; border-radius:50px;" type="submit" id="genByReportBtn" name"genByReportBtn" value="genByReportBtn" class="btn btn-warning btn-lg">Generate Report</button> -->
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- End Generate Fees -->
                            <!-- View Generated Class -->
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div align="center">
                                            <p><strong>SCHOOL FEES TABLE FOR CLASS</strong></p>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">

                                            <div id="genClassShow"></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End View Generated Class -->
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