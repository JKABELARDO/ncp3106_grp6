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


// Define variables and initialize with empty values
$studentnumber = "";
$studentnumber_err = "";

// Define variables for retrieved data
$lastname = $firstname = $middlename = $timein = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate student number
    $input_studentnumber = trim($_POST["studentnumber"]);
    if   (empty($input_studentnumber)) {
        $studentnumber_err = "Please enter a student number.";
    } elseif (!ctype_digit($input_studentnumber)) {
        $studentnumber_err = "Please enter a valid 11-digit student number.";
    } else {
        $studentnumber = $input_studentnumber;
    }

    // Check input errors before querying the database
    if (empty($studentnumber_err)) {
        // Prepare a select statement
        $sql = "SELECT lastname, firstname, middlename, timein FROM attendees WHERE studentnumber = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_studentnumber);

            // Set parameters
            $param_studentnumber = $studentnumber;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if student number exists
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($lastname, $firstname, $middlename, $timein);

                    // Fetch result
                    $stmt->fetch();
                } else {
                    $studentnumber_err = "Student number not found.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Register Student Now</h2>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>STUDENT NUMBER</label>
                            <input type="text" name="studentnumber" class="form-control <?php echo (!empty($studentnumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $studentnumber; ?>">
                            <span class="invalid-feedback"><?php echo $studentnumber_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </form>

                    <?php if (!empty($lastname)): ?>
                        <div class="form-group">
                            <label>LAST NAME</label>
                            <p><?php echo $lastname; ?></p>
                        </div>
                        <div class="form-group">
                            <label>FIRST NAME</label>
                            <p><?php echo $firstname; ?></p>
                        </div>
                        <div class="form-group">
                            <label>MIDDLE NAME</label>
                            <p><?php echo $middlename; ?></p>
                        </div>
                        <div class="form-group">
                            <label>TIME IN</label>
                            <p><?php echo $timein; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
