<?php include('scripts/dbCon.php'); ?>
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
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>Orders</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <label class="label bg-green">30% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">10,000</h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 78%;" class="progress-bar bg-green"></div>
                                </div>
                            </div> -->
                            <!-- <div class="alert alert-success">
                                <label for="paymentYear">Year</label>
                                <select class="custom-select  form-control" id="paymentYear" name="paymentYear" required>
                                    <option value="">Select Year</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div> -->
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Tax Deduction</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-red">15% <i class="fa fa-level-down" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">5,000</h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 38%;" class="progress-bar progress-bar-danger bg-red"></div>
                                </div> -->
                            <div class="alert alert-success">
                                <label for="paymentYear">Year</label>
                                <select class="custom-select  form-control" id="paymentYear" name="paymentYear" required>
                                    <option value="">Select Year</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Revenue</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-blue">50% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">$70,000</h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-blue"></div>
                                </div>
                            </div> -->
                            <div class="alert alert-success">
                                <label for="academicTerm">Term</label>
                                <select style="margin-left:5px;" class="custom-select  form-control" id="academicTerm" name="academicTerm" required>
                                    <option value="">Select Academic Term</option>
                                    <option value="Term one">Term one</option>
                                    <option value="Term two">Term two</option>
                                    <option value="term three">term three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Yearly Sales</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <label class="label bg-purple">80% <i class="fa fa-level-up" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">$100,000</h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar bg-purple"></div>
                                </div>
                            </div> -->
                            <!-- <div class="alert alert-success">
                            <label for="paymentYear">Year</label>
                            <select class="custom-select  form-control" id="paymentYear" name="paymentYear" required>
                                <option value="">Select Year</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div align="center">
                                            <legend class="caption pro-sl-hd"><span class="caption-subject text-uppercase"><b>Check Fees</b></span></legend>
                                        </div>
                                        <hr />

                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="row">
                                            <div align="center" class="float-center">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label style="color: white;" for="checkForYear">Year</label>
                                                    <select class="custom-select  form-control" id="checkForYear" name="checkForYear" required>
                                                        <option value="">Select Year</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label style="color: white;" for="checkForTerm">Term</label>
                                                    <select class="custom-select  form-control" id="checkForTerm" name="checkForTerm" required>
                                                        <option value="">Select Academic Term</option>
                                                        <option value="Term one">Term one</option>
                                                        <option value="Term two">Term two</option>
                                                        <option value="term three">term three</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label style="color: white;" for="checkForClass">Student Class</label>
                                                    <select class="custom-select  form-control" id="checkForClass" name="checkForClass" required>
                                                        <option value="Select Student Class or Form...">Select Student Class or Form...</option>
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

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div id="display"></div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div align="center">
                                        <h2 style="color: white;">Name: <span id="namee"> No Student name is Selected </span>
                                        </h2>
                                        <h3 style="color: white;">Class: <span id="studentClass"> No Class is Selected</span></h3>
                                        <h3 style="color: #ff0033;">Term's Fees:
                                            <span>&#8373;<span id="totalfees"> 0.0</span></span>
                                        </h3>
                                        <h3 style="color: #ff0066;">Total Payment:
                                            <span>&#8373; <span id="payment"> 0.0</span></span>
                                        </h3>
                                        <hr />
                                        <h3 style="color: #ff0000;">Arrears:
                                            <span> &#8373;<span id="arrearss"> 0.0</span></span>
                                        </h3>
                                        <hr />
                                        <h3 class="text-danger">Fees Status:
                                            <span class="text-danger">&#8373;<span id="statuss"> Not Yet</span></span>
                                        </h3>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-30 res-mg-t-30">
                            <h3 class="box-title">Total Students</h3>
                            <!-- <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter sales-sts-ctn">8659</span></li>
                            </ul> -->
                            <h3 class="box-title" align='center'>

                                <?php
                                $mysql = "SELECT * FROM studentregistration";
                                $result = mysqli_query($con, $mysql);
                                $num_of_row = mysqli_num_rows($result);
                                ?>
                                <span style="font-size: 50px;"><?php echo $num_of_row; ?></span>
                            </h3>
                            <h4 style="color:azure" align='center'>Registered Students</h4>
                            <hr />
                            <h5 style="color:azure" align='center'>Student Population</h5>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-30">
                            <h3 class="box-title" align="center">Total Fees</h3>
                            <!-- <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter sales-sts-ctn">7469</span></li>
                            </ul> -->
                            <h1>
                                <span align='center' style="font-size: 50px; color:azure;">&#8373;<span id="payYear">0.0</span></span>
                            </h1>
                            <h4 style="color:azure" align='center'>Total Fees</h4>
                            <hr />
                            <h5 style="color:azure" align='center'>In a Period</h5>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-30">
                            <h3 class="box-title" align="cente">Total Payment</h3>
                            <h1>
                                <span style="font-size: 50px; color:aliceblue;">&#8373;<span id="totalPayment">0.0</span></span>
                            </h1>
                            <h4 style="color:azure" align='center'>Total Payment</h4>
                            <hr />
                            <h5 style="color:azure" align='center'>In a Period</h5>
                        </div>
                        <div class="white-box analytics-info-cs">
                            <h3 class="box-title" align="center">Total Arrears</h3>
                            <h1>
                                <span style="font-size: 50px; color:aliceblue;">&#8373;<span id="totalArrears">0.0</span></span>
                            </h1>
                            <h4 style="color:azure" align='center'>Total Arrears</h4>
                            <hr />
                            <h5 style="color:azure" align='center'>In a Period</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-one"><i class="fa fa-sort-asc"></i> 18% last month</small> Site Traffic</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall Growth</h6>
                                    <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6>
                                    <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6>
                                    <b>5.50%</b></div>
                            </div>
                            <div id="sparkline8"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box tranffic-als-inner res-mg-t-30">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-danger last-month-sc cl-two"><i class="fa fa-sort-desc"></i> 18% last month</small>Site Traffic</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall Growth</h6>
                                    <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6>
                                    <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6>
                                    <b>5.50%</b></div>
                            </div>
                            <div id="sparkline9"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box tranffic-als-inner res-mg-t-30">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-three"><i class="fa fa-sort-asc"></i> 18% last month</small>Site Traffic</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall Growth</h6>
                                    <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6>
                                    <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6>
                                    <b>5.50%</b></div>
                            </div>
                            <div id="sparkline10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/new-product/5.png" alt=""></a>
                            <div class="overlay-content">
                                <a href="#">
                                    <h2>$280</h2>
                                </a>
                                <a href="#" class="btn-small">Now</a>
                                <div class="product-action">
                                    <ul>
                                        <li>
                                            <a data-toggle="tooltip" title="Shopping" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tooltip" title="Quick view" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <a class="pro-tlt" href="#">
                                    <h4>Princes Diamond</h4>
                                </a>
                                <div class="pro-rating">
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/new-product/5.png" alt=""></a>
                            <div class="overlay-content">
                                <a href="#">
                                    <h2>$280</h2>
                                </a>
                                <a href="#" class="btn-small">Now</a>
                                <div class="product-action">
                                    <ul>
                                        <li>
                                            <a data-toggle="tooltip" title="Shopping" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tooltip" title="Quick view" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <h4>Princes Diamond</h4>
                                </a>
                                <div class="pro-rating">
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/new-product/5.png" alt=""></a>
                            <div class="overlay-content">
                                <a href="#">
                                    <h2>$280</h2>
                                </a>
                                <a href="#" class="btn-small">Now</a>
                                <div class="product-action">
                                    <ul>
                                        <li>
                                            <a data-toggle="tooltip" title="Shopping" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tooltip" title="Quick view" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <h4>Princes Diamond</h4>
                                </a>
                                <div class="pro-rating">
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <a href="#"><img src="img/new-product/5.png" alt=""></a>
                            <div class="overlay-content">
                                <a href="#">
                                    <h2>$280</h2>
                                </a>
                                <a href="#" class="btn-small">Now</a>
                                <div class="product-action">
                                    <ul>
                                        <li>
                                            <a data-toggle="tooltip" title="Shopping" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tooltip" title="Quick view" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="#">
                                    <h4>Princes Diamond</h4>
                                </a>
                                <div class="pro-rating">
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="fa fa-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star color"></i>
                                    <i class="icon nalika-half-filled-rating-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Order Statistic</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp">
                                            <a href="#" class="btn btn-dark-blue btn-circle active tip-top" data-toggle="tooltip" title="Upload">
													<i class="fa fa-cloud-download" aria-hidden="true"></i>
												</a>
                                            <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
													<i class="fa fa-reply" aria-hidden="true"></i>
												</a>
                                            <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="line-chart" class="flot-chart flot-chart-sts line-chart-statistic"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="analytics-rounded mg-b-30 res-mg-t-30">
                            <div class="analytics-rounded-content">
                                <h5>Percentage distribution</h5>
                                <h2><span class="counter">60</span>/20</h2>
                                <div class="text-center">
                                    <div id="sparkline51"></div>
                                </div>
                            </div>
                        </div>
                        <div class="analytics-rounded">
                            <div class="analytics-rounded-content">
                                <h5>Percentage division</h5>
                                <h2><span class="counter">150</span>/<span class="counter">54</span></h2>
                                <div class="text-center">
                                    <div id="sparkline52"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="author-area-pro">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="personal-info-wrap">
                            <div class="widget-head-info-box">
                                <div class="persoanl-widget-hd">
                                    <h2>Jon Royita</h2>
                                    <p>Founder of Uttara It Park</p>
                                </div>
                                <img src="img/notification/5.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>100 Tweets</span> |
                                    <span>350 Following</span> |
                                    <span>610 Followers</span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Jhon Royita</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                <div class="text-right like-love-list">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="author-widgets-single res-mg-t-30">
                            <div class="author-wiget-inner">
                                <div class="perso-img">
                                    <img src="img/notification/6.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                </div>
                                <div class="persoanl-widget-hd persoanl1-widget-hd">
                                    <h2>Fire Foxy</h2>
                                    <p>Founder of Uttara It House</p>
                                </div>
                                <div class="social-widget-result social-widget1-result">
                                    <span>100 Tweets</span> |
                                    <span>350 Following</span> |
                                    <span>610 Followers</span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Fire Foxy</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                <div class="text-right like-love-list">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="personal-info-wrap personal-info-ano res-mg-t-30">
                            <div class="widget-head-info-box">
                                <div class="persoanl-widget-hd">
                                    <h2>Jon Royita</h2>
                                    <p>Founder of Uttara It Park</p>
                                </div>
                                <img src="img/contact/2.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                <div class="social-widget-result">
                                    <span>100 Tweets</span> |
                                    <span>350 Following</span> |
                                    <span>610 Followers</span>
                                </div>
                            </div>
                            <div class="widget-text-box">
                                <h4>Jhon Royita</h4>
                                <p>To all the athaists attacking me right now, I can't make you believe in God, you have to have faith.</p>
                                <div class="text-right like-love-list">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                    <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- <div class="calender-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="calender-inner">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <?php require_once('scripts/footer.php'); ?>
    </div>
    <?php require_once('scripts/footerjs.php') ?>
