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
</head>

<body>
  <!-- Preloader -->
<!--
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
-->
    <!--Header-->
    <?php
    include "includes/header.php";    
    ?>
   <?php
    $id_member=$_SESSION['id'];
    
    
    $query="SELECT * FROM systemconfiguration WHERE Key1='supportemail'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $semail=$row['Value'];
    }
    
    if($semail){
        $query="SELECT * FROM systemconfiguration WHERE Key1='phone'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $phn=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE Key1='Notify email'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $nemail=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE Key1='Facebook url'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $fac=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE Key1='Twitter'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $twi=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE Key1='LinkedIn'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $link=$row['Value'];
        }
        $query="SELECT * FROM systemconfiguration WHERE Key1='NoteImg'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $note=$row['Value'];
        }

        $query="SELECT * FROM systemconfiguration WHERE Key1='profileimg'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
        $pic=$row['Value'];
        }
        
    }
    if($semail && isset($_POST['manage'])){
        $semail1=$_POST['semail'];
        $sphn1=$_POST['sphn'];
        $nemail1=$_POST['nemail'];
        $ffac1=$_POST['ffac'];
        $ftwi1=$_POST['ftwi'];
        $flink1=$_POST['flink'];
        $dnote1=$_POST['dnote'];
        $dimg1=$_POST['dimg'];
        $query_update1="UPDATE systemconfiguration SET Value='{$semail1}' WHERE Key1='supportemail'";
        $result_update1=mysqli_query($conn,$query_update1);
        if($result_update1){
            $query11="UPDATE users SET EmailID='{$semail1}' WHERE ID='{$id_member}'";
            $result11=mysqli_query($conn,$query11);
        }
        $query_update="UPDATE systemconfiguration SET Value='{$sphn1}' WHERE Key1='phone'";
        $result_update=mysqli_query($conn,$query_update);
        $query_update="UPDATE systemconfiguration SET Value='{$nemail1}' WHERE Key1='Notify email'";
        $result_update=mysqli_query($conn,$query_update);
        $query_update="UPDATE systemconfiguration SET Value='{$ffac1}' WHERE Key1='Facebook url'";
        $result_update=mysqli_query($conn,$query_update);
        $query_update="UPDATE systemconfiguration SET Value='{$ftwi1}' WHERE Key1='Twitter'";
        $result_update=mysqli_query($conn,$query_update);
        $query_update="UPDATE systemconfiguration SET Value='{$flink1}' WHERE Key1='LinkedIn'";
        $result_update=mysqli_query($conn,$query_update);
    }
    else if(isset($_POST['manage'])){
        $semail=$_POST['semail'];
        $sphn=$_POST['sphn'];
        $nemail=$_POST['nemail'];
        $ffac=$_POST['ffac'];
        $ftwi=$_POST['ftwi'];
        $flink=$_POST['flink'];
        $dnote=$_POST['dnote'];
        $dimg=$_POST['dimg'];
        $dt=date('Y-m-d h:i:s');
        $query_1="INSERT INTO systemconfiguration(ID,Key1,Value,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive) VALUES ('',' support email','{$semail}','{$dt}','','','',0),('','phone','{$sphn}','{$dt}','','','',0),('','Notify email','{$nemail}','{$dt}','','','',0),('','Facebook url','{$ffac}','{$dt}','','','',0),('','Twitter','{$ftwi}','{$dt}','','','',0),('','LinkedIn','{$flink}','{$dt}','','','',0),('','NoteImg','{$dnote}','{$dt}','','','',0),('','Profileimg','{$dimg}','{$dt}','','','',0)";
        $result_1=mysqli_query($conn,$query_1);
        if(!$result_1){
            die("fail".mysqli_error($conn));
        }
    }
    ?>
    
    <!--Content-->
     <form method="post" name="form">
    <section id="my-profile-admin">
        <div class="my-profile">
            <h1 class="admin-heading">Manage System Configuration</h1>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Support emails address*</span></label>
                <input type="email" class="form-control user" id="exampleInputEmail1"
                  name="semail"  aria-describedby="emailHelp" placeholder="Enter Your Email" value="<?php echo $semail; ?>">
            </div>
            <div class="form-group-left form-admin">
                
                <label for="exampleInputEmail1"><span class="label">Support phone number*</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                  name="sphn" max-length="10" aria-describedby="emailHelp" placeholder="Enter phone number" value="<?php echo $phn; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Email Address(es)(for various events system will send notification
                    to these users)*</span></label>
                <input type="email" class="form-control user" id="exampleInputEmail1"
                   name="nemail" aria-describedby="emailHelp" placeholder="Enter Email Address" value="<?php echo $nemail; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Facebook URL</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                   name="ffac" aria-describedby="emailHelp" placeholder="Enter facebook url" value="<?php echo $fac; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Twitter URL</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                   name="ftwi" aria-describedby="emailHelp" placeholder="Enter twitter url" value="<?php echo $twi; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Linkedin URL</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                   name="flink" aria-describedby="emailHelp" placeholder="Enter linkedin url" value="<?php echo $link; ?>">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleFormControlTextarea1"><span class="label">Defualt image for notes
                    (if seller do not upload)
                        </span></label>
                <input name="dnote" type="file" class="form-control user" id="exampleFormControlTextarea1" title="upload a picture" style="height:100px;" accept="image/jpeg" value="<?php echo $note; ?>">
            </div>
            <div class="form-admin form-manage">
                <label for="exampleFormControlTextarea1"><span class="label label-manage">Defualt Profile picture
                    (if seller do not upload)
                        </span></label>
                <input name="dimg" type="file" class="form-control user" id="exampleFormControlTextarea1" title="upload a picture" style="height:100px;" accept="image/jpeg" value="<?php echo $pic; ?>">
            </div>
            
        </div>
    </section>
    <button type="submit" class="btn-userP btn-addadmin btn-addcate"
    name="manage" value="Cancel">SUBMIT</button>
    </form>
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