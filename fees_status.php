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
                        <!-- Check fully paid Fees -->
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>CHECK FULLY PAID OR NOT.</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div align="left">
                                        <label for="checkByClass">Student Class</label>
                                        <select class="custom-select d-block my-3 form-control" id="checkByClass" name="checkByClass" required>
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
                                    </div>
                                    <div align="left"><br/>
                                        <label for="checkByTerm">Term</label>
                                        <select class="custom-select d-block my-3 form-control" id="checkByTerm" name="checkByTerm">
                                            <option value="">Select Term</option>
                                            <option value="Term one">Term one</option>
                                            <option value="Term two">Term two</option>
                                            <option value="Term three">Term three</option>
                                        </select>
                                    </div>

                                    <div align="left"><br/>
                                        <label for="checkByYear">Year</label>
                                        <select class="custom-select d-block my-3 form-control" id="checkByYear" name="checkByYear">
                                            <option value="">Select Year</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </div>

                                    <div align="left"><br/>
                                        <label for="checkByStatus">Status</label>
                                        <select class="custom-select d-block my-3 form-control" id="checkByStatus" name="checkByStatus">
                                            <option value="">Select Status</option>
                                            <option value="fully paid">fully paid</option>
                                            <option value="Not Fully Paid">not fully paid</option>

                                        </select>
                                    </div>


                                    <div align="center">
                                        <button style="margin-top:30px; border-radius:50px;" type="button" id="checkByClassBtn" name"checkByClassBtn" value="checkByClassBtn" class="btn btn-primary btn-md">Preview</button>
                                        <!--    <button style="margin-top:30px; border-radius:50px;" type="button" id="checkByReportBtn" name"checkByReportBtn" value="checkByReportBtn" class="btn btn-warning btn-lg">Generate Report</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>SCHOOL FEES TABLE FOR STATUS</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">

                                        <div id="checkClassShow"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Check fully paid Fees -->
                    </div>
                </div>
            </div>
        </div>






        <?php require_once('scripts/footer.php'); ?>
    </div>
    <?php require_once('scripts/footerjs.php') ?>
</body>

</html>