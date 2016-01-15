<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>EZ Teesh</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-material-design.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ezteech.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
    html {
        height: 100%;
    }

    body {
        display: table;
        width: 100%;
        height: 100%;
    }

    div.content {
        text-align: center;
        vertical-align: middle;
    }

    img {
        margin: 0 auto;
        /** [top,bottom] [left,right] */
    }

    form {
        width: 50%;
        margin: 0px auto;
    }

    .fa-6 {
        font-size: 20em;
    }
    </style>
</head>

<body>
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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shirtsinbulk"></i> รายการสินค้า <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="frm-add-product.php"><i class="fa fa-plus"></i> เพิ่มรายการสินค้า</a></li>
                            <li><a href="list-product.php"><i class="fa fa-list"></i> รายการสินค้าทั้งหมด</a></li>
                            <li><a href="list-buy-product.php"><i class="fa fa-list"></i> รายการซื้อสินค้า</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-usd"></i> ข้อมูลเครดิต<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="frm-add-credit.php"><i class="fa fa-plus"></i> เติมเครดิต</a></li>
                            <li><a href="list-buy-credit.php"><i class="fa fa-list"></i> ข้อมูลการซื้อเครดิต</a></li>
                            <li><a href="list-debit.php"><i class="fa fa-list"></i> ข้อมูลการใช้งานเครดิต</a></li>
                            <li><a href="confirm.php"><i class="fa fa-plus"></i> แจ้งการชำระเงิน</a></li>
                        </ul>
                    </li>
                    <!--<li><a href="javascript:void(0)"><i class="fa fa-phone"></i> ติดต่อเรา</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a><i class="fa fa-bitcoin"></i> เครดิต : 0</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> ต้อง กรุณ<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="fa fa-file-text"></i> ข้อมูลส่วนตัว</a></li>
                            <li><a href="#"><i class="fa fa-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <i class="fa fa-thumbs-up fa-6"></i>
        <h1>การแก้ไขข้อมูลเสร็จสมบูรณ์</h1>
        <a href="index.php">กลับหน้าหลัก</a>
    </div>
    <div class="clearfix">
    </div>
    <footer>
        © 2016 EZTeesh
    </footer>
</body>

</html>
