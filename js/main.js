function fb_login() {
    FB.login(function(response) {
        if (response.authResponse) {
            FB.api('/me?fields=id,name,first_name,last_name,age_range,link,gender,locale,timezone,updated_time,verified,email', function(response) {
                $.ajax({
                        url: './backend/member.php',
                        type: 'POST',
                        data: {
                            obj: JSON.stringify(response)
                        },
                        beforeSend: function() {
                            $('.se-pre-con').show();
                        },
                        complete: function() {
                            $('.se-pre-con').hide();
                        }
                    })
                    .done(function(res) {
                        if (res == 'new') {
                            window.location = 'frm-update-profile.php';
                        } else if (res == 'done') {
                            window.location = 'index.php';
                        } else {
                            console.log(res);
                        }
                    });
            });
        } else {

        }
    }, {
        scope: 'public_profile,email'
    });
}

$(function() {
    // hide loading icon
    $('.se-pre-con').hide();
});
