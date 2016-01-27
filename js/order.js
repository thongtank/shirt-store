$(function() {
    $('#hidden_outofcredit').hide();

    var scntDiv = $('#buy-plus');
    var i = $('#buy-plus p').size() + 1;

    var $indenInput = $('#hidden_rows');
    $indenInput.val(1);

    var divid = '';

    var $form = $('form');
    $('#btt_plus').click(function() {
        event.preventDefault();
        $indenInput.val(i);
        divid = 'div' + i;
        $('<div class="div' + i + '"><hr /><div class="col-md-1">' +
            '<strong>จำนวน</strong>' +
            '<input id="txt_amount' + i + '" name="txt_amount' + i + '"  class="form-control" min="1" value="1" type="number" required="">' +
            '</div>' +
            '<div class="col-md-2">' +
            '<strong>ขนาดเสื้อ</strong>' +
            '<select id="slc_size' + i + '" name="slc_size' + i + '" class="form-control" required="">' +
            '<option value="">-เลือกขนาดเสื้อ-</option>' +
            '<option value="s">S</option>' +
            '<option value="m">M</option>' +
            '<option value="l">L</option>' +
            '<option value="xl">XL</option>' +
            '</select>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<strong>รายละเอียดลาย</strong>' +
            '<textarea id="txt_detail' + i + '" name="txt_detail' + i + '"  class="form-control" required=""></textarea>' +
            '</div>' +
            '<div class="col-md-4">' +
            '<strong>ที่อยู่จัดส่ง</strong>' +
            '<textarea  id="txt_address' + i + '" name="txt_address' + i + '"  class="form-control" required=""></textarea>' +
            '</div>' +
            '<div class="col-md-1">' +
            '<br />' +
            '<button type="button" id="btn-del' + i + '" class="btn btn-raised btn-danger pull-right" onclick="removeP(\'' + divid + '\')"><i class="fa fa-close"></i></button>' +
            '</div><div class="clearfix"></div>').appendTo(scntDiv);
        check_last(i);
        i++;
    });

    $form.submit(function() {
        event.preventDefault();
        $('#hidden_outofcredit').hide();
        $.post('backend/order.php', {
            data: JSON.stringify($(this).serializeArray())
        }, function(data) {
//             console.log(data);
            if (data == 'out of credit') {
                // alert('จำนวนเครดิตของท่านไม่เพียงพอ กรุณาเติม');
                $('#hidden_outofcredit').show();
            } else if (data == 'done') {
                window.location = 'buy-success.php';
            } else {
                // console.log(data);
            }
        });
    });
});

function check_last(rows) {
    // console.log(rows);
    for (var i = 2; i <= rows; i++) {
        if (i == rows) {
            $('#btn-del' + i).removeAttr('disabled');
        } else {
            $('#btn-del' + i).attr('disabled', 'disabled');
        }
    }
}

function removeP(divid) {
    $("." + divid).remove();
    var $hidden = document.getElementById('hidden_rows');
    var i = $hidden.value - 1;
    $hidden.value = i;
    check_last(i);
    // console.log($hidden.value);
}
