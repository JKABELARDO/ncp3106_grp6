<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'test';
	$eventName = $_POST['eventName'];
    $eventDescription = $_POST['eventDescription'];
    $eventType = $_POST['eventType'];
	$dateEvent = $_POST['dateEvent'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
    $registrationFee = $_POST['registrationFee'];
    $venue = $_POST['venue'];
    $officerIncharge = $_POST['officerIncharge'];

	// Database connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO add_event (eventName, eventDescription, eventType, dateEvent, startTime, endTime, registrationFee, venue, officerIncharge) 
		VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiiiiss",$eventName, $eventDescription, $eventType, $dateEvent, $startTime, $endTime, $registrationFee, $venue, $officerIncharge);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>