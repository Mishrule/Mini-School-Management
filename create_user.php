<?php
require_once('scripts/dbCon.php');

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
                <div class="row">
                    <!-- Create Users -->
                    <div class="col-md-12"><br />
                        <h4 class="page-head-line"><span style="color:aliceblue"> Signup a User</span></h4>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="alert alert-warning">
                        <legend>Provide the Details below</legend>
                        <form method="POST">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="eg. Kofi" required />
                                </div>
                                <div class="col-md-4">
                                    <label for="surName">Surname</label>
                                    <input type="text" name="surName" class="form-control" id="surName" placeholder="eg. Mensah" required />
                                </div>
                                <div class="col-md-4">
                                    <label for="otherName">Other Name</label>
                                    <input type="text" name="otherName" class="form-control" id="otherName" placeholder="eg. Mensah" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="username">User Name</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="eg. Mensah" required />
                                </div>
                                <div class="col-md-4">
                                    <label for="securityQuestion">Security Question</label>
                                    <select id="securityQuestion" name="securityQuestion" class="form-control" required>
                                        <option value="">Select your security question</option>
                                        <option value="food">What is your favourite food</option>
                                        <option value="sallary">What is your annual Sallary</option>
                                        <option value="water">Your favourite Drinking Water</option>
                                        <option value="expensis">How much do you spend a day</option>
                                        <option value="car">Your favourite car</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="securityAnswer">Security Answer</label>
                                    <input type="text" name="securityAnswer" class="form-control" id="securityAnswer" placeholder="eg. Mensah" required />
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="userPassword">Password</label>
                                <input type="password" name="userPassword" class="form-control" id="userPassword" placeholder="eg. Password" required />
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="userEmail">Email</label>
                                    <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="eg. Mish@somewhere.com" />
                                </div>

                                <div class="col-md-4">
                                    <label for="contact">Contact No:</label>
                                    <input type="number" name="contact" class="form-control" id="contact" placeholder="0245181940" required />
                                </div>
                            </div>

                            <div class="row">
                                <div align="center">
                                    <button type="button" id="send" name="send" value="send" style="margin:10px; border-radius:45%; font-weight:bold;" class="btn btn-primary btn-lg">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="displaySignup"></div>
                                </div>
                            </div>
                        </form>

                    </div>


                    <!-- <div class="row">
                            <div class="alert alert-success">
                                <div align="center">
                                    <h4>Status: <span><?php echo $checkout; ?></span> </h4>
                                </div>

                            </div>
                        </div> -->

                    <!-- End Create Users -->
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
        $(document).on('click', '#send', function() {
            let firstName = $('#firstName').val();
            let surName = $('#surName').val();
            let otherName = $('#otherName').val();
            let username = $('#username').val();
            let securityQuestion = $('#securityQuestion').val();
            let securityAnswer = $('#securityAnswer').val();
            let userPassword = $('#userPassword').val();
            let userEmail = $('#userEmail').val();
            let contact = $('#contact').val();
            let send = $('#send').val();

            $.ajax({
                method: 'post',
                url: 'scripts/signup_scripts.php',
                data: {
                    firstName,
                    surName,
                    otherName,
                    username,
                    securityQuestion,
                    securityAnswer,
                    userPassword,
                    userEmail,
                    contact,
                    send
                },
                success: function(data) {
                    // $('#displaySignup').html(data);
                    alert(data);
                    // alert(data);
                }
            });
        });
    });
</script>