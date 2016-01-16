<?php
// สำหรับการสมัครผ่าน facebook account
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;
use config as cfg;

$json = $_POST['obj'];
$data = json_decode($json, true);

$db = new cfg\database;
$member = new cls\member;

if ($member->register($data)) {
    if ($_SESSION['count_facebook_id']) {
        print 'done'; // facebook id ได้ลงทะเบียนกับระบบแล้ว
    } else {
        print 'new'; // เป็นสมาชิกใหม่ให้กรอกข้อมูลเพิ่มเติม
    }

} else {
    print 'failed';
}
