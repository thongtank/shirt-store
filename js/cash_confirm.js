$(function() {
    var $form = $('form');

    $form.submit(function() {
        event.preventDefault();
        if ($('#request_cash').val() != $('#hidden-request_cash').val()) {
            alert('ยอดเงินของท่านไม่ตรงกับที่ระบบต้องการ กรุณาตรวจสอบ');
            $('#request_cash').select();
            return false;
        } else {
            // console.log(JSON.stringify($(this).serializeArray()));

            $.post('backend/cash_confirm.php', {
                    data: JSON.stringify($(this).serializeArray())
                })
                .done(function(res) {
                    // console.log(res);
                    if (res == 1) {
                        window.location = './confirm-success.php';
                    } else {
                        window.location = './confirm-failed.php';
                    }
                });
        }

        /*
        [{"name":"packet","value":"Credit Packet 500"},{"name":"bank_to","value":"1"},{"name":"total","value":"21100"},{"name":"hidden-credit","value":"500"},{"name":"bank_transfer","value":"SCB"},{"name":"date_transfer","value":"2016-01-18"},{"name":"time_transfer","value":"13:00"}]
         */

    });


});
