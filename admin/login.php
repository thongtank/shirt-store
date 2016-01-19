<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EZ Teesh</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../css/bootstrap-material-design.css" rel="stylesheet" type="text/css" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/ezteech.css" rel="stylesheet" type="text/css" />

        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="login">
            <div class="col-md-4 col-md-offset-4">
                <h2>ลงชื่อเข้าใช้ ADMIN</h2>
                <form action="#" method="POST" id="admin-login" class="form-horizontal">
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
                            <button type="submit" value="submit" class="btn btn-raised btn-primary"><i class="fa fa-sign-in"></i> ลงชื่อเข้าใช้</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $("#admin-login").submit(function () {
                event.preventDefault();
                var user = $("#username").val().toString();
                var pass = $("#password").val().toString();

                $.post('../backend/admin-login.php', {
                    user: user,
                    pass: pass
                }).done(function (res) {
                    console.log(res);
                    var url;
                    if (res === '1') {
                        url = 'index.php';
                    } else {
                        alert('ชื่อหรือรหัสผ่านไม่ถูกต้อง!!');
                        history.back();
                    }
                    window.location = url;
                });
            });
        </script>
    </body>
</html>