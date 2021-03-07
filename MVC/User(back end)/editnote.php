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

    <!--animate css-->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
    </head>

<?php
if(isset($_GET['Edit'])){
    $the_note=$_GET['Edit'];
    
}
$query="SELECT * FROM sellernotes WHERE ID=$the_note";
$select_note=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($select_note)){
    $id=$row['ID'];
    $status=$row['Status'];
    $title=$row['Title'];
    $category=$row['Category'];
    $note_pic=$row['DisplayPicture'];
    $type=$row['NoteType'];
    $pages=$row['NumberofPages'];
    $desc=$row['Description'];
    
    $uni=$row['UniversityName'];
    $country=$row['Country'];
    $course=$row['Course'];
    $coursecode=$row['CourseCode'];
    $prof_name=$row['Professor'];
    $price=$row['SellingPrice'];
    $sell_type=$row['IsPaid'];
    $note_preview=$row['NotesPreview'];
    
}
    
if(isset($_POST['save'])){
                
                $title=$_POST['title'];
                $type=$_POST['type'];
                $note_pic=$_POST['prof_pic'];
                $category=$_POST['category'];
                $up_note=$_POST['up_note'];
                $page=$_POST['pages'];
                $desc=$_POST['description'];
                $country=$_POST['country'];
                $inst_name=$_POST['inst_name'];
                $course_name=$_POST['course_name'];
                $course_code=$_POST['code'];
                $prof_name=$_POST['prof_name'];
                $sell_type=$_POST['gridRadios'];
                $price=$_POST['sell_price'];
                $note_preview=$_POST['note_preview'];
            $query="UPDATE sellernotes SET Title ='{$title}',Category='{$category}', DisplayPicture='{$up_note}', NoteType='{$type}', NumberofPages='{$page}', Description='{$desc}', UniversityName='{$inst_name}', Country='{$country}', Course='{$course_name}', CourseCode='{$course_code}', Professor='{$prof_name}', IsPaid='{$sell_type}', SellingPrice='{$price}', NotesPreview='{$note_preview}' WHERE ID='{$the_note}'";
            $update=mysqli_query($conn,$query);
        
    
    if(!$update){
        die("FAILED".mysqli_error($conn));
    }
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
            <a href="#home">
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user" class="logo-addnote">
            </a>
            <!--Mobile Menu Open Button-->
            <span id="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right header-addnote">
            <ul class="nav nav2 navbar-nav pull-right">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="buyerreq.php">Buyer Requests</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="#"><img src="images/Add-notes/user-img.png" class="img-responsive img-circle img-user"></a>
                </li>
                <li>
                    <form action="logout.php"><input type="submit" class="btn2 btn2-user" value="Logout"></form>
                </li>
            </ul>
        </div>
        <!--Mobile Menu-->
        <div id="mobile-nav">
            <!--Mobile Menu Close Button-->
            <span id="mobile-nav-close-btn">&times;</span>
            <div id="mobile-nav-content">
                <ul class="nav">
                    <li><a href="search.html">Search Note</a></li>
                    <li><a href="dashboard.php">Sell Your Notes</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="#"><img src="images/Add-notes/user-img.png" class="img-responsive img-circle img-user"></a>
                    </li>
                    <li>
                        <form action="logout.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Login"></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--Header End-->
    <!--Home page-->
    <section id="User-profile" class="add-note-1">
        <!-- overlay -->
        <div id="home-overlay"></div>
        <!--Home content-->
        <div id="home-content">
            <div id="home-content-inner">
                <div id="home-heading">
                    <h1 class="heading-user wow zoomIn" data-wow-duration="1s">Edit Notes</h1>
                </div>
            </div>
        </div>
    </section>
    <!--Home end-->

    <!--Form-->
    <form method="post" name="form" onsubmit="return(validate());">
    <section id="form">
        <div class="container6 container-addnote">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="post" action="" class="container6">-->
                            <h1 class="user-heading">Basic Note Details</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Title*</span></label>
                                <input type="text" name="title" class="form-control user" id="exampleInputEmail1"
                                    value="<?php echo $title; ?>" aria-describedby="emailHelp" placeholder="Enter Your notes title">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleFormControlTextarea1"><span class="label">Profile
                                        Picture</span></label>
                                <input name="prof_pic" type="file" class="form-control user" id="exampleFormControlTextarea1" 
                                value="<?php echo $note_pic; ?>" title="upload a picture" style="height:100px;">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Type*</span></label><br>
                                <select name="type" class="custom-select form-control user">
                                    <option value="<?php echo $type1; ?>"><?php echo $type1; ?></option>
                                    <?php
                                    $query="SELECT * FROM notetypes";
                                    $select_type=mysqli_query($conn,$query);
                                    
                                    while($row=mysqli_fetch_assoc($select_type)){
                                        $note_type=$row['Name'];
                                        $id=$row['ID'];
                                        if($type1==$note_type){
                                             echo "";
                                        }
                                        else{
                                        echo "<option value='{$id}'>$note_type</option>";
                                        }
                                    }
                                    
                                    ?>
                                    
                                </select>
                            </div>
                            
<!--                        </form>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container6 form-right-addnote">-->
                            <div class="form-group-right">
                                <label for="exampleInputEmail1"><span class="label">Category*</span></label><br>
                                <select name="category" class="custom-select form-control user" value="<?php $category ?>">
                                    
                                    <?php
                                    $query="SELECT * FROM notecategories WHERE ID='{$category}'";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $category1=$row['Name'];
                                    }
                                    ?>
                                    <option <?php echo $category1?> ><?php echo $category1?></option>
                                    <?php
                                    $query="SELECT * FROM notecategories";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $note_cat=$row['Name'];
                                        $id=$row['ID'];
                                        if($category1==$note_cat){
                                            echo "";
                                            
                                        }
                                        else{
                                        echo "<option value='{$id}'>$note_cat</option>";
                                        }
                                    }
                                    
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"><span class="label up-note-label">Upload
                                        Notes*</span></label>
                                        <input type="file" name="up_note" class="form-control user up-note" accept=".pdf" id="exampleFormControlTextarea2" title="upload a note" style="height:100px;width:700px;">
