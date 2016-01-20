<?php
session_start();
if (!isset($_POST) || !isset($_SESSION['member_id']) || !isset($_FILES)) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
require_once 'config/autoload.inc.php';
use classes as cls;

$product = new cls\product;

$product->member_id = $_SESSION['member_id'];

/* Mockup */
$success = 1;
$mockup = $product->upload_mockup($_FILES['fileMockUp']);
if ($mockup === true) {
    // Insert data into database
    if ($product->set_product($_POST, $product->file_name)) {
        $product_file_number = 1; // หมายเลขฟิลด์ในฐานข้อมูล 1-6
        for ($i = 1; $i <= 6; $i++) {
            // ตรวจสอบว่าช่อง upload file ตัวไหนที่ไม่มีรูปภาพก็ให้ข้ามไปช่องต่อไป
            if (!empty($_FILES['file' . $i]['name'])) {
                $files = $product->upload_files($_FILES['file' . $i], $i);
                if ($files !== true) {
                    echo 'File : ' . $i . ' error === ' . $files;
                    $success = 0;
                } else {
                    if ($product->update_file_product($product_file_number)) {
                        $product_file_number++;
                    } else {
                        echo 'Update product name : ' . $this->file_name . ' incorrect <BR>';
                        $success = 0;
                    }
                }
            }
        }
    } else {
        echo 'insert failed';
        $success = 0;
    }
} else {
    echo $mockup;
    $success = 0;
}
/* Mockup */

if ($success) {
    echo "<meta http-equiv='refresh' content='0;url=../create_product-success.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0;url=../create_product-failed.php'>";
}
exit;