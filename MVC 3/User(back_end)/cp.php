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

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript">
        function validate(){
        var old_password=document.form.oldpassword.value;
        var new_password=document.form.newpassword.value;
        var con_password=document.form.conpassword.value;
        if(!old_password || !new_password || !con_password){
            alert("All feild is requrired");
            return false;
        }
        if(new_password!=con_password){
            alert("password and confirm password are not same");
            return false;
        }
         if(new_password.length<6 && new_password.length<24){
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
    
$id=$_SESSION['id'];
$query="SELECT * FROM users WHERE ID='{$id}'";
$result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $password=$row['Password'];
    }
    $old_password='';
    if(isset($_POST['submit'])){
        $old_password=$_POST['oldpassword'];
        $new_password=$_POST['newpassword'];
        if($old_password!=$password){
            echo "<script>alert('Enter Password is not match')</script>";
        }
        else{
            $query_pass="UPDATE users SET Password='{$new_password}' WHERE ID='{$id}'";
            $result_pass=mysqli_query($conn,$query_pass);
            if($result_pass){
                header("Location:login.php");
            }
        }
    }
    ?>
<body>


    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--change password-->
    <form method="post" name="form" onsubmit="return(validate());">
    <section id="ForP">
        <div class="bg-img">
            <img id="logo" src="images/pre-login/top-logo.png" alt="logo" class="center logo-cp img-responsive">
            <div class="container">
                <h1 id="login-01">Change Password</h1>
                <p id="para">Enter your new password to chnage your password</p>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">Old Password</span></label>
                    <input type="password" class="form-control sU" name="oldpassword" id="exampleInputPassword" placeholder="Enter Your Password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">New Password</span></label>
                    <input type="password" class="form-control sU" name="newpassword" id="exampleInputPassword1" placeholder="Enter Your Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,24}">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">Confirm Password</span></label>
                    <input type="password" class="form-control sU" name="conpassword" id="exampleInputPassword2" placeholder="Enter Your Password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
            </div>
        </div>
    </section>
    </form>
    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>
</body>

</html>