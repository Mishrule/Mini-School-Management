<?php
include('./dbCon.php');
$output = '';
if (isset($_POST["nameChange"])) {
	$name = $_POST["nameChange"];
	$sql = "SELECT * FROM studentregistration WHERE id='$name'";
	$result = mysqli_query($con, $sql);

	$output .= '
			<div align="center" class="card">
			<div class="card" style="width: 18rem;">
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
			
				
					<img src="img/image/' . $row["imagename"] . '" height="200px"  width="200px" style="border-radius: 30px;" class="card-img-top" alt="Student Image">
					<div class="card-body">
						<h5 class="card-title">' . $row["fullname"] . '</h5>
						
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><span></span>' . $row["class_form"] . '</li>
						<li class="list-group-item">' . $row["reg_date"] . '</li>
						<li class="list-group-item">' . $row["guardianname"] . '</li>
						<li class="list-group-item">' . $row["contact"] . '</li>
						<li class="list-group-item">' . $row["location"] . '</li>
						
					</ul>
					<div class="card-body">
						<a href="#" class="card-link btn btn-danger btn-md delete" id="' . $row["id"] . '" name="' . $row["id"] . '"  value="' . $row["id"] . '">
						DELETE STUDENT</a>

						<a href="#" class="card-link btn btn-primary btn-md edit" id="' . $row["id"] . '" name="' . $row["id"] . '" value="' . $row["fullname"] . '"  data-toggle="modal" data-target="#myModal">
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


if (isset($_POST["ClassChange"])) {
	$name = $_POST["ClassChange"];
	$sql = "SELECT * FROM studentregistration WHERE class_form='$name'";
	$result = mysqli_query($con, $sql);

	$output .= '
			 <label for="studentName">Select Student Name</label>
			 <select style="width:50%;" class="custom-select d-block my-3 form-control" id="studentName" name="studentName">
			 <option value="">Search Name...</option>
		';
	if ($num_row = mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$output .= '
					<option value = "' . $row["id"] . '"> ' . $row["fullname"] . '</option>
					
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

	$editsqli = "SELECT * FROM studentregistration WHERE id='$edit' ";
	$editresult = mysqli_query($con, $editsqli);
	while($editRow = mysqli_fetch_array($editresult)){
		$records['studentID'] = $editRow['id'];
		$records['studentName'] = $editRow['fullname'];
		$records['studentClass'] = $editRow['class_form'];
		$records['studentGuardian'] = $editRow['guardianname'];
		$records['studentContact'] = $editRow['contact'];
		$records['studentLocation'] = $editRow['location'];
	}
	echo json_encode($records);

}


if (isset($_POST["studentUpdateBTN"])) {
	$studentUpdateId = mysqli_real_escape_string($con, $_POST['studentUpdateId']);
	$studentUpdateName = mysqli_real_escape_string($con, $_POST['studentUpdateName']);
	$studentUpdateClass = mysqli_real_escape_string($con, $_POST['studentUpdateClass']);
	$studentUpdateGuardianName = mysqli_real_escape_string($con, $_POST['studentUpdateGuardianName']);
	$studentUpdateContact = mysqli_real_escape_string($con, $_POST['studentUpdateContact']);
	$studentUpdateLocation = mysqli_real_escape_string($con, $_POST['studentUpdateLocation']);


	$updatesqli = "UPDATE studentregistration SET fullname='$studentUpdateName', class_form='$studentUpdateClass' , guardianname='$studentUpdateGuardianName', contact='$studentUpdateContact', location='$studentUpdateLocation' WHERE id='$studentUpdateId'";
	$updateResult = mysqli_query($con, $updatesqli);
	if ($updateResult) {
		echo 'RECORDS UPDATED SUCCESSFULLY';
	} else {
		echo "OOPS SOMETHING WENT WRONG TRY AGAIN".mysqli_error($con);
	}

}

//======================================== DELETE STUDENT PROFILE ==========================================
if (isset($_POST["del"])) {
	$del = $_POST["del"];
	$sqll = "DELETE FROM studentregistration WHERE id='$del'";
	$delResult = mysqli_query($con, $sqll);
	if ($delResult) {
		echo "STUDENT RECORD DELETED SUCCESSFULLY";
	} else {
		echo "OOPS SOMETHING WENT WRONG TRY AGAIN ".mysqli_error($con);
	}
}
