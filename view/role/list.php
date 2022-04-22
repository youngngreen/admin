<h3>Danh sách quản trị (<?=$count?>)</h3>
<table class="table">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Tên đăng nhập</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach($list as $item)
    {
    ?>
        <tr>
            <td scope="row"><?=$item->ma?></td>
            <td><?=$item->ten?></td>
            <td><?=$item->tendangnhap?></td>
            <td><?=$item->trangthai==1?'<span class="badge badge-success ">Hoạt động</span>':'<span class="badge badge-dark ">Ngưng hoạt động</span>'?></td>
            <td>
                <a href="<?=url('role','edit',['ma'=>$item->ma])?>" class="btn btn-sm btn-success">Cấp quyền</a>            
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>