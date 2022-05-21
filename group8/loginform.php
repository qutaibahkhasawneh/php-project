
<?php



?>
<html>
<head>
	<title> Login </title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" >
	<script src="script_login.js"></script>
</head>

<body>
<div id="myDiv">
  <h3 align="center"> Login </h3>
  <form onsubmit="return validation()" method="post" name="regForm"  action="loginform.php">
		
		<label>Email: *</label>
		<input type="text" name="email" size="25" placeholder="Your Email" />

		<label>Password: *</label>
		<input type="password" name="password" placeholder="Your Password" size="25" />
		

		<div align="center">
		<input type="submit" value="Login" name="login" />
		<input type="reset" value="Clear" onclick="clear2();" />
		<div>
  </form>
</div>



<?php

require "config.php";

if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];

$login= "SELECT * FROM user WHERE password='$password' and email='$email' ";
 

$result=$pdo->query($login);
$user=$result->fetch();
$count=$result->rowCount();

if($count==1){
session_start();
$_SESSION['loggeduser']=$email;
header('location:profile.php');
}else{
	echo "<h3 style='color:red'>Invalid user name and password</h3>";
}

}






?>

</body>

</html>