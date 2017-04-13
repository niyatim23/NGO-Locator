<?php
session_start();
?>
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);

if($username && $password){
	$connect=mysqli_connect("localhost","root","","ngoogle") or die("Connection Error");
	$query=mysqli_query($connect, "SELECT * FROM user_id WHERE userid='$username'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0){
		$row=mysqli_fetch_array($query);
		$dbusername=$row['userid'];
		$dbpassword=$row['password'];
	}
	else{
		echo '<script type="text/javascript">alert("Please Signup first!");</script>';
		echo '<script type="text/javascript">window.location="index.php";</script>';
	}

	if($username==$dbusername && $password==$dbpassword){
		$_SESSION['username']=$row['userid'];
		$_SESSION['fname']=$row['fname'];
		$_SESSION['email']=$row['email_id'];
		$_SESSION['password']=$row['password'];
		echo '<script type="text/javascript">alert("Login Successful");</script>';
		echo '<script type="text/javascript">window.location="index.php";</script>';
	}
	else if($username!=$dbusername || $password!=$dbpassword){
		//$_SESSION['username']=$row['userid'];
		//$_SESSION['email']=$row['email'];
		//$_SESSION['password']=$row['password'];
		echo '<script type="text/javascript">alert("Incorrect Username or Password");</script>';
		echo '<script type="text/javascript">window.location="index.php";</script>';
	}
}
else{
	echo '<script type="text/javascript">alert("Please fill all the fields!");</script>';
	echo '<script type="text/javascript">window.location="index.php";</script>';	
}
?>