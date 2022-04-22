<?php 
class systemcontroller extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function home()
    {
        $this->render('view/trangchu.php');
    }
    function contact()
    {
        $this->render('view/lienhe.php');
    }
    function _404()
    {
        $this->render('view/404.php',[],'empty');
    }
    function _403()
    {
        $this->render('view/403.php',[]);
    }
}