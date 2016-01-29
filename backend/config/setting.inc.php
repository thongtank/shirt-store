<?php
if (!defined('LOCALHOST')) {
    // define('LOCALHOST', 'ottyhost.com');
    define('LOCALHOST', 'localhost');
}
if (!defined('USER')) {
    // define('USER', 'hitshirts_user');
    define('USER', 'ezteesh_admin');
}
if (!defined('PWD')) {
    // define('PWD', 'ez313339');

    define('PWD', 'ez313339');
}
if (!defined('DBNAME')) {
    // define('DBNAME', 'hitshirts_db');
    define('DBNAME', 'ezteesh_DB');
}
if (!defined('PORT')) {
    define('PORT', 3306);
}
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('WWW_ROOT')) {
    define('WWW_ROOT', dirname(dirname(__FILE__)));
}
if (!defined('UPLOAD')) {
    define('UPLOAD', dirname(basename(dirname(dirname(__FILE__)))) . DS . 'uploads');
}
