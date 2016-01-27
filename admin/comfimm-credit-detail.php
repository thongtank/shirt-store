<?php
require_once 'header.inc.php';

use classes as cls;

include_once '../backend/config/autoload.inc.php';
$member = new cls\member;
$data = array();
$data = $member->get_credit_by_invoice_id_manager($_GET['invoice_id']);
//print_r($data);
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
?>
<div class="clearfix"></div>
<div class="container">
    <h2 class="title">ข้อมูลแจ้งชำระค่าเครดิต</h2>
    <div class="col-md-6">

        <p class="font1_5em"><strong><?= $status; ?></strong></p>
        <p class="font1_5em greenColor"><strong>เลข Invoice : </strong><?= $data['invoice_id']; ?></p>
        <p class=""><strong>วันที่ทำรายการ : </strong><?= $data['date_added']; ?></p>
        <p class=""><strong>วันที่แจ้งชำระ : </strong><?= $data['date_make_confirm']; ?></p>
    </div>
    <div class="col-md-6">
        <p class=""><strong>ซื้อ Packet : </strong><?= $data['packet']; ?></p>
        <p class=""><strong>ผู้ซื้อ : </strong><?= $data['firstname'] . '  ' . $data['lastname']; ?></p>
        <p class=""><strong>เบอร์โทร : </strong><?= $data['mobile']; ?></p>
        <p class=""><strong>โอนเข้า : </strong><?= $data['bank_to']; ?></p>
        <p class=""><strong>ธนาคานต้นทาง : </strong><?= $data['bank_transfer']; ?></p>
        <p class=""><strong>วันที่/เวลา โอน : </strong><?= $data['date_transfer'] . ' ' . $data['time_transfer']; ?></p>
        <p class="font1_5em redColor"><strong>จำนวนที่โอน : </strong><?= number_format($data['total'], 2, '.', ','); ?> บาท</p>
    </div>
    <a id="bnt_confirm" class="btn btn-raised btn-primary"><i class="fa fa-plus"></i> confirm invoice</a>
</div>
<script>
    $('#bnt_confirm').click(function () {
        var invoice_id = '<?= $data['invoice_id']; ?>';
        var u_id = '<?= $_SESSION['u_id']; ?>';
        var credit = '<?= $data['credit']; ?>';
        var free = '<?= $data['free']; ?>';
        var member_id = '<?= $data['member_id']; ?>';
        if (confirm('คุณแน่ใจว่าตรวจสอบข้อมูลถูกต้องแล้ว?')) {
            $.post('../backend/update_confirm_credit.php', {
                invoice_id: invoice_id.toString(),
                manager_id: u_id.toString(),
                credit: credit,
                free: free,
                member_id: member_id
            }).done(function (res) {
                console.log(res);
                if (res === '1') {
                    alert('เพิ่มเครดิตให้กับสมาชิกเรียบร้อยแล้ว');
                    window.location = "list-confirm-credit.php";
                } else {
                    alert('ไม่สามารถบันทึกข้อมูลได้!!');
                }
            });
        }
    });

</script>
<?php
require_once './footer.inc.php';
?>