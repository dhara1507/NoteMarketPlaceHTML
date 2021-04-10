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
    

    if(isset($_GET['id'])){
      $id_member=$_GET['id'];  
    }
    echo '<section id="member-details">
        <div class="member-detail">
            <div class="row">';
    ?>
    <?php
    $query_user="SELECT * FROM userprofile LEFT JOIN users ON userprofile.UserID=users.ID WHERE UserID='{$id_member}'";
    $result_user=mysqli_query($conn,$query_user);
    if(!$result_user){
        die("fail".mysqli_error($conn));
    }
    while($row=mysqli_fetch_assoc($result_user)){
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $email=$row['EmailID'];
        $dob=$row['DOB'];
        $number=$row['PhoneNumber'];
        $college=$row['College'];
        $add1=$row['AddressLine1'];
        $add2=$row['AddressLine2'];
        $city=$row['City'];
        $state=$row['State'];
        $cou=$row['Country'];
        $zipcode=$row['ZipCode'];
        $img=$row['ProfilePicture'];
    }
    
    
    
    ?>
    <!--Content-->
    
               <?php
                echo "<div class='col-md-6 col-sm-6 col-xs-6'>
                    <h1 class='member-details-heading'>Member Details</h1>";
                    if(!$img){
                        echo "<img src='images/team/default.jpg' class='img-responsive img-member-de'>";
                    }
                    else{
                    echo "<img src='$img' class='img-responsive img-member-de'>";
                    }
                    echo "<ul class='member-list member-list-1'>
                        <li>First Name:<span>$fname</span></li>
                        <li>Last Name:<span>$lname</span></li>
                        <li>Email:<span>$email</span></li>
                        <li>DOB:<span>$dob</span></li>
                        <li>Phone Number:<span>$number</span></li>
                        <li>College/University:<span>$college</span></li>
                    </ul>
                </div>";
                echo "<div class='col-md-6 col-sm-6 col-xs-6'>
                    <ul class=' member-list member-list-2'>
                        <li>Address 1:<span>$add1</span></li>
                        <li>Address 2:<span>$add2</span></li>
                        <li>City:<span>$city</span></li>
                        <li>State:<span>$state</span></li>
                        <li>Country:<span>$cou</span></li>
                        <li>Zip Code:<span>$zipcode</span></li>
                    </ul>
                </div>";
            echo "</div>
        </div>
    </section>";
    ?>
    <hr>

    <section id="member-details">
        <div class="member-detail">
            <h1 class="member-details-heading">Notes</h1>
        </div>
    </section>
    <?php
                $sort='DESC';
                if(isset($_GET['sorting'])){
                    $sort=$_GET['sorting'];
                }
                else{
                    $sort='ASC';
                }
                
                $order='ORDER BY sellernotes.PublishedDate';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'note title':
                        $order="ORDER BY sellernotes.Title";
                        break;
                    case 'category':
                        $order="ORDER BY notecategories.Name";
                        break;
                    case 'status':
                        $order="ORDER BY referencedata.Value";
                        break;
                    case 'date':
                        $order="ORDER BY users.CreatedDate";
                        $break;
                    case 'pdate':
                        $order="ORDER BY sellernotes.PublishedDate";
                        $break;
                   
                   
                        
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
            
            $query="SELECT sellernotes.ID,sellernotes.Title,notecategories.Name,referencedata.Value,sellernotes.PublishedDate,users.CreatedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (Status='2' OR Status='3' OR Status='4' OR Status='5' OR Status='6') AND SellerID='{$id_member}' $order $sort";
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
               <?php echo "<th scope='col'><a style='color:black;' href='memberdetail.php?id={$id_member}&&asc=note title&sorting=$sort'>NOTE TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='memberdetail.php?id={$id_member}&&asc=category&sorting=$sort'>CATEGORY</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='memberdetail.php?id={$id_member}&&asc=status&sorting=$sort'>STATUS</a></th>
                 <th scope='col'>DOWNLOADED NOTES</a></th>
                 <th scope='col'>TOTAL EARNINGS</a></th>
                <th scope='col'><a style='color:black;' href='memberdetail.php?id={$id_member}&&asc=dateadd&sorting=$sort'>DATE ADDED</a></th>
                <th scope='col'><a style='color:black;' href='memberdetail.php?id={$id_member}&&asc=pdatepub&sorting=$sort'>PUBLISHED DATE</a></th>
            </tr>
                
            
        </thead>
        <tbody>";
        
    
    $query_pub="SELECT sellernotes.ID,sellernotes.Title,notecategories.Name,referencedata.Value,sellernotes.PublishedDate,users.CreatedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (Status='2' OR Status='3' OR Status='4' OR Status='5' OR Status='6') AND SellerID='{$id_member}' $order $sort LIMIT $page_1,$per_page";
    $result_pub=mysqli_query($conn,$query_pub);
    if(!$result_pub){
        die("fail".mysqli_error($conn));
    }
    $sr=1;
    while($row=mysqli_fetch_assoc($result_pub)){
        $id=$row['ID'];
        $title=$row['Title'];
        $category=$row['Name'];
        $status=$row['Value'];
        $date=$row['PublishedDate'];
        $date_down=$row['CreatedDate'];
        echo "<tr>";
        echo "<td>$sr</td>";
        echo "<td><a href='../user(back_end)/notedetail.php?id={$id}'>$title</a></td>";
        echo "<td>$category</td>";
        echo "<td>$status</td>";
        $query_down="SELECT * FROM downloads WHERE NoteID='{$id}' AND Seller='{$id_member}'";
        $result_down=mysqli_query($conn,$query_down);
        $cou_down=mysqli_num_rows($result_down);
        echo "<td><a href='downloaded.php?Title_note={$id}'>$cou_down</a></td>";
        $sum=0;
        while($row=mysqli_fetch_assoc($result_down)){
            $sum=$sum+$row['PurchasedPrice'];
//            $path=$row['AttachementPath'];
        }
        $down_att="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
                $result_att=mysqli_query($conn,$down_att);
                while($row=mysqli_fetch_assoc($result_att)){
                    $path=$row['FilePath'];
                }
        echo "<td>$$sum</td>";
        
        echo "<td>$date_down</td>";
        echo "<td>$date</td>";
        echo "<td><div class='dropdown'>
                    <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                    <div class='dropdown-content dropdown-admin-content dropdown-admin-content-member' style='height:50px;'>
                        <a href='../User(back_end)/download.php?file={$path}'>Download Note</a>
                    </div>
                </div></td>";
        $sr++;
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
        </li>
        
        <?php
        for($i=1;$i<=$count;$i++)
        {
            
            
            
            if($i==$page){
                echo "<li class='page-item'><a class='page-link page page-high' href='memberdetail.php?id={$id_member}&&page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='memberdetail.php?id={$id_member}&&page1={$i}'>$i</a></li>";
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