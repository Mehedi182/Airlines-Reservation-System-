
<?php
include 'connection.php';

session_start();

$m="";

if(!empty($_POST['username'])&&!empty($_POST['password'])){
$username =$_POST['username'];
$pass = $_POST['password'];

$sql= "SELECT * FROM admin WHERE username='$username' && password= '$pass'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $_SESSION["username"]=$row["username"];
        $_SESSION["password_s"]=$row["password"];
        header('Location: admin.php');

    }
} else {
    $m="invalid username or password";
    //echo "inalid username or password";
}
}


?>


<html>
<head>
    <link rel="stylesheet"  href="css/bootstrap.css">
      <link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>"> 
      <link rel="icon" href="images/logo.png">
      <title> Admin Log In | UK Bangla Airlines</title>
</head>
<body style="background-color: red;">
 <div class="reg" align="center">  
    <div class="login-container"align="center">
        <img src="images/profile.png">
          <h4>
        <center style="color:red;"><?php if ($m !="") { echo $m;} ?></center></h4>
        <form action="" method="POST">
            <h3>Username</h3>
            <input type="text" name="username" class="form" placeholder="Enter your Username" required>
            <h3>Password</h3>
            <input type="Password" name="password" class="form" placeholder="Enter your Password" required>
        <br>
            <button type="submit" class="btn btn-success form-br">Log in</button>
        </form>
 
    
</body>
    </html>