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
    <?php
    include "includes/header.php";    
    ?>

    <!--Serch-->
    <section id="member-details">
        <div class="member down-dash">
            <h1 class="member-heading">Member </h1>
            <div class="add-note">
                <div class="search-container down-container">
                   <form method="post">
                        <input type="text" class="dash-search user reject-search" placeholder="      Search.." name="search">
                        <button type="submit" name="search1" class="btn-userP save btn-buyer btn-search">SEARCH</button>
                    </form>
<!--
                    <form>
                        <input type="text" class="dash-search user reject-search" placeholder="      Search.." name="search">
                        <input type="button" class="btn-userP save down-btn" value="SEARCH">
                    </form>
-->
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
                
                $order='ORDER BY users.CreatedDate';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'fname':
                        $order="ORDER BY users.FirstName";
                        break;
                    case 'lname':
                        $order="ORDER BY users.LastName";
                        break;
                    case 'email':
                        $order="ORDER BY users.EmailID";
                        break;
                    case 'date':
                        $order="ORDER BY users.CreatedDate";
                        break;
                }}
            ?>
            <?php
                $per_page=5;
                if(isset($_GET['page1']))
                {
                    
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
            $query="SELECT * FROM users WHERE users.RoleID='1' AND (users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR users.CreatedDate LIKE '%$search%')";
            $find_count=mysqli_query($conn,$query);
            if(!$find_count){
                die("fail".mysqli_error($conn));
            }
            $count=mysqli_num_rows($find_count);
            $count=ceil($count/$per_page);
            $sort=='DESC'?$sort='ASC':$sort='DESC';
            
    
    ?>
    <table class="table table-responsive table-down">
        <thead>
             <tr>
                <tr>
                <th scope="col">SR.NO</th>
               <?php echo "<th scope='col'><a style='color:black;' href='member.php?asc=fname&sorting=$sort'>FIRST NAME</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='member.php?asc=lname&sorting=$sort'>LAST NAME</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='member.php?asc=email&sorting=$sort'>EMAIL</a></th>
                <th scope='col'><a style='color:black;' href='member.php?asc=date&sorting=$sort'>JOINING DATE</a></th>
                <th scope='col'>UNDER REVIEW <br><span>NOTES</th>
                <th scope='col'>PUBLISHECD<br><span>NOTES</th>
                <th scope='col'>DOWNLOADED<br><span>NOTES</th>
                <th scope='col'>TOTAL<br>EXPENSIS</th>
                <th scope='col'>TOTAL<br>EARNING</th>
            </tr>
                
            
        </thead>
        <tbody>";
        ?>
           <?php
            
              $query="SELECT * FROM users WHERE users.RoleID='1' AND (users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR users.CreatedDate LIKE '%$search%') $order $sort LIMIT $page_1,$per_page";
                $result=mysqli_query($conn,$query);
                if(!$result){
                    die("fail".mysqli_error($conn));
                }
                $sr=1;
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['ID'];
                    $fname=$row['FirstName'];
                    $lname=$row['LastName'];
                    $email=$row['EmailID'];
                    $date=$row['CreatedDate'];
                    echo "<tr>";
                    echo "<td>$sr</td>";
                    echo "<td>$fname</td>";
                    echo "<td>$lname</td>";
                    echo "<td>$email</td>";
                    echo "<td>$date</td>";
                    $query1="SELECT * FROM sellernotes LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE Status='3' AND SellerID='{$id}'";
                    $result1=mysqli_query($conn,$query1);
                    $cou_in=mysqli_num_rows($result1);
                    echo "<td><a href='notesunderreview.php?Title={$id}'>$cou_in</a></td>";
                    $query2="SELECT * FROM sellernotes LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE Status='4' AND SellerID='{$id}'";
                    $result2=mysqli_query($conn,$query2);
                    $cou_pub=mysqli_num_rows($result2);
                    echo "<td><a href='publishednote.php?Title={$id}'>$cou_pub</a></td>";
                    $query3="SELECT * FROM downloads LEFT JOIN users ON Downloads.Seller=users.ID WHERE Seller='$id'";
                    $result3=mysqli_query($conn,$query3);
                    $cou_down=mysqli_num_rows($result3);
                    echo "<td><a href='downloaded.php?Title1={$id}'>$cou_down</a></td>";
                   
                    $query1="SELECT * FROM sellernotes LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE SellerID='$id'";
                    $result1=mysqli_query($conn,$query1);
                    $cou_in=mysqli_num_rows($result1);
                    $sum=0;
                    while($row=mysqli_fetch_assoc($result1)){
                    
                        $sum=$sum+$row['SellingPrice'];
                        
                    }
                    echo "<td><a href='downloaded.php?Title2={$id}'>$$sum</a></td>";
                    $query_down="SELECT * FROM downloads WHERE downloads.Seller='$id'";
                    $result_down=mysqli_query($conn,$query_down);
                    $cou_in=mysqli_num_rows($result_down);
                    $sum_1=0;
                    while($row=mysqli_fetch_assoc($result_down)){
                        $sum_1=$sum_1+$row['PurchasedPrice'];
                        
                    }
                    echo "<td>$$sum_1</td>";
                    echo "<td>
                    <div class='dropdown'>
                        <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                        <div class='dropdown-content dropdown-admin-content' style='height:90px;'>
                        <a <a onclick=\" javascript:return confirm('Are you sure you want to make this member status as inactivate and member should no longer login to portal')\" href='delete.php?Deactivate={$id}'>Deactivate</a>
                        <a href='memberdetail.php?id={$id}'>View More Details</a>
                        </div>
                    </div></td>";
                    echo "</tr>";
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
                echo "<li class='page-item'><a class='page-link page page-high' href='member.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='member.php?page1={$i}'>$i</a></li>";
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