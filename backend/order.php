<?php
session_start();
if (!isset($_SESSION['member_id']) || !isset($_POST['data'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
require_once 'config/autoload.inc.php';

use classes as cls;

$order = new cls\order;
$member = new cls\member;
$product = new cls\product;

$data = json_decode($_POST['data'], 1);

$rows = $data[0]['value'];

$new_data = array();
foreach ($data as $key => $value) {
    $new_data[$value['name']] = $value['value'];
}

/*
Array
(
[txt_amount1] => 1
[hidden_rows] => 2
[slc_size1] => s
[txt_detail1] => aaa
[txt_address1] => bbb
[txt_amount2] => 1
[slc_size2] => m
[txt_detail2] => ccc
[txt_address2] => ddd
)
 */

$order->member_id = $_SESSION['member_id'];
$order->product_id = $data[1]['value'];

$product->member_id = $_SESSION['member_id'];
$product->product_id = $data[1]['value'];

$total = 0;
$confirm_price = $product->get_product_by_product_id('confirmed')['confirm_price'];
for ($i = 1; $i <= $rows; $i++) {
    /* คำนวณราคาต่อรายการ */
    $price = $confirm_price * $new_data['txt_amount' . $i];
    $total += $price; // ราคา total ในตาราง orders
}

// ถ้า credit ไม่พอ จบการทำงาน
if ($total > $_SESSION['credit_balance']) {
    print 'out of credit';
    exit;
}
if ($order->set_order()) {
    for ($i = 1; $i <= $rows; $i++) {
        $order->amount = $new_data['txt_amount' . $i];
        $order->size = $new_data['slc_size' . $i];
        $order->detail = $new_data['txt_detail' . $i];
        $order->address = $new_data['txt_address' . $i];

        /* คำนวณราคาต่อรายการ */
        $price = $confirm_price * $order->amount;
        $order->price = $price;

        if (!$order->set_order_detail()) {
            print 'insert order detail error for number ' . $i . '<BR>';
        }
    }
} else {
    print 'error product number is ' . $i . '<BR>';
}

if ($order->update_order_total_price($total)) {
    $member->member_id = $_SESSION['member_id'];
    if ($member->cal_balance()) {
        $_SESSION['credit_balance'] = $member->balance;
        print 'done';
    } else {
        print 'Cal balance failed';
    }
} else {
    print 'update order total price error for number ' . $i . '<BR>';
}
exit;
