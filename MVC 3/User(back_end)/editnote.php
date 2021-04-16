<?php
include "includes/db.php";
session_start();
error_reporting(0);
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
    <script type="text/javascript">
        
        function fun()
        {
            
            document.getElementById("price_radio").disabled=true;
            
        }
        function fun1()
        {
            
            document.getElementById("price_radio").disabled=false;
        }
    </script>   
    </head>

<?php
$id_note=$_SESSION['id'];
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
$query_select="SELECT * FROM sellernotesattachements WHERE NoteID='{$the_note}'";
$result_select=mysqli_query($conn,$query_select);
while($row=mysqli_fetch_assoc($result_select)){
    $up_note=$row['FilePath'];
}
    
if(isset($_POST['save'])){
                
                $title=$_POST['title'];
                $type=$_POST['type'];
                
                $category=$_POST['category'];
                
                $page=$_POST['pages'];
                $desc=$_POST['description'];
                $country=$_POST['country'];
                $inst_name=$_POST['inst_name'];
                $course_name=$_POST['course_name'];
                $course_code=$_POST['code'];
                $prof_name=$_POST['prof_name'];
                $sell_type=$_POST['gridRadios'];
                $price=$_POST['sell_price'];
                
                $p=$_FILES['up_note']['name'];
                if($p){
                $target_dir="../member/$id_note/$the_note/Attachments/";
                mkdir($target_dir);
                $target_file_up=$target_dir.basename($_FILES['up_note']['name']);
                move_uploaded_file($_FILES['up_note']['tmp_name'],$target_file_up);
                }
                else{
                    $target_file_up=$up_note;
                }
                
                $pic=$_FILES['prof_pic']['name'];
                if($pic){
                $target_dir="../member/$id_note/$the_note/";
                mkdir($target_dir);
                $file1=basename($_FILES['prof_pic']['name']);
                $new_note=$target_dir."DP_".time();
                $p1=rename($file1,$new_note);
                move_uploaded_file($_FILES['prof_pic']['tmp_name'],$new_note);
                }
                else{
                    $new_note=$note_pic;
                }
                
                $pre=$_FILES['note_preview']['name'];
                if($pre){
                $target_dir="../member/$id_note/$the_note/";
                mkdir($target_dir);
                $file1=basename($_FILES['note_preview']['name']);
                $new_pre=$target_dir."preview_".time();
                $p1=rename($file1,$new_pre);
                move_uploaded_file($_FILES['note_preview']['tmp_name'],$new_pre);
                }
                else{
                    $new_pre=$note_preview;
                }

                
                
                
            if($sell_type=='1'){
                 $query="UPDATE sellernotes SET Status=1,Title ='{$title}',Category='{$category}', DisplayPicture='{$new_note}', NoteType='{$type}', NumberofPages='{$page}', Description='{$desc}', UniversityName='{$inst_name}', Country='{$country}', Course='{$course_name}', CourseCode='{$course_code}', Professor='{$prof_name}', IsPaid='{$sell_type}', SellingPrice='{$price}', NotesPreview='{$new_pre}' WHERE ID='{$the_note}'";
                $update=mysqli_query($conn,$query);
                $query="UPDATE sellernotesattachements SET FilePath='{$target_file_up}' WHERE NoteID='{$the_note}'";
                $result=mysqli_query($conn,$query);
            }
        else{
            $query="UPDATE sellernotes SET Status=1,Title ='{$title}',Category='{$category}', DisplayPicture='{$new_note}', NoteType='{$type}', NumberofPages='{$page}', Description='{$desc}', UniversityName='{$inst_name}', Country='{$country}', Course='{$course_name}', CourseCode='{$course_code}', Professor='{$prof_name}', IsPaid=0, SellingPrice='{$price}', NotesPreview='{$new_pre}' WHERE ID='{$the_note}'";
            $update=mysqli_query($conn,$query);
            $query="UPDATE sellernotesattachements SET FilePath='{$target_file_up}' WHERE NoteID='{$the_note}'";
            $result=mysqli_query($conn,$query);
        }
    
    if(!$update)
    {
        die("FAILED".mysqli_error($conn));
    }
}
if(isset($_POST['yes'])){
                $title=$_POST['title'];
                $type=$_POST['type'];
                
                 $pic=$_FILES['prof_pic']['name'];
                if($pic){
                $target_dir="../member/$id_note/$the_note/";
                mkdir($target_dir);
                $file1=basename($_FILES['prof_pic']['name']);
                $new_note=$target_dir."DP_".time();
                $p1=rename($file1,$new_note);
                move_uploaded_file($_FILES['prof_pic']['tmp_name'],$new_note);
                }
                else{
                    $new_note=$note_pic;
                }
               
    
                $p=$_FILES['up_note']['name'];
                if($p){
                $target_dir="../member/$id_note/$the_note/Attachments/";
                mkdir($target_dir);
                $target_file_up=$target_dir.basename($_FILES['up_note']['name']);
                move_uploaded_file($_FILES['up_note']['tmp_name'],$target_file_up);
                }
                else{
                    $target_file_up=$up_note;
                }
                
                $page=$_POST['pages'];
                $desc=$_POST['description'];
                $country=$_POST['country'];
                $inst_name=$_POST['inst_name'];
                $course_name=$_POST['course_name'];
                $course_code=$_POST['code'];
                $prof_name=$_POST['prof_name'];
                $sell_type=$_POST['gridRadios'];
                $price=$_POST['sell_price'];
    
                $pre=$_FILES['note_preview']['name'];
                if($pre){
                $target_dir="../member/$id_note/$the_note/";
                mkdir($target_dir);
                $file1=basename($_FILES['note_preview']['name']);
                $new_pre=$target_dir."preview_".time();
                $p1=rename($file1,$new_pre);
                move_uploaded_file($_FILES['note_preview']['tmp_name'],$new_pre);
                }
                else{
                    $new_pre=$note_preview;
                }
                
                $id=$_SESSION['id'];
                $action_by=$_SESSION['firstname'];
                if($sell_type=='0'){
                $query="UPDATE sellernotes SET Status=2,Title ='{$title}',Category='{$category}', DisplayPicture='{$new_note}', NoteType='{$type}', NumberofPages='{$page}', Description='{$desc}', UniversityName='{$inst_name}', Country='{$country}', Course='{$course_name}', CourseCode='{$course_code}', Professor='{$prof_name}', IsPaid=0, SellingPrice='{$price}', NotesPreview='{$new_pre}' WHERE ID='{$the_note}'";
                $result=mysqli_query($conn,$query);
                if(!$result){
                    die("FAILED".mysqli_error($conn));
                }
                    $query="UPDATE sellernotesattachements SET FilePath='{$target_file_up}' WHERE NoteID='{$the_note}'";
                    $result=mysqli_query($conn,$query);
                }
                else{
                    $query="UPDATE sellernotes SET Status=2,Title ='{$title}',Category='{$category}', DisplayPicture='{$new_note}', NoteType='{$type}', NumberofPages='{$page}', Description='{$desc}', UniversityName='{$inst_name}', Country='{$country}', Course='{$course_name}', CourseCode='{$course_code}', Professor='{$prof_name}', IsPaid=1, SellingPrice='{$price}', NotesPreview='{$new_pre}' WHERE ID='{$the_note}'";
                $result=mysqli_query($conn,$query);
                if(!$result){
                    die("FAILED".mysqli_error($conn));
                }
                $query="UPDATE sellernotesattachements SET FilePath='{$target_file_up}' WHERE NoteID='{$the_note}'";
                $result=mysqli_query($conn,$query);
                }
            $query="SELECT * FROM users WHERE ID='{$id}'";
            $result=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result)){
                $firstname=$row['FirstName'];
                $email=$row['EmailID'];
            }
            $to="dhara8186@gmail.com";
             
               $subject="$firstname sent his note for review.";
               $msg="Hello admin"."\r\n".
                   "We Want to inform you that $firstname sent his note $title for review.Plase look at the notes and take required actions."."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".


                    "Regards,"."\r\n"
                    ."Notes Market Place";

               $header=$email;

               if(mail($to,$subject,$msg,$header)){
                    header("Location:addnote.php");
               }
            $query="UPDATE sellernotesattachements SET FilePath='{$target_file_up}' WHERE NoteID='{$the_note}'";
            $result=mysqli_query($conn,$query);
    }



