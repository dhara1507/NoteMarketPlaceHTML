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

    <!--animate css-->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!--Responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript">
        function validate(){
            var fname=document.form.fname.value;
            var email=document.form.email.value;
            var lname=document.form.lastname.value;
            var code=document.form.code.value;
            var phone=document.form.phone.value;
            var add1=document.form.add1.value;
            var add2=document.form.add2.value;
            var city=document.form.city.value;
            var state=document.form.state.value;
             var zip=document.form.zipcode.value;    
            var country=document.form.country.value;
            var atpos=email.indexOf("@");
            var dtpos=email.lastIndexOf(".");
            if(!fname || !lname || !email || !code || !phone || !add1 || !add2 || !city || !state || !zip || !country){
                
                alert('enter all required fields');
                return false;
            }
            if(atpos<1 || dtpos-atpos<2){
                alert("plese enter valid email id");
                document.form.email.focus();
                return false;
            }
            if(phone.length>10 || phone.length<10){
                alert("phone no should be 10 digit only!!");
                document.form.phone.focus();
                return false;
            }
            if(isNaN(phone)){
                alert("phone no not valid");
                document.form.phone.focus();
                return false;
            }
            else{
                return true;
            }
        }
        
        
        
    </script>
</head>
<?php
    $img='';
                    $id=$_SESSION['id'];
                    $query="SELECT * FROM userprofile WHERE UserID='{$id}'";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $img=$row['ProfilePicture'];
                    }
                    
