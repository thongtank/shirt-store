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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>ราคารวม</th>
                        <th>วันที่ทำรายการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$i = 1;
foreach ($data_order as $k => $v) {
    ?>
                        <tr>
                            <td scope='row'>
                                <?=$i;?>
                            </td>
                            <td><a href="list-buy-product-detail.php?order_id=<?=$v['order_id'];?>&d=<?=base64_encode($v['date_added']);?>" title=""><?=$v['order_id'];?></a></td>
                            <td><?=number_format($v['total']);?></td>
                            <td><?=$v['date_added'];?></td>
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
