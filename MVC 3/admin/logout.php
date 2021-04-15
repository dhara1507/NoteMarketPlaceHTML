<?php 
session_start();
session_destroy();

?>
<?php
header("Location:dashboard.php");

?>