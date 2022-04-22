<?php 
include 'system/autoload.php';
$action = $_GET['action']??'home';
$controllername = ($_GET['controller']??'system').'controller';
//$path = 'controller/'.$controllername.'.php';
if(class_exists($controllername))
{
    //include $path;
    $c = new $controllername();
    //check action
    if(method_exists($c,$action))
    {
        //action: login
        //ac2: loginpost
        if(islogin() || in_array($action,ALLOWS))
        {
            //kiem tra quyen truy cap: uid,chuc nang dc cap,chuc nang dang truy cap
            if($c->pq->_checkurl($_SESSION['uid'],str_replace('controller','',$controllername),
            $action))
                $c->$action();
            else{
                $c = new systemcontroller();
                $c->_403();
            }
        }else{            
           $c= new usercontroller();
           $c->login();
        }//ve dc form
    }else{
        $c = new systemcontroller();
        $c->_404();
    }
}else{
   $c = new systemcontroller();
   $c->_404();
}
ob_end_flush();