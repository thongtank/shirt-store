<?php
require_once 'header.inc.php';
print "<pre>" . print_r($_SESSION, 1) . "</pre>";
exit;
?>
<div class="clearfix"></div>
<div class="container">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="">
                <tbody>
                    <tr>
                        <td style="width: 40%; text-align: center;">
                            <h1 class="greenColor">EZTeech.com</h1>
                        </td>
                        <td style="width: 60%;">
                            <h2 class="redColor">ยังไม่ชำระค่า Credit Packet</h2>
                            <h2 class="greenColor">ชำระค่า Credit Packet แล้ว</h2>
                            <h3>สามารถโอนเงินเข้าบัญชีได้ที่</h3>
                            <p>
                                ธนาคารไทยพาณิชย์ สาขาอุบลราชธานี
                                ชื่อบัญชี xxxxxxxxx   xxxxxxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x
                            </p>
                            <h3 class="greenColor">หลังจากโอนเงินแล้วรบกวนแจ้งโอนเงินได้ที่</h3>

                            <a href="./confirm.php"><h3>http://www.ezteech.com/confirm.php</h3></a>
                            <p>
                                โดยกรอก ข้อมูลต่างๆลงไปให้ครบถ้วนเพื่อความสะดวกและรวดเร็วในการยืนยันได้เร็วขึ้น
                            </p>
                            <p>Reference Number: แสดงเลขInvoice</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ออกให้</th>
                        <th>จ่ายให้</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;">
                            <p>Surachet Kobsawat</p>
                            <p>99 M.17, Khamyai
                                Muang, Ubonratchatani, 34000
                                Thailand</p>
                        </td>
                        <td style="width: 50%;">
                            <p>Surachet Kobsawat</p>
                            <p>99 M.17, Khamyai
                                Muang, Ubonratchatani, 34000
                                Thailand</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3 class="greenColor">#Invoice เลขที่ : แสดงเลขInvoice</h3>
        <p>วันที่: 11/11/2016</p>
        <p>กำหนดชำระ: 12/11/2016</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>รายละเอียด</th>
                        <th>ยอดรวมทั้งหมด</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 80%;">
                            <p class="greenColor">ซื้อ Credit Packet 5,000 free 300</p>
                        </td>
                        <td style="width: 20%;">
                            <p class="greenColor">5,000 บาท</p>
                        </td>
                    </tr>
                    <tr class="info">
                        <td style="width: 80%; text-align: right;">
                            <p class="">ราคาย่อย:</p>
                        </td>
                        <td style="width: 20%;">
                            <p class="">5,000 บาท</p>
                        </td>
                    </tr>
                    <tr class="info">
                        <td style="width: 80%; text-align: right;">
                            <strong><p class="">ราคาสุทธิ:</p>   </strong>
                        </td>
                        <td style="width: 20%;">
                            <strong><p class="">5,000 บาท</p>   </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>