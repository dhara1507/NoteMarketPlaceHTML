<?php
include "includes/db.php";
session_start();
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="UPDATE users SET IsEmailVerified ='1' WHERE ID='{$id}' ";
    $result=mysqli_query($conn,$query);
    if(!$result){
        echo "nooo";
    }
}





?>