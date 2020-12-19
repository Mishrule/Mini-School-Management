<?php
    include('dbCon.php');

    $howClassDetailsString = '';
    if(isset($_GET['classChange'])){
        $getDetailsCount = 1;
        $getClassDetail = mysqli_real_escape_string($con, $_GET['classChange']);
        $getClassDetailSQL = "SELECT * FROM studentregistration WHERE class_form = '$getClassDetail'";
        $getClassDetailResult = mysqli_query($con, $getClassDetailSQL);
        $howClassDetailsString .='
        <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
            Click Student Name
        </button>
        ';
        if(mysqli_num_rows($getClassDetailResult)<1){
            $howClassDetailsString .='
            <button type="button" class="list-group-item list-group-item-action">No Student Found</button>
            ';
        }else{
            while($getClassDetailRow = mysqli_fetch_array($getClassDetailResult)){
                $howClassDetailsString .='
                <button type="button" id=" '.$getClassDetailRow['id'] .'" value=" '.$getClassDetailRow['fullname'] .'" class="list-group-item list-group-item-action add "><span class="badge bg-primary rounded-pill">'.$getDetailsCount.'</span>
                    '.$getClassDetailRow['fullname'] .'
                </button>
                
                ';
                $getDetailsCount++;
            }
        }
        $howClassDetailsString .='
        </div>
        ';
        echo $howClassDetailsString;
    }
// ============================================ Entered Marks
    $enterMarksStatus = '';
    if(isset($_POST['saveBtn'])){
        $term = mysqli_real_escape_string($con, $_POST['term']);
        $academicYear = mysqli_real_escape_string($con, $_POST['academicYear']);
        $subject = mysqli_real_escape_string($con, $_POST['subject']);
        $class_ = mysqli_real_escape_string($con, $_POST['class_']);
        $classScorePercent = mysqli_real_escape_string($con, $_POST['classScorePercent']);
        $examScorePercent = mysqli_real_escape_string($con, $_POST['examScorePercent']);
        $studentName = mysqli_real_escape_string($con, $_POST['studentName']);
        $studentId = mysqli_real_escape_string($con, $_POST['studentId']);
        $convertClass = mysqli_real_escape_string($con, $_POST['convertClass']);
        $convertExams = mysqli_real_escape_string($con, $_POST['convertExams']);
        $total = mysqli_real_escape_string($con, $_POST['total']);
        $grade = mysqli_real_escape_string($con, $_POST['grade']);
        $remarks = mysqli_real_escape_string($con, $_POST['remarks']);

        $enterMarksSQL = "INSERT INTO examsmarks VALUES('$studentId','$studentName','$term','$academicYear','$subject','$class_','$classScorePercent','$examScorePercent','$convertClass','$convertExams','$total','$grade','$remarks')";

        $enterMarksResult = mysqli_query($con, $enterMarksSQL);

        if($enterMarksResult){
            $enterMarksStatus = $studentName.' '.$subject.' Marks is Saved Successfully.';
        }else{
            $enterMarksStatus = '
             Failed to Save Marks. '.mysqli_error($con).'
            ';
               
        }
        echo $enterMarksStatus;
    }

    // =============================================== show student entered marks
    $showMarks ='';
    if(isset($_GET['marksClass'])){
        $marksClass = mysqli_real_escape_string($con, $_GET['marksClass']);
        $marksTerm = mysqli_real_escape_string($con, $_GET['marksTerm']);
        $marksYear = mysqli_real_escape_string($con, $_GET['marksYear']);
        $marksSubject = mysqli_real_escape_string($con, $_GET['marksSubject']);

       
        $marksSQL = "SELECT * FROM examsmarks WHERE term = '$marksTerm' AND academicyear ='$marksYear' AND subject = '$marksSubject' AND studentclass='$marksClass'";
        $marksResult = mysqli_query($con, $marksSQL);
        $showMarks .='
        <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
            List of Student Marks Entered
        </button>
        ';
        if(mysqli_num_rows($marksResult)<1){
            $showMarks .='
            <button type="button" class="list-group-item list-group-item-action">No Student Found</button>
            ';
        }else{
            while($marksRow = mysqli_fetch_array($marksResult)){
                $showMarks .='
                <button type="button" id=" '.$marksRow['studentid'] .'" value=" '.$marksRow['studentname'] .'" class="list-group-item list-group-item-action update "><span class="badge bg-primary rounded-pill">'.$marksRow['grade'].'</span><span class="badge bg-primary rounded-pill">'.$marksRow['total'].'</span>
                    '.$marksRow['studentname'] .'
                </button>
                
                ';
              
            }
        }
        $showMarks .='
        </div>
        ';
        echo $showMarks;
    }



?>