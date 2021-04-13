<?php
include "includes/db.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- important meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1">

    <!-- Title-->
    <title>Notes-MarketPlace</title>

    <!--Favicon-->
    <link rel="shortcut icon" href="images/Homepage/favicon.ico">

    <!-- Goggle Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!--Fontawesom -->
    <link rel="stylesheet" href="css/font-awesom/css/font-awesome.min.css">

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css.css">

    <!-- custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--Responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript">
        function validate(){
        
        var email=document.form.email.value;
        
        var atpos=email.indexOf("@");
        var dtpos=email.lastIndexOf(".");
        if(!email){
            alert("All feild is requrired");
            return false;
        }
        
        if(atpos<1 || dtpos-atpos<2){
            alert("plese enter valid email id");
            document.form.email.focus();
            return false;
        }
        
        else{
                return true;
        }
        }
    </script>
</head>


<?php
    
  if(isset($_POST['submit'])){
     
    $email=$_POST['email'];
      $query="SELECT * FROM users WHERE EmailID='{$email}'";
      $result=mysqli_query($conn,$query);
      $count=mysqli_num_rows($result);
      if($count>0){
           $to=$email;
           $subject="New Temporary Paaword has been created for you";
          $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          $password=substr(str_shuffle($chars),0,8);
           $msg="Hello,
                We have generted a new password for you".
                "password:".$password."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".
                "Regards,"."\r\n".
                "Notes Market Place";

           $header="From:dhara8186@gmail.com";
    
           if(mail($to,$subject,$msg,$header)){
             header("Location:login.php?msg=your password changed successfully");
               
           }
          $query="UPDATE users SET Password='{$password}' WHERE EmailID='{$email}'";
          $result=mysqli_query($conn,$query);
          if(!$result){
              echo "noooo";
          }
      }
      else{
          echo "<script>alert('EmailID Not Found')</script>";
      }
  }  
    
    
    
    
    
?>

<body>


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Forgot password-->
    <section id="ForP">
        <div class="bg-img">
            <img id="logo" src="images/pre-login/top-logo.png" alt="logo" class="center img-responsive logo-fp">
            <form method="post" action="" class="container-fp" onsubmit="return(validate());">
                <h1 id="login-01">Forgot Password?</h1>
                <p id="para">Enter your email to reset your password</p>
                <div class="form-group">
                    <label for="exampleInputEmail1"><span id="email1">Email</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email"><br>
                    <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                </div>
            </form>
        </div>
    </section>
    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>
</body>

</html>