?>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Header-->
    <div class="header">
        <div class="navbar-header">
            <!-- LOGO-->
            <a href="home.html">
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">

            </a>
            <!--Mobile Menu Open Button-->
            <span id="mobile-nav-open-btn">&#9776;</span>

        </div>
        <div class="header-right">
            <ul class="nav nav2 navbar-nav pull-right">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="buyerreq.php">Buyer Requests</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>
                <div class="dropdown dropdown-dash">
                        <?php if($img){ ?>
                        <a href="#"><img src="<?php echo $img; ?>" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php }else{ ?>
                        <a href='#'><img src="images/team/default.jpg" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php } ?>
                        <div class="dropdown-content dash-content" style="height:250px">
                            <a href="Userp.php" class="sold">My Profile</a>
                            <a href="mydownload.php">My Download</a>
                            <a href="mysoldnote.php">My Sold Note</a>
                            <a href="myreject.php">My Rejected Notes</a>
                            <a href="cp.php">Change Password</a>
                            <a href="logout.php" class="logout">LOGOUT</a>
                        </div>
                    </div>
                </li>
                <li>
                    <form action="Logout.php"><input type="submit" class="btn2 btn2-user" value="Logout"></form>
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
                    <div class="dropdown dropdown-dash">
                        <?php if($img){ ?>
                        <a href="#"><img src="<?php echo $img; ?>" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php }else{ ?>
                    <a href='#'><img src="images/team/default.jpg" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php } ?>
                        <div class="dropdown-content dash-content">
                            <a href="Userp.php" class="sold">My Profile</a>
                            <a href="mydownload.php">My Download</a>
                            <a href="mysoldnote.php">My Sold Note</a>
                            <a href="myreject.php">My Rejected Notes</a>
                            <a href="cp.php">Change Password</a>
                            <a href="logout.php" class="logout">LOGOUT</a>
                        </div>
                    </div>
                </li>
                    <?php
                    if($img){
                        echo "<img src='{$img}' class='img-responsive img-circle img-user'></a></li>";
                    }
                    else{
                      echo "<img src='images/team/default.jpg' class='img-responsive img-circle img-user'></a></li>";  
                    }
                    ?>
                    
                    <li>
                        <form action="Logout.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Logout"></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    $id=$_SESSION['id'];
    $query="SELECT * FROM users WHERE ID='{$id}'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $fname=$row['FirstName'];
        $email=$row['EmailID'];
        $lname=$row['LastName'];
    }
    ?>
    <?php
    $date1='';
    $gender1='';
    $code1='';
    $phn1='';
    $img1='';
    $add11='';
    $add21='';
    $city1='';
    $state1='';
    $zipcode1='';
    $country1='';
    $uni1='';
    $college1='';
    $query="SELECT * FROM userprofile WHERE UserID='{$id}'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $date1=$row['DOB'];
        $gender1=$row['Gender'];
        $code1=$row['CoutryCode'];
        $phn1=$row['PhoneNumber'];
        $img1=$row['ProfilePicture'];
        $add11=$row['AddressLine1'];
        $add21=$row['AddressLine2'];
        $city1=$row['City'];
        $state1=$row['State'];
        $zipcode1=$row['ZipCode'];
        $country1=$row['Country'];
        $uni1=$row['University'];
        $college1=$row['College'];
    }
    $count=mysqli_num_rows($result);
    if($count>0 && isset($_POST['submit'])){
    
        $fname=$_POST['fname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $date=$_POST['date'];
        $gender=$_POST['gender'];
        $code=$_POST['code'];
        $phn=$_POST['phone'];
        $picture=$_POST['prof_pic'];
        $add1=$_POST['add1'];
        $add2=$_POST['add2'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zipcode'];
        $country=$_POST['country'];
        $university=$_POST['university'];
        $college=$_POST['college'];
        $query1="UPDATE userprofile SET SecondaryEmailAddress='{$email}',DOB='{$date}',Gender='{$gender}',CoutryCode='{$code}',PhoneNumber='{$phn}',ProfilePicture='{$picture}',AddressLine1='{$add1}',AddressLine2='{$add2}',City='{$city}',State='{$state}',ZipCode='{$zip}',Country='{$country}',University='{$university}',College='{$college}' WHERE UserID='{$id}'";
        $result1=mysqli_query($conn,$query1);
        if($result1){
            header("Location:search.php");
        }
        $query2="UPDATE users SET FirstName='{$fname}',LastName='{$lname}',EmailID='{$email}' WHERE ID='{$id}'";
        $result2=mysqli_query($conn,$query2);
        if($result2){
            echo "<script>window.location.href='search.php'</script>";
        }
    }
    
    else if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lastname'];
        $email=$_POST['email'];
        $date=$_POST['date'];
        $gender=$_POST['gender'];
        $code=$_POST['code'];
        $phn=$_POST['phone'];
        $picture=$_POST['prof_pic'];
        $add1=$_POST['add1'];
        $add2=$_POST['add2'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zipcode'];
        $country=$_POST['country'];
        $university=$_POST['university'];
        $college=$_POST['college'];
        $query="INSERT INTO userprofile(ID,UserID,DOB,Gender,SecondaryEmailAddress,CoutryCode,PhoneNumber,ProfilePicture,AddressLine1,AddressLine2,City,State,ZipCode,Country,University,College,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy)   VALUES('','{$id}','{$date}','{$gender}','{$email}','{$code}','{$phn}','{$picture}','{$add1}','{$add2}','{$city}','{$state}','{$zip}','{$country}','{$university}','{$college}','','','','')";
        $result=mysqli_query($conn,$query);
        if($result){
            echo "<script>window.location.href='search.php'</script>";
        }
    }
    ?>
    
    <!--Home page-->
    <section id="User-profile">
        <!-- overlay -->
        <div id="home-overlay"></div>
        <!--Home content-->
        <div id="home-content">
            <div id="home-content-inner">
                <div id="home-heading">
                    <h1 class="heading-user wow zoomIn" data-wow-duration="1s">User Profile</h1>
                </div>
            </div>
        </div>
    </section>

    <!--User Form-->
    <form method="post" name="form" onsubmit="return(validate());">
    <section id="form">
        <div class="container6">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
                            <h1 class="user-heading">Basic Profile Details</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">First Name*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="fname"
                                   value="<?php echo $fname; ?>" aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Email*</span></label>
                                <input type="email" class="form-control user" id="exampleInputEmail1" name="email"
                                    value="<?php echo $email;?>" aria-describedby="emailHelp" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group-left">
                               <?php
                                    $query1="SELECT * FROM referencedata WHERE ID='{$gender1}'";
                                    $result1=mysqli_query($conn,$query1);
                                    while($row=mysqli_fetch_assoc($result1)){
                                        $sel_gender=$row['Value'];
                                        $sel_id=$row['ID'];
                                    }
                                    
                                    ?>
                                <label for="exampleInputEmail1"><span class="label">Gender</span></label><br>
                                <select class="custom-select form-control user" name="gender">
                                    <?php
                                    if($gender1){
                                        echo "<option value='{$sel_id}'>$sel_gender</option>";
                                    }
                                    else{
                                        echo "<option value=''>Select Your Gender</option>";
                                    }
                                    
                                    ?>
                                    <?php echo "<option value='{$sel_id}'>$sel_gender</option>"; ?>
                                    <?php
                                    $query="SELECT * FROM referencedata WHERE referencedata.Value='Male' OR referencedata.Value='Female'";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $Name=$row['Value'];
                                        $id=$row['ID'];
                                        
                                        echo "<option value='{$id}'>$Name</option>";
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group-left">
                                <label for="exampleFormControlTextarea1"><span class="label">Profile
                                        Picture</span></label>
                                
                                <?php 
                                if($img1){ 
                                    echo "<a href='{$img1}' download>Attached Image</a>";
                                } 
                                ?>
                                <input name="prof_pic" type="file" class="form-control user" id="exampleFormControlTextarea1"  title="upload a picture" style="height:100px;">

                            </div>
                 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user">
                        
                            <div class="form-group-right form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">Last Name*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="lastname"
                                  value="<?php echo $lname;?>"  aria-describedby="emailHelp" placeholder="Enter Your last name">
                            </div>
                            <div class="form-group form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">Date Of Birth</span></label>
                                <input type="date" class="form-control user date" id="exampleInputEmail1" name="date"
                                   value="<?php echo $date1; ?>" aria-describedby="emailHelp" placeholder="Enter Your date of birth">
                            </div>
                            <div class="form-group form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">Phone Number*</span></label><br>
                                <select class="custom-select-01 form-control user" name="code">
                                  <?php
                                    if($code1){
                                        echo "<option value='+91'>$code1</option>";
                                    }
                                    else{
                                       echo '<option value="+91">+91</option>';
                                    }
                                    ?>
                                  
                                    <option value="+91">+91</option>
                                    <option value="+81">+81</option>
                                    <option value="+90">+90</option>
                                    <input type="tel" id="phone" name="phone" class="form-control user user-phn" 
                                      value="<?php echo $phn1; ?>" maxlegth="10" placeholder="Enter your phone number">
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="container6">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
                            <h1 class="user-heading">Address Details</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Address Line 1*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="add1"
                                   value="<?php echo $add11; ?>" aria-describedby="emailHelp" placeholder="Enter Your address">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">City*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="city"
                                    value="<?php echo $city1; ?>" aria-describedby="emailHelp" placeholder="Enter Your city">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">ZipCode*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="zipcode"
                                   value="<?php echo $zipcode1; ?>"  aria-describedby="emailHelp" placeholder="Enter Your zipcode">
                            </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user container-right">
                        
                            <div class="form-group form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">Address Line 2*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="add2"
                                    value="<?php echo $add21; ?>" aria-describedby="emailHelp" placeholder="Enter Your address">
                            </div>
                            <div class="form-group form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">State*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="state"
                                    value="<?php echo $state1; ?>" aria-describedby="emailHelp" placeholder="Enter Your state">
                            </div>
                            <div class="form-group form-group-right2">
                                <label for="exampleInputEmail1"><span class="label">Country*</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="country"
                                   value="<?php echo $country1; ?>"  aria-describedby="emailHelp" placeholder="Select your country">
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="container6">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
                        
                            <h1 class="user-heading user-heading3">University and College Information</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">University</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="university"
                                   value="<?php echo $uni1; ?>"  aria-describedby="emailHelp" placeholder="Select your university">
                            </div>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user container-right-r">
                       
                            <div class="form-group form-group-right2 form-group-2">
                                <label for="exampleInputEmail1"><span class="label">College</span></label>
                                <input type="text" class="form-control user" id="exampleInputEmail1" name="college"
                                  value="<?php echo $college1; ?>"   aria-describedby="emailHelp" placeholder="Select your college">
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button type="submit" name="submit" class="btn-userP" value="SUBMIT">SUBMIT
        </button>
    </form>
<!--    <form action="Login.html" class="btn-userPro"><input type="button" class="btn-userP" value="SUBMIT"></form>-->
    <hr>
    <!--Footer-->
    <footer id="footer">
        <p>
            <span class="footer-p">Copyright &copy; TatvaSoft All rights reserved.</span>
            <a href="#" class="social-list"><i class="fa fa-facebook"></i></a>
            <a href="#" class="social-list"><i class="fa fa-twitter"></i></a>
            <a href="#" class="social-list"><i class="fa fa-linkedin"></i></a>
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