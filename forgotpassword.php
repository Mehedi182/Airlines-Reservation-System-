<?php
include 'connection.php';

session_start();

$m="";

if(!empty($_POST['email'])&&!empty($_POST['password'])){
$email =$_POST['email'];
$pass = $_POST['password'];

$sql= "UPDATE users SET password='$pass' WHERE email='$email'";

$result = $conn->query($sql);
$m="You have successfully changed your password";


}


?>
<html>
<head>
    <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>"> 
      <link rel="icon" href="images/logo.png">
      <title>Log In | UK Bangla Airlines</title>
</head>
<body style="background-color: red;">
 <div class="reg" align="center">  
    <div class="login-container" style="background-color: #DCDA33" align="center">
        <h2 class="fp">Forgot Password</h2><br>
          <h6><?php if($m!=""){echo $m;
            ?>
            Go to <a href="login_form.php">Log In</a> <?php
          }?></h6>
        <form action="" method="POST">
            
            <input type="email" name="email" class="form" placeholder="Enter your Email" required>
          
            <input type="Password" name="password" class="form form-br" placeholder="Enter New Password" required>
        <br>
            <button type="submit" class="btn btn-success form-br">Change password</button>
        </form> 
            </div>
            </div>
</body>
    </html>
