<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'demo';
	$eventName = $_POST['eventName'];
    $eventDescription = $_POST['eventDescription'];
    $eventType = $_POST['eventType'];		
	$eventDate = $_POST['eventDate'];
	$eventStart = $_POST['eventStart'];
	$eventEnd = $_POST['eventEnd'];
    $registrationFee = $_POST['registrationFee'];
    $venue = $_POST['venue'];
    $officerIncharge = $_POST['officerIncharge'];

	// Database connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO add_event(eventName, eventDescription, eventType, eventDate, eventStart, eventEnd, registrationFee, venue, officerIncharge) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssiss",$eventName, $eventDescription, $eventType, $eventDate, $eventStart, $eventEnd, $registrationFee, $venue, $officerIncharge);
		$execval = $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        } 

		$stmt->close();
		$conn->close();	
	}

?>