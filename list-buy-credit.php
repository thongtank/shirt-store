<?php

require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
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
                <tr>
                    <td scope=row>1</td>
                    <td>00135</td>
                    <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                    <td>5,000 บาท</td>
                    <td>11/01/2016 11:11:11</td>
                    <td>-</td>
                    <td>
                        <label class="label label-danger">รอการยืนยัน</label> <label class="label label-danger"><i class="fa fa-close"></i>ยกเลิกรายการ</label>
                    </td>
                </tr>
                <tr>
                    <td scope=row>2</td>
                    <td>00135</td>
                    <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                    <td>5,000 บาท</td>
                    <td>11/01/2016 11:11:11</td>
                    <td>11/01/2016 20:11:11</td>
                    <td><label class="label label-success">เติมเครดิตเรียบร้อย</label></td>
                </tr>
                <tr>
                    <td scope=row>3</td>
                    <td>00135</td>
                    <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                    <td>5,000 บาท</td>
                    <td>11/01/2016 11:11:11</td>
                    <td>11/01/2016 20:11:11</td>
                    <td><label class="label label-success">เติมเครดิตเรียบร้อย</label></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>