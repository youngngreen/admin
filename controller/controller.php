<?php 
class controller
{
    var $menus;
    var $pq;
    function __construct()
    {
        $this->pq =  new phanquyen();
        if(islogin())
        {           
            $this->menus  = $this->pq->_listforuser($_SESSION['uid'],0);
        }
    }
    //data phai la 1 array vbaf phan tu phai la key tu dat
    function render($view,$data=[],$layout = 'layout')
    {        
        //giai nen cac phan tu cua mang trong php thành các ô nhớ đôc lập theo key cua phan tu là tên biên
        if(is_array($data))
        {
            extract($data);
        }
        include 'view/'.$layout.'.php';
    }
}