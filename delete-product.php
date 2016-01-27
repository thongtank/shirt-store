<?php
session_start();
if (!isset($_SESSION['member_id']) || !isset($_GET['product_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}
require_once 'backend/config/autoload.inc.php';

use classes as cls;
$product = new cls\product;

$product->member_id = $_SESSION['member_id'];
$product->product_id = base64_decode($_GET['product_id']);

if ($product->delete_product()) {
    echo "<meta http-equiv='refresh' content='0;url=delete_product-success.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0;url=delete_product-failed.php'>";
}
exit;
