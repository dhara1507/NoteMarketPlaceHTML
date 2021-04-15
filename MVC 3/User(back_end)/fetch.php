<?php
include "includes/db.php";
if(!empty(isset($_GET['search_data']))){
    $search=$_GET['search_data'];
}
else{
    $search="";
}
if(!empty(isset($_GET['type_data']))){
    $type=$_GET['type_data'];
}
else{
    $type="";
}
if(!empty(isset($_GET['category_data']))){
    $category=$_GET['category_data'];
}
else{
    $category="";
}
if(!empty(isset($_GET['university_data']))){
    $university=$_GET['university_data'];
}
else{
    $university="";
}
if(!empty(isset($_GET['course_data']))){
    $course=$_GET['course_data'];
}
else{
    $course="";
}
if(!empty(isset($_GET['country_data']))){
    $country=$_GET['country_data'];
}
else{
    $country="";
}
if(!empty(isset($_GET['rating_data']))){
    $rate=$_GET['rating_data'];
}
else{
    $rate="";
}

                $per_page=9;
                if(isset($_GET['page'])){
                    
                    $page=$_GET['page'];
                    
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
            $whereQuery1='';
            $query = "SELECT DISTINCT sellernotes.ID,sellernotes.ID,sellernotes.Title,sellernotes.NoteType,sellernotes.Category,sellernotes.UniversityName,sellernotes.Course,sellernotes.Country,sellernotes.NumberofPages,sellernotes.UniversityName,sellernotes.PublishedDate,sellernotes.DisplayPicture FROM sellernotes LEFT JOIN sellernotesreviews ON sellernotes.ID=sellernotesreviews.NoteID WHERE sellernotes.IsActive=1 AND sellernotes.Status='4' AND sellernotes.Title LIKE '%$search%'";
            if(!empty($type)){
                $whereQuery1 .=" AND NoteType='$type'";
            }
            if(!empty($category)){  
                $whereQuery1 .= " AND Category='$category'";
            }
            if(!empty($university)){
                $whereQuery1 .=" AND UniversityName='$university'";
            }
            if(!empty($course)){
                $whereQuery1 .=" AND Course='$course'";
            }
            if(!empty($country)){
                $whereQuery1 .=" AND Country='$country'";
            }
            if(!empty($rate)){
                $whereQuery1 .=" AND Ratings>'$rate'";
            }
    
    
        
        $data=$query.$whereQuery1;
        $find_count=mysqli_query($conn,$data);
        $count=mysqli_num_rows($find_count);
        $count=ceil($count/$per_page);
        
        $whereQuery = ""; 
        $query_fetch = "SELECT DISTINCT sellernotes.ID,sellernotes.ID,sellernotes.Title,sellernotes.NoteType,sellernotes.Category,sellernotes.UniversityName,sellernotes.Course,sellernotes.Country,sellernotes.NumberofPages,sellernotes.UniversityName,sellernotes.PublishedDate,sellernotes.DisplayPicture FROM sellernotes LEFT JOIN sellernotesreviews ON sellernotes.ID=sellernotesreviews.NoteID WHERE sellernotes.IsActive=1 AND sellernotes.Status='4' AND sellernotes.Title LIKE '%$search%'";
        if(!empty($type)){
            $whereQuery .=" AND NoteType='$type'";
        }
        if(!empty($category)){  
            $whereQuery .=" AND Category='$category'";
        }
        if(!empty($university)){
            $whereQuery .=" AND UniversityName='$university'";
        }
        if(!empty($course)){
            $whereQuery .=" AND Course='$course'";
        }
        if(!empty($country)){
            $whereQuery .=" AND Country='$country'";
        }
        if(!empty($rate)){
            $whereQuery .=" AND Ratings>='$rate'";
        }
        $limit=" LIMIT $page_1,$per_page";
        $filter_data=$query_fetch.$whereQuery.$limit;
        $result=mysqli_query($conn,$filter_data);
        if(!$result){
            die("fail".mysqli_error($conn));
        }
        $count1=mysqli_num_rows($result);
        if($count1==0)
        {
            echo "<h1 class='search-heading' class='heading2'>NO RECORD FOUND</h1>"; 
        }
        else{
        echo "<h1 class='search-heading' class='heading2'>Total $count1 notes</h1>";    
        echo "<div class='container-search'>
            <div class='row search-row'>";
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $title=$row['Title'];
            $uni=$row['UniversityName'];
            $page=$row['NumberofPages'];
            $date=$row['PublishedDate'];
            $img=$row['DisplayPicture'];
            echo 
            "<div class='col-md-4 col-sm-4' id='data'>
                    <div class='search-spa'>";
                        if($img){
                        echo "<img src='$img' alt='image' class='img-responsive img-1'>";
                        }
                        else{
                          echo "<img src='images/search/1.jpg' alt='image' class='img-responsive img-1'>";  
                        }
                        echo "<div class='border'>
                            <a style='color:none;' href='notedetail.php?id={$id}'><h4>$title</a></h4>
                            <ul>
                                <li>
                                    <img src='images/Front_images/images/university.png' class='img-responsive uni-img'>
                                    <p>$uni</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/pages.png' class='img-responsive page-img'>
                                    <p>$page</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/calendar.png' class='img-responsive cal-img'>
                                    <p>$date</p>
                                </li>
                                <li>
                                    <img src='images/Front_images/images/flag.png' class='img-responsive flag-img'>";
                                    $report="SELECT * FROM sellernotesreportedissues WHERE NoteID='{$id}'";
                                    $result_report=mysqli_query($conn,$report);
                                    $count_report=mysqli_num_rows($result_report);
                                    echo "<p class='red'>$count_report Users marked this note as inappropiate </p>
                                </li>
                            </ul>";
                            
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
                            if($rat1==1)
                            {
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
                            echo "<p id='search-para'>$count_re reviews</p>
                        </div>
                    </div>
                </div>";
        }
        
        echo "
            </div>
            </div>";
        
        
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
        
        for($i=1;$i<=$count;$i++){
            if($i==$page){
                echo "<li class='page-item'><a class='page-link page page-high' onclick='searchclick(" . $i . ")'>" . $i . "</a></li>";
               
            }
            else
            {
                echo "<li class='page-item'><a class='page-link page' onclick='searchclick(" . $i . ")'>" . $i . "</a></li>";
            }
        }
        ?>
        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>


