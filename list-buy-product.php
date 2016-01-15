<?php
require_once 'header.inc.php';
?>
<div class="clearfix"></div>
<div class="content">
    <div class="table-responsive">        
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>รูปภาพ</th>
                    <th>ชื่อลาย</th>
                    <th>ราคาเคดิต</th>
                    <th>จำนวนซื้อ</th>
                    <th>วันที่ทำรายการ</th>
                    <th>สถานะ</th>
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td scope=row>1</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">5 ชิ้น</td>
                    <td class="greenColor">11/11/2016 11:11:11</td>
                    <td>
                        <label class="label center-block label-danger">รอดำเนินการ</label>
                    </td>
                </tr>
                <tr>
                    <td scope=row>1</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">5 ชิ้น</td>
                    <td class="greenColor">11/11/2016 11:11:11</td>
                    <td>
                        <label class="label center-block label-warning">ขั้นตอนการผลิต</label>
                    </td>
                </tr>
                <tr>
                    <td scope=row>1</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">5 ชิ้น</td>
                    <td class="greenColor">11/11/2016 11:11:11</td>
                    <td>
                        <label class="label center-block label-primary">ขั้นตอนการจัดส่ง</label>
                    </td>
                </tr>
                <tr>
                    <td scope=row>1</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">5 ชิ้น</td>
                    <td class="greenColor">11/11/2016 11:11:11</td>
                    <td>
                        <label class="label center-block label-success">ส่งมอบแล้ว</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
require_once './footer.inc.php';
?>