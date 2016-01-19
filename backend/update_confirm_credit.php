<?php
session_start();
include_once '../backend/config/autoload.inc.php';

use classes as cls;

$member = new cls\member;

if ($member->update_confirm_credit($_POST)) {
        print 1;
    } else {
        print 0;
    }
?>