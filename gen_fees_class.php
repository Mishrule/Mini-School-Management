<?php 
    include('scripts/dbCon.php');
?>
<!doctype html>
<html  lang="en">

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