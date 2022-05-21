<?php

require "config.php";

session_start();
if(!isset($_SESSION['loggeduser'])){
    header('loginform.php');
}

$email=$_SESSION['loggeduser'];
$viewuser="SELECT * FROM user WHERE email='$email' ";
$result=$pdo->query($viewuser);
if(!$result){
    echo"Error ";
}


$row=$result->fetch(PDO::FETCH_ASSOC);

echo $row['password'];


?>
	<link rel="stylesheet" type="text/css" href="style.css" >
	<script src="script_register.js"></script>
	<style>


	</style>
</head>

<body>
<div id="myDiv">
  <h3 align="center"> Registration Form </h3>
  <form onsubmit="return validation()" method="post" name="regForm"  action="">
		<label>User Name: *</label>
		<input type="text" name="username" placeholder="user name" size="25" />
		
		<label>Email: *</label>
		<input type="text" name="email" size="25" placeholder="Your Email" />

		<label>Password: *</label>
		<input type="password" name="password" placeholder="Your Password" size="25" />
		<label>City:</label>
		<input type="text" name="city" size="25" placeholder="Your city" />
		<label>Address:</label>
		<input type="text" name="address" size="25" placeholder="Your Adress" />
		<label>Phone:</label><br><br>
		<input style=" height :35px  " type="number" name="mobile" size="35" placeholder="Your Phone" /><br><br>

		<div align="center">
		<input type="submit" value="Register" name="submit" />
		<input type="reset" value="Clear" onclick="clear2();" />
		<div>
  </form>
</div>