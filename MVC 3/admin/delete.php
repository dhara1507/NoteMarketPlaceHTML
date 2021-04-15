<?php
include "includes/db.php";
session_start();
$admin_id=$_SESSION['id'];
if(isset($_GET['Delete'])){
        $the_id=$_GET['Delete'];
        $query="DELETE FROM sellernotesreviews WHERE ID='{$the_id}'";
        $delete=mysqli_query($conn,$query);
        header("Location:notesunderreview.php");
}

if(isset($_GET['change_app'])){
        $id_change=$_GET['change_app'];
        $query1="UPDATE sellernotes SET Status='4',AdminRemarks='',ActionedBy='{$admin_id}' WHERE ID='{$id_change}'";
        $result1=mysqli_query($conn,$query1);
        header("Location:notesunderreview.php");
}
if(isset($_GET['change_inre'])){
        $id_inre=$_GET['change_inre'];
        $query3="UPDATE sellernotes SET Status='3',AdminRemarks='',ActionedBy='{$admin_id}' WHERE ID='{$id_inre}'";
        $result3=mysqli_query($conn,$query3);
        header("Location:notesunderreview.php");
}
if(isset($_POST['reject'])){
        $remark=$_POST['remark'];
        $the_id=$_POST['the_note_id'];
        $query4="UPDATE sellernotes SET Status='5',AdminRemarks='{$remark}',ActionedBy='{$admin_id}' WHERE ID='{$the_id}'";
        $result4=mysqli_query($conn,$query4);
        header("Location:notesunderreview.php");
    }

    if(isset($_POST['unpublish'])){
        $remark=$_POST['remark'];
        $the_note_id=$_POST['the_note_id'];
        $query_un="UPDATE sellernotes SET Status='6',AdminRemarks='{$remark}' WHERE ID='{$the_note_id}'";
        $result_un=mysqli_query($conn,$query_un);
        if(!$result_un){
            die("fail".mysqli_error($conn));
        }
        $query="SELECT * FROM sellernotes WHERE ID='{$the_note_id}'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $seller=$row['SellerID'];
            $title=$row['Title'];
            
        }
        $query1="SELECT * FROM users WHERE ID='{$seller}'";
        $result1=mysqli_query($conn,$query1);
        while($row=mysqli_fetch_assoc($result1)){
            $email=$row['EmailID'];
            $name=$row['FirstName'];
        }
        $to=$email;
        $subject="Sorry!We need to remove your notes from our portal";
        $msg="Hello ".$name."\r\n".
            "We want to inform you that,your note $title has been removed from the portal."."\r\n".
            "Please find our remark as below"."\r\n".
            $remark."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".
            
            
            "Regards,"."\r\n".
            "Notes MarketPlace";
        $header="dhara8186@gmail.com";
        if(mail($to,$subject,$msg,$header)){
            header("Location:publishednote.php");
         }
    }
if(isset($_POST['unpublish1'])){
        $remark=$_POST['remark'];
        $the_note_id=$_POST['the_note_id'];
        $query_un="UPDATE sellernotes SET Status='6',AdminRemarks='{$remark}' WHERE ID='{$the_note_id}'";
        $result_un=mysqli_query($conn,$query_un);
        if(!$result_un){
            die("fail".mysqli_error($conn));
        }
        $query="SELECT * FROM sellernotes WHERE ID='{$the_note_id}'";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $seller=$row['SellerID'];
            $title=$row['Title'];
            
        }
        $query1="SELECT * FROM users WHERE ID='{$seller}'";
        $result1=mysqli_query($conn,$query1);
        while($row=mysqli_fetch_assoc($result1)){
            $email=$row['EmailID'];
            $name=$row['FirstName'];
        }
        $to=$email;
        $subject="Sorry!We need to remove your notes from our portal";
        $msg="Hello ".$name."\r\n".
            "We want to inform you that,your note $title has been removed from the portal."."\r\n".
            "Please find our remark as below"."\r\n".
            $remark."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n"."\r\n".
            
            
            "Regards,"."\r\n".
            "Notes MarketPlace";
        $header="dhara8186@gmail.com";
        if(mail($to,$subject,$msg,$header)){
            header("Location:dashboard.php");
         }
    }
if(isset($_GET['Approve'])){
    $approve=$_GET['Approve'];
    $query_app="UPDATE sellernotes SET Status='4',ActionedBy='{$admin_id}',AdminRemarks='' WHERE ID='{$approve}'";
    $result=mysqli_query($conn,$query_app);
    header("Location:rejectednote.php");
}
if(isset($_GET['Deactivate'])){
    $deac=$_GET['Deactivate'];
    $query_de="UPDATE users SET IsActive='1' WHERE ID='$deac'";
    $result_de=mysqli_query($conn,$query_de);
    $query_sell="UPDATE sellernotes SET Status='6' WHERE Status='4' AND SellerID='$deac'";
    $result_sell=mysqli_query($conn,$query_sell);
    if(!$result_sell){
        die("fail".mysqli_error($conn));
    }
   header("Location:member.php");
}
?>