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
            
            var category=document.form.cname.value;
            var desc=document.form.desc.value;
            
            if(!category || !desc){
                
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
    <?php
    
    include "includes/header.php";    
    ?>
    <?php
    $category1='';
    $desc1='';
    $id_cat='';
        $id_member=$_SESSION['id'];
        if(isset($_GET['Edit'])){
            $id_cat=$_GET['Edit'];
        }
        if($id_cat){
        $query="SELECT * FROM notecategories WHERE ID='{$id_cat}'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $category1=$row['Name'];
            $desc1=$row['Description'];
            
        }
        if(isset($_POST['add'])){
            $category=$_POST['cname'];
            $desc=$_POST['desc'];
            $dt=date('Y-m-d h:i:s');
            $query="UPDATE notecategories SET Name='{$category}',Description='{$desc}' WHERE ID='{$id_cat}'";
            $result=mysqli_query($conn,$query);
            if(!$result){
                die("fail".mysqli_error($conn));
            }
        }
        }
        else{
        if(isset($_POST['add'])){
        $category=$_POST['cname'];
        $desc=$_POST['desc'];
        $dt=date('Y-m-d h:i:s');
        $query="INSERT INTO notecategories(ID,Name,Description,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive) VALUES('','$category','{$desc}','{$dt}','{$id_member}','','',0)";
        $result=mysqli_query($conn,$query);
        }
    }
    
    ?>

    <!--Content-->
    <form method="post" name="form" onsubmit="return(validate());">
    <section id="my-profile-admin">
        <div class="my-profile">
            <h1 class="admin-heading">Add Category</h1>
            <div class="form-group-left form-admin">
                <label for="exampleInputEmail1"><span class="label">Category Name*</span></label>
                <input type="text" class="form-control user" id="exampleInputEmail1"
                   name="cname" aria-describedby="emailHelp" value="<?php echo $category1; ?>" placeholder="Enter Your Email">
            </div>
            <div class="form-group-left form-admin">
                <label for="exampleFormControlTextarea1"><span class="label">Description*
                        </span></label>
                <textarea type="text" class="form-control user" 
                    name="desc" placeholder="Enter your Description" rows="5" ><?php echo $desc1; ?></textarea>
            </div>
        </div>
    </section>
       <button type="submit" class="btn-userP btn-addadmin btn-addcate"
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