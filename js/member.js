$(function() {
    // สำหรับคนที่สมัครด้วย facebook
    $('#update_form').submit(function(event) {
        // console.log($(this).serializeArray());
        event.preventDefault();
        // console.log($(this).serializeArray());
        if ($('#txt_password').val() !== $('#txt_repassword').val()) {
            alert('รหัสผ่านที่ยืนยันกรอกไม่ตรงกัน . . .');
            $('#txt_repassword').select();
            return false;
        }
        $.ajax({
                url: 'backend/update_member.php',
                type: 'POST',
                data: {
                    firstname: $('#txt_fname').val(),
                    lastname: $('#txt_lname').val(),
                    gender: $('#gender').val(),
                    email: $('#txt_email').val(),
                    username: $('#txt_username').val(),
                    password: $('#txt_repassword').val(),
                    tel: $('#txt_tel').val(),
                    mobile: $('#txt_mobile').val(),
                    status: $('#hidden_status').val()
                }
            })
            .done(function(res) {
                var url = '';
                if (res) {
                    url = 'update-success.php';
                } else {
                    url = 'update-failed.php';
                }
                window.location = url;
            })
            .fail(function() {

            });
    });

    // สำหรับคนที่สมัครแบบปกติ
    $('#register_form').submit(function(event) {
        event.preventDefault();
        if ($('#txt_password').val() !== $('#txt_repassword').val()) {
            alert('รหัสผ่านที่ยืนยันกรอกไม่ตรงกัน . . .');
            $('#txt_repassword').select();
            return false;
        }
        $.ajax({
                url: 'backend/update_member.php',
                type: 'POST',
                data: {
                    firstname: $('#txt_fname').val(),
                    lastname: $('#txt_lname').val(),
                    gender: $('#gender').val(),
                    email: $('#txt_email').val(),
                    username: $('#txt_username').val(),
                    password: $('#txt_repassword').val(),
                    tel: $('#txt_tel').val(),
                    mobile: $('#txt_mobile').val(),
                    status: $('#hidden_status').val()
                }
            })
            .done(function(res) {
                console.log(res);
                var url = '';
                if (res) {
                    url = 'register-success.php';
                } else {
                    url = 'register-failed.php';
                }
                window.location = url;
            })
            .fail(function() {

            });
    });
});
