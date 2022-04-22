<?php
function xemmang($ar)
{
    echo '<pre>',print_r($ar),'</pre>';
}

function chuyentrang($url)
{
    header('location: '.$url);
    exit;
}
function msg($noidung,$type='success')
{
    return '<div class="alert alert-'.$type.'">'.$noidung.'</div>';
}
function islogin()
{
    return  isset($_SESSION['login_status'])  && $_SESSION['login_status'];
}
function post($name)
{
    if(isset($_POST[$name]) && $_POST[$name])
    {
        return is_string($_POST[$name])?trim($_POST[$name]):$_POST[$name];
    }else{
        return '';
    }
}
function get($name)
{
    if(isset($_GET[$name]) && $_GET[$name])
    {
        return is_string($_GET[$name])?trim($_GET[$name]):$_GET[$name];
    }else{
        return '';
    }
}
function url($controller='system',$action='home',$params=[])
{
    $extra = '';
    if($params)
    {
        foreach($params as $key=>$value)
        {
            $extra .="&$key=$value";
        }
    }
    return 'index.php?controller='.$controller.'&action='.$action.$extra;
}
function img($src)
{
    return file_exists($src)?$src:'public/noimg.png';
}
function setmsgs($msgs =[])
{
    foreach($msgs as $key=>$value)
    {
        $_SESSION['msg'.$key]= $value;
    }
}
function getmsg($key='')
{
    if(isset($_SESSION['msg'.$key]))
    {
        $tmp =$_SESSION['msg'.$key]; 
        unset($_SESSION['msg'.$key]);
        return $tmp;
    }
    return false;
}