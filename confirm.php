<?php
require_once 'header.inc.php';
?>
<div class="clearfix"></div>
<div class="content">
    <h2 class="title"><i class="fa fa-money"></i> แจ้งการชำระเงิน</h2>
    <h2 class="greenColor">วิธีการแจ้งชำระเงิน</h2>
    1. ค้นหาเลข Invoice ของท่าน โดยป้อนที่ช่อง Invoice หาก เลข Invoice ถูกต้อง ระบบจะแสดงข้อมูลเลขที่ใบ Invoice ให้อัตโนมัติ<br/>
    2. ป้อนยอดเงิน เลือกธนาคารที่โอน ธนาคารต้นทาง สาขา(ถ้ามี)<br/>
    หากไม่สามารถแจ้งได้สามารถติดต่อได้ที่ xxxxxx@xxxxxxxx.com
    <form action="#" method="POST" class="form-horizontal form-register">
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label col-md-3">เลข Invoice *</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="invoice" name="invoice" placeholder="กรอก เลข Invoice"  required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ชื่อแพ็คเก็ต</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="packet" name="packet" value="" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ธนาคารที่โอน *</label>
                <div class="col-md-9">
                    <input type="radio" id="" name="bank" value="ธนาคารกรุงไทย" required> ธนาคารกรุงไทย <br/>
                    <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span><br/>
                    <input type="radio" id="" name="bank" value="ธนาคารกรุงไทย" required> ธนาคารกรุงไทย <br/>
                    <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span><br/>
                    <input type="radio" id="" name="bank" value="ธนาคารกรุงไทย" required> ธนาคารกรุงไทย <br/>
                    <span class="greenColor">ชื่อบัญชี xxxxxxxx xxxxxxxxxx เลขที่บัญชี xxx-x-xxxxx-x</span><br/>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="" class="control-label col-md-3">ธนาคารต้นทาง *</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="" name="" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">วันที่ทำการโอน *</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" id="" name="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">เวลาทำการโอน *</label>
                <div class="col-md-9">
                    <input type="time" class="form-control" id="" name=""  required>
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
