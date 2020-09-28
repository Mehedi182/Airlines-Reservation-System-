<?php
include 'connection.php';

session_start();
 $_SESSION["rdate"]="";

if(!empty($_POST['rdate']))
{
    $depart=$_POST['depart'];
    $arival=$_POST['arival'];
    $tdate=$_POST['tdate'];
    $rdate=$_POST['rdate'];
    $_SESSION["rdate"]=$rdate;
}

else if(!empty($_POST['depart']))
{
    $depart=$_POST['depart'];
    $arival=$_POST['arival'];
    $tdate=$_POST['tdate'];
}
$_SESSION["depart"]=$depart;
$_SESSION["arival"]=$arival;
$_SESSION["tdate"]=$tdate;
   $select = "SELECT * from flights where depart_place='$depart' && arival_place='$arival'";
   $select=$conn->query($select);
   $a=array();
   $c=0;
   $c1=0;
 while ($row=mysqli_fetch_assoc($select)) {
  if($depart===$row['depart_place'])$c1++;
  if($tdate===$row['fdate'])$c++;
  if($c>0) break;
      $a[] =$row; 
   }
?>
<html>

   <head>
      <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet3.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>">
      <script src="js/script2.js?v=<?php echo time();?>"></script>
      <title>Available Flights</title>
         <link rel="icon" href="images/logo.png">

   </head>
   <body style="background-image: url('images/p7.PNG'); background-size: 100% 100%">
       <div style="margin-top: 20px">
         <center>
            <h1>Flight Booking</h1>
        <br>
       
         </center>
      </div>
      <?php 
      if($c1===0){
        ?>
    <center><h5 style="color: white"> <?php
    echo "Sorry We didn't find any Flight For Your requirement to See our Flight List Click"
  ?><button class="link-button" onclick="see_flights()"> here </button></h5></center> 
  
<?php
}

       else{?>
      <div align="center">
        <h4 style="color: white"><?php if($c===0) echo "Sorry We cann't find your desire Flight.","<br>","Our flight list for ",$depart," to ",$arival," is Given Bellow.";?></h4>
         <h5>Available Flights</h5>
         <table >
              <tr>
               <th>Flight ID</th>
               <th>Departure place</th>
               <th>Arival place</th>
               <th>Flight Date</th>
               <th>Flight Time</th>
               <th>Arival Time</th>
               <?php if(!empty($_POST['rdate'])){
                  ?>
               <th>Return Date</th>
               <th>Return time</th>
               <th>Return arival time</th>

               <?php 
            }
               ?>
             <th>Per ticket price</th>
           

            </tr>
         
              
                  <?php     foreach ($a as $data) {?>
                        <tr>
       <td><?php
       $_SESSION["fid"] =$data['flightID'];
        echo $data['flightID'];?></td>

               <td>
                  <?php echo $depart?>
               </td>
               <td>
                  <?php echo $arival?>
               </td>
               <td>
                  <?php echo $tdate?>
               </td>
                <td>
                  <?php  echo $data['f_time'];?>
               </td>
               <td>
                  <?php  echo $data['arival_time'];?>
               </td>
                <?php if(!empty($_POST['rdate'])){
                  ?>
               <td>  <?php  echo $rdate?></td>
               <td>  <?php  echo $data['rf_time'];?></td>
               <td>  <?php  echo $data['rf-arival'];?></td>
               <td>  <?php  echo $data['amount']*2;?>
               </td>

               <?php 
            }
            else {
              ?>
              <td>  <?php  echo $data['amount'];?>
               </td>
               <?php
            }
   }
   
   ?>
             
            </tr>
            
         </table>
   </div>
 <?php }
   ?>
   <br>
   <div align="center" class="see-flights" style="margin-top: -30px">
  

  <table border="1" style="margin-bottom: 20px; font-size: 12px;">
    <h3>Flights of UK Bangla Airlines</h3>
    <tr style="font-weight: bold;background-color: #E8ECE0;">
      <td>Flight ID</td>
      <td>Depart Place</td>
      <td>Arival Place</td>
      <td>Depart Date</td>
      <td>Departure Time</td>
      <td>Arival Time</td>
      <td>Return Date</td>
      <td>Return Time</td>
      <td>Return Arival Time</td>
      <td>Ticket Price</td>
     
    </tr>
 
  <?php 
   $select2 = "SELECT * from flights";
   $select2=$conn->query($select2);
  $c=0;
 while ($row=mysqli_fetch_assoc($select2)){
  if($c%2==0){
      ?>
      <tr style="background-color: #49FD83">
        <td> <?php echo $row['flightID'];?> </td>
        <td> <?php echo $row['depart_place'];?> </td>
        <td> <?php echo $row['arival_place'];?> </td>
        <td> <?php echo $row['fdate'];?> </td>
        <td> <?php echo $row['f_time'];?> </td>
        <td> <?php echo $row['arival_time'];?> </td>
        <td> <?php echo $row['rf_date'];?> </td>
        <td> <?php echo $row['rf_time'];?> </td>
        <td> <?php echo $row['rf-arival'];?> </td>
        <td> <?php echo $row['amount'];?> </td>
       
      </tr>
      <?php
      $c++;
    }
    else{
      ?>
      <tr style="background-color: #FDC26C;">
        <td> <?php echo $row['flightID'];?> </td>
        <td> <?php echo $row['depart_place'];?> </td>
        <td> <?php echo $row['arival_place'];?> </td>
        <td> <?php echo $row['fdate'];?> </td>
        <td> <?php echo $row['f_time'];?> </td>
        <td> <?php echo $row['arival_time'];?> </td>
        <td> <?php echo $row['rf_date'];?> </td>
        <td> <?php echo $row['rf_time'];?> </td>
        <td> <?php echo $row['rf-arival'];?> </td>
        <td> <?php echo $row['amount'];?> </td>
      </tr>
    <?php
    $c++;
}

 }

 ?>
  </table>
</div>
         <br><br>

      <div class="form-bg" align="center">
         <div style="height: 30px;"></div>
         <form action="payment.php" method="POST">
            <input type="number" class="form-2" name="fid" placeholder="Enter the flightID" required>
            <input style="width: 300px;" type="number" class="form-2" name="seats" placeholder="Enter the number tickets" required>
            <input style="width: 300px;" type="number" class="form-2" name="pnum" placeholder="Enter your contact number" required><br><br>
            <button class="btn btn-success" style="margin-bottom: 10px;">Proceed To Pay</button>
         </form>
      </div>
    
   </body>
</html>