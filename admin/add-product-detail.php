<?php
require_once 'header.inc.php';
if (!isset($_SESSION['u_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
require_once '../backend/config/autoload.inc.php';

use classes as cls;

$product = new cls\product;
$product->product_id = $_GET['product_id'];

$data = $product->get_product_wait_confirm_by_product_id();
if ($data === false) {
    echo "<meta http-equiv='refresh' content='0;url=list-confirm-product.php'>";
    exit;
}
?>
<div class="content">
    <br />
    <div class="col-md-6">
        <img src="../uploads/member_<?= $data['member_id'] . '/' . $data['product_mockup']; ?>" class="img-rounded" style="width: 100%;" alt="" />
        <div class="clearfix"></div>
        <br />

        <div class="col-md-3">
            <?php if ($data['product_file1'] != '') { ?>
                <img src="../uploads/member_<?= $data['member_id'] . '/' . $data['product_file1']; ?>" class="img-rounded" style="width: 100%;" alt="" />
            <?php }
            ?>
        </div>

        <div class="col-md-3">
            <?php if ($data['product_file2'] != '') { ?>
                <img src="../uploads/member_<?= $data['member_id'] . '/' . $data['product_file2']; ?>" class="img-rounded" style="width: 100%;" alt="" />
            <?php }
            ?>
        </div>
        <div class="col-md-3">
            <?php if ($data['product_file3'] != '') { ?>
                <img src="../uploads/member_<?= $data['member_id'] . '/' . $data['product_file3']; ?>" class="img-rounded" style="width: 100%;" alt="" />
            <?php }
            ?>
        </div>
        <div class="col-md-3">
            <?php if ($data['product_file4'] != '') { ?>
                <img src="../uploads/member_<?= $data['member_id'] . '/' . $data['product_file4']; ?>" class="img-rounded" style="width: 100%;" alt="" />
            <?php }
            ?>
        </div>
    </div>
    <div class="col-md-6">
        <p class="font2em greenColor"><strong><?= $data['product_name']; ?></strong></p>
        <div class="form-group">
            <label for="" class="control-label col-md-3 textRight"><strong>รหัสลายเสื้อ :</strong></label>
            <div class="col-md-9"><?= $data['product_id']; ?></div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-3 textRight font1_5em"><strong>ราคาทุน :</strong></label>
            <div class="col-md-9 greenColor font1_5em">
                <?php
                if ($data['confirm_status'] == 'confirm') {
                    ?>
                    <strong><?= $data['confirm_price']; ?> เครดิต</strong>
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
            <div class="col-md-9"><?= $data['product_detail']; ?></div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-3 textRight"><strong>สั่งแล้ว :</strong></label>
            <div class="col-md-9 greenColor">... ครั้ง</div>
        </div>
        <form class="form-horizontal form-register" method="POST" id="frm_confirm_price">

            <div class="form-group">
                <label for="" class="control-label col-md-3">กำหนดราคา *</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" min="200" max="1000" id="product_price" name="product_price" required>
                    <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?= $data['product_id']; ?>">
                </div>
            </div>
            <button class="btn btn-raised btn-primary" type="submit" id="btt_confirm_price"><i class="fa fa-check"></i> ยืนยันราคา</button>
        </form>
    </div>
</div>
<script src="../js/confirm-price.js" type="text/javascript"></script>
<?php
require_once './footer.inc.php';
?>
