<?php
require_once 'header.inc.php';
include_once '../backend/config/autoload.inc.php';

use classes as cls;

$member = new cls\member;
?>
<div class="container">
    <h1>รายการการชำระค่าซื้อเครดิต</h1>
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice</th>
                    <th>Credit Packet</th>
                    <th>ราคา</th>
                    <th>วันที่ทำรายการ</th>
                    <th>วันที่แจ้งชำระ</th>
                    <th>วัน เวลา ที่ทำการชำระ</th>
                    <th>ดูรายละเอียด</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                $data = array();
                $data = $member->get_list_credit_no_confirm();
                //print_r($data);
                $i = 1;
                if (isset($data)) {
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
                            <td scope=row><?= $i; ?></td>
                            <td><?= $v['invoice_id']; ?></td>
                            <td><a href="comfimm-credit-detail.php?invoice_id=<?= $v['invoice_id']; ?>"><?= $v['packet']; ?></a></td>
                            <td><?= number_format($v['credit']); ?> บาท</td>
                            <td><?= $v['date_added']; ?></td>
                            <td><?= $v['date_make_confirm']; ?></td>
                            <td><?= $v['date_transfer'].' '.$v['time_transfer']; ?></td>
                            <td>
                                <a href="comfimm-credit-detail.php?invoice_id=<?= $v['invoice_id']; ?>">ดูรายละเอียด</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }else{
                    ?>
                        <tr>
                            <td><p class="redColor">ไม่มีข้อมูล</p></td>
                        </tr>
                        <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>