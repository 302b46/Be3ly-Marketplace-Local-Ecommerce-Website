<?php
//session_start();
include "../database-connection.php";
 $username="";
//$status="";
$code="";
$qanti="";
$add="";
$qantiProduct="";
$username="";
//$username=$_SESSION["username"];
 $category='';
/*************************REMOVE BUTTON*********************/
if (isset($_POST['action']) && $_POST['action']=="remove"){
    $code=$_POST["code"];
    // $category=$_POST['category'];
    $category=$_POST["category"];
 //$qantiRemove= $_SESSION["Qanti"];
 //$qantiRemove=$_POST["quantity"];
    
    $_SESSION["shopping_cart"]=$code;
    
       $sq ="DELETE FROM cart WHERE cart_id='$code' AND  category='$category' AND username='{$_SESSION["Username"]}'  ";
        
        if ($conn->query($sq) === TRUE) {
            echo '<script>alert("Record removed successfully")</script>'; 
        } else
        {
            echo '<script>alert("Record is not removed, try again")</script>'; 
        }
          

}
/*************************ADD BUTTON*********************/
if (isset($_POST['action']) && $_POST['action']=="add"){
     $code=$_POST["code"];
     $category=$_POST['category'];
   // $_SESSION["shopping_cart"]=$code;
      $qanti=$_POST["quantity"];
    $result = mysqli_query($conn,"SELECT  quantity  FROM `product` WHERE `id`='$code' AND category='$category' ");
$row = mysqli_fetch_assoc($result);
$qantiProduct = $row['quantity'];
if( $qanti<$qantiProduct)
{     
     $qanti=$_POST["quantity"]+1;
$sql = "UPDATE cart SET quantity='$qanti' WHERE cart_id='$code'  AND category='$category'  AND username='{$_SESSION["Username"]}'";
    if ($conn->query($sql) !== TRUE) {
  //echo "Error updating record: " . $conn->error;
        echo '<script>alert("Product is not added, try again")</script>';
} 
    
}
    if( $qanti==$qantiProduct){
        $qanti=$_POST["quantity"];
    }
}

/*************************SUB BUTTON*********************/

if (isset($_POST['action']) && $_POST['action']=="sub"){
    $_SESSION["Qanti"]=$_POST["quantity"];
     $code=$_POST["code"];
     $category=$_POST['category'];
    $qanti=$_POST["quantity"]-1;
  if($qanti==0)
  {
      $sq ="DELETE FROM cart WHERE cart_id='$code' AND AND category='$category' username='{$_SESSION["Username"]}'";
        
       // $res=mysql_query($sq,$conn);
        if ($conn->query($sq) === TRUE) {
echo '<script>alert("Record removed successfully")</script>'; 
} else {
       //echo "Error deleting record: " . $conn->error;
            echo '<script>alert("Record is not removed successfully")</script>'; }
   }else{
    
    
    $sql = "UPDATE cart SET quantity='$qanti' WHERE cart_id='$code'AND category='$category'   AND username='{$_SESSION["Username"]}'";

if ($conn->query($sql) !== TRUE) {
   //echo "Error updating record: " . $conn->error;}
    echo '<script>alert("Record is not removed successfully")</script>'; 
                       } 
           }
}
?>
<html>
<head>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2 style="color:green; text-align:center;">Be3ly Shopping Cart</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
//$cart_count = count(array_keys($_SESSION["shopping_cart"]));
     /*$sql ="SELECT count(id) AS mycount FROM  cart WHERE id='$code'";
        mysql_guery($sql);
         $cart_count=mycount;*/
    
   /* $cart_count= 0;
$query = mysqli_query($conn,"SELECT * FROM cart WHERE id='$code'");
foreach($query as $row){
 $cart_coun++;
}
    */
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> </a>
<!--span><php echo $cart_count; ?></span></a-->
</div>
<?php
}
?>

    <?php
    $sql ="SELECT * FROM cart where username='{$_SESSION["Username"]}'";
	 $result=mysqli_query($conn,$sql);
  $rowcount=mysqli_num_rows($result);
	$cart_count =$rowcount;
    
    if($rowcount!=0){
    ?>
<div class="cart">
  <table class="table">
<tbody>
<tr>
     <td> </td>
<td>ITEM NAME</td>
<td></td>  <td> </td>   
<td>DESCRIPTION</td>
      <td></td>   <td></td> 
<td>QUANTITY</td>
    <td></td>    <td></td> 

<td>UNIT PRICE</td>
    <td></td>
<td>ITEMS TOTAL</td>
    <td></td>
<td>REMOVE ITEM</td>
</tr>	
  
    
  <tr>  <?php
      $total_price = 0;
    $resul = mysqli_query($conn,"SELECT * FROM `cart` WHERE username='{$_SESSION["Username"]}'");
    //if(mysqli_num_rows($resul>0)){
        while($row=mysqli_fetch_assoc($resul)){
            //echo " name: " .$row["name"]. " price: " .$row["price"].  "<br>";
                 //.$row["image"]. 
    ?>
<td><img src='<?php echo $row["image"]; ?>' width="90" height="90" /></td>
  
    
<td><?php echo $row["name"]; ?></td>
      <td></td> <td> </td>
<td><?php echo $row["description"]; ?></td>
        <td></td>   <td></td> 
      <td>
<form method='post' action=''>
      <input type='hidden' name='category' value="<?php echo $row["category"]; ?>" />
<input type='hidden' name='code' value="<?php echo $row["cart_id"]; ?>" />
<button  style=" position:relative; left:-13px; top:24px;" type='submit' name='action' value="sub">-</button>
<input style="position:relative; left:13px; top:5px;  border: none; border-style: none;"type='text' name='quantity' value=<?php echo  $row["quantity"]; ?> readonly>
<button style=" position:relative; left:30px; top:-14px;"type='submit' name='action' value="add">+</button>
          </form></td>
        <td></td> 
      <td> </td>     
<td><?php echo "$" .$row["price"]." EGP" ;?></td> 
<td>  </td>      
<td><?php echo "$".$row["totalPrice"]*$row["quantity"]. " EGP"; ?></td>  
      <td></td>
<td>
<form method='post' action=''>
<input type='hidden' name='category' value="<?php echo $row["category"]; ?>" />
<input type='hidden' name='code' value="<?php echo $row["cart_id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>    
</form>
    </td>
        </tr>
         <?php 
        $total_price += ($row["price"]*$row["quantity"]);
        } ?>
    <tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?> EGP </strong>
</td>
</tr>
      </tbody></table>
   
  </div>
   

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
</div>
</div>
   <?php if ( $total_price!=0){ ?>
    
    
  <div class="center">
    <button  style="color:green;  text-align:center;" onclick="window.location.href='payment.php';" > CHECK-OUT</button>  
  </div>
       <?php  }?>
     <?php }  else { ?>
       <strong style=" position:relative; left:10px; top:100px; font-size:50px;  text-align:center;"> <h1><i><?php echo "YOUR CART IS EMPTY";?></i></h1></strong>
   <?php } ?>
</body>
</html>


<style>

.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
 
}
</style>