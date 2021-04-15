<?php
include "includes/db.php";
session_start();
if(!empty(isset($_GET['search_data']))){
    $search1=$_GET['search_data'];
}
else{
    $search1="";
}

if(!empty(isset($_GET['seller_data']))){
    $seller=$_GET['seller_data'];
}
else{
    $seller="";
}
$tit1=$_SESSION['Title'];
    echo $tit1;
?>
            
             <!--Table-->
            <?php
                
                $id_admin=$_SESSION['id'];
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
                $where1='';
                $query="SELECT sellernotes.ActionedBy,sellernotes.SellerID,sellernotes.SellingPrice,sellernotes.IsPaid,sellernotes.Status,sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value,users.FirstName,users.LastName,users.ID as Id FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (sellernotes.Status='4') AND sellernotes.SellerID LIKE '%$tit1%' AND (sellernotes.Title LIKE '%$search1%' OR notecategories.Name LIKE '%$search1%' OR sellernotes.SellingPrice LIKE '%$search1%' OR users.FirstName LIKE '%$search1%' OR users.LastName LIKE '%$search1%')";
                if(!empty($seller)){
                $where1.=" AND CONCAT(users.FirstName,' ',users.LastName)='$seller'";
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
                <?php echo "<th scope='col' style='width:300px;'><a style='color:black;' href='?asc=note title&sorting=$sort'>TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=category&sorting=$sort'>CATEGORY</a></th>"; ?>
                <th scope="col">SELL TYPE</th>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=price&sorting=$sort'>PRICE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=seller&sorting=$sort'>SELLER</a></th>"; ?>
                
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=date&sorting=$sort'>PUBLISHED DATE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=app&sorting=$sort'>APPROVED BY</a></th>"; ?>
                <th scope="col">NUMBER OF <br>DOWNLOADS</th>
            </tr>
        </thead>
        <tbody>
                 
           <?php
            $where="";
            $query_fetch="SELECT sellernotes.ActionedBy,sellernotes.SellerID,sellernotes.SellingPrice,sellernotes.IsPaid,sellernotes.Status,sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value,users.FirstName,users.LastName,users.ID as Id FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (sellernotes.Status='4') AND sellernotes.SellerID LIKE '%$tit1%' AND (sellernotes.Title LIKE '%$search1%' OR notecategories.Name LIKE '%$search1%' OR sellernotes.SellingPrice LIKE '%$search1%' OR users.FirstName LIKE '%$search1%' OR users.LastName LIKE '%$search1%')";
            
            if(!empty($seller)){
                $where.=" AND CONCAT(users.FirstName,' ',users.LastName)='$seller'";
            }
        
            $limit=" $order $sort LIMIT $page_1,$per_page";
            $filter=$query_fetch.$where.$limit;
            $result=mysqli_query($conn,$filter);
            
            if(!$result){
                die("fail".mysqli_error($conn));
            }
            $sr=1;
            while($row=mysqli_fetch_assoc($result)){
                $id1=$row['Id'];
                $id=$row['ID'];
                $title=$row['Title'];
                $category=$row['Name'];
                $seller=$row['FirstName'];
                $seller1=$row['LastName'];
                $date=$row['PublishedDate'];
                $status=$row['Value'];
                $type=$row['IsPaid'];
                $action=$row['ActionedBy'];
                $price=$row['SellingPrice'];
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td><a href='notedetail.php?id={$id}'>$title</a></td>";
                echo "<td>$category</td>";
                if($type==1){
                echo "<td>Paid</td>";
                }
                else{
                  echo "<td>Free</td>";   
                }
                echo "<td>$$price</td>";
                echo "<td style='width:200px'>$seller $seller1 <a href='memberdetail.php?id={$id1}'><img src='images/images/eye.png' class='eye-image'></a></td>";
                echo "<td>$date</td>";
                $admin="SELECT * FROM sellernotes LEFT JOIN users ON sellernotes.ActionedBy=users.ID WHERE sellernotes.ActionedBy='{$action}'";
                $result_admin=mysqli_query($conn,$admin);
                while($row=mysqli_fetch_assoc($result_admin)){
                    $approedby=$row['FirstName'];
                    $app1=$row['LastName'];
                }
                echo "<td>$approedby $app1</td>";
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
                        <a href='notedetail.php?id={$id}'>View More Details</a>
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
                    <button type='submit' name='unpublish' class='btn-userP btn-review' value='SUBMIT'>UNPUBLISH
                    </button>
                    <button type='submit' style='margin-left:10px;' data-dismiss='modal' class='btn-userP btn-review'>Cancel</button>
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
                echo "<li class='page-item'><a class='page-link page page-high' onclick='dash2(" . $i . ")'>" . $i . "</a></li>";
               
            }
            else
            {
                echo "<li class='page-item'><a class='page-link page' onclick='dash2(" . $i . ")'>" . $i . "</a></li>";
            }
        }
        ?>
        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    