<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}

// require_once 'backend/config/autoload.inc.php';
use classes as cls;

$product = new cls\product;
$product->member_id = $_SESSION['member_id'];
$data = array();
$data = $product->get_product_by_member_id();
// print "<pre>" . print_r($data, 1) . "</pre>";
// exit;
?>
<div class="clearfix"></div>
<div class="content">
    <h2 class="title col-md-6">ลายเสื้อทั้งหมด
        <a class="btn btn-primary" id="bnt-gridView" href="#"><i class="fa fa-th"></i> Grid View</a>

        <a class="btn btn-primary" id="bnt-listView" href="#"><i class="fa fa-list"></i> List View</a>
    </h2>
    <div class="col-lg-6 search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-raised btn-primary" type="button"><i class="fa fa-search"></i> ค้นหา!</button>
            </span>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="div-gridView">
        <?php
        if (count($data) > 0) {
            foreach ($data as $k => $v) {
                ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg-<?= $v['product_id']; ?>"><img src="uploads/member_<?= $_SESSION['member_id'] . DS . $v['product_mockup']; ?>" alt="" /></a>
                        <div class="col-md-12 detail">
                            <h3 class="col-md-12"><a href="./product-detail.php?product_id=<?= $v['product_id']; ?>" title="รายละเอียดสินค้า"><?= $v['product_name']; ?></a></h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <?php
                                    if ($v['confirm_price'] == 0) {
                                        echo '<p class="redColor">รอยืนยันราคา</p>';
                                    } else {
                                        echo $v['confirm_price'] . ' เครดิต';
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <span class="greenColor"><i class="fa fa-shopping-cart"></i> ซื้อแล้ว <?= "..."; ?> ครั้ง</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <a onclick="return confirm('คุณต้องการลบสินค้ารายการนี้หรือไม่ ?');" class="btn btn-raised btn-danger" href="delete-product.php?product_id=<?= base64_encode($v['product_id']); ?>"><i class="fa fa-trash"></i> ลบ</a>
                            <button type="submit" class="btn btn-raised btn-primary pull-right <?= setDisable($v['confirm_price']); ?>" id="" name="" value="สั่งซื้อ"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="table-responsive" id="div-listView">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อลาย</th>
                    <th>ราคาเคดิต</th>
                    <th>จำนวนซื้อ</th>
                    <th>แถบเครื่องมือ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($data) > 0) {
                    $i = 1;
                    foreach ($data as $k => $v) {
                        ?>
                        <tr>
                            <td scope=row>
                                <?= $i; ?>
                            </td>
                            <td><img class="img-rounded" src="uploads/member_<?= $_SESSION['member_id'] . DS . $v['product_mockup']; ?>" width="200" data-toggle="modal" data-target=".bs-example-modal-lg-<?= $v['product_id']; ?>" alt="" /></td>
                            <td>
                                <a href="./product-detail.php?product_id=<?= $v['product_id']; ?>" title="รายละเอียดสินค้า">
                                    <?= $v['product_name']; ?>
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                if ($v['confirm_price'] == 0) {
                                    echo '<p class="redColor">รอยืนยันราคา</p>';
                                } else {
                                    echo $v['confirm_price'] . ' เครดิต';
                                }
                                ?>
                            </td>
                            <td class="greenColor">ซื้อแล้ว
                                <?= "..."; ?> ครั้ง</td>
                            <td>
                                <a onclick="return confirm('คุณต้องการลบสินค้ารายการนี้หรือไม่ ?');" class="btn btn-raised btn-danger" href="delete-product.php?product_id=<?= base64_encode($v['product_id']); ?>"><i class="fa fa-trash"></i> ลบ</a>
                                <button type="submit" class="btn btn-raised btn-primary <?= setDisable($v['confirm_price']); ?>" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    if (count($data) > 0) {
        $i = 1;
        foreach ($data as $k => $v) {
            ?>
            <!--//modal img Start-->
            <div class="modal fade bs-example-modal-lg-<?= $v['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"><?= $v['product_name']; ?></h4>
                        </div>
                        <div class="modal-body">
                            <img class="img-rounded" src="uploads/member_<?= $_SESSION['member_id'] . DS . $v['product_mockup']; ?>" width="100%" alt="" />
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!--//modal img End-->
            <?php
            $i++;
        }
    }
    ?>
</div>
<?php

function setDisable($price) {
    if ($price == 0) {
        echo "disabled";
    }
}

require_once './footer.inc.php';
?>