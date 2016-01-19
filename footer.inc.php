<div class="clearfix">
</div>
<footer>
    © 2016 EZTeesh
</footer>
<script>
    $("#bnt-gridView").click(function () {
        $("#div-gridView").show();
        $("#div-listView").hide()();
    });

    $("#bnt-listView").click(function () {
        $("#div-gridView").hide();
        $("#div-listView").show();
    });

    window.fbAsyncInit = function () {
        FB.init({
            appId: '439183889614868',
            xfbml: true,
            version: 'v2.5'
        });
    };

    (function (d, s, id) {
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

<!-- script src files -->
<script src="js/main.js"></script>
</body>

</html>
