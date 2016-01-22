<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id']) || !isset($_GET['product_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}
// require_once 'backend/config/autoload.inc.php';
use classes as cls;

$product = new cls\product;
$product->product_id = $_GET['product_id'];
$product->member_id = $_SESSION['member_id'];

$data = $product->get_product_by_product_id();
if ($data === false) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}
// print "<pre>" . print_r($data, 1) . "</pre>";
// exit;
// Array
// (
//     [product_id] => 00000000001
//     [product_name] => [A]
//     [product_cotton] => th
//     [product_type] => normal_male
//     [product_colour] => red
//     [product_detail] => Detail for TESTING
//     [product_mockup] => 5_1453294604_mockup.jpg
//     [product_file1] => 5_1453294604_detail_1.jpg
//     [product_file2] => 5_1453294604_detail_2.jpg
//     [product_file3] => 5_1453294604_detail_3.jpg
//     [product_file4] => 5_1453294604_detail_4.jpg
//     [product_file5] => 5_1453294604_detail_5.jpg
//     [product_file6] => 5_1453294604_detail_6.jpeg
//     [date_added] => 2016-01-20 19:56:44
//     [member_id] => 5
//     [confirm_status] => pending
//     [confirm_date] => 0000-00-00 00:00:00
//     [confirm_price] => 0
//     [confirm_notification] => n
//     [manager_id] => 0
// )
?>
    <div class="content">
        <br />
        <div class="col-md-6">
            <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_mockup'];?>" class="img-rounded" style="width: 100%;" alt="" />
            <div class="clearfix"></div>
            <br />

            <div class="col-md-3">
                <?php if ($data['product_file1'] != '') {?>
                    <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_file1'];?>" class="img-rounded" style="width: 100%;" alt="" />
                <?php }
?>
            </div>

            <div class="col-md-3">
                <?php if ($data['product_file2'] != '') {?>
                <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_file2'];?>" class="img-rounded" style="width: 100%;" alt="" />
                <?php }
?>
            </div>
            <div class="col-md-3">
            <?php if ($data['product_file3'] != '') {?>
                <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_file3'];?>" class="img-rounded" style="width: 100%;" alt="" />
                <?php }
?>
            </div>
            <div class="col-md-3">
            <?php if ($data['product_file4'] != '') {?>
                <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_file4'];?>" class="img-rounded" style="width: 100%;" alt="" />
                <?php }
?>
            </div>
        </div>
        <div class="col-md-6">
            <p class="font2em greenColor"><strong><?=$data['product_name'];?></strong></p>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รหัสลายเสื้อ :</strong></label>
                <div class="col-md-9"><?=$data['product_id'];?></div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight font1_5em"><strong>ราคาทุน :</strong></label>
                <div class="col-md-9 greenColor font1_5em">
                    <?php
if ($data['confirm_status'] == 'confirm') {
    ?>
                    <strong><?=$data['confirm_price'];?> Credit</strong>
                    <?php
} else {
    echo "<strong><font color=red>รอการยืนยัน</font></strong>";
}
?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>เนื้อผ้า :</strong></label>
                <div class="col-md-9">
                    <?php echo ($data['product_cotton'] == 'th') ? 'Cotton ไทย' : 'Cotton ส่งออก'; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>ทรงเสื้อ :</strong></label>
                <div class="col-md-9">
                    <?php
switch ($data['product_type']) {
case 'normal_male':
    echo 'เสื้อชายตรง ผู้ชาย';
    break;
case 'normal_female':
    echo 'เสื้อชายตรง ผู้หญิง';
    break;
case 'slim_male':
    echo 'เข้ารูป ผู้ชาย';
    break;
default:
    echo 'เข้ารูป ผู้ชาย';
    break;
}
?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รายละเอียดเสื้อ :</strong></label>
                <div class="col-md-9"><?=$data['product_detail'];?></div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>สั่งแล้ว :</strong></label>
                <div class="col-md-9 greenColor">... ครั้ง</div>
            </div>
            <a onclick="return confirm('คุณต้องการลบสินค้ารายการนี้หรือไม่ ?');" class="btn btn-raised btn-danger" href="delete-product.php?product_id=<?=base64_encode($data['product_id']);?>"><i class="fa fa-trash"></i> ลบข้อมูล</a>
            <a class="btn btn-raised btn-primary" href="#"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</a>
        </div>
    </div>
    <?php
require_once './footer.inc.php';
?>
