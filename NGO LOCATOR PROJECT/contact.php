<?php
	require('phpmailer/PHPMailerAutoload.php');
	$name1 = $_POST["name_sender"];
	$email1 = $_POST["email_sender"];
	$message1 = $_POST["message_sender"];

	$connect=mysqli_connect("localhost","root","","ngoogle") or die("Connection Error");
	$query=mysqli_query($connect, "INSERT INTO ngoogle.contact_us(name,email,message) values('$name1','$email1','$message1')");
	$mail = new PHPMailer(true);  
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 0;  
	$mail->SMTPAuth = true;  
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';	$message = "
			  
Thank You ".$name1." for contacting us!
We will contact you in 24 hours.
Help others by signing up on our website and start donating!
			  
If this email is delivered to your spam box,please mark this as 'Not Spam'.
			  
			  ";
	$mail->Timeout = 3600; 
	$mail->Username = "wehelpyout@gmail.com";  
	$mail->Password = "chinaiscommunist";           
	$mail->SetFrom('noreply@ngoogle.com', 'NGOOGLE'); 
	$mail->Subject = "We have your valuable message";
	$mail->Port       = 465;                   
	$mail->SMTPSecure = "ssl"; 
	$mail->Body = $message;
	$mail->AddAddress($email1);
	if(!$mail->Send())
	  {
	  echo '<script type="text/javascript">alert("There was an error while sending you an email:(");</script>';
	  echo '<script type="text/javascript">window.location="index.php";</script>';
	  } 
	else
	  {
	  echo '<script type="text/javascript">alert("Thank You for reaching out. We have sent you an email:)");</script>';
	  echo '<script type="text/javascript">window.location="index.php";</script>';
	  }

?>