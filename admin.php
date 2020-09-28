<?php 
include 'connection.php';

session_start();

   $select = "SELECT * from users";
   $select2 = "SELECT * from flights";
   $select3 = "SELECT * from booked_flights";
   $select4 = "SELECT * from payments";
   $select5 = "SELECT name from admin";
   $select=$conn->query($select);
   $select2=$conn->query($select2);
   $select3=$conn->query($select3);
   $select4=$conn->query($select4);
    $m="";
    //flight insertion
   if(!empty($_POST['rfarival'])){
    $depart = $_POST['depart'];
    $arival = $_POST['arival'];
    $price = $_POST['price'];
    $farival = $_POST['farival'];
    $rfarival = $_POST['rfarival'];
    $fdate = $_POST['fdate'];
    $ftime = $_POST['ftime'];
    $rfdate = $_POST['rfdate'];
    $rftime = $_POST['rftime'];
    $insert = "INSERT INTO `flights`(`depart_place`, `arival_place`, `fdate`, `f_time`, `arival_time`, `rf_date`, `rf_time`, `rf-arival`, `amount`) VALUES ('$depart','$arival','$fdate','$ftime','$farival','$rfdate','$rftime','$rfarival','$price')";
    $insert=$conn->query($insert);
    $m="You have successfully inserted the flight";
  }
   if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
      ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	 <link rel="icon" href="images/logo.png">
      <link rel="stylesheet" href="css/stylesheet1.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="css/stylesheet4.css?v=<?php echo time();?>">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>"> 


</head>
<body>
  <script src="js/script3.js?v=<?php echo time();?>"></script>

<center><img src="images/logo.png" width="300px" height="200px">
<h1 style="margin-top: -20px; color: red"><u>Admin Panel</u></h1>
<a href="admin.php">
<button class="btn">Insert Flight</button></a>
<button class="btn" onclick="see_flights()">See Flights</button>
<button class="btn" onclick="book()">Booked Flights</button>
<button class="btn" onclick="payments()">payments</button>
<button class="btn" onclick="users()">users</button>

  <a href="logout.php?logout=ok">
          <button class="btn" name="logout">logout</button>
      </a>
</center>




<br>
<div align="center" class="users">
	<h3>Users list of UK Bangla Airlines</h3>

	<table border="1" style="margin-bottom: 20px;">
 		<tr style="font-weight: bold;background-color: #E8ECE0;">
 			<td>User ID</td>
 			<td>First Name</td>
 			<td>Last Name</td>
 			<td>Email</td>
 			<td>Password</td>
 			<td>Gender</td>
 			<td>Phone Number</td>
 			<td>Registration Date</td>
 		</tr>
 
	<?php 

	$c=0;
 while ($row=mysqli_fetch_assoc($select)){
 	if($c%2==0){
    	?>
    	<tr style="background-color: #49FD83">
    		<td> <?php echo $row['user_ID'];?> </td>
    		<td> <?php echo $row['fname'];?> </td>
    		<td> <?php echo $row['lname'];?> </td>
    		<td> <?php echo $row['email'];?> </td>
    		<td> <?php echo $row['password'];?> </td>
    		<td> <?php echo $row['gender'];?> </td>
    		<td> <?php echo $row['p_number'];?> </td>
    		<td> <?php echo $row['Reg_date'];?> </td>
    	</tr>
    	<?php
    	$c++;
    }
    else{
    	?>
    	<tr style="background-color: #FDC26C;">
    		<td> <?php echo $row['user_ID'];?> </td>
    		<td> <?php echo $row['fname'];?> </td>
    		<td> <?php echo $row['lname'];?> </td>
    		<td> <?php echo $row['email'];?> </td>
    		<td> <?php echo $row['password'];?> </td>
    		<td> <?php echo $row['gender'];?> </td>
    		<td> <?php echo $row['p_number'];?> </td>
    		<td> <?php echo $row['Reg_date'];?> </td>
    	</tr>
    <?php
    $c++;
}

 }

 ?>
 	</table>
</div>
<center><h3> <?php if($m!="") echo $m?> </h3></center>

<div align="center" class="insert">
  <form action="" method="POST">
    <br>
      <select style="width: 250px;" class="form-i" name="depart" required>
               <option value="" selected disabled>Enter Depart Place</option>
               <option style="color:black">Dhaka</option>
               <option style="color:black">Chittagong</option>
               <option style="color:black">Dellhi</option>
               <option style="color:black">New  york</option>
               <option style="color:black">Toronto</option>
              
            </select>
           <select class="form-i" name="arival" required>
               <option value="" selected disabled>Enter arival Place</option>
               <option style="color:black">Dhaka</option>
               <option style="color:black">Chittagong</option>
               <option style="color:black">Dellhi</option>
               <option style="color:black">New  york</option>
               <option style="color:black">Toronto</option>
            
            </select>
  
