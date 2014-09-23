<?php 
ob_start();
    session_start();
if(isset($_SESSION['Username']))
{
         session_destroy();
}
header("Location: index.php");
?>