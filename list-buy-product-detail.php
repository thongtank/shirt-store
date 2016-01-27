<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
use classes as cls;
$order = new cls\order;
$member = new cls\member;
$product = new cls\product;

$data_detail = $order->get_order_detail_by_order_id($_GET['order_id']);

?>
    <div class="clearfix"></div>
    <div class="content">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>รูปภาพ</th>
                        <th>ชื่อลาย</th>
                        <th>ราคาเคดิต</th>
                        <th>จำนวนซื้อ</th>
                        <th>รวม (บาท)</th>
                        <th>วันที่ทำรายการ</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$i = 1;
$product->member_id = $_SESSION['member_id'];
$data_product = array();
// echo UPLOAD;
foreach ($data_detail as $key => $value) {
    $product->product_id = $value['product_id'];
    $data_product = $product->get_product_by_product_id('confirmed');

    ?>
                        <tr>
                            <td scope=row>
                                <?=$i;?>
                            </td>
                            <td><img class="img-rounded" src="<?=UPLOAD;?>/member_<?=$_SESSION['member_id'];?>/<?=$data_product['product_mockup'];?>" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt="" /></td>
                            <td><?=$data_product['product_name'];?></td>
                            <td style="text-align: center;"><?=number_format($data_product['confirm_price']);?></td>
                            <td class="greenColor"><?=$value['amount'];?></td>
                            <td class="greenColor"><?=number_format($data_product['confirm_price'] * $value['amount']);?> </td>
                            <td class="greenColor"><?=base64_decode($_GET['d']);?></td>
                            <td>
                                <label class="label center-block label-danger"><?=$value['status'];?></label>
                            </td>
                        </tr>
                        <?php
$i++;
    $data_product = array();
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
require_once './footer.inc.php';
?>
