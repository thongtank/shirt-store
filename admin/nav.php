<div class="navbar navbar-primary">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> EZ Teesh Admin</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li><a href="list-confirm-credit.php"><i class="fa fa-check-circle"></i> Confirm Credit</a></li>
                <li><a href="list-confirm-product.php"><i class="fa fa-shirtsinbulk"></i> รายการลายเสื้อรอยืนยันราคา</a></li>
                <li><a href="list-confirm-credit.php"><i class="fa fa-shopping-cart"></i> รายการสั่งซื้อ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?= $_SESSION['u_name']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>