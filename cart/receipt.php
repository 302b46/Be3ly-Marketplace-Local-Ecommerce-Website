<?php
//session_start();
include "../database-connection.php";
 echo '<script>alert("Thank You for tursing Be3ly.com")</script>'; 
?>
<html>
<head>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>
<div  style="width:700px; margin:50 auto;">
<!--img src="be3lylogo.jpg"  width="150" height="150"-->    
<h2 style="color:blue; font-size:40px; text-align:center;">B3ley Receipt</h2>   
  
  
<div class="cart">
  <table class="table">
       
<tbody>

    
  <tr>
    
    <?php
      $total_price = 0;
    $resul = mysqli_query($conn,"SELECT * FROM `cart` WHERE username='{$_SESSION["Username"]}'");
        while($row=mysqli_fetch_assoc($resul)){
            
    ?>

    
<td><?php echo $row["name"]; ?></td>
<!--td><php echo $row["description"]; ?></td-->
      <td>
<input type='hidden' name='code' value="<?php echo $row["cart_id"]; ?>" />
    <input style="border-style: none;" type='text' name='quantity' value=<?php echo  $row["quantity"]; ?> readonly>
    </td>    
<td><?php echo $row["price"]; ?></td>    
<td><?php echo "$".$row["totalPrice"]*$row["quantity"]; ?></td>   
<td>
    
    </td>
        </tr>
         <?php 
        $total_price += ($row["price"]*$row["quantity"]);
        } ?>
    <tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
      </tbody></table>
  </div>


</div>
   <?php if($total_price!=0){ ?>
    
    
     <form method="POST" action="">
      
  <div class="center">
      <input type="submit"  name="receipt" style="color:blue;  text-align:center;"  value="Return Home Page"/>
  </div>
         
     </form>
       <?php  }?>
</body>
</html>

<?php
//$quantityP=$quantityC="";
if(isset($_POST["receipt"]))
{
   /* $ID[]=array();
    $QANTI[]=array();
    $index=0;
/****************************we check here law l quantityCART==quantityPRODUCT    
$result = mysqli_query($conn,"SELECT cart_id,quantity FROM `cart` WHERE `username`='{$_SESSION["username"]}' ORDER BY cart_id DESC");
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
//$row = mysqli_fetch_assoc($result);
$ID[$index]=$row['cart_id'];
    $QANTI[$index]=$row['quantity'];
    $index++;}
    }
    $res = mysqli_query($conn,"SELECT quantity,id FROM `product' ORDER BY id DESC");
     if ($res->num_rows > 0) {
    while($rows = $result->fetch_assoc()) {
$id = $rows['id'];
$quantityProduct = $rows['quantity'];
    
    for($i=0;$i<$index;$i++){
       if($ID[$i]==$id){
        
        if($QANTI[$i]==$quantityProduct)
        {
              $sq ="DELETE FROM `product` WHERE id='$cart_id'";
    $conn->query($sq);
        
      $sqlC ="DELETE FROM `cart` WHERE id='$cart_id''";
    $conn->query($sqlC);
            
        }else
        {
                    $quantityProduct=$quantityProduct-$quantity[$index];
        $sql = "UPDATE product SET quantity=' $quantityProduct' WHERE id='$cart_id'";
             }
       }
   }
    
    for($i=0;$i<$index;$i++){
       $ID[$i]==-1;
        
        $QANTI[$i]==-1;
       }
      $ID[$i] = (array) null;
       $QANTI[$i] = (array) null;
    }
     }
    */
      $sqCC ="DELETE FROM cart WHERE username='{$_SESSION["Username"]}'";
        if ($conn->query($sqCC) !== TRUE) {
            //echo "Error deleting record: " . $conn->error;
             echo '<script>alert("Somethin went wrong ")</script>'; 
             }
 
     header("location:../Hompage/HomePagePHP.php");
}
?>



<style>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
   /* font-size: 40px;*/
    }
body{
    border-style: solid;
    }
</style>