<?php
include 'connection.php';

session_start();



?>
<!DOCTYPE html>
<html>
<head>
	<title>UK Bangla Airlines</title>
	<link rel="icon" href="images/logo.png">
	<link rel="stylesheet" href="css/stylesheet1.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">	
</head>
<body>

<div class="container">
		<div class="column-1"><img src="images/logo.png"></div>
		<div class="column-2">
			 <a href="index.php">
			<button class="btn">Home</button>
		</a>
		<?php
      if(isset($_SESSION['email_s']) && !empty($_SESSION['email_s'])) {
      ?>
      <a href="searchflights.php">
			<button class="btn">Book Tickets</button>
		 </a>
      <?php
        
      }else{
       ?>
       	    <button class="btn" name="bookticket" onclick="login()">Book Ticket</button> 
 

      <?php
      }
    ?>
       <a href="#about">
			<button class="btn">About Us</button></a>
       <a href="#contact">

			<button class="btn">Contact Us</button></a>
			<?php
      if(isset($_SESSION['email_s']) && !empty($_SESSION['email_s'])) {
        $email=$_SESSION['email_s'];
        $select="SELECT fname from users where email = '$email' ";
        $select=$conn->query($select);
           $row=mysqli_fetch_assoc($select);
           $fname=$row['fname'];

      ?>
      <ul id="nav" style="margin-top: -45px; margin-left: 390px;">
                <li><a href="#"><?php echo $fname;?>»</a>
                    <ul>
                        <!--li style="border-radius: 0"><a href="#">Sub Sub Item 1</a-->
                            <li style="border:none;background-color: orange"> <a href="logout.php?logout=ok">Logout</a>
                    </ul>
                    </li>
  
    </ul>
      <?php
        
      }else{
       ?>
       <a href="login_form.php">
           <button class="btn" name="login">Login</button>
      </a>
      <?php
      }
    ?>
		</div>
</div>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
For Ticket booking You have to
 <a href="login_form.php"> <b>Login</b></a>
</div>
<center>
<marquee class="marq"><h1>WelCome To UK Bangla Airlines</h1></marquee>
</center>
<div class="slideshow-container">

<div class="mySlides ">
  <div class="numbertext">1 / 3</div>
  <img src="images/air3.webp" style="width:110%">
  <div class="text"><b>Fly with feel</b></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="images/air4.png" style="width:110%">
  <div class="text"><b>We are number one</b></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="images/air5.jpg" style="width:110%">
  <div class="text"><b>book the ticket ASAP</b></div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
  <script src="js/script1.js?v=<?php echo time();?>"></script>
<br>
<br>

  <center><h2>About Us</h2></center>

<div id="about">
  <div class="about">

    <br>
    We can claim ourselves as one  of the prominent Airlines in the world.<br>Ever day We provide more than 100 flights in all over the world.<br>Many passanger choose their best Airlines as <b>UK BANGLA AIRLINES.<b>
</div>
  <div class="line" align="center"></div>
  <div class="features">
    <h3><u>Our features</u></h3>
<ul>
<li>Search hundreds of other travel sites at once</li>
<li>Book with confidence with Price Forecast & Price Alerts</li>
<li>Find the information you need to make the right decision</li>
<li>All this and more with no extra costs</li>
</u>
</div>
</div>
<div id="contact">

<div class="container-2">
  <div style="height: 100px;"></div>
<div class="container-3">
  <div class="input-sec">
    <h2 style="color: black;"> Feel Free to contact with Us</h2>
    <span style="margin-left: 8px;">First Name </span><span style="margin-left: 170px;">Last name<span><br>
    <input type="text" name="fname" required>

    <input type="text" name="lname" required>
    <br><br>
    <span style="margin-left: 10px;">Email </span><span style="margin-left: 210px;">Phone number<span><br>
      <form action="" method="POST">
    <input type="email" name="email" required>
    <input type="number" name="phone" required><br><br>
    <b style="margin-left: 10px"> write your messeage</b><br>
    <textarea>
      
    </textarea name="messeage" required><br>
    <button class="bt">Send</button>
  </form>
  </div>
</div>
</div>
<div class ="contact">
  <div style="height: 100px"></div>
<div class="container-1">
  <center><h2>Contact US</h2></center>
  <img class="img-1" src="images/location.png">
  <p style="margin-top: -30px"> 12/A Uttara-10,Dhaka</p>
  <img class="img-2" src="images/mail.png">
  <p style="margin-top: -35px">18203058@iubat.edu</p>
  <img class="img-2" src="images/phone.png">
  <p style="margin-top: -50px">017464*2565<br>018*9420849</p>
  <a href="https://www.facebook.com/huntermehedihasan/">
      <img class="img-3" src="images/facebook.png">
  </a>
  <a href="https://www.instagram.com/">
  <img class="img-4" src="images/instagram.png">
</a>


</div>  
</div>
</div>
</body>
</html>