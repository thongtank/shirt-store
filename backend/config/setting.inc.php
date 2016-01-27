<?php
if (!defined('LOCALHOST')) {
    // define('LOCALHOST', 'ottyhost.com');
    define('LOCALHOST', 'localhost');
}
if (!defined('USER')) {
    // define('USER', 'hitshirts_user');
    define('USER', 'root');
}
if (!defined('PWD')) {
    // define('PWD', 'hit313339');

    define('PWD', '');
}
if (!defined('DBNAME')) {
    // define('DBNAME', 'hitshirts_db');
    define('DBNAME', 'ez');
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
