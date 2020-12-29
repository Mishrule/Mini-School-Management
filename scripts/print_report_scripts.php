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

  

    // ===========================| FETCH DATA

    $fetechShowMarks ='';
    if(isset($_GET['studentId'])){
      
        $studentId = mysqli_real_escape_string($con, $_GET['studentId']);
        $studentName = mysqli_real_escape_string($con, $_GET['studentName']);
        $reportTerm = mysqli_real_escape_string($con, $_GET['reportTerm']);
        $reportYear = mysqli_real_escape_string($con, $_GET['reportYear']);
        $reportClass = mysqli_real_escape_string($con, $_GET['reportClass']);

       
        $fetchmarksSQL = "SELECT * FROM examsmarks WHERE studentid= '$studentId' AND studentname ='$studentName' AND term = '$reportTerm' AND academicyear ='$reportYear'  AND studentclass='$reportClass'";
        // print($fetchmarksSQL);
        $fetchMarksResult = mysqli_query($con, $fetchmarksSQL);
        $fetechShowMarks .='
        <table class="table table-bordered border-primary" id="reportTable">
            <thead>
                <tr>
                <th colspan="6"><div align="center"><h3 id="school_Name"></h3></div></th>
               
                </tr>
                <tr> <th colspan="6"><div align="center">Terminal Report</div></th></tr>
                
            </thead>
            <tbody>
                <tr>
                    <td colspan="3"><strong>Name: '.$studentName.'</strong></td>
                    <td colspan="3"><strong>Class: '.$reportClass.'</strong></td>
                </tr>
                <tr>
                    <td><strong>SUBJECT</strong></td>
                    <td><strong>CLASS SCORE</strong></td>
                    <td><strong>EXAMS SCORE</strong></td>
                    <td><strong>TOTAL</strong></td>
                    <td><strong>GRADE</strong></td>
                    <td><strong>REMARKS</strong></td>
                </tr>
           
        ';
        if(mysqli_num_rows($fetchMarksResult)<1){
            $fetechShowMarks .='
            <tr>
                <td colspan="6">No Records Found</td>
            </tr>
            ';
        }else{
            while($fetchmarksRow = mysqli_fetch_array($fetchMarksResult)){
                
                $fetechShowMarks .='
                
                <tr>
                    <td>'.$fetchmarksRow['subjects'].'</td>
                    <td>'.$fetchmarksRow['calculatedclassscore'].'</td>
                    <td>'.$fetchmarksRow['calculatedexamscore'].'</td>
                    <td>'.$fetchmarksRow['total'].'</td>
                    <td>'.$fetchmarksRow['grade'].'</td>
                    <td>'.$fetchmarksRow['remarks'].'</td>
                </tr>
               
                
                ';
              
            }
        }
        $fetechShowMarks .='
        <tr>
            <td colspan="2"><p>Headmaster\'s Remark: <span id="headmaster"></span> </p></td>
            <td colspan="2"><p>Class Teacher\'s Remark: <span id="teacher"></span></p></td>
            <td colspan="2"><p>Student\'s Interest: <span id="stuRemarks"></span></p></td>
        </tr>
        <tr>
            <td colspan="6"><button type="button" id="printValue" class="btn btn-primary btn-sm">Print Report</button></td>
        </tr>
        </tbody>
        
    </table>
        ';
        echo $fetechShowMarks;
    }


?>