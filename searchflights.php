<html>
   <head>
               <link rel="icon" href="images/logo.png">

      <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>">
      <script src="js/script2.js?v=<?php echo time();?>"></script>
   </head>
   <title>Book Your Tickets</title>

   <body style="background-image: url('images/p7.PNG'); background-size: 100% 100%">
      <div style="margin-top: 20px">
         <center>
            <h1>Flight Booking</h1>
        <br>
            <h2 style="color:white">Book your flight with a trusted Airlines</h2>
         </center>
      </div>
     <div align="center">
         <b><span  id="ft">Select Flight Type</span></br>
         <span id="fw"> <input type="radio" name="one" value="one" onclick="one()">One Way<input type="radio" name="one" value="round" onclick="round()">Round Way
         </span>
      </b>
   </div>
         <br>
          <div class="flight-container" align="center">
               <div style="height: 30px"></div>
      <div class="flight-container-2" align="center">
         <form class="form-m" action="bookticket.php"method="POST">
            <img src="images/location.png">From 
            <select class="form  form-size" id="depart" name="depart" required>
               <option value="" selected disabled>--Select--</option>
               <option style="color:black">Dhaka</option>
               <option style="color:black">Chittagong</option>
               <option style="color:black">Dellhi</option>
               <option style="color:black">New  york</option>
               <option style="color:black">Toronto</option>
            </select>
            <img src="images/location.png">To 
            <select class="form  form-size" name="arival"required>
               <option value="" selected disabled>--Select--</option>
               <option style="color:black">New  york</option>
               <option style="color:black">Dellhi</option>
               <option style="color:black">Toronto</option>
               <option style="color:black">Dhaka</option>
               <option style="color:black">Chittagong</option>
            </select>
            <img src="images/calender.png" >Depart Date
            <input type="date" name="tdate" class="form  form-size"  required><br>
            <div class="round">
               <img src="images/calender.png"><b>Return Date</b>           
               <input type="date" class="form  form-size" name="rdate">  
            </div>
            <br>
            <input type="submit" value="Search Flights" style="margin-bottom: 10px"   class="btn btn-success">
         </form>
     </b>
 </div>
      </div>
      
   </body>
</html>