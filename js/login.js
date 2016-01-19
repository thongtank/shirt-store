$(function() {
    var $form = $('form');
    var $username = $('#username');
    var $password = $('#password');
    $form.submit(function() {
        event.preventDefault();
        $.post('backend/login.php', {
            username: $username.val(),
            password: $password.val()
        }).done(function(res) {
            console.log(res);
            var url;
            if (res == 1) {
                url = 'index.php';
            } else {
                alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                history.back();
            }
            window.location = url;
        });
    });
});
