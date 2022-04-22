<?php 
// bang: ??
// danh sach cot:???
// danh tham so neu co:??
// tao cau truy van cho ai?
//INSERT INTO `sanpham` ( `ten`, `gia`, `mota`, `hinhdaidien`, `video`, `manhacungcap`, 
//`maloai`, `hinhchitiet`, `motachitiet`, `mavach`, `tieude`, `tukhoa`, `motatimkiem`, 
//`hinhchiase`, `tenrutgon`, `trangthai`, `ngaytao`,`soluong`) VALUES ( ?, ?,?, 
//?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)
class querybuilder extends database
{
    function __construct()
    {
        parent::__construct();
    }
    function _insert($table,$params=[])
    {
       // xemmang($params);
        //table: sanpham
        //cl: [ten,gia,soluong]
        //pr: [
        //     'ten'=>'a',
        //     'gia'=>100,
        //     'soluong'=>10
        // ]
        //vl: ['a',100,10]
        //tao chuỗi columns
        $scl = '';
        $dauhoi = '';
        $bparams = [];
        foreach($params as $cl=>$val)
        {
            $scl .="`$cl`,";
            $dauhoi.="?,";
            $bparams[] = trim($val);
        }
        $scl = rtrim($scl,',');
        $dauhoi = rtrim($dauhoi,',');
        $sql = 'INSERT INTO `'.$table.'`('.$scl.') values('.$dauhoi.')';
        return $this->setquery($sql)->save($bparams);
        //dau ra: insert into `sanpham`(`ten`,`gia`,`soluong`) values(?,?,?)

    }
}
