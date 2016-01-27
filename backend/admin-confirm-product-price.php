<?php
session_start();
include_once 'config/autoload.inc.php';

use classes as cls;

$product = new cls\product();
//echo print_r($_POST);
$product->manager_id = $_SESSION['u_id'];

if ($product->set_product_price_by_product_id($_POST)) {
    print '1';
} else {
    print '0';
}

?>