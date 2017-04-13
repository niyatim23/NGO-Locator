<?php  
  error_reporting(0);
  session_start();
?>
<?php
require('phpmailer/PHPMailerAutoload.php');
 $username=$_SESSION['username'];
 $email_user=$_SESSION['email'];
 if(isset($_POST["clothes_ngo"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "ngoogle") or die("Connection Error");  
      $update = mysqli_query($connect, "UPDATE ngoogle.user_id set donations=donations+1 where userid='$username'"); 
      $user_details = mysqli_query($connect,"SELECT fname,lname,email_id,pincode FROM ngoogle.user_id WHERE userid='$username'");
      $user_row = mysqli_fetch_array($user_details);
      $result = mysqli_query($connect, "SELECT name,address FROM ngoogle.ngo WHERE type=4");  
      $output .= '  
           <div style="max-height:300px;overflow-y:scroll"><table class="table table-hover">
              <tr>
                <th width="50%">NAME</th>
                <th width="50%">ADDRESS</th>
              </tr>';
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                     <td width="50%">'.$row["name"].'</td>   
                     <td width="50%">'.$row["address"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  

$mail = new PHPMailer(true);  
                $mail->IsSMTP(); 
                $mail->SMTPDebug = 0;  
                $mail->SMTPAuth = true;  
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com'; $message = "
                      
Thank You for showing willingness to donate!
We are sending you details of the NGOs:

";
                $result = mysqli_query($connect, "SELECT name,address,email,pin_code FROM ngoogle.ngo WHERE type=4");  
                while($row_email = mysqli_fetch_array($result)){
                  $message.="Name: ".$row_email["name"]."
Address: ".$row_email["address"]."
Email Address: ".$row_email["email"]."
Pincode: ".$row_email["pin_code"]."

";
                }
                $message.="Keep Donating!";
                $mail->Timeout = 3600; 
                $mail->Username = "wehelpyout@gmail.com";  
                $mail->Password = "chinaiscommunist";           
                $mail->SetFrom('noreply@ngoogle.com', 'NGOOGLE'); 
                $mail->Subject = "List of NGOs";
                $mail->Port       = 465;                   
                $mail->SMTPSecure = "ssl"; 
                $mail->Body = $message;
                $mail->AddAddress($email_user);
                $mail->Send(); 
      
            $result = mysqli_query($connect, "SELECT email FROM ngoogle.ngo WHERE type=4");
      while($rows = mysqli_fetch_array($result)){
                $mail = new PHPMailer(true);  
                $mail->IsSMTP(); 
                $mail->SMTPDebug = 0;  
                $mail->SMTPAuth = true;  
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'smtp.gmail.com'; $message = "
                      
Hello!
Our User ".$user_row["fname"]." ".$user_row["lname"]." wants to donate clothes to your NGO.
We are forwarding our user details to you for you to contact him/her.
Please use the details with the donor's privacy in mind.
First Name:".$user_row["fname"]."
Last Name:".$user_row["lname"]."
Email Address:".$user_row["email_id"]."
Pincode:".$user_row["pincode"]."
                      
                      ";
                $mail->Timeout = 3600; 
                $mail->Username = "wehelpyout@gmail.com";  
                $mail->Password = "chinaiscommunist";           
                $mail->SetFrom('noreply@ngoogle.com', 'NGOOGLE'); 
                $mail->Subject = "User wants to donate";
                $mail->Port       = 465;                   
                $mail->SMTPSecure = "ssl"; 
                $mail->Body = $message;
                $mail->AddAddress($rows["email"]);
                $mail->Send();
      }
       
 }  
 ?>  

 