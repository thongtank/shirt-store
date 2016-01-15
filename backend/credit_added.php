<?php
include_once 'config/autoload.inc.php';

use classes as cls;

$member = new cls\member;

if ($member->set_credit($_POST)) {
    print 1;
} else {
    print 0;
}