<?php
    include 'menuBar.php';
    include 'footer.php';

    $servername = "localhost";
    $username = "id20608079_hmotawea";
    $password = "Admin3-SFH";
    $dbname = "id20608079_adminadd";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>
<div class="container">
            Come Experience<br>Canada
</div>
<?php
    // Retrieve data from table
    $sql = "SELECT * FROM addAdventure";
    $result = $conn->query($sql);

    // Check if any rows are returned
    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
?>
<body>
<main class="allAdventures">
  <h2>Adventure Number <?php echo $row["id"]?></h2>
  <h3>Heading:</h3>
  <p><?php echo $row["heading"]?></p>
  <h3>Trip Date:</h3>
  <p><?php echo $row["tripDate"]?></p>
  <h3>Duration (in Days):</h3>
  <p><?php echo $row["duration"]?></p>
  <h3>Summary:</h3>
  <p><?php echo $row["summary"]?></p>
      </main>
      </body>


<?php
        }
    } else {
      echo "No results found.";
    }

    // Close connection
    $conn->close();
?>