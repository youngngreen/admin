<?php 
//nhiem phu cua file nay dung de nhúng thư viện động
include 'system/config/config.php';
include 'system/libs/funcs.php';

spl_autoload_register(function($classname){
    $cfdb =  'system/db/'.$classname.'.php';   
    if(file_exists($cfdb))
        include $cfdb;
    $mpath = 'model/'.$classname.'.php'; 
    if(file_exists($mpath))
        include $mpath;
    $cpath = 'controller/'.$classname.'.php';
    if(file_exists($cpath))
        include $cpath;
});