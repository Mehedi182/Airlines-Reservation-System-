 <?php
 include 'connection.php';

session_start();



$sl =" SELECT sl from booked_flights order by sl desc limit 1";

$sl =$conn->query($sl);
         $row=mysqli_fetch_assoc($sl);
         $sl=$row['sl']+1;

$voucher="";
$discount="";
$rs= "No";
$depart   = $_SESSION["depart"];
$arival   = $_SESSION["arival"];
$tdate    = $_SESSION["tdate"];
$rdate    = $_SESSION["rdate"];
if($rdate!="") $rs="Yes";
$fid    = $_SESSION['fid'];
$seats  = $_SESSION['seats'];
$ftime  = $_SESSION['ftime'];
$rftime = $_SESSION['rftime'];
$amount = $_SESSION['amount'];
$contact=$_SESSION["pnum"];
$email=$_SESSION["email_s"];
if (!empty($_POST['card'])) 
{
    $card  = $_POST['card'];
    $cnum  = $_POST['cnum'];
    $vcc   = $_POST['vcc'];
    $vdate = $_POST['vdate'];
  
    $pay="INSERT INTO `payments`( `ac_name`, `ac_no`, `vcc`, `validity`,`amount`,`ticket_no`) VALUES ('$card','$cnum','$vcc','$vdate','$amount','$sl')";

    
    $pay=$conn->query($pay);
} 

$insert="INSERT INTO `booked_flights`(`flightID`,`seats`,`return_status`,`contact`, `email`) VALUES ('$fid','$seats','$rs','$contact','$email')";
    $insert=$conn->query($insert);


?>


<html>
<head>
    <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>"> 
      <link rel="icon" href="images/logo.png">
      <title>Confirm Ticket | UK Bangla Airlines</title>
</head>
<body style="background-color: red;">
 <div class="reg" align="center">  
    <div class="login-container"align="center">
Flight ID :<?php echo " ",$fid; 
          echo "<br>Departure airport : ",$depart;
         echo "<br> Arival airport : ",$arival;
         echo "<br> Flight Date : ",$tdate;
         echo "<br> Flight time : ",$ftime;
      
         if($rdate!="") {
                     echo "<br>Return Flight Date : ",$rdate;
                     echo "<br>Return Flight time : ",$rftime;
         }
         if(!empty($discount)){
          echo "You Get ",$row,"% discounts.";
          echo "<br> Discounts : ",$discount," Tk ";

         } 
         else{
          echo "<br> Discounts : 0Tk";
         }
         echo "<br> Seats : ",$seats;
         echo "<br> Total amount : ",$amount," Tk";
         ?>
         <h3> Thanks for your Ticket booking with our airlines</h3>
         <a href="ticket.php">Dowload  your ticket</a>
                  </div>
            </div>
    
    
</body>
    </html>