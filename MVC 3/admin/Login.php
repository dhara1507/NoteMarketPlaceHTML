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
    <meta http-equiv="Cache-control" content="no-cache">

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
</head>
<?php
    $id='';
    if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $query="SELECT ID FROM users WHERE EmailID='{$email}'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['ID'];
        $_SESSION['id']=$id;
    }
    }
    $query_login="SELECT * FROM userprofile WHERE UserId='{$id}'";
    $result_login=mysqli_query($conn,$query_login);
    while($row=mysqli_fetch_assoc($result_login)){
        $id_login=$row['UserID'];
    }
    if(isset($_POST['submit'])){
    $email=$_POST['email'];
        $_SESSION['email1']=$email;
    $password=$_POST['password'];
        $_SESSION['password']=$password;
    
    if(empty($email) || empty($password))
    {
        echo "<script>alert('please fill empty filed')</script>";
    }
        $query="SELECT * FROM users WHERE EmailID= '{$email}' AND IsEmailVerified= '1' AND IsActive= 0";
        
        $select_user=mysqli_query($conn,$query);
        $count=mysqli_num_rows($select_user);
        while($row=mysqli_fetch_assoc($select_user)){
            $roleid=$row['RoleID'];
        }
        if($count==1){
            $query2="SELECT Password,ID FROM users WHERE Password='{$password}'";
            $result=mysqli_query($conn,$query2);
            $row=mysqli_fetch_assoc($result);
        
            if($password!=$row['Password']){
                  header("location:login.php?error=password not match");

            } 
            else if($roleid=='2'){
                
                header("Location:dashboard.php");
                
                
            }
            else if($roleid=='3'){
                
                header("Location:dashboard.php");
                
            }
            else{
                if($id_login){
                header("Location:../User(back_end)/search.php?id={$id}");
                }
                else{
                  header("Location:../User(back_end)/userp.php?id={$id}");  
                }
            }
        }
            else{
                 echo "<script>alert('you are not register')</script>";
            }
    }
    
  

?>


<body>






    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Login-->
    <section id="login">
        <div class="bg-img">
            <img id="logo" src="images/pre-login/top-logo.png" alt="logo" class="center img-responsive login-logo">
            <form method="post" action="" class="container">
                <h1 id="login-01">Login</h1>
                <p id="para">Enter your email address and password to login</p>
                <div class="form-group">
                    <label for="exampleInputEmail1"><span id="email1">Email</span></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><span id="pd">Password</span></label>
                    <p id="FP"><a href="fp.php" id="FP1">Forgot Password?</a></p>
                    <input type="password" class="form-control Lo" name="password" id="exampleInputPassword" placeholder="Enter Your Password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <!--
                    <small id='passHelp' class='form-text text-muted pw'>
                        The password you entered is incorrect</small>
-->
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
                <p id="acc">Don't have an account?<a id="su" href="signUp.php">SignUp</a></p>
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
