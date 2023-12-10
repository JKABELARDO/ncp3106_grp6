<?php
if (isset($_POST['manageEvent'])) {
    $selectedEvent = $_POST['selectedEvent'];

    // Add your logic to manage the selected event here

    // For example, you can update the event status or perform any other actions

    // Update attendees table with student registration for the selected event
    if (isset($_POST['uname'])) {
        $studentNumber = $_POST['uname'];

        // Check if the student number exists in the add_student table
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        // Get the studentID and other necessary columns from add_student table
        $stmt = $conn->prepare("SELECT studentID, lastName, firstName FROM add_student WHERE studentNumber = ?");
        $stmt->bind_param("s", $studentNumber);
        $stmt->execute();
        $stmt->bind_result($studentID, $lastName, $firstName);
        $stmt->fetch();
        $stmt->close();

        if ($studentID) {
            // Student exists, proceed to update attendees table

            // Get the event ID for the selected event
            $eventResult = $conn->query("SELECT eventID FROM add_event WHERE eventName = '$selectedEvent'");
            $eventRow = $eventResult->fetch_assoc();
            $eventID = $eventRow['eventID'];

            // Insert or update the record in the attendees table
            $stmt = $conn->prepare("INSERT INTO attendees (studentID, eventID) VALUES (?, ?) ON DUPLICATE KEY UPDATE eventID = ?");
            $stmt->bind_param("iii", $studentID, $eventID, $eventID);

            if ($stmt->execute()) {
                // Successfully registered student for the event
                header("Location: registerStudentNow.html"); // Redirect to the registration page
                exit();
            } else {
                // Handle the error
                echo "Error updating attendees table: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Student does not exist, handle accordingly
            echo "Student with the provided number does not exist.";
        }

        $conn->close();
    }
}
?>
