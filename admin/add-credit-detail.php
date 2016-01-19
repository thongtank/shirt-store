<?php
require_once 'header.inc.php';
use classes as cls;
if (!isset($_SESSION['member_id']) || !isset($_SESSION['invoice_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
} else {
    include_once '../backend/config/autoload.inc.php';

    $member = new cls\member;
    $data = array();
    $data = $member->get_credit_by_invoice_id($_GET['invoice_id']);
    if (count($data) == 0) {
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
    /*
    Array
    (
    [invoice_id] => 00002
    [package] => Credit Packet 1,000 free 50
    [credit] => 1000
    [free] => 50
    [bank_to] =>
    [bank_transfer] =>
    [date_transfer] => 0000-00-00
    [time_transfer] => 00:00:00
    [date_added] => 2016-01-15 23:02:53
    [status] => pending
    [member_id] => 4
    [manager_id] =>
    [date_confirm] => 0000-00-00 00:00:00
    )
     */
    $status = "";
    switch ($data['status']) {
    case 'pending':
        $status = "<font color=red>ยังไม่ชำระค่า Credit Packet</font>";
        break;
    case 'transfered':
        $status = "<font color=#BDAE08>แจ้งการชำระแล้ว กำลังรอการตรวจสอบ</font>";
        break;
    default:
        $status = "ระบบได้ทำการเติม Credit Packet ให้ท่านเรียบร้อยแล้ว";
        break;
    }
}
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
                                <h2 class="redColor"></h2>
                                <h2 class="greenColor"><?=$status;?></h2>
                                <h3>สามารถโอนเงินเข้าบัญชีได้ที่</h3>
                                <p>
                                    ธนาคารไทยพาณิชย์ สาขาอุบลราชธานี ชื่อบัญชี xxxxxxxxx xxxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x
                                </p>
                                <h3 class="greenColor">หลังจากโอนเงินแล้วรบกวนแจ้งโอนเงินได้ที่</h3>
                                <a id="link_confirm" href="#"><h3>http://www.ezteech.com/confirm.php</h3></a>
                                <p>
                                    โดยกรอก ข้อมูลต่างๆลงไปให้ครบถ้วนเพื่อความสะดวกและรวดเร็วในการยืนยันได้เร็วขึ้น
                                </p>
                                <p>Reference Number:
                                    <?=sprintf('%05d', $_SESSION['invoice_id']);?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ออกโดย</th>
                            <th>จ่ายให้</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 50%;">
                                <p>คุณ
                                    <?=$_SESSION['firstname'] . " " . $_SESSION['lastname'];?>
                                </p>
                                <p>
                                    <!-- ฟิลด์ที่อยู่ยังไม่มี -->
                                </p>
                            </td>
                            <td style="width: 50%;">
                                <p>Surachet Kobsawat</p>
                                <p>
                                    <!-- ฟิลด์ผู้รับยังไม่มี -->
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3 class="greenColor">#Invoice เลขที่ : <?=sprintf('%05d', $_SESSION['invoice_id']);?></h3>
            <p>วันที่:
                <?php echo $data['date_added']; ?>
            </p>
            <p>
                <font color="red">กำหนดชำระ:
                    <?php echo $data['date_expired']; ?>
                </font>
            </p>
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
                                <p class="greenColor">
                                    <?=$data['packet'];?>
                                </p>
                            </td>
                            <td style="width: 20%;">
                                <p class="greenColor">
                                    <?=number_format($data['credit']);?> บาท</p>
                            </td>
                        </tr>
                        <tr class="info">
                            <td style="width: 80%; text-align: right;">
                                <p class="">ราคาย่อย:</p>
                            </td>
                            <td style="width: 20%;">
                                <p class="">
                                    <?=number_format($data['credit']);?> บาท</p>
                            </td>
                        </tr>
                        <tr class="info">
                            <td style="width: 80%; text-align: right;">
                                <strong><p class="">ราคาสุทธิ:</p>   </strong>
                            </td>
                            <td style="width: 20%;">
                                <strong><p class=""><?=number_format($data['credit']);?> บาท</p>   </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {
        var $a = $('#link_confirm');
        var invoice_id = "<?php echo $_SESSION['invoice_id']; ?>";
        $a.click(function(){
            event.preventDefault();
            window.location = "./confirm.php?invoice_id=" + invoice_id;
        });
    });
    </script>
    <?php
require_once './footer.inc.php';
?>
