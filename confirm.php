<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";

    exit;
}
$invoice_id = $_GET['invoice_id'];
$data = $member->get_credit_by_invoice_id($invoice_id);
// print "<pre>" . print_r($data, 1) . "</pre>";
// exit;
/*
Array
(
[invoice_id] => 00006
[packet] => Credit Packet 500
[credit] => 500
[free] => 0
[bank_to] =>
[bank_transfer] =>
[date_transfer] => 0000-00-00
[time_transfer] => 00:00:00
[date_added] => 2016-01-18 14:42:14
[date_expired] => 2016-01-19 14:42:14
[status] => pending
[member_id] => 5
[manager_id] =>
[date_confirm] => 0000-00-00 00:00:00
)
 */
?>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title"><i class="fa fa-money"></i> แจ้งการชำระเงิน</h2>
        <h2 class="greenColor">วิธีการแจ้งชำระเงิน</h2> 1. ค้นหาเลข Invoice ของท่าน โดยป้อนที่ช่อง Invoice หาก เลข Invoice ถูกต้อง ระบบจะแสดงข้อมูลเลขที่ใบ Invoice ให้อัตโนมัติ
        <br/> 2. ป้อนยอดเงิน เลือกธนาคารที่โอน ธนาคารต้นทาง สาขา(ถ้ามี)
        <br/> หากไม่สามารถแจ้งได้สามารถติดต่อได้ที่ xxxxxx@xxxxxxxx.com
        <form action="#" method="POST" class="form-horizontal form-register">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label col-md-3">เลข Invoice *</label>
                    <div class="col-md-9">
                        <input type="text" readonly value="<?php echo sprintf('%05d', $_GET['invoice_id']); ?>" class="form-control" id="invoice_id" name="invoice_id" placeholder="กรอก เลข Invoice" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ชื่อแพ็คเก็ต</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="packet" name="packet" value="<?=$data['packet'];?>" readonly required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ธนาคารที่โอน *</label>
                    <div class="col-md-9">
                        <input type="radio" id="bank_to" name="bank_to" value="1" required> ธนาคาร 1
                        <br/>
                        <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span>
                        <br/>
                        <input type="radio" id="bank_to" name="bank_to" value="2" required> ธนาคาร 2
                        <br/>
                        <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span>
                        <br/>
                        <input type="radio" id="bank_to" name="bank_to" value="3" required> ธนาคาร 3
                        <br/>
                        <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span>
                        <br/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ยอดโอน *</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="total" name="total" value="" required>
                        <input type="hidden" name="hidden-credit" id="hidden-credit" value="<?=$data['credit'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">ธนาคารต้นทาง *</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="bank_transfer" name="bank_transfer" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">วันที่ทำการโอน *</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="date_transfer" name="date_transfer" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">เวลาทำการโอน *</label>
                    <div class="col-md-9">
                        <input type="time" class="form-control" id="time_transfer" name="time_transfer" required>
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
    <script src="js/confirm.js" type="text/javascript" charset="utf-8"></script>
    <?php
require_once './footer.inc.php';
?>
