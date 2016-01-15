<?php
require_once 'header.inc.php';
if (isset($_SESSION['member_id'])) {
    require_once './list-product.php';
} else {
    require_once './home.php';
}
require_once './footer.inc.php';
?>