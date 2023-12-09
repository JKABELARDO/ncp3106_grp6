<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'test';
	$lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$studNumber = $_POST['studNumber'];
    $program = $_POST['program'];
    $currentYear = $_POST['currentYear'];
    $birthdayTime = $_POST['birthdayTime'];
	$contactNumber = $_POST['contactNumber'];

	// Database connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO add_student(lastName, firstName, middleName, gender, email, studNumber, program, currentYear, birthdayTime, contactNumber) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssisiis", $lastName, $firstName, $middleName, $gender, $email, $studNumber, $program,  $currentYear, $birthdayTime, $contactNumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>