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
    <script src="js/jquery.min.js.js"></script>
    <script type="text/javascript">
        function dash2(page){
            var searchtext=$("#searchtext").val();
            var notetext=$("#note").val();
            var sellertext=$("#seller").val();
            var buyertext=$("#buyer").val();
            $.ajax({
                type:"GET",
                url:"down_ajax.php",
                data:{
                    search_data:searchtext,
                    note_data:notetext,
                    seller_data:sellertext,
                    buyer_data:buyertext,
                    page:page
                },
                success:function(data){
                    $("#down_data_display").html(data);
                    
                }
                
            });
        }
        $(document).ready(function(){
            dash2(1);
        });
    </script>
</head>

<body>
    <?php
    include "includes/header.php";    
    ?>
    
    <!--Content-->
    <section id="managed">
        <div class="managed-admin down-dash">
            <h1 class="manage-heading">Downloaded Notes</h1>
            <p class="form-group-left seller">Note</p>
            <select id="note" onchange="dash2()" class="custom-select-01 form-control user admin-select form-group-left option-notes">
                <option value="" class="user">Select note</option>
                <?php
                $query="SELECT distinct sellernotes.Title FROM downloads LEFT JOIN sellernotes ON sellernotes.ID=downloads.NoteID";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $title=$row['Title'];
                    echo "<option value='{$title}'>$title</option>";
                }
                ?>
            </select>
            <p class="form-group-left seller">Seller</p>
            <select id="seller" onchange="dash2()" class="custom-select-01 form-control user admin-select admin-select1 select-note option-notes">
              <option value="" class="user">Seller</option>
               <?php
                $query="SELECT distinct users.FirstName,users.LastName FROM downloads LEFT JOIN users ON downloads.Seller=users.ID";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $seller=$row['FirstName'];
                    $seller1=$row['LastName'];
                    echo "<option value='$seller $seller1'>$seller $seller1</option>";
                }
                
                
                ?>
                
            </select>
            <p class="form-group-left seller">Buyer</p>
            <select id="buyer" onchange="dash2()" class="custom-select-01 form-control user admin-select admin-select1 select-note option-notes">
              <option value="" class="user">Buyer</option>
               <?php
                $query="SELECT distinct users.FirstName,users.LastName FROM downloads LEFT JOIN users ON downloads.Downloader=users.ID";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $buyer=$row['FirstName'];
                    $buyer1=$row['LastName'];
                    echo "<option value='$buyer $buyer1'>$buyer $buyer1</option>";
                }
                
                
                ?>
                
            </select>
            
            <div class="search-container manage-search down-container down-container1">
                <form>
                    <input type="text" id="searchtext" onkeyup="dash2()" class="dash-search user reject-search" placeholder="      Search.." name="search">
                    <input type="button" class="btn-userP save down-btn" value="SEARCH">
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
                
                
                $order="ORDER BY downloads.AttachmentDownlodedDate";
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'note title':
                        $order="ORDER BY sellernotes.Title";
                        break;
                    case 'category':
                        $order="ORDER BY downloads.NoteCategory";
                        break;
                    case 'buyer':
                        $order="ORDER BY u2.FirstName";
                        break;
                    case 'seller':
                        $order="ORDER BY users.FirstName";
                        break;
                    case 'price':
                        $order="ORDER BY downloads.PurchasedPrice";
                        break;
                    case 'date':
                        $order="ORDER BY downloads.AttachmentDownlodedDate";
                        break;
                }
                
                }
                $_SESSION['sort']=$sort;
                $_SESSION['order']=$order;
                
    ?>
    <?php
    if(isset($_GET['Title']))
    {
        $tit=$_GET['Title'];
        $_SESSION['Title']=$tit;
    }
    else{
        $_SESSION['Title']='';
    }
    if(isset($_GET['Title1']))
    {
        $tit=$_GET['Title1'];
        $_SESSION['Title1']=$tit;
    }
    else{
        $_SESSION['Title1']='';
    }
    if(isset($_GET['Title2']))
    {
        $tit=$_GET['Title2'];
        $_SESSION['Title2']=$tit;
    }
    else{
        $_SESSION['Title2']='';
    }
    if(isset($_GET['Title_note'])){
        $tit_note=$_GET['Title_note'];
        $_SESSION['Title_note']=$tit_note;
    }
    else{
        $_SESSION['Title_note']='';
    }
    ?>
    <div id="down_data_display"></div>
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