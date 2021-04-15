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

    <!--animate css-->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!-- custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    
    <script type="text/javascript">
        function validate(){
        var fullname=document.form.fullname.value;
        var email=document.form.email.value;
        var subject=document.form.subject.value;
        var comment=document.form.comment.value
        var atpos=email.indexOf("@");
        var dtpos=email.lastIndexOf(".");
        if(!fullname || !email || !subject || !comment){
            alert("All feild is requrired");
            return false;
        }
        if(atpos<1 || dtpos-atpos<2){
            alert("plese enter valid email id");
            return false;
        }
        if(!/^[a-zA-Z]+$/.test(fullname)){
            alert("Numeric value not allowed in full name");
            return false;
        }
        
        else{
            return true;
        }   
        }
    </script>
</head>
<body>
    
 <?php
    
   
    if(isset($_POST['submit'])){
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $subject=$_POST['subject'];
        $comment=$_POST['comment'];
        
        
               $to="dhara8186@gmail.com";
               $subject=$_POST['subject'];
               $msg="Hello,"."\r\n".
                   $_POST['comment']."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".


                    "Regards,"."\r\n"
                    .$_POST['fullname'];

               $header=$_POST['email'];
                
               if(mail($to,$subject,$msg,$header)){
                    header("Location:home.html");
               }
        
    
    
    }
    
    $id=$_SESSION['id'];
    $query="SELECT * FROM users WHERE ID='{$id}'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $name=$row['FirstName'];
        $email=$row['EmailID'];
        $name1=$row['LastName'];
        $name3=$name.''.$name1;
    }
    
    if($id){
        echo "<!-- Preloader -->
    <div id='preloader''>
        <div id='status'>&nbsp;</div>
    </div>
    <!--Header-->
    <div class='header header-note'>
        <div class='navbar-header'>
            <!-- LOGO-->
            <a href='home.html'>
                <img src='images/Homepage/darklogo.png' alt='logo' id='logo-header-user'>
            </a>
        
        <!--Mobile Menu Open Button-->
        <span id='mobile-nav-open-btn'>&#9776;</span>

    </div>

    <div class='header-right header-buyer header-contact'>
        <ul class='nav nav2 navbar-nav pull-right'>
            <li><a href='search.php'>Search Note</a></li>
            <li><a href='dashboard.php'>Sell Your Notes</a></li>
            <li><a href='faq.html'>FAQ</a></li>
            <li><a href='contact.php'>Contact Us</a></li>
            <li>
                <form action='Login.php'><input type='submit' class='btn2 btn-contact' value='Login'></form>
            </li>
        </ul>
    </div>
    <!--Mobile Menu-->
    <div id='mobile-nav'>
        <!--Mobile Menu Close Button-->
        <span id='mobile-nav-close-btn'>&times;</span>
        <div id='mobile-nav-content'>
            <ul class='nav'>
                <li><a href='search.php'>Search Note</a></li>
                <li><a href='dashboard.php'>Sell Your Notes</a></li>
                <li><a href='buyerreq.php'>Buyer Requests</a></li>
                <li><a href='faq.html'>FAQ</a></li>
                <li><a href='contact.php'>Contact Us</a></li>
                <li>
                    <form action='Login.php'><input type='submit' class='btn2 btn2-user btn-search-mobile' value='Login'></form>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <!--Header End-->

    <!--Home page-->
    <section id='User-profile'>
        <!-- overlay -->
        <div id='home-overlay'></div>
        <!--Home content-->
        <div id='home-content' class='contact'>
            <div id='home-content-inner'>
                <div id='home-heading'>
                    <h1 class='heading-user contact-heading wow zoomIn' data-wow-duration='1s'>Contact Us</h1>
                </div>
            </div>
        </div>
    </section>";
    
    
        echo "<section id='get-in-touch'>
        <form method='post' name='form' action='' onsubmit='return(validate());'>
        <div class='get-in-touch'>
            <h1 class='get-in-touch2'>Get In Touch</h1>
            <h5>Let us know how to get back to you</h5>
            <div class='row'>
              
                <div class='col-md-6'>
                    <div class='form-group-left full'>
                        <label for='exampleInputEmail1'><span class='label'>Full Name*</span></label>
                        <input type='text' name='fullname' class='form-control user' id='exampleInputEmail1'
                            aria-describedby='emailHelp' value=$name3 placeholder='Enter Your full name'>
                    </div>
                    <div class='form-group-left full'>
                        <label for='exampleInputEmail1'><span class='label'>Email Address*</span></label>
                        <input type='email' name='email' value=$email class='form-control user' id='exampleInputEmail1'
                            aria-describedby='emailHelp' placeholder='Enter your email address'>
                    </div>
                    <div class='form-group-left full'>
                        <label for='exampleInputEmail1'><span class='label'>Subject*</span></label>
                        <input type='text' class='form-control user' id='exampleInputEmail1'
                            name='subject' aria-describedby='emailHelp' placeholder='Enter your subject'>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group-right comment'>
                        <label for='exampleFormControlTextarea1'><span class='label'>Comments/Questions*
                            </span></label>
                        <textarea class='form-control user' name='comment' placeholder='comments...' rows='11'></textarea>
                    </div>
                </div>
                
            </div>
            
        </div>
    

    <input name='submit' type='submit' class='btn-userP btn-contact btn-userPro' style='margin-left:150px;' value='SUBMIT'>
    </form>
    </section>";
    }

