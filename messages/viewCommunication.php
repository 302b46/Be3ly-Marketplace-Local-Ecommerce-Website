<html>
<head><title>Communication</title>
<link rel="stylesheet" href="messages.css">
</head>
<body>
<h1 style="text-align:center; color:#033955;">Admins communication with the customers</h1>
<script>
function func(){
	alert("Investigation request is sent successfully");
	
}
</script>
<?php

$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);


if (isset($_POST['text'])) {
    $comment = $_POST["text"];
    $user = $_POST["user"];
    $query = "INSERT INTO _auditor VALUES($user, null,'$comment')";
	
    if(!$conn->query($query)){
        echo $conn->error;
    }
	
	
	
}

if (isset($_POST['request'])) {
    $statement = $_POST["request"];
    $user = $_POST["user"];
    $query = "INSERT INTO _requests VALUES(null,$user,'$statement')";
	
    if(!$conn->query($query)){
        echo $conn->error;
    }
	
	
	
}
?>

    <form method="GET">
	    <input type="text" name="q" placeholder="Type the admins's name">&nbsp;<button type="submit" class="btn">Search availabe admins</button><br><br>
        
    </form>
    <?php
    if (isset($_GET['u'])) {
		
		$query = "SELECT * FROM user WHERE id=" . $_GET['u'];
        if ($name = $conn->query($query))
            while ($row = $name->fetch_assoc()) {
				echo "<h3 style='color:#033955;'>". $row['Name'] ."'s chat</h3>";
			}
		

        $messages_query = "SELECT * FROM _messages WHERE ( receivedBy=" . $_GET['u'] . ") OR ( sentBy=" . $_GET['u'] . ") ORDER BY messageID ASC";
        if ($messages = $conn->query($messages_query))
            while ($row = $messages->fetch_assoc()) {
                $user_query = "SELECT * FROM user WHERE id=" . $row['sentBy'];
                $user_info = $conn->query($user_query);
                $user_data = $user_info->fetch_assoc();
    ?>
	
	<br>
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
		
			
 <?php
  $auditor_query = "SELECT * FROM _auditor";
 $user=$_GET['u'];
        $auditor = $conn->query($auditor_query);
 
        if ($auditor->num_rows != 0) {
            
			 $auditor_query = "SELECT auditorComment FROM _auditor WHERE adminID=$user";
			         $auditor = $conn->query($auditor_query);
			 while ($row = $auditor->fetch_assoc()) {
				 echo"Auditor comment::" . $row['auditorComment']."<br>";
           
        }
		}
        ?>
            
		<br>
        <br>
        <form method="POST">
            <input type="text" name="text" placeholder="type your comment">&nbsp<button type="submit" class="btn">comment on this admin</button>
            <input type="hidden" name="user" value="<?php echo $_GET['u']?>">
        </form>
		<form method="POST">
            <input type="text" name="request" placeholder="type your request">
			<button type="submit"  class="btn"onclick="func();">send investigation request to the HR</button>
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