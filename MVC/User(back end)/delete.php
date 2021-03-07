<?php
include "includes/db.php";
?>

<?php
$the_id=$_GET['Delete'];
$query="DELETE FROM sellernotes WHERE ID=$the_id";
$delete=mysqli_query($conn,$query);
header("Location:dashboard.php");
?>