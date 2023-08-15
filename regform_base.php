<?php 
$valid=$fnameErr=$emailErr=$passErr=$cpassErr=$mbnoErr='';
$fn=$em=$ps=$cps=$mb="";
extract($_POST);
if(isset($_POST['submit']))
{
   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $validpass="/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
if(empty($name)){
   $fnameErr="First Name is Required"; 
}
else if (!preg_match($validName,$name)) {
   $fnameErr="Digits are not allowed";
}else{
   $fnameErr=1;
}
if(empty($email)){
  $emailErr="Email is Required"; 
}
else if (!preg_match($validEmail,$email)) {
  $emailErr="Invalid Email Address";
}
else{
  $emailErr=1;
}
if(empty($pass)){
  $passErr="Password is Required"; 
} 
elseif (!preg_match($validpass,$pass)) {
  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
}
else{
   $passErr=1;
}
if($cpass!=$pass){
   $cpassErr="Confirm Password doest Matched";
}
else{
   $cpassErr=1;
}

if(empty($mob)){
   $mbnoErr="Enter mobile no";
}
else if(!preg_match("/^[0-9]{10}+$/",$mob)){
   $mbnoErr="Enter Valid mobile number";
}
else{
   $mbnoErr=1;
}
$fn=$name;
$em=$email;
$ps=$pass;
$cps=$cpass;
$mb=$mob;
// check all fields are valid or not
if($fnameErr==1 && $emailErr==1 && $passErr==1 && $cpassErr==1  && $mbnoErr==1)
{
   $servername = "localhost";
   $username = "root";
   $password = "";
   $conn = mysqli_connect($servername, $username, $password,'candy');
   $x=mysqli_query($conn,"select * from login where email='$email';");
   if($x->num_rows!=0){
    
    $valid="This email is already registerd";
   }
   else{
    $result=mysqli_query($conn,"insert into login values('$name','$email','$pass','$mob');");
    $valid="Successfully registered";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="regform_base_css.css">
    <script src="https://kit.fontawesome.com/9ab7a857e2.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Nunito+Sans:wght@800&family=Orbitron&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="form-class">
            <h1>Sign Up</h1>
            <span><?php echo $valid;?></span>
            <form method="post">
                <div class="input-class">
                    <div class="entry">
                        
                        <input type="text" placeholder="User Name" name="name" value="<?php echo $fn;?>">
                    </div>
                    <span><?php  if($fnameErr!=1) echo $fnameErr;?></span>
                    <div class="entry">
                        
                        <input type="text" placeholder="Email" name="email" value="<?php echo $em;?>">
                    </div>
                    <span><?php  if($emailErr!=1) echo $emailErr;?></span>
                    <div class="entry">
                        
                        <input type="password" placeholder="Password" name="pass" value="<?php echo $ps;?>">
                    </div>
                    <span><?php  if($passErr!=1) echo $passErr;?></span>
                    <div class="entry">
                        
                        <input type="password" placeholder="Confirm Password" name="cpass" value="<?php echo $cps;?>">
                    </div>
                    <span><?php  if($cpassErr!=1) echo $cpassErr;?></span>
                    <div class="entry">
                        
                        <input type="number" placeholder="Mobile Number" name="mob" value="<?php echo $mb;?>">
                    </div>
                    <span><?php  if($mbnoErr!=1) echo $mbnoErr;?></span>
                    <div class="btn-class">
                        <button type="submit" name="submit">Sign Up</button>
                    </div><br>
                    <p>Already have account ? <a href="signinform_base.php">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>