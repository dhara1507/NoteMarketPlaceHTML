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
                $query="SELECT sellernotes.Status,sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value,sellernotes.SellerID,FirstName,users.LastName,users.ID AS Id FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (sellernotes.Status='2' OR sellernotes.Status='4' OR sellernotes.Status='3' OR sellernotes.Status='5') AND sellernotes.SellerID LIKE '%$tit1%' AND (sellernotes.Title LIKE '%$search1%' OR notecategories.Name LIKE '%$search1%' OR referencedata.Value LIKE '%$search1%' OR users.FirstName LIKE '%$search1%' OR users.LastName LIKE '%$search1%')";
                if(!empty($seller)){
                $where1.=" AND CONCAT(users.FirstName,' ',users.LastName)='$seller'";
            }
                $data=$query.$where1;
                $find_count=mysqli_query($conn,$data);
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                $sort=='DESC'?$sort='ASC':$sort='DESC';
                ?>
                 <table class="table table-responsive table-dash table-down" style='width:1350px;' rules="rows">
        <thead>
            <tr>
                <th scope="col">SR NO.</th>
                <?php echo "<th scope='col' style='width:300px;'><a style='color:black;' href='notesunderreview.php?asc=note title&sorting=$sort'>TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='notesunderreview.php?asc=category&sorting=$sort'>CATEGORY</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='notesunderreview.php?asc=pub&sorting=$sort'>SELLER</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='notesunderreview.php?asc=date&sorting=$sort'>PUBLISHED DATE</a></th>"; ?>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
           <?php
            $where="";
            
            $query_fetch="SELECT sellernotes.Status,sellernotes.ID,sellernotes.Title,sellernotes.PublishedDate,notecategories.Name,referencedata.Value,sellernotes.SellerID,FirstName,users.LastName,users.ID AS Id FROM sellernotes LEFT JOIN notecategories ON sellernotes.Category=notecategories.ID LEFT JOIN referencedata ON sellernotes.Status=referencedata.ID LEFT JOIN users ON sellernotes.SellerID=users.ID WHERE (sellernotes.Status='2' OR sellernotes.Status='4' OR sellernotes.Status='3' OR sellernotes.Status='5') AND sellernotes.SellerID LIKE '%$tit1%' AND (sellernotes.Title LIKE '%$search1%' OR notecategories.Name LIKE '%$search1%' OR referencedata.Value LIKE '%$search1%' OR users.FirstName LIKE '%$search1%' OR users.LastName LIKE '%$search1%')";
            
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
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td><a href='notedetail.php?id={$id}'>$title</a></td>";
                echo "<td>$category</td>";
                echo "<td>$seller $seller1
                <a href='memberdetail.php?id={$id1}'><img src='images/images/eye.png' class='eye-image'></a></td>";
                echo "<td>$date</td>";
                echo "<td>$status</td>";
                echo "<td style='widyh:1000px'>
                        <button type='button' class='btn-notesunder' name='approve' value='Approve'><a  <a onclick=\" javascript:return confirm('If you approve the notes-System will publish the note over portal.Please press yes to continue.')\" style='color:#fff;' href='delete.php?change_app={$id}'>Approve</a></button> 
                       <button type='button' class='btn-notesunder btn-notes-02' data-target='#reject_{$id}' data-toggle='modal' value='Reject'>Reject</button> 
                       <a  <a onclick=\" javascript:return confirm('Via marking the note in Review-System will let user know that review process has been initiated.Please press yes to continue')\"style='color:#fff;' href='delete.php?change_inre={$id}'><button type='button' name='inreview' class='btn-notesunder btn-notes-03' value='InReview'>InReview</a></button> 
                </td>";
                $down_att="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
                $result_att=mysqli_query($conn,$down_att);
                while($row=mysqli_fetch_assoc($result_att)){
                    $path=$row['FilePath'];
                }
                echo "<td><div class='dropdown'>
                    <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                    <div class='dropdown-content dropdown-admin-content' style='height:90px;'>
                        <a href='notedetail.php?id={$id}'>View More Details</a>
                        <a href='../user(back_end)/download.php?file={$path}'>Download Note</a>
                    </div>";
                echo "<div class='modal fade' id='reject_{$id}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
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
                    <label for='exampleFormControlTextarea1'><span class='review-label'>Remarks*
                        </span></label>
                    <form method='post' action='delete.php'>
                    <input type='hidden' name='the_note_id' value='{$id}'>
                    <textarea class='form-control user' placeholder='comments...' rows='5' name='remark' required></textarea>
                    <button type='submit' style='margin-left:330px;' class='btn-notesunder btn-notes-02' name='reject'>Reject</button> 
                       <button type='submit' style='float:right;' data-dismiss='modal' class='btn-notesunder btn-notes-03'>Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
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
                echo "<li class='page-item'><a class='page-link page page-high' onclick='dash1(" . $i . ")'>" . $i . "</a></li>";
               
            }
            else
            {
                echo "<li class='page-item'><a class='page-link page' onclick='dash1(" . $i . ")'>" . $i . "</a></li>";
            }
        }
        ?>
        <li class="page-item">
            <a class="page-link right-angle" href="#" aria-label="Next">
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    