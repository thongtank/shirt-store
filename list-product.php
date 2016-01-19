<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
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
        <div class="col-md-3">
            <div class="product-card">
                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/imgPlusMockup.jpg" alt=""/></a>
                <div class="col-md-12 detail">
                    <h3 class="col-md-12">DOTA 2 ลายการ์ตูน</h3>
                    <div class="col-md-4 col-sm-4 price">250 เครดิต</div>
                    <div class="col-md-8 col-sm-8 buy">
                        <span class="greenColor"><i class="fa fa-shopping-cart"></i> ซื้อแล้ว 50 ครั้ง</span>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                    <button type="submit" class="btn btn-raised btn-primary pull-right" id="" name="" value="สั่งซื้อ"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="product-card">
                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/imgPlusMockup.jpg" alt=""/></a>
                <div class="col-md-12 detail">
                    <h3 class="col-md-12">DOTA 2 ลายการ์ตูน</h3>
                    <div class="col-md-4 col-sm-4 price">250 เครดิต</div>
                    <div class="col-md-8 col-sm-8 buy">
                        <span class=""><i class="fa fa-shopping-cart"></i> ซื้อแล้ว 0 ครั้ง</span>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                    <button type="submit" class="btn btn-raised btn-primary  pull-right" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="product-card">
                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/imgPlusMockup.jpg" alt=""/></a>
                <div class="col-md-12 detail">
                    <h3 class="col-md-12">DOTA 2 ลายการ์ตูน</h3>
                    <div class="col-md-4 col-sm-4 price">250 เครดิต</div>
                    <div class="col-md-8 col-sm-8 buy">
                        <span class="greenColor"><i class="fa fa-shopping-cart"></i> ซื้อแล้ว 50 ครั้ง</span>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                    <button type="submit" class="btn btn-raised btn-primary  pull-right" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="product-card">
                <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/imgPlusMockup.jpg" alt=""/></a>
                <div class="col-md-12 detail">
                    <h3 class="col-md-12">DOTA 2 ลายการ์ตูน</h3>
                    <div class="col-md-4 col-sm-4 price">250 เครดิต</div>
                    <div class="col-md-8 col-sm-8 buy">
                        <span class="greenColor"><i class="fa fa-shopping-cart"></i> ซื้อแล้ว 50 ครั้ง</span>
                    </div>
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                    <button type="submit" class="btn btn-raised btn-primary  pull-right" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
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
                <tr>
                    <td scope=row>1</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">ซื้อแล้ว 50 ครั้ง</td>
                    <td>
                        <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                        <button type="submit" class="btn btn-raised btn-primary" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                    </td>
                </tr>
                <tr>
                    <td scope=row>2</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">ซื้อแล้ว 50 ครั้ง</td>
                    <td>
                        <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                        <button type="submit" class="btn btn-raised btn-primary" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                    </td>
                </tr>
                <tr>
                    <td scope=row>3</td>
                    <td><img class="img-rounded" src="img/imgPlusMockup.jpg" width="200" data-toggle="modal" data-target=".bs-example-modal-lg" alt=""/></td>

                    <td>เสื้อลาย DOTA 2</td>
                    <td style="text-align: center;">250</td>
                    <td class="greenColor">ซื้อแล้ว 50 ครั้ง</td>
                    <td>
                        <button type="submit" class="btn btn-raised btn-warning" id="" name="" value="แก้ไขข้อมูล"><i class="fa fa-edit"></i> แก้ไขข้อมูล</button>
                        <button type="submit" class="btn btn-raised btn-primary" id="" name="" value="บันทึกข้อมูล"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--//modal img Start-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">เสื้อลาย DOTA 2</h4>
                </div>
                <div class="modal-body">
                    <img class="img-rounded" src="img/imgPlusMockup.jpg" width="100%" alt=""/>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--//modal img End-->

</div>
<?php
require_once './footer.inc.php';
?>
