<?php
include_once 'config/autoload.inc.php';

use classes as cls;
use config as cfg;

$json = $_POST['obj'];
$data = json_decode($json, true);

$db = new cfg\database;
$register = new cls\register;

if ($register->set($data)) {
    print 'done';
}
