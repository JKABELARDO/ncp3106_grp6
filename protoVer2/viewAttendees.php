<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendees</title>
    <style>
        /* Paste the provided CSS here */
    </style>
</head>
<body>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <div class="header">View Attendees</div>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Student Number</th>
                    <th>Time In</th>
                    <th>Event Attended</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Fetch data from the database
                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                if ($conn->connect_error) {
                    die("Connection Failed: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT add_student.lastName, add_student.firstName, add_student.studentNumber, attendees.timeIn, add_event.eventName
                                        FROM attendees
                                        INNER JOIN add_event ON attendees.eventID = add_event.eventID
                                        INNER JOIN add_student ON attendees.studentID = add_student.studentID");

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['lastName'] . "</td>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['studentNumber'] . "</td>
                            <td>" . $row['timeIn'] . "</td>
                            <td>" . $row['eventName'] . "</td>
                          </tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
