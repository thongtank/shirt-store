<?php
session_start();
include_once '../backend/config/autoload.inc.php';
use classes as cls;
if (isset($_POST)) {
    $member = new cls\member;
    $member->member_id = $_POST['member_id'];
    if ($member->update_confirm_credit($_POST)) {
        print 1;
    } else {
        print 0;
    }
}

?>