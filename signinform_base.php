<?php 
    $invalid="";
    $conn=new mysqli('localhost','root','','candy');
    if(isset($_POST['submit'])){
        extract($_POST);
        $result=mysqli_query($conn,"select * from login where email='$email';");
        if($result->num_rows>0){
            $check=$result->fetch_assoc()['pass'];
            if($check===$pass){
                header("Location: index.html");
            }
        }
            $invalid="Email or password is wrong";
 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <link rel="stylesheet" href="regform_base_css.css">
    
</head>
<body>
    <div class="container">
        <div class="form-class">
            <h1>Sign In</h1>
            <form method="post">
                <p color="red"><?php echo $invalid;?></p>
                <div class="input-class">
                    <div class="entry">
                        <i class="fa-solid fa-envelope" style="color: #f47ee1;"></i>
                        <input type="email" placeholder="Email" name="email">
                    </div>
                    <div class="entry">
                        <i class="fa-solid fa-lock" style="color: #f47ee1;"></i>
                        <input type="password" placeholder="Password" name="pass"> 
                    </div>
                    <div class="btn-class">
                        <button type="submit" name="submit">Sign In</button>
                    </div><br>
                    <p>Forgot Password ? <a href="">Click here</a></p><br>
                    <p>Didn't have account ? <a href="regform_base.php">Sign Up</a></p>
                    <p>Take me home |<a href="index.html">Home</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>