<!--
                                <textarea type="picture" class="form-control user up-note"
                                    id="exampleFormControlTextarea2" placeholder="upload your notes"
                                    rows="5"></textarea>
-->
                            </div>
                            <div class="form-group-right">
                                <label for="exampleInputEmail1"><span class="label">Number of Pages</span></label>
                                <input name="pages" type="text" class="form-control user" id="exampleInputEmail1"
                                    value="<?php echo $pages; ?>" aria-describedby="emailHelp" placeholder="Enter Number Of Pages">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="desc">
        <div class="row">
            <div class="col-md-12">
                <div class="test-user">
<!--                    <form method="" action="" class="container6">-->
                        <div class="form-group-left">
                            <label for="exampleFormControlTextarea1"><span
                                    class="label desc">Description*</span></label>
                            <textarea type="picture" class="form-control user" id="exampleFormControlTextarea3"
                                name="description" placeholder="Enter your description" rows="8" cols="10"style="width:1320px;">"<?php echo $desc; ?>"</textarea>
                        </div>
<!--                    </form>-->
                </div>
            </div>
        </div>
    </div>
    <section id="form">
        <div class="container6 container-addnote">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container6">-->
                            <h1 class="user-heading">Institution Information</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Country*</span></label><br>
                                <select name="country" class="custom-select form-control user">
                                   <?php
                                    $query="SELECT * FROM countries WHERE ID='{$country}'";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $country1=$row['Name'];
                                    }
                                    
                                    
                                    ?>
                                    <option value="<?php echo $country1; ?>">"<?php echo $country1; ?>"</option>
                                    
                                    
                                    <?php
                                    $query="SELECT * FROM countries";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $country=$row['Name'];
                                        $id=$row['ID'];
                                        if($country1==$country){
                                            echo "";
                                        }
                                        else{
                                        echo "<option value='{$id}'>$country</option>";
                                        }
                                    }
                                    
                                    
                                    ?>
                                </select>
                                
                            </div>
