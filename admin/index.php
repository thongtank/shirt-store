<?php
session_start();
if (!isset($_SESSION['u_id'])) {
    header("Location: login.php"); 
    exit();
} else {
    header("Location: home.php");
}
?>