<?php
require_once 'header.inc.php';
?>
<div class="clearfix"></div>
<div class="content">
    <h2 class="title">รายการการใช้งานเครดิต</h2>
    <div class="table-responsive">
        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รายการ</th>
                    <th>วันที่ทำรายการ</th>
                    <th>จำนวนเครดิต</th>
                    <th>เครดิตคงเหลือ</th>
                </tr>
            </thead>
            <tbody>
                <tr class="danger">
                    <td scope=row>1</td>
                    <td>ซื้อเสื้อลาย DOTA 2</td>
                    <td>11/01/2016 11:11:11</td>
                    <td style="text-align: right;">-250</td>
                    <td style="text-align: right;">9,999</td>
                </tr>
                <tr class="success">
                    <td scope=row>2</td>
                    <td>เติม Credit Packet 5000</td>
                    <td>11/01/2016 11:11:11</td>
                    <td style="text-align: right;">+5,000</td>
                    <td style="text-align: right;">9,999</td>
                </tr>
                <tr class="danger">
                    <td scope=row>3</td>
                    <td>ซื้อเสื้อลาย DOTA 2</td>
                    <td>11/01/2016 11:11:11</td>
                    <td style="text-align: right;">-250</td>
                    <td style="text-align: right;">9,999</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>