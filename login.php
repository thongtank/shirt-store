<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <style>
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(img/Preloader_3.gif) center no-repeat #fff;
        opacity: 0.4;
    }
    </style>
</head>

<body>
    <!-- div for loading animation -->
    <div class="se-pre-con"></div>
    <a href="#" onclick="fb_login();">Login With Facebook</a>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId: '439183889614868',
        xfbml: true,
        version: 'v2.5'
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
function fb_login() {
    FB.login(function(response) {
        if (response.authResponse) {
            FB.api('/me?fields=id,name,first_name,last_name,age_range,link,gender,locale,timezone,updated_time,verified,email', function(response) {
                $.ajax({
                        url: 'backend/register.php',
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
                        if (res === 'done') {
                            console.log("insert success");
                        } else {
                            console.log('failed : ' + res);
                        }
                    });
            });
        } else {

        }
    }, {
        scope: 'public_profile,email'
    });
}
</script>

<!-- script src files -->
<script src="js/main.js"></script>
</html>
