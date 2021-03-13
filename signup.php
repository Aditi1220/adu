<?php include 'pagetemp.php'; ?>
            <!-----   ---->
<?php include 'dbconnect3.php'; ?>
  
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;?>

<div class="col-md-6 pb-5">
        <div class="bg-white border p-3 pt-5 pb-5">     
            <h4>Sign Up</h4><br/>
         
        
        <form action="" method="post">
            
           <p> I Am  <input type="radio" name="iam" value="buyer" checked> Buyer 
               <input type="radio"  name="iam" value="seller"> Seller  </p> <br/>
            <input type="name"required="required" name="uname" class="form-control" placeholder="Name" pattern="[A-Z a-z]{2,40}"><br/>
            <input type="email"required="required" name="eml" class="form-control" placeholder="Email"><br/>
             <input type="password"required="required" name="pwd" class="form-control" placeholder="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title='Must have one UpperCase, LowerCase, Number/SpecialChar and min 8 Chars'><br/>
             <div class="row">
                 <div class="col-md-3">
             <input type="text" class="form-control" placeholder="+91" readonly="readonly" style="background:white">
                 </div>
                 <div class="col-md-9"> 
                     <input type="tel"required="required" name="nmb" class="form-control" placeholder="Your Phone" pattern="[0-9]{10}"><br/> </div></div>
                      <label> <a href='index.php' style="color:success; text-decoration:none">By clicking below,you agree to Real Estate</a></label><br/><br/>
               <button type="submit" name="save" class="btn btn-outline-dark btn-block">Sign Up</button><br/>
             <p class="text-center">Already registerd?  <a href='login.php' style="color:coral; text-decoration:none">Login Now</a></p>
            </form>
            <?php
                if(isset($_POST['save']))
                {
                    
      $sql="insert into user(usertype,name,email,password,phone) 
     values('$_POST[iam]','$_POST[uname]','$_POST[eml]','$_POST[pwd]','$_POST[nmb]');";
        if($conn->query($sql)){
        $email='sharmaadi1214@gmail.com';
$password='Teddu1999';


$to_name=$_POST['uname'];
$to_id=$_POST['eml'];
$subject='Thank you for registering on Property4U';
$message='<h5>Dear '.$_POST['uname'].'</h5><h5> 
Congratulations! </h5> <p>Your  account has been created successfully.Log in to your property4u  account to find your account settings, and to buy or sell property .</p> <h5> Regards </h5> <h5> Team Property4U </h5>';
            

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';         
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();   
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $email;                   
    $mail->Password   = $password;                     
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
    $mail->Port       = 587;                                   
    $mail->setFrom($email,'Property4U');
    $mail->addAddress($to_id,$to_name);
    $mail->addReplyTo($email,'Information');
    $mail->isHTML(true); 
    $mail->Subject = $subject;
    $mail->Body    = $message;   
    $mail->send();
echo "<script>window.alert('Account has been created Successfully');window.location='login.php';</script>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
            
        }
            
        else
            echo"<div class='alert alert-dark'> Account Already Exist </div>";
        }
                ?>
     
            
            
            
        </div> </div>

    
        
      <div class="col-md-2"></div>
</div></div>



</div> 
  
</body> 
<script src="js/jquery-3.4.1.min.js">
</script>
<script src="js/bootstrap.bundle.min.js"></script>
</html>