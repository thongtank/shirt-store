<?php
require_once 'header.inc.php';
?>
<div class="clearfix"></div>
<div class="content">
    <h2 class="title">เพิ่มข้อมูลสินค้า</h2>
    <form action="" method="POST" class="form-horizontal form-register">
        <div class="col-md-6">
            <p>ข้อมูลทั่วไป </p>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ชื่อสินค้า *</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">เนื้อผ้า *</label>
                <div class="col-md-9">
                    <select name="p_cotton" id="p_cotton" class="form-control" required>
                        <option value="">---เลือกเนื่อผ้า---</option>
                        <option value="Cotton ไทย">Cotton ไทย</option>
                        <option value="Cotton ส่งออก">Cotton ส่งออก</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ทรงเสื้อ *</label>
                <div class="col-md-9">
                    <select name="province" id="province" class="form-control" required>
                        <option value="">---เลือกทรงเสื้อ---</option>
                        <option value="">เสื้อชายตรง ผู้ชาย</option>
                        <option value="">เสื้อชายตรง ผู้หญิง</option>
                        <option value="">เข้ารูป ผู้ชาย</option>
                        <option value="">เข้ารูป ผู้หญิง</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">สีเสื้อ *</label>
                <div class="col-md-9" id="addProduct">
                    <input type="radio" checked="checked" name="r" id="r1" value="สีดำ" required><label id="lr1" for="r1" title="สีดำ"></label>
                    <input type="radio" name="r" id="r2" value="สีขาว"><label id="lr2" for="r2" title="สีขาว"></label>
                    <input type="radio" name="r" id="r3" value="สีแดง"><label id="lr3" for="r3" title="สีแดง"></label>
                    <input type="radio" name="r" id="r4" value="สีกรมท่า"><label id="lr4" for="r4" title="สีกรมท่า"></label>
                    <input type="radio" name="r" id="r5" value="สีเทา"><label id="lr5" for="r5" title="สีเทา"></label>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3">ลายละเอียดลายเสื้อ *</label>
                <div class="col-md-9">
                    <textarea class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <p>รูปภาพสินค้า </p>
            <div class="form-group">
                <label for="" class="control-label col-md-3">รูป Mock up *</label>
                <div class="col-md-9">
                    <div class="imgMockUp"></div>
                    <input type="file" class="form-control" accept="image/*" id="fileMockUp" name="fileMockUp" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 1</label>
                    <div class="col-md-12">
                        <div class="img1"></div>
                        <input type="file" class="form-control" accept="image/*" id="file1" name="file1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 3</label>
                    <div class="col-md-12">
                        <div class="img3"></div>
                        <input type="file" class="form-control" accept="image/*" id="file3" name="file3">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 5</label>
                    <div class="col-md-12">
                        <div class="img5"></div>
                        <input type="file" class="form-control" accept="image/*" id="file5" name="file5">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 2</label>
                    <div class="col-md-12">
                        <div class="img2"></div>
                        <input type="file" class="form-control" accept="image/*" id="file2" name="file2">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 4</label>
                    <div class="col-md-12">
                        <div class="img4"></div>
                        <input type="file" class="form-control" accept="image/*" id="file4" name="file4">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-12" id="textCenter">ลาย 6</label>
                    <div class="col-md-12">
                        <div class="img6"></div>
                        <input type="file" class="form-control" accept="image/*" id="file6" name="file6">
                    </div>
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
<?php
require_once './footer.inc.php';
?>