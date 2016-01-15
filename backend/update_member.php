<?php
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;

$member = new cls\member;

if ($_POST['status'] == "insert") {
    // สมัครแบบปกติ
    print_r($_POST);
    if ($member->new_register($_POST)) {
        print 1;
    } else {
        print 0;
    }
} else {
    // สมัครผ่าน facebook account
    if ($member->update_member($_POST)) {
        print 1;
    } else {
        print 0;
    }
}

?>