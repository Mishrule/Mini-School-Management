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
                <button type="button" id="'.$getClassDetailRow['id'] .'" value="'.$getClassDetailRow['fullname'] .'" class="list-group-item list-group-item-action add "><span class="badge bg-primary rounded-pill">'.$getDetailsCount.'</span>
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

       
        $marksSQL = "SELECT * FROM examsmarks WHERE term = '$marksTerm' AND academicyear ='$marksYear' AND subjects = '$marksSubject' AND studentclass='$marksClass'";
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
                <button type="button" id="'.$marksRow['studentid'] .'" value="'.$marksRow['studentname'] .'" class="list-group-item list-group-item-action update "><span class="badge bg-primary rounded-pill">'.$marksRow['grade'].'</span><span class="badge bg-primary rounded-pill">'.$marksRow['total'].'</span>
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

    // ============================|Update Values
    $updateMarksStatus = '';
    if(isset($_POST['save_Btn'])){
        $term_ = mysqli_real_escape_string($con, $_POST['term_']);
        $academicYear_ = mysqli_real_escape_string($con, $_POST['academicYear_']);
        $subject_ = mysqli_real_escape_string($con, $_POST['subject_']);
        $class__ = mysqli_real_escape_string($con, $_POST['class__']);
        $classScorePercent_ = mysqli_real_escape_string($con, $_POST['classScorePercent_']);
        $examScorePercent_ = mysqli_real_escape_string($con, $_POST['examScorePercent_']);
        $studentName_ = mysqli_real_escape_string($con, $_POST['studentName_']);
        $studentId_ = mysqli_real_escape_string($con, $_POST['studentId_']);
        $convertClass_ = mysqli_real_escape_string($con, $_POST['convertClass_']);
        $convertExams_ = mysqli_real_escape_string($con, $_POST['convertExams_']);
        $total_ = mysqli_real_escape_string($con, $_POST['total_']);
        $grade_ = mysqli_real_escape_string($con, $_POST['grade_']);
        $remarks_ = mysqli_real_escape_string($con, $_POST['remarks_']);

        $updateMarksSQL = "UPDATE examsmarks 
        SET classpercentused='$classScorePercent_', exampercentused='$examScorePercent_ ', calculatedclassscore='$convertClass_', calculatedexamscore='$convertExams_', total='$total_', grade='$grade_', remarks='$remarks_' WHERE studentid='$studentId_' AND studentname='$studentName_' AND term='$term_' AND academicyear='$academicYear_' AND subjects = '$subject_' AND studentclass='$class__'";
        // print_r($updateMarksSQL);
        $updateMarksResult = mysqli_query($con, $updateMarksSQL);

        if($updateMarksResult){
            $updateMarksStatus = $studentName_.' '.$subject_.' Marks is Updated Successfully.';
        }else{
            $updateMarksStatus = '
             Failed to Update Marks. '.mysqli_error($con).'
            ';
               
        }
        echo $updateMarksStatus;
    }

    // ===========================| FETCH DATA
    // =============================================== show student entered marks
    $fetechShowMarks ='';
    if(isset($_GET['fetech'])){
        $fetchterm = mysqli_real_escape_string($con, $_GET['fetchterm']);
        $fetchacademicYear = mysqli_real_escape_string($con, $_GET['fetchacademicYear']);
        $fetchsubject = mysqli_real_escape_string($con, $_GET['fetchsubject']);
        $fetchclass_ = mysqli_real_escape_string($con, $_GET['fetchclass_']);

       
        $fetchmarksSQL = "SELECT * FROM examsmarks WHERE term = '$fetchterm' AND academicyear ='$fetchacademicYear' AND subjects = '$fetchsubject' AND studentclass='$fetchclass_'";
        $fetchMarksResult = mysqli_query($con, $fetchmarksSQL);
        $fetechShowMarks .='
        <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
            List of Student Marks Entered
        </button>
        ';
        if(mysqli_num_rows($fetchMarksResult)<1){
            $fetechShowMarks .='
            <button type="button" class="list-group-item list-group-item-action">No Student Found</button>
            ';
        }else{
            while($fetchmarksRow = mysqli_fetch_array($fetchMarksResult)){
                $fetechShowMarks .='
                <button type="button" id="'.$fetchmarksRow['studentid'] .'" value="'.$fetchmarksRow['studentname'] .'" class="list-group-item list-group-item-action update "><span class="badge bg-primary rounded-pill">'.$fetchmarksRow['grade'].'</span><span class="badge bg-primary rounded-pill">'.$fetchmarksRow['total'].'</span>
                    '.$fetchmarksRow['studentname'] .'
                </button>
                
                ';
              
            }
        }
        $fetechShowMarks .='
        </div>
        ';
        echo $fetechShowMarks;
    }


?>