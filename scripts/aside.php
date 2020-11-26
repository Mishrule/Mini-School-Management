<?php 
    echo '
        <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
           <!-- <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="img/notification/4.jpg" alt="" /></a>
                    <h2>Lakian <span class="min-dtn">Das</span></h2>
                </div>
                <div class="profile-social-dtl">
                    <ul class="dtl-social">
                        <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                        <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                        <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>-->
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a class="has-arrow" href="index.php">
                                <i class="icon nalika-home icon-wrap"></i>
                                <span class="mini-click-non">Home</span>
                                </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard" href="index.php"><span class="mini-sub-pro">Dashboard</span></a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Student</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="register.php"><span class="mini-sub-pro">Register Student</span></a></li>
                                <li><a title="View Mail" href="student_profile.php"><span class="mini-sub-pro">Student Profile</span></a></li>
                                <li><a title="Compose Mail" href="view_student.php"><span class="mini-sub-pro">View Students</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Teachers</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="teacher_register.php"><span class="mini-sub-pro">Register Teacher</span></a></li>
                                <li><a title="View Mail" href="teacher_profile.php"><span class="mini-sub-pro">Teacher Profile</span></a></li>
                                <li><a title="Compose Mail" href="teacher_views.php"><span class="mini-sub-pro">View Teachers</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Fees Collection</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="set_termly_fees.php"><span class="mini-sub-pro">Set Termly Fees</span></a></li>
                                <li><a title="Data Maps" href="make_payment.php"><span class="mini-sub-pro">Make Payment</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">Fees Records</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="File Manager" href="gen_fees_class.php"><span class="mini-sub-pro">Generate Fees by Class</span></a></li>
                                <li><a title="Blog" href="fees_status.php"><span class="mini-sub-pro">Fees Status</span></a></li>
                                <li><a title="Blog Details" href="total_year_fees.php"><span class="mini-sub-pro">Total Fees</span></a></li>
                                <!--<li><a title="404 Page" href="total_term_fees.php"><span class="mini-sub-pro">Total Termly Fees</span></a></li>
                                <li><a title="500 Page" href="total_year_fees_class.php"><span class="mini-sub-pro">Total Year Fees for Class</span></a></li>-->
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Settings</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="years.php"><span class="mini-sub-pro">Create Year</span></a></li>
                                <li><a title="View Mail" href="classes.php"><span class="mini-sub-pro">Create Class</span></a></li>
                                <li><a title="Compose Mail" href="subjects.php"><span class="mini-sub-pro">Create Subjects</span></a></li>
                               
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Report</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="register.php"><span class="mini-sub-pro">Enter Marks</span></a></li>
                                <li><a title="View Mail" href="#"><span class="mini-sub-pro">Create Class</span></a></li>
                                <li><a title="Compose Mail" href="#"><span class="mini-sub-pro">Create Subjects</span></a></li>
                                <li><a title="Compose Mail" href="#p"><span class="mini-sub-pro">Announcement</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-bar-chart icon-wrap"></i> <span class="mini-click-non">User Account</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Bar Charts" href="create_user.php"><span class="mini-sub-pro">Create User</span></a></li>
                                <li><a title="Line Charts" href="manage_user.php"><span class="mini-sub-pro">Manage User</span></a></li>
                                <li><a title="Area Charts" href="logout.php"><span class="mini-sub-pro">Logout</span></a></li>
                                
                            </ul>
                        </li>
                      
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    ';
?>