<html>
<body>
<?php
//if(!empty($_SESSION["shopping_cart"])) {
$sql ="SELECT * FROM cart where username='{$_SESSION["Username"]}'";
	 $result=mysqli_query($conn,$sql);
  $rowcount=mysqli_num_rows($result);
	$cart_count =$rowcount;
 //count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
    
</body>
</html>