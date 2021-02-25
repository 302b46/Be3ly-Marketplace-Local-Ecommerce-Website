<?php
//session_start();
  include "../database-connection.php";
 if (isset($_POST['submit']) && $_POST['submit']="submit" ){
     //if (isset($_POST['code']) && $_POST['code']!=""){ 
      $code = $_POST['code']; 
     $category=$_POST['category'];
     $result = mysqli_query($conn,"SELECT * FROM `product` WHERE `id`='$code' AND `category`='$category' ");
     $row = mysqli_fetch_assoc($result); 
      $name = $row['name'];
     // $code = $row['id']; 
      $price = $row['price'];
      $image = $row['image'];
      $description = $row['description']; 
    
      //$id=$row['id'];
 $sql = "SELECT * FROM cart where cart_id='$code'AND `category`='$category' AND username='{$_SESSION["Username"]}' ";
 $result = $conn->query($sql); 
 if ($result->num_rows==0) { 
  //we add the product
 $sql ="INSERT into cart (`cart_id`,`username`,`name`,`image`,`price`,`description`,`quantity`,`totalPrice`,`category`)
 VALUES('$code','{$_SESSION["Username"]}','$name','$image','$price','$description',1,'$price',$category)";
 $conn->query($sql); 
   //header("location: cart.php");
    }
     else{
          //product is already added 
          header("location: ../cart/cart.php");
          } 
       
 } 
?> 

