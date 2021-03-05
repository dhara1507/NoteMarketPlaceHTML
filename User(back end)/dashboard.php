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

    <!--animate css-->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!-- custom css-->
    <link rel="stylesheet" href="css/style.css">

    <!--responsive css-->
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
                <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">
            </a>
            <!--Mobile Menu Open Button-->
            <span id="mobile-nav-open-btn" class="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right header-dashboard header-contact">
            <ul class="nav nav2 navbar-nav header-dash pull-right">
                <li><a href="search.php">Search Note</a></li>
                <li><a href="dashboard.php">Sell Your Notes</a></li>
                <li><a href="buyerreq.php">Buyer Requests</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>
                    <div class="dropdown dropdown-dash">
                        <a href="#"><img src="images/Add-notes/user-img.png" class="img-responsive img-circle img-user img-user-dash"></a>
                        <div class="dropdown-content dash-content">
                            <a href="#">My Profile</a>
                            <a href="#">My Download</a>
                            <a href="#" class="sold">My Sold Note</a>
                            <a href="#">My Rejected Notes</a>
                            <a href="#">Change Password</a>
                            <a href="#" class="logout">LOGOUT</a>
                        </div>
                    </div>
                </li>
                <li>
                    <form action="Logout.php"><input type="submit" class="btn2 btn2-user btn-dash" value="Logout"></form>
                </li>
            </ul>
        </div>
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
                        <div class="dropdown">
                            <a href="#"><img src="images/Add-notes/user-img.png" class="img-responsive img-circle img-user img-user-dash"></a>
                            <div class="dropdown-content dash-content dropdown-container">
                                <a href="#">My Profile</a>
                                <a href="#">My Download</a>
                                <a href="#" class="sold">My Sold Note</a>
                                <a href="#">My Rejected Notes</a>
                                <a href="#">Change Password</a>
                                <a href="#" class="logout">LOGOUT</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <form action="Logout.php"><input type="submit" class="btn2 btn2-user btn-search-mobile" value="Logout"></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--Content-->
    <section id="dash-details">
        <div class="dashboard">
            <h1 class="dash-heading dash-he">Dashboard </h1>
            <div class="add-note dash-btn-01">
                <form action="addnote.php" class="btn-userPro"><input type="submit" class="btn-userP save addnote dash-btn" value="ADD NOTE">
                </form>
            </div>
            <div class="row dashboard-row">
                <div class="col-md-7 col-xs-7 dash-first">
                    <div class="row">
                        <div class="col-md-3 col-xs-3 dash1 dash">
                            <img src="images/Dashboard/earning-icon.svg" class="img-responsive table-img">
                            <h5 class="table-heading first-heading">My Earning</h5>

                        </div>
                        <div style="margin-left: 7px;" class="col-md-9 col-xs-9 dash2 dash">
                            <h5 class="table-heading heading1 heading100">100</h5><br>
                            <p class="heading1 dash-para dash-para1">Number of Notes Sold</p>
                            <h5 class="table-heading heading2">$10,00,000</h5>
                            <p class="heading2 dash-para dash-para2">money Earned</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xs-5 dash-right">
                    <div style="margin-left: -7px;" class="col-md-4 col-sm-4 down">
                        <h5 class="table-heading">38</h5>
                        <p class="dash-para">My Downloads</p>
                    </div>
                    <div style="margin-left: 7px;" class="col-md-4 col-sm-4 rej">
                        <h5 class="table-heading">12</h5>
                        <p class="dash-para">My Rejected Notes</p>
                    </div>
                    <div style="margin-left: 7px;" class="col-md-4 col-sm-4 req">
                        <h5 class="table-heading">102</h5>
                        <p class="dash-para">Buyer Requests</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Search-->
    <section id="dash-details">
        <div class="dashboard">
            <h1 class="dash-heading heading-dashboard">In Progress Notes </h1>
            <div class="add-note">
                <div class="search-container down-container dash-container container-dashboard1">
                    <form method="post">
                        <input type="text" class="dash-search user down-search buyer-search" placeholder="      Search.." name="search_f">
                        <button type="submit" name="search" class="btn-userP save">SEARCH</button>
                        <!--
                        <button type="submit" class="btn-userP btn-review"
                            name="cancel" style="margin-top:-100px;margin-left:-30px;" value="Cancel">Cancel</button>
