<?php 
class quantri extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function _list()
    {
        return $this->setquery('select * from quantri where trangthai!=-1')->loadrows();
    }
    function _count()
    {
        return $this->setquery('select count(ma) total from quantri where trangthai!=-1')->loadrow()->total;
    }
    function _item($id)
    {
        //echo $id;
        return $this->setquery('select * from quantri where ma=? and trangthai!=-1 limit 1')
        ->loadrow([$id]);
    }
    function _login($us,$pas)
    {
        //echo $id;
        return $this->setquery('select * from quantri where tendangnhap=? and matkhau=? and trangthai!=-1 limit 1')
        ->loadrow([$us,$pas]);
    }
}