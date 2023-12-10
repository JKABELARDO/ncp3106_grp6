<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="assets/styles/manevent_styles.css">
</head>
<body>
<div class="logo">
      <img src="assets/images/logo.png" alt="Logo" style="width: 150px; height: 150px;">
    </div>
     
<div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1 class="header">Manage Event</h1>
          </div>
          <div class="panel-body">
    <form action="regEvent.php" method="POST">
        <div class="form-group">
            <label for="chooseEvent" class="numberTitle">Choose Event to Manage:</label>
            <select name="chooseEvent" id="chooseEvent" class="form-control" required>
                <!-- PHP code to dynamically populate the dropdown with events from the database -->
                <?php
                $conn = new mysqli('localhost', 'root', '', 'test');
                $result = $conn->query("SELECT eventName FROM add_event");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['eventName'] . "'>" . $row['eventName'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="buttons">
            <button type="submit" class="button" name="regEvent">Manage Event</button>
            
        
    </form>
    
    </div>
    <div class="buttons">
    <a href="attendees.php">
                <button class="button">Total Attendees</button>
              </a>
              </div>
    <div class="buttons">
              

              <a href="mainMenu.html">
                <button class="button">Back</button>
              </a>
            </div>

    
</div>

</body>
</html>