-->

                    </form>
                </div>
            </div>
        </div>
    </section>


    <!--Table-->
    <table class="table table-responsive table-dash" rules="rows">
        <thead>
            <tr>
                <?php
           echo "
                <th scope='col'><a style='color:black;' href='dashboard.php?asc=added date'>ADDED DATE</a></th>
                <th scope='col'><a style='color:black;' href='dashboard.php?asc=title'>TITLE</a></th>
                <th scope='col'><a style='color:black;' href='dashboard.php?asc=category'>CATEGORY</a></th>
                <th scope='col'>STATUS</th>
                <th scope='col'>ACTIONS</th>
            ";
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $order='';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'added date':
                        $order="ORDER BY sellernotes.PublishedDate ASC";
                        
                        break;
                    case 'title':
                        $order="ORDER BY sellernotes.Title ASC";
                    
                        break;
                    case 'category':
                        $order="ORDER BY notecategories.Name ASC";
                        break;
                   
                   
                }}
?>
        

            <?php

            
            $id=$_SESSION['id'];
            $query="SELECT sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE sellernotes.SellerID='{$id}' AND (referencedata.Value='Draft' OR referencedata.Value='Submitted For Review' OR referencedata.Value='In review')";
                $find_count=mysqli_query($conn,$query);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/5);
                 
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
                    $page_1=($page*5)-5;
                }
            
            
            $search='';
            
        if(isset($_POST['search'])){
            
            $search=$_POST['search_f'];
            
            $id=$_SESSION['id'];
           $query="SELECT sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE sellernotes.SellerID='{$id}' && (sellernotes.Title LIKE '%$search%' || notecategories.Name LIKE '%$search%')".$order;
            $select=mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($select))
                {
                    $id=$row['ID'];
                    $category=$row['Name'];
                    $date=$row['PublishedDate'];
                    $title=$row['Title'];
                    $status=$row['Value'];
                if($status=='Draft' || $status=='Submitted For Review' || $status =='In review'){
                echo "<tr>";
                echo "<td>$date</td>";
                echo "<td>$title</td>";
                echo "<td>$category</td>";
                echo "<td>$status</td>";
                if($status=='Draft'){
                     echo "<td><a href='editnote.php?Edit={$id}'><img src='images/Dashboard/edit.png'></a>";
                  echo "<a <a onclick=\" javascript:return confirm('are You sure U Want to Delete')\" href='delete.php?Delete={$id}'><img src='images/Front_images/images/delete.png' name='delete' name='delete'></a></td>";
                     
                        
                        
                }
                else{
                    echo "<td><a href='notedetail.php?id={$id}'><img src='images/Dashboard/eye.png'></a></td>";
                }
                }
                }
                
            
        }
            
        
         else{
             $id=$_SESSION['id'];
        
           $query="SELECT sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE sellernotes.SellerID='{$id}' $order LIMIT $page_1,5";
           
                $select=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($select)){
                    $id=$row['ID'];
                    $category=$row['Name'];
                    $date=$row['PublishedDate'];
                    $title=$row['Title'];
                    $status=$row['Value'];
                if($status=='Draft' || $status=='Submitted For Review' || $status =='In review'){
                echo "<tr>";
                echo "<td>$date</td>";
                echo "<td>$title</td>";
                echo "<td>$category</td>";
                echo "<td>$status</td>";
                if($status=='Draft'){
                     echo "<td><a href='editnote.php?Edit={$id}'><img src='images/Dashboard/edit.png'></a>";
                  echo "<a <a onclick=\" javascript:return confirm('are You sure U Want to Delete')\" href='delete.php?Delete={$id}'><img src='images/Front_images/images/delete.png' name='delete' name='delete'></a></td>";
                     
                        
                        
                }
                else{
                    echo "<td><a href='notedetail.php?id={$id}'><img src='images/Dashboard/eye.png'></a></td>";
                }
                }
                }
                
                
         }
        
            
            ?>



        </tbody>
    </table>


    <!--Pagination-->
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link left-angle" href="#" aria-label="Previous">
                <i class="fa fa-angle-left"></i>
            </a>
         <?php
        for($i=1;$i<=$count;$i++){
            
            
            
            if($i==$page){
                echo "<li class='page-item'><a class='page-link page page-high' href='dashboard.php?page={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='dashboard.php?page={$i}'>$i</a></li>";
            }
        }
        
        
        ?>
        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>

    <!--Table 2-->
    <section id="dash-details">
        <div class="dashboard">
            <h1 class="dash-heading">Published Notes</h1>
            <div class="add-note">
                <div class="search-container container-dashboard1 down-container">
                    <form method="post">
                        <input type="text" class="dash-search user down-search buyer-search" placeholder="      Search.." name="search2">
                        <button type="submit" name="search1" class="btn-userP save">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
        <!--Table-->
        <table class="table table-responsive table-dash" rules="rows">
           
           
           <?php
            
   
            
            ?>
            <thead>
                <tr>
        
                    <?php echo 
                    "<th scope='col'><a style='color:black;' href='dashboard.php?asc=added date'>ADDED DATE</a></th>
                    <th scope='col'><a style='color:black;' href='dashboard.php?asc=title'>TITLE</a></th>
                    <th scope='col'><a style='color:black;' href='dashboard.php?asc=category'>CATEGORY</a></th>
                    <th scope='col'>SELL TYPE</th>
                    <th scope='col'><a style='color:black;' href='dashboard.php?asc=price'>PRICE</a></th>
                    <th scope='col'>ACTIONS</th> ";
                        
                        ?>
                </tr>
            </thead>
            <tbody>
                

                <?php
                 $order='';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'added date':
                        $order="ORDER BY sellernotes.PublishedDate ASC";
                        break;
                    case 'title':
                        $order="ORDER BY TITLE ASC";
                        break;
                    case 'category':
                        $order="ORDER BY notecategories.Name ASC";
                        break;
                    case 'price':
                        $order="ORDER BY sellernotes.SellingPrice ASC";
                        break;
                    
                }
                
                }
                $per_page=5;
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
                
                $query="SELECT sellernotes.ID,sellernotes.IsPaid,sellernotes.SellingPrice,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes  LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE  referencedata.Value='Published'";
                $find_count=mysqli_query($conn,$query);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                
                $search='';
                 if(isset($_POST['search1'])){
            
                        $search=$_POST['search2'];
                        
                         $id=$_SESSION['id'];
                        $query="SELECT sellernotes.ID,sellernotes.IsPaid,sellernotes.SellingPrice,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE sellernotes.SellerID='{$id}' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR referencedata.Value LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%') LIMIT $page_1,$per_page";
                        $select=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($select)){
                            $id=$row['ID'];
                            $category=$row['Name'];
                            $date=$row['PublishedDate'];
                            $title=$row['Title'];
                            $type=$row['IsPaid'];
                            $status=$row['Value'];
                            $price=$row['SellingPrice'];
                        if($status=='Published'){
                        echo "<tr>";
                        echo "<td>$date</td>";
                        echo "<td>$title</td>";
                        echo "<td>$category</td>";
                        if($type=='1'){
                            echo "<td>Paid</td>";
                            echo "<td>$price</td>";
                        }
                        else{
                            echo "<td>Free</td>";
                            echo "<td>0</td>";
                        }


                            echo "<td><a href='notedetail.php?id={$id}'><img src='images/Dashboard/eye.png'></a></td>";
                        }
                        }
                
                        
                        
                 }
                
                else{
            $id=$_SESSION['id'];
               $query="SELECT sellernotes.ID,sellernotes.IsPaid,sellernotes.SellingPrice,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata  ON sellernotes.Status=referencedata.ID WHERE sellernotes.SellerID='{$id}' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR referencedata.Value LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%')".$order;
                $select=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($select)){
                    $id=$row['ID'];
                    $category=$row['Name'];
                    $date=$row['PublishedDate'];
                    $title=$row['Title'];
                    $type=$row['IsPaid'];
                    $status=$row['Value'];
                    $price=$row['SellingPrice'];
                if($status=='Published'){
                echo "<tr>";
                echo "<td>$date</td>";
                echo "<td>$title</td>";
                echo "<td>$category</td>";
                if($type=='1'){
                    echo "<td>Paid</td>";
                    echo "<td>$price</td>";
                }
                else{
                    echo "<td>Free</td>";
                    echo "<td>0</td>";
                }
                
            
                    echo "<td><a href='notedetail.php?id={$id}'><img src='images/Dashboard/eye.png'></a></td>";
                }
                }
                }
                ?>


            </tbody>
        </table>
    </section>
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
                echo "<li class='page-item'><a class='page-link page page-high' href='dashboard.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='dashboard.php?page1={$i}'>$i</a></li>";
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

    <!--wow js-->
    <script src="js/wow/wow.min.js"></script>
    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>
