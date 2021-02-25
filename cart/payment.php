<?php
include "../database-connection.php";
?>
<!DOCTYPE HTML>  
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>B3ley Contact Us </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
  <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="icon" type="image/png" href="https://colorlib.com/etc/cf/ContactFrom_v16/images/icons/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.1.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="payment.css">
     <style>
    .error {
		color: #FF0000;
		display:block;
		}
         body{ background-color:#280d6b;
text-align:100px;
         }    
    </style>

</head>
   
		
<body>  

<?php
// define variables and set to empty values
$nameErr = $phoneErr= $addressErr =$cityErr=$cardNumErr=$cvvErr=$yearErr=$monthErr="" ;
$name=$phone=$address=$cardNum=$cvv=$year=$month= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $i=0;
    $year=$_POST["year"];
    $month=$_POST["month"];
    $city=$_POST["city"];
    
/************************NAME ********************************/    
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }else {$i++;}
  }
    
  /************************Adress********************************/    

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  }else{
         $address=$_POST["address"]; 
        $i++;
      }

    
    /************************City ********************************/    
 /*$cario="cairo";    $alex="alexandria";    $giza="giza";
    //|| $_POST["city"]!=$alex || $_POST["city"]!=$giza;
    if (empty($_POST["city"])) {
    $cityErr = "city is required";
        
     } else 
        if(!empty($_POST["city"])){
    
               //&& $_POST["city"]!=$cario))
            //||(!empty($_POST["city"]) && $_POST["city"]!=$alex) || (!empty($_POST["city"]) && $_POST["city"]!=$giza)) 
                
       // $cityErr = "city is required";
            if($_POST["city"]!=$cario || $_POST["city"]!=$alex || $_POST["city"]!=$giza){
        echo '<script>alert(" Our service support Cario, Alexandria ,Giza at the moment")</script>';
            }
    }else{
        $city=$_POST["city"];
        $i++;
    }*/
    
    /************************Phone ********************************/    

  if(empty($_POST["phone"])){
      $phoneErr="Phone is required";
  }else{
      $phone =$_POST["phone"];
      
      if(!filter_var($phone,FILTER_VALIDATE_INT)){ //phone
         $phoneErr="Phone invalied"; 
      }else {$i++;}
  }

    /************************cardNum ********************************/    

    if(empty($_POST["cardNum"])){
      $cardNumErr="Card Number is required";
  }else{
      $cardNum =$_POST["cardNum"];
      if(!filter_var($cardNum,FILTER_VALIDATE_INT)){ 
         $cardNumErr="Card Number invalied";
         }else{$i++;}
  }
    
    /************************cvv ********************************/    

    
     if(empty($_POST["cvv"])){
      $cvvErr="CVV is required";
  }else{
      $cvv=$_POST["cvv"];
         
      if(!filter_var($cvv,FILTER_VALIDATE_INT)){ 
         $cvvErr="CVV invalied"; 
      }else{$i++;}
  }
    
    if($i==5)
    { 
        //$counter=0;
   
   /*$sql ="INSERT INTO Paymentlocat( `name`,`number`,`city`, `address`)  VALUES('$name','$phone','$city','$address')";*/
        
    /*$sql= "SELECT cardnum,cvv,year,month FROM creditcard WHERE cardnum='{$_POST["cardNum"]}' AND cvv='{$_POST["cvv"]}' AND year='{$_POST['year']}' AND month='{$_POST['month']}'  ";
        $result=$conn->query($sql);

if($row=$result->fetch_assoc())
{
    header("location: receipt.php");
}
    else
    {
        echo '<script>alert("information is entered wrong! Please try again later.")</script>'; 
        
        
        
    }*/
    
//$conn->close(); 
    
    
  header("location: receipt.php");
    
}

}

?>
    
<!--button class="btn-hide-contact100">
  <span aria-hidden="true">×</span>
</button-->
    <div class="container">
    <div class="row justify-content-center"> <!-- 5la l row fil nos-->
      <div class="col-lg-8 mt-3"> <!-- 7gm l fram of form --->
      <div class="card border shadow"> 
          
            <div class="card-header text-danger"> 
                <strong><h2 class="card-title">Checkout Form</h2></strong>
          </div>
          
           <div class="card-body px-3">
          <p><span class="error">* required field</span></p>
               
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="contact-form" method="post">
                
               <h3 >Billing Address</h3>
                <!----------------------NAME--------------->
			  
              <div class="form-group">
			     <!-- <span class="input-group-text" id="basic-addon1">@</span> -->  
				<div class="input-group mb-3">
				<div class="input-group-prepend">
			 <span class="input-group-text"><svg width="1em" height="1em" viewBox="0 0 16 16"  class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg> </span>

	</div>
                <input type="text"  name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name;?>">
                    <span class="error">* <?php echo $nameErr;?></span>
				</div>

			  </div>
          
                  
                <!----------------------PHONE NUMBER--------------->
	 
	 <div class="form-group">
	 <div class="input-group mb-3">
	<div class="input-group-prepend"> 
	<span class="input-group-text">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
        </svg></span>
