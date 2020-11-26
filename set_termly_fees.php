<?php 
    include('scripts/dbCon.php');
?>
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
                        <!-- Set Termly Fees -->
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    SET TERMLY FEES
                                </div>
                                <div class="panel-body">
                                    <button data-toggle="collapse" class="btn btn-primary" data-target="#demo">Set Termly School Fees</button>
                                    <div id="demo" class="collapse">
                                        <legend>Details</legend>
                                        <fieldset>
                                            <form>
                                                <div align="center">
                                                    <label for="studentName" id="sel">Select Student Class</label>
                                                    <select style="width:50%;" class="custom-select d-block my-3 form-control" id="studentClass" name="studentClass" required>
                                                        <option value="">Select Student Class or Form...</option>
                                                        <?php
                                                        $msg = '';
                                                        $sql = "SELECT DISTINCT class_form FROM studentregistration";
                                                        $result = mysqli_query($con, $sql);
                                                        $num_row = mysqli_num_rows($result);
                                                        if ($num_row > 0) {
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $msg .= '
                                                        <option value = "' . $row["class_form"] . '"> ' . $row["class_form"] . '</option> 
                                                        ';
                                                            }
                                                        } else {
                                                            $msg .= '
                                                        <option value = "">Sorry No Records Found...</option> 
                                                        ';
                                                        }
                                                        ?>
                                                        <?php echo $msg; ?>
                                                    </select>
                                                    <hr />
                                                </div>
                                                <div id="display"></div>
                                                <hr />
                                                <div class="table table-responsive">
                                                    <table class="table table-responsive">
                                                        <tr>
                                                            <td>
                                                                <label for="fees" id="fterm">Term Fees</label>
                                                                <input type="number" name="fees" id="fees" class="form-control" placeholder="eg.&#8373;100">
                                                            </td>
                                                            <td>
                                                                <label for="fees" id="farrears">Arrears</label>
                                                                <input style="margin-left:5px;" type="number" name="arrears" id="arrears" class="form-control" value="0" placeholder="eg.&#8373;26">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="academicYear" id="aYear">Year</label>
                                                                <select class="custom-select d-block my-3 form-control" id="academicYear" name="academicYear" required>
                                                                    <option value="">Select Year</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <label for="academicTerm" id="term">Term</label>
                                                                <select style="margin-left:5px;" class="custom-select d-block my-3 form-control" id="academicTerm" name="academicTerm" required>
                                                                    <option value="">Select Academic Term</option>
                                                                    <option value="Term one">Term one</option>
                                                                    <option value="Term two">Term two</option>
                                                                    <option value="term three">term three</option>
                                                                </select>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <!--  <td>
                                                    <label for="totalFees">Total Fees</label>
                                                    <input type="number" name="totalFees" id="totalFees"  class="form-control" placeholder="Enter Terms Fees...">
                                                </td>-->
                                                            <td colspan="2">
                                                                <div align="center">
                                                                    <button style="margin-top:30px; border-radius:50px;" type="button" id="save" name"save" value="save" class="btn btn-primary btn-lg">Save</button>
                                                                </div>
                                                            </td>

                                                        </tr>

                                                    </table>


                                                </div>



                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Termly Fees -->
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
//===================================== LABELS ===============================================
   // $('#sel').hide();
    $('#fterm').hide();
    $('#farrears').hide();
    $('#aYear').hide();
    $('#term').hide();
