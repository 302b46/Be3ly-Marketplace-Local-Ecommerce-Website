<html>
<head><title>Surveys' inbox</title></head>

<body>
<h1>Take our surveys :)<h1>
<?php
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

$survey_query = "SELECT * FROM _surveys WHERE send=1";
if ($survey = $conn->query($survey_query))
	//ob_start();
            while ($row = $survey->fetch_assoc()) {
				
				echo "Please answer the following survey honstly"."<br>";
				echo "<a href='".$row['surveyName']."'>take Survey here</a><br>";
			
				}
//ob_end_clean();
?>
</body>
</html>