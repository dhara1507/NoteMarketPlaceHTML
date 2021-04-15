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

    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
</head>
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
<!--
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
-->
    <!--Header-->
    <div class="header header-note">
        <div class="navbar-header">
        <!-- LOGO-->
        <a href="home.html">
            <img src="images/Homepage/darklogo.png" alt="logo" id="logo-header-user">
        </a>
        <!--Mobile Menu Open Button-->
        <span id="mobile-nav-open-btn" class="mobile-nav-open-btn">&#9776;</span>
        </div>
        <div class="header-right">
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
         <div id="mobile-nav" class="mobile-nav">
            <!--Mobile Menu Close Button-->
            <span id="mobile-nav-close-btn">&times;</span>
            <div id="mobile-nav-content">
                <ul class="nav">
                    <li><a href="search.php">Search Note</a></li>
                    <li><a href="dashboard.php">Sell Your Notes</a></li>
                    <li><a href="buyerreq.php">Buyer Requests</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="#"><img src="<?php echo $img; ?>"
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
        <div class="dashboard down-dash">
            <h1 class="dash-heading">My sold Notes </h1>
            <div class="add-note">
                <div class="search-container down-container download-container">
                    <form method="post">
                        <input type="text" class="dash-search user" placeholder="      Search.." name="search">
                        <button type="submit" name="search1" class="btn-userP save btn-buyer btn-search">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Table-->

            
            <?php
                $sort='DESC';
                if(isset($_GET['sorting'])){
                    $sort=$_GET['sorting'];
                }
                else{
                    $sort='ASC';
                }
                
                $order='ORDER BY downloads.AttachmentDownlodedDate';
                
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'note title':
                        $order="ORDER BY downloads.NoteTitle";
                        break;
                    case 'category':
                        $order="ORDER BY downloads.NoteCategory";
                        break;
                    case 'buyer':
                        $order="ORDER BY users.EmailID";
                        break;
                    case 'price':
                        $order="ORDER BY downloads.PurchasedPrice";
                        break;
                    case 'date':
                        $order="ORDER BY downloads.AttachmentDownlodedDate";
                        break;
                    
                   
                }}
?>
          
        </thead>
        <tbody>
           
            <?php
            $per_page=10;
                if(isset($_GET['page1'])){
                    
                    $page=$_GET['page1'];
                    
                }
                else{
                    $page='1';
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
            $query="SELECT * FROM downloads LEFT JOIN users ON downloads.Seller=users.ID WHERE downloads.Seller='{$id}' AND IsPaid='1' AND IsSellerHasAllowedDownload='1' AND (downloads.NoteTitle LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR downloads.NoteCategory LIKE '%$search%' OR downloads.PurchasedPrice LIKE '%$search%')";
                $find_count=mysqli_query($conn,$query);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                $sort=='DESC'?$sort='ASC':$sort='DESC';
            ?>
            <table class="table table-responsive table-down">
        <thead>
             <tr>
                <tr>
                <th scope="col">SR.NO</th>
               <?php echo "<th scope='col'><a style='color:black;' href='mysoldnote.php?asc=note title&sorting=$sort'>NOTE TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='mysoldnote.php?asc=category&sorting=$sort'>CATEGORY</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='mysoldnote.php?asc=buyer&sorting=$sort'>BUYER</a></th>
                <th scope='col'>SELL TYPE</th>
                <th scope='col'><a style='color:black;' href='mysoldnote.php?asc=price&sorting=$sort'>PRICE</a></th>
                <th scope='col'><a style='color:black;' href='mysoldnote.php?asc=date&sorting=$sort'>DOWNLOADED DATE/TIME</a></th>
            </tr>
                
            
        </thead>
        <tbody>";
            
                    
            $query="SELECT * FROM downloads LEFT JOIN users ON downloads.Seller=users.ID WHERE downloads.Seller='{$id}' AND IsPaid='1' AND IsSellerHasAllowedDownload='1' AND (downloads.NoteTitle LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR downloads.NoteCategory LIKE '%$search%' OR downloads.PurchasedPrice LIKE '%$search%') $order $sort LIMIT $page_1,$per_page";
            $result=mysqli_query($conn,$query);
            $sr=1;
            while($row=mysqli_fetch_assoc($result))
            {
                $note_id=$row['NoteID'];
                $title=$row['NoteTitle'];
                $category=$row['NoteCategory'];
                $buyer=$row['Downloader'];
                $type=$row['IsPaid'];
                $price=$row['PurchasedPrice'];
                $path=$row['AttachementPath'];
                $date=$row['AttachmentDownlodedDate'];
                $query1="SELECT * FROM users WHERE ID='{$buyer}'";
                $result1=mysqli_query($conn,$query1);
                while($row=mysqli_fetch_assoc($result1)){
                    $Email=$row['EmailID'];
                }
                
                echo "<tr>";
                echo "<td class='no'>$sr</td>";
                echo "<td class='blue'><a href='notedetail.php?id={$note_id}'>$title</a></td>";
                echo "<td>$category</td>";
                echo "<td>$Email</td>";
                if($type=='1'){
                echo "<td>Paid</td>";
                }
                else{
                    echo "<td>Free</td>";
                }
                echo "<td>$price</td>";
                echo "<td>$date";
                echo "<a href='notedetail.php?id={$note_id}'><img src='images/Dashboard/eye.png' class='down-eye'></a>";
                echo "<div class='dropdown'>
                        <img src='images/Front_images/images/dots.svg' class='dots'>
                        <div class='dropdown-content sold'>
                            
                            <a href='download.php?file={$path}'>Download Note</a>
                        </div>
                    </div>";
                $sr++;
            }
            
            
            
            
            ?>

            
        </tbody>
    </table>


    <!--Pagination-->
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
                echo "<li class='page-item'><a class='page-link page page-high' href='mysolddnote.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='mysoldnote.php?page1={$i}'>$i</a></li>";
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

    <!-- Custom js -->
    <script src="js/script.js"></script>

</body>

</html>