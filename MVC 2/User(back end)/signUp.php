<?php
include "includes/db.php";
session_start();
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
        var fname=document.form.firstname.value;
        var lname=document.form.lastname.value;
        var email=document.form.email.value;
        var password=document.form.password.value;
        var c_password=document.form.cpassword.value;
        var atpos=email.indexOf("@");
        var dtpos=email.lastIndexOf(".");
        if(!fname || !lname || !email || !password || !c_password){
            alert("All feild is requrired");
            return false;
        }
        if(password!=c_password){
            alert("password and confirm password are not same");
            return false;
        }
        if(atpos<1 || dtpos-atpos<2){
            alert("plese enter valid email id");
            document.form.email.focus();
            return false;
        }
        if(password.length<6 && password.length<24){
            alert("password must be 6 to 24 character");
            return false;
        }
        else{
                return true;
        }
        }
    </script>
    
</head>

<?php
   
   if(isset($_POST['signup']))
   {
       $firstname=$_POST['firstname'];
       $lastname=$_POST['lastname'];
       $email=$_POST['email'];
       $_SESSION['email']=$email;
       $_SESSION['firstname']=$firstname;
       
       $password=$_POST['password'];
       $sql="SELECT * FROM users WHERE EmailID='$email'";
       $select_email=mysqli_query($conn,$sql);
       $row=mysqli_num_rows($select_email);
        if($row>0){
            echo "<script>alert('Already Register Email Id')</script>";
       }
       else{
           $query="INSERT INTO users (ID,RoleID,FirstName,LastName,EmailID,Password,IsEmailVerified,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive)
           VALUES('','1','{$firstname}','{$lastname}','{$email}','{$password}','','','','','','')";
           $result=mysqli_query($conn,$query);
           
           if(!$result){
               die("FAILED".mysqli_error($conn));
           }
           else{
               echo '<p id="suc"><i class="fa fa-check-circle"></i>Your account has been successfully created</p>';
               header("Location:emailvari.php");
           }
       } 
   
   }
   
   
   
   ?>
<body>
    

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Sign Up-->
    <section id="ForP">
        <div class="bg-img-sU">
            <img id="logo" src="images/pre-login/top-logo.png" alt="logo" class="center img-responsive">
            <form method="post" name="form" action="" onsubmit="return(validate());" class="container-sU">
                <h1 id="login-01">Create an Account</h1>
                <p id="para">Enter your details to signUp</p>
<!--                <p id="suc"><i class="fa fa-check-circle"></i>Your account has been successfully created</p>-->
                <div class="form-group">
                    <label for="exampleInputEmail1"><span id="email1">First Name*</span></label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Your Email" value="john">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><span id="email1">Last Name*</span></label>
                    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Your Last Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><span id="email1">Email*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">Password</span></label>
                    <input type="password" class="form-control sU" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,24}" name="password" title="password is not valid format it contain atleast 1 lowercase,1 uppercase,1 special character,1 digit" id="exampleInputPassword" placeholder="Enter Your Password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">Confirm Password</span></label>
                    <input type="password" class="form-control sU" name="cpassword" id="exampleInputPassword" placeholder="Re-enter Your Password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <input type="submit" name="signup" value="SIGN UP" class="btn btn-primary">
                <p id="acc-su">Already have an account?<a id="su" href="Login.php">Login</a></p>
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