else{
   

    
echo '<!-- Preloader -->

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Header-->
    <div class="header header-note">
        <div class="navbar-header">
            <!-- LOGO-->
            <a href="home.html">
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">
            </a>
        
        <!--Mobile Menu Open Button-->
        <span id="mobile-nav-open-btn">&#9776;</span>

    </div>

    <div class="header-right header-buyer header-contact">
        <ul class="nav nav2 navbar-nav pull-right">
            <li><a href="search.php">Search Note</a></li>
            <li><a href="dashboard.php">Sell Your Notes</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li>
                <form action="Login.php"><input type="submit" class="btn2 btn-contact" value="Login"></form>
            </li>
        </ul>
    </div>
    <!--Mobile Menu-->
    <div id="mobile-nav">
        <!--Mobile Menu Close Button-->
        <span id="mobile-nav-close-btn">&times;</span>
        <div id="mobile-nav-content">
            <ul class="nav">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="buyerreq.php">Buyer Requests</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>
                    <form action="Login.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Login"></form>
                </li>
            </ul>
        </div>
    </div>
    </div>
    <!--Header End-->

    <!--Home page-->
    <section id="User-profile">
        <!-- overlay -->
        <div id="home-overlay"></div>
        <!--Home content-->
        <div id="home-content" class="contact">
            <div id="home-content-inner">
                <div id="home-heading">
                    <h1 class="heading-user contact-heading wow zoomIn" data-wow-duration="1s">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <!--Get in touch-->
    <section id="get-in-touch">
        <form method="post" name="form" action="" onsubmit="return(validate());">
        <div class="get-in-touch">
            <h1 class="get-in-touch2">Get In Touch</h1>
            <h5>Let us know how to get back to you</h5>
            <div class="row">
              
                <div class="col-md-6">
                    <div class="form-group-left full">
                        <label for="exampleInputEmail1"><span class="label">Full Name*</span></label>
                        <input type="text" name="fullname" class="form-control user" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter Your full name">
                    </div>
                    <div class="form-group-left full">
                        <label for="exampleInputEmail1"><span class="label">Email Address*</span></label>
                        <input type="email" name="email" class="form-control user" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <div class="form-group-left full">
                        <label for="exampleInputEmail1"><span class="label">Subject*</span></label>
                        <input type="text" class="form-control user" id="exampleInputEmail1"
                            name="subject" aria-describedby="emailHelp" placeholder="Enter your subject">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-right comment">
                        <label for="exampleFormControlTextarea1"><span class="label">Comments/Questions*
                            </span></label>
                        <textarea class="form-control user" name="comment" placeholder="comments..." rows="11"></textarea>
                    </div>
                </div>
                
            </div>
            
        </div>
    

    <input name="submit" type="submit" class="btn-userP btn-contact btn-userPro" style="margin-left:150px;" value="SUBMIT">
    </form>
    </section>
    <hr>';
}
    ?>
    <hr>
    <!--Footer-->
    <?php
        $query="SELECT * FROM systemconfiguration WHERE KEY1='Facebook url'";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("fail".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($result)){
            $facebook=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE KEY1='Twitter'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            
            $twi=$row['Value'];
           
        }
        $query="SELECT * FROM systemconfiguration WHERE KEY1='LinkedIn'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            
            
            $link=$row['Value'];
        }
        
        
        
        ?>
    <footer id="footer">
        <p>
            <span class="footer-p">Copyright &copy; TatvaSoft All rights reserved.</span>
            <a href='<?php echo $facebook; ?>' class="social-list"><i class="fa fa-facebook"></i></a>
            <a href='<?php echo $twi; ?>' class="social-list"><i class="fa fa-twitter"></i></a>
            <a href='<?php echo $link; ?>' class="social-list"><i class="fa fa-linkedin"></i></a>
        </p>
    </footer>
    <!--Footer Ends-->



    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--wow js-->
    <script src="js/wow/wow.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>
</body>
</html>