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
</head>
<?php
    if(isset($_POST['verify'])){
        $email=$_SESSION['email'];
        $query="SELECT ID FROM users WHERE EmailID='{$email}' ";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            
        }
        $_SESSION['id']=$id;
       $member=$_SESSION['firstname'];
       $to=$_SESSION['email'];
       $subject="Note Marketplace-Email Verification";
       $msg="Hello $member,
            Thank You for Signing up with us,Please click on below link to verify your email address and to do login"."\r\n".
            "Click below link to verify email address http://localhost/note/user/active.php?id=$id".
           "\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".
            "Regards,"."\r\n".
            "Notes Market Place";
        
       $header="From:dhara8186@gmail.com";
    
       if(mail($to,$subject,$msg,$header)){
           header("Location:login.php");
       } 
   }
?>
<body id="body">
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

    <!--Email verification-->
    <div class="container-email" style="margin-top: 100px; margin-left:350px;height:500px">
    <form method="post">
    <table style="background: #fff;width:600px;height:400px;">
        <tr>
            <td>
                <img id="logo-email" src="images/Homepage/darklogo.png" alt="logo"
                style="margin-top:-150px; margin-left:70px;" class="img-responsive"> 
            </td>
            <td>
                <h1 id="heading-email"style="margin-top:-70px;margin-left:-260px">Email Varification</h1>
            </td>
            <td>
                <h5 style="margin-left:-260px; margin-top:10px;">Dear Smith,</h5>
            </td>
            <td>
                <p style="margin-left:-260px; margin-top:100px" class="para1-email">Thanks for Signing up!</p>
                <p style="margin-left:-260px;" class="para2-email">Simply click below for email verification </p>
            </td>
            <td>
                <button name="verify" style="margin-left:-300px; margin-top:350px;" type="submit" class="btn btn-primary btn-email">VERIFY EMAIL ADDRESS</button>
            </td>
        </tr>
    </table>
        </form>

    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>
</body>

</html>