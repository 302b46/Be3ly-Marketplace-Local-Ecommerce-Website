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
<h1 style="color:#033955;">Service survey:</h1>
<form method="post" name="form" onsubmit="return validateForm()">
<label>Can reach the admins easily through messaging and chating?</label><br><br>
<input type="text" name="q1" placeholder="type your answer"><br><br>
<label>Admins respond to you quickly?</label><br><br>
<input type="text" name="q2" placeholder="type your answer"><br><br>
<label>Admins are helpfull and kind?</label><br><br>
<input type="text"name="q3" placeholder="type your answer"><br><br>
<label>Do you like to suggest any other way of communication? what is it?</label><br><br>
<input type="text"name="q4" placeholder="type your answer"><br><br>
<input type="submit" value="submit response" name="Sresponse" class="btn"><br><br>
</form>
</body>
</html>
<?php
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

if (isset($_POST['Sresponse'])) {
	$q1=$_POST['q1'];
	$q2=$_POST['q2'];
	$q3=$_POST['q3'];
	$q4=$_POST['q4'];
   
    $query = "INSERT INTO _ssurvey VALUES(NULL,'$q1','$q2','$q3','$q4')";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}

?>