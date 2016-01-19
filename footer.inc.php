<div class="clearfix">
</div>
<footer>
    © 2016 EZTeesh
</footer>
<?php
// put your code here
?>
<script>
    $("#p_cotton").change(function () {
        var p_cottonText = $("#p_cotton").val().toString();
        if (p_cottonText === "Cotton ไทย") {
            $("#r5").hide();
            $("#lr5").hide();
        } else {
            $("#r5").show();
            $("#lr5").show();
        }
    });

    $("#fileMockUp").change(function () {
        readURL(this, 'imgMockUp');
    });

    $("#file1").change(function () {
        readURL(this, 'img1');
    });

    $("#file2").change(function () {
        readURL(this, 'img2');
    });

    $("#file3").change(function () {
        readURL(this, 'img3');
    });

    $("#file4").change(function () {
        readURL(this, 'img4');
    });

    $("#file5").change(function () {
        readURL(this, 'img5');
    });

    $("#file6").change(function () {
        readURL(this, 'img6');
    });

    function readURL(input, divName) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.' + divName).css('background', "url(" + e.target.result + ")");
                $('.' + divName).css('background-size', "cover");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

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
