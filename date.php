<?php

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Retrieve the eventDate from the form
$eventDate = $_POST['eventDate'];
$eventStart = $_POST['eventStart'];
$eventEnd = $_POST['eventEnd'];


// Prepare and execute SQL query
$sql = "INSERT INTO add_event(eventDate, eventStart, eventEnd) VALUES (?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $eventDate, $eventStart, $eventEnd);
$stmt->execute();

// Check for success
if ($stmt->affected_rows > 0) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
} 

// Close statement and connection
$stmt->close();
$mysqli->close();
?>
