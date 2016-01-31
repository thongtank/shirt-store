<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id']) || !isset($_GET['cash_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}

use classes as cls;
$order = new cls\order;
$order->member_id = $_SESSION['member_id'];
$order->cash_id = $_GET['cash_id'];

$data = array();
$data = $order->get_cash_detail();
/*
[cash_id] => 00000000003
[request_cash] => 250.07
[status] => pending
[date_added] => 2016-01-31 16:10:59
[date_expired] => 1970-01-02 07:00:00
[manager_id] => 0
[date_update_status] => 2016-01-31 16:10:59
[order_id] => 00000000005
[member_id] => 00000000005
 */
// $expire = 60 * 60 * 24; // มีค่าเท่ากับ 1 วัน
// print 'current time : ' . time() . '<BR>';
// print $data['date_expired'] . ' = expire date : ' . strtotime($data['date_expired']);
// exit;

if ($data['status'] == 'pending') {
    $current = time();
    $expire_date = strtotime($data['date_expired']);
    if ($current > $expire_date) {
        $order->order_id = $data['order_id'];
        $order->update_status_to_expired();
        ?>
        <div class="clearfix"></div>
        <div class="content">
            <div class="col-md-12">
                <h1 class="text-center text-danger" style="font-size: 3em;">รายการชำระค่าสินค้าเกินเวลาที่กำหนด<BR>กรุณาทำรายการใหม่</h1>
            </div>
            <div class="col-md-12 text-center">
                <a href="./list-product.php.php">กลับหน้ารายการสินค้า</a>
            </div>
        </div>
        <?php
} else {
        ?>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title"><i class="fa fa-money"></i> แจ้งการชำระเงิน</h2>
        <h1 class="text-danger text-center">*** เพื่อสิทธิ์ของท่านกรุณาชำระเงินให้ตรงกับเศษสตางค์ ***</h1>
        <h1 class="text-danger text-center">ยอดเงินที่ต้องชำระ <b style="font-size: 5em;"><u><?=$data['request_cash'];?></u></b> บาท</h1>
        <form action="#" method="POST" class="form-horizontal">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ID การชำระเงิน *</label>
                    <div class="col-md-9">
                        <input type="text" readonly value="<?php echo sprintf('%011d', $_GET['cash_id']); ?>" class="form-control" id="cash_id" name="cash_id" placeholder="กรอก เลข Invoice" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ID รายการสั่งซื้อ</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="order_id" name="order_id" value="<?=$data['order_id'];?>" readonly required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ธนาคารที่โอน *</label>
                    <div class="col-md-9">
                        <input type="radio" id="bank_to" name="bank_to" value="กสิกรไทย" required>
                        <span class="greenColor">ธ.กสิกรไทย สาขาถนนชยางกูร เลขบัญชี : 2602605585 ชื่อบัญชี : ร้านบิสเน็ตโดยนายอดุลย์เดช วงศ์งาม</span>
                        <br/>
                        <input type="radio" id="bank_to" name="bank_to" value="กรุงเทพ" required>
                        <span class="greenColor">ธ.กรุงเทพ เลขบัญชี : 6730186621 ชื่อบัญชี : นายอดุลย์เดช วงศ์งาม</span>
                        <br/>
                        <input type="radio" id="bank_to" name="bank_to" value="ไทยพานิชย์" required>
                        <span class="greenColor">ธนาคารไทยพานิชย์</span>
                        <br/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ยอดโอน *</label>
                    <div class="col-md-9">
                        <input type="text" placeholder="ยอดเงินที่ต้องการ <?=$data['request_cash'];?> บาท" pattern="[0-9.]+" class="form-control" id="request_cash" name="request_cash" value="" required>
                        <input type="hidden" name="hidden-request_cash" id="hidden-request_cash" value="<?=$data['request_cash'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-raised btn-primary pull-right" id="" name="" value="แจ้งโอนเงิน"><i class="fa fa-save"></i> แจ้งโอนเงิน</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/cash_confirm.js" type="text/javascript" charset="utf-8"></script>
    <?php
}
} else {
    ?>
        <div class="clearfix"></div>
        <div class="content">
            <div class="col-md-12">
                <h1 class="text-center" style="font-size: 3em;">รายการนี้ถูกดำเนินการไปแล้ว</h1>
            </div>
            <div class="col-md-12 text-center">
                <a href="./list-buy-product.php">กลับหน้ารายการสั่งซื้อสินค้า</a>
            </div>
        </div>
        <?php
}
require_once './footer.inc.php';
?>
