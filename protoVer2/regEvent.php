<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/manevent_styles.css">
</head>
<body>

<div class="logo">
      <img src="assets/images/logo.png" alt="Logo" style="width: 150px; height: 150px;">
    </div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedEvent = $_POST["chooseEvent"];

    // Establish database connection
    $con = mysqli_connect("localhost", "root", "", "test");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to retrieve event details
    $query = "SELECT * FROM add_event WHERE eventName='$selectedEvent'";
    $query_run = mysqli_query($con, $query);

    // Check if the query was successful
    if ($query_run) {
        // Check if any rows were returned
        if (mysqli_num_rows($query_run) > 0) {
            $eventDetails = mysqli_fetch_assoc($query_run);

            // Display event details
            ?>
            <div class="container">
       
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1 class="header">Register Student Here!</h1>
          </div>
          <div class="panel-body">
                <div class="form-group mb-3">
                    <label for="">Event Name</label>
                    <input type="text" value="<?= $eventDetails['eventName']; ?>" class="form-control" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="">Event Description</label>
                    <input type="text" value="<?= $eventDetails['eventDescription']; ?>" class="form-control" readonly>
                </div>

                </div>
            
            <?php
        } else {
            echo "<p>No Record Found</p>";
        }
    } else {
        echo "<p>Error in query: " . mysqli_error($con) . "</p>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>
  
  <br>
                <div class="form-group">
                    <div class="form-group text-center">
                        <h1 class="headerTitle">Enter Student Number</h1>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" name="studNumber" value="<?php if(isset($_GET['studNumber'])){echo $_GET['studNumber'];} ?>" class="form-control">
                                </div>
                                 
                                <div class="buttons">
              <input type="submit" class="btn btn-primary" />
            </div>
            </form>
</div>
              <div class="buttons">
              <a href="mainMenu.html">
                <button class="button">Back</button>
              </a>
            </div>
                       
                                
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","test");

                                    if (isset($_GET['studNumber'])) {
                                        $studNumber = $_GET['studNumber'];

                                        $query = "SELECT * FROM add_student WHERE studNumber='$studNumber' ";
                                        $query_run = mysqli_query($con, $query);

                                        if (mysqli_num_rows($query_run) > 0) {
                                            echo '<div class="alert alert-success" role="alert">Registered Successfully</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Error: Student Number not found</div>';
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
              

            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
