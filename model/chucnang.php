<?php 
class chucnang extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function _list()
    {
        return $this->setquery('select * from chucnang where trangthai!=-1')->loadrows();
    }
    function _listforparent($parent = 0)
    {
        return $this->setquery('select * from chucnang where trangthai!=-1 and macha=?')->loadrows([$parent]);
    }
    function _count()
    {
        return $this->setquery('select count(ma) total from chucnang where trangthai!=-1')->loadrow()->total;
    }
    function _item($id)
    {
        //echo $id;
        return $this->setquery('select * from chucnang where ma=? and trangthai!=-1 limit 1')
        ->loadrow([$id]);
    }
}