$(function() {
    var $form = $('form');
    var $pack = $('#credit_pack');
    var credit;
    var packet;
    var free;
    $form.submit(function() {
        event.preventDefault();
        credit = $pack.val();
        if (credit == 500) {
            packet = "Credit Packet 500";
            free = 0;
        } else if (credit == 1000) {
            packet = "Credit Packet 1,000 free 50";
            free = 50;
        } else if (credit == 2000) {
            packet = "Credit Packet 2,000 free 100";
            free = 100;
        } else if (credit == 5000) {
            packet = "Credit Packet 5,000 free 300";
            free = 300;
        } else if (credit == 10000) {
            packet = "Credit Packet 10,000 free 700";
            free = 700;
        } else if (credit == 50000) {
            packet = "Credit Packet 50,000 free 4,000";
            free = 4000;
        } else {
            alert('เลือกแพ็คเก็ตไม่ถูกต้อง');
            return false;
        }
        $.post('backend/credit_added.php', {
            packet: packet,
            credit: credit,
            free: free
        }).done(function(data) {
<<<<<<< HEAD
            // console.log(data);
            if (data == 1) {
                window.location = 'add-credit-detail.php';
=======
            console.log(data);
            if (data > 0) {
                window.location = 'add-credit-detail.php?invoice_id=' + data;
>>>>>>> master
            } else {
                alert('การซื้อเครคิตเกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
                window.location = 'frm-add-credit.php';
            }
        });
    });
});