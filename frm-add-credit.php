<?php
require_once 'header.inc.php';
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title">เพิ่มเครดิต</h2>
        <div class="table-responsive">
            <form action="#" method="POST" class="form-horizontal form-register">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">เลือก Credit Packet *</label>
                        <div class="col-md-9">
                            <select name="credit_pack" id="credit_pack" class="form-control" required>
                                <option value="">---เลือก Credit Packet---</option>
                                <option value="500">Credit Packet 500</option>
                                <option value="1000">Credit Packet 1,000 free 50</option>
                                <option value="2000">Credit Packet 2,000 free 100</option>
                                <option value="5000">Credit Packet 5,000 free 300</option>
                                <option value="10000">Credit Packet 10,000 free 700</option>
                                <option value="50000">Credit Packet 50,000 free 4,000</option>
                            </select>
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">โอนเข้าบัญชีธนาคาร *</label>
                        <div class="col-md-9">
                            <select name="credit_bank" id="credit_bank" class="form-control" required>
                                <option value="">---เลือกบัญชีธนาคาร---</option>
                                <option value="KTB">ธนาคารกรุงไทย</option>
                                <option value="KBANK">ธนาคารกสิกรไทย</option>
                                <option value="SCB">ธนาคารไทยพาณิชย์</option>
                            </select>
                        </div>
                    </div>
                    -->
                </div>
                <!--
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">วันที่ทำการโอน *</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control" name="date_added" id="date_added" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3">เวลาทำการโอน *</label>
                        <div class="col-md-9">
                            <input type="time" class="form-control" name="time_added" id="time_added" required>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-raised btn-primary pull-right" id="" name="" value="แจ้งซื้อเครดิต"><i class="fa fa-save"></i> แจ้งซื้อเครดิต</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <h2 class="title">รายการซื้อเครดิต</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Credit Packet</th>
                        <th>ราคา</th>
                        <th>วันที่ทำรายการ</th>
                        <th>วันที่ยืนยัน</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope=row>1</td>
                        <td>00135</td>
                        <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                        <td>5,000 บาท</td>
                        <td>11/01/2016 11:11:11</td>
                        <td>-</td>
                        <td>
                            <label class="label label-danger">รอการยืนยัน</label>
                            <label class="label label-danger"><i class="fa fa-close"></i>ยกเลิกรายการ</label>
                        </td>
                    </tr>
                    <tr>
                        <td scope=row>2</td>
                        <td>00135</td>
                        <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                        <td>5,000 บาท</td>
                        <td>11/01/2016 11:11:11</td>
                        <td>11/01/2016 20:11:11</td>
                        <td>
                            <label class="label label-success">เติมเครดิตเรียบร้อย</label>
                        </td>
                    </tr>
                    <tr>
                        <td scope=row>3</td>
                        <td>00135</td>
                        <td><a href="add-credit-detail.php">Credit Packet 5,000 free 300</a></td>
                        <td>5,000 บาท</td>
                        <td>11/01/2016 11:11:11</td>
                        <td>11/01/2016 20:11:11</td>
                        <td>
                            <label class="label label-success">เติมเครดิตเรียบร้อย</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="js/credit.js"></script>
    <?php require_once 'footer.inc.php';?>