</div>
  <input type="text"  name="phone" class="form-control" placeholder="Enter phone number" value="<?php echo $phone;?>" >
	  <span class="error">* <?php echo $phoneErr;?></span>
	 </div>
	</div>	
                
           
    
                <!----------------------Address-------------------->		  		
	 
	 <div class="form-group">
	 <div class="input-group mb-3">
	<div class="input-group-prepend"> 
	<span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i></span>
</div>
  <input type="text"  name="address" class="form-control" placeholder="Enter Address" value="<?php echo $address;?>">
	  <span class="error">* <?php echo $addressErr;?></span>
	 </div>
	</div>	
                     
                <!--------------------------city-------------------------------------->		
 <div class="form-group">
 <div class="input-group mb-3">
	<div class="input-group-prepend"> 
	<span class="input-group-text"><i class="fa fa-university" aria-hidden="true"></i></span>
         <span> <select  name="city">
        <option value="Cairo">Cairo</option>
        <option value="Giza">Giza</option>
        <option value="Alexandria">Alexandria</option>
        <option value="Aswan">Aswan</option>
        <option value="Luxor">Luxor</option>
        <option value="06">Ismaillia</option>       
     </select> 
                        </span>
</div>      
    <!--input value="<php echo city;? >" class="form-control" name="city" placeholder="enter city" type="text" -->
     
     		
 
      <!--span class="error">*<?php echo $cityErr;?></span-->
 </div>
</div>  
    
                
                
                <!-------------------------PAYMENT TYPE-------------------------------->
                
                 <h3 >Accepted Cards</h3>
		  
		  <div class="form-group">
		 
              
	   <!--i  class="fa fa-cc-mastercard" style="font-size:48px ;"></i-->
 

   
	     <!--i  class="fa fa-cc-discover" aria-hidden="true" style="font-size:48px;"></i--->
     
    
	  <!--i class="fa fa-cc-paypal"style="font-size:48px;"></i-->
  
	<i class="fa fa-cc-visa" aria-hidden="true" id="Iimage"></i>

	
	 <!--i class="fa fa-cc-amex" style="font-size:48px;"></i-->
</div>	
         
                <!---------------Credit Card Number INFO------------------------------>
		  

<h3>Credit Card Information</h3>

              
                    <!--------------------------Cridet card number Number-------------------------------------->		
 <div class="form-group">
 <div class="input-group mb-3">
	<div class="input-group-prepend"> 
	<span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i> </span>
</div>      
    <input value="<?php echo $cardNum;?>" class="form-control"  name="cardNum" placeholder="enter card number" type="text" >
      <span class="error">*<?php echo $cardNumErr;?></span>
 </div>
</div>           
		
                <div class="form-group">
	 <div class="input-group mb-3">
		<label for="Exp Month">Exp Month </label>
 <span>
     <select  name="month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
     </select> 
</span>
                    </div>
               
                </div>
                
                <div class="form-group">
	 <div class="input-group mb-3">         
         <label for="Exp Year"> Exp Year </label>
         <span><select name="year">
		  <option value="2028"  >2028</option>
		  <option value="2027" >2027</option>
		  <option value="2026">2026</option>
		  <option value="2025">2025</option>
		  <option value="2024">2024</option>
		  <option value="2023">2023</option>
		  <option value="2022">2022</option>
		  <option value="2021">2021</option>
		  <option value="2020">2020</option>
          <option value="2019">2019</option>
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
          <option value="1989">1989</option>
          <option value="1988">1988</option>
          <option value="1987">1987</option>
          <option value="1986">1986</option>
          <option value="1985">1985</option>
          <option value="1984">1984</option>
          <option value="1983">1983</option>
          <option value="1982">1982</option>
          <option value="1981">1981</option>
		 </select></span>
                    </div>
                     
                </div>
                
                                   <!--------------------------CVV-------------------------------------->		
 <div class="form-group">
 <div class="input-group mb-3" >
	<div class="input-group-prepend"> 
	<span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i> </span>
</div>      
    <input value="<?php echo $cvv;?>" class="form-control"  inputmode="numeric" autocomplete="cc-number" name="cvv" placeholder="CVV: xxx" type="text" >
      <span class="error">*<?php echo $cvvErr;?></span>
 </div>
</div>   
     <input  class="btn btn-primary" style="text-align:center;" type="submit" name="submit" value="Submit">   
 
</form>
                                                   </div>
                                                   </div>
                                                   </div>
                                                   </div>
                                                   </div>
                                    
</body>
</html>