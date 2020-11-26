<?php
include('./dbCon.php');
$output = '';
if (isset($_POST["nameChange"])) {
	$name = $_POST["nameChange"];
	$sql = "SELECT * FROM teachers WHERE teacherid='$name'";
	$result = mysqli_query($con, $sql);

	$output .= '
			<div align="center" class="card">
			<div class="card" style="width: 18rem;">
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
			
				
					<img src="img/image/' . $row["teacherimage"] . '" height="200px"  width="200px" style="border-radius: 30px;" class="card-img-top" alt="Student Image">
					<div class="card-body">
						<h3 class="card-title">' . $row["teachername"] . '</h3>
						
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><span><strong>Contact</strong></span><br>' . $row["teachercontact"] . '</li>
						<li class="list-group-item"><span><strong>Location</strong></span><br>' . $row["teacherlocation"] . '</li>
						<li class="list-group-item"><span><strong>Teaching Status</strong></span><br>' . $row["teacherstatus"] . '</li>
						<li class="list-group-item"><span><strong>Major Subject</strong></span><br>' . $row["majorsubject"] . '</li>
						<li class="list-group-item"><span><strong>Minor Subject</strong></span><br>' . $row["minorsubject"] . '</li>
						<li class="list-group-item"><span><strong>Registration Date</strong></span><br>' . $row["date_time"] . '</li>
						
					</ul>
					<div class="card-body">
						<a href="#" class="card-link btn btn-danger btn-md delete" id="' . $row["teacherid"] . '" name="' . $row["teacherid"] . '"  value="' . $row["teacherid"] . '">
						DELETE STUDENT</a>

						<a href="#" class="card-link btn btn-primary btn-md edit" id="' . $row["teacherid"] . '" name="' . $row["teacherid"] . '" value="' . $row["teacherid"] . '"  data-toggle="modal" data-target="#myModal">
						UPDATE STUDENT CLASS</a>
					</div>
					
					

					
				';
		}
	} else {
		$output .= '
		<ul class="list-group list-group-flush">
			<li class="list-group-item">NO STUDENT RECORD FOUND</li>					
		</ul>
								
			';
	}
	$output . '</div></div>';
	echo $output;
}


if (isset($_POST["statusChange"])) {
	$teacherStatus = $_POST["statusChange"];
	$sql = "SELECT * FROM teachers WHERE teacherstatus='$teacherStatus'";
	$result = mysqli_query($con, $sql);

	$output .= '
			 <label for="teacherName">Select Teacher Name</label>
			 <select style="width:50%;" class="custom-select d-block my-3 form-control" id="teacherName" name="teacherName">
			 <option value="">Search Name...</option>
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
					<option value = "' . $row["teacherid"] . '"> ' . $row["teachername"] . '</option>
					
				';
		}
	} else {
		$output .= '
				 <option value = "">Sorry No Records Found...</option> 
			';
	}
	$output . '</table></div>';
	echo $output;
}
//==================================EDIT/UPDATE TO MODAL
$records = array();
if (isset($_POST["edit"])) {

	$edit = mysqli_real_escape_string($con, $_POST["edit"]);

	$editsqli = "SELECT * FROM teachers WHERE teacherid='$edit' ";
	$editresult = mysqli_query($con, $editsqli);
	while ($editRow = mysqli_fetch_array($editresult)) {
		$records['teachertID'] = $editRow['teacherid'];
		$records['teacherName'] = $editRow['teachername'];
		$records['teacherContact'] = $editRow['teachercontact'];
		$records['teacherlocation'] = $editRow['teacherlocation'];
		$records['teacherstatus'] = $editRow['teacherstatus'];
		$records['teachermajor'] = $editRow['majorsubject'];
		$records['teacherminor'] = $editRow['minorsubject'];


	}
	echo json_encode($records);
}


if (isset($_POST["teacherUpdateBTN"])) {
	$teacherUpdateId = mysqli_real_escape_string($con, $_POST['teacherUpdateId']);
	$teacherUpdateName = mysqli_real_escape_string($con, $_POST['teacherUpdateName']);
	$teacherUpdateClass = mysqli_real_escape_string($con, $_POST['teacherUpdateClass']);
	$teacherUpdateteacherLocation = mysqli_real_escape_string($con, $_POST['teacherUpdateteacherLocation']);
	$teacherUpdateStatus = mysqli_real_escape_string($con, $_POST['teacherUpdateStatus']);
	$teacherUpdateMajor = mysqli_real_escape_string($con, $_POST['teacherUpdateMajor']);
	$teacherUpdateMinor = mysqli_real_escape_string($con, $_POST['teacherUpdateMinor']);

	$updatesqli = "UPDATE teachers SET teachername='$teacherUpdateName', teachercontact='$teacherUpdateClass' , teacherlocation='$teacherUpdateteacherLocation', teacherstatus='$teacherUpdateStatus', majorsubject='$teacherUpdateMajor', minorsubject ='$teacherUpdateMinor' WHERE teacherid='$teacherUpdateId'";
	$updateResult = mysqli_query($con, $updatesqli);
	if ($updateResult) {
		echo 'RECORDS UPDATED SUCCESSFULLY';
	} else {
		echo "OOPS SOMETHING WENT WRONG TRY AGAIN" . mysqli_error($con);
	}
}

