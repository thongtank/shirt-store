<?php

require_once 'header.inc.php';
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
<?php
require_once './footer.inc.php';
?>