<?php
include 'connection.php';

$message ="";
if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['gender']))
{
	$FirstName = $_POST['fname'];
	$LastName = $_POST['lname'];
	$Email = $_POST['email'];
	$pnumber=$_POST['pnumber'];
	$password = $_POST['password'];
	$Gender = $_POST['gender'];



	$select = "SELECT email from users where email='$Email'";
	$insert = "INSERT INTO users (fname, lname, email,password, gender,p_number) VALUES ('$FirstName','$LastName','$Email','$password','$Gender','$pnumber')";

		//Prepare statement
	$stmt = $conn->query($select);

	if($stmt->num_rows ==0)
	{
		
		$result = $conn->query($insert);
		if ($result ==1) {
			$message = "Registration is successfull";

		} else {
			$message = "Something went wrong! You're not registered";
		}
	}
	else $message = "Please Use new email this email is allready used";

	$conn->close();

}
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="images/logo.png">
    	<link rel="stylesheet" href="css/stylesheet2.css?v=<?php echo time();?>">	
	<title>Get Registration | UK Bangla Airlines</title>
</head>
<body style=" background: red">
<div class="reg" align="center">
	<div class="reg-content" style="background-color: #DCDA33">
		<img src="images/profile.png">
<h5 style="color: red"><center><?php if ($message !="") { echo $message;} ?></center></h5 style="color: red"> 		

<div style="margin-top: -25px">
	<form action="Registration.php" method="POST" align="center">

		<input type="text" style="margin-top: 20px;" name="fname" placeholder="First Name" class="form " required>
		<input type="text" name="lname" placeholder="Last Name" class="form form-br" required>
				<input type="number" name="pnumber" placeholder="Enter Your Phone Number" class="form form-br" required>	
		
		<input type="Email" name="email" placeholder="Enter Your Email Address" class="form form-br" required>
		
		<input type="Password" name="password" placeholder="Password" class="form form-br" required><br>
		<b>Gender</br> <input type="radio" name="gender" value="male" required>Male<input type="radio" name="gender" value="female" required>female<input type="radio" name="gender" value="others" required>Others<br></b>
		<button type="submit"  class="btn btn-success">Submit</button>
		<center><b>Allready have account.I want to <a href="login_form.php"> Login</a></b></center>
		
	</form>
</div>
	</div>
	</div>
</body></html>

