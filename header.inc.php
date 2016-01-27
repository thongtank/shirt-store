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

<<<<<<< HEAD
    <head>
        <meta charset="UTF-8">
        <title>EZ Teesh</title>
        <link rel="icon" href="img/logo.jpg" type="image/x-icon"/>
        <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-material-design.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ezteech.css" rel="stylesheet" type="text/css" />
        <link href="css/ap-scroll-top.css" rel="stylesheet" type="text/css"/>

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/ap-scroll-top.js" type="text/javascript"></script>
        <script type="text/javascript">
            // Setup plugin with default settings
            $(document).ready(function () {

                $.apScrollTop({
                    'onInit': function (evt) {
                        console.log('apScrollTop: init');
                    }
                });

                // Add event listeners
                $.apScrollTop().on('apstInit', function (evt) {
                    console.log('apScrollTop: init');
                });

                $.apScrollTop().on('apstToggle', function (evt, details) {
                    console.log('apScrollTop: toggle / is visible: ' + details.visible);
                });

                $.apScrollTop().on('apstCssClassesUpdated', function (evt) {
                    console.log('apScrollTop: cssClassesUpdated');
                });

                $.apScrollTop().on('apstPositionUpdated', function (evt) {
                    console.log('apScrollTop: positionUpdated');
                });

                $.apScrollTop().on('apstEnabled', function (evt) {
                    console.log('apScrollTop: enabled');
                });

                $.apScrollTop().on('apstDisabled', function (evt) {
                    console.log('apScrollTop: disabled');
                });

                $.apScrollTop().on('apstBeforeScrollTo', function (evt, details) {
                    console.log('apScrollTop: beforeScrollTo / position: ' + details.position + ', speed: ' + details.speed);
                });

                $.apScrollTop().on('apstScrolledTo', function (evt, details) {
                    console.log('apScrollTop: scrolledTo / position: ' + details.position);
                });

                $.apScrollTop().on('apstDestroy', function (evt, details) {
                    console.log('apScrollTop: destroy');
                });

            });

        </script>
    </head>

    <body>
        <?php
        include './nav.php';
        ?>
=======
<head>
    <meta charset="UTF-8">
    <title>EZ Teesh V1</title>
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
>>>>>>> origin/for_merge
