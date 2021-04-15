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
        function dash1(page){
            var searchtext=$("#searchtext").val();
            var sellertext=$("#seller").val();
            $.ajax({
                type:"GET",
                url:"note_ajax.php",
                data:{
                    search_data:searchtext,
                    seller_data:sellertext,
                    page:page
                },
                success:function(data){
                    $("#note_data_display").html(data);
                    
                }
                
            });
        }
        $(document).ready(function(){
            dash1(1);
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
            <h1 class="manage-heading">Notes Under Review</h1>
            <p class="form-group-left seller">Seller</p>
            <select name="type" id="seller" onchange="dash1()" class="custom-select-01 form-control user admin-select form-group-left option-notes">
                                    <option value=''>SELLER</option>
                                    <?php
                                    $query="SELECT distinct users.FirstName,users.LastName FROM sellernotes LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE Status='2' OR Status='3' OR Status='4' OR Status='5'";
                                    $select_type=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_assoc($select_type)){
                                        $name=$row['FirstName'];
                                        $name1=$row['LastName'];
                                        echo "<option value='$name $name1'>$name $name1</option>";
                                    }
                                    ?>
                                    
                    </select>

            <div class="search-container manage-search down-container">
                <form method="post">
                        <input type="text" id="searchtext" onkeyup="dash1()" class="dash-search user" placeholder="      Search..">
                        <button type="submit" class="btn-userP save btn-buyer btn-search">SEARCH</button>
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
                
                
                $order="ORDER BY sellernotes.PublishedDate";
                if(isset($_GET['asc'])){
                switch($_GET['asc']){
                    case 'note title':
                        $order="ORDER BY sellernotes.Title";
                        break;
                    case 'category':
                        $order="ORDER BY notecategories.Name";
                        break;
                    case 'pub':
                        $order="ORDER BY users.FirstName";
                        break;
                    case 'date':
                        $order="ORDER BY sellernotes.PublishedDate";
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
    
    ?>
    
    <div id="note_data_display"></div>
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