
$(function() {
    var $form = $('form');

    $form.submit(function() {
        event.preventDefault();
        console.log($('#total').val());
        console.log($('#hidden-credit').val());
        if ($('#total').val() < $('#hidden-credit').val()) {
            alert('ยอดโอนของท่านน้อยกว่าราคาเครดิต กรุณาตรวจสอบ');
            $('#total').select();
            return false;
        } else {
            $.post('backend/confirm.php', {
                    data: JSON.stringify($(this).serializeArray())
                })
                .done(function(res) {
                    // console.log(res);
                    if (res == 1) {
                        window.location = './confirm-success.php';
                    } else {
                        alert('การยืนยันการโอนเงินผิดพลาด');
                        window.location = './frm-add-credit.php';
                    }
                });
        }

        /*
        [{"name":"packet","value":"Credit Packet 500"},{"name":"bank_to","value":"1"},{"name":"total","value":"21100"},{"name":"hidden-credit","value":"500"},{"name":"bank_transfer","value":"SCB"},{"name":"date_transfer","value":"2016-01-18"},{"name":"time_transfer","value":"13:00"}]
         */

    });
});
