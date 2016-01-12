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
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-material-design.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/ezteech.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include './nav.php';
        //include './home.php';
        //include './frm-register.php';
        //include './frm-add-product.php';
        //include './list-credit.php';
        //include './frm-add-credit.php';
        include './list-product.php';
        ?>
        <div class="clearfix"></div>
        <footer>
            © 2016 EZTeesh
        </footer>
        <?php
        // put your code here
        ?>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
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

        </script>
    </body>
</html>
