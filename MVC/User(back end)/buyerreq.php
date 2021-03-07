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

    <!--Responsive css-->
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
        <a href="#home">
            <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user" class="logo-buyer">
        </a>
        <!--Mobile Menu Open Button-->
        <span id="mobile-nav-open-btn" class="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right header-buyer">
            <ul class="nav nav2 navbar-nav pull-right">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="buyerreq.php">Buyer Requests</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="#"><img src="images/Add-notes/user-img.png" class="img-responsive img-circle img-user"></a>
                </li>
                <li>
                    <form action="logout.php"><input type="submit" class="btn2 btn2-user btn-buyer" value="Logout"></form>
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
                    <li><a href="#">FAQ</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="#"><img src="images/Add-notes/user-img.png"
                                class="img-responsive img-circle img-user"></a>
                    </li>
                    <li>
                        <form action="logout.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Logout"></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--Serch-->
    <section id="dash-details">
        <div class="dashboard">
            <h1 class="dash-heading buyer-heading">Buyer Requests</h1>
            <div class="add-note search-buyer">
                <div class="search-container buyer-container">
                    <form method="post">
                        <input type="text" class="dash-search user" placeholder="      Search.." name="search">
                        <button type="submit" name="search1" class="btn-userP save btn-buyer btn-search">SEARCH</button>
<!--                        <input type="submit"  name="search" class="btn-userP save btn-buyer btn-search" value="SEARCH">-->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Table--> 
    <table class="table table-down">
        <thead>
           
            <tr>
                <th scope="col">SR.NO</th>
                <th scope="col"><a style='color:black;' href='buyerreq.php?asc=note title'>NOTE TITLE</a></th>
                <th scope="col"><a style='color:black;' href='buyerreq.php?asc=category'>CATEGORY</a></th>
                <th scope="col"><a style='color:black;' href='buyerreq.php?asc=buyer'>BUYER</a></th>
                <th scope="col">PHONE NO.</th>
                <th scope="col">SELL TYPE</th>
                <th scope="col"><a style='color:black;' href='buyerreq.php?asc=price'>PRICE</a></th>
                <th scope="col"><a style='color:black;' href='buyerreq.php?asc=date'>DOWNLOADED DATE/TIME</a></th>
            </tr>
        </thead>
        <tbody>
          
          <?php
                $order='';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'note title':
                        $order="ORDER BY downloads.NoteTitle ASC";
                        break;
                    case 'category':
                        $order="ORDER BY downloads.NoteCategory  ASC";
                        break;
                    case 'buyer':
                        $order="ORDER BY users.EmailID ASC";
                        break;
                    case 'price':
                        $order="ORDER BY downloads.PurchasedPrice ASC";
                        break;
                    case 'date':
                        $order="ORDER BY downloads.AttachmentDownlodedDate ASC";
                        break;
                   
                }}
?>
           <?php
            $per_page=10;
                if(isset($_GET['page1'])){
                    
                    $page=$_GET['page1'];
                    
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
            $search='';
                if(isset($_POST['search1'])){
                $search=$_POST['search'];
                
                }
                $id=$_SESSION['id'];
                $query="SELECT * FROM downloads LEFT JOIN users ON downloads.Seller=users.ID WHERE downloads.Seller='{$id}' AND IsPaid='1'";
                $find_count=mysqli_query($conn,$query);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                
            
            
            $query="SELECT * FROM downloads LEFT JOIN users ON downloads.Seller=users.ID WHERE downloads.Seller='{$id}' AND IsPaid='1'   AND (downloads.NoteTitle LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR downloads.NoteCategory LIKE '%$search%' OR downloads.PurchasedPrice LIKE '%$search%') $order LIMIT $page_1,$per_page";
            $result=mysqli_query($conn,$query);
            $sr=1;
            while($row=mysqli_fetch_assoc($result)){
                $title=$row['NoteTitle'];
                $category=$row['NoteCategory'];
                $buyer=$row['EmailID'];
                $selltype=$row['IsPaid'];
                $price=$row['PurchasedPrice'];
                $date=$row['AttachmentDownlodedDate'];
                
                
                echo "<tr>";
                echo "<td class='no'>$sr</td>";
                echo "<td class='blue'>$title</td>";
                echo "<td>$category</td>";
                echo "<td>$buyer</td>";
                echo "<td>+91 2956473858</td>";
                echo "<td>Paid</td>";
                echo "<td>$price</td>";
                echo "<td>$date<a href='notedetail.php'><img src='images/Dashboard/eye.png' class='down-eye'></a>";
                echo "<div class='dropdown'>
                        <img src='images/Front_images/images/dots.svg' class='dots'>
                        <div class='dropdown-content sold'>
                            <a href='#'>Allow Download</a>
                        </div>
                    </div>";
                echo "</tr>";
                $sr++;
            
            }
            ?>

        </tbody>
    </table>
    </div>


    <!--Pagination-->
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link left-angle" href="#" aria-label="Previous">
                <i class="fa fa-angle-left"></i>
            </a>
        </li>
        
        <?php
        for($i=1;$i<=$count;$i++)
        {
            
            
            
            if($i==$page){
                echo "<li class='page-item'><a class='page-link page page-high' href='buyerreq.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='buyerreq.php?page1={$i}'>$i</a></li>";
            }
        }
        
        
        ?>

        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
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

    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>