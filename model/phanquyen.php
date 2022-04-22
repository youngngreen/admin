<?php 
class phanquyen extends querybuilder
{
    function __construct()
    {
        parent::__construct();
    }
    function _list()
    {
        return $this->setquery('select * from phanquyen ')->loadrows();
    }
    function _count()
    {
        return $this->setquery('select count(maquantri) total from phanquyen ')->loadrow()->total;
    }
    function _checked($uid,$cid)
    {
        //echo $id;
        return $this->setquery('select maquantri from phanquyen where machucnang=? and maquantri=?')
        ->loadrow([$cid,$uid]);
    }
    function _deny($uid)
    {
        //echo $id;
        return $this->setquery('delete from phanquyen where  maquantri=?')
        ->loadrow([$uid]);
    }
    function _listforuser($uid,$pid = 0)
    {
        return $this->setquery('SELECT chucnang.* FROM phanquyen join chucnang on phanquyen.machucnang=chucnang.ma where maquantri = ? and chucnang.macha =? and chucnang.hienthimenu=1 and chucnang.trangthai = 1')
        ->loadrows([$uid,$pid]);
    }
    function _checkurl($uid,$controller,$action)
    {
       // echo $uid,$controller,$action;
   // echo 'select * from chucnang where lienket like ? and trangthai=1 and allow=1';
        $cn = $this->setquery('select * from chucnang where lienket like ? and trangthai=1 and allow=1')
       ->loadrow(['%controller='.$controller.'&action='.$action.'%']);
        if($cn)
            return true;
        return $this->setquery('SELECT * FROM `chucnang` join phanquyen on chucnang.ma=phanquyen.machucnang
         WHERE lienket like ? and phanquyen.maquantri = ? and chucnang.trangthai = 1')
        ->loadrow(['%controller='.$controller.'&action='.$action.'%',$uid]);
    }
}