<input class="form-i" type="number" name="price" placeholder="Price of ticket" required>
  <br><br>
  <b>Depart Flight</b><br>
    <input class="form-i form-br" type="text" name="fdate" placeholder="Enter flight date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
  <input class="form-i " type="text" name="ftime" placeholder="Enter flight time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
  <input class="form-i" type="text" name="farival" placeholder="Enter aival time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
  <br><br>
  <b>Return flight</b><br>

  <input class="form-i form-br" type="text" name="rfdate" placeholder="Enter flight date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
  <input class="form-i " type="text" name="rftime" placeholder="Enter flight time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
  <input class="form-i" type="text" name="rfarival" placeholder="Enter aival time" onfocus="(this.type='time')" onblur="(this.type='text')" required>

  <br>
  <button class="form-br btn-i" type="submit">Insert Flight</button>
    </form>
  <br>
</div>
<br>

<div align="center" class="see-flights" style="margin-top: -30px">
  

  <table border="1" style="margin-bottom: 20px;">
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

<div align="center" class="booked-flights"  style="margin-top: -30px">

<h3>All Booked Flights of UK Bangla Airlines</h3>
  <table border="1" style="margin-bottom: 20px;">
    <tr style="font-weight: bold;background-color: #E8ECE0;">
      <td>Ticket No</td>
      <td>Flight ID</td>
      <td>Number of Seats</td>
      <td>Return Ticket</td>
      <td>Contact Number</td>
      <td>Email</td>
      <td>Booking Time</td>
     
    </tr>
 
  <?php 
  $c=0;
 while ($row=mysqli_fetch_assoc($select3)){
  if($c%2==0){
      ?>
      <tr style="background-color: #49FD83">
        <td> <?php echo $row['sl'];?> </td>
        <td> <?php echo $row['flightID'];?> </td>
        <td> <?php echo $row['seats'];?> </td>
        <td> <?php echo $row['return_status'];?> </td>
        <td> <?php echo $row['contact'];?> </td>
        <td> <?php echo $row['email'];?> </td>
        <td> <?php echo $row['booking time'];?> </td>
       
      </tr>
      <?php
      $c++;
    }
    else{
      ?>
      <tr style="background-color: #FDC26C;">
        <td> <?php echo $row['sl'];?> </td>
        <td> <?php echo $row['flightID'];?> </td>
        <td> <?php echo $row['seats'];?> </td>
        <td> <?php echo $row['return_status'];?> </td>
        <td> <?php echo $row['contact'];?> </td>
        <td> <?php echo $row['email'];?> </td>
        <td> <?php echo $row['booking time'];?> </td>
      </tr>
    <?php
    $c++;
}

 }

 ?>
  </table>
</div>

<div align="center" class="payments" style="margin-top: -30px">
 
<h3> Payment List</h3>
  <table border="1" style="margin-bottom: 20px;">
    <tr style="font-weight: bold;background-color: #E8ECE0;">
      <td>Payment ID</td>
      <td>Account Name</td>
      <td>Ac_No</td>
      <td>VCC</td>
      <td>Validity</td>
      <td>Amount</td>
      <td>Ticket No</td>
      <td>Payment Time</td>
    
    </tr>
 
  <?php 
  $c=0;
 while ($row=mysqli_fetch_assoc($select4)){
  if($c%2==0){
      ?>
      <tr style="background-color: #49FD83">
 <td> <?php echo $row['id'];?> </td>
        <td> <?php echo $row['ac_name'];?> </td>
        <td> <?php echo $row['ac_no'];?> </td>
        <td> <?php echo $row['vcc'];?> </td>
        <td> <?php echo $row['validity'];?> </td>
        <td> <?php echo $row['amount'];?> </td>
        <td> <?php echo $row['ticket_no'];?> </td>
        <td> <?php echo $row['payment_time'];?> </td>
       
      </tr>
      <?php
      $c++;
    }
    else{
      ?>
      <tr style="background-color: #FDC26C;">
        <td> <?php echo $row['id'];?> </td>
        <td> <?php echo $row['ac_name'];?> </td>
        <td> <?php echo $row['ac_no'];?> </td>
        <td> <?php echo $row['vcc'];?> </td>
        <td> <?php echo $row['validity'];?> </td>
        <td> <?php echo $row['amount'];?> </td>
        <td> <?php echo $row['ticket_no'];?> </td>
        <td> <?php echo $row['payment_time'];?> </td>
      </tr>
    <?php
    $c++;
}

 }

 ?>
  </table>
</div>
</body>
</html>
<?php
}?>