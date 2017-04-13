<?php
session_start();
?>
<?php
	require('phpmailer/PHPMailerAutoload.php');
	$servername="localhost";
	$user_name="root";
	$pass_word="";
	$database="ngoogle";


	$username = $_POST["username"];
	$password = $_POST["passwd"];
	$email_id = $_POST["email"];
	$first_name = $_POST["firstname"];
	$last_name = $_POST["lastname"];
	$country = $_POST["country"];
	$state = $_POST["states"];
	$city = $_POST["city"];
	$pin_code = $_POST["pincode"];

	if(empty($username) || empty($password) || empty($email_id) || empty($first_name) || empty($last_name) || empty($country) || empty($state) || empty($city) || empty($pin_code)){
		echo '<script type="text/javascript">alert("Please fill all the fields!");</script>';
		echo '<script type="text/javascript">window.location="index.php";</script>';
	}

	$password=md5($password);

	if(!empty($username)&&!empty($password)&&!empty($email_id)&&!empty($first_name)&&!empty($last_name)&&!empty($country)&&!empty($state)&&!empty($city)&&!empty($pin_code)){
		$conn=new mysqli($servername,$user_name,$pass_word,$database) or die("Connection Error");
		$check="SELECT * FROM ngoogle.user_id WHERE userid='$username' and password='$password';";
		$executequery=mysqli_query($conn,$check) or die(mysqli_errno($conn));
		$numrows=mysqli_num_rows($executequery);
		if($numrows>0){
			echo '<script type="text/javascript">alert("User already exists");</script>';
			echo '<script type="text/javascript">window.location="index.php";</script>';
		}
		else{
			$qr1 = "INSERT INTO ngoogle.user_id(userid,password,email_id,fname,lname,country,state,city,pincode) VALUES('$username','$password','$email_id','$first_name','$last_name','$country','$state','$city','$pin_code');";
			$conn=new mysqli($servername,$user_name,$pass_word,$database) or die("Connection Error");
			$execute=mysqli_query($conn,$qr1) or die(mysqli_errno($conn));
			$_SESSION['user']=$username;
			$_SESSION['email']=$email_id;
			$email = $email_id;
			$mail = new PHPMailer(true);  
			$mail->IsSMTP(); 
			$mail->SMTPDebug = 0;  
			$mail->SMTPAuth = true;  
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$message = "
			  
Thanks ".$first_name." ".$last_name." "."for signing up!
Your account has been created!
Now help others by logging in to our website and start donating!
			  
 If this email is delivered to your spam box,please mark this as 'Not Spam'.
			  
			  ";
			  $mail->Timeout = 3600; 
			  $mail->Username = "wehelpyout@gmail.com";  
			  $mail->Password = "chinaiscommunist";           
			  $mail->SetFrom('noreply@ngoogle.com', 'NGOOGLE'); 
			  $mail->Subject = "Now we will help you help others";
			  $mail->Port       = 465;                   
			  $mail->SMTPSecure = "ssl"; 
			  $mail->Body = $message;
			  $mail->AddAddress($email);
			  if(!$mail->Send())
			  {
			      //echo $mail->errorMessages();
			      echo '<script type="text/javascript">alert("There was an error while sending you an email:(");</script>';
				  echo '<script type="text/javascript">window.location="index.php";</script>';
			  } 
			  else
			  {
			     echo '<script type="text/javascript">alert("We have sent you an email:)");</script>';
			     echo '<script type="text/javascript">window.location="index.php";</script>';
			  }

			echo '<script type="text/javascript">alert("User added");</script>';
			echo '<script type="text/javascript">window.location="index.php";</script>';
		}
	}

	//mysqli_close($conn); 
?>