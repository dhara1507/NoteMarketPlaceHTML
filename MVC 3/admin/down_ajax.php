<?php
include "includes/db.php";
session_start();
if(!empty(isset($_GET['search_data']))){
    $search=$_GET['search_data'];
}
else{
    $search="";
}
if(!empty(isset($_GET['note_data']))){
    $note=$_GET['note_data'];
}
else{
    $note="";
}
if(!empty(isset($_GET['seller_data']))){
    $seller=$_GET['seller_data'];
}
else{
    $seller="";
}
if(!empty(isset($_GET['buyer_data']))){
    $buyer=$_GET['buyer_data'];
}
else{
    $buyer="";
}   
    
    $tit1=$_SESSION['Title'];
    
    $tit2=$_SESSION['Title1'];
    
    $tit3=$_SESSION['Title2'];
    
    $tit_note=$_SESSION['Title_note'];
    
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
                
                $query="SELECT sellernotes.SellerID,downloads.NoteCategory,sellernotes.ID,sellernotes.Title,users.FirstName,users.LastName,downloads.IsPaid,downloads.PurchasedPrice,downloads.Seller,downloads.Downloader,downloads.AttachmentDownlodedDate FROM downloads LEFT JOIN sellernotes ON downloads.NoteID=sellernotes.ID LEFT JOIN users ON downloads.Seller=users.ID LEFT JOIN users u2 ON downloads.Downloader=u2.ID WHERE sellernotes.Title LIKE '%$tit1%' AND sellernotes.SellerID LIKE '%$tit2%' AND sellernotes.SellerID LIKE '%$tit3%' AND sellernotes.ID LIKE '%$tit_note%' AND(sellernotes.Title LIKE '%$search%' OR downloads.NoteCategory LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR u2.FirstName LIKE '%$search%' OR downloads.PurchasedPrice LIKE '%$search%' OR downloads.AttachmentDownlodedDate LIKE '%$search%')";
                
                if(!empty($note)){
                    $where1 .= " AND sellernotes.Title='$note'";
                }
                if(!empty($seller)){
                    $where1 .= " AND CONCAT(users.FirstName,' ',users.LastName)='$seller'";
                }
                if(!empty($buyer)){
                    $where1 .= " AND CONCAT(u2.FirstName,' ',u2.LastName)='$buyer'";
                }
                $data=$query.$where1;
                $find_count=mysqli_query($conn,$data);
                if(!$find_count){
                    die("fail".mysqli_error($conn));
                }
                $count=mysqli_num_rows($find_count);
                $count=ceil($count/$per_page);
                $sort=='DESC'?$sort='ASC':$sort='DESC';
            ?>
            <table class="table table-responsive table-dash" rules="rows">
        <thead>
            <tr>
                <th scope="col">SR NO.</th>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=note title&sorting=$sort'>TITLE</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=category&sorting=$sort'>CATEGORY</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=buyer&sorting=$sort'>BUYER</a></th>"; ?>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=seller&sorting=$sort'>SELLER</a></th>"; ?>
                <th scope="col">SELL TYPE</th>
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=price&sorting=$sort'>PRICE</a></th>"; ?>
                
                <?php echo "<th scope='col'><a style='color:black;' href='?asc=date&sorting=$sort'>DOWNLOADED <br>DATE?TIME</a></th>"; ?>
                
            </tr>
        </thead>
        <tbody>

        <?php
            $where="";
            
            $query_fetch="SELECT sellernotes.SellerID,downloads.NoteCategory,sellernotes.ID,sellernotes.Title,users.FirstName,users.LastName,downloads.IsPaid,downloads.PurchasedPrice,downloads.Seller,downloads.Downloader,downloads.AttachmentDownlodedDate FROM downloads LEFT JOIN sellernotes ON downloads.NoteID=sellernotes.ID LEFT JOIN users ON downloads.Seller=users.ID LEFT JOIN users u2 ON downloads.Downloader=u2.ID WHERE sellernotes.Title LIKE '%$tit1%' AND sellernotes.SellerID LIKE '%$tit2%' AND sellernotes.SellerID LIKE '%$tit3%' AND sellernotes.ID LIKE '%$tit_note%' AND (sellernotes.Title LIKE '%$search%' OR downloads.NoteCategory LIKE '%$search%' OR users.FirstName LIKE '%$search%' OR users.LastName LIKE '%$search%' OR u2.FirstName LIKE '%$search%' OR downloads.PurchasedPrice LIKE '%$search%' OR downloads.AttachmentDownlodedDate LIKE '%$search%')";
            
                if(!empty($note)){
                    $where .=" AND sellernotes.Title='$note'";
                }
                if(!empty($seller)){
                    $where .=" AND CONCAT(users.FirstName,' ',users.LastName)='$seller'";
                }
                if(!empty($buyer)){
                    $where .=" AND CONCAT(u2.FirstName,' ',u2.LastName)='$buyer'";
                }
            $limit=" $order $sort LIMIT $page_1,$per_page";
            $filter=$query_fetch.$where.$limit;
            $result1=mysqli_query($conn,$filter);
            
            if(!$result1){
                die("fail".mysqli_error($conn));
            }
            $sr=1;
            while($row=mysqli_fetch_assoc($result1)){
                $id=$row['ID'];
                $title=$row['Title'];
                $category=$row['NoteCategory'];
                $seller=$row['Seller'];
                $buyer=$row['Downloader'];
                $type=$row['IsPaid'];
                $price=$row['PurchasedPrice'];
                $date=$row['AttachmentDownlodedDate'];
                echo "<tr>";
                echo "<td>$sr</td>";
                echo "<td><a href='notedetail.php?id={$id}'>$title</a></td>";
                echo "<td>$category</td>";
                $query="SELECT * FROM users WHERE ID='{$buyer}'";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $buyer1=$row['FirstName'];
                    $buyer2=$row['LastName'];
                    $id1=$row['ID'];
                }
                echo "<td>$buyer1 $buyer2<a href='memberdetail.php?id={$id1}'><img src='images/images/eye.png' class='eye-image'></a></td>";
                $query="SELECT * FROM users WHERE ID='{$seller}'";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $seller1=$row['FirstName'];
                    $seller2=$row['LastName'];
                    $id1=$row['ID'];
                }
                echo "<td>$seller1 $seller2<a href='memberdetail.php?id={$id1}'><img src='images/images/eye.png' class='eye-image'></a></td>";
                if($type==1){
                    echo "<td>Paid</td>";
                }
                else{
                  echo "<td>Free</td>";   
                }
                echo "<td>$$price</td>";
                echo "<td>$date</td>";
                $down_att="SELECT * FROM sellernotesattachements WHERE NoteID='{$id}'";
                $result_att=mysqli_query($conn,$down_att);
                while($row=mysqli_fetch_assoc($result_att)){
                    $path=$row['FilePath'];
                }
                echo "<td><div class='dropdown'>
                    <img src='images/Front_images/images/dots.svg' class='admin-dots'>
                    <div class='dropdown-content dropdown-admin-content' style='height:90px;'>
                        <a href='../user(back_end)/download.php?file={$path}'>Download Notes</a>
                        <a href='notedetail.php?id={$id}'>View More Details</a>";
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
