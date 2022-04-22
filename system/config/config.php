<?php
session_start();
ob_start();
define('TEMPLATEADMIN','http://localhost:/admin/public/backend/');
define('HOST','localhost');
define('DBNAME','data');
define('PORT','3306');
define('USERNAME','root');
define('PASSWORD','');
define('ALLOWS',['loginpost']);

