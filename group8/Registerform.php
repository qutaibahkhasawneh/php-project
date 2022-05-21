
<html>
<head>
	<title>Registar Form </title>

	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" >
	<script src="script_register.js"></script>
	<style>


	</style>
</head>

<body>
<div id="myDiv">
  <h2 align="center"> Registration Form </h2>
  <form id="form" onsubmit="return validation()" method="post" name="regForm"  action="">
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
		<input type="reset" value="Clear" onclick="clear2();" /><br><br>
		<?php  echo "<span>Have already an account?</span><a id='login' href='loginform.php'>login<a>";?>
		<div>
  </form>
</div>


<?php

require "config.php";

if(isset($_POST['submit']))
{

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$city=$_POST['city'];
$address=$_POST['address'];
$phone=$_POST['mobile'];



$insertUser= "INSERT INTO  user (password,email,address,city,phone,username)
 VALUES (:password,:email,:address,:city,:phone,:username)";
 
// injection

$result=$pdo->prepare($insertUser);
$result->execute([':password'=>$password,':email'=>$email,':address'=>$address,':city'=>$city,':phone'=>$phone,':username'=>$username]);

if($result){
    echo "<h2 style='color:blue'>User Created succssfully</h2>";
     echo "<span>Have already an account?</span><a id='login' href='loginform.php'>login<a>";
    
}else{
    echo "User failed to login";
}

}



?>


</body>

</html>