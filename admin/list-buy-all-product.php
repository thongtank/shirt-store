<?php
require_once 'header.inc.php';
include_once '../backend/config/autoload.inc.php';
if (!isset($_SESSION['u_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}

use classes as cls;

$order = new cls\order;
$data_order = $order->get_order_all();
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
                    <th>สถานะการจ่ายเงิน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data_order as $k => $v) {
                    ?>
                    <tr>
                        <td scope='row'>
    <?= $i; ?>
                        </td>
                        <td><a href="list-buy-product-detail.php?order_id=<?= $v['order_id']; ?>&d=<?= base64_encode($v['date_added']); ?>" title=""><?= $v['order_id']; ?></a></td>
                        <td><?= number_format($v['total']); ?></td>
                        <td><?= $v['date_added']; ?></td>
                        <td><p class="label label-success">จ่ายเป็นเครดิต</p><p class="label label-success">โอนเงินแล้ว</p><p class="label label-danger">ยังไม่โอนเงิน</p></td>
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