<!--                        </form>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container6 form-right-addnote">-->
                            <div class="form-group-right">
                                <label for="exampleInputEmail1"><span class="label">Institution Name</span></label>
                                <input name="inst_name" type="text" class="form-control user" id="exampleInputEmail1"
                                   value="<?php echo $uni; ?>" aria-describedby="emailHelp" placeholder="Enter Your institution name">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="container6 container-addnote">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container6">-->
                            <h1 class="user-heading">Course Details</h1>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Course Name</span></label>
                                <input name="course_name" type="text" class="form-control user" id="exampleInputEmail1"
                                    value="<?php  echo $course;?>" aria-describedby="emailHelp" placeholder="Enter your course name">
                            </div>
                            <div class="form-group-left">
                                <label for="exampleInputEmail1"><span class="label">Professor/Lecturer</span></label>
                                <input name="prof_name" type="text" class="form-control user" id="exampleInputEmail1"
                                   value="<?php  echo $prof_name; ?>" aria-describedby="emailHelp" placeholder="Enter your professor name">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container-right form-right-addnote">-->
                            <div class="form-group-right">
                                <label for="exampleInputEmail1"><span class="label">Course Code</span></label>
                                <input name="code" type="text" class="form-control user" id="exampleInputEmail1"
                                   value="<?php  echo $coursecode; ?>" aria-describedby="emailHelp" placeholder="Enter your course code">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="form">
        <div class="container6 container-addnote">
            <div class="row">
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container6">-->
                            <h1 class="user-heading">Selling Information</h1>
                            <div class="form-group-left">
                                <div class="addnote-radio">
                                    <label for="exampleInputEmail1"><span class="label">Sell For*</span></label>
                                    <div class="form-check radio-left">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            value="free" checked>
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Free
                                        </label>
                                    </div>
                                    <div class="form-check radio-right">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            value="paid" checked>
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Paid
                                        </label>
                                    </div>
                                </div>
                                <label for="exampleInputEmail1" class="sell-price-label"><span class="label">Sell
                                        Price*</span></label>
                                <input name="sell_price" type="text" class="form-control user sell-price" id="exampleInputEmail1"
                                     value="<?php  echo $price; ?>" aria-describedby="emailHelp" placeholder="Enter your price">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="test-user">
<!--                        <form method="" action="" class="container-right">-->
                            <div class="form-group-right addnote-desc">
                                <label for="exampleFormControlTextarea1"><span class="label">Note Preview*</span></label>
                                <input type="file" name="note_preview" class="form-control user up-note" id="exampleFormControlTextarea2" title="upload a picture" style="height:170px;width:700px;">
                            </div>
<!--                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    
<!--       <form action="" method="post" class="btn-userPro">-->
       <button type="submit" name="save" class="btn-userP save" value="SAVE">SAVE
        </button>
        <button type="button" name="publish" data-toggle="modal" 
                            data-target="#exampleModal" class="btn-userP publish" value="PUBLISH">PUBLISH</button>
                            
                            
         <div style="height:400px;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="images/Front_images/images/close-icon.svg" class="close-img">
                    </button>
                </div>
                <div class="modal-body">
                   <hr>
                    <h5>"Publishing this note will send mote to administrator for review,once administrator review and approve then this note will be published to poral.pre yes to continue."</h5>
                    <button type="submit" class="btn-userP btn-review" style="margin-top:10px;"
                                                                 name="yes" value="YES">YES</button>
                    <button type="submit" class="btn-userP btn-review"
                            name="cancel" style="margin-top:-100px;margin-left:-30px;" value="Cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<!--    </form>-->
    <hr>
    </form>
    
    
    
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




