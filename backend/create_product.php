<?php
session_start();
if (!isset($_POST) || !isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
require_once 'config/autoload.inc.php';
use classes as cls;

$product = new cls\product;

$product->member_id = $_SESSION['member_id'];

/* Mockup */
$mockup = $product->upload_mockup($_FILES['fileMockUp']);
if ($mockup === true) {
    // if ($product->set_product($_POST)) {
    echo 'done';
    // }
} else {
    echo $mockup;
}
/* Mockup */

/*
Array
(
[product_name] => a
[p_cotton] => th
[p_type] => normal_male
[p_color] => gray
[p_detail] => sdfasdfasdfasf
)
Array
(
[fileMockUp] => Array
(
[name] => 1511396_660035520735190_2186428283746288367_n.jpg
[type] => image/jpeg
[tmp_name] => /Applications/MAMP/tmp/php/php7vhaeH
[error] => 0
[size] => 53707
)

[file1] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

[file3] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

[file5] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

[file2] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

[file4] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

[file6] => Array
(
[name] =>
[type] =>
[tmp_name] =>
[error] => 4
[size] => 0
)

)
 */
