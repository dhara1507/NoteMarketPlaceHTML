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

    <!--animate css-->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!-- custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--reponsive css-->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!--Header-->
    <div class="header header-note">
        <div class="navbar-header">
            <!-- LOGO-->
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">
            
            <!--Mobile Menu Open Button-->
            <span id="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right header-search header-contact">
            <ul class="nav nav2 navbar-nav pull-right">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>
                    <form action="Login.php"><input type="submit" class="btn2 btn-contact" value="Login">
                    </form>
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
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                
                    <li>
                        <form action="Login.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Login">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--Header End-->
    <!--Home page-->
    <section id="User-profile" class="search-page">
        <!-- overlay -->
        <div id="home-overlay"></div>
        <!--Home content-->
        <div id="home-content">
            <div id="home-content-inner">
                <div id="home-heading">
                    <h1 class="heading-user wow zoomIn" data-wow-duration="1s">Search Note</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="search">
        <h1 class="search-heading">Search and Filter notes</h1>
        <div id="search-01" class="search-note2">

            <form  method="post" class="form-inline active-purple-3 active-purple-4 search-note">
                <input  name="search" class="form-control user search" type="search" placeholder="   Search notes here.."
                       aria-label="Search" style="width: 1150px;">
                <div class="form-group-left select-search">
                   
                    <select name="type" class="custom-select form-control user select type select-search">
                        <option selected>Select type</option>
                                    <?php
                                    $query="SELECT * FROM notetypes";
                                    $select_type=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($select_type)){
                                        $note_type=$row['Name'];
                                        $id=$row['ID'];
                                        echo "<option value='{$note_type}'>$note_type</option>";
                                    }
                                    ?>
                    </select>
                    <select  name="category" class="custom-select form-control user type">
                        <option selected>Select Category</option>
                                    
                                    <?php
                                    $query="SELECT * FROM notecategories";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $note_cat=$row['Name'];
                                        $id=$row['ID'];
                                        echo "<option value='{$note_cat}'>$note_cat</option>";
                                    }
                                    
                                    
                                    ?>
                    </select>
                    <select name="university" class="custom-select form-control user type">
                       <option selected>Select university</option>
                       <?php
                        $query="SELECT UniversityName FROM sellernotes";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $university=$row['UniversityName'];
                            echo "<option value=$university>$university</option>";
                        }
                        
                        ?>

                    </select>
                    <select name="course" class="custom-select form-control user type">
                       <option selected>Select course</option>
                       <?php
                        $query="SELECT Course FROM sellernotes";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $course=$row['Course'];
                            echo "<option value=$course>$course</option>";
                        }
                        
                        ?>
                       
                    </select>
                    <select name="country" class="custom-select form-control user type">
                        <option selected>Select country</option>
                                    
                                    
                            <?php
                                    $query="SELECT * FROM countries";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $country=$row['Name'];
                                        $id=$row['ID'];
                                        echo "<option value='{$country}'>$country</option>";
                                    }
                                    
                                    
                            ?>
                    </select>
                    <select name="rate" class="custom-select form-control user type">
                        <option selected>Select rating</option>
                        <option value="1">3</option>
                        <option value="2">4</option>
                        <option value="3">Other</option>
                    </select>
                </div>
            </form>
        </div>
        
        
        
        <?php
        $search='';
        $category='';
        $uni='';
        $type='';
        if(isset($_POST['search'])){
        $search=$_POST['search'];
        $country=$_POST['country'];
        $course=$_POST['course'];
        $type=$_POST['type'];
        $category=$_POST['category'];
        $uni=$_POST['university'];
        
        }
        
                $per_page=9;
                if(isset($_GET['page'])){
                    
                    $page=$_GET['page'];
                    
                }
                else{
                    $page='';
                }
                if($page=='' || $page==1){
                    $page_1=0;
                }
                else{
                    $page_1=($page*$per_page)-$per_page;
                    
                }
        
        $query="SELECT sellernotes.ID,sellernotes.Title,sellernotes.UniversityName,sellernotes.NumberofPages,sellernotes.DisplayPicture,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID LEFT JOIN notetypes ON sellernotes.NoteType=notetypes.ID WHERE sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$category%' OR sellernotes.UniversityName LIKE '%$uni%' OR sellernotes.Course LIKE '%$course%' OR notetypes.Name LIKE '%$type%'";

        $find_count=mysqli_query($conn,$query);
        $count=mysqli_num_rows($find_count);
        $count=ceil($count/$per_page);
                
                
        
        
        
        
        $query="SELECT sellernotes.ID,sellernotes.Title,sellernotes.UniversityName,sellernotes.NumberofPages,sellernotes.DisplayPicture,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID LEFT JOIN notetypes ON sellernotes.NoteType=notetypes.ID WHERE sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$category%' OR sellernotes.UniversityName LIKE '%$uni%' OR sellernotes.Course LIKE '%$course%' OR notetypes.Name LIKE '%$type%' LIMIT $page_1,$per_page";

        $result=mysqli_query($conn,$query);
        $count1=mysqli_num_rows($result);
        echo "<h1 class='search-heading' class='heading2'>Total $count1 notes</h1>";    
        echo "<div class='container-search'>
            <div class='row search-row'>";
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $title=$row['Title'];
            $uni=$row['UniversityName'];
            $page=$row['NumberofPages'];
            $date=$row['PublishedDate'];
            $img=$row['DisplayPicture'];
            $type=$row['Name'];
            echo 
            "<div class='col-md-4 col-sm-4'>
                    <div class='search-spa'>
                        <img src='$img' alt='image' class='img-responsive img-1'>
                        <div class='border'>
                            <a style='color:none;' href='notedetail.php?id={$id}'><h4>$title</a></h4>
                            <ul>
                                <li>
                                    <img src='images/Front_images/images/university.png' class='img-responsive uni-img'>
                                    <p>$uni</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/pages.png' class='img-responsive page-img'>
                                    <p>$page</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/calendar.png' class='img-responsive cal-img'>
                                    <p>$date</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/flag.png' class='img-responsive flag-img'>
                                    <p class='red'>5 Users marked this note as inappropiate </p>
                                </li>
                            </ul>
                            <div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                            </div>
                            <p id='search-para'>100 reviews</p>
                        </div>
                    </div>
                </div>";
            
            
        }
        echo "
            </div>
            </div>";
        
        
        
        ?>
        

   <!--Pagination-->
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link left-angle" href="#" aria-label="Previous">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        <?php
        for($i=1;$i<=$count;$i++){
            
            
            
            if($i==$page){
               echo "<li class='page-item'><a class='page-link page page-high' href='search.php?page={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='search.php?page={$i}'>$i</a></li>";
            }
        }
        
        
        ?>

        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>

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