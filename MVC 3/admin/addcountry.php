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
            
            var country=document.form.cname.value;
            var cc=document.form.desc.value;
            
            if(!country || !cc){
                
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
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Header-->
    <?php
    
    include "includes/header.php";    
    ?>
    <?php
    $country1='';
    $cc1='';
    $id_coun='';
        $id_member=$_SESSION['id'];
        if(isset($_GET['Edit'])){
            $id_coun=$_GET['Edit'];
        }
        if($id_coun){
        $query="SELECT * FROM countries WHERE ID='{$id_coun}'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $country1=$row['Name'];
            $cc1=$row['CountryCode'];
            
        }
        if(isset($_POST['add'])){
            $country=$_POST['country'];
            $cc=$_POST['cc'];
            $dt=date('Y-m-d h:i:s');
            $query="UPDATE countries SET Name='{$country}',CountryCode='{$cc}' WHERE ID='{$id_coun}'";
            $result=mysqli_query($conn,$query);
            if(!$result){
                die("fail".mysqli_error($conn));
            }
        }
        }
        else{
        if(isset($_POST['add'])){
        $country=$_POST['country'];
        $cc=$_POST['cc'];
        $dt=date('Y-m-d h:i:s');
        $query="INSERT INTO countries(ID,Name,CountryCode,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive) VALUES('','{$country}','{$cc}','{$dt}','{$id_member}','','',0)";
        $result=mysqli_query($conn,$query);
        }
    }
    
    ?>

    

    <!--Content-->
     <form method="post" name="form" onsubmit="return(validate());">
    <section id="my-profile-admin">
        <div class="my-profile">
            <h1 class="admin-heading">Add Country</h1>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Country Name*</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                    name="country" aria-describedby="emailHelp" value="<?php echo $country1; ?>" placeholder="Enter Country" value="India">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Country Code*</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                   name="cc" aria-describedby="emailHelp" value="<?php echo $cc1; ?>" placeholder="Enter country code">
            </div>
            
        </div>
    </section>
    <button type="submit" class="btn-userP btn-addadmin btn-add-count"
        name="add" value="Cancel">SUBMIT</button>

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