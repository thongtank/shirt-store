<?php
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;

$member = new cls\member;
//echo print_r($_POST);
if ($member->admin_login($_POST)) {
    print 1;
} else {
    print 0;
}
?>