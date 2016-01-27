<?php
require_once 'header.inc.php';
echo "<meta http-equiv='refresh' content='3;url=index.php'>";
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
?>
    <style>
    div.content {
        text-align: center;
        vertical-align: middle;
    }

    img {
        margin: 0 auto;
        /** [top,bottom] [left,right] */
    }

    form {
        width: 50%;
        margin: 0px auto;
    }

    .fa-6 {
        font-size: 20em;
    }
    </style>
    <div class="content">
        <i class="fa fa-thumbs-up fa-6"></i>
        <h1>เพิ่มข้อมูลรายการสินค้าเสร็จสมบูรณ์</h1>
        <a href="list-product.php">กลับหน้ารายการสินค้า</a>
        <br>หรือรอสักครู่เพื่อกลับหน้าหลัก
    </div>
    <?php
require_once './footer.inc.php';
?>
