<?php
session_start();
if (!isset($_POST) || !isset($_SESSION['member_id'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
print '<pre>';
print_r($_POST);
print '</pre>';

print '<pre>';
print_r($_FILES);
print '</pre>';

exit;
