<?php
function file_include($class) {
    $path = str_replace('\\', DS, WWW_ROOT . DS . $class . '.inc.php');
    if (file_exists($path)) {
        $included_files = get_included_files();
        if (!in_array($path, $included_files)) {
            include $path;
            // print $path . "<BR>";
        }
    }
}
@require_once 'setting.inc.php';
spl_autoload_register('file_include');