//===================================== HIDE FIELDS ==========================================
  //  $('#studentClass').hide();
    $('#fees').hide();
    $('#arrears').hide();
    $('#academicYear').hide();
    $('#academicTerm').hide();
    $('#save').hide();
    $(document).ready(function(){
        $('#studentClass').change(function(){
            var changeClass = $('#studentClass').val();

            $.ajax({
                url:'scripts/fees_script.php',
                method:'POST',
                data:{changeClass:changeClass},
                success:function(data){
                    $('#display').html(data);
                }
            });
        });

//===================================== SHOW FILEDS
    $(document).on('change','#studentname', function(){
        
           // var name = 
        if($('#studentname').val()=="No Records Found"){
            //===================================== LABELS ===============================================
            // $('#sel').hide();
                $('#fterm').hide();
                $('#farrears').hide();
                $('#aYear').hide();
                $('#term').hide();
            //===================================== HIDE FIELDS ==========================================
            //  $('#studentClass').hide();
                $('#fees').hide();
                $('#arrears').hide();
                $('#academicYear').hide();
                $('#academicTerm').hide();
                $('#save').hide();

        }else{
 //===================================== LABELS ===============================================
        // $('#sel').hide();
            $('#fterm').show();
            $('#farrears').show();
            $('#aYear').show();
            $('#term').show();
//===================================== show FIELDS ==========================================
        //  $('#studentClass').show();
            $('#fees').show();
            $('#arrears').show();
            $('#academicYear').show();
            $('#academicTerm').show();
           // $('#save').show();
        }
    });
     $(document).on('click', '#save', function(){
            var studentclass = $('#studentClass').val();
            var studentFees = $('#fees').val();
            var studentArrears = $('#arrears').val();
            var studentAcademicYear= $('#academicYear').val();
            var studentAcademicTerm= $('#academicTerm').val();
            var studentname = $('#studentname').val();
            var saveBtn= $('#save').val();
           
            
           $.ajax({
                url:'scripts/fees_script.php',
                method:'POST',
                data:{studentclass:studentclass, studentFees:studentFees, studentname:studentname, studentArrears:studentArrears, studentAcademicYear:studentAcademicYear, studentAcademicTerm:studentAcademicTerm, saveBtn:saveBtn},
                success:function(data){
                    alert(data);
                     $('#studentClass').val("");
                        $('#fees').val("");
                        $('#arrears').val("");
                        $('#academicYear').val("");
                        $('#academicTerm').val("");
                        $('#studentname').val("");
                        $('#save').hide();
                },
            }); 
     });

//======================================= SET TERMLY FEES
    $(document).on('change', '#studentPaymentClass', function(){
            var changePaymentClass = $('#studentPaymentClass').val();

            $.ajax({
                url:'scripts/fees_script.php',
                method:'POST',
                data:{changePaymentClass:changePaymentClass},
                success:function(data){
                    $('#displays').html(data);
                    
                    if($('#studentPaymentClass').val()=="Select Student Class or Form..."){
                        $('#receipt').val("");
                    }else{
                        $('#receipt').val(receipt());
                    }
                }
            });
        });

        $(document).on('change', '#studentPaymentClass', function(){
            

            
        });

        $('#academicTerm').change(function(){
            if($('#academicTerm').val()==0){
                $('#save').hide();
            }else{
                $('#save').show();
            }
        });

//================================== SHOW IMAGE
    // $(document).on('change','#studentPaymentName', function(){
    //     var payName = $('#studentPaymentName').val();
    //     var payClass = $('#studentPaymentClass').val();

    //      $.ajax({
    //             url:'scripts/fees_script.php',
    //             method:'POST',
    //             data:{payName:payName, payClass:payClass},
    //             success:function(data){
    //                 $('#imageShow').html(data);
    //             }
    //     });
    // });
// //=================================================Make Payment Button
//     $(document).on('click', '#makePayment', function() {
//         var makePay = $('#makePayment').val();
//         var studentPayClass = $('#studentPaymentClass').val();
//         var pay = $('#payment').val();
//         var payYear = $('#paymentYear').val();
//         var payTerm = $('#paymentTerm').val();
//         var studentPayName = $('#studentPaymentName').val();
//         var receiptS = $('#receipt').val(); 

//         var datee = new Date();

//         $('#labelReceipt').text(receiptS);
//         $('#labelDate').text(datee);
//         $('#labelName').text(studentPayName);
//         $('#labelAmount').text(pay);
//         $('#labelTerm').text(payTerm);
//         $('#labelYear').text(payYear);
        
        
//         $.ajax({
//                 url:'scripts/fees_script.php',
//                 method:'POST',
//                 data:{makePay:makePay, studentPayClass:studentPayClass, receiptS:receiptS, pay:pay, payYear:payYear,payTerm:payTerm, studentPayName:studentPayName},
//                 success:function(data){
//                    alert(data);
//                 }
//         });
//     });

//=================================================Print Receipt
 /*   $(document).on('click', '#makeReceipt', function() {
        var makeReceipt = $('#makeReceipt').val();
        var studentReceiptClass = $('#studentPaymentClass').val();
        var Receipt= $('#payment').val();
        var ReceiptYear = $('#paymentYear').val();
        var ReceiptTerm = $('#paymentTerm').val();
        var studentReceiptName = $('#studentPaymentName').val();
        
        
        $.ajax({
                url:'feesScript.php',
                method:'POST',
                data:{makeReceipt:makeReceipt, studentReceiptClass:studentReceiptClass, Receipt:Receipt, ReceiptYear:ReceiptYear,ReceiptTerm:ReceiptTerm, studentReceiptName:studentReceiptName},
                success:function(data){
                   $('#receiptTable').html(data);
                }
        });
    });*/

//========================================= UPDATE THE FEES TABLE
    // $(document).on('click', '#makePayment', function() {
    //     var makePayS = $('#makePayment').val();
    //     var studentPayClassS = $('#studentPaymentClass').val();
    //     var payS = $('#payment').val();
    //     var payYearS = $('#paymentYear').val();
    //     var payTermS = $('#paymentTerm').val();
    //     var studentPayNameS = $('#studentPaymentName').val();
    //     var showPreviousPayS = $('#showPreviousPay').val();
    //     var showPreviousTotalfeesS = $('#showPreviousTotalfees').val();

    //             $.ajax({
    //             url:'scripts/fees_script.php',
    //             method:'POST',
    //             data:{makePayS:makePayS, studentPayClassS:studentPayClassS, payS:payS, payYearS:payYearS, payTermS:payTermS, studentPayNameS:studentPayNameS, showPreviousPayS:showPreviousPayS, showPreviousTotalfeesS:showPreviousTotalfeesS},
    //             success:function(data){
    //                alert(data);
    //                $('#studentPaymentClass').val("");
    //                $('#payment').val("");
    //                $('#paymentYear').val("");
    //                 $('#paymentTerm').val("");
    //                 $('#studentPaymentName').val("");
    //                 $('#showPreviousPay').val("");
    //                 $('#showPreviousTotalfees').val("");
    //                 $('#receipt').val("");
    //                 $('#MainArrears').text("");
    //             }
    //     });
    // });

    // $(document).on('change', '#paymentTerm', function(){
    //     var showPreviousPaymentTerm = $('#paymentTerm').val();
    //     var showPreviousPaymentClass = $('#studentPaymentClass').val();
    //     var showPreviousPaymentName = $('#studentPaymentName').val();
    //     var showPreviousPaymentYear = $('#paymentYear').val();
        
    
    //     $.ajax({
    //             url:'scripts/fees_script.php',
    //             method:'POST',
    //             data:{showPreviousPaymentTerm:showPreviousPaymentTerm, showPreviousPaymentClass:showPreviousPaymentClass, showPreviousPaymentName:showPreviousPaymentName, showPreviousPaymentYear:showPreviousPaymentYear},
    //             success:function(data){
    //               // alert(data);
    //                $('#previousPayment').html(data);
    //                var previous = $('#showPreviousPay').val();
    //                 var totalFees = $('#showPreviousTotalfees').val();
    //                $('#MainArrears').text(totalFees - previous);
                  
    //             }
                
    //     });
        
        
    // });
/*
    if($('#studentPaymentClass').val()=="Select Student Class or Form..." && $('#studentPaymentName').val()=="Select Student Name..."){
        $('#makePayment').hide();
    }else{
        $('#makePayment').show();
    }
*/
// //===============================|PRINT RECEIPT
//     $(document).on('click', '#labelPrintButton', function(){
//             var printkon = document.getElementById('receiptTable');
//             var winkon = window.open("","","width=900,height=650");
//             winkon.document.write(printkon.outerHTML);
//             winkon.document.close();
//             winkon.focus();
//             winkon.print();
//             winkon.close();

//         $('#labelReceipt').text("");
//         $('#labelDate').text("");
//         $('#labelName').text("");
//         $('#labelAmount').text("");
//         $('#labelTerm').text("");
//         $('#labelYear').text("");
//     });
});
</script>