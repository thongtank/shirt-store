<?php
use classes as cls;
require_once 'header.inc.php';
$member = new cls\member;
?>
<div class="clearfix"></div>
<div class="content">
    <h2 class="title">สมัครสมชิก</h2>
    <form id="register_form" name="register_form" method="POST" class="form-horizontal form-register">
        <input type="hidden" value="insert" id="hidden_status" name="hidden_status">
        <div class="col-md-6">
            <p><b>ข้อมูลทั่วไป</b></p>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ชื่อ *</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="txt_fname" name="txt_fname" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">นามสกุล *</label>
                <div class="col-md-9">
                     <input type="text" class="form-control" id="txt_lname" name="txt_lname" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">เพศ *</label>
                <div class="col-md-9">
                     <select name="gender" id="gender" class="form-control" required="required">
                         <option value="">เลือกเพศ</option>
                         <option value="male">ชาย</option>
                         <option value="female">หญิง</option>
                     </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">อีเมล์ *</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="txt_email" name="txt_email" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">เบอร์มือถือ *</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="txt_mobile" name="txt_mobile" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">เบอร์โทรศัพท์</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="txt_tel" name="txt_tel" value="">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p><b>ข้อมูลเข้าใช้ระบบ</b></p>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ชื่อเข้าใช้ *</label>
                <div class="col-md-9">
                    <input type="text" pattern="[_a-zA-Z0-9]{2,20}" class="form-control" id="txt_username" name="txt_username" required minlength="5">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">รหัสผ่าน *</label>
                <div class="col-md-9">
                     <input type="password" pattern="[a-zA-Z0-9_]{2,20}" class="form-control" id="txt_password" name="txt_password" required minlength="6">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ยืนยันรหัสผ่าน *</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" id="txt_repassword" name="txt_repassword" required minlength="6">
                </div>
            </div>
            <p><b>ข้อมูลร้านค้า</b></p>
            <div class="form-group">
                    <label for="shop_name" class="col-md-3 control-label">ชื่อร้าน *</label>
                    <div class="col-md-9">
                        <input type="text" name="shop_name" id="shop_name" class="form-control" value="" required="required" placeholder="กรอกชื่อร้านค้าของท่าน">
                    </div>
                </div>
                <div class="form-group">
                    <label for="shop_detail" class="control-label col-md-3">รายละเอียดร้านค้า</label>
                    <div class="col-md-9">
                        <textarea name="shop_detail" id="shop_detail" class="form-control" rows="3" aria-described="shop_detail-helpBlock"></textarea>
                    </div>
                </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-raised btn-primary pull-right" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="js/member.js"></script>
<?php require_once 'footer.inc.php';?>
