<?php

require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";

    exit;
}
?>
    <div class="content">
        <br />
        <div class="col-md-6">
            <img src="img/imgPlusMockup.jpg" class="img-rounded" style="width: 100%;" alt="" />
            <div class="clearfix"></div>
            <br />
            <div class="col-md-3">
                <img src="img/imgPlus.png" class="img-rounded" style="width: 100%;" alt="" />
            </div>
            <div class="col-md-3">
                <img src="img/imgPlusMockup.jpg" class="img-rounded" style="width: 100%;" alt="" />
            </div>
            <div class="col-md-3">
                <img src="img/test.jpg" class="img-rounded" style="width: 100%;" alt="" />
            </div>
            <div class="col-md-3">
                <img src="img/imgPlus.png" class="img-rounded" style="width: 100%;" alt="" />
            </div>
        </div>
        <div class="col-md-6">
            <p class="font2em greenColor"><strong>DOTA2 LOGO</strong></p>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รหัสลายเสื้อ :</strong></label>
                <div class="col-md-9">xxxxxxxxx</div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight font1_5em"><strong>ราคาซื้อ :</strong></label>
                <div class="col-md-9 greenColor font1_5em"><strong>250 Credit</strong></div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>เนื้อผ้า :</strong></label>
                <div class="col-md-9">Cotton ส่งออก</div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>ทรงเสื้อ :</strong></label>
                <div class="col-md-9">ชายตรง ชาย</div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>รายละเอียดลายเสื้อ :</strong></label>
                <div class="col-md-9">xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxx xxxxxxxxxxxxxxx</div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md-3 textRight"><strong>สั่งศื้อแล้ว :</strong></label>
                <div class="col-md-9 greenColor">50 ครั้ง</div>
            </div>
            <a class="btn btn-raised btn-warning" href="#"><i class="fa fa-edit"></i> แก้ไขข้อมูล</a>
            <a class="btn btn-raised btn-primary" href="#"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</a>
        </div>
    </div>
    <?php
require_once './footer.inc.php';
?>
