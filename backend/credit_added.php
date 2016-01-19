<?php
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;

$member = new cls\member;
$member->member_id = $_SESSION['member_id'];

// POST
// - packet
// - credit
// - free
<<<<<<< HEAD
if ($member->set_credit($_POST)) {
    print 1;
=======
$data = $member->set_credit($_POST);
if ($data != 0) {
    print $data;
>>>>>>> master
} else {
    print 0;
}