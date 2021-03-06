<?php
use classes as cls;
?>
<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> EZ Teesh</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <?php
if (isset($_SESSION['member_id'])) {
    ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shirtsinbulk"></i> รายการสินค้า <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="frm-add-product.php"><i class="fa fa-plus"></i> เพิ่มรายการสินค้า</a></li>
                            <li><a href="list-product.php"><i class="fa fa-list"></i> รายการสินค้าทั้งหมด</a></li>
                            <li><a href="list-buy-product.php"><i class="fa fa-list"></i> รายการสั่งซื้อสินค้า</a></li>
    <!--                                 <li><a href="list-buy-product.php"><i class="fa fa-list"></i> รายการซื้อสินค้า</a></li> -->
                        </ul>
                    </li>
                    <!--<li><a href="javascript:void(0)"><i class="fa fa-phone"></i> ติดต่อเรา</a></li>-->

                    <?php
}
?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o"></i> คู่มือการใช้งาน <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="manual-register.php"><i class="fa fa-file-text-o"></i> คู่มือการสมัครสมาชิก</a></li>
                        <li><a href="manual-addproduct.php"><i class="fa fa-file-text-o"></i> คู่มือการเพิ่มลายเสื้อ</a></li>
                        <li><a href="manual-size.php"><i class="fa fa-file-text-o"></i> ตารางขนาดเสื้อ</a></li>
                    </ul>
                </li>
                <?php
if (isset($_SESSION['member_id'])) {
    ?>
                    <li><a href="download-mockup.php"><i class="fa fa-download"></i> Download Mockup</a></li>
                <?php }
?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
if (isset($_SESSION['member_id'])) {
    $member = new cls\member;
    $member->member_id = $_SESSION['member_id'];
    // $member->get_balance();
    // $my_credit = $member->credit;
    $my_credit = $_SESSION['credit_balance'];
    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bitcoin"></i> เครดิต : <?=number_format($my_credit);?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="frm-add-credit.php"><i class="fa fa-plus"></i> เติมเครดิต</a></li>
                            <li><a href="list-buy-credit.php"><i class="fa fa-list"></i> รายการสั่งซื้อเครดิต</a></li>
                            <!-- <li><a href="list-debit.php"><i class="fa fa-list"></i> ข้อมูลการใช้งานเครดิต</a></li> -->
                            <li><a href="confirm.php"><i class="fa fa-bell-o"></i> แจ้งการชำระเงิน</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?=$_SESSION['firstname'] . ' ' . $_SESSION['lastname'];?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="fa fa-file-text"></i> ข้อมูลส่วนตัว</a></li>
                            <li><a href="frm-update-profile.php"><i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
                        </ul>
                    </li>
                    <?php
} else {
    ?>
                    <li><a href="index.php"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</a></li>
                    <li><a href="frm-register.php"><i class="fa fa-user-plus"></i> สมัครสมาชิก</a></li>
                        <?php
}
?>
            </ul>
        </div>
    </div>
</div>
