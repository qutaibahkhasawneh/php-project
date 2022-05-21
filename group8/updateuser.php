<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 's.php';
    
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


?>
</head>
<body>
<div id="myDiv">
  <h3 align="center"> Registration Form </h3>
  <form onsubmit="return validation()" method="post" name="regForm"  action="">
		<label>User Name: *</label>
		<input type="text" name="username" placeholder="user name" size="25" value="<?php  echo $row['username'];?>" />
		
		<label>Email: *</label>
		<input type="text" name="email" size="25" placeholder="Your Email" value="<?php  echo $row['email'];?>" />

		<label>Password: *</label>
		<input type="password" name="password" placeholder="Your Password" size="25" value="<?php  echo $row['password'];?>" />
		<label>City:</label>
		<input type="text" name="city" size="25" placeholder="Your city" value="<?php  echo $row['city'];?>"/>
		<label>Address:</label>
		<input type="text" name="address" size="25" placeholder="Your Adress" value="<?php  echo $row['address'];?>"/>
		<label>Phone:</label><br><br>
		<input style=" height :35px  " type="number" name="mobile" size="35" placeholder="Your Phone" value="<?php  echo $row['phone'];?>" /><br><br>

		<div align="center">
		<input type="submit" value="Update" name="update" />
		<input type="reset" value="Clear" onclick="clear2();" />
		<div>
  </form>
</div>
<?php

require "config.php";

if(isset($_POST['update']))
{

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$city=$_POST['city'];
$address=$_POST['address'];
$phone=$_POST['mobile'];
$userid=$row['user_id'];


  

$updatetUser= " UPDATE user SET password=:password, email=:email, address=:address, city=:city, phone=:phone, username=:username WHERE user_id=:id" ;
 
//injection

$update=$pdo->prepare($updatetUser);
$update->execute([':password'=>$password,':email'=>$email,':address'=>$address,':city'=>$city,':phone'=>$phone,':username'=>$username , ':id'=>$userid]);

if($update){
    echo "<h3 style='color:blue'>User update succssfully</h3>";
    header('location:profile.php');
    
}else{
    echo "User failed to login";
}

}


?> 
</body>
</html>
