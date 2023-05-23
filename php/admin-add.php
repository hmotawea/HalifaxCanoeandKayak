
<?php
// define variables and set to empty values
$heading = $tripDate = $duration = $summary = "";
$headingErr = $tripDateErr = $durationErr = $summaryErr = "";
$servername = "localhost";
$username = "id20608079_hmotawea";
$password = "Admin3-SFH";
$dbname = "id20608079_adminadd";

// create a function to sanitize user input
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

// check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 // validate Heading
 if (empty($_POST["heading"])) {
 $headingErr = "Heading is required";
 } else {
 $heading = test_input($_POST["heading"]);
 // check if Heading only contains letters and whitespace
 if (!preg_match("/^[a-zA-Z ]*$/",$heading)) {
 $headingErr = "Only letters and white space allowed";
 }
 }

 // Validate and sanitize date input
 if (empty($_POST["date"])) {
  $tripDateError = "Date is required";
} else {
  $tripDate = test_input($_POST["date"]);
}

 // validate Duration
 if (empty($_POST["duration"])) {
 $durationErr = "duration is required";
 } else {
 $duration = test_input($_POST["duration"]);
 // check if Duration is a positive integer
 if (!filter_var($duration, FILTER_VALIDATE_INT) || $duration <= 0) {
 $durationErr = "Invalid Duration";
 }
 }

 // validate summary
 if (empty($_POST["summary"])) {
 $summaryErr = "Summary is required";
 } else {
 $summary = test_input($_POST["summary"]);
 // check if summary is not too long
 if (strlen($summary) > 500) {
 $summaryErr = "Summary is too long";
 }
 }

 // connect to sql database if no errors
 if ($headingErr == "" && $tripDateErr == "" && $durationErr == "" && $summaryErr == "") {
 // create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 // prepare and bind statement
 $stmt = $conn->prepare("INSERT INTO addAdventure (heading, tripDate, duration, summary) VALUES (?, ?, ?, ?)");
 $stmt->bind_param("ssis", $heading, $tripDate, $duration, $summary);
 // execute statement
 if ($stmt->execute()) {
  echo "<script>window.location.href='admin-confirm.php'</script>";
  //echo "New record created successfully";
 } else {
 echo "Error: " . $stmt->error;
 }
 // close statement and connection
 $stmt->close();
 $conn->close();
 }
}

include 'menuBar.php';
include 'footer.php';
?>

<!-- create a html form -->
<html>
<head>
<style>
  h1 {
    margin-top: 50px;
    text-align: center ;
  }
  .error {color: #FF0000;}
  .rField {
    margin-top: 50px;
    margin-left: 50px;
    font-size: 25px;
  }
  form {
    margin-left: 100px;
    font-size: 20px;
  }
  label {
    display: inline-block;
    width: 150px;
    text-align: left;    
  }
  input[type="text"], input[type="number"], input[type="date"] {
    display: inline-block;
    width: 200px;
    margin-left: 10px;
    font-size: 20px;
  }
  input[type="submit"] {
    font-size: 20px;
  }
</style>
</head>
<body>
<h1>Admin - Add Adventures</h1>
<hr>

<p class="rField">Input details about the trip:<br><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Heading: <input type="text" name="heading" value="<?php echo $heading;?>">
  <span class="error">* <?php echo $headingErr;?></span>
  <br><br>
  Trip Date: <input type="date" name="date"  placeholder="dd/mmm/yyyy" value="<?php echo $tripDate;?>">
  <span class="error">* <?php echo $tripDateErr;?></span>
  <br><br>
  Duration: <input type="number" name="duration" value="<?php echo $duration;?>">
  <span class="error">* <?php echo $durationErr;?></span>
  <br><br>
  Summary: <textarea name="summary" rows="5" cols="40"><?php echo $summary;?></textarea>
  <span class="error">* <?php echo $summaryErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>