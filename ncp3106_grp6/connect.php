<?php
// Add the missing import statement
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'test';

// Check if the required fields are set
if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['middleName']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['studNumber']) && isset($_POST['program']) && isset($_POST['currentYear']) && isset($_POST['studAge']) && isset($_POST['contactNumber'])) {
	$lastName = $_POST['lastName'];
	$firstName = $_POST['firstName'];
	$middleName = $_POST['middleName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$studNumber = $_POST['studNumber'];
	$program = $_POST['program'];
	$currentYear = $_POST['currentYear'];
	$studAge = $_POST['studAge'];
	$contactNumber = $_POST['contactNumber'];

	// Basic validation to ensure a valid date is provided

	// Database connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if ($conn->connect_error) {
		echo "$conn->connect_error";
		die("Connection Failed : " . $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO add_student(lastName, firstName, middleName, gender, email, studNumber, program, currentYear, studAge, contactNumber) 
								VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssisiis", $lastName, $firstName, $middleName, $gender, $email, $studNumber, $program, $currentYear, $studAge, $contactNumber);
		$execval = $stmt->execute();

		if ($execval) {
			// Display success message
			echo "Registered successfully!";

			// Redirect to mainMenu.html
			header("Location: mainMenu.html");
			exit();
		} else {
			// Display an error message if needed
			echo "Error during registration...";
		}

		$stmt->close();
		$conn->close();
	}
} else {
	// Display an error message if any required field is missing
	echo "Error: Required field(s) are missing.";
}
?>