?>
<?php
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
                <li>
                <div class="dropdown dropdown-dash">
                        <?php if($img){ ?>
                        <a href="#"><img src="<?php echo $img; ?>" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php }else{ ?>
                    <a href='#'><img src="images/team/default.jpg" class="img-responsive img-circle img-user img-user-dash"></a>
                        <?php } ?>
                        <div class="dropdown-content dash-content" style="height:250px">
                            <a href="Userp.php">My Profile</a>
                            <a href="mydownload.php">My Download</a>
                            <a href="mysoldnote.php" class="sold">My Sold Note</a>
                            <a href="myreject.php">My Rejected Notes</a>
                            <a href="cp.php">Change Password</a>
                            <a href="logout.php" class="logout">LOGOUT</a>
                        </div>
                    </div>
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
    <form method="post" name="form" onsubmit="return(validate());" enctype="multipart/form-data">
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
                                
                                <?php echo "<a href='{$note_pic}' download>Attached Image</a>"; ?>
                                
                                <input name="prof_pic" type="file" class="form-control user" id="prof_pic" 
                                title="upload a picture" style="height:100px;" accept="image/jpeg">
                            </div>
                            <div class="form-group-left">
                              <?php
                               $query="SELECT * FROM notetypes WHERE ID='{$type}'";
                               $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                    $type1=$row['Name'];
                                    $id1=$row['ID'];
                                }
                               ?>
                               
                                <label for="exampleInputEmail1"><span class="label">Type*</span></label><br>
                                <select name="type" class="custom-select form-control user">
                                    <?php echo "<option value='{$id1}'>$type1</option>"; ?>
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
                                        $id_cat=$row['ID'];
                                    }
                                    ?>
                                    <?php echo "<option value='{$id_cat}'>$category1</option>" ?>
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
                                    
                                        <input type="file" name="up_note" class="form-control user up-note" value="<?php echo $up_note; ?>" id="exampleFormControlTextarea2" title="upload a note" style="height:100px;width:700px;" accept="application/pdf">

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
                                <label for="exampleInputEmail1"><span class="label">Country</span></label><br>
                                <select name="country" class="custom-select form-control user">
                                   <?php
                                    $query="SELECT * FROM countries WHERE ID='{$country}'";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $country1=$row['Name'];
                                        $id_coun=$row['ID'];
                                        
                                    }
                                    
                                    
                                    ?>
                                    <?php echo "<option value='{$id_coun}'>$country1</option>"; ?>
                                    
                                    
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
                            
                                   
                                    <label for="exampleInputEmail1"><span class="label">Sell For*</span></label>
                                    
                                       <?php
                                    
                                        if($sell_type=='0')
                                        {
                                           echo '<div class="form-check radio-left">
                                       
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            onclick="fun()" value="0" checked>
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Free
                                        </label>
                                    </div>';
                                            echo '<div class="form-check" style="width:400px";>
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                          onclick="fun1()"  value="1">
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Paid
                                        </label>
                                        </div>'; 
                                         
                                        }
                                        else{
                                            echo '<div class="form-check radio-left">
                                       
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                            onclick="fun()" value="0" >
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Free
                                        </label>
                                    </div>';
                                           echo '<div class="form-check" style="width:400px";>
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1"
                                          onclick="fun1()"  value="1" checked>
                                        <label class="form-check-label label1" for="gridRadios1">
                                            Paid
                                        </label>
                                        </div>'; 
                                        }
                                        
                                        ?>
                                        
                                    
                                
                                
                                <label for="exampleInputEmail1" class="sell-price-label"><span class="label">Sell
                                        Price*</span></label>
                                <input name="sell_price" type="text" class="form-control user sell-price" id="price_radio"
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
                                <input type="file" name="note_preview" class="form-control user up-note" id="exampleFormControlTextarea2" title="upload a picture" style="height:170px;width:700px;" value="<?php echo $note_preview; ?>" accept="application/pdf">
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
                            name="cancel" style="margin-top:-100px;margin-left:20px;" value="Cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<!--    </form>-->
    <hr>
    </form>
    
    
    
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




