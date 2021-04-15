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
    
    <!--Header-->
    <?php
    include "includes/header.php";    
    ?>
    

    <!--Content-->
    <section id="managed">
        <div class="managed-admin down-dash">
            <h1 class="manage-heading manage-ad">Manage Administrator</h1>
            <form action="addadmin.php" class="btn-userPro"><input type="submit" class="btn-userP btn-managed btn-category" value="ADD ADMINISTRATOR" style='width:250px'></form>

            <div class="search-container manage-search down-container">
                <form method="post">
                    <input type="text" class="dash-search user" placeholder="      Search.." name="search">
                    <button type="submit" name="search1" class="btn-userP save btn-buyer btn-search">SEARCH</button>
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
                    case 'phn':
                        $order="ORDER BY userprofile.PhoneNumber";
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
            $query="SELECT users.ID,users.FirstName,users.LastName,users.EmailID,userprofile.PhoneNumber,users.CreatedDate,users.IsActive FROM users LEFT JOIN userprofile ON users.ID=userprofile.UserID WHERE users.RoleID='2' AND (users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR userprofile.PhoneNumber LIKE '%$search%' OR users.CreatedDate LIKE '%$search%')";
            
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
                <?php echo "<th scope='col'><a style='color:black;' href='managead.php?asc=fname&sorting=$sort'>FIRSTNAME</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='managead.php?asc=lname&sorting=$sort'>LASTNAME</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='managead.php?asc=email&sorting=$sort'>EMAIL</a></th>";?>
                <?php echo "<th scope='col'><a style='color:black;' href='managead.php?asc=phn&sorting=$sort'>PHONE NO.</a></th>";?>
                
                <?php echo "<th scope='col'><a style='color:black;' href='managead.php?asc=date&sorting=$sort'>DATE ADDED</a></th>"; ?>
                 
                <th scope="col">ACTIVE</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
        
    <?php
    $query="SELECT users.ID,users.FirstName,users.LastName,users.EmailID,userprofile.PhoneNumber,users.CreatedDate,users.IsActive FROM users LEFT JOIN userprofile ON users.ID=userprofile.UserID WHERE users.RoleID='2' AND (users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR users.EmailID LIKE '%$search%' OR userprofile.PhoneNumber LIKE '%$search%' OR users.CreatedDate LIKE '%$search%')$order $sort LIMIT $page_1,$per_page";
    $result=mysqli_query($conn,$query);
    $sr=1;
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['ID'];
        $fname=$row['FirstName'];
        $lname=$row['LastName'];
        $email=$row['EmailID'];
        $phn=$row['PhoneNumber'];
        $date=$row['CreatedDate'];
        $active=$row['IsActive'];
        echo "<tr>";
        echo "<td>$sr</td>";
        echo "<td>$fname</td>";
        echo "<td>$lname</td>";
        echo "<td>$email</td>";
        echo "<td>$phn</td>";
        echo "<td>$date</td>";
        if($active==0){
            echo "<td>YES</td>";
        }
        else{
            echo "<td>NO</td>";
        }
        echo "<td><a href='addadmin.php?Edit={$id}'><img src='images/Dashboard/edit.png'></a>
                    <a <a onclick=\" javascript:return confirm('Are You Sure You Want To make this category inacticate?')\"style='color:#fff;' href='managead.php?Delete={$id}'><img src='images/Front_images/images/delete.png' class='delete'></a></td>";
        echo "</tr>";
        $sr++;
    }
    ?>
   
        </tbody>
    </table>

    <?php
            
      if(isset($_GET['Delete'])){
        $del=$_GET['Delete'];
        $query="UPDATE users SET IsActive=1 WHERE ID='{$del}'";
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
                echo "<li class='page-item'><a class='page-link page page-high' href='managead.php.php?page1={$i}'>$i</a></li>";
            }
            else{
                echo "<li class='page-item'><a class='page-link page' href='managead.php?page1={$i}'>$i</a></li>";
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
    <footer id="footer" class="footer-ad">
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