<?php 
class sanpham extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function _list()
    {
        return $this->setquery('select * from sanpham where trangthai!=-1')->loadrows();
    }
    function _count()
    {
        return $this->setquery('select count(ma) total from sanpham where trangthai!=-1')->loadrow()->total;
    }
    function _item($id)
    {
        //echo $id;
        return $this->setquery('select * from sanpham where ma=? and trangthai!=-1 limit 1')
        ->loadrow([$id]);
    }
    function _list_loai()
    {
        return $this->setquery('select * from loaisanpham where trangthai = 1')->loadrows();
    }
    function _list_ncc()
    {
        return $this->setquery('select * from nhacungcap where trangthai = 1')->loadrows();
    }
    
}