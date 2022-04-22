<?php 
class productcontroller extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $a = new quantri();
        $model = new sanpham();
        $list = $model->_list();
        $count = $model->_count();
        $data = [
            'list'=>$list,
            'count'=>$count
        ];
        $this->render('view/sanpham/ds.php',$data);
         //$view = 'view/sanpham/ds.php'; 
         //include 'view/layout.php';
    }
    function detail()
    {
        $this->render('view/sanpham/chitiet.php');
    }
    function create()
    {
        $this->render('view/sanpham/form.php');
    }
}