<?php
include "includes/db.php";
//include 'download.php';
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

    <!--responisve css-->
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>
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
    
    <?php
    
    include "includes/header.php";    
    ?>
    <?php
    if(isset($_POST['download'])){
        $file=$_POST['up_note'];
        if($file){
        header("Content-Description:File Transfer");
        header("Content-Type:application/pdf");
        header("Content-Disposition:attachment;filename=".basename($file));
        header("Content-Transfer-Encoding:binary");
        header("Cache-Control:must-revalidate");
        header("Pragma:public");
        }
    }
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    echo "<section id='note-details'>
        <div class='note'>
            <div class='row'>";
     $query="SELECT sellernotes.ID,sellernotes.IsPaid,sellernotes.DisplayPicture,sellernotes.NotesPreview,sellernotes.Title,sellernotes.Description,sellernotes.UniversityName,sellernotes.Course,sellernotes.CourseCode,sellernotes.CourseCode,sellernotes.Professor,sellernotes.SellingPrice,sellernotes.NumberofPages,notecategories.Name as not_name,countries.Name FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN countries ON sellernotes.Country=countries.ID WHERE sellernotes.ID='{$id}'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $note_id=$row['ID'];
        $img=$row['DisplayPicture'];
        $title=$row['Title'];
        $category=$row['not_name'];
        $desc=$row['Description'];
        $uni=$row['UniversityName'];
        $country=$row['Name'];
        $course=$row['Course'];
        $coursecode=$row['CourseCode'];
        $prof=$row['Professor'];
        $page=$row['NumberofPages'];
        $price=$row['SellingPrice'];
        $note_preview="http:/".$row['NotesPreview'];
        $sell=$row['IsPaid'];
        
        }
        $query_note="SELECT FilePath FROM sellernotesattachements WHERE NoteID='{$note_id}'";
        $result1=mysqli_query($conn,$query_note);
        while($row=mysqli_fetch_assoc($result1)){
            $up_note=$row['FilePath'];
            
        }
    
            echo "<div class='col-md-6 col-sm-6'>
                    <div class='note1'>
                        <div class='col-md-6 col-sm-6 col-xs-6'>
                            <h1 class='note-heading'>Notes Details</h1>";
                            if($img){
                        echo "<img src='$img' alt='image' class='img-responsive note-img'>";
                        }
                        else{
                          echo "<img src='images/search/1.jpg' alt='image' class='img-responsive note-img'>";  
                        }
                        
                        echo "</div>
                        <div class='col-md-6 col-sm-6 col-xs-6'>
                            <h1 class='heading-right'>$title</h1>
                            <h5>$category</h5>
                            <p>$desc</p>";
                            if($sell=='0')
                            {
                            echo "<form action='' method='post' class='btn-userPro'>
                            <input type='hidden' name='up_note' value='{$up_note}'>
                            <input type='submit' name='download' class='btn-userP note-btn' value='DOWNLOAD'>
                            </form>";
                            
                            }
                            else{
                                 echo "<form action='' method='post' class='btn-userPro'>
                                    <input type='hidden' name='up_note' value='{$up_note}'>
                                    <input type='submit' name='download' class='btn-userP note-btn' value='DOWNLOAD/$$price'>
                            </form>";
                            }
                            echo "
                        </div>
                    </div>
                </div>
                <div class='col-md-6 col-sm-6 col-xs-6'>
                    <div class='note1 note1-r'>
                        <ul class='note-de' id='right-note'>
                            <li class='li li1'>Institution:<span class='span1'>$uni</span></li>
                            <li class='li'>Country:<span>$country</span></li>
                            <li class='li'>Course Name:<span>$course</span></li>
                            <li class='li'>Course Code:<span style='text-align:right'>$coursecode</span></li>
                            <li class='li'>Proffesor:<span>$prof</span></li>
                            <li class='li'>Number of Pages:<span>$page</span></li>
                            <li class='li'>Approved Date:<span>November 25 2020</span></li>
                            <li class='li'>Rating:<span>";
                            echo "<div class='stars text-left'>";
                            $query="SELECT * FROM sellernotesreviews WHERE NoteID='{$id}'";
                            $result_review=mysqli_query($conn,$query);
                            $count_re=mysqli_num_rows($result_review);
                            $sum=0;
                            while($row=mysqli_fetch_assoc($result_review))
                            {   
                                $sum=$sum+$row['Ratings'];
                                
                            }
                            if($sum){
                            $rat1=round($sum/$count_re);
                            
                            if($rat1==1){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rat1==2){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rat1==3){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rat1==4){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rat1==5){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                            </div>";
                            }
                            
                            }
                            else{
                               echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>"; 
                            }
                                    
                                        
                                   echo "</div>$count_re Reviews
                                   
                                </span></li>";
                            $report="SELECT * FROM sellernotesreportedissues WHERE NoteID='{$id}'";
                                    $result_report=mysqli_query($conn,$report);
                                    $count_report=mysqli_num_rows($result_report);
                                
                           echo "<li class='li li-red'>$count_report Users marked this note as inappropiate</li>
                        </ul>
                    </div>
                </div>";
    echo "</section></div></div>";
