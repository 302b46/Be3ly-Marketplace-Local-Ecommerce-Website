
<?php


session_start();
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
			
			$sql = "SELECT * FROM _requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<h1 id='h1'>Investigation Requests</h1>";
  echo "<table id=1><tr><th>Request ID</th><th>Admin name</th><th>Request statement</th></tr>";
  
  while($row = $result->fetch_assoc()) {
	  $admin_query = "SELECT Name FROM user WHERE id=" . $row['adminID'];
                $user_info = $conn->query($admin_query);
                $user_data = $user_info->fetch_assoc();
	  
    echo "<tr><td>".$row["requestID"]."</td><td><a href='#'>". $user_data["Name"]."</a></td><td>".$row["requestStatement"]."</td></tr>";
  
  
  }
  
 
  echo "</table>";
  echo"<br>";
} else {
  echo "0 results";
}



//$conn->close();


?>




<?php


if(!isset($_SESSION['id'])){
    header('Location:./login.php');
}
if (isset($_POST['text'])) {
    $message = $_POST["text"];
    $user = $_POST["user"];
    $query = "INSERT INTO _messages VALUES(NULL,".$_SESSION['id'].", $user, '$message')";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HR</title>
 <style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid blue;
        border-collapse: collapse;
      }
	  h1{
		  color:#033955;
	  }
    </style>
	<link rel="stylesheet" href="messages.css">
</head>
<body>
<!--<h1 style="text-align:center">Contact us :)</h1>-->
    <form method="GET">
        <input type="text" name="q" placeholder="type the admin's name">&nbsp <button type="submit" class="btn">Search available admins</button>
    </form>
    <?php
    if (isset($_GET['u'])) {
		
		$query = "SELECT * FROM user WHERE id=" . $_GET['u'];
        if ($name = $conn->query($query))
            while ($row = $name->fetch_assoc()) {
				echo "<h3 style='color:#033955;'>". $row['Name'] ."'s chat</h3>";
			}

        $messages_query = "SELECT * FROM _messages WHERE (sentBy=" . $_SESSION['id'] . " AND receivedBy=" . $_GET['u'] . ") OR (receivedBy=" . $_SESSION['id']  . " AND sentBy=" . $_GET['u'] . ") ORDER BY messageID ASC";
        if ($messages = $conn->query($messages_query))
            while ($row = $messages->fetch_assoc()) {
                $user_query = "SELECT * FROM user WHERE id=" . $row['sentBy'];
                $user_info = $conn->query($user_query);
                $user_data = $user_info->fetch_assoc();
    ?>
            <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" width="40px"><b><?php echo $user_data['Name']; ?></b>
            <p><?php echo $row['message']; ?></p>

        <?php
            }
        ?>
        <br>
        <br>
        <form method="POST">
            <input type="text" name="text" placeholder="Type your message">&nbsp <button type="submit" class="btn">Send Penalty</button>
            <input type="hidden" name="user" value="<?php echo $_GET['u']?>">
        </form>
    <?php
    } else {
       $users_query = "SELECT * FROM user WHERE UserType=1";
        if (isset($_GET['q'])) {
            $users_query = "SELECT * FROM user WHERE Name LIKE '%" . $_GET['q'] . "%' AND UserType=1" ;

        }
        $users = $conn->query($users_query);
    ?>
        
        <?php
        if ($users->num_rows == 0) {
            echo "<h2>No admins found</h2>";
        }
		else{
		echo"choose from the admins:";
		echo"<br>";
		}
        while ($row = $users->fetch_assoc()) {
           
        ?>
		
            <a href="?u=<?php echo $row['id']; ?>"><img width="50px" src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png"><b><?php echo $row['Name']; ?></b></a><br>
    <?php
        }
    }

    ?>
	</body>
	</html>