</body>

</html>
<script>
    $(document).ready(function(){
        $(document).on('change', '#paymentYear', function(){
            var changeYear = $('#paymentYear').val();
           
            $.ajax({
                url:'scripts/dashboardScript.php',
                method:'POST',
                data:{changeYear:changeYear},
                dataType:'json',
                success:function(data){
                    $('#payYear').text(data.payYear);
                    $('#totalPayment').text(data.totalPayment);
                    $('#totalArrears').text(data.totalArrears);
                }
            });
        });

        $(document).on('change', '#academicTerm', function(){
            var changeTerm = $('#academicTerm').val();
            var changeYEar = $('#paymentYear').val();
           
            $.ajax({
                url:'scripts/dashboardScript.php',
                method:'POST',
                data:{changeYEar:changeYEar, changeTerm:changeTerm},
                dataType:'json',
                success:function(data){
                    $('#payYear').text(data.payYear);
                    $('#totalPayment').text(data.totalPayment);
                    $('#totalArrears').text(data.totalArrears);
                }
            });
        });

//================================= DISPLAY CLASS
        $(document).on('change','#checkForClass', function(){
                var classChange = $('#checkForClass').val();
                
                $.ajax({
                    url:'scripts/dashboardScript.php',
                    method:'POST',
                    data:{classChange:classChange},
                    success:function(data){
                        $('#display').html(data);
                    }
                });
            });
//============================================== DISPLAY FEES RESULT.
            $(document).on('change','#studentName', function(){
                    var nameChange = $('#studentName').val();
                    var yearCheck = $('#checkForYear').val();
                    var termCheck = $('#checkForTerm').val();
                    var classCheck = $('#checkForClass').val();
                    
                    $.ajax({
                        url:'scripts/dashboardScript.php',
                        method:'POST',
                        data:{nameChange:nameChange, yearCheck:yearCheck, termCheck:termCheck, classCheck:classCheck},
                        dataType:'json',
                        success:function(data){
                            if($('#studentName').val()=="Search Name..."){
                                alert("Please Select a Student Name");
                                $('#namee').text("No Student name Selected");
                                $('#studentClass').text("No Student Class Selected");
                                $('#totalfees').text("0.0");
                                $('#payment').text("0.0");
                                $('#arrearss').text("0.0");
                                $('#statuss').text("Not Yet");
                            }else{
                                $('#namee').text(data.fullnamE);
                                $('#studentClass').text(data.class_forM);
                                $('#totalfees').text(data.totalfeeS);
                                $('#payment').text(data.amountpaiD);
                                $('#arrearss').text(data.arrearS);
                                $('#statuss').text(data.statuS);
                            }
           
                        }
                    });
                });


    });
</script>