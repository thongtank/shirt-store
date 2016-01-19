<div class="clearfix"></div>
<div id="login">
    <div class="col-md-6">
        <h2>ลงชื่อเข้าใช้</h2>
        <form action="#" method="POST" class="form-horizontal">
            <div class="form-group">
                <div class="col-md-12">
                    <input type="text" pattern="[a-zA-Z0-9_]{2,12}" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="password" pattern="[a-zA-Z0-9_]{2,12}" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="checkbox"> Remember me
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-raised btn-primary"><i class="fa fa-sign-in"></i> ลงชื่อเข้าใช้</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <a href="frm-forget-password.php">ลืมรหัสผ่าน </a>
                    </div>
                    <div class="col-md-6">
                        <a href="frm-register.php">สมัครสมาชิก </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <h2>ลงชื่อเข้าใช้ด้วย Facebook</h2>
        <br/>
        <!-- div for loading animation -->
        <div class="se-pre-con"></div>
        <a href="#" class="btn btn-raised btn-info" onclick="fb_login();"><i class="fa fa-facebook-official"></i> ลงชื่อเข้าใช้ด้วย Facebook</a>
    </div>
</div>

<script src="js/login.js" type="text/javascript" charset="utf-8"></script>