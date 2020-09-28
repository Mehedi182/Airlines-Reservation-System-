<?php
include 'connection.php';
session_start();

$m="";

if(!empty($_POST['email'])&&!empty($_POST['password'])){
$email =$_POST['email'];
$pass = $_POST['password'];

$sql= "SELECT * FROM users WHERE email='$email' && password= '$pass'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $_SESSION["email_s"]=$row["email"];
        $_SESSION["password_s"]=$row["password"];
        header('Location: index.php');

    }
} else {
    $m="invalid email or password";
    //echo "inalid username or password";
}
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
    <div class="login-container"align="center">
        <img src="images/profile.png">
          <h4>
        <center style="color:red;"><?php if ($m !="") { echo $m;} ?></center></h4>
        <form action="" method="POST">
            <h3>Email</h3>
            <input type="email" name="email" class="form" placeholder="Enter your Email" required>
            <h3>Password</h3>
            <input type="Password" name="password" class="form" placeholder="Enter your Password" required>
        <br>
            <button type="submit" class="btn btn-success form-br">Log in</button>
        </form>
        <b><a href="forgotpassword.php">Forgot Password</a><br>
       I have No account.
 <a href="Registration.php">
           Sign Up!</b> </a> 
           <br>
              <b>Go for <a href="admin_login.php">admin login</a></b>

            </div>
            </div>
    
</body>
    </html>