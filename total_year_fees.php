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
                        <!-- Total Years Fees -->
                        <div class="col-md-6 col-sm-12">
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
                                        <?php
                                            $yearShow = '';
                                            $yearSql = 'SELECT * FROM years ORDER BY year ASC';
                                            $yearResult = mysqli_query($con, $yearSql);
                                            while ($yearRow = mysqli_fetch_array($yearResult)) {
                                                $yearShow .= '
                                                   <option value="' . $yearRow['year'] . '">' . $yearRow['year'] . '</option>
                                                                            ';
                                            }
                                            echo $yearShow;
                                            ?>
                                    </select>
                                    <br />
                                    <div>
                                        <div id="vYear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
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
                                        <?php
                                            $yearShow = '';
                                            $yearSql = 'SELECT * FROM years ORDER BY year ASC';
                                            $yearResult = mysqli_query($con, $yearSql);
                                            while ($yearRow = mysqli_fetch_array($yearResult)) {
                                                $yearShow .= '
                                                   <option value="' . $yearRow['year'] . '">' . $yearRow['year'] . '</option>
                                                                            ';
                                            }
                                            echo $yearShow;
                                            ?>
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
                        <div class="col-md-6 col-sm-12">
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
                                        <?php
                                            $yearShow = '';
                                            $yearSql = 'SELECT * FROM years ORDER BY year ASC';
                                            $yearResult = mysqli_query($con, $yearSql);
                                            while ($yearRow = mysqli_fetch_array($yearResult)) {
                                                $yearShow .= '
                                                   <option value="' . $yearRow['year'] . '">' . $yearRow['year'] . '</option>
                                                                            ';
                                            }
                                            echo $yearShow;
                                            ?>
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
                        <div class="col-md-6 col-sm-12">
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

<script>
$(document).ready(function(){
        $('#genByReportBtn').hide();
        $('#checkByReportBtn').hide();
        
        $(document).on('click', '#genByReportBtn', function(){
            var printkon = document.getElementById('setTable');
            var winkon = window.open("","","width=900,height=650");
            winkon.document.write(printkon.outerHTML);
            winkon.document.close();
            winkon.focus();
            winkon.print();
            winkon.close();
        });


        $(document).on('click', '#checkByReportBtn', function(){
            var printkon = document.getElementById('check1');
            var winkon = window.open("","","width=900,height=650");
            winkon.document.write(printkon.outerHTML);
            winkon.document.close();
            winkon.focus();
            winkon.print();
            winkon.close();
        });




        $(document).on('click', '#genByClassBtn', function(){
            var generateClass = $('#genByClass').val();
            var generateTerm = $('#genByTerm').val();
            var generateYear = $('#genByYear').val();
            var generateBtn = $('#genByClassBtn').val();
            
            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{generateClass:generateClass, generateTerm:generateTerm, generateYear:generateYear, generateBtn:generateBtn},
                success:function(data){
                   
                    $('#genClassShow').html(data);
                    if(generateYear==0){
                        $('#genByReportBtn').hide();
                    }else{
                        $('#genByReportBtn').show();
                    }
                    
                    
                }
            });
        });
//=================================== CHECK FULL PAID
        $(document).on('click', '#checkByClassBtn', function(){
            var checkClass = $('#checkByClass').val();
            var checkTerm = $('#checkByTerm').val();
            var checkYear = $('#checkByYear').val();
            var checkStatus = $('#checkByStatus').val();
            var checkBtn = $('#checkByClassBtn').val();
            
            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{checkClass:checkClass, checkStatus:checkStatus, checkTerm:checkTerm, checkYear:checkYear, checkBtn:checkBtn},
                success:function(data){
                   
                    $('#checkClassShow').html(data);
                    if(checkYear==0){
                        $('#checkByReportBtn').hide();
                    }else{
                        $('#checkByReportBtn').show();
                    }
                    
                    
                }
            });
        });
//==================================== YEAR
        $(document).on('change', '#viewByYear', function(){
            var viewByYear = $('#viewByYear').val();
            
            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{viewByYear:viewByYear},
                success:function(data){
                   
                    $('#vYear').html(data);
                                        
                }
            });
            
        });
//========================================== TERM & YEAR
        $(document).on('click', '#vTermClass', function(){
            var chkByTermYear = $('#chkByTermYear').val();
            var vwByYear = $('#vwByYear').val();
            var termClassBtn = $('#vTermClass').val();
            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{chkByTermYear:chkByTermYear, vwByYear:vwByYear, termClassBtn:termClassBtn},
                success:function(data){
                   
                    $('#vTermYear').html(data);
                                        
                }
            });

        });
//===================================== YEAR AND CLASS
        $(document).on('click', '#vClassYearBtn', function(){
            var vwByYearClass = $('#vwByYearClass').val();
            var vClassYear = $('#vClassYear').val();
            var vClassYearBtn = $('#vClassYearBtn').val();
            



            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{vwByYearClass:vwByYearClass, vClassYear:vClassYear, vClassYearBtn:vClassYearBtn},
                success:function(data){
                   
                    $('#vTermYearClass').html(data);
                                        
                }
            });

        });

//===================================== YEAR AND CLASS
        $(document).on('click', '#vClassTermBtn', function(){
            var vwByTermClass = $('#chkByTermClass').val();
            var vClassTerm = $('#vClassTerm').val();
            var vClassTermBtn = $('#vClassTermBtn').val();
            



            $.ajax({
                url:'scripts/fees_status_script.php',
                method:'POST',
                data:{vwByTermClass:vwByTermClass, vClassTerm:vClassTerm, vClassTermBtn:vClassTermBtn},
                success:function(data){
                   
                    $('#vTermTermClass').html(data);
                                        
                }
            });

        });

//================================ FEES PDF GENERATE
 /*   $(document).on('click', '#genByReportBtn', function(){
            var generateClass = $('#genByClass').val();
            var generateTerm = $('#genByTerm').val();
            var generateYear = $('#genByYear').val();
            var generateBtn = $('#genByReportBtn').val();
            
            $.ajax({
                url:'genByClass.php',
                method:'POST',
                data:{generateClass:generateClass, generateTerm:generateTerm, generateYear:generateYear, generateBtn:generateBtn},
                success:function(data){
                    alert(data);

                    
                    
                }
            });
        }); */

});
</script>