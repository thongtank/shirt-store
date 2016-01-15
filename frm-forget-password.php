<?php
require_once 'header.inc.php';
?>
<div class="clearfix"></div>
<div class="container">
    <form action="" method="POST" class="form-horizontal">
        <div class="form-group">
                <label for="" class="control-label col-md-2">อีเมล์ : </label>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="product_name" name="product_name" required>
                </div>
            </div>
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-raised btn-primary pull-right"><i class="fa fa-send"></i>  ส่งรหัสผ่าน</button>
            </div>
        </div>
    </form>
</div>
<?php
require_once './footer.inc.php';
?>