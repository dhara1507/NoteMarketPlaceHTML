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

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    <script type="text/javascript">
        function validate(){
            
            var fname=document.form.fname.value;
            var lname=document.form.lname.value;
            var email=document.form.email.value;
            var phone=document.form.phone.value;
            if(!fname || !lname || !email || !phone){
                
                alert('enter all required fields');
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
    
    include "includes/header.php";    
    ?>
    <?php
    $fname1='';
    $lname1='';
    $email1='';
    $phn1='';
    $id_admin='';
        $id_member=$_SESSION['id'];
        if(isset($_GET['Edit'])){
            $id_admin=$_GET['Edit'];
        }
        if($id_admin){
        $query="SELECT users.ID,users.FirstName,users.LastName,userprofile.PhoneNumber,users.EmailID,userprofile.CoutryCode FROM users LEFT JOIN userprofile ON users.ID=userprofile.UserID WHERE users.ID='{$id_admin}'";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("fail".mysqli_error($conn));
        }
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $fname1=$row['FirstName'];
            $lname1=$row['LastName'];
            $email1=$row['EmailID'];
            $phn1=$row['PhoneNumber'];
            $cc1=$row['CoutryCode'];
        }
        if(isset($_POST['add'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $phn=$_POST['phone'];
            $dt=date('Y-m-d h:i:s');
            $query_1="UPDATE users SET FirstName='{$fname}',LastName='{$lname}',EmailID='{$email}' WHERE ID='{$id_admin}'";
            $result_1=mysqli_query($conn,$query_1);
            $query="UPDATE userprofile SET PhoneNumber='{$phn}' WHERE UserID='{$id_admin}'"; 
            $result=mysqli_query($conn,$query);
            if(!$result){
                die("fail".mysqli_error($conn));
            }
        }
        }
        else{
        if(isset($_POST['add'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $dt=date('Y-m-d h:i:s');
        $query_in="INSERT INTO users(ID,RoleID,FirstName,LastName,EmailID,Password,IsEmailVerified	,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive) VALUES('','2','{$fname}','{$lname}','{$email}','Dhara@123','','{$dt}','{$id_member}','','',0)";
        $result_in=mysqli_query($conn,$query_in);
        }
    }

    ?>
    <!--Content-->
    <form method="post" name="form" onsubmit="return(validate());">
    <section id="my-profile-admin">
        <div class="my-profile">
            <h1 class="admin-heading">Add Administrator</h1>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">First Name*</span></label>
                <input type="text" class="form-control user user1" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="fname" placeholder="Enter Your Email" value="<?php echo $fname1; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Last Name*</span></label>
                <input type="text" class="form-control user user1" id="exampleInputEmail1" aria-describedby="emailHelp"
                   name="lname" placeholder="Enter Your Last Name" value="<?php echo $lname1; ?>">
            </div>
            <?php
            if($email1){ 
                echo "<div class='form-group-left form-admin'>
                <label for='exampleInputEmail1'><span class='label'>Email*</span></label>
                <input type='text' class='form-control user user1' id='exampleInputEmail1' aria-describedby='emailHelp'
                   name='email' placeholder='Enter Your Email Address' value='$email1' disabled>
            </div>";
             } 
            else{
            echo "<div class='form-group-left form-admin'>
                <label for='exampleInputEmail1'><span class='label'>Email*</span></label>
                <input type='text' class='form-control user user1' id='exampleInputEmail1' aria-describedby='emailHelp'
                   name='email' placeholder='Enter Your Email Address'> 
            </div>";
            } 
            ?>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Phone Number</span></label><br>
                <select class="custom-select-01 form-control user admin-select">
                  
                   <?php echo "<option value='{$cc1}'>$cc1</option>"; ?>
                       
                    <option value="1">+91</option>
                    <option value="2">+81</option>
                    <option value="3">+90</option>
                    <input type="text" id="phone" name="phone" class="form-control user tel-admin admin-phn"
                        maxlength="10" style="width:500px;" placeholder="Enter your phone number" value="<?php echo $phn1; ?>">
                </select>
            </div>
        </div>
    </section>
    <button type="submit" class="btn-userP btn-addadmin btn-addcate btn-userP btn-addadmin"
        name="add" value="Cancel" style='margin-top:0;margin-left:150px;'>SUBMIT</button>
    
    <hr>



    <!--Footer-->
    <footer id="footer">
        <p>
            <span class="footer-p">Version : 1.1.24</span>
            <span class="footer2">Copyright &copy; TatvaSoft All rights reserved.</span>
        </p>
    </footer>
    <!--Footer Ends-->

    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>