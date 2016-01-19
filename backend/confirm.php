<?php
session_start();
require_once 'config/autoload.inc.php';
use classes as cls;

$member = new cls\member;

$data = array();
$data = json_decode($_POST['data'], 1);

$new_data = array();
foreach ($data as $key => $value) {
    $new_data[$value['name']] = $value['value'];
}
$member->member_id = $_SESSION['member_id'];
if ($member->transfer_credit($new_data)) {
    print 1;
} else {
    print 0;
}
// print_r($new_data);
/*
Array
(
[packet] => Credit Packet 500
[bank_to] => 2
[total] => 12222
[hidden-credit] => 500
[bank_transfer] => SCB
[date_transfer] => 2016-12-31
[time_transfer] => 00:59
)
 */
