<html>
<head><title>Surveys</title>
<link rel="stylesheet" href="messages.css">
<script>
function validateForm() {
  var a = document.forms["form"]["q1"].value;
  var b= document.forms["form"]["q2"].value;
  var c= document.forms["form"]["q3"].value;
  var d= document.forms["form"]["q4"].value;
  
  if (a == "" || b=="" || c=="" || d=="" ) {
    alert("please fill the missing area");
    return false;
  }
   else{
	   alert("Thanks for submitting your response");
  }
}
</script>
</head>
<body>
<h1 style=" color:#033955;">Product survey:</h1>
<form method="post" name="form" onsubmit="return validateForm()">
<label>Can you find all the products you want in our market?</label><br><br>
<input type="text" name="q1" placeholder="type your answer"><br><br>
<label>If there is a product that you can't find what is it?</label><br><br>
<input type="text" name="q2" placeholder="type your answer"><br><br>
<label>how can you rate the quality of our products from 1 to 10?</label><br><br>
<input type="text" name="q3" placeholder="type your answer"><br><br>
<label>please write to us about your experience with be3ly:</label><br><br>
<input type="text" name="q4" placeholder="type your answer"><br><br>
<input type="submit" value="submit response" name="Presponse" class="btn"><br><br>
</form>

</body>
</html>
<?php
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

if (isset($_POST['Presponse'])) {
	$q1=$_POST['q1'];
	$q2=$_POST['q2'];
	$q3=$_POST['q3'];
	$q4=$_POST['q4'];
   
    $query = "INSERT INTO _psurvey VALUES(NULL,'$q1','$q2','$q3','$q4')";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}
?>