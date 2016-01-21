<?php
session_start();
if (!isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
require_once 'backend/config/autoload.inc.php';
if (!isset($_GET['invoice_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=frm-add-credit.php'>";
    exit;
}
require_once 'backend/config/autoload.inc.php';
use classes as cls;
$member = new cls\member;

$invoice_id = base64_decode($_GET['invoice_id']); // Convert invoice_id from base64 to normal data
$member->member_id = $_SESSION['member_id'];
if ($member->cancel_credit($invoice_id)) {
    echo "<meta http-equiv='refresh' content='0;url=frm-add-credit.php'>";
    exit;
}
