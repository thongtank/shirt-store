<?php
session_start();
require_once 'config/autoload.inc.php';
use classes as cls;

$order = new cls\order;

$data = array();
$data = json_decode($_POST['data'], 1);

$new_data = array();
foreach ($data as $key => $value) {
    $new_data[$value['name']] = $value['value'];
}
/*
[cash_id] => 00000000003
[order_id] => 00000000005
[bank_to] => กสิกรไทย
[request_cash] => 250.07
[hidden-request_cash] => 250.07
[transfer-detail] => messages
 */
$order->member_id = $_SESSION['member_id'];
$order->cash_id = $new_data['cash_id'];
$order->order_id = $new_data['order_id'];

if ($order->update_cash_status($new_data['request_cash'], $new_data['bank_to'], $new_data['transfer-detail'])) {
    print 1;
} else {
    print 0;
}
?>