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
        <img src="uploads/member_<?= $_SESSION['member_id'] . DS . $data['product_mockup']; ?>" class="img-rounded" style="width: 100%;" alt="" />
        <div class="clearfix"></div>
    </div>
    <div class="col-md-6">
        <p class="font2em greenColor"><strong><?= $data['product_name']; ?></strong></p>
        <div class="form-group">
            <label for="" class="control-label col-md-3 textRight"><strong>รหัสลายเสื้อ :</strong></label>
            <div class="col-md-9"><?= $data['product_id']; ?></div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-md-3 textRight font1_5em"><strong>ราคาซื้อ :</strong></label>
            <div class="col-md-9 greenColor font1_5em">
                <?php
                if ($data['confirm_status'] == 'confirm') {
                    ?>
                    <strong>250 Credit</strong>
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
    </div>
</div>
<div class="clearfix"></div>
<br />
<!--form สั่งซื้อ-->
<form action="#" method="POST" class="form-horizontal">
    <div class="row content">
        <div class="col-md-1">
            <strong>จำนวน</strong>
            <input class="form-control" id="txt_amount1" name="txt_amount1" min="1" value="1" type="number" required="">
        </div>
        <div class="col-md-2">
            <strong>ขนาดเสื้อ</strong>
            <select id="slc_size1" name="slc_size1" class="form-control" required="">
                <option value="">-เลือกขนาดเสื้อ-</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
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
            <button  type="submit" class="btn btn-raised btn-primary pull-right"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
            <button type="button" class="btn btn-raised btn-primary pull-right" id="btt_plus"><i class="fa fa-plus"></i></button>

        </div>
    </div>
</form>
<script>
    $(function () {
        var scntDiv = $('#buy-plus');
        var i = $('#buy-plus p').size() + 1;
        var divid = '';
        $('#btt_plus').click(function () {
            divid = 'div' + i;
            $('<div class="div' + i + '"><hr /><div class="col-md-1">' +
                    '<strong>จำนวน</strong>' +
                    '<input id="txt_amount' + i + '" name="txt_amount' + i + '"  class="form-control" min="1" value="1" type="number" required="">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<strong>ขนาดเสื้อ</strong>' +
                    '<select id="slc_size' + i + '" name="slc_size' + i + '" class="form-control" required="">' +
                    '<option value="">-เลือกขนาดเสื้อ-</option>' +
                    '<option value="S">S</option>' +
                    '<option value="M">M</option>' +
                    '<option value="L">L</option>' +
                    '<option value="XL">XL</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<strong>รายละเอียดลาย</strong>' +
                    '<textarea id="txt_detail' + i + '" name="txt_detail' + i + '"  class="form-control" required=""></textarea>' +
                    '</div>' +
                    '<div class="col-md-4">' +
                    '<strong>ที่อยู่จัดส่ง</strong>' +
                    '<textarea  id="txt_address' + i + '" name="txt_address' + i + '"  class="form-control" required=""></textarea>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                    '<br />' +
                    '<button type="button" class="btn btn-raised btn-danger pull-right" onclick="removeP(\'' + divid + '\')"><i class="fa fa-close"></i></button>' +
                    '</div><div class="clearfix"></div>').appendTo(scntDiv);
//            $('<div class="div' + i + '"><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i + '" value="" placeholder="Input Value" /></label> <button type="button" onclick="removeP(\'' + divid + '\')">Remove</button></div>').appendTo(scntDiv);
            i++;
            return false;
        });

//        $('#remScnt').click(function () {
//            alert('aaaaa');
//            if (i > 2) {
//                $(this).parents('p').remove();
//                i--;
//            }
//            return false;
//        });
    });

    function removeP(divid) {
        $("." + divid).remove();
    }
</script>
<?php
require_once './footer.inc.php';
?>
