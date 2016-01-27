<?php require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;

}
include_once 'backend/config/autoload.inc.php';
use classes as cls;
$member = new cls\member;
?>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title">เพิ่มเครดิต</h2>
        <div class="table-responsive">
            <form action="#" method="POST" class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">เลือก Credit Packet *</label>
                        <div class="col-md-9">
                            <select name="credit_pack" id="credit_pack" class="form-control" required>
                                <option value="">---เลือก Credit Packet---</option>
                                <option value="500">Credit Packet 500</option>
                                <option value="1000">Credit Packet 1,000 free 50</option>
                                <option value="2000">Credit Packet 2,000 free 100</option>
                                <option value="5000">Credit Packet 5,000 free 300</option>
                                <option value="10000">Credit Packet 10,000 free 700</option>
                                <option value="50000">Credit Packet 50,000 free 4,000</option>
                            </select>
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">โอนเข้าบัญชีธนาคาร *</label>
                        <div class="col-md-9">
                            <select name="credit_bank" id="credit_bank" class="form-control" required>
                                <option value="">---เลือกบัญชีธนาคาร---</option>
                                <option value="KTB">ธนาคารกรุงไทย</option>
                                <option value="KBANK">ธนาคารกสิกรไทย</option>
                                <option value="SCB">ธนาคารไทยพาณิชย์</option>
                            </select>
                        </div>
                    </div>
                    -->
                </div>
                <!--
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">วันที่ทำการโอน *</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="date_added" id="date_added" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">เวลาทำการโอน *</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" name="time_added" id="time_added" required>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-raised btn-primary pull-right" id="" name="" value="แจ้งซื้อเครดิต"><i class="fa fa-save"></i> แจ้งซื้อเครดิต</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title">รายการซื้อเครดิต</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Credit Packet</th>
                        <th>ราคา</th>
                        <th>วันที่ทำรายการ</th>
                        <th>วันที่ยืนยัน</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$data = array();
$member->member_id = $_SESSION['member_id'];
$data = $member->get_list_credit();
$i = 1;
if (count($data) > 0) {
    foreach ($data as $k => $v) {
        /*
        Array
        (
        [0] => Array
        (
        [invoice_id] => 00001
        [packet] => Credit Packet 50,000 free 4,000
        [credit] => 50000
        [free] => 4000
        [bank_to] =>
        [bank_transfer] =>
        [date_transfer] => 0000-00-00
        [time_transfer] => 00:00:00
        [date_added] => 2016-01-17 16:48:15
        [date_expired] => 2016-01-18 16:48:15
        [status] => pending
        [member_id] => 4
        [manager_id] =>
        [date_confirm] => 0000-00-00 00:00:00
        )

        )
         */
        ?>
                        <tr>
                            <td scope=row>
                                <?=$i;?>
                            </td>
                            <td>
                                <?=$v['invoice_id'];?>
                            </td>
                            <td>
                                <a href="add-credit-detail.php?invoice_id=<?php echo $v['invoice_id']; ?>">
                                    <?=$v['packet'];?>
                                </a>
                            </td>
                            <td>
                                <?=number_format($v['credit']);?> บาท</td>
                            <td>
                                <?=$v['date_added'];?>
                            </td>
                            <td>
                                <?php
if ($v['status'] == 'confirm') {
            echo $v['date_confirm'];
        } else {
            echo '-';
        }
        ?>
                            </td>
                            <td>
                                <?php
$status = "";
        $color = "";
        $cancel_link = "";
        if ($v['status'] == 'pending') {
            $status = "รอการยืนยัน";
            $color = "danger";
            $cancel_url = 'cancel-credit.php?invoice_id=' . base64_encode($v['invoice_id']);
            $cancel_link = '<a href=' . $cancel_url . ' onclick="return confirm(\'ยืนยันการลบข้อมูล ?\');"><label class="label label-danger"><i class="fa fa-close"></i> ยกเลิกรายการ</label></a>';
        } elseif ($v['status'] == 'transfered') {
            $status = "แจ้งการโอนเงินแล้ว";
            $color = "info";
        } else {
            $status = "ยืนยันการรับเงินแล้ว";
            $color = "success";
        }

        ?>
                                    <label class="label label-<?=$color;?>">
                                        <?=$status;?>
                                    </label>
                                    <?=$cancel_link;?>
                            </td>
                        </tr>
                        <?php
$i++;

    }
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="js/credit.js"></script>
    <?php require_once 'footer.inc.php';?>
