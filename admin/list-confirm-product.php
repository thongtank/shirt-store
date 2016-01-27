<?php
require_once 'header.inc.php';
include_once '../backend/config/autoload.inc.php';
if (!isset($_SESSION['u_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
use classes as cls;

$product = new cls\product();
?>
<div class="container">
    <h1>รายการลายเสื้อรอยืนยันราคา</h1>
    <div class="table-responsive">

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mock up</th>
                    <th>Product ID</th>
                    <th>ชื่อลาย</th>
                    <th>วันที่ทำเพิ่มข้อมูล</th>
                    <th>ดูรายละเอียด</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                $data = array();
                $data = $product->get_product_wait_confirm();
                //print_r($data);
                $i = 1;
                //print_r($data);
                if (isset($data)) {
                    foreach ($data as $k => $v) {
                        ?>
                        <tr>
                            <td scope=row><?= $i; ?></td>                           
                            <td><img class="img-rounded" src="../uploads/member_<?=$v['member_id'] . "/" . $v['product_mockup'];?>" width="200" alt="" /></td>
                            <td><a href="add-product-detail.php?product_id=<?= $v['product_id']; ?>"><?= $v['product_id']; ?></a></td>
                            <td><?= $v['product_name']; ?></td>
                            <td><?= $v['date_added']; ?></td>
                            <td>
                                <a href="add-product-detail.php?product_id=<?= $v['product_id']; ?>">ดูรายละเอียด</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }else{
                    ?>
                        <tr>
                            <td><p class="redColor">ไม่มีข้อมูล</p></td>
                        </tr>
                        <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>