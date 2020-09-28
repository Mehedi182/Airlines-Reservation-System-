
<?php
include 'connection.php';
session_start();

$rftime="";
   $fid= $_POST["fid"];
   $seats= $_POST["seats"];
   $contact=$_POST["pnum"];
   $depart= $_SESSION["depart"];
   $arival= $_SESSION["arival"];
   $tdate= $_SESSION["tdate"];
   $rdate= $_SESSION["rdate"];
  $c=0;
  $m="";
   $select = "SELECT * from flights where flightID= '$fid'";
   $select=$conn->query($select);
 
    while ($row=mysqli_fetch_assoc($select)
) {
      if($depart===$row['depart_place']&&$arival===$row['arival_place'])$c++;
     
      else if($depart===$row['depart_place']&&$arival===$row['arival_place']&&$fid===$row['flightID']) $c++;
      if($c>0) {
           $amount=$row['amount']*$seats;
   $ftime=$row['f_time'];
   $at=$row['arival_time'];
   break;
      }
}
if($c===0) $m="Sorry You have made some wrong ";
?>
      <title>Confrim Payment | UK Bangla Airlines</title>
               <link rel="icon" href="images/logo.png">

<?php if($c==0){?>
<h4><?php echo $m?><a href="searchflights.php">Try again</a></h4>
<?php
}
if($c!=0){
   
   if($rdate!=""){
   	$rftime=$row['rf_time'];
   	$amount=2*$amount;
   }
  
   //session for next page
   $_SESSION['fid']=$fid;
   $_SESSION['seats']=$seats;
   $_SESSION['ftime']=$ftime;
   $_SESSION['rftime']=$rftime;
   $_SESSION["pnum"]=$contact;
    $_SESSION['amount']=$amount;
?>

<html>

   <head>
      <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="css/stylesheet3.css?v=<?php echo time();?>">
      <title>Confrim Payment | UK Bangla Airlines</title>
         <link rel="icon" href="images/logo.png">
        <script src="js/script2.js?v=<?php echo time();?>"></script>


   </head>
   <body>
    <center> <img src="images/pay.png"></center>
              <div style="display: flex;">
         <div class="flight-info" style="margin-top: 20px">
         <center style="margin-top: 10px;"><span class="center">Your Flight Info</span></center>
        <p>

         Flight ID :<?php echo " ",$fid; 
          echo "<br>Departure airport : ",$depart;
         echo "<br> Arival airport : ",$arival;
         echo "<br> Flight Date : ",$tdate;
         echo "<br> Flight time : ",$ftime;
         echo "<br> Arival time : ",$at;
      
         if($rdate!="") {
                     echo "<br>Return Flight Date : ",$rdate;
                     echo "<br>Return Flight time : ",$rftime;
                     echo "<br>Return Arival time : ",$rftime;
         }
         echo "<br> Seats : ",$seats;
         echo "<br> Total amount : ",$amount," Tk";
         ?>
         </p>
      </div>


      <div class="card" align="center">
         <form action="confirmticket.php" method="POST">
            <br>
           <select class="form-pay" name="card" required>
               <option value="" disabled selected> Select Card</option>
            <option style="color:black">Paypal</option>
            <option style="color:black">Visacard</option>
            <option style="color:black">Mastercard</option>
            </select><br>
            <input class="form-pay form-br"  type="number" name="cnum" placeholder="Enter your card number" required><br>
            <input class="form-pay form-br"  type="number" name="vcc" placeholder="Enter your VCC" required><br>
            <input class="form-pay form-br"  type="text" name="vdate" placeholder="Enter validity"  onfocus="(this.type='date')" onblur="(this.type='text')" required><br>
            <input  style="display: none" class="form-pay form-br" type="text" name="voucher" id="voucher" placeholder="Enter your voucher Code">
            <br>
            <button style="margin-bottom: 10px;"  type="submit" class="btn btn-success"> Confirm Ticket</button>
         </form>
      </div>
    
</div>

</body>
</html>
<?php
}?>