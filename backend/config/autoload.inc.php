<?php
function file_include($class) {
    $path = str_replace('\\', DS, WWW_ROOT . DS . $class . '.inc.php');
    if (file_exists($path)) {
        include $path;
    }
}
@require_once 'setting.inc.php';
spl_autoload_register('file_include');
