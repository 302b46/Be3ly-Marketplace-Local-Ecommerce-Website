<?php
session_start();
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

if(!isset($_SESSION['id'])){
    header('Location:./login.php');
}
if (isset($_POST['text'])) {
    $message = $_POST["text"];
    $user = $_POST["user"];
    $query = "INSERT INTO _messages VALUES(NULL,".$_SESSION['id'].", $user, '$message',NULL)";
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
    <title>Customers messages</title>
	<link rel="stylesheet" href="messages.css">
</head>
<body>
<h1 style="text-align:center; color:#033955;">Customers messages</h1>
    <form method="GET">
        <input type="text" name="q" placeholder="Type the customer's name">&nbsp;<button type="submit" class="btn">Search availabe customers</button><br><br>
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
            <br>
			<?php
			if ($row['message'] !=""){
             echo"<p>". $row['message']. "</p>";
			 echo"<br>";
			}
			else {
			//echo"<img src='images/ ".$row['image']." ' style='width:600px; height:400px;'>";
			
			echo "<img src='images/".$row['image']."' width='400' height='200' >";
			echo "<br>";
 
             
			}
			
			?>

        <?php
            }
        ?>
        <br>
        <br>
        <form method="POST">
           
					<textarea name="text" rows="4" cols="50">Enter message here...</textarea><br><button class="btnSend" type="submit">Send</button><br><br>
            <input type="hidden" name="user" value="<?php echo $_GET['u']?>">
        </form>
    <?php
    } else {
         $users_query = "SELECT * FROM user WHERE UserType=4";
        if (isset($_GET['q'])) {
            $users_query = "SELECT * FROM user WHERE Name LIKE '%" . $_GET['q'] . "%' AND UserType=4" ;

        }
        $users = $conn->query($users_query);
    ?>
        
        <?php
        if ($users->num_rows == 0) {
            echo "<h2>No customers found</h2>";
        }
		else{
		echo"choose from the customers:";
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