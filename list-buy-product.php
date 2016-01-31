<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
use classes as cls;
$order = new cls\order;
$order->member_id = $_SESSION['member_id'];
$data_order = $order->get_order_by_member_id();
?>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title">รายการสั่งซื้อสินค้า</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>ราคารวม</th>
                        <th>วันที่ทำรายการ</th>
                        <th>ประเภทการสั่งซื้อ</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$i = 1;
foreach ($data_order as $k => $v) {
    // แสดงประเภทการสั่งซื้อ
    if ($v['typeofpay'] == 'cash') {
        $typeofpay = 'เงินสด';
    } else {
        $typeofpay = 'เครดิต';
    }
    ?>
                        <tr>
                            <td scope='row'>
                                <?=$i;?>
                            </td>
                            <td><a href="list-buy-product-detail.php?order_id=<?=$v['order_id'];?>&d=<?=base64_encode($v['date_added']);?>" title=""><?=$v['order_id'];?></a></td>
                            <td><?=number_format($v['total']);?></td>
                            <td><?=$v['date_added'];?></td>
                            <td><?=$typeofpay;?></td>
                            <td><?=($v['typeofpay'] == 'cash') ? $v['cash_status'] : '-';?></td>
                        </tr>
                        <?php
$i++;
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
require_once './footer.inc.php';
?>
