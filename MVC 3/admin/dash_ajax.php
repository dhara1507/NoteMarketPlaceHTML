<?php
include "includes/db.php";
session_start();
if(!empty(isset($_GET['search_data']))){
    $search=$_GET['search_data'];
}
else{
    $search="";
}

if(!empty(isset($_GET['month_data']))){
    $month=$_GET['month_data'];
}
else{
    $month="";
}

?>
            <!--Table-->
            
           <?php
                $id_mem=$_SESSION['id'];
                $sort=$_SESSION['sort'];
                $order=$_SESSION['order'];
                
    
                
                $per_page=5;
                if(isset($_GET['page']))
                {
                    
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
                $where1="";
            $mon=date('m');
            $mon1=date('F',mktime(0,0,0,$mon,10));
            if(!$month){
                $query="SELECT users.ID AS Id,sellernotes.ID,sellernotes.Title,sellernotes.IsPaid,users.FirstName,users.LastName,notecategories.Name,sellernotes.SellingPrice,sellernotes.PublishedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE sellernotes.status='4' AND MONTHNAME(sellernotes.PublishedDate)='{$mon1}' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%')";
            }
            else{
                $query="SELECT users.ID AS Id,sellernotes.ID,sellernotes.Title,sellernotes.IsPaid,users.FirstName,users.LastName,notecategories.Name,sellernotes.SellingPrice,sellernotes.PublishedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE sellernotes.status='4' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%')";
            }
                if(!empty($month)){
                $where1.=" AND MONTHNAME(PublishedDate)='$month'";
                }
                $data=$query.$where1;
                $find_count=mysqli_query($conn,$data);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                $sort=='DESC'?$sort='ASC':$sort='DESC';
            ?>
             <table class="table table-responsive table-dash" rules="rows">
        <thead>
            <tr>
                <th scope="col">SR NO.</th>
                <?php echo "<th scope='col'><a style='color:black;' href='dashboard.php?asc=note title&sorting=$sort'>TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='dashboard.php?asc=category&sorting=$sort'>CATEGORY</a></th>"; ?>
                <?php echo "<th scope='col'>ATTACHMENT SIZE</th>"; ?>
                <th scope="col">SELL TYPE</th>
                <?php echo "<th scope='col'><a style='color:black;' href='dashboard.php?asc=price&sorting=$sort'>PRICE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='dashboard.php?asc=pub&sorting=$sort'>PUBLISHER</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='dashboard.php?asc=date&sorting=$sort'>PUBLISHED DATE</a></th>"; ?>
                <?php echo "<th scope='col'>NUMBER OF <br>DOWNLOADS</a></th>"; ?>
            </tr>
        </thead>
        <tbody>
           <?php
            $where="";
            $mon=date('m');
            $mon1=date('F',mktime(0,0,0,$mon,10));
            if(!$month){
                $query_fetch="SELECT users.ID AS Id,sellernotes.ID,sellernotes.Title,sellernotes.IsPaid,users.FirstName,users.LastName,notecategories.Name,sellernotes.SellingPrice,sellernotes.PublishedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE sellernotes.status='4' AND MONTHNAME(sellernotes.PublishedDate)='{$mon1}' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%')";
            }
            else{
                $query_fetch="SELECT users.ID AS Id,sellernotes.ID,sellernotes.Title,sellernotes.IsPaid,users.FirstName,users.LastName,notecategories.Name,sellernotes.SellingPrice,sellernotes.PublishedDate FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE sellernotes.status='4' AND (sellernotes.Title LIKE '%$search%' OR notecategories.Name LIKE '%$search%' OR sellernotes.SellingPrice LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%')";
            }
            if(!empty($month)){
                $where.=" AND MONTHNAME(PublishedDate)='$month'";
            }
            $limit=" $order $sort LIMIT $page_1,$per_page";
            $filter=$query_fetch.$where.$limit;
            $result=mysqli_query($conn,$filter);
            $sr=1;
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['ID'];
                $id1=$row['Id'];
                $title=$row['Title'];
                $category=$row['Name'];
                $type=$row['IsPaid'];
                $price=$row['SellingPrice'];
                $publisher=$row['FirstName'];
                $pub=$row['LastName'];
                $date=$row['PublishedDate'];
                
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td><a href='../User(back_end)/notedetail.php?id={$id}'>$title</a></td>";
                echo "<td>$category</td>";
                echo "<td>10 KB</td>";
                if($type==1){
                echo "<td>Paid</td>";
                }
                else{
                  echo "<td>Free</td>";   
                }
                echo "<td>$price</td>";
                echo "<td>$publisher $pub</td>";
                echo "<td>$date</td>";
                $down="SELECT * FROM downloads WHERE NoteID='{$id}'";
                $result1=mysqli_query($conn,$down);
                $cou=mysqli_num_rows($result1);
                echo "<td><a href='downloaded.php?Title={$title}'>$cou</a></td>";
                $down_att="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
                $result_att=mysqli_query($conn,$down_att);
                while($row=mysqli_fetch_assoc($result_att)){
                    $path=$row['FilePath'];
                }
                echo "<td><div class='dropdown'>
                    <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                    <div class='dropdown-content dropdown-admin-content'>
                        <a href='../user(back_end)/download.php?file={$path}'>Download Note</a>
                        <a href='../User(back_end)/notedetail.php?id={$id}'>View More Details</a>
                        <a role='button' data-target='#report_{$id}' data-toggle='modal'>Unpublished</a>
                    </div>";
                    echo "<div class='modal fade' id='report_{$id}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
        aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <img src='images/Front_images/images/close-icon.svg' class='close-img'>
                    </button>
                </div>
                <div class='modal-body'>
                    <h4 class='star-heading'>$title</h4>
                    <p>Are you sure u Want to Unpublish this note?</p>
                   
                    <label for='exampleFormControlTextarea1'><span class='review-label'>Remarks*
                        </span></label>
                    <form method='post' action='delete.php'>
                    <input type='hidden' name='the_note_id' value='{$id}'>
                     
                    <textarea class='form-control user' placeholder='comments...' rows='5' name='remark' required></textarea>
                    <button type='submit' name='unpublish1' class='btn-userP btn-review' value='SUBMIT'>UNPUBLISH
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
                echo "</div></td>";
                echo "</tr>";
                $sr++;
            }
            ?>

        </tbody>
    </table>
    <?php
    
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
                echo "<li class='page-item'><a class='page-link page page-high' onclick='dash(" . $i . ")'>" . $i . "</a></li>";
               
            }
            else
            {
                echo "<li class='page-item'><a class='page-link page' onclick='dash(" . $i . ")'>" . $i . "</a></li>";
            }
        }
        ?>
        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>


    