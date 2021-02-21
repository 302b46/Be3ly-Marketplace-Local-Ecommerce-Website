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
    $query = "INSERT INTO _messages VALUES(NULL,".$_SESSION['id'].", $user, '$message',NUll)";
    if(!$conn->query($query)){
        echo $conn->error;
    }
}
if(isset($_POST['upload']))
{
	$user = $_POST["user"];
    $file=$_FILES['image']['name'];
    $f_type=$_FILES['image']['type'];
    
    if ($f_type== "image/JFIF" OR $f_type== "image/png" OR $f_type== "image/jpeg" OR $f_type== "image/JPEG" OR $f_type== "image/PNG" OR $f_type== "image/jfif" )
{
    $query= "INSERT INTO _messages VALUES(NULL,".$_SESSION['id'].",$user,NULL,'$file')";
    if(!$conn->query($query)){
        echo $conn->error;
    }
        move_uploaded_file($_FILES['image']['tmp_name'],"images/".$file);
	
    
}
    else {
         echo"Image Type must be JFIF or PNG or JPEG";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
	<link rel="stylesheet" href="messages.css">

</head>
<body>
<a href="surveysInbox.php">see your surveys' inbox :)</a>
<h1 style="text-align:center; color:#033955;">Contact us :)</h1>
    <form method="GET">
      <input type="text" name="q" placeholder="Type the admin's name here">&nbsp;<button class="btn" type="submit">Search admins</button><br><br>
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
		<form method="POST" enctype="multipart/form-data">
  	<div>
  	  <input type="file" name="image" class="btnUpload">
  	  <input type="submit" name="upload"  value="send image" class="btnSend">
	  <input type="hidden" name="user" value="<?php echo $_GET['u']?>">
  	</div>  
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
            echo "<h2 style="."color:#033955;>"."No admins found</h2>";
        }
		else{
		echo"choose from the admins:";
		echo"<br><br>";
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