//======================================== DELETE STUDENT PROFILE ==========================================
if (isset($_POST["del"])) {
	$del = $_POST["del"];
	$sqll = "DELETE FROM teachers WHERE teacherid='$del'";
	$delResult = mysqli_query($con, $sqll);
	if ($delResult) {
		echo "STUDENT RECORD DELETED SUCCESSFULLY";
	} else {
		echo "OOPS SOMETHING WENT WRONG TRY AGAIN " . mysqli_error($con);
	}
}

//============================================ SHOW BY LIMIT
$shows = '';
if (isset($_POST["lmt"])) {
    $lim = intVal($_POST["lmt"]);
    $viewStats = $_POST["viewStats"];
    $s = 1;
    $msql = "SELECT * FROM teachers WHERE teacherstatus = '$viewStats' ORDER BY date_time DESC LIMIT $lim";
    $selectResult = mysqli_query($con, $msql);
    $shows .= '
                <table class="table table-bordered table-responsive" style="background:#fff;">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
                
                    <th>Registration Date</th>
                </thead>
                <tbody>
        ';
    if(mysqli_num_rows($selectResult)<=0){
		$shows .= '
			<tr>
				<td colspan="4">
				<marquee><strong class="text-danger">NO TEACHER INFORMATION FOUND</strong></marquee>
				</td>
			</tr>
		';
	}else{
		while ($row = mysqli_fetch_array($selectResult)) {

			$shows .= '
				<tr>
					<td>' . $s . '</td>
					<td><a href="#" id="' . $row["teacherid"] . '">' . $row["teachername"] . '</a></td>
					<td>' . $row["teacherstatus"] . '</td>
					
					<td>' . $row["date_time"] . '</td>
				</tr>
				';
			$s++;
		}
	}
    $shows .= '
            </tbody>
        </table>
    ';
    echo $shows;

}

//============================================ SHOW BY LIMIT
$shows = '';
if (isset($_POST["classChange"])) {
	

    $limmt = intVal($_POST["lmit"]);
    $viewStat = $_POST["classChange"];
    $s = 1;
    $msql = "SELECT * FROM teachers WHERE teacherstatus = '$viewStat' ORDER BY date_time DESC LIMIT $limmt";
    $selectResult = mysqli_query($con, $msql);
    $shows .= '
                <table class="table table-bordered table-responsive" style="background:#fff;">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
                
                    <th>Registration Date</th>
                </thead>
                <tbody>
        ';
    if(mysqli_num_rows($selectResult)<=0){
		$shows .= '
			<tr>
				<td colspan="4">
				<marquee><strong class="text-danger">NO TEACHER INFORMATION FOUND</strong></marquee>
				</td>
			</tr>
		';
	}else{
		while ($row = mysqli_fetch_array($selectResult)) {

			$shows .= '
				<tr>
					<td>' . $s . '</td>
					<td><a href="#" id="' . $row["teacherid"] . '">' . $row["teachername"] . '</a></td>
					<td>' . $row["teacherstatus"] . '</td>
					
					<td>' . $row["date_time"] . '</td>
				</tr>
				';
			$s++;
		}
	}
    $shows .= '
            </tbody>
        </table>
    ';
    echo $shows;

}

//============================================ SHOW BY SUBJECT
$showsBySubject = '';
if (isset($_POST["bySubject"])) {
	
    $limmtBySubject = intVal($_POST["llmt"]);
    $bySubject = $_POST["bySubject"];
    $bySubjectCount = 1;
    $msqlbySubject = "SELECT * FROM teachers WHERE majorsubject = '$bySubject' ORDER BY date_time DESC LIMIT $limmtBySubject";
    $selectResultbySubject = mysqli_query($con, $msqlbySubject);
    $showsBySubject .= '
                <table class="table table-bordered table-responsive" style="background:#fff;">
                <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Class</th>
					<th>Subject</th>
                    <th>Registration Date</th>
                </thead>
                <tbody>
        ';
    if(mysqli_num_rows($selectResultbySubject)<=0){
		$showsBySubject .= '
			<tr>
				<td colspan="5">
					<marquee><strong class="text-danger">NO TEACHER INFORMATION FOUND</strong></marquee>
				</td>
			</tr>
		';
	}else{
		while ($row = mysqli_fetch_array($selectResultbySubject)) {

			$showsBySubject .= '
				<tr>
					<td>' . $bySubjectCount . '</td>
					<td><a href="#" id="' . $row["teacherid"] . '">' . $row["teachername"] . '</a></td>
					<td>' . $row["teacherstatus"] . '</td>
					<td>' . $row["majorsubject"] . '</td>
					<td>' . $row["date_time"] . '</td>
				</tr>
				';
			$bySubjectCount++;
		}
	}
    $showsBySubject .= '
            </tbody>
        </table>
    ';
    echo $showsBySubject;

}

?>