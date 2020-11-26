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
                        <!-- Total Years Fees -->
                        <div class="col-md-3 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>TOTAL SCHOOL FEES YEARLY</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <label for="viewByYear">Year</label>
                                    <select class="custom-select d-block my-3 form-control" id="viewByYear" name="viewByYear">
                                        <option value="">Select Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                    <br />
                                    <div>
                                        <div id="vYear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>TOTAL TERMLY FEES</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <label for="chkByTermYear">Term</label>
                                    <select class="custom-select d-block my-3 form-control" id="chkByTermYear" name="chkByTermYear">
                                        <option value="">Select Term</option>
                                        <option value="Term one">Term one</option>
                                        <option value="Term two">Term two</option>
                                        <option value="Term three">Term three</option>
                                    </select>
                                    <label for="vwByYear">Year</label>
                                    <select class="custom-select d-block my-3 form-control" id="vwByYear" name="vwByYear">
                                        <option value="">Select Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select><br />
                                    <div align="center">
                                        <button type="button" style="border-radius:50%;" id="vTermClass" name="vTermClass" class="btn btn-primary btn-sm">Check</button>
                                    </div> <br />
                                    <div>
                                        <div id="vTermYear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>TOTAL FEES OF CLASS IN A YEAR</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <label for="vClassYear">Student Class</label>
                                    <select class="custom-select d-block my-3 form-control" id="vClassYear" name="vClassYear">
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
                                    <label for="vwByYearClass">Year</label>
                                    <select class="custom-select d-block my-3 form-control" id="vwByYearClass" name="vwByYearClass">
                                        <option value="">Select Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select><br />
                                    <div align="center">
                                        <button type="button" style="border-radius:50%;" id="vClassYearBtn" name="vClassYearBtn" class="btn btn-primary btn-sm">Check</button>
                                    </div> <br />
                                    <div>
                                        <div id="vTermYearClass"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div align="center">
                                        <p><strong>TOTAL FEES OF CLASS IN A TERM</strong></p>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <label for="vClassTerm">Student Class</label>
                                    <select class="custom-select d-block my-3 form-control" id="vClassTerm" name="vClassTerm">
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
                                    <label for="chkByTermClass">Term</label>
                                    <select class="custom-select d-block my-3 form-control" id="chkByTermClass" name="chkByTermClass">
                                        <option value="">Select Term</option>
                                        <option value="Term one">Term one</option>
                                        <option value="Term two">Term two</option>
                                        <option value="Term three">Term three</option>
                                    </select><br />
                                    <div align="center">
                                        <button type="button" style="border-radius:50%;" id="vClassTermBtn" name="vClassTermBtn" class="btn btn-primary btn-sm">Check</button>
                                    </div> <br />
                                    <div>
                                        <div id="vTermTermClass"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End of Total Years fees -->
                    </div>
                </div>
            </div>
        </div>






        <?php require_once('scripts/footer.php'); ?>
    </div>
    <?php require_once('scripts/footerjs.php') ?>
</body>

</html>