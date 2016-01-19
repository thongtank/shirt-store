$("#p_cotton").change(function() {
    var p_cottonText = $("#p_cotton").val().toString();
    if (p_cottonText === "Cotton ไทย") {
        $("#r5").hide();
        $("#lr5").hide();
    } else {
        $("#r5").show();
        $("#lr5").show();
    }
});

$("#fileMockUp").change(function() {
    readURL(this, 'imgMockUp');
});

$("#file1").change(function() {
    readURL(this, 'img1');
});

$("#file2").change(function() {
    readURL(this, 'img2');
});

$("#file3").change(function() {
    readURL(this, 'img3');
});

$("#file4").change(function() {
    readURL(this, 'img4');
});

$("#file5").change(function() {
    readURL(this, 'img5');
});

$("#file6").change(function() {
    readURL(this, 'img6');
});

function readURL(input, divName) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.' + divName).css('background', "url(" + e.target.result + ")");
            $('.' + divName).css('background-size', "cover");
        };
        reader.readAsDataURL(input.files[0]);
    }
}
