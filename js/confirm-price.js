$(function () {

    $('#frm_confirm_price').submit(function () {
        event.preventDefault();
        var product_id = $('#product_id').val();
        var product_price = $('#product_price').val();
        if (confirm('คุณแน่ใจว่าตรวจสอบข้อมูลถูกต้องแล้ว?')) {
            $.post('../backend/admin-confirm-product-price.php', {
                product_id: product_id.toString(),
                product_price: product_price.toString()
            }).done(function (res) {
                if (res.trim() === '1') {
                    alert('เพิ่มข้อมูลราคาสินค้าเรียบร้อยแล้ว');
                    window.location = "../../admin/list-confirm-product.php";
                } else {
                    alert('ไม่สามารถบันทึกข้อมูลได้!!');
                }
            }).fail(function (res) {
                console.log(res);
            });
        }
    });
});