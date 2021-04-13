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
    
    <script src="js/jquery.min.js.js"></script>
    <script type="text/javascript">
        function searchclick(page){
            var searchtext=$("#searchtext").val();
            var typetext=$("#type").val();
            var categorytext=$("#category").val();
            var universitytext=$("#uni").val();
            var coursetext=$("#course").val();
            var countrytext=$("#country").val();
            var ratingtext=$("#rate").val();
            $.ajax({
                type:"GET",
                url:"fetch.php",
                data:
                {
                    search_data:searchtext,
                    type_data:typetext,
                    category_data:categorytext,
                    university_data:universitytext,
                    course_data:coursetext,
                    country_data:countrytext,
                    rating_data:ratingtext,
                    page:page
                },
                success:function(data){
                    $("#search_data_display").html(data);
                }
            });
        }
        $(document).ready(function(){
            searchclick(1);
        });
        
        
    </script>
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
               <a href="home.html">
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">
            </a>
                
            
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
                <input  name="search" class="form-control user search" id="searchtext" onkeyup="searchclick()" type="search" placeholder="   Search notes here.."
                       aria-label="Search" style="width: 1250px;">
                <div class="form-group-left select-search">
                   
                    <select name="type" class="custom-select form-control user select type select-search" onchange="searchclick()" id='type'>
                        <option value="" selected>Select type</option>
                                    <?php
                                    $query="SELECT * FROM notetypes";
                                    $select_type=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($select_type)){
                                        $note_type=$row['Name'];
                                        $note_id=$row['ID'];
                                        echo "<option value='{$note_id}'>$note_type</option>";
                                    }
                                    ?>
                    </select>
                    <select  name="category" class="custom-select form-control user type" onchange="searchclick()" id='category'>
                        <option  value="" selected>Select Category</option>
                                    
                                    <?php
                                    $query="SELECT * FROM notecategories";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $note_cat=$row['Name'];
                                        $cat_id=$row['ID'];
                                        echo "<option value='{$cat_id}'>$note_cat</option>";
                                    }
                                    
                                    
                                    ?>
                    </select>
                    <select name="university" class="custom-select form-control user type field" onchange="searchclick()" id='uni'>
                       <option  value="" selected>Select university</option>
                       <?php
                        $query="SELECT distinct(UniversityName) FROM sellernotes";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $university=$row['UniversityName'];
                            echo "<option value=$university>$university</option>";
                        }
                        
                        ?>

                    </select>
                    <select name="course" class="custom-select form-control user type" onchange="searchclick()" id='course'>
                       <option  value="" selected>Select course</option>
                       <?php
                        $query="SELECT distinct(Course) FROM sellernotes";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $course=$row['Course'];
                            echo "<option value='{$course}'>$course</option>";
                        }
                        
                        ?>
                       
                    </select>
                    <select name="country" class="custom-select form-control user type" onchange="searchclick()" id='country'>
                        <option  value="" selected>Select country</option>
                                    
                                    
                            <?php
                                    $query="SELECT * FROM countries";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($result)){
                                        $country=$row['Name'];
                                        $coun_id=$row['ID'];
                                        echo "<option value='{$coun_id}'>$country</option>";
                                    }
                                    
                                    
                            ?>
                    </select>
                    <select name="rate" class="custom-select form-control user type" onchange="searchclick()" id='rate'>
                        <option  value="" selected>Select rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </form>
        </div>
        
        
        
        
        <div id="search_data_display"></div>
        
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