//    if(isset($_POST['download'])){
//        
//
//        $email=$_SESSION['email1'];
//        $id1=$_SESSION['id'];
//        $query="SELECT  * FROM users WHERE EmailID='{$email}'";
//        $result=mysqli_query($conn,$query);
//        $count=mysqli_num_rows($result);
//        while($row=mysqli_fetch_assoc($result)){
//            $name=$row['FirstName'];
//            $buyer=$row['EmailID'];
//        }
//        if($count==0)
//        {
//            echo "<script>alert('Please SignIn/Login to download this note')</script>";
//            echo "<script>window.location.href='login.php'</script>";
//        }
//        $query="SELECT * FROM sellernotes LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE Sellernotes.ID='{$id}'";
//        $result=mysqli_query($conn,$query);
//        while($row=mysqli_fetch_assoc($result)){
//            $type=$row['IsPaid'];
//            $price=$row['SellingPrice'];
//            $seller=$row['FirstName'];
//            $seller_email=$row['EmailID'];
//            $seller_id=$row['SellerID'];
//        }
//        
//        if($type=='1'){
//            echo "<script>alert('are You sure U Want to Download this download this paid note.')</script>";
//            $dt=date('Y/m/d H:i:s');
//            $query1="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
//            $result1=mysqli_query($conn,$query1);
//            while($row=mysqli_fetch_assoc($result1)){
//                $path=$row['FilePath'];
//            }
//            if($seller_id==$id1){
//                
//            }
//            else{
//            $query="INSERT INTO downloads(ID,NoteID,Seller,Downloader,IsSellerHasAllowedDownload,AttachementPath,IsAttachmentDownloaded,AttachmentDownlodedDate,IsPaid,PurchasedPrice,NoteTitle,NoteCategory,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive ) VALUES('','{$id}','{$seller_id}','{$id1}',0,'{$path}',0,'{$dt}','1','{$price}','{$title}','{$category}','','','','','')";
//            $result=mysqli_query($conn,$query);
//        
//            if(!$result){
//                die("FAILED".mysqli_error($result));
//            }
//            echo "<script type='text/javascript'>
//                $(document).ready(function(){
//                $('#exampleModal').modal('show');
//                });
//                </script>";
//               $to=$seller_email;
//               $subject=$name."  wants to purchase your notes";
//               $msg="Hello ".$seller.","."\r\n".
//                   "We wants to inform you that,".$name." wants to purchase your note.Plase see Buyer Request tab and allow accsee to buyer if you have received payment from him"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".
//
//
//                    "Regards,"."\r\n"
//                    ."Notes MarketPlace";
//
//            
//                $header="dhara8186@gmail.com";
//               if(mail($to,$subject,$msg,$header)){
//                    
//               }
//            }
//        }
//        else{
//            $dt=date('Y/m/d H:i:s');
//            if($seller_id==$id1){
//                
//            }
//            else{
//            $query="INSERT INTO downloads(ID,NoteID,Seller,Downloader,IsSellerHasAllowedDownload,AttachementPath,IsAttachmentDownloaded,AttachmentDownlodedDate,IsPaid,PurchasedPrice,NoteTitle,NoteCategory,CreatedDate,CreatedBy,ModifiedDate,ModifiedBy,IsActive ) VALUES('','{$id}','{$seller_id}','{$id1}',1,'{$up_note}','1','{$dt}','','0','{$title}','{$category}','','','','','')";
//            $result=mysqli_query($conn,$query);
//            if(!$result){
//                die("FAILED".mysqli_error($result));
//            }
//            }
//        }
//    }
    ?>
    <hr>
    <section id="note-details">
        <div class="note">
            <div class="row">
                <div class="col-md-5">
                                <!-- not-preview-left -->
                                <div id="not-preview-left">
                                    <div class="note-heading">
                                        <h3>Notes Preview</h3>
                                    </div>
                                    <div id="notes-preview">
                                        <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz"  style="margin-left:150px;">
                                  <div class="responsive-wrapper 
                                       responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                <?php    
                               echo "<iframe src='$note_preview' height='450' width='450'>";
                                    
                                echo '<p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                            An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em>Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
                                </iframe>';
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="note-heading note-heading-2">Customer Reviews</h1>
                    <div class="note-right-1">
                      
                        
                        <?php
                         $id1=$_SESSION['id'];
                        echo "<div style='overflow-y:scroll;height:450px;weight:100px'>";
                        $query="SELECT sellernotesreviews.ID,sellernotesreviews.Ratings,sellernotesreviews.Comments,users.FirstName,users.LastName,userprofile.ProfilePicture FROM sellernotesreviews LEFT JOIN users ON sellernotesreviews.ReviewdByID=users.ID LEFT JOIN userprofile ON sellernotesreviews.ReviewdByID=userprofile.UserID WHERE sellernotesreviews.NoteId='{$id}' ORDER BY sellernotesreviews.Ratings DESC,sellernotesreviews.CreatedDate DESC";
                        $result=mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            $rat_id=$row['ID'];
                            $fname=$row['FirstName'];
                            $lname=$row['LastName'];
                            $dp=$row['ProfilePicture'];
                            $rating=$row['Ratings'];
                            $review=$row['Comments'];
                            echo "<div class='col-md-4 col-sm-4 col-xs-4'>";
                            if(!$dp){
                            echo "<img src='images/team/default.jpg'
                                class='img-resposive img-circle note-img-user note-img1'>";
                            }
                            else{
                              echo "<img src='{$dp}'
                                class='img-resposive img-circle note-img-user note-img1'>";
                            }
                            echo "</div>";
                            echo "<div class='col-md-8 col-sm-8 col-xs-8'>
                            <h4 class='note-h1'>$fname  $lname</h4>
                            <a href='?id={$note_id}&&Delete={$rat_id}'><img style='margin-left:400px;margin-top:-40px;' src='images/images/delete.png'></a>";
                            if($rating==1){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rating==2){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rating==3){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rating==4){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star-white.png' class='note-de-star'>
                            </div>";
                            }
                            if($rating==5){
                                echo "<div class='stars text-left'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                                <img src='images/Front_images/images/star.png' class='note-de-star'>
                            </div>";
                            }
                            
                            echo "<div class='note-para'>
                                <p>
                                    $review
                                </p>
                                
                            </div>
                            <hr>";
                            
                        echo "</div>";
                        
                        }
                        echo "</div>";
                        ?> 
                </div>
            </div>
        </div>
        
    </section>
    <?php
       if(isset($_GET['Delete'])){
        $the_id=$_GET['Delete'];
        $query="DELETE FROM sellernotesreviews WHERE ID='{$the_id}'";
        $delete=mysqli_query($conn,$query);
}
        ?>
    <hr>
    

    <!--Footer-->
    <footer id="footer">
        <p>
            <span class="footer-p">Copyright &copy; TatvaSoft All rights reserved.</span>
            <a href="#" class="social-list footer-social"><i class="fa fa-facebook"></i></a>
            <a href="#" class="social-list footer-social"><i class="fa fa-twitter"></i></a>
            <a href="#" class="social-list footer-social"><i class="fa fa-linkedin"></i></a>
        </p>
    </footer>
    <!--Footer Ends-->

    <!--Thanks Popup-->
    <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="images/Notes Details/SUCCESS.png" class="img-circle img-responsive img-center thanks-img">
                    <h4 class="text-center">Thank you for purchasing</h4>
                    <p><span>Dear <?php echo $name; ?></span></p>
                    <p class="thanks-para">As the paid notes-you need to pay to seller <?php echo $seller ?> offline.We will send
                        him an email that you
                        want to download this note.He may contact you further for payment process completion.
                    </p>
                    <p class="thanks-para">In case,you have urgency,</p>
                    <p class="thanks-para">Please contact us on +919866555444</p>
                    <p class="thanks-para">Once he receives the payment and acknoweldgw us-selected notes you can see
                        over my downloads tab for download
                    </p><br>
                    <p class="thanks-para">Have a good day.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js.js"></script>

    <!-- BootStrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- Custom js -->
    <script src="js/script.js"></script>
</body>

</html>
