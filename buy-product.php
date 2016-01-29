<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id']) || !isset($_GET['product_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}
require_once 'backend/config/autoload.inc.php';

use classes as cls;

$product = new cls\product;
$product->product_id = $_GET['product_id'];
$product->member_id = $_SESSION['member_id'];

$data = $product->get_product_by_product_id('confirmed');
if ($data === false) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}

if (count($data) == 0) {
    echo "<meta http-equiv='refresh' content='0;url=list-product.php'>";
    exit;
}
?>
    <div class="content">
        <br />
        <div class="col-md-6">
            <img src="uploads/member_<?=$_SESSION['member_id'] . DS . $data['product_mockup'];?>" class="img-rounded" style="width: 100%;" alt="" />
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6">
            <p class="font2em greenColor"><strong><?=$data['product_name'];?></strong></p>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รหัสลายเสื้อ :</strong></label>
                <div class="col-md-9">
                    <?=$data['product_id'];?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight font1_5em"><strong>ราคาซื้อ :</strong></label>
                <div class="col-md-9 greenColor font1_5em">
                    <?php
if ($data['confirm_status'] == 'confirm') {
    ?>
                        <strong><?=number_format($data['confirm_price']);?> Credit</strong>
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

$order = new cls\order;
$order->product_id = $_GET['product_id'];
$count_order = $order->count_order_by_product_id();
?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รายละเอียดเสื้อ :</strong></label>
                <div class="col-md-9">
                    <?=$data['product_detail'];?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>สั่งแล้ว :</strong></label>
                <div class="col-md-9 greenColor"><?= $count_order['sum_amount']; ?> ตัว</div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <BR>
    <div class="col-md-12 text-center" id="hidden_outofcredit">
        <h2 class="text-danger">จำนวนเครดิตของท่านไม่เพียงพอ ท่านสามารถเติมเครดิตได้<a href="frm-add-credit.php">ที่นี่</a></h2>
        <h3></h3>
    </div>
    <div class="clearfix"></div>
    <br />
    <!--form สั่งซื้อ-->
    <form action="#" method="POST" class="form-horizontal">
        <input type="hidden" name="hidden_rows" id="hidden_rows">
        <input type="hidden" name="hidden_product_id" id="hidden_product_id" value="<?=$_GET['product_id'];?>">
        <div class="row content">
            <div class="col-md-1">
                <strong>จำนวน</strong>
                <input class="form-control" id="txt_amount1" name="txt_amount1" min="1" value="1" type="number" required="">
            </div>
            <div class="col-md-2">
                <strong>ขนาดเสื้อ</strong>
                <select id="slc_size1" name="slc_size1" class="form-control" required="">
                    <option value="">-เลือกขนาดเสื้อ-</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
            <div class="col-md-4">
                <strong>รายละเอียดลาย</strong>
                <textarea id="txt_detail1" name="txt_detail1" class="form-control" required=""></textarea>
            </div>
            <div class="col-md-5">
                <strong>ที่อยู่จัดส่ง</strong>
                <textarea id="txt_address1" name="txt_address1" class="form-control" required=""></textarea>
            </div>
        </div>
        <div class="row content" id="buy-plus">
            <p></p>
        </div>
        <div class="row content">
            <div class="col-md-12 ">
                <button onclick="return confirm('ยืนยันข้อมูลรายการซื้อหรือไม่ ?');" type="submit" class="btn btn-raised btn-primary pull-right"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                <button type="button" class="btn btn-raised btn-primary pull-right" id="btt_plus"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </form>
    <script src="js/order.js"></script>
    <?php
require_once './footer.inc.php';
?>
