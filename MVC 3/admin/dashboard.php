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
        function dash(page,sort){
            var searchtext=$("#searchtext").val();
            var monthtext=$("#month").val();
            $.ajax({
                type:"GET",
                url:"dash_ajax.php",
                data:{
                    search_data:searchtext,
                    month_data:monthtext,
                    page:page,
                    sort:sort
                },
                success:function(data){
                    $("#dash_data_display").html(data);
                    
                }
                
            });
        }
        $(document).ready(function(){
            dash(1);
        });
    </script>
</head>
<body>
<?php
    include "includes/header.php";    
    ?>
    <?php
    $inreview="SELECT * FROM sellernotes WHERE Status='3'";
    $result=mysqli_query($conn,$inreview);
    $count_re=mysqli_num_rows($result);
    $down="SELECT * FROM downloads WHERE AttachmentDownlodedDate>=date_sub(curdate(),INTERVAL 6 DAY) AND AttachmentDownlodedDate<date_add(curdate(),INTERVAL 1 DAY)";
    $result_down=mysqli_query($conn,$down);
    if(!$result_down){
        die("fail".mysqli_error($conn));
    }
    $count_down=mysqli_num_rows($result_down);
    $reg="SELECT * FROM users WHERE users.RoleID='1' AND CreatedDate>=date_sub(curdate(),INTERVAL 6 DAY) AND CreatedDate<date_add(curdate(),INTERVAL 1 DAY)";
    $result_reg=mysqli_query($conn,$reg);
    $count_reg=mysqli_num_rows($result_reg);
    ?>
    <!--Content-->
    <section id="dash-details" class="dash1">
        <div class="dashboard dashboard-admin">
            <h1 class="dash-heading">Dashboard</h1>
            <div class="row admin-dashboard">
                <div style="margin-left: 10px;" class="col-md-4 col-xs-4 dash-admin">
                    <div class="admin-test">
                        <a href="notesunderreview.php"><h1><?php echo $count_re; ?></h1></a>
                    <p>Number of Notes in Review for Publish</p>
                    </div>
                </div>
                <div style="margin-left: 10px;" class="col-md-4 col-xs-4 dash-admin">
                    <div class="admin-test">
                        <a href="downloaded.php"><h1><?php echo $count_down; ?></h1></a>
                    <p>Number of New Notes Downloaded</p>
                    <p class="seven">(Last 7 days)</p>
                    </div>
                </div>
                <div style="margin-left: 10px;" class="col-md-4 col-xs-4 dash-admin">
                    <a href="member.php"><h1><?php echo $count_reg; ?></h1></a>
                    <p>Number of New Registration(Last 7 days)</p>
                </div>
            </div>
        </div>
    </section>

    <!--Serch-->
    <section id="dash-details" class="dash2">
        <div class="dashboard down-dash dash2-admin">
            <h1 class="dash-heading dash-admin-heading pub-heading">Published Notes </h1>
            <div class="add-note">
                <div class="search-container down-container down-container1">
                     <form method="post">
                        <input type="text" id="searchtext" onkeyup="dash()" class="dash-search user" placeholder="      Search.." name="search">
                        <button type="submit" name="search1" class="btn-userP save btn-buyer btn-search">SEARCH</button>
                        <div class="form-group month">
                        <select class="custom-select form-control user month-admin" id="month" onchange="dash()">
                        <option value=''>SELECT MONTH</option>
                        <?php
                         for($i=0;$i<6;$i++){
                             $y=date('F',strtotime(date('Y-m-01')."-$i month"));
                             echo "<option value='$y'>$y</option>";
                         }
                         ?>
                            </select>
                        </div>
                    </form>
                </div>
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
                    case 'price':
                        $order="ORDER BY sellernotes.SellingPrice";
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
    <div id="dash_data_display"></div>
       
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