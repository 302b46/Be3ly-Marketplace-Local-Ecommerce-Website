<?php
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['sendPS'])) {
   
    $query = "INSERT INTO _surveys VALUES(NULL,'productsSurvey.php',1)";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}

if (isset($_POST['sendSS'])) {
   
    $query = "INSERT INTO _surveys VALUES(NULL,'serviceSurvey.php',1)";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}
?>
<html>
<head>
<title>Surveys</title>
<style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid blue;
        border-collapse: collapse;
      }
    </style>
	<link rel="stylesheet" href="messages.css">
	<script>
	function funcP(){
	alert("Product survey sent to the customers");
	
}
function funcS(){
	alert("Service survey sent to the customers");
	
}
</script>
</head>
<body>
<h1 style=" color:#033955;">Surveys</h1>
<form method="post">
<label>Click on the surveys to view them:</label><br><br>
<a href="productsSurvey.php">Products survey</a><br><br>
<input type="submit" name="sendPS" class="btn"  value="Send the product survey to the customers" onclick="funcP()"><br><br>
<a href="serviceSurvey.php">Service survey</a><br><br>
<input type="submit" name="sendSS" class="btn" value="Send the service survey to the customers" onclick="funcS()"><br><br>
</form>
<h2 style=" color:#033955;">Products survey responses:</h2>
<?php

$sql = "SELECT * FROM _psurvey";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//echo "<h2>Products survey responses:</h2>";
  echo "<table id=1><tr><th>Response ID</th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th></tr>";
  
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["responseID"]."</td><td>". $row["q1"]."</td><td>".$row["q2"]."</td><td>".$row["q3"]."</td><td>".$row["q4"]."</td></tr>";
  }
  echo "</table>";
  echo"<br>";
}else {
  echo "0 results";
}
?>

<h2 style=" color:#033955;">Survice survey responses:</h2>
<?php

$sql = "SELECT * FROM _ssurvey";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//echo "<h2>Products survey responses:</h2>";
  echo "<table id=1><tr><th>Response ID</th><th>Q1</th><th>Q2</th><th>Q3</th><th>Q4</th></tr>";
  
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["responseID"]."</td><td>". $row["q1"]."</td><td>".$row["q2"]."</td><td>".$row["q3"]."</td><td>".$row["q4"]."</td></tr>";
  }
  echo "</table>";
  echo"<br>";
}else {
  echo "0 results";
}
?>


</body>
</html>