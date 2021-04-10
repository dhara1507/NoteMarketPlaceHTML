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
   <!--Header-->
   <?php
    include "includes/header.php";    
    ?>
   
    <!--Content-->
    <section id="managed">
        <div class="managed-admin down-dash">
            <h1 class="manage-heading spam-heading manage-ad">Spam Reports</h1>
            <div class="search-container manage-search down-container">
               
                <form class="btn-spam" method="post">
                    <input type="text" class="dash-search user reject-search" placeholder="      Search.." name="search">
                    <input type="submit" name="search1" class="btn-userP save down-btn" value="SEARCH">
                </form>
            </div>
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
                
                $order='ORDER BY sellernotesreportedissues.CreatedDate';
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'report':
                        $order="ORDER BY users.FirstName";
                        break;
                    case 'title':
                        $order="ORDER BY sellernotes.Title";
                        break;
                    
                    case 'date':
                        $order="ORDER BY sellernotesreportedissues.CreatedDate";
                        break;
                    case 'remark':
                        $order="ORDER BY sellernotesreportedissues.Remarks";
                        
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
            $query="SELECT sellernotes.ID AS Id,sellernotes.Category,sellernotesreportedissues.ReportedByID, sellernotesreportedissues.ID,sellernotesreportedissues.Remarks,sellernotesreportedissues.CreatedDate,users.FirstName,users.LastName,sellernotes.Title FROM sellernotesreportedissues LEFT JOIN users ON sellernotesreportedissues.ReportedByID=users.ID LEFT JOIN sellernotes ON sellernotesreportedissues.NoteID=sellernotes.ID WHERE users.FirstName LIKE '%$search%' OR sellernotes.Title LIKE '%$search%' OR sellernotesreportedissues.Remarks LIKE '%$search%'";
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
                <?php echo "<th scope='col'><a style='color:black;' href='spamreport.php?asc=report&sorting=$sort'>REPORTED BY</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='spamreport.php?asc=title&sorting=$sort'>NOTE TITLE</a></th>";?>
                
                <th scope="col">CATEGORY</th>
                <?php echo "<th scope='col'><a style='color:black;' href='spamreport.php?asc=date&sorting=$sort'>DATE EDITED</a></th>
                <th scope='col'><a style='color:black;' href='spamreport.php?asc=remark&sorting=$sort'>REMARK</a></th>"; ?>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query1="SELECT sellernotes.ID AS Id,sellernotes.Category,sellernotesreportedissues.ReportedByID, sellernotesreportedissues.ID,sellernotesreportedissues.Remarks,sellernotesreportedissues.CreatedDate,users.FirstName,users.LastName,sellernotes.Title FROM sellernotesreportedissues LEFT JOIN users ON sellernotesreportedissues.ReportedByID=users.ID LEFT JOIN sellernotes ON sellernotesreportedissues.NoteID=sellernotes.ID WHERE users.FirstName LIKE '%$search%' OR sellernotes.Title LIKE '%$search%' OR sellernotesreportedissues.Remarks LIKE '%$search%' $order $sort LIMIT $page_1,$per_page";
            $result1=mysqli_query($conn,$query1);
            if(!$result1){
                die("fail".mysqli_error($conn));
            }
            $sr=1;
            while($row=mysqli_fetch_assoc($result1)){
                $id=$row['Id'];
                $id1=$row['ID'];
                $report=$row['FirstName'];
                $report1=$row['LastName'];
                $title=$row['Title'];
                $category=$row['Category'];
                $date=$row['CreatedDate'];
                $remark=$row['Remarks'];
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td>$report $report1</td>";
                echo "<td><a href='notedetail.php?id={$id}'>$title</a></td>";
                $query="SELECT * FROM notecategories WHERE ID='{$category}'";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $cat=$row['Name'];
                }
                echo "<td>$cat</td>";
                echo "<td>$date</td>";
                echo "<td>$remark</td>";
                $down_att="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
                $result_att=mysqli_query($conn,$down_att);
                while($row=mysqli_fetch_assoc($result_att)){
                    $path=$row['FilePath'];
                }
                echo "<td>
                    <a <a onclick=\" javascript:return confirm('Are You Sure You Want To Delete reported issue from database?')\"style='color:#fff;' href='spamreport.php?Delete={$id1}'>
                    <img src='images/Front_images/images/delete.png' class='delete'></a></td>
                    <td>
                    <div class='dropdown'>
                        <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                        <div class='dropdown-content dropdown-admin-content dropdown-admin-content-spam' style='height:90px;'>
                            <a href='../user(back_end)/download.php?file={$path}'>Download Note</a>
                            <a href='notedetail.php?id={$id}'>View More Details</a>
                        </div>
                    </div>
                </td>";
                echo "</tr>";
                $sr++;
            }
            ?>
    
        </tbody>
    </table>
    <?php
    if(isset($_GET['Delete'])){
        $del=$_GET['Delete'];
        $query="DELETE FROM sellernotesreportedissues WHERE ID='{$del}'";
        $result=mysqli_query($conn,$query);
    }
    ?>
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
                echo "<li class='page-item'><a class='page-link page page-high' href='managecatogary.php.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='managecatogary.php?page1={$i}'>$i</a></li>";
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