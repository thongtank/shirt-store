<?php
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;

$member = new cls\member;

if ($member->login($_POST)) {
    print 1;
} else {
    print 0;
}
?>