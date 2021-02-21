<?php
session_start();
$_host = "localhost";
$_username = "root";
$_password = "";
$_db = "marketplace";
$conn = mysqli_connect($_host, $_username, $_password, $_db);

$msg = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE Name='$username' AND Password='$password'";
	
    if($data = $conn->query($query)){
        if($data->num_rows > 0 ){
            $_SESSION['id'] = $data->fetch_assoc()['id'];
			
			    $user_query = "SELECT UserType FROM user WHERE Name='$username' AND Password='$password'" ;
                $user_info = $conn->query($user_query);
                $user_data = $user_info->fetch_assoc();
			
			if ($user_data['UserType']==1){
				header('Location:./adminInbox.php');
				 
			}
			elseif ($user_data['UserType']==2){
				header('Location:./auditor.php');
				 
			}
			elseif ($user_data['UserType']==3){
				header('Location:./hr.php');
				 
			}
			else{
				header('Location:./contactUs.php');
				 
            }
        }else{
            $msg = "username or password are incorrect";
        }
    }else{
        $conn->error;
    }
}
?>

<p style="color:red"><?php echo $msg?></p>
<form method="POST">
    <h1>Log In</h1>
    <input type="text" name="username" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" value="Log In" name="submit">
</form>