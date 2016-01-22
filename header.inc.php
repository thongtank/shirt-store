<?php
require_once 'backend/config/autoload.inc.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
// if (!preg_match('/www/', $_SERVER['HTTP_HOST'])) {
//     echo "<meta http-equiv='refresh' content='0;url=http://www.ezteesh.com" . $_SERVER['PHP_SELF'] . "'>";
//     exit;
// }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>EZ Teesh</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-material-design.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ezteech.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
    <?php
include './nav.php';
?>
